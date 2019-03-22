<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use App\Position;
use App\Gender;
use App\Nationality;
use App\State;
use App\Location;
use PDF;
use Illuminate\Support\Facades\Input;
use RUT;
use Toastr;
use Excel;



class WorkersController extends Controller
{

    public function index()
    {   
        $workers = Worker::paginate(22);
        return view('admin.workers.index')->with(compact('workers'));
    }

    public function excelw()
    {
        Excel::create('Trabajadores', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
                $workers = Worker::leftjoin('positions','workers.position_id','=','positions.id')
                ->leftjoin('nationalities','workers.nationality_id','=','nationalities.id')
                ->leftjoin('genders','workers.gender_id','=','genders.id')
                ->leftjoin('states','workers.state_id','=','states.id')
                ->leftjoin('locations','workers.location_id','=','locations.id')
                ->select('rut as Rut','nombre as Nombres','apellidos as Apellidos','fecha_nacimiento as Fecha de nacimiento','direccion as Direccion','fono as Telefono','positions.cargo as Cargo','genders.genero as Genero','nationalities.nacionalidad as Nacionalidad','locations.localidad as Localidad','states.estado as Estado')->get();                
                $sheet->fromArray($workers);
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    } 

    
    
    public function gpdf(Request $request)
    {
        $filter = $request->input('filter');
        $workers;
        if($filter){
            $workers = Worker::join('positions','workers.position_id','=','positions.id')
            ->join('nationalities','workers.nationality_id','=','nationalities.id')
            ->join('genders','workers.gender_id','=','genders.id')
            ->join('states','workers.state_id','=','states.id')
            ->join('locations','workers.location_id','=','locations.id')
            ->where('positions.cargo','like',"%$filter%")
            ->orwhere('apellidos', 'like',"%$filter%")
            ->orwhere('rut', 'like',"%$filter%")
            ->orwhere('nombre', 'like',"%$filter%")
            ->orwhere('nationalities.nacionalidad', 'like',"%$filter%")
            ->orwhere('genders.genero', 'like',"%$filter%")
            ->orwhere('locations.localidad', 'like',"%$filter%")
            ->orwhere('states.estado','like',"%$filter%")->get();
        }else{

            $workers = Worker::all();
        }
        

        $view = \View::make('admin.workers.pdf', compact('workers'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

   

    public function show(Request $request)
    {
        
        $query = $request->input('query');
        $workers = Worker::leftjoin('positions','workers.position_id','=','positions.id')
        ->leftjoin('nationalities','workers.nationality_id','=','nationalities.id')
        ->leftjoin('genders','workers.gender_id','=','genders.id')
        ->leftjoin('states','workers.state_id','=','states.id')
        ->leftjoin('locations','workers.location_id','=','locations.id')
        ->select('workers.*','positions.cargo')
        ->where('nombre', 'like',"%$query%")
        ->orwhere('apellidos', 'like',"%$query%")
        ->orwhere('fono', 'like',"%$query%")
        ->orwhere('rut', 'like',"%$query%")
        ->orwhere('positions.cargo', 'like',"%$query%")
        ->orwhere('nationalities.nacionalidad', 'like',"%$query%")
        ->orwhere('genders.genero', 'like',"%$query%")
        ->orwhere('states.estado','like',"%$query%")
        ->orwhere('locations.localidad','like',"%$query%")
        ->paginate(22); 
        if(empty($query)){
            
            $title = "ingrese un criterio para la búsqueda";
            Toastr::warning($title);
            return redirect('/admin/workers/');
        }   
     
        return view('admin.workers.index')->with(compact('workers','query'));
        
    }

    public function create()
    {
        $positions = Position::orderBy('cargo')->get();
        $genders = Gender::orderBy('genero')->get();
        $nationalities = Nationality::orderBy('nacionalidad')->get();
        $states = State::orderBy('estado')->get();
        $locations = Location::orderBy('localidad')->get();
        return view('admin.workers.create')->with(compact('positions','genders','nationalities','states','locations'));
    }

    public function store(Request $request)
    {
        //validar trabajador
        $messages = [
            'rut.unique' => 'Este rut ya se encuentra registrado',
            'nombre.alpha_spaces' => 'Campo nombres es necesario solo caracteres',
            'apellidos.alpha_spaces' => 'Campo apellidos es necesario solo caracteres',
            'fono.min' => 'Campo telefono es necesario 8 digitos',
            'fono.numeric' => 'Campo telefono es necesario solo numeros',
            'gender_id.required' => 'Campo sexo es necesario',
            'nationality_id.required' => 'Campo nacionalidad es necesario',
            'state_id.required' => 'Campo estado es necesario',
            'position_id.required' => 'Campo Cargo es necesario',
            'location_id.required' => 'Campo Localidad es necesario',
            
        ];    
        $rules = [
            'rut' => 'required|unique:workers',
            'nombre' => 'alpha_spaces',
            'apellidos' => 'alpha_spaces',
            'fono' => 'min:8|numeric',
            'position_id' => 'required',
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'state_id' => 'required',
            'location_id' => 'required',
        ];

        $this->validate($request, $rules,$messages);
        //registrar nuevo trabajador en la bd
    
        $worker = new Worker();
        $worker->rut = $request->input('rut');
        $worker->nombre = $request->input('nombre');
        $worker->apellidos = $request->input('apellidos');
        $worker->fecha_nacimiento = $request->input('fecha_nacimiento');
        $worker->direccion = $request->input('direccion');
        $worker->fono = $request->input('fono');
        $worker->position_id= $request->input('position_id');
        $worker->gender_id= $request->input('gender_id');
        $worker->nationality_id = $request->input('nationality_id');
        $worker->state_id = $request->input('state_id');
        $worker->location_id = $request->input('location_id');

        
        if ($worker->save()) {
            $title = "Trabajador creado correctamente!";
            Toastr::success($title);
            return redirect('/admin/workers');
         
        }
    }

    public function edit($id)
    {
        $positions = Position::orderBy('cargo')->get();
        $genders = Gender::orderBy('genero')->get();
        $nationalities = Nationality::orderBy('nacionalidad')->get();
        $states = State::orderBy('estado')->get();
        $locations = Location::orderBy('localidad')->get();
        $worker = Worker::find($id);
        return view('admin.workers.edit')->with(compact('worker','positions','genders','nationalities','states','locations'));
    }
   
    public function view($id)
    {
        $positions = Position::orderBy('cargo')->get();
        $genders = Gender::orderBy('genero')->get();
        $nationalities = Nationality::orderBy('nacionalidad')->get();
        $states = State::orderBy('estado')->get();
        $locations = Location::orderBy('localidad')->get();
        $worker = Worker::find($id);
        return view('admin.workers.view')->with(compact('worker','positions','genders','nationalities','states','locations'));
    }
   


    public function update(Request $request, $id)
    {
          //validar trabajador
          $messages = [
            'nombre.alpha_spaces' => 'Campo nombre es necesario solo caracteres',
            'apellidos.alpha_spaces' => 'Campo apellidos es necesario solo caracteres',
            'fono.numeric' => 'Campo fono es necesario solo numeros',
            'fono.min' => 'Campo telefono es necesario 8 digitos',
            'gender_id.required' => 'Campo sexo es necesario',
            'nationality_id.required' => 'Campo nacionalidad es necesario',
            'state_id.required' => 'Campo estado del trabajador es necesario',
            'location_id.required' => 'Campo localidad es necesario',
            'position_id.required' => 'Campo cargo es necesario'
        ];    
        $rules = [
            'rut' => 'required',
            'nombre' => 'alpha_spaces',
            'apellidos' => 'alpha_spaces',
            'fono' => 'numeric|min:8',
            'position_id' => 'required',
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'state_id' => 'required',
            'location_id' => 'required'
        ];
        $this->validate($request, $rules,$messages);

        //registrar nuevo trabajador en la bd
        $worker = Worker::find($id);
        $worker->rut = $request->input('rut');
        $worker->nombre = $request->input('nombre');
        $worker->apellidos = $request->input('apellidos');
        $worker->fecha_nacimiento = $request->input('fecha_nacimiento');
        $worker->direccion = $request->input('direccion');
        $worker->fono = $request->input('fono');
        $worker->position_id = $request->input('position_id');
        $worker->nationality_id = $request->input('nationality_id');
        $worker->state_id = $request->input('state_id');
        $worker->gender_id = $request->input('gender_id');
        $worker->location_id = $request->input('location_id');
        $worker->save();

        $title = "Trabajador editado correctamente!";
        Toastr::success($title);
        return redirect('/admin/workers');
    }

    public function destroy($id)
    {
        $worker = Worker::find($id);
        $worker->delete();
        $title = "Trabajador Eliminado correctamente!";
        Toastr::success($title);
        return back();
    }

}
