@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Crear Cuenta</h1>
	</div>


	<div class="row">
		<div class="container">
			<div class="col-md-8">
				<div class="form">
					{{Form::open(['route' => 'account-create-post'])}}
					<div class="form-group">
						{{Form::label('nombre', 'Nombre')}}
						{{Form::text('nombre', Input::old('nombre'), ['class' => 'form-control'])}}
						@if($errors->has('nombre'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('nombre')}}
						</div>
					</div>
					@endif
					</div>
					<div class="form-group">
						{{Form::label('apellidos', 'Apellidos')}}
						{{Form::text('apellidos', Input::old('apellidos'), ['class' => 'form-control'])}}
						@if($errors->has('apellidos'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('apellidos')}}
						</div>
					</div>
					@endif
					</div>
					<div class="form-group">
						{{Form::label('cedula', 'Cédula')}}
						{{Form::text('cedula', Input::old('cedula'), ['class' => 'form-control'])}}
						@if($errors->has('cedula'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('cedula')}}
						</div>
					</div>
					@endif
					</div>
					<div class="form-group">
						{{Form::label('direccion', 'Dirección')}}
						{{Form::text('direccion', Input::old('direccion'), ['class' => 'form-control'])}}
						@if($errors->has('direccion'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('direccion')}}
						</div>
					</div>
					@endif
					</div>
					<div class="form-group">
						{{Form::label('localidad', 'Localidad/Ciudad')}}
						{{Form::text('localidad', Input::old('Localidad'), ['class' => 'form-control'])}}
						@if($errors->has('localidad'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('localidad')}}
						</div>
					</div>
					@endif
					</div>
					<div class="form-group">
						{{Form::label('provincia', 'Provincia')}}
						{{Form::text('provincia', Input::old('provincia'), ['class' => 'form-control'])}}
						@if($errors->has('provincia'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('provincia')}}
						</div>
					</div>
					@endif
					</div>
					<div class="form-group">
						{{Form::label('pais', 'País')}}
						{{Form::text('pais', Input::old('pais'), ['class' => 'form-control'])}}
						@if($errors->has('pais'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('pais')}}
						</div>
					</div>
					@endif
					</div>
					<div class="form-group">
					{{Form::label('email', 'Correo Electrónico')}}
					{{Form::text('email', Input::old('email'), ['class' => 'form-control'])}}
					@if($errors->has('email'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('email')}}
						</div>
					</div>
					@endif
					</div>
					<div class="form-group">
					{{Form::label('password', 'Contraseña')}}
					{{Form::password('password', ['class' => 'form-control'])}}
					@if($errors->has('password'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('password')}}
						</div>
					</div>
					@endif
					</div>
					<div class="form-group">
					{{Form::label('password_confirm', 'Confirmar Contraseña')}}
					{{Form::password('password_confirm', ['class' => 'form-control'])}}
					@if($errors->has('password_confirm'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('password_confirm')}}
						</div>
					</div>
					@endif
					</div>
					{{Form::submit('Crear Cuenta', 
					['class' => 'btn btn-danger'])}}
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>

	
@stop