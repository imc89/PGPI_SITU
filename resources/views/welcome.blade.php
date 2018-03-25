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
  <!-- ICONOS -->
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="images/icon_screen/ios/a_76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/icon_screen/ios/a_120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="images/icon_screen/ios/a_152.png" />
  <link rel="apple-touch-icon-precomposed" sizes="180x180" href="images/icon_screen/ios/a_180.png" />

  <link rel="icon" sizes="192x192" href="images/icon_screen/android/android192.png"  />
  <link rel="icon" sizes="128x18" href="images/icon_screen/android/android128.png"  />

  <!-- CSS LINK CON NOMENCLATURA LARAVEL -->
  <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />


</head>

<!-- composer require barryvdh/laravel-dompdf
  composer require intervention/image -->

  <body onload="deshabilitaRetroceso()">
    <!-- INICIO NAVEGADOR -->
    
    <div id='cssmenu'>
      <ul>
       <li class='active'>
        @if (Auth::guard()->check())

        <a href="Homeplace" align="center" style="padding: 0 0 0 0 "> 
         <img width="50px" src="{{ asset('images/icono.jpg') }}" >
       </a>

       @else
       <a href="welcome" align="center" style="padding: 0 0 0 0 "> 
         <img width="50px" src="{{ asset('images/icono.jpg') }}" >
       </a>
       @endif
     </li>

     <li> 
      @if (Auth::guard()->check())
      <a  href="Homeplace" style="cursor: pointer;" id="card">
        <span class="glyphicon glyphicon-home"  aria-hidden="true"></span> Home
      </a>
      @endif
    </li>

    <li>
      <a  data-toggle="modal" data-target="#myModal" style="cursor: pointer;" id="card">
        <span class="glyphicon glyphicon-info-sign"  aria-hidden="true"></span> About
      </a>
    </li>

    <li>
      <a data-toggle="modal" data-target="#AYUDA" onmouseover="style='cursor: help;'" onmouseout="style='cursor: default'"  id="card">
        <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda 
      </a>
    </li>

    <li>
      <a id="recuperar" data-toggle="modal" data-target="#Recuperacion" style="cursor: pointer;">
        <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span> Recuperación de la cuenta 
      </a>
    </li>



    <li class="login">

      @guest
      <a href="{{ route('login') }}">Login</a>
      @else


      <li class="dropdown show login" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"> 
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu pull-right " aria-labelledby="dropdownMenuLink" >
          <a style="font-weight: bold;"  href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <span class="glyphicon glyphicon-log-out"></span> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </div>

      @endguest
    </li>

  </div>

</li>




</ul>
</div>



<!-- FIN DE NAVEGADOR -->

<div  style="height: 100%;  background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;">
  <div>
    <!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->
    <div class="container ">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators" style="display: none">
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

  <!-- FINAL CARRUSEL -->
  <br><br>


  @if(session('message')=== '""LA CUENTA A RECUPERAR NO EXISTE O ESTÁ EN USO""')
  <div align="center" class='alert alert-danger'>
    {{ session('message') }}
  </div>
  @elseif(session('message'))
  <div align="center" class='alert alert-success'>
    {{ session('message') }}
  </div>
  @endif



  <!-- FOOTER CON INFORMACIÓN Y REDES SOCIALES (COPIADO DE LA PÁGINA WEB DE LA UFV) -->
  <footer class="body_bottom body" id="footer" style="position: relative;">
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
          </div>
          <!-- FIN REDES SOCIALES -->

          <div>
            <a href="http://www.ufv.es/aviso-legal">Política de Privacidad</a> 
            / Sponsored by the
            <a href="http://legionariesofchrist.org/" rel="nofollow">Legionaries of Christ</a> 
            and 
            <a href="http://regnumchristi.es/" rel="nofollow">Regnum Christi</a> 
            Copyright 2013,
            <a href="http://legionariesofchrist.org/" rel="nofollow">Legion of Christ</a>
            . All rights reserved. 
          </div>


        </td>
        <td class="foot_dcho">&nbsp;</td> 
      </tr>

    </tbody>
  </table>
</footer>

