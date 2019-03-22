@extends('layouts.app') @section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <a type="button"  href="{{url('/admin/inventories')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp
           <b> Se encontraron  {{ $articles->count() }} Resultados.</b>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
              <button class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="articles">
              <div class="col-lg col-lg-8">
                <h2>Registros</h2>
              </div>
              <div class="row">
                <div class="col-lg col-lg-8">
                  <form method="get" action="{{ url('/search') }}">
                    <div class="input-group">
                    @can('inventories.search')
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <input name="query" type="text" class="select-field-search" placeholder="Buscar Registro">
                  </div>
                  @endcan
                      </div>
                </form>
              </div>
            </div><br>
                <div class="row">
                <div class="col-lg col-lg-12">
                  @can('articles.create')
                    <a class="buttonn" href="{{ url('admin/inventories/create') }}" class="btn btn-success btn-sm">Nuevo Registro&nbsp;&nbsp;
                      <i class="fa fa-plus"></i>
                    </a>
                  @endcan
                </div>
            </div>
          <br>
            <div class="row" style="overflow: scroll">
              <div class="col-lg col-lg-12">
                <table class="table table-hover" border="1">
                  <thead style="background-color:lightgrey"> 
                    <tr align="center">
                        <th class="hidden">id</th>
                        <th>Número Permiso</th>
                        <th>Tipo de Permiso</th>
                        <th>Especificación Tipo de Permiso</th>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Número Orden Ingreso</th>
                        <th>Destino</th>
                        <th>Permiso de Obra Nueva</th>
                        <th>Rol</th>
                        <th>Dirección</th>
                        <th>Localidad</th>
                        <th>Superficie</th>
                        <th>Pago Cuotas</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="buscar">
                    @if(count($articles)>0) 
                    @foreach ($articles as $article)
                    <tr align="center">
                      <td class="hidden">{{ $article->id }}</td>
                      <td class="nombre">{{ $article->NroPermiso }}</td>
                      <td class="nombre">{{ $article->category_id }}</td>
                  
                      <td class="nombre">{{ $article->sub_category_id }}</td>
                      <td class="nombre">{{ $article->Fecha }}</td>
                      <td class="nombre">{{ $article->Nombre }}</td>
                      <td class="nombre">{{ $article->ApePaterno }}</td>
                      <td class="nombre">{{ $article->ApeMaterno }}</td>
                      <td class="nombre">{{ $article->NroOrdenIngreso }}</td>
                      <td class="nombre">{{ $article->Destino }}</td>
                      <td class="nombre">{{ $article->PerObraNueva }}</td>
                      <td class="nombre">{{ $article->Rol }}</td>
                      <td class="nombre">{{ $article->Direccion }}</td>
                      <td class="nombre">{{ $article->Localidad }}</td>
                      <td class="nombre">{{ $article->Superficie }}</td>
                      <td class="nombre">{{ $article->PagoCuotas }}</td>
                      <td class="td-actions">
                          @can('inventories.detail')
                            <a href="{{ url('/admin/inventories/'.$article->id.'/detail') }}" class="buttonnd-sm" data-toggle="tooltip" title="Detalle del Registro">
                              <i class="fa fa-eye"></i>
                            </a>
                          @endcan
                          @can('inventories.edit')
                            <a href="{{ url('/admin/inventories/'.$article->id.'/edit') }}" class="buttonne-sm" data-toggle="tooltip" title="Editar Registro">
                              <i class="fa fa-pencil"></i>
                            </a>
                          @endcan
                          <form style="display:inline-block;" method="post" action="{{ url('/admin/inventories/'.$article->id.'/delete') }}">
                          {{ csrf_field() }}
                          @can('inventories.destroy')
                              <button data-toggle="tooltip" class="buttonnde-sm" title="Eliminar Registro">
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
                {{ $articles->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection