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
                  <div class="col-lg-offset-1 col-lg-10">
                    <h2 >Registro de trabajadores</h2>
                    <br>

                    <form class="form-horizontal">
                    {{ csrf_field() }}
                    
                    <div class="col-lg-6">
                        <label for="fono" class="control-label">Entradas</label>
                        <input type="text" name="cantidad" class="form-control" id="fono" value=" {{ $entradas->cantidad}}">
                    </div> 
                    <div class="col-lg-6">
                        <label for="fono" class="control-label">salidas</label>
                        <input type="text" name="cantidad" class="form-control" id="fono" value=" {{ $salidas->cantidad}}">
                    </div> 
                    <div class="col-lg-6">
                        <label for="fono" class="control-label">total</label>
                        <input type="text" name="cantidad" class="form-control" id="fono" value=" {{ $stock}}">
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