@extends('layouts.main')


@section('contenido')
	
	<div class="jumbotron">
		<h2 class="text-center">
			Usuario: {{$user->username}}
		</h2>
		<p class="text-center">
		Role: 
			<?php $role_user = Role::find($user->role_id); ?>
				{{$role_user->name}}
		</p>
		
	</div>

	<div class="container">
		
		{{HTML::link('users', 'Volver A Usuarios', 
		['class' => 'btn btn-success'])}}

		<hr>
		
		<div class="row">
			<div class="col-md-8">
				<p>
					<strong>Username:</strong>
					<p>{{$user->username}}</p>
				</p>
				<p>
					<strong>Email:</strong>
					<p>{{$user->email}}</p>
				</p>
				<p>
					<strong>Role:</strong>
					<p>
						<?php 
							$role = Role::find($user->role_id);
						 ?>
						 {{$role->name}}
					</p>
				</p>
				
			</div>
		</div>


	</div>


@stop