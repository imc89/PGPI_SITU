{{! $datos = DB::table('alumno')
->select('alumno.id')
->where('users.id','=', Auth::user()->id)
->join('users','users.id','=','user_id')
->get()
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- AYUDA EN AUDIO -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <script src='https://code.responsivevoice.org/responsivevoice.js'></script>

  <!-- CSS LINK CON NOMENCLATURA LARAVEL -->
  <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />


</head>


<body onload="deshabilitaRetroceso()" id="gradient" style="height: 100%;background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;">
  <!-- INICIO NAVEGADOR -->

  <div id='cssmenu'>
    <ul>
     <li class='active'>   
       <a href="alumno" align="center" style="padding: 0 0 0 0 "> 
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
      <a href="mail_invitados">
        <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> INVITAR 
      </a>
    </li>

    <li>
     <a href="keywords">
      <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> KEYWORDS 
    </a>
  </li>

  <li>
    <a href="crear_hechos">
      <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> HECHOS 
    </a>
  </li>

  <li>
    <a href="lineaTiempo">
      <span class="glyphicon glyphicon-time" aria-hidden="true"></span> LÍNEA TEMPORAL 
    </a>
  </li>

  <!-- INICIO CV -->

  <li>
   @foreach($datos as $a)
   {{! $datopdf = $a->id}}


   <a href="javascript:void()" onclick="document.getElementById('cvform').submit();"">
     <form action="viewPdf_alumno" class="cvrotate" id="cvform">
      <form action="PdfController.php" method="post">
        <input type="hidden" name="data" value="{{ $datopdf }}">

        <span class="glyphicon glyphicon-education" aria-hidden="true" style="color: white"></span>      
        CV


      </form>

    </form>

    @endforeach
  </a>
</li>
<style type="text/css">
.cvrotate:hover span{
  transform: rotateY(360deg);
  -webkit-transform: rotateY(360deg);
  transition-duration: 1.5s;
  -webkit-transition-duration:1s;
}
.cvrotate:hover{
  border-radius: 5px;
  color: #FFFFFF;
  background-color: #435E80;
  height: 100%;
  cursor:pointer;
}
</style>
<!-- FIN CV -->


<li class="login">

  @guest
  <li><a href="{{ route('login') }}">Login</a></li>
  @else


  <li class="dropdown show login" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">


     <img src="{{ asset('images/avatar/'.Auth::user()->avatar) }}" style="width:32px; height:32px; position: relative;  top:10px; border-radius:50%;" >    
     {{mb_strtoupper(Auth::user()->name)}} <span class="caret"></span>
   </a>

   <div class="dropdown-menu pull-right " aria-labelledby="dropdownMenuLink" >

    <a style="font-weight: bold;" href="perfilAlumno" class="link">
      <span  class="glyphicon glyphicon-user"></span>Perfil
    </a>

    <a style="font-weight: bold;" href="configPerfil" class=" link">
      <span  class="glyphicon glyphicon-cog"></span>Configuración
    </a>

    <a style="font-weight: bold;" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    <span class="glyphicon glyphicon-log-out"></span>Logout
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
<script type="text/javascript">

  $('li.dropdown').find('a.link').on('click', function() {
    window.location = $(this).attr('href');
  });
</script>



<!-- FIN DE NAVEGADOR -->
<br>
<br>
<br>
<div class="container" id="gradient" >
 <h1 class="mb-2 text-center">Crear Nueva Keyword</h1>

 @if(session('message'))
 <div class='alert alert-success'>
  {{ session('message') }}
</div>
@endif
<div class="col-12 col-md-6">
  <form action="send_keyword" class="form-horizontal" method="POST" ">
   {{ csrf_field() }}
   <div class="form-group"> <!-- NOMBRE -->
     <label for="Name">Nombre: </label>
     <input style="font-weight: bold" type="text" class="form-control" id="name" placeholder="Nombre de la keyword" name="name" required>
   </div>

   <div class="form-group">
    <button style="font-weight: bold" type="submit" class="btn btn-primary" value="send_keyword">ENVIAR</button>
    <a style="font-weight: bold" href="keywords" class="btn btn-primary">
      <span class="fa fa-refresh fa-spin"></span> REFRESCAR KEYWORDS
    </a>  
  </form>
</div>
</div> <!-- /container -->


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
}  

html{
  height:100%;
  background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;
}
@media all and (max-width: 780px){
  #hechos{
    width:auto !important;

  }

  #gradient{
    height: 100%; 
    background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;"
  }

  html{background: transparent;}
}
</style>


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
        <h4 align="center" class="modal-title">CREAR ETIQUETAS</h4>
      </div>
      <div class="modal-body" style="background-color: rgba(171, 184, 203, 0.70)">
        Has accedido a la sección de creación de Keywords.
       <br><br>
       <ul>
        <li>
          <br>
          -Para crear una nueva Keyword basta con insertar el nombre de la Keyword y pulsar el botón enviar.
          <br>
        </li>

        <li>
          <br>
         -Para refrescar las Keyword y ver todas de nuevo puedes pulsar el botón &nbsp; <span class="glyphicon glyphicon-tags"></span>  &nbsp; <b style="font-weight: bold">KEYWORDS</b> del menú o pulsar el botón de &nbsp; <span class="fa fa-refresh fa-spin"></span> &nbsp; <b style="font-weight: bold">Refrescar Keywords</b>.  
          <br>
        </li>
      </ul>

      <br><br>

      <div align="center">
        Podrás volver a la pantalla de inicio pulsando el icono de la universidad.
      </div>
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
  'Has accedido a la sección de creación de Keywords.Para crear una nueva Keyword basta con insertar el nombre de la Keyword y pulsar el botón enviar.Para refrescar las Keyword y ver todas de nuevo puedes pulsar el botón Keywords del menú,o pulsar el botón de Refrescar Keywords.Podrás volver a la pantalla de inicio pulsando el icono de la universidad.'
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
<style type="text/css">

.sound_on:hover{
  color:green;
}
.sound_off:hover{
  color:red;
}
} 
</style>