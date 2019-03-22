<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use Toastr;

class SectorController extends Controller
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
    
        $state = new State();
        $state->estado = $request->input('estado');
        $state->save();//INSERT
        $title = "Estado Creado correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }

    public function edit($id)
    {
        $state = State::find($id);
        return view('admin.states.edit')->with(compact('state'));
    }

    public function update(Request $request, $id)
    {
        //registrar nuevo trabajador en la bd
    
        $state = State::find($id);
        $state->estado = $request->input('estado');
        $state->save();//UPDATE
        $title = "Estado Editado correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }


    public function destroy($id)
    {
        $state = State::find($id);
        $state->delete();
        $title = "Estado Eliminado correctamente!";
        Toastr::success($title);
        return back(); 
    } 
}
