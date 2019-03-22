@extends('layouts.app')

@section('content')


<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="col-lg-offset-1 col-lg-10">

                  <h1>Usuarios</h1>
                  </div>
                  </div>
                <div class="row">
                  <div class="col-lg-1">
                  </div>
                  <div class="col-lg-3">
                    <button type="button" class="buttonn" data-toggle="modal" data-target="#myModal">Nuevo Usuario&nbsp;&nbsp;<i class="fa fa-plus"></i></button>
                    </div>
          </div><br>

                <div class="row">
                  <div class="col-lg-offset-1 col-lg-10">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="hidden">ID</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody class="buscar">
                        @foreach ($users as $user)
                        <tr>
                          <td class="hidden">{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td class="td-actions">
                            <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="buttonne-sm" data-toggle="tooltip" title="Establecer Rol"  ><i class="fa fa-shield"></i></a>
                            <form style="display:inline-block;" method="post" action="{{ url('/admin/users/'.$user->id.'/delete') }}">
                              {{ csrf_field() }}
                            <button type="submit" class="buttonnde-sm" data-toggle="tooltip" title="eliminar usuario"><i class="fa fa-trash"></i></button>
                            </form>
                                   
                          </td>
                        </tr>
                      </tbody>
                        @endforeach
                  </table>

                  {{ $users->links() }}

                </div> 

                <!-- Inicio Modal de usuarios -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Crear nuevo usuario</h4>
                      </div>
                      <div class="modal-body"> 
                      <!-- form new user -->
                      <div class="row">
                      <div class="col-lg-offset-1 col-lg-10">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                          
                          {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="example-email-input" class="col-2 col-form-label">Nombre</label>         
                                  <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
    
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="example-email-input" class="col-2 col-form-label">Email</label>
                                  <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="example-email-input" class="col-2 col-form-label">Contraseña</label>
                                  <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                  <input  id="password" type="password" class="form-control" name="password" required>
                              </div>
                              @if ($errors->has('password'))
                              <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
                            </div>

                            <div class="form-group">
                                <label for="example-email-input" class="col-2 col-form-label">Repita contraseña</label>
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                  </div>
                            </div>
           
                            <div class="form-group">
                              <div class="col-md-offset-4 col-lg-7 ">
                              <button type="submit" class="buttonna">Crear usurio <i class="fa fa-floppy-o"></i></button>
                              </div>
                            </div>

                          </form>
                          </div> 
                        </div>
                      </div>
                    </div>
                </div>
              </div>   
            </div> 
                  <!-- /.Termino Modal de usuarios -->
 
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
      </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
@endsection