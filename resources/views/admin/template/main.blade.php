<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'Default') | Panel de administracion</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
                <link rel="stylesheet" href="{{ asset('//maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css') }}">
    </head>
    <body>
    	@include('admin.template.partials.nav')
    <div class="container">
			<section>
                @include('flash::message')
				<div class="panel panel-default">
					<div class="panel-heading">@yield('title', 'Default')</div>
  					<div class="panel-body">
    				@yield('content')
  					</div>
				</div>
			</section>
		</div>
		@include('admin.template.partials.footer')
		<script src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
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
  $(document).ready(function(){

      $(document).on('click', '.getGarantias', function(e){

          e.preventDefault();

          var url = $(this).data('url');

          $('#dynamic-content').html(''); // leave it blank before ajax call
          $('#modal-loader').show();      // load ajax loader

          $.ajax({
              url: url,
              type: 'GET',
              dataType: 'html'
          })
          .done(function(data){
              console.log(data);
              $('#dynamic-content').html('');
              $('#dynamic-content').html(data); // load response
              $('#modal-loader').hide();        // hide ajax loader
              $('.footable').footable(); //agrego footable a tabla del DOM cargada por Ajax
              $(document).on("click", ".checkEstadoGtia", function () { //mostrar en modal el porcentaje reconocido - traer al DOM
                   var porcentajeCubierto = $(this).data('id');
                   $('#porcentajeGtia').text(porcentajeCubierto);
              });
          })
          .fail(function(){
              $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Algo ha salido mal, Intente nuevamente...');
              $('#modal-loader').hide();
          });

      });

  });

  </script>
    </body>
</html>
