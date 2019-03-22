<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use Toastr;

class PositionController extends Controller
{
    public function index()
    {

        $positions = Position::all();
        return view('admin.positions.index')->with(compact('positions'));
    }


    public function create()
    {
        return view('admin.positions.create');
    }

    public function store(Request $request)
    {
        //registrar nuevo trabajador en la bd
    
        $position = new Position();
        $position->cargo = $request->input('cargo');
        $position->descripcion = $request->input('descripcion');
        $position->save();//INSERT
        $title = "Cargo Creado correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }

    public function edit($id)
    {
        
        $position = Position::find($id);
        return view('admin.positions.edit')->with(compact('position'));
    }

    public function update(Request $request, $id)
    {
        //registrar nuevo trabajador en la bd
    
        $position = Position::find($id);
        $position->cargo = $request->input('cargo');
        $position->descripcion = $request->input('descripcion');
        $position->save();//UPDATE
        $title = "Cargo Editado correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }

    public function destroy($id)
    {
        $position = Position::find($id);
        $position->delete();
        $title = "Cargo Eliminado correctamente!";
        Toastr::success($title);
        return back(); 
    }
}
