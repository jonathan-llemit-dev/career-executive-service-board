<?php

namespace App\Http\Controllers\Competency;

use App\Http\Controllers\Controller;
use App\Models\CompetencyTrainingVenueManager;
use App\Models\ProfileLibCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingVenueManagerController extends Controller
{
    public function index($cesno)
    {    
        $trainingVenueManager = CompetencyTrainingVenueManager::all();

        return view('admin.competency.partials.trainings_sub_module.training_venue_manager.table', compact('trainingVenueManager', 'cesno'));
    }

    public function create($cesno)
    {
        $profileLibTblCities = ProfileLibCities::all();

        return view('admin.competency.partials.trainings_sub_module.training_venue_manager.form', compact('profileLibTblCities', 'cesno'));
    }

    public function store(Request $request, $cesno)
    {
        $userFullName = Auth::user();
        $userLastName = $userFullName ->last_name;
        $userFirstName = $userFullName ->first_name;
        $userMiddleName = $userFullName ->middle_name;
        $userNameExtension = $userFullName ->name_extension;
        $userFullName = $userLastName. ' ' .$userFirstName. ' '.$userMiddleName. ' '.$userNameExtension;

        $trainingVenueManager = new CompetencyTrainingVenueManager([

            'name' => $request->venue_name,
            'no_street' => $request->no_street,
            'brgy' => $request->brgy,
            'city_code' => $request->city_code,
            'contactno' => $request->contact_no,
            'emailadd' => $request->email,
            'contactperson' => $request->contact_person,
            'encoder' => $userFullName,

        ]);

        $cityCode =  $request->city_code;

        $trainingVenueCitiesCode = ProfileLibCities::find($cityCode);

        if(!$trainingVenueCitiesCode){
            return redirect()->back()->with('error', 'Something Went Wrong in saving Training Venue Manager');
        }else{
            $trainingVenueCitiesCode->competencytrainingVenueManager()->save($trainingVenueManager);
        }

        return to_route('training-venue-manager.index', ['cesno'=>$cesno])->with('message', 'Training Venue Manager Successfuly Saved');
    }
}
