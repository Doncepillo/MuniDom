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
                  <a type="button"  href="{{url('/admin/trays_return')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp
            <b> Se encontraron  {{ $operations->count() }} Resultados.</b>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="col-lg-offset-1 col-lg-10">
              <div class="col-lg-10">
                    <h2>Devolución de Bandejas</h2>
                    </div>
            </div>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-8">
                <form method="get" action="{{ url('/searchtr') }}">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <input name="query" type="text" class="form-control" placeholder="Buscar Articulo">
                  </div><br>
                  
                  <a class="buttonn" target="_blanck" id="btnGenerarPdfTR" class="btn btn-success">Genenerar PDF&nbsp;&nbsp;
                      <i class="fa fa-file-pdf-o"></i>
                    </a>
                  <a class="buttonn" href="{{ route('operationss.excel') }}" class="btn btn-success btn-sm">Genenerar Excel&nbsp;&nbsp;
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
                                  <th class="hidden">ID</th>
                                  <th>Guia de despacho</th>
                                  <th>Fecha</th>
                                  <th>Artículo </th>
                                  <th>Empresa</th>
                                  <th>Bandejas devueltas</th>
                                  <th>Opciones</th>
                                </tr>
                              </thead>
                              <tbody class="buscar">
                              @if(count($operations)>0)
                                @foreach ($operations as $operation)
                                <tr>
                                  <td class="hidden">{{ $operation->id }}</td>
                                  <td>{{ $operation->folio }}</td>
                                  <td>{{ $operation->fecha }}</td>
                                  <td>{{ $operation->nombre_articulo }}</td>
                                  <td>{{ $operation->nombre_berrie }}</td>
                                  <td>{{ $operation->cantidad }}</td>
                                  <td class="td-actions"> 
                                  <a data-toggle="tooltip"  title="detalle Guia" href="{{ url('/admin/trays/'.$operation->id.'/trays_return_view') }}" class="buttonnd-sm">Detalle Guia&nbsp;&nbsp;<i class="fa fa-eye"></i></a>
                                  <form style="display:inline-block;" method="post" action="{{ url('/admin/trays/'.$operation->id.'/delete') }}">
                          {{ csrf_field() }}
                          @can('trays.destroytr')
                          <button  data-toggle="tooltip" class="buttonnde-sm" title="eliminar devolucion">
                            <i class="fa fa-trash"></i>
                          </button>
                          @endcan
                          </form>
                                  </td>
                                </tr>
                              </tbody>
                              @endforeach 
                  @else
                  <div style="position:absolute;visibility:visible z-index:1;top:-190px;left:722px;border-radius: 10px;opacity:0.8;" class="buttonn">
                    <i class="fa fa-exclamation"></i> No se encontraron resultados
                  </div>
                  @endif
                          </table>
                          {{ $operations->links() }}
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