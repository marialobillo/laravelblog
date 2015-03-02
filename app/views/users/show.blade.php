@extends('layouts.main')


@section('contenido')
	
	<div class="jumbotron">
		<h2 class="text-center">
			Usuario: {{$user->apellidos}}, {{$user->nombre}}

		</h2>
		<p class="text-center">
		Role: 
			<?php $role_user = Role::find($user->role_id); ?>
				{{$role_user->nombre}}
		</p>
		<p class="text-center">
		Tipo: <?php $tipos_user = TiposUser::find($user->tiposuser_id); ?>
			{{$tipos_user->nombre}}
		</p>
	</div>

	<div class="container">
		
		{{HTML::link('users', 'Volver A Usuarios', 
		['class' => 'btn btn-success'])}}

		<hr>
		
		<div class="row">
			<div class="col-md-8">
				<p>
					<strong>Nombre:</strong>
					<p>{{$user->nombre}}</p>
				</p>
				<p>
					<strong>Apellidos:</strong>
					<p>{{$user->apellidos}}</p>
				</p>
				<p>
					<strong>Dirección:</strong>
					<p>{{$user->direccion}}</p>
				</p>
				<p>
					<strong>Localidad:</strong>
					<p>{{$user->localidad}}</p>
				</p>
				<p>
					<strong>Provincia:</strong>
					<p>{{$user->provincia}}</p>
				</p>
				<p>
					<strong>Email:</strong>
					<p>{{$user->email}}</p>
				</p>
				<p>
					<strong>Cédula:</strong>
					<p>{{$user->cedula}}</p>
				</p>
				<p>
					<strong>Role:</strong>
					<p>
						<?php 
							$role = Role::find($user->role_id);
						 ?>
						 {{$role->nombre}}
					</p>
				</p>
				<p>
					<strong>Tipo:</strong>
					<p>
						<?php 
							$tiposuser = TiposUser::find($user->tiposuser_id);
						 ?>
						 {{$tiposuser->nombre}}
					</p>
				</p>
				<p>
					<strong>Aci:</strong>
					<p>
						<?php 
							$aci = Aci::find($user->aci_id);
						 ?>
						 {{$aci->nombre}}
					</p>
				</p>
			</div>
		</div>


	</div>


@stop