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

  <div class="col-lg-8 col-lg-offset-2" >
    @include('flash::message')
    <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Política de Confidencialidad y Protección de Datos Personales</a></li>
   <!-- <li role="presentation"><a href="#filtros" aria-controls="filtros" role="tab" data-toggle="tab">Registrarse</a></li>-->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content" style="margin-bottom:30px;">
    <div role="tabpanel" class="tab-pane active" id="info">

      <div id="confidencialidadyPDP" style="height:100%;">
      <h4>Política de Confidencialidad y Protección de Datos Personales (en adelante, la “Politica”)</h4>
 <p>
Piero SAIC (en adelante, Piero) es titular del sitio web: www.piero.com.ar (en adelante, el “Sitio”) y responsable de los documentos y archivos que en general se generen con los datos aun de carácter personal suministrados por los usuarios a través de los mismos.</br>
En consecuencia, los datos personales recopilados con la utilización que Ud. realice del Sitio serán tratados de conformidad con la siguiente Política de Piero la cual resultara de aplicación exclusivamente respecto del Sitio y no así a los sitios de terceros a los que el usuario eventualmente podría acceder desde el Sitio
Piero garantiza la privacidad y confidencialidad de los datos de carácter personal proporcionados por su titular de conformidad con lo establecido en el art. 43, par. Tercero de la CN, Ley Nro. 25.326 de Protección de Datos Personales, Decreto Nro. 1558/2001 y en la Disposición 11/2006 de la Dirección Nacional de Protección de Datos Personales.</br>
Piero se reserva el derecho de requerir a los fines de la creación de una cuenta de usuario para acceder a determinados servicios y contenidos del Sitio ciertos datos personales del usuario e inclusive limitar y restringir la habilitación de aquellos servicios y contenidos al ingreso de tal información. </br>
Quienes opten por registrarse en el Sitio deberán brindar información exacta y completa de sus datos personales. Asimismo, deberán tomar y adoptar todas las medidas y recaudos necesarios para que su contraseña habilitante se mantenga en todo momento como privada y no permitir que terceras personas utilicen su cuenta. También deberá el usuario desconectarse del Sitio cuando haya terminado la sesión a fin de evitar el uso con su registración por terceras personas. Los usuarios son enteramente responsables por los daños y perjuicios que eventualmente deriven del incumplimiento, total o parcial, de las obligaciones anteriormente expuestas.</br>
Los datos personales que se recabarán de los usuarios registrados son, únicamente, aquellos brindados libre y voluntariamente por el titular de tales datos al momento de la creación de la cuenta de usuario o posteriormente. </br>
Para la utilización del Sitio y/o la registración que Ud. hiciera para la obtención de un usuario en el sistema de Garantía Extendida Piero cfr. los términos y condiciones de tal garantía (consultar aquí – fijar link para acceder a tales términos y condiciones) se requiere la aceptación de esta Política.</br>
A los fines de conservar una constancia, cualquiera fuera el medio de la misma, equivalente del consentimiento del titular de los datos personales antes de la habilitación de la cuenta de usuario Piero podrá exigir que aquel preste conformidad a la Política haciendo un clic en el botón que contiene la leyenda “Acepto la Política de Confidencialidad y Protección de Datos Personales” de Piero.</br>
Cualquier información, salvo que la misma se trate de información estrictamente personal, que los usuarios transmitan a Piero a través del Sitio y/o de sus redes sociales, correo electrónico o de otra manera, incluyendo –sin limitarse- datos, preguntas, comentarios o sugerencias, serán tratados como información no confidencial. Esta información, con excepción de datos o información personal, se puede utilizar para cualquier propósito, lo que incluye: reproducción, solicitud, acceso, transmisión, publicación y difusión. </br>
En consecuencia, Piero podrá utilizar cualquier idea, concepto, conocimiento técnico, o técnica contenida en cualquier comunicación que el usuario envíe a Piero por medio del Sitio y/o sus redes sociales y/o por cualquier otro medio para cualquier propósito, lo cual incluye el desarrollo y comercialización de productos.</br>
Se deja expresa constancia que Piero en ningún caso procederá al registro de los “datos sensibles” de los usuarios del Sitio. Asimismo, se deja expresa constancia que tales datos son los datos personales que revelan y/o evidencien el origen racial y étnico, las opiniones o ideologías políticas, creencias religiosas, filosóficas o morales, afiliación sindical o información referente a la salud o a la vida sexual de sus usuarios.</br>
Piero podrá utilizar los datos recabados de su Sitio con la finalidad de mantener informados a los usuarios sobre sus acciones, promociones, lanzamientos y, en general, para proporcionar en forma más eficaz los servicios que los usuarios soliciten. </br>
En caso que el usuario no concuerde con las finalidades para las cuales Piero recaba los datos o con alguna de las finalidades para las cuales se utilizarán en el futuro los mismos, Piero garantiza y facilitará el derecho de obtener la supresión de los mismos de su base de datos.</br>
Piero en ningún caso salvo autorización expresa otorgada por el usuario y/o requerimiento legal o de la autoridad competente: (i) revelará la información provista a ninguna organización externa; ni (ii) comercializará -por cualquier medio-, transferirá ni cederá los datos personales de los usuarios del Sitio y/o de sus clientes a terceros sin expreso consentimiento de aquellos. </br>
Se deja expresa constancia que Piero: (i) reconoce al titular de los datos personales, previa acreditación de su identidad, el derecho a solicitar y a obtener información sobre sus datos personales incluidos en sus registros, dentro de los diez días hábiles desde la solicitud, de conformidad con lo establecido en el artículo 14, inciso 3 de la Ley 25.326 de protección de Datos Personales; y (ii) garantiza  al titular de los datos personales el derecho a obtener la rectificación, actualización y, en su caso, la supresión de los datos personales de los que sea titular, que estén incluidos en su base de datos y garantiza la rectificación, supresión o actualización de los mismos en el plazo máximo de cinco días hábiles de recibido el respectivo reclamo por el titular de los datos. </br>
En caso de incumplimiento de estas obligaciones por parte de Piero dentro de los términos mencionados supra habilitará el ejercicio de la acción de protección de los datos personales o de hábeas data prevista en la Ley 25.326 de Protección de Datos Personales.  </br>
Cfr. Disp. 10/2008 – art. 1°- de la Dirección Nacional de Protección de Datos Personales se informa y hace saber a todos los fines y efectos que pudieran corresponder que: </br>
“El titular de los datos personales tiene la facultad de ejercer el derecho de acceso a los mismos en forma gratuita a intervalos no inferiores a seis meses, salvo que se acredite un interés legítimo al efecto conforme lo establecido en el artículo 14, inciso 3 de la Ley Nº 25.326”.</br>
Todas las comunicaciones en lo que respecta los aspectos plasmados y documentados en la Política y en particular, los derechos de acceso y rectificación de datos, deberán cursarse por medio fehaciente a Piero SAIC, con domicilio en la calle 25 de mayo 565, Piso 5°, Ciudad Autónoma de Buenos Aires o por correo electrónico dirigido a: ---------  </br>
La Dirección Nacional de Protección de Datos Personales, Órgano de Control de la Ley Nº 25.326 tiene la atribución de atender las denuncias y reclamos que se interpongan con relación al incumplimiento de las normas sobre protección de datos personales. Para mayor información remitirse a la Dirección Nacional de Datos Personales: www.jus.gov.ar/datos-personales.aspx, “Tus Derechos”, “Denuncias”. </br>
Piero podrá denegar el acceso, rectificación o la supresión de los datos personales registrados únicamente por las causas previstas en la ley de aplicación en esta materia.</br>
Piero ha adoptado medidas de seguridad para proteger la información y datos personales que los usuarios registran e incorporan en su Sitio. Piero asume la obligación de realizar sus mejores esfuerzos -a partir de la tecnología disponible- a efectos de proteger y mantener salvaguardados y conforme a niveles de protección adecuados la información personal que todo usuario incorpore e ingrese en su Sitio. </br>
La presente Política se rige por las leyes de la República Argentina. Ante cualquier disputa o reclamo que surja con relación a la misma, incluyendo cualquier disputa sobre la validez, interpretación, exigibilidad o incumplimiento será competente la Justicia Nacional Ordinaria en lo Comercial de la Ciudad Autónoma de Buenos Aires. </br>
 </p>
    </div>

    </div>
  </div>

  </div>


</div>
@endsection

@section('extraJS')
  <script src="{{ asset('plugins/backstretch/jquery.backstretch.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
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
