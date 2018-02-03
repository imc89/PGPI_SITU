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
        <a href="about">
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
  <li><a href="contact_us">
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
        <a style="color:#8B8B8B;"  
        onmouseover="this.style.color='white'" 
        onmouseout="this.style.color='#8B8B8B'" href="{{ url('/home') }}">Home</a>
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


<!-- FOOTER CON INFORMACIÓN Y REDES SOCIALES (COPIADO DE LA PÁGINA WEB DE LA UFV) -->
<div id="footer" align="center">
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


</body>
</html>
