@extends('layouts.app')

@section('content')

<ol style="margin-top:10px;" class="breadcrumb">
Inicio \ Garantias
</ol>

<div class="content">
  <p style="width: 50%;float: left;margin-top:15px;   text-shadow: 3px 3px 2px rgba(85, 85, 85, 0.61);" >Garant&iacute;as Piero</p>
  <a style="float:right;padding:18px;vertical-align:middle;" id="addColchon" class="agregarNuevo btn btn-primary">Agregar Nuevo&nbsp;&nbsp;<i class="fa fa-plus"></i></a>
</div>

<div id="container" style="padding-top:30px;" class="container">

	<div class="ingreseOrden animated flipInX" id="ingreseOrden">


<div id="example-popover-2-content" class="hidden">
  <div>
    <b>Ubicación del registro de fabricación</b> El registro de fabricación es una cadena de numeros separados por la letra E que se encuentra ubicada en uno de los laterales del producto adquirido (ej. 68512E3).<br> En la imagen a continuación se observa la etiqueta con el registro de fabricación a modo orientativo. <br><img width="249" src="{{ asset('css/imagenes/regFabricacion1.png') }}"><b>NOTA: </b>Recuerde que el colchón y sommier son productos diferentes y deberá registrarlos por separado.
  </div>
</div>

<div id="example-popover-2-title" class="hidden">
  <b>Ayuda</b>
</div>


  	<div class="form-inline" role="form">
  		<div class="form-group">
        	<a class="coefTooltip" data-toggle="tooltip" data-placement="auto" style="color:#2c3e50;cursor:pointer;vertical-align:middle;"  ><i style="color:#2c3e50;font-size:20px;vertical-align:middle;" class="fa fa-question-circle"></i> Donde está?</a>&nbsp;&nbsp;&nbsp;
          <label style="vertical-align:middle;margin-top:5px;"> Ingrese su registro de Fabricaci&oacute;n aquí:</label>
        	<div class="input-group">
            	<input type="text" class="form-control" id="ordenProd" />
            	<span style="padding:9px 15px;" class="input-group-addon">E</span>
            	<input type="text" id="etiqueta" class="form-control" style="width:60px;" />
        	</div>
  		</div>
  		<button class="btn btn-primary" id="traerInfoOrden" >Continuar  <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
	</div>

	</div>
    <br>
@include('flash::message')

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
      <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
      </ul>
    </div>
@endif
<style media="screen">
.jumboMargin{
  font-size:18px !important;margin-right:120px;
}
/* Small Devices, Tablets */
@media only screen and (max-width : 568px) {
  .jumboMargin{
    font-size:15px !important;margin-right:10px;
  }
}
</style>
  <div class="col-lg-6 col-md-12 col-xs-12 bkgjumbo" style="padding:12px;margin-bottom:20px;" id="nuevoColchon">
	 <div style="margin-bottom:-20px;margin-top: -20px;" class="jumbotron bkgfalse">
  		<h2>Bienvenido</h2>
  		<p class="jumboMargin">
  			Desde aqu&iacute; podr&aacute; registrar la garantia extendida de sus productos adquiridos. Para ello debe indefectiblemente registrarlos de forma gratuita dentro de los primeros 12 meses de realizada la compra y obtendr&aacute;
  			su garant&iacute;a extendida por 5 a&ntilde;os desde la misma.
  		</p>
  		<a href="#" id="addNuevo" class="agregarNuevo btn btn-primary visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" style="margin-bottom:-5px;"><i class="fa fa-plus"></i>&nbsp; Agregar Nueva</a>&nbsp;<a href="#" id="addNuevo" class="agregarNuevo btn btn-primary visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" style="margin-bottom:-5px;" data-toggle="modal" data-target="#terminos"><i class="fa fa-gavel"></i>  Terminos y condiciones</a>
	 </div>
	</div>

	<div class="col-lg-6 col-md-12 col-xs-12" style="margin-bottom:20px;">
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>  Mis productos registrados<a data-toggle="collapse" data-target="#collapseTwo" href="#collapseTwo" class="collapsed"></a>
      </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
      <div class="panel-body" style="padding:0px;">
  @include('garantias.lista')
      </div>
      <div class="panel-footer"  id="paginacionPersonalizada" align="center">{!! $garantias->render() !!}</div>
    </div>
    </div>
  	</div>

