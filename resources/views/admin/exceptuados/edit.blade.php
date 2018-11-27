@extends('admin.template.main')

@section('title', 'Editar Excepción ' . $exceptuado->orden)

@section('content')

	{!! Form::open(['route' => array('admin.exceptuados.update', $exceptuado->id), 'method' => 'PUT']) !!}

		<div class="form-group">
			{!! Form::label('orden', 'Orden') !!}
			{!! Form::text('orden', $exceptuado->orden, ['class' => 'form-control', 'required', 'placeholder' => 'Orden de fabricación']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('etiqueta', 'Etiqueta') !!}
			{!! Form::text('etiqueta', $exceptuado->etiqueta, ['class' => 'form-control', 'required', 'placeholder' => 'Etiqueta de fabricación']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection