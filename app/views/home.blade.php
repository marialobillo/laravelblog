@extends('layouts.main')

@section('contenido')

<div class="jumbotron">
	<h1 class="text-center">
		@if(Auth::check())
			<h1 class="text-center">
				Bienvenid@ {{Auth::user()->nombre}}
			</h1>
			<p class="text-center">Panel Administrativo </p>
		
		@else
			<h1 class="text-center">
				Laravel Blog
			</h1>
		
		@endif
	</h1>
</div>
@stop
