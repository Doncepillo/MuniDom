@extends('layouts.app')
@section('content')
      <div class="content-wrapper">
        <section class="content">         
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                  <a type="button"  href="{{url('/admin/inventories')}}" ><img class="l" src="{{asset('/img/l.png')}}"></a>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                <div class="row">
                  <div style="background:#FBFCFC;border: 1px solid #E8D7EA border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-sm-offset-1 col-sm-10">
                  <div class="row">  
                    <div class="col-sm-12">
                       <h3><label>Detalle Registro N°: </label> {{ $articles->NroPermiso }}</h3>
                    </div>
                </div>
                <br>
                    <form class="form-horizontal">
                        {{ csrf_field() }}                                 
                            <div class="form-group">
                               <div class="col-sm-offset-0  col-lg-4">
                                  <label for="LeyMono" class="control-label"><h4><label>Tipo de Permiso:</label> {{ $articles->category_id }}</h4></label>                                
                               </div>
                      





                               <div class="col-sm-offset-0  col-lg-4">
                                  <label for="Nombre" class="control-label"><h4><label>Especificación:</label> {{ $articles->sub_category_id }}</h4></label>
                               </div>
                               <div class="col-sm-offset-0  col-lg-4">
                                 <label for="Fecha" class="control-label"><h4><label>Fecha:</label> {{ $articles->Fecha }}</h4></label>
                               </div>
                               <div class="col-sm-offset-0  col-lg-4">
                                  <label for="Nombre" class="control-label"><h4><label>Nombre:</label> {{ $articles->Nombre }}</h4></label>
                               </div>
                               <div class="col-sm-offset-0  col-lg-4">
                                 <label for="ApePaterno" class="control-label"><h4><label>Apellido Paterno:</label> {{ $articles->ApePaterno }}</h4></label>
                               </div>
                               <div class="col-sm-offset-0  col-lg-4">
                                 <label for="ApeMaterno" class="control-label"><h4><label>Apellido Materno:</label> {{ $articles->ApeMaterno }}</h4></label>
                               </div>
                               <div class="col-sm-offset-0  col-lg-4">
                                 <label for="NroOrdenIngreso" class="control-label"><h4><label>N° Orden de Ingreso:</label> {{ $articles->NroOrdenIngreso }}</h4></label>
                               </div>
                               <div class="col-sm-offset-0  col-lg-4">
                                 <label for="Destino" class="control-label"><h4><label>Destino:</label> {{ $articles->Destino }}</h4></label>
                               </div>
                               
                               <div class="col-sm-offset-0  col-lg-4">
                                <label for="PerEdificacion" class="control-label"><h4><label>Permiso de Edificación:</label> {{ $articles->PerEdificacion }}</h4></label>
                               </div>
                               <div class="col-sm-offset-0  col-lg-4">
                                <label for="Rol" class="control-label"><h4><label>Rol:</label> {{ $articles->Rol }}</h4></label>
                                
                               </div>
                               <div class="col-sm-offset-0  col-lg-4">
                                <label for="Direccion" class="control-label"><h4><label>Dirección:</label> {{ $articles->Direccion }}</h4></label>
                                
                               </div>    
                               <div class="col-sm-offset-0  col-lg-4">
                                 <label for="Superficie" class="control-label"><h4><label>Superficie:</label> {{ $articles->Superficie }}</h4></label>
                                 
                               </div>     
                               <div class="col-sm-offset-0  col-lg-4">
                                <label for="Localidad" class="control-label"><h4><label>Localidad:</label> {{ $articles->Localidad }}</h4></label>
                                
                               </div>
                               <div class="col-sm-offset-0  col-lg-4">
                                 <label for="PerObraNueva" class="control-label"><h4><label>Permiso Obra Nueva:</label> {{ $articles->PerObraNueva }}</h4></label>
                               </div>

                               <div class="col-sm-offset-0  col-lg-4">
                                <label for="PagoCuotas" class="control-label"><h4><label>Pago Cuotas:</label> {{ $articles->PagoCuotas }}</h4></label>
                               </div>   
                             </div>
                           </div>
                         </div>
                       </form>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </section>
       </div>
@endsection