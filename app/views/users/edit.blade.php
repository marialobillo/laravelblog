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
				{{Form::label('tiposuser_id', 'Tipo Usuario')}}
				{{Form::select('tiposuser_id', $tiposuser, null, ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('aci_id', 'Tipo de ACI. (Rellenar si procede)')}}
				{{Form::select('aci_id', $acis, null, ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('nombre', 'Nombre')}}
				{{Form::text('nombre', Input::old('nombre'), ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('apellidos', 'Apellidos')}}
				{{Form::text('apellidos', Input::old('apellidos'), ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
					{{Form::label('cedula', 'Cédula')}}
					{{Form::text('cedula', Input::old('cedula'), ['class' => 'form-control'])}}
		
			</div>
			<div class="form-group">
				{{Form::label('direccion', 'Dirección')}}
				{{Form::text('direccion', Input::old('direccion'), ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('localidad', 'Localidad/Ciudad')}}
				{{Form::text('localidad', Input::old('localidad'), ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('provincia', 'Provincia')}}
				{{Form::text('provincia', Input::old('provincia'), ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
				{{Form::label('pais', 'País')}}
				{{Form::text('pais', Input::old('pais'), ['class' => 'form-control'])}}
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