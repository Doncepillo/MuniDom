@extends('layouts.app') @section('content')
<div class="content-wrapper">
  <section class="content">
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
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <a type="button"  href="{{url('/admin/inventories')}}"><img class="l" src="{{asset('/img/l.png')}}"></a>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
              <button class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
              <div class="row">
                <div style="background:#FBFCFC;border: 1px solid #E8D7EA border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-sm-offset-1 col-sm-10">
                  <div class="row">  
                    <div class="col-lg-6">
                    <form class="form-horizontal" method="post" action="{{ url('/admin/inventories/'.$articles->id.'/edit') }}">
                      <h3><label>Editar Registro N°: </label> {{ $articles->NroPermiso }}</h3>
                    </div>
                  </div>
                  <br>
                  {{ csrf_field() }}
                   <div class="row">
                   <div class="col-sm-0 col-sm-4">  
                      <label for="category_id" class="control-label">Tipo de Permiso</label>
                      <div class="input-group">
                        <select  name="category_id" id="category" class="select-field">
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == old('category_id', $articles->category_id)) selected @endif> {{ $category->categoria }}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div style="margin-right:40px"; class="col-sm-offset-0 col-sm-0"> 
                       <div id="categoriass">
                      <label for="sub_category_id" class="control-label">Especificación</label>
                      <div class="input-group">
                        <select  name="sub_category_id" id="sub_category" class="select-field" >
                        <option value="">Seleccione Especificación</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" @if($subcategory->id == old('sub_category_id', $articles->sub_category_id)) selected @endif> {{ $subcategory->subcategoria }}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                   <div class="col-sm-offset-0  col-lg-10">
                         <label for="Fecha" class="control-label">Fecha</label>
                       <div class="input-group">
                         <input type="text" name="Fecha" class="select-field" id="Fecha" readonly="readonly" value=" {{ $articles->Fecha }}">
                       </div>
                   </div>
              
                   <div id="Nombre" class="col-sm-offset-0  col-lg-4">
                         <label for="Nombre" class="control-label">Nombre</label>
                       <div class="input-group">
                         <input maxlength="30" type="text" name="Nombre" id="Nombre" class="select-field" value=" {{ $articles->Nombre }}">
                       </div>
                   </div>
                   <div id="ApePaterno" class="col-sm-offset-0  col-lg-2">
                         <label for="ApePaterno" class="control-label">Apellido Paterno</label>
                       <div class="input-group">
                         <input maxlength="30" type="text" name="ApePaterno" id="ApePaterno" class="select-field" value=" {{ $articles->ApePaterno }}">
                       </div>
                   </div>
                   <div id="ApeMaterno" class="col-sm-offset-2  col-lg-2">
                         <label for="ApeMaterno" class="control-label">Apellido Materno</label>
                       <div class="input-group">
                         <input maxlength="30" type="text" name="ApeMaterno" id="ApeMaterno" class="select-field" value=" {{ $articles->ApeMaterno }}">
                       </div>
                   </div>
                   <div id="NroOrdenIngreso" class="col-sm-offset-0  col-lg-4">
                         <label for="NroOrdenIngreso" class="control-label">N° Orden de Ingreso</label>
                       <div class="input-group">
                         <input maxlength="30" type="text" name="NroOrdenIngreso" id="NroOrdenIngreso" class="select-field" value=" {{ $articles->NroOrdenIngreso }}">
                       </div>
                   </div>
                 
                   <div id="Destino" class="col-sm-offset-0  col-lg-2">
                         <label for="Destino" class="control-label">Destino</label>
                       <div class="input-group">
                         <input maxlength="30" type="text" name="Destino" id="Destino" class="select-field" value=" {{ $articles->Destino }}">
                       </div>
                   </div>
                   
                   <div id="Rol" class="col-sm-offset-2  col-lg-4">
                         <label for="Rol" class="control-label">Rol</label>
                       <div class="input-group">
                         <input maxlength="30" type="text" name="Rol" id="Rol" class="select-field" value=" {{ $articles->Rol }}">
                       </div>
                   </div>
                   <div id="Direccion" class="col-sm-offset-0  col-lg-4">
                         <label for="Direccion" class="control-label">Dirección</label>
                       <div class="input-group">
                         <input maxlength="30" type="text" name="Direccion" id="Direccion" class="select-field" value=" {{ $articles->Direccion }}">
                       </div>
                   </div>
                   <div id="Localidad" class="col-sm-offset-0  col-lg-4">
                         <label for="Localidad" class="control-label">Localidad</label>
                       <div class="input-group">
                         <input maxlength="30" type="text" name="Localidad" id="Localidad" class="select-field" value=" {{ $articles->Localidad }}">
                       </div>
                   </div>
                   <div id="Superficie" class="col-sm-offset-0  col-lg-4">
                         <label for="Superficie" class="control-label">Superficie</label>
                       <div class="input-group">
                         <input maxlength="30" type="text" name="Superficie" id="Superficie" class="select-field" value=" {{ $articles->Superficie }}">
                       </div>
                   </div>
                   <div id="PerObraNueva" class="col-sm-offset-0  col-lg-4">
                         <label for="PerObraNueva" class="control-label">Permiso de Obra Nueva</label>
                       <div class="input-group">
                         <input type="checkbox" value="1" name="PerObraNueva" id="PerObraNueva" value=" {{ $articles->PerObraNueva }}">
                       </div>
                   </div>
                   <div id="PagoCuotas" class="col-sm-offset-0  col-lg-4">
                         <label for="PagoCuotas" class="control-label">Pago de Cuotas</label>
                       <div class="input-group">
                         <input type="checkbox" value="1" name="PagoCuotas" id="PagoCuotas" value=" {{ $articles->PagoCuotas }}">
                       </div>
                   </div>
                     <div class="col-sm-3">  
                         <label class="control-label"></label>
                       <div class="input-group">
                       </div>
                     </div>
                   </div>
                   <br>
                   <div class="form-group">
                     <div class="col-lg-offset-9 col-sm-3">
                       <label for="min_stock" class="control-label"></label>
                         <div class="input-group">
                           <button type="submit" class="buttonna">Guadar Cambios <i class="fa fa-floppy-o"></i></button>
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