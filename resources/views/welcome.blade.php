<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de Gestión -- Dirección de Obras Municipales -- Municipalidad de Paillaco</title>
        <link rel="stylesheet" href="{{asset('css/miestilo.css')}}">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="{{asset('js/myjs.js')}}"></script>
    <style>
        .fondo{
        background-image: url(img/bg.jpg);
        }
    </style>
    </head>
    <body class="fondo">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                       <center><a style="color:#050505" class="fa fa-bug" href="{{ url('/home') }}">Ya has iniciado sesión, click aquí para redireccionar al sistema</a></center>
                    @else
                    @endauth
                </div>
            @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">    
                    <div class="account-wall">
                        <img class="profile-img" src="{{asset('img/la.png')}}"> 
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingrese su Correo" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif 
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">           
                        <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese su Contraseña" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>
                        <br>
                        <button style="border-radius: 13px;" class="buttonn" type="submit">Iniciar Sesión </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
