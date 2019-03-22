@extends('layouts.app') @section('content')
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <a type="button"  href="{{url('/admin/workers')}}"><img class="l" src="{{asset('/img/l.png')}}"></a>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>

                            <button class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                        <div class="row">
                        <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-2 col-lg-7">
                        <div class="row">
                        <div class="col-lg-offset-1 col-sm-4">        
                                <h3 style="border-bottom : 1px solid #E8D7EA">Editar trabajador</h3>
                                </div>
                                <div class="col-sm-3">
                                <img style="position:absolute;margin-left:-38px;" src="{{asset('/img/w.png')}}">
                                </div>
                                </div>

                <br>
                                <form class="form-horizontal" method="post" action="{{ url('/admin/workers/'.$worker->id.'/edit') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-5">
                                            <label for="rut" class="control-label">Rut</label>
                                            <div class="input-group">
                                                <input maxlength="12" onkeyup="this.value = formatterRut(this.value)" type="text" name="rut" id="rut" class="select-field"  value=" {{ $worker->rut }}"  required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="localidad" class="control-label">Localidad</label>
                                            <div class="input-group">
                                                <select class="select-field" data-live-search="true" name="location_id" id="location_id">
                                                    <option value="">Seleccione localidad</option>
                                                    @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}" @if($location->id == old('location_id', $worker->location_id)) selected @endif> {{ $location->localidad}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-5">
                                            <label for="nombres" class="control-label">Nombres</label>
                                            <div class="input-group">
                                                <input maxlength="30" type="text" name="nombre" id="nombres" class="select-field" value=" {{ $worker->nombre }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="apellidos" class="control-label">Apellidos</label>
                                            <div class="input-group">
                                                <input maxlength="30" type="text" name="apellidos" class="select-field" id="apellidos" value=" {{ $worker->apellidos }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-5">
                                            <label for="fecha_nacimiento" class="control-label">Fecha de Nacimiento</label>
                                            <div class="input-group">
                                                <input type="text" name="fecha_nacimiento" class="select-field" id="fecha_nacimiento" value=" {{ $worker->fecha_nacimiento }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="direccion" class="control-label">Dirección</label>
                                            <div class="input-group">
                                                <input maxlength="35" type="text" name="direccion" class="select-field" id="direccion" value=" {{ $worker->direccion }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-5">
                                            <label for="fono" class="control-label">Teléfono</label>
                                            <div class="input-group">
                                                <input maxlength="8" type="text" name="fono" class="select-field" id="fono" value=" {{ $worker->fono }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="fono" class="control-label">Cargo</label>
                                            <div class="input-group">
                                                <select class="select-field" data-live-search="true" name="position_id" id="position_id">
                                                    <option value="">General</option>
                                                    @foreach ($positions as $position)
                                                    <option value="{{ $position->id }}" @if($position->id == old('position_id', $worker->position_id)) selected @endif> {{ $position->cargo
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-5">
                                            <label for="cargo" class="control-label">Nacionalidad</label>
                                            <div class="input-group">
                                                <select name="nationality_id" data-live-search="true" id="nacionalidad" class="select-field">
                                                    <option value="">General</option>
                                                    @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}" @if($nationality->id == old('nationality_id', $worker->nationality_id)) selected @endif>
                                                        {{ $nationality->nacionalidad }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="cargo" class="control-label">Estado</label>
                                            <div class="input-group">
                                                <select name="state_id" data-live-search="true" id="estado" class="select-field">
                                                    <option value="">General</option>
                                                    @foreach ($states as $state)
                                                    <option value="{{ $state->id }}" @if($state->id == old('state_id', $worker->state_id)) selected @endif> {{ $state->estado
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-1 col-lg-5">
                                            <label for="sexo" class="control-label">Sexo</label>
                                            <div class="input-group">
                                                <select class="select-field" data-live-search="true" name="gender_id" id="gender_id">
                                                    <option value="">Sexo</option>
                                                    @foreach ($genders as $gender)
                                                    <option value="{{ $gender->id }}" @if($gender->id == old('gender_id', $worker->gender_id)) selected @endif> {{ $gender->genero
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <label for="sexo" class="control-label"></label>
                                            <div class="input-group">
                                        <button type="submit" class="buttonna">Actualizar Trabajador <i class="fa fa-floppy-o"></i></button>
                                    </div>
                                    </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Fin-Contenido-->
@endsection