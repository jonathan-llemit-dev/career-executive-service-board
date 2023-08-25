<?php

namespace App\Http\Controllers\Competency;

use App\Http\Controllers\Controller;
use App\Models\ProfileLibCities;
use App\Models\ResourceSpeaker;
use Illuminate\Http\Request;

class ResourceSpeakerController extends Controller
{
    public function index()
    {
        $resourceSpeaker = ResourceSpeaker::paginate(20);

        return view('admin.competency.partials.trainings_sub_module.resource_speaker.table', compact('resourceSpeaker'));
    }

    public function create()
    {
        $profileLibCIties = ProfileLibCities::all();

        return view('admin.competency.partials.trainings_sub_module.resource_speaker.form', compact('profileLibCIties'));
    }
}
