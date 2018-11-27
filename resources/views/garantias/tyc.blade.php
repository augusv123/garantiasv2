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
    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Terminos y Condiciones</a></li>
   <!-- <li role="presentation"><a href="#filtros" aria-controls="filtros" role="tab" data-toggle="tab">Registrarse</a></li>-->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content" style="margin-bottom:30px;">
    <div role="tabpanel" class="tab-pane active" id="info">

      <div id="confidencialidadyPDP" style="height:100%;">
<h3>GARANTIA PIERO EXTENDIDA</h3><p>El presente producto se encuentra amparado por el alcance de la garantía legal, prevista en el capítulo IV de la Ley de Defensa del Consumidor Nro. 24.240 (o la normativa que en el futuro la reemplace), por el plazo legal (hoy vigente de 6 meses) desde la fecha de entrega del producto. Para todo reclamo relativo a la garantía del producto Ud. (consumidor) deberá dirigirse al punto de venta donde adquirió el producto y acompañar la factura de compra y la etiqueta de registro de fabricación, que identificada con un código de barras y medidas, se encuentra adherida en el lateral del colchón. <u>Recuerde conservar estos elementos y documentos para ejercer su derecho de garantía. En el caso que el punto de venta donde adquirió el producto no esté disponible u operando, por cualquier causa que fuere, a los fines antes indicados por favor dirigirse al siguiente correo: atencionalcliente@piero.com.ar y teléfono de contacto: (+54) (11) 4117-7200.</u></p><p><strong>Adicionalmente,</strong>Piero S.A.I.C., en adelante “Piero” en su condición de fabricante del producto, le ofrece para ciertos productos, que Ud. (consumidor) podrá verificar accediendo al siguiente link: http://garantias.piero.com.ar/productosengarantia, una garantía de plazo extendido “Garantía Extendida Piero” o “GEP”. <u>Se deja expresa constancia que la adhesión y el beneficio de contar con la Garantía Extendida Piero en caso que la misma resulte aplicable en atención al producto por Ud. (consumidor) adquirido: (i) es GRATUITA: es decir, no tiene costo alguno para el consumidor; (ii) no implica el compromiso de compra por el consumidor de otro producto; y (iii) no implica la participación por parte del consumidor en ningún tipo de promoción.</u> </p><p>Para acceder a la Garantía Extendida Piero Usted (consumidor) deberá ingresar <u>indefectiblemente dentro de los 12 meses posteriores a la fecha de entrega del producto </u> a la página  <strong>www.piero.com.ar</strong> al campo “quiero extender el plazo de garantía de mi producto” y seguir las indicaciones allí consignadas.En caso que el consumidor solicitare la extensión de la garantía transcurrido el plazo de 12 meses a la fecha de entrega del producto, Piero -a su exclusivo criterio- podrá otorgar o denegar tal solicitud. </p><p>A los fines de gestionar la solicitud de la GEP Ud. (consumidor) deberá registrarse, facilitando todos los datos requeridos para tal acto a los fines de obtener un usuario y contraseña que le permitirá, seguidamente, registrar su producto para que el mismo, en su caso y una vez registrado, quede amparado por la GEP. A los fines de su registración personal como también para registrar su producto bajo la GEP, Ud. (consumidor) deberá facilitar todos los datos siguiendo los pasos que a tales fines el sitio informático le requiera. Piero se reserva el derecho de verificar que los datos proporcionados sean correctos. En caso de verificarse datos incorrectos o no veraces, Piero podrá denegar la garantía. Luego de aceptar los términos y condiciones de la GEP, se enviará su solicitud y como confirmación de aceptación, recibirá en la casilla de e-mail consignada en oportunidad de su registración personal un Registro de Garantía. Ese Registro de Garantía es el que deberá Ud. (consumidor) acompañar y declarar al presentar su reclamo al Punto de Venta junto con su factura de compra y etiqueta de registro de fabricación, que identificada con un código de barras y medidas, se encuentra adherida en el lateral del colchón. Recuerde conservar estos elementos para ejecutar su GEP. </p><h6>La GEP se otorga bajo los siguientes términos y condiciones:</h6><h4>TERMINOS Y CONDICIONES “GARANTIA EXTENDIDA PIERO”</h4><p>(i)	Vigencia: Esta garantía se extiende a cinco (5) años desde la fecha de entrega del producto (FEP). Este plazo incluye y absorbe el plazo de la garantía legal. Esta garantía extendida se extinguirá automáticamente a los cinco (5) años de la fecha de entrega del producto, se hayan producido o no reemplazos por efecto de la garantía durante su transcurso. Se deja expresa constancia que en el caso de productos entregados en reemplazo por ejecución y reconocimiento de la GEP, los mismos contarán con la garantía legal de 6 meses desde la fecha de entrega, pero la vigencia de la GEP sobre los mismos será la del plazo remanente de GEP para el producto original que se trate “incluyendo dicho plazo el de la garantía legal”. En el caso de productos en reposición deberá el consumidor registrar nuevamente el producto repuesto para que el mismo quede amparado por la GEP por el plazo de vigencia remanente al producto adquirido en primer momento. Una vez registrado por el consumidor el producto entregado en reposición, Piero emitirá respecto del mismo, en su caso, un nuevo Registro de Garantía por todo el plazo remanente.</p><p>(ii)	Alcance: Esta garantía, durante su vigencia, cubre la reposición del producto por vicios o defectos conforme la siguiente escala decreciente:</p><br><table class='table table-bordered table-striped'><thead><tr><td  colspan='6'><strong>COBERTURA SEGÚN TIEMPO DE USO</strong></td></tr></thead><tbody><tr><td> </td><td style="color:#00274e;"> 6 meses desde FEP a 1 año </td><td style="color:#00274e;"> 1 año desde FEP a 2 años   </td><td style="color:#00274e;"> 2 años desde FEP a 3 años</td><td style="color:#00274e;"> 3 años desde FEP a 4 años </td><td style="color:#00274e;"> 4 años desde FEP a 5 años </td></tr><tr><td><strong>Porcentaje de Cobertura productos con GEP </strong></td><td> 100% </td><td> 75% </td><td> 50%  </td><td> 25% </td><td> 10% </td></tr></tbody></table><br><p>(iii)	Aclaración adicional 1 respecto al alcance: El valor del producto sobre el que se aplicará el porcentaje no alcanzado por la cobertura de la GEP, que el consumidor deberá abonar para la reposición del producto, se tomará de la lista de precios de venta al público vigente a la fecha del reconocimiento por Piero del reclamo, correspondiente al producto adquirido. En caso que el producto se encuentre discontinuo, Piero se reserva el derecho de reconocer la garantía sobre un producto de similares características, gama, precio y valor dentro de los que se encuentre fabricando y comercializando al momento del reconocimiento por Piero del reclamo.</p><p>(iv)	Aclaración adicional 2 respecto al alcance. Ejemplo: La escala porcentual decreciente de cobertura de la GEP implica que de corresponder el cambio de producto Ud. (consumidor) deberá abonar el importe del valor actual del mismo, cfr. lista de precios de venta al público vigente a la fecha del reconocimiento por Piero del reclamo, por el porcentaje no cubierto por la garantía. A modo de ejemplo, si el valor actual del producto fuera de $1000 y la GEP se ejerciera entre el 3er. y el 4to. año desde la FFP, Ud. (consumidor) para obtener la reposición del producto deberá abonar la suma de $750, equivalente al 75% del valor actual del producto ya que a esa fecha el producto solo cuenta con un 25% de cobertura.</p><p>(v)	Consultas relativas al estado y vigencia de la GEP: el consumidor que registrare su producto Piero a los fines de obtener la GEP en forma satisfactoria podrá consultar en cualquier momento -durante la vigencia de la GEP- el estado de la misma y el porcentual de cobertura vigente a la fecha de la consulta. </p><p>(vi)	En ningún caso la GEP podrá sustituirse por dinero. La GEP solo alcanza la reposición del producto bajo los términos expuestos en este documento.</p><p>(vii)	En todos los casos se deberá entregar en devolución el producto cuya reposición fuera solicitada.</p><p>(viii)	Verificación del producto: Piero se reserva el derecho, como condición de garantía, de verificar por si o a través de terceros, la/s falla/s alegadas como causa del reclamo. La negativa del consumidor o la imposibilidad de la verificación del producto por causas ajenas a Piero, podrá ser considerada como una causal de exclusión de la garantía.</p><p>(ix)	Cualquier tipo de acuerdo o reconocimiento realizado por el punto de venta del producto, sin la intervención de Piero y que no responda a los términos y condiciones de este documento, no será vinculante ni obligará a Piero a su cumplimiento, ni será considerado un antecedente para un posterior reclamo.</p><p><strong>(x)	Exclusiones:</strong> <br>1.	Quemaduras de la tela o del interior de la estructura del colchón, por efecto del calor de plancha, secadores de pelo u otros elementos que irradien calor, contacto directo con el fuego o productos químicos como ácidos, solventes, etc.<br>2.	Deterioro causado por impactos sobre el colchón (saltos) o por efecto del peso de otros objetos apoyados sobre el colchón o por efecto de elementos cortantes o punzantes.<br>3.	Deterioro causado por derrame de líquidos.<br>4.	Deterioro causado por el mal uso (ver recomendaciones de uso en Punto xii que sigue) o localización del colchón. <br>5.	Deterioros o desgastes propios del normal uso del colchón.<br>6.	Producto con el marco perimetral doblado por el efecto de maltrato.<br>7.	Deterioros causados por someter el producto a un peso excesivo. <br>8.	Imposibilidad de verificación de la falla o defecto objeto del reclamo.<br>9.	Reposición o reparación de las manijas exteriores de sujeción del producto.<br>10.	Medidas del producto dentro de los límites de tolerancia que seguidamente se informan.<br></p><p>(xi)	Tolerancia de medidas: Se deja expresa constancia que en todos los casos de productos Piero el régimen de tolerancia de medidas es de +/- 2 cm. En todos los casos las medidas de los productos Piero son expresadas en centímetros. </p><p>(xii)	Recomendaciones de uso: En todos los casos el consumidor deberá cumplir con las recomendaciones de uso, rotación, manipulación y traslado que seguidamente se identifican.</p>

