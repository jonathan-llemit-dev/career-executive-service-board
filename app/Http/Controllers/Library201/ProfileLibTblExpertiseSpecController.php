<?php

namespace App\Http\Controllers\Library201;

use App\Http\Controllers\Controller;
use App\Models\ProfileLibTblExpertiseSpec;
use Illuminate\Http\Request;

class ProfileLibTblExpertiseSpecController extends Controller
{
    public function index()
    {
        $profileLibTblExpertiseSpec = ProfileLibTblExpertiseSpec::paginate(25);
        
        return view('admin.201_library.expertise_specialization.index', [
            'profileLibTblExpertiseSpec' => $profileLibTblExpertiseSpec,
        ]);
    }
}
