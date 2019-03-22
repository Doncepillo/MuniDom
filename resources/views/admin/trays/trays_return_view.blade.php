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
                        <a href="{{ url('/admin/trays_return') }}" class="btn btn-success"> Volver </a>
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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-10">
                                <div style="border-radius: 25px;border: 2px solid  #8080ff;" class="col-lg-10">

                                    <h2 style="border-bottom : 2px solid gray">Detalle de devolucion de Bandejas</h2>


                                    <br>

                                    <form class="form-horizontal" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                @if(Session::has('message'))
                                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-lg-6">
                                                <label for="id" class="control-label">Folio (N° Guia de despacho)*</label>

                                                <h4>{{ $operations->folio}}</h4>

                                            </div>
                                            <div class="col-lg-4">
                                                <label for="fono" class="control-label">Cantidad de bandejas solicitadas</label>
                                                <h4>{{ $operations->cantidad}}</h4>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <h4>
                                                    <label for="nombres" class="control-label">Tipo de bandeja</label>
                                                </h4>
                                                <h4>{{ $operations->nombre_articulo}}</h4>
                                            </div>

                                            <div class="col-lg-6">
                                                <label for="berrie" class="control-label">Fecha de devolucion</label>
                                                <h4>{{ $operations->fecha }}</h4>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <label for="berrie" class="control-label">Huerto solicitante</label>
                                                <div class="input-group">

                                                    <select data-live-search="true" class="form-control " name="berrie_id" id="berrie_id" disabled>
                                                        @foreach ($berries as $berrie)
                                                        <option value="{{ $berrie->id }}" selected> {{ $berrie->nombre_berrie }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label for="berrie" class="control-label">Descripción</label>
                                                    <h4>{{ $operations->description }}</h4>
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-6">

                                                    <input type="text" name="article_id" id="id" class="form-control hidden">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <label for="worker" class="control-label">Responsable</label>
                                                <div class="input-group">

                                                    <select data-live-search="true" class="form-control " name="worker_id" id="worker_id" disabled>
                                                        @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">
                                                            {{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        <br>


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