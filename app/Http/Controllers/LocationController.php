<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Toastr;

class LocationController extends Controller
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
    
        $location = new Location();
        $location->localidad = $request->input('localidad');
        $location->save();//INSERT
        $title = "Localidad Creada correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }

    public function edit($id)
    {
        $location = Location::find($id);
        return view('admin.locations.edit')->with(compact('location'));
    }

    public function update(Request $request, $id)
    {
        //registrar nuevo trabajador en la bd
    
        $location = Location::find($id);
        $location->localidad = $request->input('localidad');
        $location->save();//UPDATE
        $title = "Localidad Editada correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }


    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
        $title = "Localidad Eliminada correctamente!";
        Toastr::success($title);
        return back(); 
    }   
}
