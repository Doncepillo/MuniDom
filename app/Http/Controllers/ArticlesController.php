<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\SubCategory;
use App\Operation;
use App\OperationDetail;
use App\ArticleState;
use App\Berrie;
use App\Worker;
use App\Sector;
use App\User;
use App\App;
use dbdom;
use Toastr;
use Excel;

class ArticlesController extends Controller
{
    public function index()
    {   
        $articles = Article::paginate(20);
        $categories = Category::all();
        $subcategories = SubCategory::all();
    
        return view('admin.inventories.index')->with(compact('articles','categories','subcategories'));
    }
    
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        
        return view('admin.inventories.create')->with(compact('articles','categories','subcategories'));
    }

    public function store(Request $request)
    {
        $messages = [      
        ];    
        $rules = [      
        ];

        $this->validate($request, $rules,$messages);
        $articles = new Article();   
        $articles->NroPermiso = $request->input('NroPermiso');
        $articles->category_id = $request->input('category_id');
        $articles->sub_category_id = $request->input('sub_category_id');
        $articles->Fecha = $request->input('Fecha');
        $articles->Nombre = $request->input('Nombre');
        $articles->ApePaterno = $request->input('ApePaterno');
        $articles->ApeMaterno = $request->input('ApeMaterno');
        $articles->NroOrdenIngreso = $request->input('NroOrdenIngreso');
        $articles->Destino = $request->input('Destino');
        $articles->PerObraNueva = $request->input('PerObraNueva');
        $articles->Rol = $request->input('Rol');
        $articles->Direccion = $request->input('Direccion');
        $articles->Localidad = $request->input('Localidad');
        $articles->Superficie = $request->input('Superficie');
        $articles->PagoCuotas = $request->input('PagoCuotas');
        $articles->save();
        $title = "Registro creado correctamente!";
        Toastr::success($title);
        return redirect('/admin/inventories');
    }

    public function edit($id)
    {
        $categories = Category::orderBy('categoria')->get();
        $subcategories = SubCategory::orderBy('subcategoria')->get();
        $articles = Article::find($id);
        return view('admin.inventories.edit')->with(compact('articles','categories','subcategories'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
        ];    
        $rules = [
        ];

        $this->validate($request, $rules,$messages);     
        $articles = Article::find($id);
        $articles->category_id = $request->input('category_id');
        $articles->sub_category_id = $request->input('sub_category_id');
        $articles->Fecha = $request->input('Fecha');
        $articles->Nombre = $request->input('Nombre');
        $articles->ApePaterno = $request->input('ApePaterno');
        $articles->ApeMaterno = $request->input('ApeMaterno');
        $articles->NroOrdenIngreso = $request->input('NroOrdenIngreso');
        $articles->Destino = $request->input('Destino');
        $articles->PerObraNueva = $request->input('PerObraNueva');
        $articles->Rol = $request->input('Rol');
        $articles->Direccion = $request->input('Direccion');
        $articles->Localidad = $request->input('Localidad');
        $articles->Superficie = $request->input('Superficie');
        $articles->PagoCuotas = $request->input('PagoCuotas');
        $articles->save();
        $title = "¡Registro editado correctamente!";
        Toastr::success($title);
        return redirect('/admin/inventories');  
    }

    public function detail($id)
    {   
        $articles = Article::find($id);
        return view('admin.inventories.detail')->with(compact('articles','categories','subcategories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::where('NroPermiso', 'like',"%$query%")
        ->orwhere('category_id', 'like',"%$query%")
        ->orwhere('sub_category_id', 'like',"%$query%")
        ->orwhere('Nombre', 'like',"%$query%")
        ->orwhere('ApePaterno', 'like',"%$query%")
        ->orwhere('ApeMaterno', 'like',"%$query%")
        ->orwhere('NroOrdenIngreso', 'like',"%$query%")
        ->orwhere('Destino', 'like',"%$query%")
        ->orwhere('PerObraNueva', 'like',"%$query%")
        ->orwhere('Rol', 'like',"%$query%")
        ->orwhere('Direccion', 'like',"%$query%")
        ->orwhere('Localidad', 'like',"%$query%")
        ->orwhere('Superficie', 'like',"%$query%")
        ->orwhere('PagoCuotas', 'like',"%$query%")
        ->paginate(20); 
      
        if(empty($query)){  
            $title = "Ingrese un criterio para la búsqueda";
            Toastr::warning($title);
            return redirect('/admin/inventories/');
        }   

        return view('admin.inventories.index')->with(compact('articles','categories','subcategories','query'));       
    }

    public function destroy($id)
    {
        $articles = Article::find($id);
        $articles->delete();
        $title = "¡Registro eliminado correctamente!";
        Toastr::success($title);
        return back(); 
    }
      
    
    // FIN LOGICA MODULO INVENTARIO

// <------------------------------------------------------------------------------------------>

    //LOGICA MODULO BANDEJAS

    //BANDEJAS DISPONIBLES

        //Listar bandejas disponibles
        public function trays_in()
        {
            $articles = DB::table('articles')
            ->where('articles.category_id','=','9')
            ->paginate(10);
            return view('admin.trays.trays_in')->with(compact('articles'));   
        }
    
    //BANDEJAS DISPONIBLES

//---------------------------------------------------------------------------------------------------------------------    
    
    //PRESTAMO DE BANDEJAS


    //Listar bandejas prestadas
        public function trays_out()
    {
        $berries = Berrie::all();
        
        $operations = DB::table('operations')
        ->leftjoin('articles','operations.article_id','=','articles.id')
        ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
        ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','articles.nombre_articulo','berries.nombre_berrie')
        ->where('articles.category_id','=','9')
        ->where('operations.operation_type_id','=','2')
        ->paginate(6);
        return view('admin.trays.trays_out')->with(compact('operations','berries'));    
    }
    
        //Crear un nuevo préstamo de bandejas
        public function tray_out(Request $request,$article_id)
    {
        $articles = Article::find($article_id);

        $berries = Berrie::all();

        $workers = Worker::all();

        $users = User::all();
        $entradas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$article_id)
        ->where('operations.operation_type_id','=','1')
        ->first();
        $salidas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$article_id)
        ->where('operations.operation_type_id','=','2')
        ->first();   
        $stock = $entradas->cantidad-$salidas->cantidad;         
        return view('admin.trays.tray_out')->with(compact('articles','berries','workers','stock','users')); 
    }

        //Almacenar préstamo de bandejas
        public function tray_out_store(Request $request,$id)
    {
        $messages = [
            'folio.numeric' => 'Campo folio solo numeros',
            'cantidad.numeric'  => 'Campo cantidad solo numeros',
            'berrie_id.required'  => 'Campo huerto solicitante es requerido',     
        ];    
        $rules = [
            'folio' => 'numeric',
            'cantidad'  => 'numeric',
            'berrie_id' => 'required',
        ];
        $this->validate($request, $rules,$messages);
        
        if($request->input('cantidad')>= $request->input('new_cant')){
            $title = "La cantidad solicitada es mayor al stock diponible";
            Toastr::error($title);
            return redirect()->back();
        }else{
        $operation_details = new OperationDetail();
        $operation_details->folio = $request->input('folio');
        $operation_details->berrie_id = $request->input('berrie_id');
        $operation_details->worker_id = $request->input('worker_id');
        $operation_details->fecha = $request->input('fecha');
        $operation_details->description = $request->input('description');
        $operation_details->save();//INSERT            

        $operations = new Operation();
        $operations->cantidad = $request->input('cantidad');
        $operations->operation_type_id = '2';
        $operations->operation_detail_id = $operation_details->id;
        $operations->article_id = $request->input('article_id');
        $operations->save();//INSERT

        $articles = Article::find($id);
        $articles->cant = $request->input('new_cant')-$operations->cantidad = $request->input('cantidad');
        $articles->save();//SAVE
        
        $title = "Prestamo realizado correctamente!";
        Toastr::success($title);
        return redirect('/admin/trays_out');
        }
    }

        //PRESTAMO DE BANDEJAS

//---------------------------------------------------------------------------------------------------------------------

        //DEVOLUCION DE BANDEJAS

    //eliminar guia de bandejas devueltas y sumar al stock    
        public function destroytr($id) 
        {
            $operations = Operation::find($id);
            $operations->delete();

            $articles = Article::find($operations->article_id);
            $articles->cant = $articles->cant+$operations->cantidad;
            $articles->save();//SAVE

            $title = "Devolucion eliminado correctamente!";
            Toastr::success($title);
            return back(); 
        }
    //eliminar guia de bandejas prestadas y sumar al stock de inventario
        public function destroyto($id) 
        {
            $operations = Operation::find($id);
            $operations->delete();

            $articles = Article::find($operations->article_id);
            $articles->cant = $articles->cant+$operations->cantidad;
            $articles->save();//SAVE

            $title = "Guia eliminada correctamente!";
            Toastr::success($title);
            return back(); 
        }

        //Listar bandejas devueltas
        public function trays_return()
    {
        $articles_id = DB::table('articles')
        ->select('articles.id')
        ->get();

        $operations = DB::table('operations')
        ->leftjoin('articles','operations.article_id','=','articles.id')
        ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
        ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','articles.nombre_articulo','berries.nombre_berrie')
        ->where('articles.category_id','=','9')
        ->where('operations.operation_type_id','=','3')
        ->paginate(6);
        return view('admin.trays.trays_return')->with(compact('operations','articles')); 

        
    }

    public function tipo_bandejaAjax($a_id,$b_id)
    {
            $prestadas= DB::table('operations')
            ->select('articles.nombre_articulo',DB::raw('SUM(cantidad) as total'))
            ->join('articles','operations.article_id','articles.id')
            ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->join('berries','operation_details.berrie_id','=','berries.id')
            ->where('operations.operation_type_id','=','2')
            ->where('articles.id','=',$a_id)
            ->where('berries.id','=',$b_id)
            ->groupBy('articles.nombre_articulo')
            ->pluck("articles.nombre_articulo","total");
    
        
         return json_encode($prestadas);
     }

     public function tipo_bandeja1Ajax($a_id,$b_id)
     {
             $devueltas= DB::table('operations')
             ->select('articles.nombre_articulo',DB::raw('SUM(cantidad) as total'))
             ->join('articles','operations.article_id','articles.id')
             ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
             ->join('berries','operation_details.berrie_id','=','berries.id')
             ->where('operations.operation_type_id','=','3')
             ->where('articles.id','=',$a_id)
             ->where('berries.id','=',$b_id)
             ->groupBy('articles.nombre_articulo')
             ->pluck("articles.nombre_articulo","total");
     
         
          return json_encode($devueltas);
      }

        //formulario devolucion de bandejas
        public function tray_return(Request $request,$berrie_id)
    {   
        $articles = DB::table('articles')
        ->where('category_id','=','9')
        ->get();

        $article = $request->input('article_id');

       

        $tipo_prestadas = DB::table('operations')
        ->select('articles.id','articles.nombre_articulo as articulo',DB::raw('SUM(cantidad) as total'))
        ->join('articles','operations.article_id','articles.id')
        ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->join('berries','operation_details.berrie_id','=','berries.id')
        ->where('operations.operation_type_id','=','2')
        ->where('berries.id','=',$berrie_id)
        ->groupBy('articles.id','articles.nombre_articulo')
        ->get();

        $tipo_devueltas = DB::table('operations')
        ->select('articles.id','articles.nombre_articulo as articulo',DB::raw('SUM(cantidad) as total'))
        ->join('articles','operations.article_id','articles.id')
        ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->join('berries','operation_details.berrie_id','=','berries.id')
        ->where('operations.operation_type_id','=','3')
        ->where('berries.id','=',$berrie_id)
        ->groupBy('articles.id','articles.nombre_articulo')
        ->get();


        $berries = DB::table('berries')
        ->where('id','=',$berrie_id)
        ->get();

        $users = User::all();

        $prestadas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cant'))
        ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->where('operations.operation_type_id','=','2')
        ->where('operation_details.berrie_id','=',$berrie_id)
        ->first();

        $devueltas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cant'))
        ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->where('operations.operation_type_id','=','3')
        ->where('operation_details.berrie_id','=',$berrie_id)
        ->first();

        $saldo_bandejas = $prestadas->cant-$devueltas->cant;
       

        return view('admin.trays.tray_return')->with(compact('articles','berries','users','prestadas','devueltas','saldo_bandejas','tipo_prestadas','tipo_devueltas','pendientes'));
    }
    

         //Almacenar devolución de bandejas
        public function tray_in_store(Request $request)
    {
        $messages = [
            'folio.numeric' => 'Campo folio solo numeros',
            'cantidad.numeric'  => 'Campo cantidad solo numeros',
            'berrie_id.required'  => 'Campo berrie es requerido',     
        ];    
        $rules = [
            'folio' => 'numeric',
            'cantidad'  => 'numeric',
            'berrie_id' => 'required',
        ];            
            $this->validate($request, $rules,$messages);
            
        if($request->input('cantidad') > $request->input('pendientes')){
            $title = "La cantidad a devolver es mayor a la de bandejas prestadas";
            Toastr::error($title);
            return redirect()->back();
        }else{  

        $operation_details = new OperationDetail();
        $operation_details->folio = $request->input('folio');
        $operation_details->berrie_id = $request->input('berrie_id');
        $operation_details->worker_id = $request->input('worker_id');
        $operation_details->fecha = $request->input('fecha');
        $operation_details->description = $request->input('description');
        $operation_details->save();//INSERT            
        
        $operations = new Operation();
        $operations->cantidad = $request->input('cantidad');
        $operations->operation_type_id = '3';
        $operations->operation_detail_id = $operation_details->id;
        $operations->article_id = $request->input('article_id');
        $operations->save();//INSERT
        
        $articles = Article::find($operations->article_id);
        $articles->cant = $articles->cant+$operations->cantidad = $request->input('cantidad');
        $articles->save();//SAVE
        
        $title = "Devolucion realizada correctamente!";
        Toastr::success($title);
        return redirect('/admin/trays_return');
        }
        
    }

        //Detalle prestamo de bandejas
        public function tray_out_view(Request $request,$id)
    {
        $berries = Berrie::all();
        $users = User::all();
        $operations = DB::table('operations')
        ->leftjoin('articles','operations.article_id','=','articles.id')
        ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
        ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','operation_details.description','operation_details.worker_id','articles.nombre_articulo','berries.nombre_berrie')
        ->where('articles.category_id','=','9')
        ->where('operations.operation_type_id','=','2')
        ->where('operations.id','=',$id)
        ->first();
        return view('admin.trays.tray_out_view')->with(compact('operations','berries','users'));
    }

        //formulario detalle de edición guía de despacho PENDIENTE
        public function trays_return_view(Request $request,$id)
    {
        $berries = Berrie::all();
        $users = User::all();
        $operations = DB::table('operations')
        ->leftjoin('articles','operations.article_id','=','articles.id')
        ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
        ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','operation_details.description','operation_details.worker_id','articles.nombre_articulo','berries.nombre_berrie')
        ->where('articles.category_id','=','9')
        ->where('operations.operation_type_id','=','3')
        ->where('operations.id','=',$id)
        ->first();
        return view('admin.trays.trays_return_view')->with(compact('operations','berries','users'));
    }

    // FIN LOGICA DE BANDEJAS

// <---------------------------------------------------------------------------------------------------------------->

    //LOGICA DE QUIMICOS
    public function destroyqs($id) 
    {
        $operations = Operation::find($id);
        $operations->delete();
        $title = "Registro eliminado correctamente!";
        Toastr::success($title);

        $articles = Article::find($operations->article_id);
        $articles->cant = $articles->cant+$operations->cantidad;
        $articles->save();//SAVE
        return back(); 
    }

    //Listar salida productos quimicos
        public function chemicals_out()
    {
        $operations = DB::table('operations')
        ->leftjoin('articles','operations.article_id','=','articles.id')
        ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
        ->leftjoin('sectors','operation_details.sector_id','=','sectors.id')
        ->select('operations.id','operations.cantidad','operation_details.folio','operation_details.fecha','articles.nombre_articulo','berries.nombre_berrie','sectors.sector')
        ->where('articles.category_id','=','10')
        ->where('operations.operation_type_id','=','2')
        ->paginate(20);
        return view('admin.chemicals.chemicals_out')->with(compact('operations'));    
    }
        
        //formulario de salida de productos quimicos
        public function chemical_out(Request $request,$article_id)
    {
        $articles = Article::find($article_id);
        $sectors = Sector::all();   
        $entradas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$article_id)
        ->where('operations.operation_type_id','=','1')
        ->first(); 
        $salidas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$article_id)
        ->where('operations.operation_type_id','=','2')
        ->first();       
        $stock = $entradas->cantidad-$salidas->cantidad;            
        return view('admin.chemicals.chemical_out')->with(compact('articles','stock','sectors')); 
    }
    
        //Almacenar salidas de productos quimicos
        public function chemicaloutstore(Request $request,$id)    
    {
        $messages = [
        'cantidad.numeric' => 'Campo cantidad de salida solo numeros',
        'sector_id.required'  => 'Campo sector requerido',    
        ];    
        $rules = [
        'cantidad' => 'numeric',
        'sector_id'  => 'required',
        ];
        $this->validate($request, $rules,$messages);
        if($request->input('cantidad')>= $request->input('new_cant')){
            $title = "La cantidad solicitada es mayor al stock diponible";
            Toastr::error($title);
            return redirect()->back();
        }else{
        $operation_details = new OperationDetail();
        $operation_details->berrie_id = $request->input('berrie_id');
        $operation_details->worker_id = $request->input('worker_id');
        $operation_details->fecha = $request->input('fecha');
        $operation_details->sector_id = $request->input('sector_id');
        $operation_details->save();   

        $operations = new Operation();
        $operations->article_id = $id;
        $operations->cantidad = $request->input('cantidad');
        $operations->operation_type_id = '2';
        $operations->operation_detail_id = $operation_details->id;
        $operations->save();

        $articles = Article::find($id);
        $articles->cant = $request->input('new_cant')-$operations->cantidad = $request->input('cantidad');
        $articles->save();      
        $title = "Salida realizada correctamente!";
        Toastr::success($title);
        return redirect('/admin/chemicals_out');
    }
} 
        //Listar productos quimicos
        public function chemicals_in()
    {   
        $articles = DB::table('articles')
        ->leftjoin('sub_categories','articles.sub_category_id','=','sub_categories.id')
        ->select('articles.*','sub_categories.subcategoria')
        ->where('articles.category_id','=','10')
        ->paginate(20);
        return view('admin.chemicals.chemicals_in')->with(compact('articles','subcategories'));     
    }
    
        //Detalle de quimicos
        public function chemicalin($id)
    {
        $berries = Berrie::all();
        $operations = Operation::all();
        $articles = Article::find($id);  
        $entradas = DB::table('operations') 
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$id)
        ->where('operations.operation_type_id','=','1')
        ->first();
            
        $salidas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$id)
        ->where('operations.operation_type_id','=','2')
        ->first();         
        $stock = $entradas->cantidad-$salidas->cantidad;    
        return view('admin.trays.tray_in')->with(compact('articles','berries','operations','stock'));
    }
    
        //salida de quimicos
        public function chemicalsinstore(Request $request,$id)
    {
        $operation_details = new OperationDetail();
        $operation_details->berrie_id = $request->input('berrie_id');
        $operation_details->worker_id = $request->input('worker_id');
        $operation_details->fecha = $request->input('fecha');
        $operation_details->descripcion = $request->input('descripcion');
        $operation_details->save();    

        $operations = new Operation();
        $operations->cantidad = $request->input('cantidad');
        $operations->operation_type_id = '1';
        $operations->operation_detail_id = $operation_details->id;
        $operations->article_id = $request->input('article_id');
        $operations->save();
    
        $articles = Article::find($id);
        $articles->cant = $request->input('stock')+$operations->cantidad = $request->input('cantidad');
        $articles->save();
    
        return redirect('/admin/inventories');
    }

    //LOGICA DE QUIMICOS

