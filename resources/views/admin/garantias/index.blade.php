@extends('admin.template.main')

@section('title', 'Lista de Garantias')

@section('content')
	<!--<a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar nuevo usuario</a><hr>-->
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Orden</th>
				<th>Etiqueta</th>
				<th>Item</th>
				<th>Accion</th>
			</thead>
			<tbody>
				@foreach($garantias as $garantia)
					<tr>
						<td>{{ $garantia->id }}</td>
						<td>{{ $garantia->orden }}</td>
						<td>{{ $garantia->etiqueta }}</td>
						<td>{{ $garantia->it_codigo }}</td>
						<td><!-- <a href="#" class="btn btn-info"><i class="fa fa-handshake-o"></i>Exceptuar Limite Carga</a>
							<a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i></a>--></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $garantias->render() !!}
@endsection
