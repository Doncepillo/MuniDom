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
                        <a type="button" href="{{url('/admin/chemicals_in')}}">
                        <img class="l" src="{{asset('/img/l.png')}}"></a>
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
                            <div  style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);"class="col-lg-offset-2 col-lg-8">
                                <div class="col-lg-10">
                                        <div class="col-lg-offset-7 col-sm-9">
                                                @if($articles->min_stock >= $articles->cant)
                                                    <h3 class="rojo">Disponible: {{ $articles->cant }} unidades stock critico!</h3>
                                                @else
                                                <h3>Disponible: {{ $articles->cant }} unidades</h3>
                                                @endif
                                                </div>
                                                <div class="row">
                                                <div  class="col-lg-offset-2 col-sm-6">
                                                    
                                    <h3 style="border-bottom : 1px solid #D2B4DE">Salida de Quimico</h3>
                                    </div>
                  <div class="col-sm-3">
              <img style="position:absolute;margin-left:-58px;margin-top:16px;" src="{{asset('/img/c.png')}}">
              </div>
              </div>
                                <form class="form-horizontal" method="post" action="{{ url('/admin/chemicals/'.$articles->id.'/chemicalout') }}">

                                    {{ csrf_field() }}

                                    <div class="form-group hidden">
                                        <div class="col-lg-6">
                                            <label for="id" class="control-label">ID Producto quimico *</label>
                                            <input type="text" name="article_id" id="id" class="select-field" value=" {{ $articles->id }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-4">
                                            <label for="nombres" class="control-label">Quimico</label>
                                            <h4> {{ $articles->nombre_articulo }} </h4>
                                        </div>
                                        <div class="col-lg-offset-2 col-sm">
                                            <label for="fono" class="control-label">Cantidad disponible</label>
                                            <h4>{{ $articles->cant }}</h4>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-4">
                                            <label for="fono" class="control-label">Cantidad de salida</label>
                                            <div class="input-group">
                                                <input maxlength="5" type="text" name="cantidad" class="select-field-guia" id="fono" required value="{{ old('cantidad') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="sub_category_id" class="control-label">Sector</label>
                                            <div class="input-group">
                                              <select data-live-search="true" name="sector_id" id="sector_id" class="select-field">
                                                <option value="">Seleccione Sector</option>
                                                @foreach ($sectors as $sector)
                                                <option value="{{ $sector->id }}" @if(old('sector_id') == $sector->id) {{ 'selected' }} @endif> {{ $sector->sector }} </option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                      
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-4">
                                            <label for="berrie" class="control-label">Fecha salida</label>
                                            <div class="input-group">
                                                <input type="date" name="fecha" class="select-field" required value="{{ old('fecha') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6">

                                            <input type="text" name="article_id" id="id" class="form-control hidden">
                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-lg-offset-6 col-lg-4">
                                            
                                            <button type="submit" class="buttonna">Registrar salida
                                                <i class="fa fa-floppy-o"></i></button>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            
                                            <label for="fono" class="control-label"></label>
                                            <input type="text" name="new_cant" class="form-control  hidden" id="fono" value="{{ $articles->cant }}">
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