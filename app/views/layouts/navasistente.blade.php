<div class="navbar navbar-inverse navbar-static-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
<a href= "#" class="navbar-brand">AsiLegal / Asistente </a>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav pull-right">
        <li class="active "><a href="{{URL::to('/')}}">Home</a></li>
        

        @if(Auth::check())

            
            <li><a href="{{URL::route('account-signout')}}">Salir</a></li>
           

        @else
           
            <li><a href="{{URL::route('account-signin')}}">Acceso</a></li>
        
        @endif
    
    </ul>   
</div>
</div>
