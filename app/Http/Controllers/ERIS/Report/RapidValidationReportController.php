<?php

namespace App\Http\Controllers\ERIS\Report;

use App\Http\Controllers\Controller;
use App\Models\Eris\RapidValidation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class RapidValidationReportController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->input('sortBy', 'dteassign'); // Default sorting by date assign.
        $sortOrder = $request->input('sortOrder', 'desc'); // Default sorting order
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $startDate = $startDate ?? '0';
        $endDate = $endDate ?? '0';
        
        $rapidValidation = RapidValidation::join('erad_tblMain', 'erad_tblMain.acno', '=', 'erad_tblRVP.acno')
        ->select('erad_tblRVP.*')
        ->with('erisTblMainRapidValidation')
        ->when($startDate && $endDate, function ($query) use ($startDate, $endDate, $sortBy, $sortOrder) {
            return $query
                ->whereBetween(DB::raw('CAST(dteassign AS DATE)'), [$startDate, $endDate])
                ->orderBy($sortBy, $sortOrder);
        }, function ($query) use ($sortBy, $sortOrder) {
            return $query->orderBy($sortBy, $sortOrder);
        })
        ->paginate(25);

        return view('admin.eris.reports.validation_reports.rapid_validation.report', [
            'rapidValidation' => $rapidValidation,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ]);
    }
    
    public function generatePdfReport(Request $request,  $recordsPerPartition, $partitionNumber, $skippedData, $filename,
    $sortBy, $sortOrder, $startDate, $endDate)
    {
        $sortBy = $sortBy ?? 'dteassign';
        $sortOrder = $sortOrder ?? 'desc';

        $startDate = $startDate ?? '0';
        $endDate = $endDate ?? '0';
        
        $rapidValidation = RapidValidation::query()
        ->join('erad_tblMain', 'erad_tblMain.acno', '=', 'erad_tblRVP.acno')
        ->select('erad_tblRVP.*')
        ->with('erisTblMainRapidValidation')
        ->when($startDate && $endDate, function ($query) use ($startDate, $endDate, $sortBy, $sortOrder) {
            return $query
                ->whereBetween(DB::raw('CAST(dteassign AS DATE)'), [$startDate, $endDate])
                ->orderBy($sortBy, $sortOrder);
        }, function ($query) use ($sortBy, $sortOrder) {
            return $query->orderBy($sortBy, $sortOrder);
        });

        // getting the data and applying the skipped data and records per partition to get the correct part of the report
        $rapidValidation = $rapidValidation->skip($skippedData)->take($recordsPerPartition)->get();

        $pdf = Pdf::loadView('admin.eris.reports.validation_reports.rapid_validation.report_pdf', [
            'rapidValidation' => $rapidValidation,
        ])
        ->setPaper('a4', 'portrait');

        return $pdf->stream($filename);
    }

    public function generateDownloadLinks(Request $request, $sortBy, $sortOrder, $startDate, $endDate)
    {
        $sortBy = $sortBy ?? 'dteassign';
        $sortOrder = $sortOrder ?? 'desc';

        $startDate = $startDate ?? '0';
        $endDate = $endDate ?? '0';
        
        $rapidValidation = RapidValidation::query()
        ->join('erad_tblMain', 'erad_tblMain.acno', '=', 'erad_tblRVP.acno')
        ->select('erad_tblRVP.*')
        ->with('erisTblMainRapidValidation')
        ->when($startDate && $endDate, function ($query) use ($startDate, $endDate, $sortBy, $sortOrder) {
            return $query
                ->whereBetween(DB::raw('CAST(dteassign AS DATE)'), [$startDate, $endDate])
                ->orderBy($sortBy, $sortOrder);
        }, function ($query) use ($sortBy, $sortOrder) {
            return $query->orderBy($sortBy, $sortOrder);
        });

        // Set the maximum number of records per partition
        $recordsPerPartition = 500;

        // number of partitions
        $partitionNumber = 0;

        // number of data that will be skipped
        $skippedData = 0;

        // Initialize an array to store download links
        $downloadLinks = [];

        // Chunk the results based on the defined limit (don't remove the &$downloadLinks, $recordsPerPartition, $partitionNumber, $skippedData; 
        // the other parameter here is based on your applied filters change it according to your needs)
        $rapidValidation->chunk($recordsPerPartition, function ($partition) use (&$downloadLinks, $recordsPerPartition, &$partitionNumber, &$skippedData, $sortBy, $sortOrder, $startDate, $endDate) {

            // calculating how many data should be skipped for this partition
            $skippedData = $recordsPerPartition * $partitionNumber;

            // incrementing the partition number
            $partitionNumber++;

            // filename for this partition (concatinate the partition number as part number)
            $filename = 'eris-rapid-validation-reports-part'.$partitionNumber.'.pdf';

            // Create a route to handle the download action for each partition
            // don't remove the $recordsPerPartition, $partitionNumber, $skippedData, $filename
            $downloadRoute = route('rapid-validation-report.generatePdfReport', 
                                ['recordsPerPartition' => $recordsPerPartition, 'partitionNumber' => $partitionNumber, 'skippedData' => $skippedData, 'filename' => $filename, 'sortBy' => $sortBy, 'sortOrder' => $sortOrder, 'startDate' => $startDate, 'endDate' => $endDate]);

            // Store the download link in the array
            $downloadLinks[] = [
                'url' => $downloadRoute,
                'label' => 'ERIS Rapid Validation Reports Part '.$partitionNumber,
            ];
        });

        // Pass the download links to the next download page
        return view('admin.eris.reports.validation_reports.rapid_validation.download_reports', compact('downloadLinks'));
    }
}
