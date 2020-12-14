@extends('layouts.app')

@section('content')
    <style type="text/css">
        .titulo{
            font-size:23px;
            font-weight: bold;
        }
        .sub{
            font-size:14px;

        }
        .spn{
          font-size: 13px;
          float:right;
          margin-top:8px;
        }
        a:disabled {
          cursor: not-allowed;
          pointer-events: none !important;
        }
        </style>
@include('garantias.recomendaciones')
<ol style="margin-top:10px;" class="breadcrumb">
Garantias
</ol>
<div class="container" style="padding-top:30px;">

  <div class="col-lg-6 col-lg-offset-3" >
    @include('flash::message')
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Consultas</a></li>
   <!-- <li role="presentation"><a href="#filtros" aria-controls="filtros" role="tab" data-toggle="tab">Registrarse</a></li>-->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="info">


       <!-- <form id="consultaGtia" action="" method="post" role="form"> -->

                {!! Form::open(['method'=>'GET','url'=>'consulta/','role'=>'txt_garantias'])  !!}
            {!! csrf_field() !!}

                  <div style="margin-bottom: 20px;margin-top:15px;" class="input-group">
                          <span class="input-group-addon"><i class="fa fa-search"></i></span>
                          <input style="height:40px;" type="text" class="form-control" name="txt_garantias" id="txt_garantias" placeholder="Ingrese el numero de garantia" required />
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input name="buscarGtia" id="buscarGtia" type="submit" value="Buscar garantia" tabindex="4" class="form-control btn btn-login" >
                      </div>
                    </div>
                  </div>
        <!--</form> -->
        {{ Form::close() }}




    </div>
  </div>
  <a style="margin-top:10px;width:100%;" class="btn btn-primary" href="#" data-toggle="modal" data-target="#recomendaciones"><i class="fa fa-info-circle" aria-hidden="true"></i> Recomendaciones al verificar una garantía</a>
  </div>

@if($garantia != null)
<div class="col-lg-6 col-lg-offset-3 infoConsulta" >
  <div class="row">
  <div>
    <div class="col-xs-12 col-sm-3 col-md-3">
      <img style="margin-right: auto;margin-left: auto;" class="img-responsive" src="{{$garantia->qr}}" />
    </div>


        <div style="" class="col-xs-12 col-sm-9 col-md-9">
          @if($garantia->etiqueta == 0)
          <p class="titulo">{{ $garantia->orden }}<span class="spn" >Cod. Garantia: {{ $garantia->id_garantia }}</span></p>

          @else 
          <p class="titulo">{{ $garantia->orden . "E" . $garantia->etiqueta }}<span class="spn" >Cod. Garantia: {{ $garantia->id_garantia }}</span></p>
          @endif
           <p class="sub"><label>Descripcion: </label> {{ $garantia->descripcion }} </p>
          <div class="col-xs-12">
           <p class="sub col-xs-6"><label>Codigo item: </label> {{ $garantia->it_codigo }}</p>
           <p class="sub col-xs-6"><label>Vigencia Hasta: </label> <span class="label {{ $garantia->style }}">{{ $garantia->caducidad }}</span></p>
          </div>
          <div class="col-xs-12">
            <p class="sub col-xs-6"><label>Factura: </label> {{ $garantia->factura }}</p>
            <p class="sub col-xs-6"><label>DNI comprador: </label> {{ $garantia->user->dni }}</p>
          </div>
          <div id="ejecutarGtia" class="col-xs-12">
            @if($garantia->ejecutada)
            <p class="alert alert-info"><i class="fa fa-check-circle" aria-hidden="true"></i> Garantia ejecutada anteriormente. Dirijase al Portal de clientes para ver el estado de la misma.</p>
            @else
            <a href="#" class="btn btn-primary col-xs-12 {{ $garantia->disabled }}" data-toggle="modal" data-target="#regEvento">Registrar evento <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            @endif
            <!--<p class="sub col-sm-6"><a href="#" class="btn btn-primary col-xs-12" data-toggle="modal" data-target="#login">Ejecutar garantia</a></p>-->
            <!--<p class="sub col-sm-6"><a href="#" id="elevarADistribuidor" class="btn btn-primary col-xs-12">Elevar a distribuidor</a></p>-->
          </div>
        </div>
  </div>
  </div>
  <br>
  @if($garantia->eventos->count() > 0)
