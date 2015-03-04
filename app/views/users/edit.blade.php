@extends('layouts.main')


@section('contenido')

<div class="container">
	<div class="row">
	<div class="jumbotron">
		<h1 class="text-center">Editar Usuario</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		@if($errors->has())
			<div class="alert alert-danger col-md-offset-2">
				@foreach($errors->all('<p>:message</p>') as $message)
					{{$message}}
				@endforeach
			</div>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="form">
			{{Form::model($user, ['method' => 'PATCH', 
				'route' => ['users.update', $user->id]
				]
				)}}
			<div class="form-group">
				{{Form::label('role_id', 'Role')}}
				{{Form::select('role_id', $roles,null,['class' => 'form-control'])}}
			</div>
			
			<div class="form-group">
				{{Form::label('username', 'Username')}}
				{{Form::text('username', Input::old('username'), ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('email', 'Email')}}
				{{Form::text('email', Input::old('email'), ['class' => 'form-control'])}}
			</div>
			
			<div class="row">
				<div class="col-md-5">
					{{Form::submit('Editar Cambios Usuario', ['class' => 'btn btn-primary'])}}
				</div>
				<div class="col-md-5">
					{{HTML::link('users', 'Cancelar', ['class' => 'btn btn-success'])}}
				</div>

			</div>
			
			{{Form::close()}}

			
		</div>
	</div>
</div>
</div>



@stop