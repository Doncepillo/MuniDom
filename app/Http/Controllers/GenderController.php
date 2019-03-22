<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;
Use Toastr;
class GenderController extends Controller
{
    public function index()
    {

        $genders = Gender::all();
        return view('admin.genders.index')->with(compact('genders'));
    }

    public function create()
    {
        return view('admin.genders.create');
    }

    public function store(Request $request)
    {
        //registrar nuevo trabajador en la bd
    
        $gender = new Gender();
        $gender->genero = $request->input('genero');
        $gender->save();//INSERT
        $title = "Sexo Creado correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }

    public function edit($id)
    {
        $gender = Gender::find($id);
        return view('admin.genders.edit')->with(compact('gender'));
    }

    public function update(Request $request, $id)
    {
        //registrar nuevo trabajador en la bd
    
        $gender = Gender::find($id);
        $gender->genero = $request->input('genero');
        $gender->save();//UPDATE
        $title = "Sexo Editado correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }


    public function destroy($id)
    {
        $gender = Gender::find($id);
        $gender->delete();
        $title = "Sexo Eliminado correctamente!";
        Toastr::success($title);
        return back(); 
    }        
}
