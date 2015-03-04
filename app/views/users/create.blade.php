@extends('layouts.main')


@section('contenido')

<div class="container">
	<div class="row">
	<div class="jumbotron">
		<h1 class="text-center">Nuevo Usuario</h1>
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
			{{Form::open(['url' => 'users'])}}
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
			<div class="form-group">
				{{Form::label('password', 'Contraseña')}}
				{{Form::password('password', ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
					{{Form::label('password_confirm', 'Confirmar Contraseña')}}
					{{Form::password('password_confirm', ['class' => 'form-control'])}}
			</div>

		
			

			{{Form::submit('Guardar Usuario', ['class' => 'btn btn-primary'])}}
			{{Form::close()}}
		</div>
	</div>
</div>
</div>



@stop