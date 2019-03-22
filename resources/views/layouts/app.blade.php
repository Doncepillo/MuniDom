<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de gestión</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <style>
      .loading
      {
        display: none;
        justify-content: center;
      }
      .navbar-nav>.user-menu>.dropdown-menu>li.user-header
      {
                  height: 80px;
                  padding: 20px;
                  text-align: center;
      }
    </style>
  </head>
  <body class="hold-transition skin-yellow sidebar-mini">
    @guest
    <center><img style="margin-top:55px" src="{{asset('/img/SesionExpirada.png')}}"></center>
    <center><h4><a href="{{url('/')}}">Volver a iniciar sesión</h4></center>
      @else
      <div class="wrapper">
        <header class="main-header">
          <a href="{{ url('/home') }}" class="logo">
            <span class="logo-mini">
              <b>Dirección de Obras</b>
            </span>
            <span class="logo-lg">
              <b>Dirección de Obras</b>
            </span>
          </a>
          <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <small class="bg-green"> En línea </small>&emsp; {{ Auth::user()->name }}
                    <span class="hidden-xs"> </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="user-header">
                      <p>
                        Sistema de Gestión
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-right">
                        <a href="{{ route('logout') }}" class="buttonn" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Cerrar Sesión <i class="fa fa-sign-out"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <aside class="main-sidebar">
          <section class="sidebar">
            <ul class="sidebar-menu">
              <li class="header"></li>
                @can('inventories.index')
                  <li>
                    <a href="{{url('/admin/inventories')}}">
                      <i class="fa fa-th"></i>Control de Registros</a>
                  </li>
                @endcan  
              </li>
                @can('users.index')
                  <li>
                    <a href="{{url('/admin/users')}}">
                      <i class="fa fa-user"></i>Gestión de Usuarios</a>
                  </li>
                @endcan
              </li>
          </section>
        </aside>
        @yield('content')
        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Version</b>
            1.1.0.0
          </div>
          <strong>Copyright &copy; 2019 .</strong> Todos los derechos reservados.
        </footer>
        @endguest
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/app.min.js')}}"></script>
        <script src="{{asset('js/chilean-formatter.js')}}"></script>
        <script src="{{asset('js/myjs.js')}}"></script>
        <script src="{{asset('js/mdb.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/toastr.min.js')}}"></script>
        {!!  Toastr :: render () !!} 
        <script>
          $(document).ready(function () {
            $("#btnGenerarPdf").click(function () {
              var filter = window.location.search.split('?query=')[1];
              if (filter) {
                window.open("/admin/workers/pdf" + "?filter=" + filter)
              } else {
                window.open("/admin/workers/pdf")
              }
            })
              $("#btnGenerarPdfI").click(function () {
              var filter = window.location.search.split('?query=')[1];
              if (filter) {
                window.open("/admin/inventories/pdf" + "?filter=" + filter)
              } else {
                window.open("/admin/inventories/pdf")
              }
            })
            
            $("#btnGenerarPdfTO").click(function () {
              var filter = window.location.search.split('?query=')[1];
              if (filter) {
                window.open("/admin/trays/pdfto" + "?filter=" + filter)
              } else {
                window.open("/admin/trays/pdfto")
              }
            })
            $("#btnGenerarPdfTR").click(function () {
              var filter = window.location.search.split('?query=')[1];
              if (filter) {
                window.open("/admin/trays/pdftr" + "?filter=" + filter)
              } else {
                window.open("/admin/trays/pdftr")
              }
            })

            $("#btnGenerarPdfTR").click(function () {
              var filter = window.location.search.split('?query=')[1];
              if (filter) {
                window.open("/admin/trays/pdftr" + "?filter=" + filter)
              } else {
                window.open("/admin/trays/pdftr")
              }
            })





            $("#btnAgregarTrabajador").click(function (e) {
              $("#formAddWorkers").submit(function (e) {})
            })
            $('#category').on('change', function(){
            var valor = $(this).val();
              if(valor == 1,2,3,4,5,6,7,8,9,10){
                $("#sagg").removeClass("hidden");
                $("#reingresoo").removeClass("hidden");
                $("#categoriass").removeClass("hidden");
              }
              else{
                $("#sagg").addClass("hidden");
                $("#reingresoo").addClass("hidden");
                $("#categoriass").addClass("hidden");
              }
            });
          })
        </script>
    </body>
</html>