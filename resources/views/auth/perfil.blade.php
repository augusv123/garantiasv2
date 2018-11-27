<!-- Modal -->
<div id="verPerfil" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin-top: -5px;">Perfil de usuario </h4>
      </div>
      <div class="modal-body" style="max-height:400px;overflow-y:auto;">

<div class="container">
      <div class="row" style="padding-top:15px;">
          <div class="col-sm-6 col-md-4">
              <img src="http://placehold.it/128x128" alt="" class="img-rounded img-responsive" />
          </div>
          <div class="col-sm-6 col-md-8">
              <h4>{{ Auth::user()->name }}</h4>
              <p style="line-height:1.80;">
                  <i class="fa fa-envelope"></i> {{ Auth::user()->email }}
                  <br/>
                  <i class="fa fa-user"></i> DNI {{ Auth::user()->dni }}
                  <br/>
                  <i class="fa fa-calendar"></i> Registrado: {{ Auth::user()->created_at }}
              </p>
          </div>
      </div>
</div>
      </div>
      <div class="modal-footer">
        <!--<a class="btn btn-danger visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" style="margin-bottom:5px;" href="{{ URL::route('perfil.solicitaeliminar') }}"><i class="fa fa-btn fa-trash"></i>Eliminar cuenta y datos personales</a> -->
        <a class="btn btn-default visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" style="margin-bottom:5px;" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</a>
      </div>
    </div>

  </div>
</div>
<!-- FIN MODAL -->
