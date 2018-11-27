<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{{ asset('favicon.png') }}}">
    <title>Garantias Piero</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">


    <!-- Styles -->
            <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-social.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('plugins/printArea/jquery.printarea.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" />
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-69513027-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-69513027-2');
</script>

</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
      <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('css/imagenes/logo12.png') }}" alt="" class="imgportal" style="">&nbsp;&nbsp;Portal de Clientes</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
            <li><a href="{{ url('/') }}">Inicio</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
             <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar Sesi&oacute;n</a></li>
                        <li><a href="{{ url('/register') }}">Registrarme</a></li>
                    @else
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><img src="https://placehold.it/32x32" alt="Alternate Text" style="float:left;margin-top:-5px;" class="img-responsive">&nbsp;{{ Auth::user()->name }}
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="navbar-content">
                            <div class="row">
                                <div class="col-xs-5 col-md-5" style="padding-left: 35px;">
                                    <img src="https://placehold.it/120x120" alt="Alternate Text" class="img-responsive">
                                    <p class="text-center small">
                                    <a href="#">Cambiar Foto</a></p>
                                </div>
                                <div class="col-xs-7 col-md-7">
                                    <span>{{ Auth::user()->name }}</span>
                                    <p class="text-muted small">{{ Auth::user()->email }}</p>
                                    <div class="divider">
                                    </div>
                                    <a href="#" class="btn btn-primary btn-sm active" style="width:100%;" data-toggle="modal" data-target="#verPerfil">Ver Perfil</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-footer">
                            <div class="navbar-footer-content">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6" style="padding-left: 35px;">
                                        <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#cambiarPassword">Cambiar contraseña</a>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <a href="{{ url('/logout') }}" class="btn btn-default btn-sm pull-right">Cerrar Sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
                    @endif
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
@include('garantias.terminos')
@include('garantias.pdp')
@include('auth.passwords.cambiar')
@if (!Auth::guest())
  @include('auth.perfil')
@endif
    @yield('content')
<style type="text/css">
/*
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;

  height: 60px;
  background-color: #00274e;
  color:#fff;
 text-align: center;
 padding-top:15px;
}
*/

/* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  background-color: #00274e;
color:white;
   text-align: center;
 padding-top:15px;
}

.relleno {
  position: absolute;
  width: 100%;
  box-shadow: inset  0  12px 11px -10px #696868;
  padding-top: 30px;
}
</style>
<!--<div class="footer">
Todos los derechos reservados | Piero S.A.I.C. 2015 &copy;
    </div>
-->
    <footer class="footer">
      © 2015 Piero S.A.I.C. &nbsp;Todos los derechos reservados &nbsp;  |  &nbsp; <a style="color: #0A86BE;" href="#" data-toggle="modal" data-target="#terminos">Terminos y Condiciones de GEP</a> &nbsp; |  &nbsp; <a style="color: #0A86BE;" href="#" data-toggle="modal" data-target="#PDP">Política de confidencialidad y PDP</a>
    </footer>

    <!-- JavaScripts -->

    <script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="{{ asset('plugins/printArea/jquery.printarea.js') }}"></script>
    <script>
    $( document ).ready(function(){

      $(".printer").bind("click",function()
        {
          $('#agreement').printArea();
        });
      $(".printerPDP").bind("click",function()
        {
          $('#agreementPDP').printArea();
        });

    });
    </script>
    @yield('extraJS')

</body>
</html>
