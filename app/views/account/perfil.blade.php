@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Editar Perfil</h1>
	</div>


	<div class="row">
		<div class="container">
			<div class="col-md-8">
				<div class="form">
					{{Form::open(['route' => 'account-perfil-post'])}}
					<div class="form-group">
						{{Form::label('nombre', 'Nombre')}}
						{{Form::text('nombre', Auth::user()->nombre, ['class' => 'form-control'])}}
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
						{{Form::text('apellidos', Auth::user()->apellidos, ['class' => 'form-control'])}}
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
						{{Form::text('cedula', Auth::user()->cedula, ['class' => 'form-control'])}}
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
						{{Form::text('direccion', Auth::user()->direccion, ['class' => 'form-control'])}}
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
						{{Form::text('localidad', Auth::user()->localidad, ['class' => 'form-control'])}}
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
						{{Form::text('provincia', Auth::user()->provincia, ['class' => 'form-control'])}}
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
						{{Form::text('pais', Auth::user()->pais, ['class' => 'form-control'])}}
						@if($errors->has('pais'))
					<div class="panel panel-danger">
						<div class="panel-heading">
							{{$errors->first('pais')}}
						</div>
					</div>
					@endif
					</div>
					
					<div class="row">
						<div class="col-md-3">
							{{Form::submit('Editar Perfil', 
							['class' => 'btn btn-danger'])}}
						</div>
						<div class="col-md-6">
							{{HTML::link('/', 'Volver sin guardar', ['class' => 'btn btn-success'])}}
						</div>
					</div>
					
					{{Form::close()}}
					
				</div>
				<hr>
			</div>

		</div>

	</div>

	
@stop