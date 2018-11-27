@extends('layouts.app')

@section('content')

<ol style="margin-top:10px;" class="breadcrumb">
Garantias
</ol>
<div class="container" style="padding-top:30px;">
    <div class="col-lg-6 col-lg-offset-3" style="margin-bottom:20px;">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Iniciar Sesi&oacute;n</a></li>
   <!-- <li role="presentation"><a href="#filtros" aria-controls="filtros" role="tab" data-toggle="tab">Registrarse</a></li>-->
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

    @include('flash::message')
    <div role="tabpanel" class="tab-pane <?php if(!isset($_GET['joined'])){ echo "active"; } ?>" id="info">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div style="margin-top:15px;" class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input style="height:40px;" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Correo electrónico">
                                </div>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input style="height:40px;" type="password" class="form-control" name="password" placeholder="Contraseña">
                                 </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                            <button type="submit"  class="btn btn-block btn-instagram col-sm-12">
                                    <i class="fa fa-btn fa-sign-in"></i>Iniciar Sesi&oacute;n
                            </button>
                            </div>
                         </div>
                         <!--
                         <div class="form-group">
                             <div class="col-sm-6">
                                   <a class="btn btn-block btn-social btn-google disabled"><span class="fa fa-google"></span> Ingrese usando Google!</a>
                             </div>
                             <div class="col-sm-6">
                               <a class="btn btn-block btn-social btn-facebook disabled"><span class="fa fa-facebook"></span> Ingrese usando Facebook!</a>
                             </div>
                         </div>
                         -->
                  <div class="form-group">
                    <div class="col-lg-6">
                        <div class="text-center" style="margin-top:5px;">
                            <input type="checkbox" tabindex="3" class="" name="remember"><label for="remember">&nbsp;&nbsp; Recordarme</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center">
                          <a class="btn btn-link" href="{{ url('/password/reset') }}">Olvido su contraseña?</a>
                        </div>
                    </div>
                  </div>
        </form>
    </div>
  </div>

</div>
</div>
@endsection

@section('extraJS')
  <script src="{{ asset('plugins/backstretch/jquery.backstretch.min.js')}}"></script>

<script type="text/javascript">

$( document ).ready(function() {

//$("body").backstretch("imagenes/bkg.jpg");
$("body").backstretch([
      "{{ asset('css/imagenes/Ambar-NUEVA-ALTA.jpg') }}"
    , "{{ asset('css/imagenes/Montreaux-NUEVA-ALTA.jpg') }}"
    , "{{ asset('css/imagenes/vita-bkg.jpg') }}"
  ], {duration: 3000, fade: 750});

});
// Verifico que se muestre boton para confirmar aceptacion de terminos solo cuando se este registrando una compra
$('#terminos').on('show.bs.modal', function (e) {

    if(e.relatedTarget.id == 'regCompra'){
      $( "#confirm" ).show();
    }else{
      $( "#checkTyC" ).hide();
      $( "#confirm" ).hide();
      $( "#notaHabilitaAcept" ).hide();
      $("#agreement").html("@include('garantias.terminosGenerales')");
    }

});
</script>
@endsection