</div>
<!-- MODAL INFORMACIÓN -->
<div class="modal fade" id="AYUDA" role="dialog">
  <div class="modal-dialog">

    <!-- CONTENIDO DE ABOUT EN BANNER-->
    <div class="modal-content">
      <div class="modal-header">
        <button id="audio_offX" type="button" class="close" data-dismiss="modal">&times;</button>
        <div>
          <span id="audio_on" style="width:15px; height: 15px; font-size: 20px" align="center" class="glyphicon glyphicon-volume-down sound_on">  </span>
          <span  id="audio_off" style="width:15px; height: 15px; font-size: 20px" align="center" class="glyphicon glyphicon-volume-off sound_off"> </span>
        </div>
        <h4 align="center" class="modal-title">BIENVENIDO A LA PLATAFORMA SITU</h4>
      </div>
      <div class="modal-body" style="background-color: rgba(171, 184, 203, 0.70)">
        Bienvenido a la plataforma SITU, esta plataforma te ayudará a mejorar tu experiencia universitaria. Para usar esta plataforma necesitarás tener datos de registro.
        Pulsa el botón de Login e inserta tus datos para iniciar sesión.
        <br><br>
        <ul>
          <li>
            -En caso de que ya estés logueado puedes pulsar el icono de la universidad al inicio del menú o pulsar el botón &nbsp; <span class="glyphicon glyphicon-home"></span> &nbsp; <b style="font-weight: bold">Home</b>.
          </li>
          <br>
          <li>
            -Si te has dado de baja y quieres recuperar tu antigua cuenta pulsa &nbsp; <span class="glyphicon glyphicon-retweet"></span> &nbsp; <b style="font-weight: bold">Recuperación de cuenta</b> e inserta el correo que tenías para hacer Login.
          </li>
        </ul>
      </div>

      <div class="modal-footer">
        <div align="center">
          <button id="audio_offA" type="button" class="btn btn-primary" data-dismiss="modal">ACEPTAR</button>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- AUDIO MODAL -->

<script type="text/javascript">
  var phrases = [
  ' Bienvenido a la plataforma SITU.Esta plataforma te ayudará a mejorar tu experiencia universitaria.Para usar esta plataforma necesitarás tener datos de registro. Pulsa el botón de Login e inserta tus datos para iniciar sesión.En caso de que ya estés Logueado puedes pulsar el icono de la universidad al inicio del menú, o pulsar el botón Home.Si te has dado de baja y quieres recuperar tu antigua cuenta pulsa Recuperación de cuenta,e inserta el correo que tenías para hacer Login.'
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
  jQuery(document).ready(function ($) {  
    $('#audio_offX').click(function() {
      var i = 0 ;

      responsiveVoice.speak(phrases[1000], 'Spanish Female');
    });
  });
  jQuery(document).ready(function ($) {  
    $('#audio_offA').click(function() {
      var i = 0 ;

      responsiveVoice.speak(phrases[1000], 'Spanish Female');
    });
  });
</script>
<!-- FIN AUDIO MODAL -->




<!--  BANNER MODAL RECUPERACION -->
<div class="modal fade" id="Recuperacion" role="dialog">
  <div class="modal-dialog">

    <!-- CONTENIDO DE ABOUT EN BANNER-->
    <div class="modal-content" style="background: #2865A8;color: black">
      <div class="modal-header" style="background: #358CED">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">RECUPERACIÓN DE CUENTAS</h4>
      </div>
      <div class="modal-body" style="background-color: rgba(171, 184, 203, 0.70);" align="center">
        <p>INSERTE EL CORREO ASOCIADO A SU CUENTA PARA RECUPERARLA</p>
      </div>

      <div style="background: #2865A8">
        <form action="Recuperacioncuenta" id="recuperarcuenta">
          <div align="center">
            <form action="Recuperacioncuenta.php" method="post" id="recuperarcuenta" >
              <div class="block"><br>
                <label style="color: white; font-weight: bold;float: left;">email:</label> 
                <input  class="form-control" type="email" name="data" style="width:500px; margin-bottom:20px; margin-top:20px" autofocus required>
              </div>

            </form>
          </div>

        </form>
      </div>

    </form>
  </div>
  <div class="modal-footer" style="background: #358CED;border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px">

  <div class="btn-group pull-left">
   <button type="submit" class="btn btn-primary" form="recuperarcuenta">RECUPERAR CUENTA</button>
 </div>

 <div class="btn-group pull-right">
  <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
</div>

</div>
</div>

</div>
</div>
<!-- FIN BANNER RECUPERACION -->




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



<style type="text/css">


.sound_on:hover{
  color:green;
}
.sound_off:hover{
  color:red;
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
#recuperar:hover  span {
  animation: rotation 1s infinite linear; 

} 

@keyframes rotation {
  100%{
    transform:rotate(360deg);
    -webkit-transform: rotate(360deg);
    transition-duration: 1.5s;
    -webkit-transition-duration:1s;

  }
}
label {
  display: inline-block;
  width: 100px;
  text-align: right;
  }​
</style>



