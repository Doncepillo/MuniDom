@extends('layouts.app') 
@section('content')
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
          <div  class="row">
          <div  class="col-lg-offset-1 col-lg-10">
            
            </div>
            </div>
            <div  style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-2 col-sm-5 ">
              <div  class="row">
              <div class="col-lg-offset-1 col-sm-9">
              <h3 style="border-bottom : 1px solid #D2B4DE">Configuración del Sistema</h3>
              </div>
              <div  class="col-sm">
              <img style="margin-left:-40px;margin-top:15px" class="l" src="{{asset('/img/co.png')}}">
              </div>
              <div class="col-lg-offset-1 col-lg-8">
                <div class="col-sm-12">
                  <a title="Cree, edite y elimine Cargos" data-target="#ModalCT" data-toggle="modal" type="button" class="btn btn-outline-primary">
                    <i class="material-icons">copyright</i> Cargos</a>
                </div>
                <div class="col-sm-12">
                  <a title="Cree, edite y elimine Generos" data-target="#ModalRG" data-toggle="modal" type="button" class="btn btn-outline-primary">
                    <i class="material-icons">accessibility</i> Generos</a>
                </div>
                <div class="col-sm-12">
                  <a title="Cree, edite y elimine Localidades" data-target="#ModalRL" data-toggle="modal" type="button" class="btn btn-outline-primary">
                    <i class="material-icons">location_city</i> Localidades</a>
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <div class="col-sm-12">
                  <a title="Cree, edite y elimine Nacionalidades" data-target="#ModalRN" data-toggle="modal" type="button" class="btn btn-outline-primary">
                    <i class="material-icons">fingerprint</i> Nacionalidades</a>
                </div>
                <div class="col-sm-3">
                  <a title="Cree, edite y elimine Estados" data-target="#ModalRE" data-toggle="modal" type="button" class="btn btn-outline-primary">
                    <i class="material-icons">verified_user</i> Estados</a>
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <div class="col-sm-12">
                  <a title="Cree, edite y elimine Categorias" data-target="#ModalRC" data-toggle="modal" type="button" class="btn btn-outline-primary">
                    <i class="material-icons">content_paste</i> Categorias</a>
                </div>
              

             </div>
              </div>



              <!-- Inicio Modal Registro de Cargos -->
              <div id="ModalCT" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Crear nuevo cargo</h4>
                    </div>
                    <div class="modal-body">
                      <!-- form new user -->
                      <div class="row">
                        <div class="col-lg-offset-1 col-lg-10">
                          <form class="form-horizontal" method="POST" action="{{ url('/admin/positions') }}">

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                              <label for="example-email-input" class="col-2 col-form-label">Nombre de cargo</label>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="cargo" id="cargo" class="form-control" required>
                              </div>
                              @if ($errors->has('cargo'))
                              <span class="help-block">
                                <strong>{{ $errors->first('cargo') }}</strong>
                              </span>
                              @endif
                            </div>

                            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                              <label for="example-email-input" class="col-2 col-form-label">Descripcion del cargo (opcional)</label>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="descripcion" class="form-control" id="descripcion">
                              </div>
                              @if ($errors->has('descripcion'))
                              <span class="help-block">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                              </span>
                              @endif
                            </div>

                            <div class="form-group">
                              <div class="col-md-offset-4 col-lg-7 ">
                              <button type="submit" class="buttonna">Crear Cargo <i class="fa fa-floppy-o"></i></button>
                              </div>
                            </div>

                          </form>
                          <br>
                          <div class="row">
                            <div class="col-lg-offset-1 col-lg-10">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th class="hidden">ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                  </tr>
                                </thead>
                                <tbody class="buscar">
                                  @foreach ($positions as $position)
                                  <tr>
                                    <td class="hidden">{{ $position->id }}</td>
                                    <td>{{ $position->cargo }}</td>
                                    <td>{{ $position->descripcion }}</td>
                                    <td class="td-actions">

                                      <a href="{{ url('/admin/positions/'.$position->id.'/edit') }}" class="buttonne-sm" data-toggle="tooltip" title="editar Cargo">
                                        <i class="fa fa-pencil"></i>
                                      </a>
                                      <form style="display:inline-block;" method="post" action="{{ url('/admin/positions/'.$position->id.'/delete') }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="buttonnde-sm" data-toggle="tooltip" title="eliminar Cargo">
                                          <i class="fa fa-trash"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                </tbody>
                                @endforeach
                              </table>

                            </div>
                          </div>




                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <!-- /.Termino Modal de usuarios -->


            <!-- Inicio Modal Registro de generos -->
            <div id="ModalRG" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear nuevo Genero</h4>
                  </div>
                  <div class="modal-body">
                    <!-- form new user -->
                    <div class="row">
                      <div class="col-lg-offset-1 col-lg-10">
                        <form class="form-horizontal" method="POST" action="{{ url('/admin/genders') }}">

                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="example-email-input" class="col-2 col-form-label">Nombre del Genero</label>
                            <div class="input-group">
                              <span class="input-group-addon">
                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                              </span>
                              <input type="text" name="genero" id="genero" class="form-control" required>
                            </div>
                            @if ($errors->has('name'))
                            <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                          </div>

                          <div class="form-group">
                            <div class="col-md-offset-4 col-lg-7 ">
                              <button type="submit" class="buttonna">Crear Género <i class="fa fa-floppy-o"></i></button>
                            </div>
                          </div>

                        </form>

                        <div class="row">
                          <div class="col-lg-offset-1 col-lg-10">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th class="hidden">ID</th>
                                  <th>Nombre Genero</th>
                                </tr>
                              </thead>
                              <tbody class="buscar">
                                @foreach ($genders as $gender)
                                <tr>
                                  <td class="hidden">{{ $gender->id }}</td>
                                  <td>{{ $gender->genero }}</td>
                                  <td class="td-actions">
                                    <a href="{{ url('/admin/genders/'.$gender->id.'/edit') }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="editar género">
                                      <i class="fa fa-pencil"></i>
                                    </a>
                                    <form style="display:inline-block;" method="post" action="{{ url('/admin/genders/'.$gender->id.'/delete') }}">
                                      {{ csrf_field() }}
                                      <button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" title="eliminar Genero">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                    </form>
                                  </td>
                                </tr>
                              </tbody>
                              @endforeach
                            </table>

                          </div>
                        </div>






                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.Termino Modal de usuarios -->





          <!-- Inicio Modal de localidades -->
          <div id="ModalRL" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Crear nueva localidad</h4>
                </div>
                <div class="modal-body">
                  <!-- form new user -->
                  <div class="row">
                    <div class="col-lg-offset-1 col-lg-10">
                      <form class="form-horizontal" method="POST" action="{{ url('/admin/locations') }}">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="example-email-input" class="col-2 col-form-label">Nombre de la localidad</label>
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="localidad" id="localidad" class="form-control" required>
                          </div>
                          @if ($errors->has('name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                          @endif
                        </div>

                        <div class="form-group">
                          <div class="col-md-offset-4 col-lg-7 ">
                          <button type="submit" class="buttonna">Crear localidad <i class="fa fa-floppy-o"></i></button>
                          </div>
                        </div>

                      </form>

                      <div class="row">
                        <div class="col-lg-offset-1 col-lg-10">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th class="hidden">ID</th>
                                <th>Nombre de Localidad</th>
                              </tr>
                            </thead>
                            <tbody class="buscar">
                              @foreach ($locations as $location)
                              <tr>
                                <td class="hidden">{{ $location->id }}</td>
                                <td>{{ $location->localidad }}</td>
                                <td class="td-actions">
                                  <a href="{{ url('/admin/locations/'.$location->id.'/edit') }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="editar Localidad">
                                    <i class="fa fa-pencil"></i>
                                  </a>
                                  <form style="display:inline-block;" method="post" action="{{ url('/admin/locations/'.$location->id.'/delete') }}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" title="eliminar Localidad">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                  </form>
                                </td>
                              </tr>
                            </tbody>
                            @endforeach
                          </table>

                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.Termino Modal de usuarios -->



        <!-- Inicio Modal de Nacionalidades -->
        <div id="ModalRN" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crear nueva Nacionalidad (Gentilicio)</h4>
              </div>
              <div class="modal-body">
                <!-- form new user -->
                <div class="row">
                  <div class="col-lg-offset-1 col-lg-10">
                    <form class="form-horizontal" method="POST" action="{{ url('/admin/nationalities') }}">

                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="example-email-input" class="col-2 col-form-label">Nombre de nacionalidad</label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                          </span>
                          <input type="text" name="nacionalidad" id="nacionalidad" class="form-control" required>
                        </div>
                        @if ($errors->has('name'))
                        <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <div class="col-md-offset-4 col-lg-7 ">
                        <button type="submit" class="buttonna">Crear nacionalidad <i class="fa fa-floppy-o"></i></button>
                        </div>
                      </div>

                    </form>

                    <div class="row">
                      <div class="col-lg-offset-1 col-lg-10">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="hidden">ID</th>
                              <th>Nacionalidad</th>
                            </tr>
                          </thead>
                          <tbody class="buscar">
                            @foreach ($nationalities as $nationality)
                            <tr>
                              <td class="hidden">{{ $nationality->id }}</td>
                              <td>{{ $nationality->nacionalidad }}</td>
                              <td class="td-actions">
                                <a href="{{ url('/admin/nationalities/'.$nationality->id.'/edit') }}" class="btn btn-xs btn-warning" data-toggle="tooltip"
                                  title="editar Nacionalidad">
                                  <i class="fa fa-pencil"></i>
                                </a>
                                <form style="display:inline-block;" method="post" action="{{ url('/admin/nationalities/'.$nationality->id.'/delete') }}">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" title="eliminar Nacionalidad">
                                    <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                              </td>
                            </tr>
                          </tbody>
                          @endforeach
                        </table>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.Termino Modal de usuarios -->

    <!-- Inicio Modal de Estado del trabajador -->
    <div id="ModalRE" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Crear nuevo Estado del trabajador</h4>
          </div>
          <div class="modal-body">
            <!-- form new user -->
            <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <form class="form-horizontal" method="POST" action="{{ url('/admin/states') }}">

                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="example-email-input" class="col-2 col-form-label">Nombre de Estado</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                      </span>
                      <input type="text" name="estado" id="estado" class="form-control" required>
                    </div>
                    @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-4 col-lg-7 ">
                    <button type="submit" class="buttonna">Crear estado <i class="fa fa-floppy-o"></i></button>
                    </div>
                  </div>

                </form>

                <div class="row">
                  <div class="col-lg-offset-1 col-lg-10">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="hidden">ID</th>
                          <th>Estados disponibles</th>
                        </tr>
                      </thead>
                      <tbody class="buscar">
                        @foreach ($states as $state)
                        <tr>
                          <td class="hidden">{{ $state->id }}</td>
                          <td>{{ $state->estado }}</td>
                          <td class="td-actions">
                            <a href="{{ url('/admin/states/'.$state->id.'/edit') }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="editar Estado">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <form style="display:inline-block;" method="post" action="{{ url('/admin/states/'.$state->id.'/delete') }}">
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" title="eliminar Estado">
                                <i class="fa fa-trash"></i>
                              </button>
                            </form>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- /.Termino Modal de usuarios -->

<!-- Inicio Modal de Categorias -->
<div id="ModalRC" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crear nueva Categoria</h4>
      </div>
      <div class="modal-body">
        <!-- form new user -->
        <div class="row">
          <div class="col-lg-offset-1 col-lg-10">
            <form class="form-horizontal" method="POST" action="{{ url('/admin/categories') }}">

              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="example-email-input" class="col-2 col-form-label">Nombre de Categoria</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                  </span>
                  <input type="text" name="categoria" id="categoria" class="form-control" required>
                </div>
                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group">
                <div class="col-md-offset-4  col-lg-7 ">
                <button type="submit" class="buttonna">Crear categoria <i class="fa fa-floppy-o"></i></button>
                </div>
              </div>

            </form>

            <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="hidden">ID</th>
                      <th>Categorias</th>
                    </tr>
                  </thead>
                  <tbody class="buscar">
                    @foreach ($categories as $categorie)
                    <tr>
                      <td class="hidden">{{ $categorie->id }}</td>
                      <td>{{ $categorie->categoria }}</td>
                      <td class="td-actions">
                        <a href="{{ url('/admin/categories/'.$categorie->id.'/edit') }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="editar Categoria">
                          <i class="fa fa-pencil"></i>
                        </a>
                  
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /.Termino Modal de usuarios -->

        


</div>

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