<?php

namespace App\Http\Controllers\ERIS\report;

use App\Http\Controllers\Controller;
use App\Models\Eris\BoardInterView;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BoardInterviewReportController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'lastname'); // Default sorting by lastname.
        $sortOrder = $request->input('sort_order', 'asc'); // Default sorting order

        $boardInterview = BoardInterView::join('erad_tblMain', 'erad_tblMain.acno', '=', 'erad_tblBOARD.acno')
        ->select('erad_tblBOARD.*')
        ->with('erisTblMainBoardInterview')
        ->orderBy($sortBy, $sortOrder)
        ->paginate(25);
        
        return view('admin.eris.reports.board_panel_interview_report.board_interview_report.index', 
        compact(
            'boardInterview', 
            'sortBy', 
            'sortOrder'
        ));
    }

    // generate download links
    public function generateDownloadLinks(Request $request, $sortBy, $sortOrder)
    {
        $sortBy = $sortBy ?? 'lastname';
        $sortOrder = $sortOrder ?? 'asc';

        $boardInterview = BoardInterView::query()
        ->join('erad_tblMain', 'erad_tblMain.acno', '=', 'erad_tblBOARD.acno')
        ->select('erad_tblBOARD.*')
        ->with('erisTblMainBoardInterview')
        ->orderBy($sortBy, $sortOrder);

        // Set the maximum number of records per partition
        $recordsPerPartition = 500;

        $totalData = $boardInterview->count();
        $totalParts = ceil($totalData/$recordsPerPartition);

        // number of partitions
        $partitionNumber = 0;

        // number of data that will be skipped
        $skippedData = 0;

        // Initialize an array to store download links
        $downloadLinks = [];

        // Chunk the results based on the defined limit (don't remove the &$downloadLinks, $recordsPerPartition, $partitionNumber, $skippedData; 
        // the other parameter here is based on your applied filters change it according to your needs)
        $boardInterview->chunk($recordsPerPartition, function ($partition) use (&$downloadLinks, $recordsPerPartition, &$partitionNumber, &$skippedData, $sortBy, $sortOrder, $totalParts) {

            // calculating how many data should be skipped for this partition
            $skippedData = $recordsPerPartition * $partitionNumber;

            // incrementing the partition number
            $partitionNumber++;

            // filename for this partition (concatinate the partition number as part number)
            $filename = 'eris-board-interview-reports-part'.$partitionNumber.'.pdf';

            // Create a route to handle the download action for each partition
            // don't remove the $recordsPerPartition, $partitionNumber, $skippedData, $filename
            $downloadRoute = route('eris-interview-report.generateReportPdf', 
                                ['recordsPerPartition' => $recordsPerPartition, 'partitionNumber' => $partitionNumber, 'skippedData' => $skippedData, 'filename' => $filename, 'sortBy' => $sortBy, 'sortOrder' => $sortOrder, 'totalParts' => $totalParts]);

            // Store the download link in the array
            $downloadLinks[] = [
                'url' => $downloadRoute,
                'label' => 'ERIS Board Interview Reports Part '.$partitionNumber,
            ];
        });

        // Pass the download links to the next download page
        return view('admin.eris.reports.board_panel_interview_report.board_interview_report.download_reports', compact('downloadLinks'));
    }

    // generate pdf report
    public function generateReportPdf($totalParts, $recordsPerPartition, $partitionNumber, $skippedData, $filename, $sortBy, $sortOrder)
    {
        $sortBy = $sortBy ?? 'lastname';
        $sortOrder = $sortOrder ?? 'asc';

        $fullDateName = Carbon::now()->format('d  F  Y'); // getting full name attribute of the month example: 01 December 2023

        $boardInterview = BoardInterView::query()
        ->join('erad_tblMain', 'erad_tblMain.acno', '=', 'erad_tblBOARD.acno')
        ->select('erad_tblBOARD.*')
        ->with('erisTblMainBoardInterview')
        ->orderBy($sortBy, $sortOrder);

        // getting the data and applying the skipped data and records per partition to get the correct part of the report
        $boardInterview = $boardInterview->skip($skippedData)->take($recordsPerPartition)->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('admin.eris.reports.board_panel_interview_report.board_interview_report.report_pdf', [
            'boardInterview' => $boardInterview, 
            'totalParts' => $totalParts,
            'partitionNumber' => $partitionNumber,
            'skippedData' => $skippedData,
            'fullDateName' => $fullDateName,
        ])
        ->setPaper('a4', 'portrait');

        return $pdf->stream($filename);
    }
}
