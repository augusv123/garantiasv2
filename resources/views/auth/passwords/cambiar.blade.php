<!-- Modal -->
<div id="cambiarPassword" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="min-height:65px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-top: -5px;">Cambiar contraseña </h4>
      </div>
      <div class="modal-body" style="max-height:400px;overflow-y:auto;">

<div class="container">
    <div class="row">
        <div class="col-md-12">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/cambiar') }}">
                        {!! csrf_field() !!}

                        <!-- Old Password -->
                        <div class="control-group {{ $errors->first('clave_actual', 'has-error') }}">
                            <label class="control-label" for="clave_actual">Actual contraseña</label>
                                <input type="password" class="form-control" name="clave_actual" id="clave_actual" value="" />
                                <span class="help-block">{{ $errors->first('clave_actual', ':message') }}</span>
                        </div>

                        <!-- New Password -->
                        <div class="control-group {{ $errors->first('clave', 'has-error') }}">
                            <label class="control-label" for="clave">Nueva contraseña</label>
                            <div class="controls">
                                <input type="password" class="form-control" name="clave" id="clave" value="" />
                                <span class="help-block">{{ $errors->first('clave', ':message') }}</span>
                            </div>
                        </div>
                    
                        <!-- Confirm New Password  -->
                        <div class="control-group {{ $errors->first('clave_confirmation', 'has-error') }}">
                            <label class="control-label" for="clave_confirmation">Confirmar nueva contraseña</label>
                            <div class="controls">
                                <input type="password" class="form-control" name="clave_confirmation" id="clave_confirmation" value="" />
                                <span class="help-block">{{ $errors->first('clave_confirmation', ':message') }}</span>
                            </div>
                        </div>
        </div>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-refresh"></i>Cambiar Contraseña</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                    </form>
      </div>
    </div>

  </div>
</div>
<!-- FIN MODAL -->

