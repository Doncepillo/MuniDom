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
              <h2>Huertos</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-3">
            @can('berries.create')
              <a class="buttonn" href="{{ url('/admin/berries/create') }}" class="btn btn-success">Nueva Empresa
                <i class="fa fa-plus"></i>
              </a>
            @endcan
            </div>
          </div><br>
          <div class="row">
            <div class="col-lg-offset-1 col-lg-10">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="hidden">ID</th>
                    <th>Nombre Empresa</th>
                    <th>Direccion</th>
                    <th>Representante</th>
                    <th>Rut Empresa</th>
                    <th>Telefono</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="buscar">
                  @foreach ($berries as $berrie)
                  <tr>
                    <td class="hidden">{{ $berrie->id }}</td>
                    <td>{{ $berrie->nombre_berrie }}</td>
                    <td>{{ $berrie->direccion }}</td>
                    <td>{{ $berrie->representante }}</td>
                    <td>{{ $berrie->rut_empresa }}</td>
                    <td>{{ $berrie->fono }}</td>
                    <td class="td-actions">
                    @can('berries.edit')
                      <a href="{{ url('/admin/berries/'.$berrie->id.'/edit') }}" class="buttonne-sm" data-toggle="tooltip" title="editar Empresa">
                        <i class="fa fa-pencil"></i>
                      </a>
                    @endcan
                    @can('berries.destroy')
                      <button style="display:inline-block;" data-toggle="modal" data-target="#delete" class="buttonnde-sm" data-toggle="tooltip"
                        title="eliminar Empresa">
                        <i class="fa fa-trash"></i>
                      </button>
                    @endcan
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>


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

<div class="modal" id="delete" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Eliminar Berrie</h4>
      </div>
      <div class="modal-body">
        <h4></h4>
        <p>¿Esta seguro de eliminar el registro?</p>
      </div>
      <div class="modal-footer">
        <div class="btn-group">
          <button class="btn btn-danger" data-dismiss="modal">
            <span class="fa fa-remove"></span> No</button>
          <form style="display:inline-block;" method="post" action="{{ url('/admin/berries/'.$berrie->id.'/delete') }}">
            {{ csrf_field() }}
            <button class="btn btn-primary">
              <span class="fa fa-check"></span> Si</button>
          </form>
        </div>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Fin-Contenido-->
@endsection