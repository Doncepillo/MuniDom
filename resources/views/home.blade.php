@extends('layouts.app')
@section('content')
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
                        <style>
                          img{
                            display:block;
                            margin:auto;
                          }
                          .h{
                              text-align:center;
                          }
                        </style>
                        <img src="{{asset('img/la.png')}}"  alt="Responsive image" height="200" width="250">
		                      <h2 class="h">¡Bienvenido!</h2>
                          <h3 class="h">Sistema de Gestión Dirección de Obras</h3>
                          <br><br><br><br><br>
                          @yield('contenido')
                        </div>
                      </div>
                  	</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection