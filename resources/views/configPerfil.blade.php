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


<body>
  <!-- INICIO NAVEGADOR -->
  <div class="topnav navbar navbar-inverse  navbar-fixed-top" id="myTopnav">
   <a href="alumno" align="center" style="padding: 0 0 0 0 "> 
     <img width="50px" src="{{ asset('images/icono.jpg') }}" >
   </a>
   <a  data-toggle="modal" data-target="#myModal">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About
  </a>
  <a href="#">
    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> INVITAR 
  </a>
  <a href="#">
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
        <a style="font-weight: bold;" href="{{ route('logout') }}" class="glyphicon glyphicon-log-out" 
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

<br><br><br>
<!-- FIN DE NAVEGADOR -->


<!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->
<!-- <div class="container">
  <div class="line time">
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>

  </div>
</div> -->

<div class="body">

 <div align="center">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <img src="/images/avatar/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        <h2>{{ $user->name }}'s Profile</h2>
        <form enctype="multipart/form-data" action="configPerfil" method="POST">
          <label>Update Profile Image</label>
          <input type="file" name="avatar">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="btn btn-sm btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>

</div>
<br>
<br>
<div class="alert alert-warning" align="center">
  <strong>Warning!</strong> Los formatos admitidos son JPG, PNG, GIF
  <p>
  <strong>Warning!</strong> Para que la imagen se vea correctamente esta debe ser cuadrada.
</div>


<!-- FINAL CARRUSEL -->



<!-- FOOTER CON INFORMACIÓN Y REDES SOCIALES (COPIADO DE LA PÁGINA WEB DE LA UFV) -->

<div id="footer" style="position: relative; background: url('/images/fondo_body.jpg')fixed;" align="center">
  <table>
    <tbody>

     <tr> 
      <td class="foot_izdo">&nbsp;</td> 
      <td class="foot_cent"> 
        <p class="foot_datos"> Universidad Francisco de Vitoria • Ctra. Pozuelo-Majadahonda Km. 1.800 • 28223 Pozuelo de Alarcón (Madrid, España)
          <br> 
          Teléfono: (+34) 91.351.03.03 • Fax: (+34) 91.351.17.16 
        </p> 

        <!-- REDES SOCIALES -->
        <div align="center" id="social"> 
          <a href="https://www.facebook.com/UFVmadrid/" class="enlace_social" target="_blank" rel="nofollow">
            <img src="images/social/enl_soc_facebook_20.png" alt="Facebook">
          </a> 
          <a href="https://twitter.com/#!/ufvmadrid" class="enlace_social" target="_blank" rel="nofollow">
            <img src="images/social/enl_soc_twitter_20.png" alt="Twitter">
          </a>
          <a href="https://www.youtube.com/user/ufvmadrid" class="enlace_social" target="_blank" rel="nofollow">
            <img src="images/social/enl_soc_youtube_20.png" alt="Youtube">
          </a>
          <a href="https://www.linkedin.com/school/1205600/" class="enlace_social" target="_blank" rel="nofollow">
            <img src="images/social/enl_soc_linkedin_20.png" alt="Linkedin">
          </a> 
          <a href="https://www.instagram.com/ufvmadrid/" class="enlace_social" target="_blank" rel="nofollow">
            <img src="images/social/enl_soc_instagram_20.png" alt="Instagram">
          </a>
          <br><br>
        </div>
        <!-- FIN REDES SOCIALES -->
        <div align="center">
          <a href="http://www.ufv.es/aviso-legal">Política de Privacidad</a> 
          / Sponsored by the
          <a href="http://legionariesofchrist.org/" rel="nofollow">Legionaries of Christ</a> 
          and 
          <a href="http://regnumchristi.es/" rel="nofollow">Regnum Christi</a> 
          Copyright 2013,
          <a href="http://legionariesofchrist.org/" rel="nofollow">Legion of Christ</a>
          . All rights reserved. 
        </td>
        <td class="foot_dcho">&nbsp;</td> 
      </tr>
    </div>
  </tbody>
</table>
</div> 
<!-- FIN FOOTER -->

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

</body>
</html>


<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
</script>



<style type="text/css">

.body{
  background: url('/images/fondo_body.jpg')fixed;
  padding: 0;
  margin: 0;
  font-family: arial;
}
</style>

