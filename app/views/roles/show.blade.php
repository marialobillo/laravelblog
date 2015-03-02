@extends('layouts.main')

@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">
			Role: {{$role->nombre}}
		</h1>
	</div>

	<div class="container">
		
		<div class="row">
		<div class="col-md-10">
			<strong>Nombre:</strong>
			<p>{{$role->nombre}}</p>
			<strong>Descripción:</strong>
			<p>{{$role->descripcion}}</p>
		</div>
	</div>

	<hr>
	<div class="row">
		<div class="col-md-6">
			{{HTML::link('roles', 'Volver a Roles', ['class' => 'btn btn-warning'])}}
		</div>
	</div>


	</div>
@stop