</div>

@endsection
@section('extraJS')

<script type="text/javascript">

var Categoria = "0";
// Validates that the input string is a valid date formatted as "mm/dd/yyyy"
function isValidDate(dateString)
{
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[0], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
}


//Muestra terminos y condiciones antes de que el formulario se envie
  $('#terminos').on('show.bs.modal', function (e) {
      // Verifico que se muestre boton para confirmar aceptacion de terminos solo cuando se este registrando una compra
      if(e.relatedTarget.id == 'regCompra'){
        if( !isValidDate( $( "#fechaCarton" ).val()) || !isValidDate( $( "#fechaRecepcion" ).val()) ){ //valido fecha cargada por javascript
          alert("Verifique el formato de las fechas ingresadas");
          e.preventDefault();
        }
        else{
          $( "#checkTyC" ).show();
          $( "#confirm" ).show();
          $( "#notaHabilitaAcept" ).show();
          if(Categoria =="1"){
            $("#agreement").html("@include('garantias.terminosGenerales')"); //includeGarantias.terminos)
          }else if(Categoria =="2"){
            $("#agreement").html("@include('garantias.terminosPieroExtendida')");
          }else if(Categoria =="3"){
            $("#agreement").html("@include('garantias.terminosAltaGama')");
          }
        }
      }else{
        $( "#checkTyC" ).hide();
        $( "#confirm" ).hide();
        $( "#notaHabilitaAcept" ).hide();
        $("#agreement").html("@include('garantias.terminosGenerales')");
      }
      // Pasar referencia del formulario al modal para submit al presionar OK
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-header #confirm').data('form', form);
  });

  <!-- Form confirm (yes/ok) handler, submits form -->
  $('#terminos').find('.modal-header #confirm').on('click', function(){
      $('.scrollParaHabilitar').html('<i class="fa fa-paper-plane" aria-hidden="true"></i> Enviando..');
      $('#confirm').attr('disabled','disabled');
      $(this).data('form').submit();
      $('.scrollParaHabilitar').popover("hide");
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
})
</script>
<!--
<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
-->

<!-- JQUERY DATEPICKER -->
<link rel="stylesheet" href="{{ asset('//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css') }}">
<script src="{{ asset('//code.jquery.com/ui/1.11.3/jquery-ui.js') }}"></script>

<script type="text/javascript">
/*
*   Jquery datepicker CONFIG ESPAÑOL
*/
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);

$(document).on("click", ".checkEstadoGtia", function () {
     var porcentajeCubierto = $(this).data('id');
     $('#porcentajeGtia').text(porcentajeCubierto);
});

$( document ).ready(function(){

//$('[data-toggle="tooltip"]').popover({ content: 'El registro de fabricación se encuentra ubicado en los laterales del colchón (Ver Imagen) <img src="" />' });

$(".printer").bind("click",function()
  {
    $('#agreement').printArea();
  });

  $('[data-toggle="descboton"]').popover({
          trigger: 'hover',
          html : true
  });


$('[data-toggle="tooltip"]').popover({
        trigger: 'hover',
        html : true,
        content: function() {
          return $("#example-popover-2-content").html();
        },
        title: function() {
          return $("#example-popover-2-title").html();
        }
});

$('[data-toggle="popover"]').popover();

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});
$( "#ingreseOrden" ).hide();

/*
*	Muestra mini form para buscar Orden de produccion
*/
$(".agregarNuevo").click( function(){
	$( "#ingreseOrden" ).show();
});

