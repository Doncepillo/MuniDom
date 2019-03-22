
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
<h2>Editar Cargo de Trabajo</h2>
<br>
<form class="form-horizontal" method="post" action="{{ url('/admin/positions/'.$position->id.'/edit') }}">
{{ csrf_field() }}  

<div class="form-group">
<div class="col-lg-4">
<label for="cargo" class="control-label">Cargo</label>
<input type="text" name="cargo" id="cargo" class="form-control" value=" {{ $position->cargo }}" >
</div>
<div class="col-lg-4">
<label for="apellidos" class="control-label">Descripción </label>
<input type="text" name="descripcion" class="form-control" id="descripcion" value=" {{ $position->descripcion }}">
</div>    
</div>  

<br>
<div class="form-group">
<div class="col-lg-offset-4 col-lg-4">
<button type="submit" class="buttonna">Actualizar cargo <i class="fa fa-floppy-o"></i></button>
&nbsp;
<a href="{{ url('/admin/configuration') }}" class="buttonna"> Cancelar </a>
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