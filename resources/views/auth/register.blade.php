@extends('layouts.app')

@section('content')


<ol style="margin-top:10px;" class="breadcrumb">
Garantias
</ol>
<div class="container" style="padding-top:30px;">
    <div class="col-lg-6 col-lg-offset-3" style="margin-bottom:20px;">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Registrarse</a></li>
   <!-- <li role="presentation"><a href="#filtros" aria-controls="filtros" role="tab" data-toggle="tab">Registrarse</a></li>-->
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane <?php if(!isset($_GET['joined'])){ echo "active"; } ?>" id="info">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
          @if (\Session::has('errorValidacion'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('errorValidacion') !!}</li>
        </ul>
    </div>
@endif
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">DNI</label>

                            <div class="col-md-6">
                                <input type="dni" class="form-control" name="dni" value="{{ old('dni') }}">

                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="1" name="terms"> Acepto los <a href="#" data-toggle="modal" data-target="#terminos">Terminos y condiciones</a></label>
                                </div>

                                @if ($errors->has('terms'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('terms') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Registrarme
                                </button>
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
