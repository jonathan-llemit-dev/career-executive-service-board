<?php

namespace App\Http\Controllers\Competency;

use App\Http\Controllers\Controller;
use App\Models\CompetencyNonCesAccreditedTraining;
use App\Models\CompetencyTrainingProvider;
use App\Models\PersonalData;
use App\Models\ProfileLibTblExpertiseSpec;
use App\Models\ProfileTblTrainingMngt;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompetencyOtherTrainingManagementController extends Controller
{
    public function index($cesno)
    {
        $personalData = PersonalData::find($cesno);
        $nonCesAccreditedTrainingCompetency = $personalData->competencyNonCesAccreditedTraining;
        $nonCesAccreditedTraining201 = $personalData->otherTraining;

        return view('admin.competency.partials.other_management_trainings.table', compact('nonCesAccreditedTrainingCompetency' , 'nonCesAccreditedTraining201', 'cesno'));
    }

    public function create($cesno)
    {
       $profileLibTblExpertiseSpec =  ProfileLibTblExpertiseSpec::all();
       $competencyTrainingProvider = CompetencyTrainingProvider::all();

       return view('admin.competency.partials.other_management_trainings.form', compact('cesno', 'profileLibTblExpertiseSpec', 'competencyTrainingProvider'));
    }

    public function store(Request $request, $cesno)
    {
        $request->validate([

            'training' => ['required',Rule::unique('training_tblOtherAccre')->where('personal_data_cesno', $cesno)],
            'training_category' => ['required'],
            'no_of_training_hours' => ['required'],
            'sponsor_training_provider' => ['nullable'],
            'venue' => ['required'],
            'inclusive_date_from' => ['required'],
            'inclusive_date_to' => ['required'],
            'expertise_field_of_specialization' => ['required'],
            
        ]);

        $provider = $request->sponsor_training_provider;
        $providerID = CompetencyTrainingProvider::where('provider', $provider)->value('providerID');

        $competencyNonCesAccreditedTraining = new CompetencyNonCesAccreditedTraining([

            'personal_data_cesno' => $cesno,
            'training' => $request->training,
            'training_category' => $request->training_category,
            'no_hours' => $request->no_of_training_hours,
            'sponsor' => $request->sponsor_training_provider,
            'venue' => $request->venue,
            'from_dt' => $request->inclusive_date_from,    
            'to_dt' => $request->inclusive_date_to,    
            'specialization' => $request->expertise_field_of_specialization,    
            'providerID' => $providerID,    

        ]);
     
        $personalData = PersonalData::find($cesno);
        
        $personalData->competencyNonCesAccreditedTraining()->save($competencyNonCesAccreditedTraining);
    
        return to_route('non-ces-training-management.index', ['cesno'=>$cesno])->with('message', 'Save Sucessfully');
    }

    public function edit($ctrlno, $cesno)
    {
        $nonCesAccreditedTraining = CompetencyNonCesAccreditedTraining::find($ctrlno);
        $profileLibTblExpertiseSpec =  ProfileLibTblExpertiseSpec::all();
        $competencyTrainingProvider = CompetencyTrainingProvider::all();

        return view('admin.competency.partials.other_management_trainings.edit', compact('cesno', 'profileLibTblExpertiseSpec', 'competencyTrainingProvider', 'nonCesAccreditedTraining'));    
    }

    public function update(Request $request, $ctrlno, $cesno)
    {
        $request->validate([

            'training' => ['required',Rule::unique('training_tblOtherAccre')->where('personal_data_cesno', $cesno)->ignore($ctrlno, 'ctrlno')],
            'training_category' => ['required'],
            'no_of_training_hours' => ['required'],
            'sponsor_training_provider' => ['required'],
            'venue' => ['required'],
            'inclusive_date_from' => ['required'],
            'inclusive_date_to' => ['required'],
            'expertise_field_of_specialization' => ['required'],
            
        ]);

        $provider = $request->sponsor_training_provider;
        $providerID = CompetencyTrainingProvider::where('provider', $provider)->value('providerID');
        
        $competencyNonCesAccreditedTraining = CompetencyNonCesAccreditedTraining::find($ctrlno);
        $competencyNonCesAccreditedTraining->training = $request->training;
        $competencyNonCesAccreditedTraining->training_category = $request->training_category;
        $competencyNonCesAccreditedTraining->no_hours = $request->no_of_training_hours;
        $competencyNonCesAccreditedTraining->sponsor = $request->sponsor_training_provider;
        $competencyNonCesAccreditedTraining->venue = $request->venue;
        $competencyNonCesAccreditedTraining->from_dt = $request->inclusive_date_from;
        $competencyNonCesAccreditedTraining->to_dt = $request->inclusive_date_to;
        $competencyNonCesAccreditedTraining->specialization = $request->expertise_field_of_specialization;
        $competencyNonCesAccreditedTraining->providerID = $providerID;
        $competencyNonCesAccreditedTraining->save();

        return to_route('non-ces-training-management.index', ['cesno'=>$cesno])->with('info', 'Update Sucessfully');
    }

    public function destroy($ctrlno)
    {
        $competencyNonCesAccreditedTraining = CompetencyNonCesAccreditedTraining::find($ctrlno);
        $competencyNonCesAccreditedTraining->delete();

        return back()->with('info', 'Deleted Sucessfully');
    }

    public function recentlyDeleted($cesno)
    {
        //parent model
        $personalData = PersonalData::withTrashed()->find($cesno);

        // Access the soft deleted competencyNonCesAccreditedTraining of the parent model
        $competencyNonCesAccreditedTrainingTrashedRecord = $personalData->competencyNonCesAccreditedTraining()->onlyTrashed()->get();

        // Access the soft deleted otherTraining of the parent model
        $nonCesAccreditedTraining201TrashedRecord = $personalData->otherTraining()->onlyTrashed()->get();
 
        return view('admin.competency.partials.other_management_trainings.trashbin', compact('competencyNonCesAccreditedTrainingTrashedRecord', 'nonCesAccreditedTraining201TrashedRecord', 'cesno'));
    }

    public function restore($ctrlno)
    {
        $competencyNonCesAccreditedTrainingTrashedRecord = CompetencyNonCesAccreditedTraining::onlyTrashed()->find($ctrlno);
        $competencyNonCesAccreditedTrainingTrashedRecord->restore();

        return back()->with('info', 'Data Restored Sucessfully');
    }
 
    public function forceDelete($ctrlno)
    {
        $competencyNonCesAccreditedTrainingTrashedRecord = CompetencyNonCesAccreditedTraining::onlyTrashed()->find($ctrlno);
        $competencyNonCesAccreditedTrainingTrashedRecord->forceDelete();
  
        return back()->with('info', 'Data Permanently Deleted');
    }

    public function editNonCesTraining201 ($ctrlno, $cesno)
    {
        $nonCesTraining201 = ProfileTblTrainingMngt::find($ctrlno);
        $profileLibTblExpertiseSpec = ProfileLibTblExpertiseSpec::all();

        return view('admin.competency.partials.other_management_trainings.profile201_edit', compact('cesno', 'nonCesTraining201', 'profileLibTblExpertiseSpec'));
    }

    public function destroyNonCesTraining201($ctrlno)
    {
        $nonCesTraining201 = ProfileTblTrainingMngt::find($ctrlno);
        $nonCesTraining201->delete();

        return redirect()->back()->with('message', 'Deleted Sucessfully');
    }

    public function restoreNonCesTraining201($ctrlno)
    {
        $nonCesTraining201 = ProfileTblTrainingMngt::onlyTrashed()->find($ctrlno);
        $nonCesTraining201->restore();

        return back()->with('info', 'Data Restored Sucessfully');
    }
 
    public function forceDeleteNonCesTraining201($ctrlno)
    {
        $nonCesTraining201 = ProfileTblTrainingMngt::onlyTrashed()->find($ctrlno);
        $nonCesTraining201->forceDelete();
  
        return back()->with('info', 'Data Permanently Deleted');
    }
}
