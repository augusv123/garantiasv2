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
    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Familias de productos y garantía correspondiente</a></li>
   <!-- <li role="presentation"><a href="#filtros" aria-controls="filtros" role="tab" data-toggle="tab">Registrarse</a></li>-->
  </ul>
  <!-- Tab panes -->
  <div class="tab-content" style="margin-bottom:30px;">
    <div role="tabpanel" class="tab-pane active" id="info">



      <table class="table" >
  			<thead>
  				<th>Cod. Familia</th>
  				<th>Familia</th>
  				<th>Garantia</th>
  			</thead>
  			<tbody>
  				@foreach($productosgep as $producto)
  					<tr>
  						<td>{{ $producto->famComercial }}</td>
  						<td>{{ $producto->descFamComercial }}</td>
  						<td>@if($producto->categoriaGarantia == 1) Legal - 6 Meses @elseif ($producto->categoriaGarantia == 2) GTIA PIERO 6M+4.5 AÑOS @elseif ($producto->categoriaGarantia == 3) GTIA PIERO ALTA GAMA 1+4AÑOS @endif</td>
  					</tr>
  				@endforeach
  			</tbody>
  		</table>



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
