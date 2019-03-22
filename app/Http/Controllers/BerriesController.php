<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berrie;
use Toastr;

class BerriesController extends Controller
{
    public function index()
    {
        $berries = Berrie::paginate(10);
        return view('admin.berries.index')->with(compact('berries'));
    }

    public function create()
    {
        return view('admin.berries.create');
    }

    public function store(Request $request)
    
    {   

          //validar berrie
          $messages = [
            'nombre_berrie.string' => 'Campo Nombre Empresa Solo Caracteres',
            'representante.string' => 'Campo representante Solo Caracteres',
            'fono.numeric' => 'Campo fono solo numeros',   
        ];    


        $rules = [
            'nombre_berrie' => 'string',
            'representante' => 'string',
            'fono' => 'numeric',
        ];
        $this->validate($request, $rules,$messages);
        //registrar nuevo trabajador en la bd
        
        $berrie = new Berrie();
        $berrie->nombre_berrie = $request->input('nombre_berrie');
        $berrie->direccion = $request->input('direccion');
        $berrie->representante = $request->input('representante');
        $berrie->rut_empresa = $request->input('rut_empresa');
        $berrie->fono = $request->input('fono');
        $berrie->save();//INSERT
        $title = "Berrie Creada correctamente!";
        Toastr::success($title);
        return redirect('/admin/berries');
    }

    public function edit($id)
    {
        
        $berrie = Berrie::find($id);
        return view('admin.berries.edit')->with(compact('berrie'));
    }

    public function update(Request $request, $id)
    {

             //validar berrie
             $messages = [
                'nombre_berrie.string' => 'Campo Nombre Empresa Solo Caracteres',
                'representante.string' => 'Campo representante Solo Caracteres',
                'fono.numeric' => 'Campo fono solo numeros',   
            ];    
    
    
            $rules = [
                'nombre_berrie' => 'string',
                'representante' => 'string',
                'fono' => 'numeric',
            ];
            $this->validate($request, $rules,$messages);

        //Editar trabajador en la bd
    
        $berrie = Berrie::find($id);
        $berrie->nombre_berrie = $request->input('nombre_berrie');
        $berrie->direccion = $request->input('direccion');
        $berrie->representante = $request->input('representante');
        $berrie->rut_empresa = $request->input('rut_empresa');
        $berrie->fono = $request->input('fono');
        $berrie->save();//UPDATE
        $title = "Berrie Editada correctamente!";
        Toastr::success($title);
        return redirect('/admin/berries');
    }

    public function destroy($id)
    {
        $berrie = Berrie::find($id);
        $berrie->delete();
        $title = "Berrie Eliminada correctamente!";
        Toastr::success($title);
        return back(); 
    }

}