<style>
  .panel-heading a:after{
    color: white;
  }
</style>
<div class="panel panel-primary" style="background:rgba(255,255,255,0.5);">
  <div class="panel-heading"><i class="fa fa-list" aria-hidden="true"></i> Eventos relacionados<a data-toggle="collapse" data-target="#collapseEvent" href="#collapseEvent" class="collapsed"></a></div>
  <div id="collapseEvent" class="panel-collapse collapse">
  <div class="panel-body" style="padding:0px;">
      <table class="footable table table-hover">
        <thead class="thead-light">
          <th style="border-bottom:1px solid #00274e;">Observaciones</th>
          <th style="border-bottom:1px solid #00274e;">Tipo</th>
          <th style="border-bottom:1px solid #00274e;">Visita</th>
        </thead>
        <tbody>
          @foreach($garantia->eventos as $evento)
            <tr>
              <td style="max-width:400px;">{{ $evento->observaciones }}</td>
              <td class="@if($evento->tipo == 1) warning @else danger @endif">@if($evento->tipo == 1) Prog. Visita @else Obs. No Procede @endif</td>
              <td>@if($evento->fecha != "0000-00-00") {{ $evento->fecha }} @else - @endif</td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  </div>
</div>
  @endif
</div>

<div id="elevaDistribuidor" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title">Seleccione el distribuidor que corresponda <a style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-dismiss="modal" data-toggle="modal" data-target="#regEvento"><i class="fa fa-chevron-left" aria-hidden="true"></i> Volver</a></h4>
          </div>
          <div class="modal-body" style="padding:0px;">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well" style="margin-bottom:0px;">
                          <div id="DistriErrorMsg"></div>
                          <form id="elevarDistriForm" method="POST" >
                              <div class="form-group">
                                  <label for="username" class="control-label">Distribuidor</label>
                                  <select class="form-control" id="selusername">
                                    <option value="">Seleccione una opción</option>
                                    <option value="100833">BERSANO Y CIA S.A.</option>
                                    <option value="106730">CALVO JOSE ALBERTO</option>
                                    <option value="108637">CR DISTRIBUCIONES S.R.L.</option>
                                    <option value="102072">FALCO HECTOR NORBERTO</option>
                                    <option value="106731">FERRERO JORGE OMAR</option>
                                    <option value="100269">LARI GUSTAVO ARIEL</option>
                                    <option value="108634">MERCADO DE LOS COLCHONES S.A</option>
                                    <option value="101282">SABRIMAR S.R.L.</option>
                                    <option value="108639">SUEÑO AUSTRAL</option>
                                    <option value="101069">YUBRIN S.A.</option>
                                  </select>
                                  <span class="help-block"></span>
                                  <input type="hidden" class="form-control" id="gtiaElevar" name="gtiaElevar" value="{{ $garantia->id_garantia }}">
                              </div>
                              {{ Form::token() }}
                              <button id="elevaryejecutar" type="button" class="btn btn-primary btn-block">Ingresar</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div id="programarVisita" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title">Seleccione fecha para verificación<a style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-dismiss="modal" data-toggle="modal" data-target="#regEvento"><i class="fa fa-chevron-left" aria-hidden="true"></i> Volver</a></h4>
          </div>
          <div class="modal-body" style="padding:0px;">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well" style="margin-bottom:0px;">
                          <div id="progVisitaErrorMsg"></div>
                          <form id="progVisitaForm" method="POST" >
                              <div class="form-group">
                                  <label for="username" class="control-label">Fecha</label>
                                  <input class="form-control datepicker" id="fechaProg" name="fechaProg" style="background: #fff;" readonly="readonly">
                                  <span class="help-block"></span>
                                  <input type="hidden" class="form-control" id="gtiaProgramar" name="gtiaProgramar" value="{{ $garantia->id }}">
                              </div>
                              <div class="form-group">
                                  <label for="username" class="control-label">Observaciones</label>
                                  <textarea rows="5" class="form-control" id="obsProg" name="obsProg" value="" required="" placeholder="El producto será verificado en el domicilio..."></textarea>
                              </div>
                              {{ Form::token() }}
                              <button id="registrarProgVisita" type="button" class="btn btn-primary btn-block">Programar</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title">Ingrese al Portal Clientes para ejecutar la garantía <a style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-dismiss="modal" data-toggle="modal" data-target="#regEvento"><i class="fa fa-chevron-left" aria-hidden="true"></i> Volver</a></h4>
          </div>
          <div class="modal-body" style="padding:0px;">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well" style="margin-bottom:0px;">
                          <div id="loginErrorMsg"></div>
                          <form id="loginForm" method="POST" >
                              <div class="form-group">
                                  <label for="username" class="control-label">CUIT de usuario</label>
                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Ingrese su numero de cliente Piero" placeholder="123456">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Contraseña</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Ingrese su contraseña" placeholder="********">
                                  <span class="help-block"></span>
                              </div>
                              {{ Form::token() }}
                              <button id="loginyejecutar" type="button" class="btn btn-primary btn-block">Ingresar</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div id="noProcede" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title">No procede a ejecutar garantía <a style="margin-right:10px;" class="btn btn-xs btn-primary pull-right" data-dismiss="modal" data-toggle="modal" data-target="#regEvento"><i class="fa fa-chevron-left" aria-hidden="true"></i> Volver</a> </h4>
          </div>
          <div class="modal-body" style="padding:0px;">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well" style="margin-bottom:0px;">
                          <div id="RechazoErrorMsg"></div>
                          <form id="registrarEventoRechazo" method="POST" >
                              <div class="form-group">
                                  <label for="username" class="control-label">Observaciones</label>
                                  <textarea rows="5" class="form-control" id="obsRechazo" name="obsRechazo" value="" required="" placeholder="Se deja asentado el motivo por el cual no se realizará la ejecución de la garantía en esta ocasión..."></textarea>
                                  <span class="help-block"></span>
                                  <input type="hidden" class="form-control" id="gtiaRechazar" name="gtiaRechazar" value="{{ $garantia->id }}">
                              </div>
                              {{ Form::token() }}
                              <button id="registrarRechazo" type="button" class="btn btn-danger btn-block">Rechazar</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div id="regEvento" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title">Registrar evento
                  <label style="float:right;margin-right:20px;"><input type="checkbox" value="1" id="verifProducto" name="verifProducto">Verifico producto?</label>
              </h4>
          </div>
          <div class="modal-body" style="padding:0px;">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="well" style="margin-bottom:0px;">
                          <a id="primerVisita" class="btn btn-warning btn-block" data-dismiss="modal" data-toggle="modal" data-target="#programarVisita">Programa visita</a>
                          @if($garantia->esClientePiero) 
                            @if(Auth::user()!= null && (Auth::user()->type=='local'||Auth::user()->type=='admin'))
                              <a id="ProcederEjecucionDirecta" class="btn btn-primary btn-block disabled decisionEjecuta2">No puede proceder como admin</a>
                            <div id="ProcederEjecucionDirectamsj"></div>

                            @else
                                <a id="procedeEjecucion" class="btn btn-primary btn-block disabled decisionEjecuta" data-dismiss="modal" data-toggle="modal" data-target="
                                @if($garantia->esClientePiero) {{ '#login' }}   {{-- @if(Auth::user()!= null && Auth::user()->type=='local') --}}@else {{ '#elevaDistribuidor' }} @endif">Procede a ejecución circuito normal</a>
                            @endif
                            
                          @else
                            <a id="procedeEjecucion" class="btn btn-primary btn-block disabled decisionEjecuta" data-dismiss="modal" data-toggle="modal" data-target="
                            @if($garantia->esClientePiero) {{ '#login' }}  {{-- @if(Auth::user()!= null && Auth::user()->type=='local') --}} @else {{ '#elevaDistribuidor' }} @endif">Procede a ejecución</a>
                          @endif
                         
                          <a id="noProcedeEjecucion" class="btn btn-danger btn-block disabled decisionEjecuta" data-dismiss="modal" data-toggle="modal" data-target="#noProcede">No procede a ejecución</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endif