<br>
<p>
  <strong>1.- Rotación: </strong>
  Los materiales usados en los colchones están diseñados para adaptarse a los contornos individuales del cuerpo, esto no es un defecto estructural. Para igualar la impresión que el cuerpo causa naturalmente sobre la superficie del colchón, sugerimos rotarlo de la siguiente forma:</p><br><p>@if(!isset($_GET['col']))<img class='img-responsive center-block' src='{{ asset("css/imagenes/rotacion.jpg") }}'>@elseif($_GET['col'] == 'yoga')<img class='img-responsive center-block' src='{{ asset("css/imagenes/rotacionYoga.png") }}'>@elseif($_GET['col'] == 'ambar')<img class='img-responsive center-block' src='{{ asset("css/imagenes/rotacionAmbar.png") }}'>@endif</p>
<br>
<p>
  <strong>2.- Manipulación y traslado:</strong> No doblar el colchón bajo ninguna circunstancia. No permita que su colchón permanezca húmedo. Este tratamiento podría dañar el interior de la unidad.No doble las puntas del colchón al colocar sábanas ajustables. No permita que nadie salte sobre el colchón. No está construido para esa concentración de peso. Protéjalo del agua y otros líquidos.</p>
<br>
<p>
  <strong>3.- Sobre el uso del producto: </strong>Durante el uso normal del colchón pueden producirse leves deformaciones en su superficie, que coincidirán con las áreas de contacto del cuerpo con mayor peso. Esto no se considerará como un defecto que deba ser cubierto por la garantía. Esto es simplemente el indicio de que los rellenos de tapicería se están asentando y compactando, adaptándose a su anatomía. Este efecto no afecta las propiedades del colchón.</p>
