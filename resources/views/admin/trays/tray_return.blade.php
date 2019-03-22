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
                        <a href="{{ url('/admin/trays_out') }}">
                            <img class="l" src="{{asset('/img/l.png')}}">
                        </a>&nbsp;&nbsp;&nbsp; Devolución de Bandejas
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
                                <div class="col-lg-10">
                                    <div class="col-lg-offset-2 col-lg-12">
                                        <div class="modal-content">

                                            <h4 class="modal-title text-center">Resumen por bandejas</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-offset-3 col-sm-6">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">
                                                                    Tipo Bandeja
                                                                </th>
                                                                <th class="text-center">
                                                                    Cantidad Prestadas
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($tipo_prestadas as $t_p)
                                                            <tr>
                                                                <td>
                                                                    <input readonly type="text" class="form-control text-center" value="{{ $t_p->articulo }}">
                                                                </td>
                                                                <td>
                                                                    <input readonly type="text" class="form-control text-center v1" id="v1" name="new_cant" value="{{ $t_p->total }}">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-offset-3 col-sm-6">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                Tipo Bandeja
                                                            </th>
                                                            <th class="text-center">
                                                                Cantidad Devueltas
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tipo_devueltas as $t_d)
                                                        <tr>
                                                            <td>
                                                                <input readonly type="text" class="form-control text-center " value="{{ $t_d->articulo }}">
                                                            </td>
                                                            <td>
                                                                <input readonly type="text" class="form-control text-center v2" id="v2" value="{{ $t_d->total }}">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>

                                            </div>

                                        </div>


                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>



                                    <form class="form-horizontal" method="post" action="{{ url('/admin/trays/tray_in_store') }}">

                                        {{ csrf_field() }}
                                        <div class="row">

                                            <div class="hidden">
                                                <div class="col-lg-3">
                                                    <label for="fono" class="control-label text-center">&nbsp;&nbsp;&nbsp;&nbsp;Prestadas</label>
                                                    <input readonly type="text" class="form-control input-lg text-center" id="b_p" value=0>

                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="fono" class="control-label text-center">&nbsp;&nbsp;&nbsp;&nbsp;Devueltas</label>
                                                    <input readonly type="text" class="form-control input-lg text-center" id="b_d" value=0>

                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="fono" class="control-label text-center">&nbsp;&nbsp;&nbsp;&nbsp;saldo</label>
                                                    <input readonly type="text" class="form-control input-lg text-center" id="s_b" value=0 name="pendientes">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    @if(Session::has('message'))
                                                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-3 col-sm-10">
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-1 col-lg-4">
                                                            <label for="id" class="control-label">Folio (N° Guia de despacho)*</label>
                                                            <div class="input-group">
                                                                <input maxlength="5" type="text" name="folio" id="id" class="select-field-guia" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-offset-4 col-sm-1">
                                                            <img style="margin-top:15px;postion:absolute" class="l" src="{{asset('/img/t.png')}}">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-lg-offset-1 col-lg-5">
                                                            <label for="berrie" class="control-label">Huerto</label>
                                                            <div class="input-group">
                                                                <select data-live-search="true" class="select-field" name="berrie_id" id="berrie_id">
                                                                    @foreach ($berries as $berrie)
                                                                    <option value="{{ $berrie->id }}" selected> {{ $berrie->nombre_berrie }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="fono" class="control-label">Tipo de bandeja</label>
                                                            <div class="input-group">
                                                                <select data-live-search="true" class="select-field" name="article_id" id="article_id">
                                                                    <option value="">Seleccione bandeja:</option>
                                                                    @foreach ($articles as $article)
                                                                    <option value="{{ $article->id }}"> {{ $article->nombre_articulo }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <div class=" col-lg-offset-1 col-lg-5">
                                                            <label for="fono" class="control-label">Cantidad Bandejas devueltas</label>
                                                            <div class="input-group">
                                                                <input maxlength="5" type="text" class="select-field-guia" id="cantidad" name="cantidad" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ">
                                                            <label for="berrie" class="control-label">Fecha devolución</label>
                                                            <div class="input-group">
                                                                <input type="date" name="fecha" class="select-field" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-offset-1 col-lg-5">
                                                            <label for="fono" class="control-label">Responsable</label>
                                                            <div class="input-group">
                                                                <select data-live-search="true" class="select-field" name="user_id" id="user">
                                                                    <option value="">Seleccione Responsable:</option>
                                                                    @foreach ($users as $user)
                                                                    <option value="{{ $user->id }}"> {{ $user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="fono" class="control-label">Descripcion</label>
                                                            <div class="input-group">
                                                                <input required name="description" class="select-field" value="{{old('descripcion')}}" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-offset-7">
                                                            <button type="submit" class="buttonna">Generar devolución
                                                                <i class="fa fa-floppy-o"></i>
                                                            </button>
                                                            <div class="col-sm3">
                                                                <label for="fono" class="control-label"></label>
                                                                <div class="input-group">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="form-group">

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

                <!-- Trigger the modal with a button -->


                <!-- Modal -->


                <!-- Modal content-->


            </div>
        </div>

        <div class="form-group hidden">
            <div class="col-lg-3">
                <label for="fono" class="control-label text-center">&nbsp;&nbsp;&nbsp;&nbsp;Nº bandejas prestadas a la fecha</label>
                <input readonly type="text" class="form-control input-lg text-center" id="prestadas" value="{{ $prestadas->cant }}">
            </div>
            <div class="col-lg-3">
                <label for="fono" class="control-label text-center">&nbsp;&nbsp;&nbsp;&nbsp;Nº bandejas devueltas a la fecha</label>
                <input readonly type="text" class="form-control input-lg text-center" id="devueltas" value="{{ $devueltas->cant }}">
            </div>
            <div class="col-lg-3">
                <label for="fono" class="control-label text-center">&nbsp;&nbsp;&nbsp;&nbsp;Nº bandejas pendientes</label>
                <input readonly type="text" class="form-control input-lg text-center" id="saldo" value="{{$saldo_bandejas}}">
            </div>
            <div class="col-lg-3">
                <button type="button" class="buttonn" data-toggle="modal" data-target="#tipo_bandejas">Ver resumen</button>
            </div>
        </div>





    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Fin-Contenido-->
@endsection