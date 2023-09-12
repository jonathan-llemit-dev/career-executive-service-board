<?php

namespace App\Http\Controllers\Competency;

use App\Http\Controllers\Controller;
use App\Models\CompetencyTrainingVenueManager;
use App\Models\ProfileLibCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TrainingVenueManagerController extends Controller
{
    public function index()
    {    
        $trainingVenueManager = CompetencyTrainingVenueManager::all();

        return view('admin.competency.partials.trainings_sub_module.training_venue_manager.table', compact('trainingVenueManager'));
    }

    public function create()
    {
        $profileLibTblCities = ProfileLibCities::all();

        return view('admin.competency.partials.trainings_sub_module.training_venue_manager.form', compact('profileLibTblCities'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'venue_name' => ['required', 'unique:traininglib_tblvenue,name'],
            'no_street' => ['required'],
            'brgy' => ['required'],
            'city_code' => ['required'],
            'contact_no' => ['required'],
            'email' => ['required'],
            'contact_person' => ['required'],
            
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $encoder = $user->userName();

        $trainingVenueManager = new CompetencyTrainingVenueManager([

            'name' => $request->venue_name,
            'no_street' => $request->no_street,
            'brgy' => $request->brgy,
            'city_code' => $request->city_code,
            'contactno' => $request->contact_no,
            'emailadd' => $request->email,
            'contactperson' => $request->contact_person,
            'encoder' => $encoder,

        ]);

        $cityCode =  $request->city_code;

        $trainingVenueCitiesCode = ProfileLibCities::find($cityCode);

        if(!$trainingVenueCitiesCode){
            return redirect()->back()->with('error', 'Something Went Wrong in saving Training Venue Manager');
        }else{
            $trainingVenueCitiesCode->competencytrainingVenueManager()->save($trainingVenueManager);
        }

        return to_route('training-venue-manager.index')->with('message', 'Training Venue Manager Successfuly Saved');
    }

    public function edit($ctrlno)
    {
        $profileLibTblCities = ProfileLibCities::all();
        $trainingVenueManager = CompetencyTrainingVenueManager::find($ctrlno);

        return view('admin.competency.partials.trainings_sub_module.training_venue_manager.edit', compact('profileLibTblCities', 'trainingVenueManager'));
    }

    public function update(Request $request, $ctrlno)
    {
        $request->validate([

            'name' => ['required',Rule::unique('traininglib_tblvenue')->ignore($ctrlno, 'venueid')],
            'no_street' => ['required'],
            'brgy' => ['required'],
            'city_code' => ['required'],
            'contact_no' => ['required'],
            'email' => ['required'],
            'contact_person' => ['required'],
            
        ]);

        $userFullName = Auth::user();
        $userLastName = $userFullName ->last_name;
        $userFirstName = $userFullName ->first_name;
        $userMiddleName = $userFullName ->middle_name;
        $userNameExtension = $userFullName ->name_extension;
        $userFullName = $userLastName. ' ' .$userFirstName. ' '.$userMiddleName. ' '.$userNameExtension;

        $trainingVenueManager = CompetencyTrainingVenueManager::find($ctrlno);
        $trainingVenueManager->name = $request->name;
        $trainingVenueManager->no_street = $request->no_street;
        $trainingVenueManager->brgy = $request->brgy;
        $trainingVenueManager->city_code = $request->city_code;
        $trainingVenueManager->contactno = $request->contact_no;
        $trainingVenueManager->emailadd = $request->email;
        $trainingVenueManager->contactperson = $request->contact_person;
        $trainingVenueManager->updated_by = $request->$userFullName;
        $trainingVenueManager->update();

        return to_route('training-venue-manager.index')->with('info', 'Update Sucessfully');
    }

    public function destroy($ctrlno)
    {
        $trainingVenueManager = CompetencyTrainingVenueManager::find($ctrlno);
        $trainingVenueManager->delete();

        return back()->with('info', 'Deleted Sucessfully');
    }

    public function recentlyDeleted()
    {
        $trainingVenueManagerTrashRecord = CompetencyTrainingVenueManager::onlyTrashed()->get();

        return view('admin.competency.partials.trainings_sub_module.training_venue_manager.trashbin', compact('trainingVenueManagerTrashRecord'));
    }

    public function restore($ctrlno)
    {
        $trainingVenueManagerTrashRecord = CompetencyTrainingVenueManager::onlyTrashed()->find($ctrlno);
        $trainingVenueManagerTrashRecord->restore();

        return back()->with('info', 'Data Restored Sucessfully');
    }
 
    public function forceDelete($ctrlno)
    {
        $trainingVenueManagerTrashRecord = CompetencyTrainingVenueManager::onlyTrashed()->find($ctrlno);
        $trainingVenueManagerTrashRecord->forceDelete();
  
        return back()->with('info', 'Data Permanently Deleted');
    }
}