/*
*	Accion BUSCAR para traer info de orden si la hay
*/
$("#traerInfoOrden").click( function(){

if( $("#ordenProd").val() && $("#etiqueta").val() ){
        var parametros = {
                "ordenProd" : $("#ordenProd").val(),
                "etiqueta" : $("#etiqueta").val(),
                "userLogged" : ""
        };
        $.ajax({
                data:  parametros,
                dataType: "json",
                url:   'garantias',
                type:  'POST',
                beforeSend: function () {
                        $("#nuevoColchon").html("Procesando, espere por favor...");
                },
                success:  function (response) {

	                    var contenido;
	                    if(response.success){
	                    	var itCodigo = response.regFabricacion.itCodigo;
                        var estado = response.regFabricacion.estado;
							contenido = '<form class="form-horizontal" method="post" id="registrarCompra" action="nueva"><div class="form-group"><div class="col-xs-3"><img class="img-responsive" src="'+ response.regFabricacion.qr + '" /></div><div style="padding-left:10px;" class="col-xs-9"><p class="titulo">' +
                          response.regFabricacion.orden +'E' + parseInt(response.regFabricacion.etiqueta).toFixed() +
                          '</p><p class="sub" style="margin-right: 180px;"><label>Descripcion: </label>'  +
                          response.regFabricacion.descripcion + '</p><p class="sub"><label>Codigo item: </label>' +
                          itCodigo + '</p>' + estado +
                          '{{ Form::token() }}<input type="hidden" value="' + response.regFabricacion.orden +
                           '" id="ordenProduccion" name="ordenProduccion" ><input type="hidden" value="' +
                           response.regFabricacion.etiqueta + '" id="etiq" name="etiq" ><input type="hidden" value="' + itCodigo +
                           '" id="itemReg" name="itemReg" ><input type="hidden" value="' +
                           response.regFabricacion.tipoGarantia.lapsoValidez + '" id="validezGarantia" name="validezGarantia" ><input type="hidden" value="{{ Auth::user()->id }}" id="userLogged" name="userLogged" ></div></div>';
                           Categoria = response.regFabricacion.tipoGarantia.cat;
                           if(response.regFabricacion.tipoGarantia.cat == "1"){
                            contenido += '<div><p class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true">' +
                                         '</i> Su producto no esta alcanzado por la garantía extendida Piero. Su producto cuenta exclusivamente con la garantia legal prevista en la ley 24240 (o la que en el futuro la reemplace), por el plazo de 6 meses desde la fecha de entrega del producto. Podra hacer uso de su garantía legal en el local donde adquirió el producto o en caso de ventas online contactar al vendedor del mismo.</p></div>';
                           }else if( estado.indexOf( "Registrado" ) == -1 ){
                             /*
                           contenido += '<input type="hidden" value="' + response.regFabricacion.tipoGarantia.cat + '" id="id_categoria" name="id_categoria" >' +
                                        '<div class="form-group">' +
                                        '<label class="control-label col-xs-3" ><i style="color:#2c3e50;font-size:18px;vertical-align:middle;" class="fa fa-question-circle" data-container="body" data-trigger="hover" data-placement="bottom" data-toggle="popover" title="Ayuda" data-content="Si su producto ya fue reemplazado anteriormente, para registrar utilice la factura del producto inicial"></i> Factura:</label>' +
                                        '<div class="col-xs-9">' +
                                        '<input type="text" name="numFactura" id="numFactura" class="form-control" placeholder="Numero de factura prod. Adquirido">' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="form-group"><label class="control-label col-xs-3"><i style="color:#2c3e50;font-size:18px;vertical-align:middle;" class="fa fa-question-circle" data-container="body" data-trigger="hover" data-placement="bottom" data-toggle="popover" title="Ayuda" data-content="Ingrese aquí el C.U.I.T del comercio donde adquirió producto inserto en la factura de compra"></i> Adquirido a:</label><div class="col-xs-9">' +
                                        '<div class="input-group"><input type="text" value="" class="form-control" id="cuitEntidad" name="cuitEntidad" placeholder="C.U.I.T del comercio donde adquirió producto">' +
                                        '<span class="input-group-btn"><button class="btn btn-primary" type="button" id="verificarEntidad">Buscar</button></span></div>' +
                                        '</div><div style="padding-left:10px;" id="adquiridoEntidad" class="col-xs-12"></div></div></form>';
                                        */
                          contenido += '<input type="hidden" value="' + response.regFabricacion.tipoGarantia.cat + '" id="id_categoria" name="id_categoria" >' +
                                       '<div class="form-group contNuevoOSustituto">' +
                                       '<label class="control-label col-xs-12 col-sm-3" ><i style="color:#2c3e50;font-size:18px;vertical-align:middle;" class="fa fa-question-circle" data-container="body" data-trigger="hover" data-placement="bottom" data-toggle="popover" title="Ayuda" data-content="Si el producto a registrar es el reemplazo de un producto defectuoso ingrese el registro de fabricación del producto reemplazado y presione -Reemplazo- de lo contrario presione -Nuevo- para registrar su producto. Recuerde que Piero puede verificar esta información y dejar sin efecto la garantia en caso de dar información no veraz. "></i> Nuevo o reemplazo?</label>' +
                                       '<div class="col-xs-12 col-sm-9">' +
                                       '<button style="width:100%;margin-bottom:7px;" class="btn btn-primary sustituto" type="button" id="esNuevo">Nuevo</button>'+
                                       '<div class="input-group">	<input type="text" class="form-control sustituto" id="ordenSustituto" name="ordenSustituto" style="z-index: 0;" /> <span style="padding:9px 15px;" class="input-group-addon">E</span><input type="text" id="etiquetaSustituto" name="etiquetaSustituto" class="form-control sustituto" style="width:100px;z-index:0;" /><span class="input-group-btn"><button class="btn btn-primary sustituto" style="z-index:0;" type="button" id="esSustituto">Reemplazo</button></span></div>' +
                                       '</div>' +
                                       '</div>' +
                                       '<div class="form-group">'+
                                       '<div style="padding-left:10px;" id="factCuit" class="col-xs-12"></div>'+
                                       '<div style="padding-left:10px;" id="adquiridoEntidad" class="col-xs-12"></div>'+
                                       '</div>'+
                                       '</form>';
                           }else{
                           contenido += '</form>';
                           }


	                    }else{
	                    	contenido = response.error_msg;
	                    }

              $("#nuevoColchon").html(contenido);
              $('[data-toggle="popover"]').popover();


                }
        });
}

});

