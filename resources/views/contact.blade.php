@extends('layout')

@section('content')

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SITU</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- BOOTSTRAP LINKS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- CSS LINK CON NOMENCLATURA LARAVEL -->
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />


</head>

  

  <!-- INICIO BARRA MENÚ DE NAVEGACIÓN -->
  <nav class="navbar navbar-inverse  navbar-fixed-top"  role="navigation" >

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">


        <!-- IMAGEN HOME CON ICONO DE LA UFV -->
        <li class=" li_resize navbar-brand-logo active">
            <a href="/" align="center" style="padding: 0 0 0 0 "> 
               <img width="50px" src="{{ asset('images/icono.jpg') }}" >
           </a>
       </li>

       <!-- BOTON "ABOUT" -->
       <li>
        <a  data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About
        </a>
    </li>


  <!--   <li class="dropdown">
      <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
        <span class="glyphicon glyphicon-education" aria-hidden="true"></span> USUARIOS <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">ADMINISTRADOR</a></li>
          <li><a href="#">ALUMNO</a></li>
          <li><a href="#">PROFESOR</a></li>
          <li><a href="#">INVITADO</a></li>
      </ul>
  </li> -->

  <!-- BOTON CONTACT -->
  <li><a href="contact">
      <span class="glyphicon glyphicon-user" aria-hidden="true"></span> ContactUs</a>
  </li>

</ul>

<!-- BOTÓN DE LOGIN -->
<ul class="nav navbar-nav navbar-right" style="margin-right: 13%;">
 <li>

    <div>

        @if (Route::has('login'))
        <div class="top-right links"
        style="color:#8B8B8B; background-color:transparent; border-radius: 8px"
        onmouseover="this.style.backgroundColor='#344A6C'" 
        onmouseout=" this.style.backgroundColor='transparent'">
        @auth
    
        @else
         <a style="color:#8B8B8B;"  
         onmouseover="this.style.color='white'" 
         onmouseout="this.style.color='#8B8B8B'" href="{{ route('login') }}">Login</a>
        @endauth
    </div>
    @endif
</div>
</li>
</ul>

<!-- BOTÓN DE REGISTER -->
<ul class="nav navbar-nav navbar-right" style="margin-right: 1%; ">

 <li>
    <div>
        @if (Route::has('login'))
        <div class="top-right links"
        style="color:#8B8B8B; background-color:transparent; border-radius: 8px"
        onmouseover="this.style.backgroundColor='#344A6C'" 
        onmouseout=" this.style.backgroundColor='transparent'">
        @auth
        <a style="color:#8B8B8B;"  
        onmouseover="this.style.color='white'" 
        onmouseout="this.style.color='#8B8B8B'" href="{{ url('/home') }}">Home</a>
        @else
        <a style="color:#8B8B8B;"  
        onmouseover="this.style.color='white'" 
        onmouseout="this.style.color='#8B8B8B'" href="{{ route('register') }}">Registrarse</a>
        @endauth
    </div>
    @endif
</div>
</li>
</ul>


</div>
</div>
</nav>
<!-- FIN DE BARRA MENU NAVEGACIÓN -->
<br>
<br>
<div class="container">
	<h1 class="mb-2 text-center">Contact Us</h1>
	
	@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
	@endif
	
	<div class="col-12 col-md-6">
		<form class="form-horizontal" method="POST" action="/contact">
			{{ csrf_field() }} 
			<div class="form-group">
			<label for="Name">Nombre: </label>
			<input type="text" class="form-control" id="name" placeholder="Tu nombre" name="name" required>
		</div>

		<div class="form-group">
			<label for="email">Email: </label>
			<input type="text" class="form-control" id="email" placeholder="john@example.com" name="email" required>
		</div>

		<div class="form-group">
			<label for="message">Mensaje: </label>
			<textarea type="text" class="form-control luna-message" id="message" placeholder="Escribe aquí tu mensaje" name="message" ></textarea>
		</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary" value="Send">ENVIAR</button>
			</div>
		</form>
	</div>
 </div> <!-- /container -->



 <div class="alert alert-warning">
    <strong>Warning!</strong> Debido a no utilizar un servidor de correo de pago, el correo es probable que llegue a la carpeta SPAM.
  </div>



<!--  BANNER MODAL ABOUT -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- CONTENIDO DE ABOUT EN BANNER-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ABOUT US</h4>
        </div>
        <div class="modal-body" style="background-color: rgba(171, 184, 203, 0.70)  ">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- FIN BANNER MODAL -->

@endsection