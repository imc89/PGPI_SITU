{{! $etiquetas = DB::table('tags')->get() }}
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
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />


</head>



<body style="background: transparent;">
  <!-- INICIO NAVEGADOR -->

  <div id='cssmenu' >
    <ul>
     <li class='active'>   
       <a href="admin" align="center" style="padding: 0 0 0 0 "> 
         <img width="50px" src="{{ asset('images/icono.jpg') }}" >
       </a>
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
     <a href="mailpassword">
      <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Dar Alta Usuario
    </a>
  </li>

  <li>
    <a href="log_admin_login">
      <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Log Logins
    </a>
  </li>

  <li>
   <a href="etiquetas">
    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Etiquetas
  </a>
</li>


<li class="login">

  @guest
  <li><a href="{{ route('login') }}">Login</a></li>
  @else


  <li class="dropdown show login" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"> 
      {{ Auth::user()->name }} <span class="caret"></span>
    </a>
    <div class="dropdown-menu pull-right " aria-labelledby="dropdownMenuLink" >
      <a style="font-weight: bold;" href="{{ route('logout') }}"
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

<br>
<br>
<br>
<br>
<br>
<div class="body" style="width: 100%; min-height: 100%; height: auto !important; top:0; left: 0;background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;">
  <div class="container">
    <h1 class="mb-2 text-center">ETIQUETAS</h1>

    <tr><a class="btn btn-primary btn-sm" href="crear_etiquetas">NUEVA ETIQUETA</a></tr>
    <br>
    <br>
    <table class="table table-striped table-dark">
      <?php $contador=0 ?>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre Etiqueta</th>
        </tr>
      </thead>
      <tbody>
       @foreach($etiquetas as $u)
       <tr>
        <th scope="row"><?php $contador++; echo $contador ?></th>
        <td> {{ $u->name }} </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

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
        <h4 align="center" class="modal-title">ETIQUETAS</h4>
      </div>
      <div class="modal-body" style="background-color: rgba(171, 184, 203, 0.70)">
        Has accedido a la sección de gestión de etiquetas.
        <br><br>
        <ul>
          <li>
            <br>
            -En esta sección podrás visualizar las etiquetas existentes en la plataforma. 
            <br>
          </li>

          <li>
            <br>
            -En caso de querer añadir nuevas etiquetas se deberá pulsar el botón "NUEVA ETIQUETA".
            <br>
          </li>

          <br><br>
          <div align="center">
            Podrás salir de esta sección pulsando el icono de la universidad.
          </div>

          <br><br>

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
    'Has accedido a la sección de gestión de etiquetas.En esta sección podrás visualizar las etiquetas existentes en la plataforma.En caso de querer añadir nuevas etiquetas se deberá pulsar el botón "NUEVA ETIQUETA". Podrás salir de esta sección pulsando el icono de la universidad.'
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
  .sound_on:hover{
    color:green;
  }
  .sound_off:hover{
    color:red;
  }
</style>
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
a:hover span {
  transform: rotateY(360deg);
  -webkit-transform: rotateY(360deg);
  transition-duration: 1.5s;
  -webkit-transition-duration:1s;
}  

.body{
  background: url('/images/fondo_body.jpg')fixed;
  padding: 0;
  margin: 0;
  font-family: arial;
}
</style>