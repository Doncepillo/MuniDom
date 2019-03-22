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
                        <a href="{{ url('/admin/trays_out') }}"><img class="l" src="{{asset('/img/l.png')}}"></a>
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
                            <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-2 col-lg-6">
    <div class="row">  
                  <div class="col-lg-offset-1 col-sm-6">

                                    <h3 style="border-bottom : 2px solid #D2B4DE">Detalle de préstamo</h3>
                                    </div>
                  <div class="col-sm-3">
              <img style="position:absolute;margin-left:-48px;margin-top:16px;" src="{{asset('/img/p.png')}}">
              </div>
              </div>

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

                                            <div class="col-lg-offset-1 col-lg-5">
                                                <label for="id" class="control-label">Folio (N° Guia de despacho)*</label>

                                                <h4>{{ $operations->folio}}</h4>

                                            </div>
                                            <div class="col-lg-4">
                                                <label for="fono" class="control-label">Bandejas solicitadas</label>
                                                <h4>{{ $operations->cantidad}}</h4>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-1 col-lg-4">
                                                <h4>
                                                    <label for="nombres" class="control-label">Tipo de bandeja</label>
                                                </h4>
                                                <h4>{{ $operations->nombre_articulo}}</h4>
                                            </div>

                                            <div class="col-lg-offset-1 col-lg-6">
                                                <label for="berrie" class="control-label">Fecha de solicitud</label>
                                                <h4>{{ $operations->fecha }}</h4>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-1 col-lg-5">
                                                <label for="berrie" class="control-label">Huerto solicitante</label>
                                                <div class="input-group">
                                                <h4>{{ $operations->nombre_berrie }}</h4>
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

                                            <div class="col-lg-offset-1 col-lg-4">
                                                <label for="worker" class="control-label">Responsable</label>
                                                <div class="input-group">

                                                    <select data-live-search="true" class="select-field" name="worker_id" id="worker_id" disabled>
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

