@extends('layouts.app')

@section('content')
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
                    <h2>Registro de Cargos de Trabajo</h2>
                    <br>
                <form class="form-horizontal" method="post" action="{{ url('/admin/positions') }}">

                    {{ csrf_field() }}

                <div class="form-group">
                  <div class="col-lg-6">
                    <label for="cargo" class="control-label">Nombres Cargo *</label>
                    <input type="text" name="cargo" id="cargo" class="form-control" required >
                  </div>
                  <div class="col-lg-6">
                    <label for="descripcion" class="control-label">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" id="descripcion">
                  </div>    
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-10 col-lg-2">
                    <button type="submit" class="btn btn-success">Agregar Cargo</button>
                  </div>
                </div>  

                </form>

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