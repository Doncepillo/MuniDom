@extends('layouts.app') @section('content')
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
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

                        <div class="row">
                            <div class="col-lg-10">
                                <h2>Préstamo de Bandejas</h2>
                                <br>
                                <form class="form-horizontal" method="post" action=" {{ url('/admin/trays') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="id" class="control-label">ID Bandejas *</label>
                                            <input type="text" name="article_id" id="id" class="form-control" value=" {{ $articles->id }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="nombres" class="control-label">Nombres *</label>
                                            <input type="text" name="nombre_articulo" id="nombres" class="form-control" value=" {{ $articles->nombre_articulo }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Cantidad de bandejas disponibles</label>
                                            <input type="text" name="fono" class="form-control" id="fono" value=" {{ $articles->operation_cantidad}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="berrie" class="control-label">Berrie solicitante</label>
                                            <select class="form-control" name="berrie_id" id="berrie">
                                                <option value="0">Seleccione Berrie dirigida</option>
                                                @foreach ($berries as $berrie)
                                                <option value="{{ $berrie->id }}"> {{ $berrie->nombre_berrie }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="fono" class="control-label">Cantidad de bandejas solicitadas</label>
                                            <input type="text" name="cantidad" class="form-control" id="fono" value=" {{ $articles->operation_cantidad}}">
                                        </div>
                                    </div>


                                    <br>
                                    <div class="form-group">
                                        <div class="col-lg-offset-8 col-lg-4">
                                            <button type="submit" class="btn btn-info">Actualizar datos de Trabajador</button>                                            &nbsp;
                                            <a href="{{ url('/admin/trays') }}" class="btn btn-default"> Cancelar </a>
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