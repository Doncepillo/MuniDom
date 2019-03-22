<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class GenderController extends Controller
{
    public function index()
    {

        $inventories = Inventory::all();
        return view('admin.inventories.index')->with(compact('inventories'));
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

        return redirect('/admin/configuration');
    }


    public function destroy($id)
    {
        $gender = Gender::find($id);
        $gender->delete();
        return back(); 
    }        
}
