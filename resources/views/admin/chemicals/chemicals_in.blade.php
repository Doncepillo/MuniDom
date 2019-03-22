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
                  <a type="button"  href="{{url('/admin/chemicals_in')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp
           <b> Se encontraron  {{ $articles->count() }} Resultados.</b>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="col-lg-offset-1 col-lg-10">
              <div class="col-lg-10">
                    <h2>Químicos</h2>
                    </div>
            </div>
            <div class="row">
              <div class="col-lg-offset-1 col-lg-8">
                <form method="get" action="{{ url('/searchq') }}">
                  <div class="input-group">
                    <div class="input-group-btn">
                    @can('chemicals.showq')
                      <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                   
                    </div>
                    <input name="query" type="text" class="select-field-search" placeholder="Buscar Quimico">
                  </div>
                  @endcan
                  <br>
                  @can('chemicals.gpdfq')
                    <a class="buttonn" target="_blanck" id="btnGenerarPdfQ" class="btn btn-success">Generar PDF&nbsp;&nbsp;
                      <i class="fa fa-file-pdf-o"></i>
                    </a>
                  @endcan
                  <a class="buttonn" href="{{ route('articles.excel') }}" class="btn btn-success btn-sm">Genenerar Excel&nbsp;&nbsp;
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
                                  <th>N° Sag </th>
                                  <th>Artículo </th>
                                  <th>Cantidad Disponible</th>
                                  <th>Periodo reingreso</th>
                                  <th>Ingrediente activo</th>
                                  <th>Sub Categoría</th>
                                  <th>Opciones</th>
                                </tr>
                              </thead>
                              <tbody class="buscar">
                              @if(count($articles)>0)
                                @foreach ($articles as $article)
                                <tr>
                                  <td class="hidden">{{ $article->id }}</td>
                                  <td>{{ $article->sag }}</td>
                                  <td>{{ $article->nombre_articulo }}</td>
                                  @if($article->cant < $article->min_stock)
                                  <td class="rojo">{{ $article->cant }} stock critico!</td>
                                  @elseif($article->cant == $article->min_stock)
                                  <td class="rojo">{{ $article->cant }} stock critico!</td>
                                  @elseif($article->cant > $article->min_stock)
                                  <td class="nombre">{{ $article->cant }}</td>
                                  @endif
                                  <td>{{ $article->reingreso }}</td>
                                  <td>{{ $article->descripcion }}</td>
                                  <td>{{ $article->subcategoria }}</td>
                                  <td class="td-actions"> 
                                  @can('chemicals.chemical_out')
                                    <a href="{{ url('/admin/chemicals/'.$article->id.'/chemical_out') }}" class="buttonn">Generar Salida &nbsp;&nbsp; <i class="fa fa-clipboard"></i></a>
                                  @endcan
                                    </td>
                                </tr>
                              </tbody>
                              
                                @endforeach
                                @else
                    <div style="position:absolute;visibility:visible z-index:1;top:-190px;left:722px;border-radius: 10px;opacity:0.8;"  class="buttonn">
                    <i class="fa fa-exclamation"></i>  No se encontraron resultados
                    </div>
                    @endif 
                          </table>
                          {{ $articles->links() }}
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