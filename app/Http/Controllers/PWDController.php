<?php

namespace App\Http\Controllers;

use App\Models\PWD;
use Illuminate\Http\Request;

class PWDController extends Controller
{
    public function index(){
        $datas = PWD::paginate(15);
        return view('admin.201_library.pwd.index', compact('datas'));
    }

    public function create(){
        return view('admin.201_library.pwd.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required','string', 'max:40', 'min:2', 'regex:/^[a-zA-Z ]*$/', 'unique:gender_by_choices'],
        ]);
        PWD::create($request->all());
        return redirect()->route('pwd.index')->with('message', 'The item has been successfully added!');
    }
    // ui for edit
    public function edit($ctrlno){
        $data = PWD::withTrashed()->findOrFail($ctrlno);
        return view('admin.201_library.pwd.edit', compact('data'));
    }

    public function update(Request $request, $ctrlno){
        $request->validate([
            'name' => ['required', 'string', 'max:40', 'min:2', 'regex:/^[a-zA-Z ]*$/', 'unique:gender_by_choices'],
        ]);

        $data = PWD::withTrashed()->findOrFail($ctrlno);
        $data->update($request->all());

        return redirect()->route('pwd.index')->with('message', 'The item has been successfully updated!');
    }

    // recently deleted
    public function recentlyDeleted(){
        $datas = PWD::onlyTrashed()
        ->orderByDesc('deleted_at')
        ->paginate(15);
        return view('admin.201_library.pwd.recently_deleted', compact('datas'));
    }

    // restore
    public function restore($ctrlno){
        $data = PWD::onlyTrashed()->findOrFail($ctrlno);
        $data->restore();

        return redirect()->back()->with('message', 'The item has been successfully restore!');
    }

    // soft delete
    public function destroy($ctrlno){
        $data = PWD::findOrFail($ctrlno);
        $data->delete();

        return redirect()->route('pwd.index')->with('message', 'The item has been successfully deleted!');
    }

    // force delete
    public function forceDelete($ctrlno){
        $data = PWD::onlyTrashed()->findOrFail($ctrlno);
        $data->forceDelete();

        return redirect()->back()->with('message', 'The item has been successfully deleted!');
    }
}
