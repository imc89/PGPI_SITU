
{{! $alumnos = DB::table('users')
->where('rol','=','1')
->select('users.name','users.email')
->get() }}

<!-- BASE DE DATOS TOMAMOS DATOS DE PERFIL -->
{{! $datos = DB::table('alumno')
->select('nombre','apellidos','dni')
->join('users','users.id','=','user_id')
->get()
}}

{{! $contar = DB::table('alumno') 
->select ('nombre')
->join('users','users.id','=','user_id')
->count()
}}


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
   <a href="#" align="center" style="padding: 0 0 0 0 "> 
     <img width="50px" src="{{ asset('images/icono.jpg') }}" >
   </a>
   <a  data-toggle="modal" data-target="#myModal">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About
  </a>
  <a id="btn" onmouseover="style='cursor: help;'" onmouseout="style='cursor: default'">
    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda 
  </a>
  <a href="#">
    <span class="glyphicon glyphicon-education" aria-hidden="true"></span> VER CALIFICACIONES 
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

      <ul class="dropdown-menu" style="border-radius: 10px; text-align: left;">
        <li>
          <a style="font-weight: bold;" class="glyphicon glyphicon-log-out" href="{{ route('logout') }}"
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
<!-- 
  @guest
  <a  href="{{ route('login') }}">Login</a>
  @else
  <span class="dropdown">
    <a href="#" class=" dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
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
  @endguest

</ul>

</span> -->


<a href="javascript:void(0);" style="font-size:15px; background: #435E80;border-radius: 5px;
" class="icon" onclick="myFunction()">&#9776;</a>

</div> 




<!-- FIN DE NAVEGADOR -->


<!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->
<br><br><br><br><br>
<div align="center">
  <h1>BIENVENIDO PROFESOR</h1>
  <h1>TABLÓN DE {{Auth::user()->name}}</h1> 
  <br>


  
  <table class="table table-striped table-dark">
    <?php $contador=0 ?>
    <?php $contadato=0 ?>
    <thead>
      <tr class="bordertable">
        <th class="bordertable" scope="col">#</th>
        <th class="bordertable" scope="col">Nombre de Perfil_Alumno</th>
        <th class="bordertable" scope="col">Apellido de Perfil_Alumno</th>
        <th class="bordertable" scope="col">DNI de Perfil_Alumno</th>
        <th class="bordertable" scope="col">Ver Curriculum</th>
      </tr>
    </thead>
    <tbody>


      <b> 
        <div style="text-align: center;">
          <span style="text-align: center;padding: 5px 5px 5px 5px; border-radius: 5px;" 
          class="btn-primary" onmouseover="this.style.background='#6478A7';" onmouseout="this.style.background='#2865A8';">
          {{ $contar }}
        </span> 
      </div>
      <h4><b>Alumnos registrados</b></h4> </b>
      <br> <br>



      <div class="body">

        @foreach ($datos as $a)
        @if($contar > $contadato)
        <tr class="bordertable">

          <th class="bordertable" scope="row"><?php $contador++; echo $contador ?></th>
          @if(!empty($a->nombre))
          <td class="bordertable"> {{$a->nombre}} </td>
          @else
          <td class="bordertable"> DATO NO INTRODUCIDO <p> POR EL ALUMNO </td>
          @endif

          @if(!empty($a->apellidos))
          <td class="bordertable"> {{$a->apellidos}} </td>
          @else
          <td class="bordertable"> DATO NO INTRODUCIDO <p> POR EL ALUMNO </td>
          @endif

          @if(!empty($a->dni))
          <td class="bordertable"> {{$a->dni}} </td>
          @else
          <td class="bordertable"> DATO NO INTRODUCIDO <p> POR EL ALUMNO </td>
          @endif

          <?php $contadato++;  ?>
          <td class="bordertable"> <button type="button" class="btn btn-primary">IR A CURRICULUM</button></td>

          @else
          <td class="bordertable"> - </td>
        </tr>
        <?php $contadato++;  ?>
        @endif
        @endforeach 

     









    </tbody>
  </table>



</div>
 </div>
<!-- FINAL CARRUSEL -->
</body>



 <!-- FOOTER CON INFORMACIÓN Y REDES SOCIALES (COPIADO DE LA PÁGINA WEB DE LA UFV) -->
  <div  id="footer" style="position:absolute" align="center">
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

<style>
html{
    background: url('/images/fondo_body.jpg')fixed;

}
.body{
  background: url('/images/fondo_body.jpg')fixed;
  padding: 0;
  margin: 0;
  font-family: arial;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.bordertable td, th {
  border: 1px solid #9D9DB8;
  text-align: left;
  padding: 8px;
  text-align: center;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>