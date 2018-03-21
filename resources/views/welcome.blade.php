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

  <!-- AYUDA EN AUDIO -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <script src='https://code.responsivevoice.org/responsivevoice.js'></script>

  <!-- CSS LINK CON NOMENCLATURA LARAVEL -->
  <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />


</head>


<body onload="deshabilitaRetroceso()">
  <!-- INICIO NAVEGADOR -->
  <div class="topnav navbar navbar-inverse  navbar-fixed-top" id="myTopnav">
   <a href="/" align="center" style="padding: 0 0 0 0 "> 
     <img width="50px" src="{{ asset('images/icono.jpg') }}" >
   </a>
   <a  data-toggle="modal" data-target="#myModal" style="cursor: pointer;" id="card">
    <span class="glyphicon glyphicon-info-sign"  aria-hidden="true"></span> About
  </a>
  <a id="btn" onmouseover="style='cursor: help;'" onmouseout="style='cursor: default'" >
    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda 
  </a>
  <!-- BOTÓN DE LOGIN -->

  <ul  class="nav navbar-nav navbar-right" style="margin-right: 1%">
    <!-- Authentication Links -->
    @guest
    <li><a href="{{ route('login') }}">Login</a></li>
    @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"> 
        {{ Auth::user()->name }} <span class="caret"></span>
      </a>

      <ul class="dropdown-menu">
        <li>
          <a href="{{ route('logout') }}"
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


<!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->
<div class="container">
  <h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div style="margin-top: 7%" class="carousel-inner">

      <div align="center" class="item active">
        <img  src="https://pbs.twimg.com/profile_images/438696546591186944/Vms1aFmW_400x400.png" alt="UFVmadrid" ">
        <div class="carousel-caption">
          <h3 style="background: #A7B4C6">UFVmadrid</h3>
          <p style="background: #A7B4C6">Thank you, UFVmadrid</p>
        </div>
      </div>

      <div align="center"class="item">
       <img  src="https://pbs.twimg.com/profile_images/438696546591186944/Vms1aFmW_400x400.png" alt="UFVmadrid" ">
       <div class="carousel-caption">
        <h3 style="background: #A7B4C6">UFVmadrid</h3>
        <p style="background: #A7B4C6">Thank you, UFVmadrid</p>
      </div>
    </div>
    
    <div align="center"class="item">
     <img  src="https://pbs.twimg.com/profile_images/438696546591186944/Vms1aFmW_400x400.png" alt="UFVmadrid" ">
     <div class="carousel-caption">
      <h3 style="background: #A7B4C6">UFVmadrid</h3>
      <p style="background: #A7B4C6">Thank you, UFVmadrid</p>
    </div>
  </div>

</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</div>

<!-- FINAL CARRUSEL -->





<!-- FOOTER CON INFORMACIÓN Y REDES SOCIALES (COPIADO DE LA PÁGINA WEB DE LA UFV) -->
<div class="body_bottom" id="footer" style="position: absolute;" align="center">
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
        <div id="social"> 
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

  </tbody>
</table>
</div>

<!-- MODAL INFORMACIÓN -->
<div class="modal-background"></div>
<div class="modal-container">
  <div align="center" class="modal-header">BIENVENIDO A LA PLATAFORMA SITU 
    <!-- CONTROL AUDIO MODAL -->
    <div class="sound_on">
      <span id="audio_on" style="width:15px; height: 15px; font-size: 20px" align="center" class="glyphicon glyphicon-volume-down modal-sound">    
      </span>
    </div>
    <div class="sound_off">
      <span id="audio_off" style="width:15px; height: 15px; font-size: 20px" align="center" class="glyphicon glyphicon-volume-off modal-sound"> 
      </span>
    </div>

    <span class="glyphicon glyphicon-remove modal-close"></span>
    
    <!-- <i class="modal-close">x</i> --></div>
    <div class="modal-info">
      Bienvenido a la plataforma SITU, esta plataforma te ayudará a mejorar tu experiencia universitaria. Para usar esta plataforma necesitarás tener datos de registro.
      Pulsa el botón de Login e inserta tus datos para iniciar sesión.
      <br><br>
      <div align="center">INICIE SUS DATOS DE PERFIL</div>
    </div>
    <div class="button-container" align="center">
      <button id="cerrar" class="btn btn-primary">ACEPTAR</button>
    </div>
  </div>
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


<!-- EVITAR IR HACIA ATRAS A NO SER QUE SE USE LOGOUT -->
<script type="text/javascript">
  function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
  }
</script>



<!-- MODAL HASTA EL FINAL DEL DOCUMENTO BLADE -->
<script type="text/javascript">
  $(".modal-background, .modal-close").on("click", function(){
    $(".modal-container, .modal-background").hide();
  });
  $("#cerrar").on("click", function(){
    $(".modal-container, .modal-background").hide();
  });
</script>

<script type="text/javascript">
  $("#btn").click(function() {
   $(".modal-container, .modal-background").show();
 });
</script>

<!-- AUDIO MODAL -->

<script type="text/javascript">
  var phrases = [
  ' Bienvenido a la plataforma SITU, esta plataforma te ayudará a mejorar tu experiencia universitaria. Para usar esta plataforma necesitarás tener datos de registro. Pulsa el botón de Login e inserta tus datos para iniciar sesión.'
  ];

  jQuery(document).ready(function ($) {  
    $('#audio_on').click(function() {
      var i = Math.round(phrases.length * Math.random()) - 1;

      responsiveVoice.speak(phrases[i], 'Spanish Female');
    });
  });

  jQuery(document).ready(function ($) {  
    $('#audio_off').click(function() {
      var i = 0 ;

      responsiveVoice.speak(phrases[1000], 'Spanish Female');
    });
  });
</script>

<style type="text/css">
.modal-background {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
  z-index: 0;
}

.modal-container {
  display: none;
  position: relative;
  z-index: 1;
  width: 500px;
  margin: -300px auto;
  background: #fff;
  border-radius: 10px;
  font-family: Arial, Sans-serif;
  font-size: 12px;
}

.modal-container .modal-close {
  float: right;
  cursor: pointer;
}

.modal-container .modal-sound {
  float: left;
  cursor: pointer;
  padding-left: 15px;
  padding-right: 15px;
}
.sound_on:hover{
  background-color: #2865A8;
  color:green;
}
.sound_off:hover{
  color:red;
}
.modal-container .modal-header {
  border-radius: 10px 10px 0 0;
  background: #333;
  padding: 15px 15px;
  background: url('/images/fondo_body.jpg')fixed;
}

.modal-container .modal-info {
  padding: 25px 15px;
  border-bottom: 1px solid #ccc;
}

.modal-container .button-container {
  border-radius: 0 0 10px 10px;
  background: url('/images/fondo_body.jpg')fixed;
  padding: 15px;
  border-top: 1px solid #fff;
}

.modal-container .button-container button {
  display: block;
  margin: auto;
  padding: 5px 15px;
  cursor: pointer;
  text-transform: uppercase;
  font-size: 12px;
}

#card:hover  span {
    transform: rotateY(360deg);
    -webkit-transform: rotateY(360deg);
    transition-duration: 1.5s;
    -webkit-transition-duration:1s;
} 
#btn:hover  span {
    transform: rotateY(360deg);
    -webkit-transform: rotateY(360deg);
    transition-duration: 1.5s;
    -webkit-transition-duration:1s;
} 
</style>


