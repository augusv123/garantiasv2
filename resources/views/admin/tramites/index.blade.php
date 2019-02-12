@extends('admin.template.main')

@section('title', 'Lista de Bajas')

@section('content')
	<!--<a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar nuevo usuario</a><hr>-->
		<table class="footable table table-striped">
			<thead>
				<th>ID</th>
				<th>ID Cliente</th>
				<th>Fecha</th>
				<th>Actualizacion</th>
			</thead>
			<tbody>
				@foreach($tramites as $tramite)
					<tr>
						<td>{{ $tramite->id }}</td>
						<td>{{ $tramite->cliente }}</td>
						<td style="max-width:400px;">{{ $tramite->created_at->format('d-m-Y') }}</td>
						<td style="max-width:400px;">{{ $tramite->updated_at->format('d-m-Y') }}</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>
@endsection
