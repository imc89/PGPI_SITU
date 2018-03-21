
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


<body onload="deshabilitaRetroceso()">
  <!-- INICIO NAVEGADOR -->
  <div class="topnav navbar navbar-inverse  navbar-fixed-top" id="myTopnav">
   <a href="alumno" align="center" style="padding: 0 0 0 0 "> 
     <img width="50px" src="{{ asset('images/icono.jpg') }}" >
   </a>
   <a  data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About
  </a>
  <a id="btn" onmouseover="style='cursor: help;'" onmouseout="style='cursor: default'">
    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda 
  </a>
  <a href="mail_invitados">
    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> INVITAR 
  </a>
  <a href="#">
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
<div class="container">
  <h1 class="mb-2 text-center">KEYWORDS</h1>

  <tr><a class="btn btn-primary btn-sm" href="crear_keyword">NUEVA KEYWORD</a></tr>
  <br>
  <br>
  <table class="table table-striped table-dark">
    <?php $contador=0 ?>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre Keyword</th>
      </tr>
    </thead>
    <tbody>
      @foreach($keywords as $u)
      <tr>
        <th scope="row"><?php $contador++; echo $contador ?></th>
        <td> {{ $u->name }} </td>

      </tr>
      @endforeach
    </tbody>
  </table>

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

<style type="text/css">
a:hover span {
    transform: rotateY(360deg);
    -webkit-transform: rotateY(360deg);
    transition-duration: 1.5s;
    -webkit-transition-duration:1s;
} </style>
