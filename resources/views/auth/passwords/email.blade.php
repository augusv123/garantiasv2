@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resetear Contraseña</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Direccion de correo</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i>Enviar enlace de reseteo de contraseña
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-12">
                              <div class="alert alert-info" style="text-align: center;padding: 4px 4px;">
                                <p><i class="fa fa-info-circle"></i> Si posee inconvenientes para resetear su contraseña contactenos a <span class="label label-primary"><a class="btn btn-link" style="padding-bottom: 7px;" href="mailto:webmaster@piero.com.ar">webmaster@piero.com.ar</a></span></p>
                              </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extraJS')
<script type="text/javascript">

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
