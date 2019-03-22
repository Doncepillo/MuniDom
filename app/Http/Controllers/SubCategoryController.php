<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        
        $articles = Article::paginate(10);
        $categories = Category::all();
        $operations = Operation::all();
        $article_states = ArticleState::all();
        return view('admin.inventories.index')->with(compact('articles','categories','operations','article_states'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.inventories.create')->with(compact('articles','categories'));
    }

    public function store(Request $request)
    
    {
        //registrar nuevo trabajador en la bd
        
        $articles = new Article();
        $articles->nombre_articulo = $request->input('nombre_articulo');
        $articles->descripcion = $request->input('descripcion');
        $articles->min_stock = $request->input('min_stock');
        $articles->category_id = $request->input('category_id');
        $articles->is_active = $request->input('is_active');
        $articles->save();//INSERT
        
        $operations = new Operation();
        $operations->cantidad = $request->input('cantidad');
        $operations->article_id = $articles->id;
        $operations->operation_type_id = '1';
        $operations->save();//INSERT
        


        return redirect('/admin/inventories');
    }

    public function edit($id)
    {
        
        $berrie = Berrie::find($id);
        return view('admin.berries.edit')->with(compact('berrie'));
    }

    public function update(Request $request, $id)
    {
        //registrar nuevo trabajador en la bd
    
        $berrie = Berrie::find($id);
        $berrie->nombre_berrie = $request->input('nombre_berrie');
        $berrie->direccion = $request->input('direccion');
        $berrie->representante = $request->input('representante');
        $berrie->rut_empresa = $request->input('rut_empresa');
        $berrie->fono = $request->input('fono');
        $berrie->save();//UPDATE

        return redirect('/admin/berries');
    }

    public function destroy($id)
    {
        $berrie = Berrie::find($id);
        $berrie->delete();
        return back(); 
    }

}
