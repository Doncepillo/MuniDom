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
            <a type="button" href="{{url('/admin/trays_out')}}">
              <i class="fa fa-refresh" aria-hidden="true"></i>
            </a>&nbsp&nbsp&nbsp
            <b> Se encontraron {{ $operations->count() }} Resultados.</b>
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
            <div class="col-lg-offset-1 col-lg-10">
              <div class="col-lg-10">
                <h2>Registro Bandejas Prestadas</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-8">
                <form method="get" action="{{ url('/searchts') }}">
                  <div class="input-group">
                    <div class="input-group-btn">
                      @can('trays.showts')
                      <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <input name="query" type="text" class="form-control" placeholder="Buscar Articulo"> @endcan
                  </div>
                  <br> @can('trays.tray_in_store')
                  <a href="#" data-toggle="modal" data-target="#myModal" class="buttonn">Registrar Devolución &nbsp;&nbsp;
                    <i class="fa fa-plus"></i>
                  </a>
                  @endcan
                  <a class="buttonn" target="_blanck" id="btnGenerarPdfTO" class="btn btn-success">Genenerar PDF&nbsp;&nbsp;
                    <i class="fa fa-file-pdf-o"></i>
                  </a>
                  <a class="buttonn" href="{{ route('operations.excel') }}" class="btn btn-success btn-sm">Genenerar Excel&nbsp;&nbsp;
                    <i class="fa fa-file-excel-o"></i>
                  </a>
                </form>
              </div>

            </div>
            <br>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-10">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>N° de Guia</th>
                      <th>Fecha</th>
                      <th>Artículo </th>
                      <th>Empresa</th>
                      <th>Cantidad</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody class="buscar">
                    @if(count($operations)>0) @foreach ($operations as $operation)
                    <tr>
                      <td class="hidden">{{ $operation->id }}</td>
                      <td>{{ $operation->folio }}</td>
                      <td>{{ $operation->fecha }}</td>
                      <td>{{ $operation->nombre_articulo }}</td>
                      <td>{{ $operation->nombre_berrie }}</td>
                      <td>{{ $operation->cantidad }}</td>
                      <td class="td-actions">
                        @can('trays.tray_out_view')
                        <a data-toggle="tooltip" title="detalle Guia" href="{{ url('/admin/trays/'.$operation->id.'/tray_out_view') }}" class="buttonnd-sm">Detalle Guia &nbsp;&nbsp;
                          <i class="fa fa-eye"></i>
                        </a>
                        @endcan
                        <form style="display:inline-block;" method="post" action="{{ url('/admin/trayss/'.$operation->id.'/delete') }}">
                          {{ csrf_field() }} @can('trays.destroyto')
                          <button data-toggle="tooltip" class="buttonnde-sm" title="eliminar Guia">
                            <i class="fa fa-trash"></i>
                          </button>
                          @endcan
                        </form>

                      </td>
                    </tr>
                  </tbody>
                  @endforeach @else
                  <div style="position:absolute;visibility:visible z-index:1;top:-190px;left:722px;border-radius: 10px;opacity:0.8;" class="buttonn">
                    <i class="fa fa-exclamation"></i> No se encontraron resultados
                  </div>
                  @endif
                </table>
                {{ $operations->links() }}

                
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Seleccione huerto para continuar</h4>
                      </div>
                      <div class="modal-body">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="hidden">id</th>
                              <th>Empresa</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(count($berries)>0) @foreach ($berries as $berrie)
                            <tr>
                              <td class="hidden">{{ $berrie->id }}</td>
                              <td>{{ $berrie->nombre_berrie }}</td>
                              <td class="td-actions">
                                @can('trays.tray_out_view')
                                <a href="{{ url('/admin/trays/'.$berrie->id.'/tray_return') }}" class="buttonnd-sm">Seleccionar&nbsp;&nbsp;
                                  <i class="fa fa-hand-o-left"></i>
                                </a>
                                @endcan
                              </td>
                            </tr>
                          </tbody>
                          @endforeach @else
                          <div style="position:absolute;visibility:visible z-index:1;top:-190px;left:722px;border-radius: 10px;opacity:0.8;" class="buttonn">
                            <i class="fa fa-exclamation"></i> No se encontraron resultados
                          </div>
                          @endif
                        </table>
                      </div>
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