<?php

namespace App\Http\Controllers;

use App\Models\AwardAndCitations;
use App\Models\PersonalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AwardAndCitationController extends Controller
{
    
    public function store(Request $request, $cesno){

        $userlastName = Auth::user()->last_name;

        $awardAndCitations = new AwardAndCitations([

            'awards' => $request->title_of_award,
            'sponsor' => $request->sponsor,
            'date' => $request->date,
            'encoder' => $userlastName,
         
        ]);

        $awardAndCitationsPersonalDataId = PersonalData::find($cesno);
            
        $awardAndCitationsPersonalDataId->awardsAndCitations()->save($awardAndCitations);
            
        return redirect()->back();

    }

    public function destroy($ctrlno){
        
        $awardAndCitations = AwardAndCitations::find($ctrlno);
        $awardAndCitations->delete();

        return redirect()->back();

        // $spouse->restore(); -> to restore soft deleted data

    }

}
