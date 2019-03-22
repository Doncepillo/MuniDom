<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nationality;
use Toastr;

class NationalityController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
      
    }

    public function store(Request $request)
    {
        //registrar nuevo trabajador en la bd
    
        $nationality = new Nationality();
        $nationality->nacionalidad = $request->input('nacionalidad');
        $nationality->save();//INSERT
        $title = "Nacionalidad Creada correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }

    public function edit($id)
    {
        $nationality = Nationality::find($id);
        return view('admin.nationalities.edit')->with(compact('nationality'));
    }

    public function update(Request $request, $id)
    {
        //registrar nuevo trabajador en la bd
    
        $nationality = Nationality::find($id);
        $nationality->nacionalidad = $request->input('nacionalidad');
        $nationality->save();//UPDATE
        $title = "Nacionalidad Editada correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }


    public function destroy($id)
    {
        $nationality = Nationality::find($id);
        $nationality->delete();
        $title = "Nacionalidad Eliminada correctamente!";
        Toastr::success($title);
        return back(); 
    }  
}
