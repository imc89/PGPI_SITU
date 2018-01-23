  
<!DOCTYPE html>
<html lang="en">
<head>

  <title>SITU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
<ul class="nav navbar-nav navbar-right" style="margin-right: 1%;">
   <li><a data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> login</a></li>
</ul>


</div>
</div>
</nav>

<!-- VENTANA EMERGENTE DE LOGIN  -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"> &times;</button>
          <h4><span class="glyphicon glyphicon-user"></span>Login</h4>

      </div>
      <div class="modal-body">
         <form class="form-inline">
           <div class="form-group">
             <label class="sr-only" for="email">Email</label><input type="text" class="form-control input-sm" placeholder="Email" id="email" name="email">
         </div>
         <div class="form-group">  

             <label class="sr-only" for="password">Password</label>
             <input type="password" class="form-control input-sm" placeholder="Password" id="password" name="password"></div>
             <div class="checkbox">
               <label>
                 <input type="checkbox"> Remember me
             </label>
         </div>



         <button type="submit" class="btn btn-info btn-xs">Sign in</button>
         <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button> 




     </form>
 </div>
</div>
</div>
</div>
<!-- FIN DE LA VENTANA EMERGENTE DE LOGIN -->

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
<div>

</body>
</html>
