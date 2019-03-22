@extends('layouts.app') @section('content')


<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <a type="button" href="{{url('/admin/users')}}">
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
                            <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-1 col-lg-9">
                                <div class="col-lg-offset-2 col-lg-8">
                                    <h2>Usuario: {{ $users->name }}</h2>
                                </div>
                              
                                <img style="margin-top:64px;position:absolute;margin-left:-77px" class="l" src="{{asset('/img/u.png')}}">
                         
                                <br>
                                <form class="form-horizontal" method="post" action="{{ url('/admin/users/'.$users->id.'/edit') }}">
                                    {{ csrf_field() }}
                             
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-7">
                                                <h3 style="border-bottom : 1px solid gray">Lista de roles (Seleccione solo una opcion)</h3>

                                                <div class="form-group">
                                                    <ul class="list-unstyled">
                                                        @foreach($roles as $key=>$role)
                                                        <li>
                                                            <label>
                                                                {{ Form::checkbox('roles[]', $role->id, $checked[$key]) }} {{ $role->name}}
                                                                <em>({{ $role->description ?:'No existe descripcion' }})</em>
                                                            </label>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-offset-8 col-lg-3">
                                            <button type="submit" class="buttonna">Definir rol
                                                <i class="fa fa-floppy-o"></i>
                                            </button>
                                    </div>
                                    <div class="form-group">
                                     
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
    <script>
        window.addEventListener("DOMContentLoaded", function () {
            var checkeds = document.getElementsByName("roles[]");
            if (checkeds.length) {
                checkeds.forEach(function (input) {
                    input.classList = "rolesCheck";
                    input.addEventListener("change", function () {
                        var checkbox = this;
                        checkeds.forEach(function (input) {
                            input.checked = false;
                        })
                        checkbox.checked = true;
                    })
                })

            }

        })
        // $(document).ready(function(){

        // })
    </script>
</div>



@endsection