// <---------------------------------------------------------------------------------------------------------------->

    //LOGICA DE REABSTECIMIENTOS

    //abrir formulario de reabastecimiento de articulos
    public function re($id)
    {
        $articles = Article::find($id);

        $entradas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$id)
        ->where('operations.operation_type_id','=','1')
        ->first();
        
        $salidas = DB::table('operations')
        ->select(DB::raw('SUM(cantidad) as cantidad'))
        ->where('operations.article_id','=',$id)
        ->where('operations.operation_type_id','=','2')
        ->first();
             
        $stock = $entradas->cantidad-$salidas->cantidad;   

        return view('admin.inventories.re')->with(compact('articles','stock'));
    }

    //guarda en bd el reabastecimiento de los artículos
    public function res(Request $request,$id)
    {
        $messages = [
            'cantidad.numeric'  => 'Campo cantidad a reabastecer solo numeros',   
        ];    
        $rules = [
            'cantidad'  => 'numeric'
        ];            
        $this->validate($request, $rules,$messages);

        $operations = new Operation();
        $operations->cantidad = $request->input('cantidad');
        $operations->article_id = $request->input('article_id');
        $operations->operation_type_id = '1';
        $operations->save();

        $articles = Article::find($id);
        $articles->cant = $request->input('new_cant')+$operations->cantidad = $request->input('cantidad');
        $articles->save();
        
        $title = "Reabastecimiento realizado correctamente!";
        Toastr::success($title);
        return redirect('/admin/inventories');
    }

    //LOGICA DE REABSTECIMIENTOS