</div>
@endsection

@section('extraJS')
  <script src="{{ asset('plugins/backstretch/jquery.backstretch.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
  <link href="{{ asset('plugins/FooTable/css/footable.core.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('plugins/FooTable/js/footable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('plugins/FooTable/js/footable.sort.js') }}" type="text/javascript"></script>
  <script src="{{ asset('plugins/FooTable/js/footable.filter.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    //FOOTABLE PLUGIN
    $(function () {
      $('.footable').footable();

    });
    /* PANELES COLLAPSIBLES */
      $(document).on('click', '.panel-heading span.clickable', function(e){
        var $this = $(this);
    	if(!$this.hasClass('panel-collapsed')) {
    		$this.parents('.panel').find('.panel-body').slideUp();
    		$this.addClass('panel-collapsed');
    		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    	} else {
    		$this.parents('.panel').find('.panel-body').slideDown();
    		$this.removeClass('panel-collapsed');
    		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    	}
    });
  </script>
<script type="text/javascript">

$( document ).ready(function() {


$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    startDate: new Date()
});

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});


//$("body").backstretch("imagenes/bkg.jpg");
$("body").backstretch([
      "{{ asset('css/imagenes/Render AMBAR nvo baja.png') }}"
    , "{{ asset('css/imagenes/bkg.jpg') }}"
    , "{{ asset('css/imagenes/Render MNTRX nvo baja.png') }}"
  ], {duration: 3000, fade: 750});

