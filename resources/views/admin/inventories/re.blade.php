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
                        <a type="button" href="{{url('/admin/inventories')}}">
                            <img class="l" src="{{asset('/img/l.png')}}">
                        </a>
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
                            <div class="container">
                                <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
                                            border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-3 col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-offset-1 col-sm-8">

                                            <h3 style="border-bottom : 1px solid #D2B4DE">Reabastecer:&nbsp;{{ $articles->nombre_articulo }}</h3>
                                        </div>
                                        <div class="col-sm-3">
                                            <img style="position:absolute;margin-left:-38px;margin-top:16px;" src="{{asset('/img/a.png')}}">
                                        </div>
                                    </div>

                                    <br>
                                    <form class="form-horizontal" method="post" action="{{ url('/admin/inventories/'.$articles->id.'/res') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <div class="col-lg-6 hidden">
                                                <label for="id" class="control-label">ID</label>
                                                <input type="text" name="article_id" id="id" class="form-control" value="{{ $articles->id }}">
                                            </div>
                                            <div class="col-lg-offset-1  col-lg-6">
                                                <label for="nombre_articulo" class="control-label">Artículo</label>
                                                <h4>{{ $articles->nombre_articulo }}</h4>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-1  col-lg-3">
                                                <label for="min_stock" class="control-label">En Stock</label>
                                                <h3>{{ $articles->cant }}</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-1  col-lg-4">
                                                <label for="min_stock" class="control-label">Cantidad a abastecer</label>
                                                <div class="input-group">
                                                    <input maxlength="5" type="text" name="cantidad" id="min_stock" class="select-field-guia" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group hidden">
                                            <div class="col-lg-6">
                                                <label for="fono" class="control-label">Valor de stock</label>
                                                <input type="text" name="new_cant" class="form-control" id="fono" value="{{ $articles->cant }}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-9 pull-right">
                                                <button type="submit" class="buttonna">Reabastecer articulo
                                                    <i class="fa fa-floppy-o"></i>
                                                </button>
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