/*
* Accion BUSCAR para traer info de local de adquisicion de producto
*/
$(document).on('click', '#verificarEntidad', function(){

  if( $("#cuitEntidad").val() ){
        var parametros = {
                "cuitEntidad" : $("#cuitEntidad").val()
        };
        $.ajax({
                data:  parametros,
                dataType: "json",
                url:   'adquirido',
                type:  'POST',
                beforeSend: function () {
                        $("#adquiridoEntidad").html("Procesando, espere por favor...");
                },
                success:  function (respuesta) {
                      if(respuesta.success){
                        if($("#cuitEntidad").val() == '30504163543'){ //si es de piero va a tener que seleccionar la sucursal de compra para determinar el numero de cliente correspondiente
                          var emitenteDesc = '<div style="padding-left:10px;margin-bottom:10px;" class="verDatos col-xs-12">' +
                                            '<p class="titulo">PIERO</p>' +
                                            '<p class="sub"><label>Seleccione Sucursal: </label>' +
                                            '<select class="form-control" name="razonSoc">' +
                                              '<option value="120032">Unicenter</option>' +
                                              '<option value="120031">Escobar</option>' +
                                              '<option value="120033">Tortuguitas</option>' +
                                              '<option value="120036">OH My Bed!</option>' +
                                            '</select>' +
                                            '</p>' +
                                            '</div>';
                        }
                        else{
                          var emitenteDesc = '<div style="padding-left:10px;margin-bottom:10px;" class="verDatos col-xs-12">' +
                                            '<p class="titulo">' + respuesta.cliente.nombre + '</p>' +
                                            '<p class="sub"><label>Codigo: </label>' + respuesta.cliente.codEmitente + '</p>' +
                                            '<input type="hidden" name="razonSoc" class="form-control" value="' + respuesta.cliente.codEmitente + '">' +
                                            '</div>';
                        }
                    var contenido =  emitenteDesc +

                                      '<div class="form-group"><label class="control-label col-xs-3">Fecha Factura:</label><div class="col-xs-5"><div class="input-group">'+
                                      '<input class="form-control" name="fechaCarton" id="fechaCarton" type="text" readonly=readonly>'+
                                      '<span style="padding:9px 15px;" class="input-group-addon"><i class="fa fa-calendar"></i></span>'+
                                      '</div></div></div>' +
                                      '<div class="form-group"><label style="padding-top: 0px;" class="control-label col-xs-3"><i style="color:#f0ad4e;font-size:18px;vertical-align:middle;" class="fa fa-exclamation-triangle" data-container="body" data-trigger="hover" data-placement="bottom" data-toggle="popover" title="Información" data-content="Piero S.A.I.C se reserva el derecho de verificar que los datos proporcionados sean correctos. En caso de verificarse datos incorrectos o no veraces Piero SAIC podrá denegar la garantía extendida Piero."></i> Fecha Recepcion de producto:</label><div class="col-xs-5"><div class="input-group">'+
                                      '<input class="form-control" name="fechaRecepcion" id="fechaRecepcion" type="text" readonly=readonly>'+
                                      '<span style="padding:9px 15px;" class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>'+
                                      '</div></div><div class="col-xs-4"><button style="line-height: 3;margin-top: -40px;width: 100%;min-width: 140px;" id="regCompra" class="btn btn-primary" type="button" data-toggle="modal" data-target="#terminos">Registrar compra</button></div></div>';
                  }else{

                    var contenido = '<div class="form-group" style="margin-top:12px;"><label class="control-label col-xs-3">Raz&oacute;n Social:</label><div class="col-xs-9">'+
                                    '<input type="text" name="razonSoc" class="form-control" placeholder="Ingrese razon social presente en factura de compra"></div></div>'+
                                    '<div class="form-group"><label class="control-label col-xs-3">Fecha Factura:</label><div class="col-xs-5"><div class="input-group">'+
                                    '<input class="form-control" name="fechaCarton" id="fechaCarton" type="text" readonly=readonly>'+
                                    '<span style="padding:9px 15px;" class="input-group-addon"><i class="fa fa-calendar"></i></span>'+
                                    '</div></div></div>' +
                                    '<div class="form-group"><label style="padding-top: 0px;" class="control-label col-xs-3"><i style="color:#f0ad4e;font-size:18px;vertical-align:middle;" class="fa fa-exclamation-triangle" data-container="body" data-trigger="hover" data-placement="bottom" data-toggle="popover" title="Información" data-content="Piero S.A.I.C se reserva el derecho de verificar que los datos proporcionados sean correctos. En caso de verificarse datos incorrectos o no veraces Piero SAIC podrá denegar la garantía extendida Piero."></i> Fecha Recepcion de producto:</label><div class="col-xs-5"><div class="input-group">'+
                                    '<input class="form-control" name="fechaRecepcion" id="fechaRecepcion" type="text" readonly=readonly>'+
                                    '<span style="padding:9px 15px;" class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>'+
                                    '</div></div><div class="col-xs-4"><button style="line-height: 3;margin-top: -40px;width: 100%;min-width: 140px;" id="regCompra" class="btn btn-primary" type="button" data-toggle="modal" data-target="#terminos">Registrar compra</button></div></div>';
                  }

                  $("#adquiridoEntidad").html(contenido);
                  $('[data-toggle="popover"]').popover();
                  /* Agrego Fecha datepicker al DOM generado */
                  $("#fechaCarton, #fechaRecepcion").datepicker( {
                      dateFormat: 'dd/mm/yy'
                  });

                }
        });
}

});

