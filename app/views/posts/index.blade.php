@extends('layouts.main')


@section('contenido')

	<div class="jumbotron">
		<h1 class="text-center">Posts</h1>
	</div>



	<!-- Lo usaremos para mostrar mensajes -->
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



	<!-- El contenido de la web -->
	<div class="container">

	<!-- El botón para crear un nuevo item-->
	<div class="row">
		
		{{HTML::link('posts/create', 'Nuevo Post', 
		['class' => 'btn btn-primary'])}}
		<hr>
	</div>
	

		<div class="row">
			<div class="col-md-12">
				


				@if($posts->isEmpty())
		<p>No hay Posts aún.</p>
	@else
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Title</td>
						<td>Date</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<td>{{$post->id}}</td>
							<td>{{$post->title}}</td>
							<td>{{$post->created_at}}</td>
							<td>

								{{HTML::link('posts/'.$post->id, 'Ver Post', ['class' => 'btn btn-small btn-warning'])}}

								{{HTML::link('posts/'.$post->id.'/edit', 'Editar Post', ['class' => 'btn btn-small btn-success'])}}

								{{Form::open(['url' => 'posts/'.
									$post->id, 'class' => 'pull-right'])}}
								{{Form::hidden('_method', 'DELETE')}}
								{{Form::submit('Eliminar Post', ['class' => 'btn btn-danger'])}}
								{{Form::close()}}

							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
	@endif

	



			</div>
		</div>
	</div>
@stop