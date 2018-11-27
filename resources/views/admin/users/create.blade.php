@extends('admin.template.main')

@section('title', 'Crear Usuario')

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

	{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}

		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre completo']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Correo Electronico') !!}
			{!! Form::text('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Correo Electronico']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Contraseña') !!}
			{!! Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => '********']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('type', 'Tipo') !!}
			{!! Form::select('type', ['' => 'Seleccione un nivel..', 'member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@endsection