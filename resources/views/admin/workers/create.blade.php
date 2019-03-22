@extends('layouts.app') @section('content')
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <a type="button"  href="{{url('/admin/workers')}}" ><img class="l" src="{{asset('/img/l.png')}}"></a>
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
          <div  class="box-body">
               @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                
            <div  class="row">
              <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-2 col-lg-7">
                <div class="row">
              <div class="col-lg-offset-1 col-sm-6">
              <h3 style="border-bottom : 1px solid #D2B4DE">Registro de trabajadores</h3>
              </div>
              <div class="col-sm-3">
              <img style="position:absolute;margin-left:-68px;" src="{{asset('/img/w.png')}}">
              </div>
              </div>

                <br>
                <form  class="form-horizontal" method="post" action="{{ url('/admin/workers') }}">
                  {{ csrf_field() }}
                  <div  class="form-group">
                    <div class="col-sm-offset-1 col-sm-5">
                      <label for="rut" class="control-label">Rut</label>
                      <div class="input-group">
                        <input type="text" maxlength="12" name="rut" id="rut" class="select-field" onkeyup="this.value = formatterRut(this.value)"
                          required value="{{old('rut')}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <label for="cargo" class="control-label">Localidad</label>
                      <div class="input-group">
                      <select data-live-search="true" name="location_id" id="localidad" class="select-field">
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}" @if(old('location_id') == $location->id) {{ 'selected' }} @endif> {{ $location->localidad }} </option>
                        @endforeach
                      </select>
                  </div>
                  </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-1  col-sm-5">
                      <label for="nombres" class="control-label">Nombres</label>
                      <div class="input-group">
                        <input maxlength="30" type="text" name="nombre" id="nombres" class="select-field" required value="{{old('nombre')}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <label for="apellidos" class="control-label">Apellidos</label>
                      <div class="input-group">
                        <input maxlength="30" type="text" name="apellidos" class="select-field" id="apellidos" required value="{{old('apellidos')}}">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-1  col-sm-5">
                      <label for="fecha_nacimiento" class="control-label">Fecha de Nacimiento</label>
                      <div class="input-group">
                        <input type="date" name="fecha_nacimiento" class="select-field" id="fecha_nacimiento" required value="{{old('fecha_nacimiento')}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <label for="direccion" class="control-label">Dirección</label>
                      <div class="input-group">
                        <input maxlength="35" type="text" name="direccion" class="select-field" id="direccion" required value="{{old('direccion')}}">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-1  col-sm-4">
                      <label for="fono" class="control-label">Teléfono</label>
                      <div class="input-group">
                        <input type="text" maxlength="8" name="fono" class="select-field" id="fono" required value="{{old('fono')}}">
                      </div>
                    </div>
                    <div class="col-sm-offset-1  col-sm-4">
                      <label for="cargo" class="control-label">Cargo</label>
                      <div class="input-group">
                        <select data-live-search="true"  name="position_id" id="cargo" class="select-field" >
                        <option value="">Seleccion Cargo</option>
                          @foreach($positions as $position)
                          <option value="{{ $position->id }}" @if(old('position_id') == $position->id) {{ 'selected' }} @endif>{{ $position->cargo }}  </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  
                    <div class="col-sm-offset-1  col-sm-5">
                      <label for="cargo" class="control-label">Estado</label>
                      <div class="input-group">
                        <select data-live-search="true" name="state_id" id="estado" class="select-field">
                          @foreach($states as $state)
                          <option value="{{ $state->id }}" @if(old('state_id') == $state->id) {{ 'selected' }} @endif> {{ $state->estado }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-sm-4">
                      <label for="cargo" class="control-label">Nacionalidad</label>
                      <div class="input-group">
                      <select data-live-search="true" name="nationality_id" id="nacionalidad" class="select-field">
                        @foreach($nationalities as $nationality)
                        <option value="{{ $nationality->id }}" @if(old('nationality_id') == $nationality->id) {{ 'selected' }} @endif> {{ $nationality->nacionalidad }} </option>
                        @endforeach
                      </select>
                  </div>
                  </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-5">
                      <label for="genero" class="control-label">Sexo</label>
                      <div class="input-group">
                        <select  data-live-search="true" name="gender_id" id="genero" class="select-field">
                          <option value="">Seleccione Sexo</option>
                          @foreach($genders as $gender)
                          <option value="{{ $gender->id }}"@if(old('gender_id') == $gender->id) {{ 'selected' }} @endif> {{ $gender->genero }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-5">
             
                    <label for="direccion" class="control-label"></label>
                      <div class="input-group">
                    <button type="submit" class="buttonna">Agregar Trabajador <i class="fa fa-floppy-o"></i></button>
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