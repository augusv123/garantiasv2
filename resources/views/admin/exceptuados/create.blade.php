@extends('admin.template.main')

@section('title', 'Añadir Exceptuado')

@section('content')

	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
		@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
		@endforeach
			</ul>
		</div>
	@endif

	{!! Form::open(['route' => 'admin.exceptuados.store', 'method' => 'POST']) !!}

		<div class="form-group">
			{!! Form::label('orden', 'Orden') !!}
			{!! Form::text('orden', null, ['class' => 'form-control', 'required', 'placeholder' => 'Orden de Fabricación']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('etiqueta', 'Etiqueta') !!}
			{!! Form::text('etiqueta', null, ['class' => 'form-control', 'required', 'placeholder' => 'Etiqueta de Fabricación']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.exceptuados.index') }}" class="btn btn-info">Volver</a>
		</div>

	{!! Form::close() !!}

@endsection