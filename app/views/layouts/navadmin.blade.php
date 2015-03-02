<div class="navbar navbar-inverse navbar-static-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
<a href= "#" class="navbar-brand">AsiLegal / Admin</a>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav pull-right">
        <li class="active "><a href="{{URL::to('/')}}">Home</a></li>
        

        @if(Auth::check())

            
            
            <li>{{HTML::link('roles', 'Roles')}}</li>
            <li>{{HTML::link('users', 'Usuarios')}}</li>
            <li>{{HTML::link('telefonicas', 'Telefónicas')}}</li>
            <li>{{HTML::link('tarifas', 'Tarifas')}}</li>
            <li>{{HTML::link('pagos', 'Pagos')}}</li>
            <li>{{HTML::link('estadospagos', 'EstadosPagos')}}</li>
            <li>{{HTML::link('acis', 'ACIs')}}</li>
            <li>{{HTML::link('nominas', 'Nóminas')}}</li>

            <li><a href="{{URL::route('admin-password')}}">Cambiar Contraseña</a></li>
            <li class="active"><a href="{{URL::route('account-signout')}}">Salir</a></li>

        @else
           
            <li><a href="{{URL::route('account-signin')}}">Acceso</a></li>
        
        @endif
    
    </ul>   
</div>
</div>
