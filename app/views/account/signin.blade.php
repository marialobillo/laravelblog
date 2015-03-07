@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Acceso</h1>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="form">
					{{Form::open(['route' => 'account-signin-post'])}}
					<div class="form-group">
						{{Form::label('email', 'Correo Electrónico')}}
						{{Form::text('email', Input::old('email'), ['class' => 'form-control'])}}
						@if($errors->has('email'))
							{{$errors->first('email')}}
						@endif
					</div>
					<div class="form-group">
						{{Form::label('password', 'Contraseña')}}
						{{Form::password('password', ['class' => 'form-control'])}}
						@if($errors->has('password'))
							{{$errors->first('password')}}
						@endif
					</div>
					{{Form::submit('Acceder a la Cuenta', ['class' => 'boton btn-success'])}}
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>


@stop