@extends('admin.template.main')

@section('title', 'Editar Usuario ' . $user->name)

@section('content')

	{!! Form::open(['route' => array('admin.users.update', $user->id), 'method' => 'PUT']) !!}

		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', $user->name, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre completo']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Correo Electronico') !!}
			{!! Form::text('email', $user->email, ['class' => 'form-control', 'required', 'placeholder' => 'Correo Electronico']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('type', 'Tipo') !!}
			{!! Form::select('type', ['admin' => 'Administrador', 'member' => 'Miembro'], $user->type, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
			{!! Form::button('<i class="fa fa-undo"></i> Volver', ['class' => 'btn btn-default', 'onclick' => 'window.location.href="/admin"']) !!}

		</div>

	{!! Form::close() !!}

@endsection
