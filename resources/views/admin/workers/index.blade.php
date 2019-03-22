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
            <a type="button"  href="{{url('/admin/workers')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp
           <b> Se encontraron  {{ $workers->count() }} Resultados.</b>
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
            <div class="workers">
              <div class="col-lg-offset-1 col-lg-8">
                <h2>Trabajadores</h2>
              </div>
              <div class="row">
                <div class="col-lg-offset-1 col-lg-8">
                  <form method="get" action="{{ url('/search') }}">
                    <div class="input-group">
                    @can('workers.show')
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                      <input name="query" type="text" class="select-field-search" placeholder="Buscar trabajador">
                      @endcan
                      </div>
                </form>
              </div>
            </div><br>
                <div class="row">
                <div class="col-lg-offset-1 col-lg-12">
                  @can('workers.create')
                    <a class="buttonn" href="{{ url('admin/workers/create') }}" class="btn btn-success btn-sm">Nuevo Trabajador&nbsp;&nbsp;
                      <i class="fa fa-plus"></i>
                    </a>
                    @endcan
                    @can('workers.gpdf')
                    <a class="buttonn" target="_blanck" id="btnGenerarPdf" class="btn btn-success btn-sm">Genenerar PDF&nbsp;&nbsp;
                      <i class="fa fa-file-pdf-o"></i>
                    </a>
    
                    <a class="buttonn" href="{{ route('workers.excelw') }}" class="btn btn-success btn-sm">Genenerar Excel&nbsp;&nbsp;
                    <i class="fa fa-file-excel-o"></i>
                  </a>
                  @endcan
                </div>
              </div>
            
<br>
              <div class="row">
                <div class="col-lg-offset-1 col-lg-10">
                  <table class="table table-hover ">
                    <thead>
                      <tr>
                        <th class="hidden">ID</th>
                        <th>RUT</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th>Cargo</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($workers)>0)
                      @foreach ($workers as $worker)
                      <tr>
                        <td class="hidden">{{ $worker->id }}</td>
                        <td>{{ $worker->rut }}</td>
                        <td>{{ $worker->nombre }}</td>
                        <td>{{ $worker->apellidos }}</td>
                        <td>{{ $worker->fono }}</td>
                        <td>{{ $worker->state_estado }}</td>
                        <td>{{ $worker->position_cargo }}</td>
                        <td class="td-actions">
                        @can('workers.view')
                          <a  href="{{ url('/admin/workers/'.$worker->id.'/view') }}" class="buttonnd-sm" title="Detalle del trabajador" data-toggle="tooltip">
                            <i class="fa fa-eye"></i>
                          </a>
                        @endcan
                        @can('workers.edit')
                          <a href="{{ url('/admin/workers/'.$worker->id.'/edit') }}" class="buttonne-sm" data-toggle="tooltip" title="editar trabajador">
                            <i class="fa fa-pencil"></i>
                          </a>
                          @endcan
                          <form style="display:inline-block;" method="post" action="{{ url('/admin/workers/'.$worker->id.'/delete') }}">
                          {{ csrf_field() }}
                          @can('workers.destroy')
                          <button  data-toggle="tooltip" class="buttonnde-sm" title="eliminar Trabajador">
                            <i class="fa fa-trash"></i>
                          </button>
                          @endcan
                          </form>
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                    @else
                    <div style="position:absolute;visibility:visible z-index:1;top:-190px;left:722px;border-radius: 10px;opacity:0.8;"  class="buttonn">
                    <i class="fa fa-exclamation"></i> No se encontraron resultados! 
                    </div>
                    @endif 
                  </table>

                  {{ $workers->links() }}

                </div>
              </div>
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