@extends('admin.template.main')

@section('title', 'Lista de Eventos')

@section('content')
	<!--<a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar nuevo usuario</a><hr>-->
		<table class="footable table table-striped">
			<thead>
				<th>ID</th>
				<th>ID Garantia</th>
				<th>Observaciones</th>
				<th>Tipo</th>
				<th>Visita</th>
			</thead>
			<tbody>
				@foreach($eventos as $evento)
					<tr>
						<td>{{ $evento->id }}</td>
						<td>{{ $evento->garantia->id_garantia }}</td>
						<td style="max-width:400px;">{{ $evento->observaciones }}</td>
						<td class="@if($evento->tipo == 1) warning @else danger @endif">@if($evento->tipo == 1) Prog. Visita @else Obs. No Procede @endif</td>
						<td>@if($evento->fecha != "0000-00-00") {{ $evento->fecha }} @else - @endif</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $eventos->render() !!}
@endsection
