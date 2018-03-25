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



<!-- INICIO NAVEGADOR -->

<body onload="deshabilitaRetroceso()">
  <!-- INICIO NAVEGADOR -->
  <div class="topnav navbar navbar-inverse  navbar-fixed-top" id="myTopnav">
   <a href="alumno" align="center" style="padding: 0 0 0 0 "> 
     <img width="50px" src="{{ asset('images/icono.jpg') }}" >
   </a>
   <a  data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About
  </a>
  <a data-toggle="modal" data-target="#AYUDA" onmouseover="style='cursor: help;'" onmouseout="style='cursor: default'">
    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda 
  </a>
  <a href="mail_invitados">
    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> INVITAR 
  </a>
  <a href="keywords">
    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> KEYWORDS 
  </a>
  <a href="crear_hechos">
    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> HECHOS 
  </a>
  <a href="lineaTiempo">
    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> LÍNEA TEMPORAL 
  </a>
  <!-- BOTÓN DE LOGIN -->

  <ul  class="nav navbar-nav navbar-right" style="margin-right: 1%">
    <!-- Authentication Links -->
    @guest
    <li><a href="{{ route('login') }}">Login</a></li>
    @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
        <img src="/images/avatar/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:-35px; border-radius:50%">    
        {{ Auth::user()->name }} <span class="caret"></span>
      </a>

      <ul class="dropdown-menu" style="border-radius: 10px; text-align: left;">

        <li>
          <a style="font-weight: bold;" href="perfilAlumno" class="glyphicon glyphicon-user"> Perfil</a>
        </li>

        <li>
          <a style="font-weight: bold;" href="configPerfil" class="glyphicon glyphicon-cog"> Configuración</a>
        </li>


        <li>
          <a  style="font-weight: bold;" class="glyphicon glyphicon-log-out" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </li>
  @endguest
</ul>



<a href="javascript:void(0);" style="font-size:15px; background: #435E80;border-radius: 5px;
" class="icon" onclick="myFunction()">&#9776;</a>

</div> 
<!-- FIN DE NAVEGADOR -->


<br>
<br>
<br>
<br>
<div class="container">
 <h1 class="mb-2 text-center">INVITA A AMIGOS A VER TUS HECHOS</h1>

       <!--   @if(session('message')== "El usuario ya existe en el sistema")
         <div class='alert alert-danger'>
          {{ session('message') }}
        </div>
        @elseif(session('message'))
        <div class='alert alert-success'>
          {{ session('message') }}
        </div>
        @endif -->
        <div class="col-12 col-md-6">
          <form action="#" class="form-horizontal" method="POST">
           {{ csrf_field() }} 
           <div class="form-group"> <!-- NOMBRE -->
             <label for="Name">Nombre del invitado: </label>
             <input type="text" class="form-control" id="name" placeholder="Tu nombre" name="name" required>
           </div>

           <div class="form-group"><!-- EMAIL -->
             <label for="email">Email del invitado: </label>
             <input type="text" class="form-control" id="email" placeholder="john@example.com" name="email" required>
           </div>

           <div class="form-group">
            <button type="submit" class="btn btn-primary" value="Send">ENVIAR</button>
          </div>
        </form>
      </div>
    </div> <!-- /container -->

    
    <div class="alert alert-warning">
      <strong>Warning!</strong> Si ves que el correo no llega mira en la carpeta SPAM.
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