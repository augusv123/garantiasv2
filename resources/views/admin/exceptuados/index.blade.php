@extends('admin.template.main')

@section('title', 'Lista de Exceptuados')

@section('content')
	<a href="{{ route('admin.exceptuados.create') }}" class="btn btn-info">Registrar excepción</a><hr>
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Orden</th>
				<th>Etiqueta</th>
				<th>Fecha Exceptuado</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($exceptuados as $exceptuado)
					<tr>
						<td>{{ $exceptuado->id }}</td>
						<td>{{ $exceptuado->orden }}</td>
						<td>{{ $exceptuado->etiqueta }}</td>
						<td>{{ $exceptuado->created_at }}</td>
						<td><a href="{{ route('admin.exceptuados.destroy', $exceptuado->id) }}" class="btn btn-info"><i class="fa fa-trash-o"></i></a>   
							<a href="{{ route('admin.exceptuados.edit', $exceptuado->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $exceptuados->render() !!}
@endsection
