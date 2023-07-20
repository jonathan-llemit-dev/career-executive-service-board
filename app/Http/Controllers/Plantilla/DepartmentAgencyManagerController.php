<?php

namespace App\Http\Controllers\Plantilla;

use App\Http\Controllers\Controller;
use App\Models\Plantilla\DepartmentAgency;
use Illuminate\Http\Request;

class DepartmentAgencyManagerController extends Controller
{
    public function index(Request $request, ){
        $search = $request->input('search');
        $datas = DepartmentAgency::orderBy('title', 'ASC')
        ->where('title', 'LIKE', "%$search%")
        ->orWhere('acronym', 'LIKE', "%$search%")
        ->orWhere('website', 'LIKE', "%$search%")
        ->orWhere('plantillalib_tblAgencyType_id', 'LIKE', "%$search%")
        ->orWhere('mother_deptid', 'LIKE', "%$search%")
        ->paginate(15);
        return view ('admin.plantilla.department_agency_manager.index', compact('datas', 'search'));
    }
}
