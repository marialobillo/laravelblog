<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('titulo') Laravel Blog</title>
  {{HTML::style('css/bootstrap.css')}}
  {{HTML::style('css/main.css')}}

</head>
<body>
<div class="wrapper">
	

	
	

	@include('layouts.navigation')





<div class="row">
	<div class="container">
		<div class="col-md-8">
			@if(Session::has('global'))
				<div class="panel panel-info">
					<div class="panel-heading">
						<p>{{Session::get('global')}}</p>
					</div>
				</div>
			@endif
	</div>
	</div>
</div>


	<div class="contenedor">
		@yield('contenido')

	</div>





</div>


{{HTML::script('js/jquery.js')}}
{{HTML::script('js/bootstrap.js')}}
	
</body>
</html>