@extends('admin.template.main')


@section('content')
	<!--<a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar nuevo usuario</a><hr>-->
	<form action="fam-com-garantia" id="famcomform">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row">
		
		<select class="js-example-basic-single" name="familiacomercial" id="familiaselector">
			@foreach ($familiascomerciales as $familia)
				@if(isset($familia->descricao))
				<option value="{!!$familia->{'fm-cod-com'} !!}">{{$familia->descricao}} - DATASUL</option>
				@else 
				<option value="{{$familia->Mvgr2}}">{{$familia->Bezei}} - SAP</option>

				@endif
			@endforeach
	
	  	</select>

	  <select class="js-example-basic-single" name="categoria" id="categoriaselector">
			@foreach ($categoriasDeGarantias as $categoria)
				<option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
		
			@endforeach
	
	  </select>
	  <button type="submit" class=" btn btn-sm btn-success" ><i class="fa fa-plus"></i> Agregar </button>
	</div>
</form>

	<div class="row">
		<div class="input-group mb-3">
			
				<input id="filter"  type="text" class="form-control" placeholder="Filtrar..." aria-label="Username" aria-describedby="basic-addon1" />
		  </div>
		<table class="footable table table-striped"  id="tablarelacionfamiliasgarantia" data-filter="#filter" data-paging="true" data-page-size="10" data-page-navigation=".pagination" >
			<thead>
				<th>Familia Comercial</th>
				<th>Codigo del producto</th>
				<th>Garantia</th>
				<th>Eliminar</th>
			
			</thead>
			<tbody>
				@foreach($famComGarantias as $garantia)
					<tr>
						{{-- <td>{{ $garantia->familia_comercial->descricao }}</td>
						<td>{{ $garantia->fam_com }}</td>
						<td>{{ $garantia->categoria->descripcion  }}</td> --}}
						@if(isset($garantia->familia_comercial))
								<td>{{ $garantia->familia_comercial->descricao }}</td>

						@elseif(isset($garantia->descripcion))		
						<td>{{ $garantia->descripcion }}</td>

								@else 
								<td>No esta setteado</td>
								@endif
						<td>{{ $garantia->fam_com }}</td>
						@if(isset($garantia->categoria))
						<td>{{ $garantia->categoria->descripcion }}</td>
						@else 
						<td>No esta setteado</td>
						@endif
						<td>

							@if(isset($garantia->familia_comercial))
	 							<button type="button" class=" btn btn-sm btn-danger deleteFamCom" data-id="{{ $garantia->familia_comercial->{'fm-cod-com'}  }}" ><i class="fa fa-trash"></i>  </button>
							@elseif(isset($garantia->descripcion)) 
								<button type="button" class=" btn btn-sm btn-danger deleteFamCom" data-id="{{ $garantia->fam_com }}" ><i class="fa fa-trash"></i>  </button>
							@else
							<button type="button" class=" btn btn-sm btn-danger " disabled ><i class="fa fa-trash"></i>  </button>
							@endif
					
						</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot class="hide-if-no-paging">
				<tr>
				  <td colspan="5" class="text-center">
				  <ul class="pagination"></ul>
				  </td>
				</tr>
			  </tfoot>
		</table>
		
	</div>

@endsection