/*
* Accion cuando colchon es nuevo para que muestre ingreso de factura de compra y datos local adquisicion
*/
$(document).on('click', '#esNuevo', function(){

    contenido = '<div class="form-group">' +
               '<label class="control-label col-xs-3" > Factura:</label>' +
               '<div class="col-xs-9">' +
               '<input type="text" name="numFactura" id="numFactura" class="form-control" placeholder="Numero de factura prod. Adquirido">' +
               '</div>' +
               '</div>' +
               '<div class="form-group">' +
               '<label class="control-label col-xs-3 msgvalidarNums"><i style="color:#2c3e50;font-size:18px;vertical-align:middle;" class="fa fa-question-circle" data-container="body" data-trigger="hover" data-placement="bottom" data-toggle="popover" title="Ayuda" data-content="Ingrese aquí el C.U.I.T del comercio donde adquirió producto inserto en la factura de compra. (SOLO NUMEROS)"></i> Adquirido a: </label>' +
               '<div class="col-xs-9">' +
               '<div class="input-group"><input type="text" value="" class="form-control input-number" id="cuitEntidad" name="cuitEntidad" placeholder="C.U.I.T del comercio donde adquirió producto">' +
               '<span class="input-group-btn"><button class="btn btn-primary" type="button" id="verificarEntidad">Buscar</button></span></div>' +
               '</div>'+
               '</div>';

    $( ".sustituto" ).prop( "disabled", true );
    $( ".contNuevoOSustituto" ).hide();
    $("#factCuit").html(contenido);
    $('[data-toggle="popover"]').popover();

    $('.input-number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g,'');
        $('.msgvalidarNums').append('<badge class="label label-warning" style="position: absolute;margin-top: 20px;margin-left: -120px;">CUIT Solo Numeros</badge>');
    });

});