<br>
<p>(xiii)	La registración por Ud. (consumidor) para la obtención de la GEP implica su aceptación de los siguientes documentos: (i) los Términos y Condiciones de la Garantía Extendida Piero aquí enumerados; y (ii) la Política de Confidencialidad y Protección de datos personal de Piero disponible en el siguiente link:  http://garantias.piero.com.ar/confidencialidadypdp. Al aceptar los presentes términos y condiciones, el consumidor da a Piero, su consentimiento previo, expreso e informado para recolectar los datos personales que proporciona al momento de su registración como usuario, tales como nombre, apellido, e-mail y DNI (los “Datos Personales”), para procesarlos y utilizarlos a los efectos de incluirlo como tomador de la GEP y contactarlo por cualquier medio en caso de resultar necesario. Ud. (consumidor) entiende que si no provee los Datos Personales o los provee de manera inexacta, es posible que Piero no pueda contactarse con el mismo a los fines indicados anteriormente. Ud. (consumidor) entiende también que -como titular de los Datos Personales - tiene derecho a solicitar el acceso, rectificación, actualización y -en su caso- supresión de los mismos. El titular de los Datos Personales tiene la facultad de ejercer el derecho de acceso a los mismos en forma gratuita en intervalos no inferiores a seis meses, salvo que se acredite un interés legítimo al efecto conforme lo establecido en el artículo 14, inciso 3 de la Ley Nº 25.326. La DIRECCION NACIONAL DE PROTECCION DE DATOS PERSONALES, Órgano de Control de la Ley Nº 25.326, tiene la atribución de atender las denuncias y reclamos que se interpongan con relación al incumplimiento de las normas sobre protección de datos personales (Disposición 10/2008, artículo 1º y 2°, B.O. 18/09/2008).</p>
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
