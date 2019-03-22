<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Toastr;

class CategoriesController extends Controller
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
    
        $categorie = new Category();
        $categorie->categoria = $request->input('categoria');
        $categorie->save();//INSERT
        $title = "Categoria Creada correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }

    public function edit($id)
    {
        $categorie = Category::find($id);
        return view('admin.categories.edit')->with(compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        //registrar nuevo trabajador en la bd
    
        $categorie = Category::find($id);
        $categorie->categoria = $request->input('categoria');
        $categorie->save();//UPDATE
        $title = "Categoria Editada correctamente!";
        Toastr::success($title);
        return redirect('/admin/configuration');
    }


    public function destroy($id)
    {
        $categorie = Category::find($id);
        $categorie->delete();
        $title = "Categoria Eliminada correctamente!";
        Toastr::success($title);
        return back(); 
    }
}