/*
* Accion cuando colchon es Sustituto traer info del anterior
*/

$(document).on('click', '#esSustituto', function(){

    if( $("#ordenSustituto").val() && $("#etiquetaSustituto").val() ) {
        var parametros = {
              "ord" : $("#ordenSustituto").val(),
              "etiq" : $("#etiquetaSustituto").val()
        };
        $.ajax({
                data:  parametros,
                url:   'sustituido/{ord}/{etiq}',
                type:  'GET',
                beforeSend: function () {
                        $("#factCuit").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#factCuit").html(response);
                        if(!(response.indexOf(". Intente nuevamente.") > -1) && !(response.indexOf("El producto especificado no posee aún una garantía ejecutada.") > -1)){
                          $("#ordenSustituto").prop("readonly", true);
                          $("#etiquetaSustituto").prop("readonly", true);
                        }
                        $('[data-toggle="popover"]').popover();
                        $("#fechaRecepcion").val($("#fechaRecepcion").val().split("-").reverse().join("/"));
                        $("#ejecucionDate").text($("#ejecucionDate").text().split("-").reverse().join("/"));
                        $("#recepcionProd").val($("#recepcionProd").val().split("-").reverse().join("/"));
                        /* Agrego Fecha datepicker al DOM generado */
                        $("#fechaRecepcion").datepicker( {
                            dateFormat: 'dd/mm/yy',
                            minDate: $("#fechaRecepcion").val().split("-").reverse().join("/")
                        });
                }
        });
    }else{
        alert(" Ingrese el registro de fabricación del producto que está reemplazando ");
    }

    //$("#adquiridoEntidad").html(contenido);

});

});

</script>
      <!-- FOOTABLE TABLE -->
    <link href="{{ asset('plugins/FooTable/css/footable.core.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('plugins/FooTable/js/footable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/FooTable/js/footable.sort.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/FooTable/js/footable.filter.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      //FOOTABLE PLUGIN
      $(function () {
        $('.footable').footable();

      });
    </script>
    <script>
    $("#checkBoxID").click(function() {
        $("#confirm").attr("disabled", !this.checked);
        //$('#confirm').removeAttr('disabled');
        $('.scrollParaHabilitar').popover("hide");
    });
/*
  $('.modal-body').scroll(function() {
    var scrollpos = ($(this).scrollTop() + $(this).height());
  //  alert( $('#agreement').height() + "--" + scrollpos );

    if ($('#agreement').height() == ($(this).scrollTop() + $(this).height()) - 21) {
      $('#confirm').removeAttr('disabled');
      $('.scrollParaHabilitar').popover("hide");
    }

  });
*/
</script>
@endsection
