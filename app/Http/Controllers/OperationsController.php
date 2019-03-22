<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Operation;
use App\OperationType;

class OperationsController extends Controller
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

        return redirect('/admin/configuration');
    }

    public function destroy($id)
    {
        $position = Position::find($id);
        $position->delete();
        return back(); 
    }


   
}
