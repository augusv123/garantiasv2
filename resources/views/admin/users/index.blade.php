@extends('admin.template.main')

@section('title', 'Lista de usuarios')

@section('content')
	<a href="{{ route('admin.users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Registrar nuevo usuario</a>
	<a href="{{ route('admin.users.index') }}" class="btn btn-primary"><i class="fa fa-undo"></i> Ver todos</a>
	<form action="{{ route('admin.users.search') }}" method="POST" role="search" style="width: 300px;float: right;">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Buscar Usuarios"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form><hr>
		<table class="footable table table-hover table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>e-mail</th>
				<th>Tipo</th>
				<th>Activado?</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							@if($user->type == "admin")
								<span class="label label-danger">{{ $user->type }}</span>
							@else
								<span class="label label-primary">{{ $user->type }}</span>
							@endif

							</td>
							<td>
								@if($user->activated == 1)
									<span class="label label-success">SI</span>
								@else
									<span class="label label-danger">NO</span>
								@endif
							</td>
						<td>

							<!--<a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger" disabled><i class="fa fa-trash-o"></i></a>-->
							<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
							<button data-toggle="modal" data-target="#view-modal" class="getGarantias btn btn-sm btn-info"
							  data-url="{{ route('dynamicModal',['id'=>$user->id])}}"><i class="fa fa-eye"></i></a> Ver Garantias
							</button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div id="view-modal" class="modal fade"
    tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
     <div class="modal-dialog">
          <div class="modal-content">

               <div class="modal-header">
                    <button type="button" class="close"
                        data-dismiss="modal"
                        aria-hidden="true">
                        ×
                     </button>
                    <h4 class="modal-title">
                        <i class="glyphicon glyphicon-user"></i> Garantias del usuario
                    </h4>
               </div>
               <div class="modal-body">

                   <div id="modal-loader"
                        style="display: none; text-align: center;">
                    <img width="50" src="{{asset('images/ajax-loader.gif')}}">
                   </div>

                   <!-- content will be load here -->
                   <div id="dynamic-content"></div>

                </div>
                <div class="modal-footer">
                      <button type="button"
                          class="btn btn-default"
                          data-dismiss="modal">
                          Cerrar
                      </button>
                </div>

         </div>
      </div>
</div><!-- /.modal -->

		{!! $users->render() !!}
@endsection
