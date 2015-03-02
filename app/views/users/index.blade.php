@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Usuarios</h1>
		<hr>
	</div>
	
	<div class="container">
		
		<div class="row">
		<div class="col-md-8">
			@if($errors->has())
			<div class="alert alert-danger col-md-offset-2">
				@foreach($errors->all('<p>:message</p>') as $message)
					{{ $message }}
				@endforeach
			</div>
			@endif
			@if (Session::has('message'))
    			<div class="alert alert-info col-md-offset-2">
    				{{ Session::get('message') }}
    			</div>
			@endif
		</div>
	</div>
	

	@if($users->isEmpty())
		<p>No hay Usuarios aún.</p>
	@else
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Apellidos</td>
						<td>Cedula</td>
						<td>Role</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->nombre}}</td>
							<td>{{$user->apellidos}}</td>
							<td>{{$user->cedula}}</td>
							<td>
								<?php $role = Role::find($user->role_id); ?>
								{{$role->nombre}}
							</td>
							<td>

								{{HTML::link('users/'.$user->id, 'Ver Usuario', ['class' => 'btn btn-xs btn-warning'])}}

								{{HTML::link('users/'.$user->id.'/edit', 'Editar Usuario', ['class' => 'btn btn-xs btn-success'])}}

								{{Form::open(['url' => 'users/'.$user->id, 'class' => 'pull-right'])}}
								{{Form::hidden('_method', 'DELETE')}}
								{{Form::submit('Eliminar Usuario', ['class' => 'btn btn-xs btn-danger'])}}
								{{Form::close()}}

								@if($user->code != '')
									{{HTML::link('account-activate/'. $user->code, 'Activar Usuario', ['class' => 'btn btn-xs btn-primary'])}}
								@endif

							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
	@endif

	<!-- El botón para crear una nueva categoria -->
	<div class="row">
		<hr>
		{{HTML::link('users/create', 'Nuevo Usuario', 
		['class' => 'btn btn-primary'])}}
	</div>


	</div><!-- Fin de container -->


@stop