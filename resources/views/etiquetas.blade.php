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


</head>



<body>
  <!-- INICIO NAVEGADOR -->
  <div class="topnav navbar navbar-inverse  navbar-fixed-top" id="myTopnav">
   <a href="admin" align="center" style="padding: 0 0 0 0 ">
     <img width="50px" src="{{ asset('images/icono.jpg') }}" >
   </a>
   <a  data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About
  </a>
  <a id="btn" onmouseover="style='cursor: help;'" onmouseout="style='cursor: default'">
    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda 
  </a>
  <a href="mailpassword">
    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Dar Alta Usuario
  </a>
  <a href="log_admin_login">
    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Log Logins
  </a>
  <a href="etiquetas">
    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Etiquetas
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
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="body">
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
      <div class="modal-background"></div>
      <div class="modal-container">
        <div align="center" class="modal-header">ETIQUETAS
          <!-- CONTROL AUDIO MODAL -->
          <div class="sound_on">
            <span id="audio_on" style="width:15px; height: 15px; font-size: 20px" align="center" class="glyphicon glyphicon-volume-down modal-sound">    
            </span>
          </div>
          <div class="sound_off">
            <span id="audio_off" style="width:15px; height: 15px; font-size: 20px" align="center" class="glyphicon glyphicon-volume-off modal-sound"> 
            </span>
          </div>

          <span id="audio_offX"> 
            <span class="glyphicon glyphicon-remove modal-close"></span>
          </span>

          <!-- <i class="modal-close">x</i> --></div>
          <div class="modal-info">
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
            <div class="button-container" align="center" id="audio_offA" >
              <button id="cerrar" class="btn btn-primary" >ACEPTAR</button>
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
        .modal-background {
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          background: rgba(0, 0, 0, 0.7);
          width: 100%;
          height: 100%;
        }

        .modal-container {
          display: none;
          position: relative;
          width: 500px;
          margin: -20% auto;
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


        #btn:hover  span {
          transform: rotateY(360deg);
          -webkit-transform: rotateY(360deg);
          transition-duration: 1.5s;
          -webkit-transition-duration:1s;
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