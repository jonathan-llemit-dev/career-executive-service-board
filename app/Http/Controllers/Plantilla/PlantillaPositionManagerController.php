<?php

namespace App\Http\Controllers\Plantilla;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlantillaPositionManagerController extends Controller
{
    public function index(){
        return view('admin.plantilla.plantilla_office_manager.index');
    }
}