// <---------------------------------------------------------------------------------------------------------------->

    //LOGICA REPORTES PDF

    //reporte de artículos
    public function gpdfa(Request $request)
    {
        $filter = $request->input('filter');
        $articles;

        if($filter){
            $articles = Article::leftjoin('categories','articles.category_id','=','categories.id')
            ->leftjoin('sub_categories','articles.sub_category_id','=','sub_categories.id')
            ->leftjoin('users','articles.user_id','=','users.id')
            ->leftjoin('article_states','articles.article_state_id','=','article_states.id')
            ->where('categories.categoria', 'like',"%$filter%")
            ->orwhere('descripcion', 'like',"%$filter%")
            ->orwhere('cant', 'like',"%$filter%")
            ->orwhere('min_stock', 'like',"%$filter%")
            ->orwhere('sub_categories.subcategoria', 'like',"%$filter%")
            ->orwhere('users.name', 'like',"%$filter%")
            ->orwhere('guia', 'like',"%$filter%")
            ->orwhere('fecha', 'like',"%$filter%")
            ->orwhere('nombre_articulo', 'like',"%$filter%")
            ->orwhere('article_states.estado','like',"%$filter%")->get();
        }else{
            $articles = Article::all();
        }
        $view = \View::make('admin.inventories.pdf', compact('articles'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        return $pdf->stream('invoice');
    }
    
    //reporte de químicos
    public function gpdfq(Request $request)
    {
        $filter = $request->input('filter');
        $articles;

        if($filter){
            $articles = Article::where('articles.category_id','=','10')
            ->join('sub_categories','articles.sub_category_id','=','sub_categories.id')
            ->where('articles.nombre_articulo', 'like',"%$filter%")
            ->orwhere('articles.descripcion', 'like',"%$filter%")
            ->orwhere('sag', 'like',"%$filter%")
            ->orwhere('reingreso', 'like',"%$filter%")
            ->orwhere('sub_categories.subcategoria', 'like',"%$filter%")
            ->get();      
        }else{
            $articles = Article::join('sub_categories','articles.sub_category_id','=','sub_categories.id')
            ->select('articles.id','articles.sag','articles.nombre_articulo','articles.cant','articles.reingreso','articles.descripcion','sub_categories.subcategoria')
            ->where('articles.category_id','=','10')
            ->get();
        }
        $view = \View::make('admin.chemicals.pdf', compact('articles'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('invoice');
    }
    
    //reporte de salida de productos químicos
     public function gpdfqs(Request $request)
    {
        $filter = $request->input('filter');
        $operations;

        if($filter){
            $operations = Operation::where('operations.operation_type_id','=','2')
            ->where('articles.category_id','=','10')
            ->join('articles','operations.article_id','=','articles.id')
            ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->join('sectors','operation_details.sector_id','=','sectors.id')
            ->where('operation_details.fecha', 'like',"%$filter%")
            ->orwhere('articles.nombre_articulo', 'like',"%$filter%")
            ->orwhere('sectors.sector', 'like',"%$filter%")
            ->get();
        }else{
            $operations = Operation::where('operations.operation_type_id','=','2')
            ->where('articles.category_id','=','10')
            ->join('articles','operations.article_id','=','articles.id')
            ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->leftjoin('sectors','operation_details.sector_id','=','sectors.id')
            ->get();
        }
        $view = \View::make('admin.chemicals.pdfs', compact('operations'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('invoice');
    }
    
    //reporte de bandejas prestadas
    public function gpdfto(Request $request)
    {
        $filter = $request->input('filter');
        $articles;

        if($filter){
            $operations = Operation::join('articles','operations.article_id','=','articles.id')
            ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->leftjoin('berries','operation_details.berrie_id','berries.id')
            ->leftjoin('sectors','operation_details.sector_id','sectors.id')
            ->whereIn('operations.operation_type_id',[2])
            ->whereIn('articles.category_id',[9])
            ->where('berries.nombre_berrie', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[2])
            ->whereIn('articles.category_id',[9])
            ->orwhere('operation_details.fecha', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[2])
            ->whereIn('articles.category_id',[9])
            ->orwhere('operations.cantidad', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[2])
            ->whereIn('articles.category_id',[9])
            ->orwhere('operation_details.folio', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[2])
            ->whereIn('articles.category_id',[9])
            ->orwhere('articles.nombre_articulo', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[2])
            ->whereIn('articles.category_id',[9])
            ->orwhere('sectors.sector', 'like',"%$filter%")
            ->get();          
        }else{
            $operations = Operation::where('articles.category_id','=','9')
            ->where('operations.operation_type_id','=','2')
            ->leftjoin('articles','operations.article_id','=','articles.id')
            ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
            ->leftjoin('sectors','operation_details.sector_id','=','sectors.id')
            ->get();
        }
        $view = \View::make('admin.trays.pdfto', compact('operations'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('invoice');
    }
    
        //reporte bandejas devueltas
        public function gpdftr(Request $request)
    {
        $filter = $request->input('filter');
        $operations;

        if($filter){
            $operations = Operation::join('articles','operations.article_id','=','articles.id')
            ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->leftjoin('berries','operation_details.berrie_id','berries.id')
            ->leftjoin('sectors','operation_details.sector_id','sectors.id')
            ->whereIn('operations.operation_type_id',[3])
            ->whereIn('articles.category_id',[9])
            ->where('berries.nombre_berrie', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[3])
            ->whereIn('articles.category_id',[9])
            ->orwhere('operation_details.fecha', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[3])
            ->whereIn('articles.category_id',[9])
            ->orwhere('operations.cantidad', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[3])
            ->whereIn('articles.category_id',[9])
            ->orwhere('operation_details.folio', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[3])
            ->whereIn('articles.category_id',[9])
            ->orwhere('articles.nombre_articulo', 'like',"%$filter%")
            ->whereIn('operations.operation_type_id',[3])
            ->whereIn('articles.category_id',[9])
            ->orwhere('sectors.sector', 'like',"%$filter%")
            ->get();     
        }else{
            $operations = Operation::where('articles.category_id','=','9')
            ->where('operations.operation_type_id','=','3')
            ->leftjoin('articles','operations.article_id','=','articles.id')
            ->leftjoin('operation_details','operations.operation_detail_id','=','operation_details.id')
            ->leftjoin('berries','operation_details.berrie_id','=','berries.id')
            ->leftjoin('sectors','operation_details.sector_id','=','sectors.id')
            ->get();
        }
            $view = \View::make('admin.trays.pdftr', compact('operations'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            return $pdf->stream('invoice');
    }

    //LOGICA REPORTES PDF

// <---------------------------------------------------------------------------------------------------------------->

    //LOGICA REPORTES EXCEL

    //reportes inventario
    public function excela()
    {
        Excel::create('Inventario', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
                $articles = Article::leftjoin('categories','articles.category_id','=','categories.id')
                ->leftjoin('sub_categories','articles.sub_category_id','=','sub_categories.id')
                ->leftjoin('states','articles.article_state_id','=','states.id')
                ->select('guia as N° guia','fecha as Fecha','nombre_articulo as Artículo','descripcion as Descripción','states.estado as Estado','cant as Cantidad','min_stock as Stock minimo','categories.categoria as Categoría','sub_categories.subcategoria as Sub Categoría')->get();                
                $sheet->fromArray($articles);
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    }  
    
      //reportes excel bandejas prestadas
      public function excelto()
      {
          Excel::create('Bandejas prestadas', function($excel) {
              $excel->sheet('Excel sheet', function($sheet) {
                  $operations = Operation::where('operations.operation_type_id','=','2')
                  ->where('articles.category_id','=','9')
                  ->join('articles','operations.article_id','=','articles.id')
                  ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
                  ->join('berries','operation_details.berrie_id','berries.id')
                  ->select('operation_details.folio as N° de guia','operation_details.fecha as Fecha prestamo','cantidad as Cantidad','articles.nombre_articulo as Tipo bandeja','berries.nombre_berrie as Huerto')->get();                
                  $sheet->fromArray($operations);
                  $sheet->setOrientation('landscape');
              });
          })->download('xls');
      } 

         //reportes excel bandejas devueltas
         public function exceltr()
         {
             Excel::create('Bandejas devueltas', function($excel) {
                 $excel->sheet('Excel sheet', function($sheet) {
                     $operations = Operation::where('operations.operation_type_id','=','3')
                     ->where('articles.category_id','=','9')
                     ->join('articles','operations.article_id','=','articles.id')
                     ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
                     ->join('berries','operation_details.berrie_id','berries.id')
                     ->select('operation_details.folio as N° de guia','operation_details.fecha as Fecha devolucion','cantidad as Cantidad','articles.nombre_articulo as Tipo bandeja','berries.nombre_berrie as Huerto')->get();                
                     $sheet->fromArray($operations);
                     $sheet->setOrientation('landscape');
                 });
             })->download('xls');
         } 

    //reportes productos químicos
    public function excelq()
    {
        Excel::create('Productos quimicos', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
             
                $articles = Article::where('articles.category_id','=','10')
                ->join('sub_categories','articles.sub_category_id','=','sub_categories.id')
                ->join('categories','articles.category_id','=','categories.id')
                ->select('sag as N° Sag','nombre_articulo as Artículo','cant as Cantidad disponible','min_stock as Stock minimo','reingreso as Periodo de reingreso','descripcion as Descripcion','categories.categoria as Categoría','sub_categories.subcategoria as Sub Categoría')->get();                
                $sheet->fromArray($articles);
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    } 

    //reportes salida productos químicos
    public function excelqs()
    {
        Excel::create('Salida de quimicos', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
             
                $operations = Operation::where('operations.operation_type_id','=','2')
                ->where('articles.category_id','=','10')
                ->join('articles','operations.article_id','=','articles.id')
                ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
                ->leftjoin('sectors','operation_details.sector_id','=','sectors.id')
                ->select('operation_details.fecha as Fecha salida','nombre_articulo as Articulo','sectors.sector as Sector','cantidad as Cantidad','min_stock as Stock minimo')->get();                
                $sheet->fromArray($operations);
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    } 

    //LOGICA REPORTES EXCEL

// <---------------------------------------------------------------------------------------------------------------->

    //LOGICA BUSQUEDAS

    //Funciones para búsquedas

    //búsqueda de artículos
    public function showa(Request $request)
    {
        $query = $request->input('query');

        $articles = Article::leftjoin('categories','articles.category_id','=','categories.id')
        ->leftjoin('sub_categories','articles.sub_category_id','=','sub_categories.id')
        ->leftjoin('users','articles.user_id','=','users.id')
        ->leftjoin('article_states','articles.article_state_id','=','article_states.id')
        ->select('articles.*','categories.categoria','article_states.estado')
        ->where('nombre_articulo', 'like',"%$query%")
        ->orwhere('descripcion', 'like',"%$query%")
        ->orwhere('categories.categoria', 'like',"%$query%")
        ->orwhere('cant', 'like',"%$query%")
        ->orwhere('guia', 'like',"%$query%")
        ->orwhere('fecha', 'like',"%$query%")
        ->orwhere('article_states.estado', 'like',"%$query%")
        ->paginate(20); 
            
        if(empty($query)){  
            $title = "ingrese un criterio para la búsqueda";
            Toastr::warning($title);

            return redirect('/admin/inventories/');
        }   

        return view('admin.inventories.index')->with(compact('articles','query'));       
    }
    
    //busqueda de productos químicos
    public function showq(Request $request)
    {
        $query = $request->input('query'); 
        
        $articles = Article::where('articles.category_id','=','10')
        ->join('sub_categories','articles.sub_category_id','=','sub_categories.id')
        ->where('articles.nombre_articulo', 'like',"%$query%")
        ->orwhere('articles.descripcion', 'like',"%$query%")
        ->orwhere('articles.cant', 'like',"%$query%")
        ->orwhere('sag', 'like',"%$query%")
        ->orwhere('reingreso', 'like',"%$query%")
        ->orwhere('sub_categories.subcategoria', 'like',"%$query%")
        ->paginate(20); 
    
        if(empty($query)){
                
            $title = "ingrese un criterio para la búsqueda";
            Toastr::warning($title);
                
            return redirect('/admin/chemicals_in/');       
        }
    
        return view('admin.chemicals.chemicals_in')->with(compact('articles','query')); 
    }
    
    //búsqueda de productos químicos
    public function showqs(Request $request)
    {
        $query = $request->input('query');
    
        $operations = Operation::where('operations.operation_type_id','=','2')
        ->where('articles.category_id','=','10')
        ->join('articles','operations.article_id','=','articles.id')
        ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->join('sectors','operation_details.sector_id','=','sectors.id')
        ->where('operations.cantidad', 'like',"%$query%")
        ->orwhere('operation_details.fecha', 'like',"%$query%")
        ->orwhere('articles.nombre_articulo', 'like',"%$query%")
        ->orwhere('sectors.sector', 'like',"%$query%")
        ->paginate(6);
        
             
        if(empty($query)){  
            $title = "ingrese un criterio para la búsqueda";
            Toastr::warning($title);

            return redirect('/admin/chemicals_out/');
        }   

        return view('admin.chemicals.chemicals_out')->with(compact('operations','query'));
    }

    //búsqueda de bandejas prestadas
    public function showts(Request $request)
    {
        $query = $request->input('query');
    
        $berries = Berrie::all();
        
        $operations = Operation::join('articles','operations.article_id','=','articles.id')
        ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','berries.id')
        ->leftjoin('sectors','operation_details.sector_id','sectors.id')
        ->whereIn('operations.operation_type_id',[2])
        ->whereIn('articles.category_id',[9])
        ->where('berries.nombre_berrie', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[2])
        ->whereIn('articles.category_id',[9])
        ->orwhere('operation_details.fecha', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[2])
        ->whereIn('articles.category_id',[9])
        ->orwhere('operations.cantidad', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[2])
        ->whereIn('articles.category_id',[9])
        ->orwhere('operation_details.folio', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[2])
        ->whereIn('articles.category_id',[9])
        ->orwhere('articles.nombre_articulo', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[2])
        ->whereIn('articles.category_id',[9])
        ->orwhere('sectors.sector', 'like',"%$query%")
        ->paginate(6);
        
        if(empty($query)){
                
            $title = "ingrese un criterio para la búsqueda";
            Toastr::warning($title);
                
            return redirect('/admin/trays_out/');      
        }

        return view('admin.trays.trays_out')->with(compact('operations','berries'));    
    }

    public function showtr(Request $request)
    {
        $query = $request->input('query');
    
        $berries = Berrie::all();
        
        $operations = Operation::join('articles','operations.article_id','=','articles.id')
        ->join('operation_details','operations.operation_detail_id','=','operation_details.id')
        ->leftjoin('berries','operation_details.berrie_id','berries.id')
        ->leftjoin('sectors','operation_details.sector_id','sectors.id')
        ->whereIn('operations.operation_type_id',[3])
        ->whereIn('articles.category_id',[9])
        ->where('berries.nombre_berrie', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[3])
        ->whereIn('articles.category_id',[9])
        ->orwhere('operation_details.fecha', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[3])
        ->whereIn('articles.category_id',[9])
        ->orwhere('operations.cantidad', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[3])
        ->whereIn('articles.category_id',[9])
        ->orwhere('operation_details.folio', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[3])
        ->whereIn('articles.category_id',[9])
        ->orwhere('articles.nombre_articulo', 'like',"%$query%")
        ->whereIn('operations.operation_type_id',[3])
        ->whereIn('articles.category_id',[9])
        ->orwhere('sectors.sector', 'like',"%$query%")
        ->paginate(6);

        if(empty($query)){  
            $title = "ingrese un criterio para la búsqueda";
            Toastr::warning($title);

            return redirect('/admin/trays_return/');
        }
        return view('admin.trays.trays_return')->with(compact('operations','berries'));    
    }


     //FIN LOGICA BUSQUEDAS

     // <---------------------------------------------------------------------------------------------------------------->

 
 
}