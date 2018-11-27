@extends('layouts.app')

@section('content')
<ol style="margin-top:10px;" class="breadcrumb">
Garantias
</ol>
<div class="container" style="padding-top:30px;">

  <div class="col-lg-6 col-lg-offset-3" >
    @include('flash::message')
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Confirmar eliminación de perfil</a></li>
   <!-- <li role="presentation"><a href="#filtros" aria-controls="filtros" role="tab" data-toggle="tab">Registrarse</a></li>-->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content" style="text-align: center;margin-bottom:30px;">
    <div role="tabpanel" class="tab-pane active" id="info">
      <h4 style="color:#d62c1a;font-weight:bold;">
        Disclaimer
      </h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.
          Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
           Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>

      <form method="POST" action="/profile/reallydelete">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="btn btn-danger btn-xs-block" ><i class="fa fa-trash" aria-hidden="true"></i> Eliminar perfil de {{ Auth::user()->name }} definitivamente</button>
          <a class="btn btn-default btn-xs-block" href="{{ url('/') }}"><i class="fa fa-undo" aria-hidden="true"></i> Volver</a>
      </form>



    </div>
  </div>

  </div>


</div>

@endsection