// ProcederEjecucionDirecta
$('#ProcederEjecucionDirecta').on('click', function(e){
// alert('procedeajecutardirectapapa');
var parametros = {
        "cliente" : $("#username").val(),
        "password" : $("#password").val(),
        "idGarantiaAEjecutar" : $("#gtiaElevar").val()
};
$.ajax({
        data:  parametros,
        dataType: "json",
        url:   'loginapi',
        type:  'POST',
        beforeSend: function () {
                $("#loginErrorMsg").html('<p class="alert alert-info"><i class="fa fa-spinner" aria-hidden="true"></i> Procesando, espere por favor...</p>');
        },
        success:  function (respuesta) {
          if(respuesta.success){

            $("#ejecutarGtia").html('<p class="alert alert-info"><i class="fa fa-check-circle" aria-hidden="true"></i> Garantia ejecutada exitosamente!</p>');
            $('#regEvento').modal('toggle');
          }else{
            $("#ejecutarGtia").html('<p class="alert alert-info"><i class="fa fa-check-circle" aria-hidden="true"></i> Garantia ejecutada exitosamente!</p>');
            $('#regEvento').modal('toggle');
          }

        }
});

});

    $('#loginyejecutar').on('click', function(e){

        var parametros = {
                "cliente" : $("#username").val(),
                "password" : $("#password").val(),
                "idGarantiaAEjecutar" : $("#gtiaElevar").val()
        };
        $.ajax({
                data:  parametros,
                dataType: "json",
                url:   'loginapi',
                type:  'POST',
                beforeSend: function () {
                        $("#loginErrorMsg").html('<p class="alert alert-info"><i class="fa fa-spinner" aria-hidden="true"></i> Procesando, espere por favor...</p>');
                },
                success:  function (respuesta) {
                  if(respuesta.success){
                    $("#loginErrorMsg").html('<p class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Garantia ejecutada exitosamente.        <button style="float: right;margin-top: -7px;" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button></p>');
                    $("#loginForm").remove();
                    $("#ejecutarGtia").html('<p class="alert alert-info"><i class="fa fa-check-circle" aria-hidden="true"></i> Garantia ejecutada exitosamente. Puede dirigirse al portal de clientes para realizar la carga del correspondiente service o esperar que su vendedor asignado lo realice.</p>');
                  }else{

                    $("#loginErrorMsg").html('<p class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Usuario o contraseña no válidos.</p>');
                  }

                }
        });

    });

    $('#elevaryejecutar').on('click', function(e){

        var parametros = {
                "cliente" : $("#selusername").val(),
                "idGarantiaAEjecutar" : $("#gtiaElevar").val()
        };
        $.ajax({
                data:  parametros,
                dataType: "json",
                url:   'ejecutagarantia',
                type:  'POST',
                beforeSend: function () {
                        $("#DistriErrorMsg").html('<p class="alert alert-info"><i class="fa fa-spinner" aria-hidden="true"></i> Procesando, espere por favor...</p>');
                },
                success:  function (respuesta) {
                  
                  if(respuesta == -3){
                    $("#DistriErrorMsg").html('<p class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Tiene que estar logueado y ser administrador para ejecutar este proceso</p>');
                  }else {
                    if(respuesta){
                    $("#DistriErrorMsg").html('<p class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Garantia ejecutada exitosamente.        <button style="float: right;margin-top: -7px;" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button></p>');
                    $("#elevarDistriForm").remove();
                    $("#ejecutarGtia").html('<p class="alert alert-info"><i class="fa fa-check-circle" aria-hidden="true"></i> Garantia ejecutada exitosamente. (NOTA A CARGO DISTRIBUIDOR)</p>');
                  }else{
                    $("#DistriErrorMsg").html('<p class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Usuario o contraseña no válidos.</p>');
                  }
                  }
                 

                }
        });

    });

    $('#registrarProgVisita').on('click', function(e){

        var parametros = {
            "observaciones" : $("#obsProg").val(),
            "idGarantiaAEjecutar" : $("#gtiaProgramar").val(),
            "fecha" : $("#fechaProg").val(),
            "tipo" : 1 //programar visita
        }
        $.ajax({
                data:  parametros,
                dataType: "json",
                url:   'consulta/nuevo-evento',
                type:  'POST',
                beforeSend: function () {
                        $("#progVisitaErrorMsg").html('<p class="alert alert-info"><i class="fa fa-spinner" aria-hidden="true"></i> Procesando, espere por favor...</p>');
                },
                success:  function (respuesta) {
                  if(respuesta == -3){
                    $("#progVisitaErrorMsg").html('<p class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Tiene que estar logueado y ser administrador para ejecutar este proceso</p>');
                    
                  }
                  else
                   if(respuesta){
                    $("#progVisitaErrorMsg").html('<p class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i>Se ha dejado constancia de la visita programada, en caso de querer ejecutar esta garantía luego podrá hacerlo desde la opción \'Proceder a ejecutar\'     <button style="float: right;margin-top: -7px;" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button></p>');
                    $("#progVisitaForm").remove();
                    $("#ejecutarGtia").html('<p class="alert alert-warning"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>Se ha dejado constancia de la visita programada, en caso de querer ejecutar esta garantía luego podrá hacerlo desde la opción \'Proceder a ejecutar\'</p>');
                  }else{
                    $("#progVisitaErrorMsg").html('<p class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>No se ha podido programar su visita, intente nuevamente.</p>');
                  }

                }
        });
    });

    $('#registrarRechazo').on('click', function(e){

        var parametros = {
                "observaciones" : $("#obsRechazo").val(),
                "idGarantiaAEjecutar" : $("#gtiaRechazar").val()
        };
        $.ajax({
                data:  parametros,
                dataType: "json",
                url:   'rechazogtiaevento',
                type:  'POST',
                beforeSend: function () {
                        $("#RechazoErrorMsg").html('<p class="alert alert-info"><i class="fa fa-spinner" aria-hidden="true"></i> Procesando, espere por favor...</p>');
                },
                success:  function (respuesta) {
                  if(respuesta == -3){
                    $("#RechazoErrorMsg").html('<p class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Tiene que estar logueado y ser administrador para ejecutar este proceso</p>');
                  }
                  else {
                    if(respuesta){
                    $("#RechazoErrorMsg").html('<p class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Se ha dejado constancia de la observación, en caso de querer ejecutar esta garantía a futuro podrá hacerlo desde la opción \'Proceder a ejecutar\'.        <button style="float: right;margin-top: -7px;" type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button></p>');
                    $("#registrarEventoRechazo").remove();
                    $("#ejecutarGtia").html('<p class="alert alert-warning"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>Se ha dejado constancia de la observación, en caso de querer ejecutar esta garantía a futuro podrá hacerlo desde la opción \'Proceder a ejecutar\'</p>');
                  }else{
                    $("#RechazoErrorMsg").html('<p class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Usuario o contraseña no válidos.</p>');
                  }
                  }
                

                }
        });

    });

  $( "#verifProducto" ).on("change",  function() {
    if($(this).is(":checked")) {
      $('.decisionEjecuta').removeClass("disabled", false);
      $('#primerVisita').addClass("disabled", false);
    }else{
      $('.decisionEjecuta').addClass("disabled", true);
      $('#primerVisita').removeClass("disabled", false);
    }
  });


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
