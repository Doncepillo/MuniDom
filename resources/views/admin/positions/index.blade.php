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
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h2>Cargos de Trabajos</h2>
                      <div class="row">
                      <div class="col-lg-offset-1 col-lg-8">
                          <div class="input-group">
                          <span class="input-group-addon">Buscar</span>
                          <input id="filtrar" type="text" class="form-control" placeholder="Buscar Trabajador">
                        </div>
                        </div>
                        <div class="col-lg-3">
                          <a href="{{ url('/admin/positions/create') }}" class="btn btn-success">Agragar nuevo cargo&nbsp;&nbsp;<i class="fa fa-plus"></i></a> 
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-lg-offset-1 col-lg-10">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th class="hidden">ID</th>
                                  <th>Nombre</th>
                                  <th>Descripción</th>
                                  <th>Fecha de creación</th>
                                </tr>
                              </thead>
                              <tbody class="buscar">
                                @foreach ($positions as $position)
                                <tr>
                                  <td class="hidden">{{ $position->id }}</td>
                                  <td>{{ $position->cargo }}</td>
                                  <td>{{ $position->descripcion }}</td>
                                  <td>{{ $position->created_at }}</td>
                                  <td class="td-actions">
                                  <a href="" class="btn btn-xs btn-info" data-toggle="tooltip" title="ver trabajador" ><i class="fa fa-eye"></i></a> 
                                  <a href="{{ url('/admin/positions/'.$position->id.'/edit') }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="editar trabajador"  ><i class="fa fa-pencil"></i></a>
                                  <a href="" class="btn btn-xs btn-danger" data-toggle="tooltip" title="eliminar trabajador"><i class="fa fa-trash"></i></a>
                                </td>
                                </tr>
                              </tbody>
                                @endforeach
                          </table>
                         
                        </div>       
                    </div>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
            </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
@endsection