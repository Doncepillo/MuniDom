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
            <a type="button" href="{{url('/admin/berries')}}">
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
              <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-2 col-lg-7">
                <div class="row">
                  <div class="col-sm-offset-1 col-lg-5">
                    <h3 style="border-bottom : 1px solid #D2B4DE">Registro de Huertos</h3>
                  </div>
                  <div class="col-sm-3">
                    <img style="position:absolute;margin-left:-58px;margin-top:16px;" src="{{asset('/img/e.png')}}">
                  </div>
                </div>
                <br>


               <form class="form-horizontal" method="post" action="{{ url('/admin/berries/'.$berrie->id.'/edit') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <div class="  col-sm-offset-1 col-lg-6">
                      <label for="nombre_berrie" class="control-label">Empresa</label>
                      <div class="input-group">

                        <input maxlength="30" type="text" class="select-field" name="nombre_berrie" id="nombre_berrie" placeholder="Nombre" required
                        value="{{ $berrie->nombre_berrie }}">
                      </div>
                    </div>
                    <div style="margin-left:-68px" class="col-sm-3">
                      <label for="direccion" class="control-label">Direccion Empresa</label>
                      <div class="input-group">

                        <input maxlength="30" type="text" class="select-field" name="direccion" id="direccion" placeholder="Direccion" required     value="{{ $berrie->direccion }}">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">

                    <div class="  col-sm-offset-1 col-lg-5">
                      <label for="representante" class="control-label">Representante</label>
                      <div class="input-group">

                        <input maxlength="30" type="text" class="select-field" name="representante" id="representante" placeholder="Nombre Representante"
                        value="{{ $berrie->representante }}">
                      </div>
                    </div>

                    <div class="col-sm">
                      <label for="rut_empresa" class="control-label">Rut Empresa</label>
                      <div class="input-group">

                        <input maxlength="14" type="text" class="select-field" name="rut_empresa" id="rut_empresa" placeholder="Rut" required     value="{{ $berrie->rut_empresa }}">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <div class="  col-sm-offset-1 col-lg-4">
                      <label for="fono" class="control-label">Telefono</label>
                      <div class="input-group">

                        <input maxlength="8" type="text" class="select-field" name="fono" id="fono" placeholder="Telefono" required     value="{{ $berrie->fono }}">
                      </div>
                    </div>
                  </div>
                  <div class="rows">
                  <div class="col-lg-offset-7 col-sm-4">
                  <button type="submit" class="buttonna">Agregar huerto <i class="fa fa-floppy-o"></i></button>
                  </div>
                </div>
                <div class="  col-sm-offset-1 col-lg-4">
                <label for="fono" class="control-label"></label>
                <div class="input-group">
                </div>
              </div>

              </div>
              <br>

            
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