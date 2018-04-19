{{! $datos = DB::table('alumno')
->select('alumno.id')
->where('users.id','=', Auth::user()->id)
->join('users','users.id','=','user_id')
->get()
}}

{{!$logins = DB::table('users')->select('logins')->where('name', Auth::user()->name)->first()->logins }}
{{! $logins++ }}
{{! DB::table('users')
->where('name', Auth::user()->name)
->update(['logins' => $logins ])}}



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
a:hover span {
  transform: rotateY(360deg);
  -webkit-transform: rotateY(360deg);
  transition-duration: 1.5s;
  -webkit-transition-duration:1s;
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
<br>
<body  id="gradient" style="height: 100%;background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;">
  <div class="container" >
   <h1 class="mb-2 text-center">INVITA A AMIGOS A VER TUS HECHOS</h1>


   @if(session('message')== "El usuario ya ha sido invitado al sistema")
   <div class='alert alert-danger'>
    {{ session('message') }}
  </div>
  @elseif(session('message'))
  <div class='alert alert-success'>
    {{ session('message') }}
  </div>
  @endif
  <div class="col-12 col-md-6">
    <form action="invitar" class="form-horizontal" method="POST">
     {{ csrf_field() }} 
     <div class="form-group"> <!-- NOMBRE -->
       <label for="Name">Nombre del invitado: </label>
       <input style="font-weight: bold" type="text" class="form-control" id="name" placeholder="Tu nombre" name="name" required>
     </div>

     <div class="form-group"><!-- EMAIL -->
       <label for="email">Email del invitado: </label>
       <input style="font-weight: bold" type="email" class="form-control" id="email" placeholder="john@example.com" name="email" required>
     </div>

     <div class="col-xs-8" style="background: #3386E2;color:white;border-radius: 10px; width: 160px; height: 135px; margin-right: 50%;">
      <label class="col-xs-7">Autorización: </label>
      <br>

      <div class="radio">

        <img src="{{ asset('images/icons/lock.png')}}");" id="lock1">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="autorizacion" type="radio"  value="1" required>
        <label style="font-weight: bold">Nivel 1</label>

      </div>

      <div class="radio">

        <img src="{{ asset('images/icons/lock.png')}}");" id="lock2">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="autorizacion" type="radio" value="2">
        <label style="font-weight: bold">Nivel 2</label>

      </div>

      <div class="radio">

        <img src="{{ asset('images/icons/lock.png')}}");" id="lock3">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="autorizacion" type="radio"  value="3">
        <label style="font-weight: bold">Nivel 3</label>

      </div>
    </div>


    <div class="form-group">
      <button type="submit" class="btn btn-primary" value="Send" style="width:100%; margin-top: 9px;font-weight: bold">ENVIAR</button>
    </div>

  </form>
</div>
</div> <!-- /container -->


<div style="font-weight: bold" class="alert alert-warning" align="center">
  <strong>Warning!</strong> SI NO LLEGA EL CORREO REVISA LA CARPETA SPAM.
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


<!-- LOCK DE AUTORIZACIÓN -->
<script>
  $(document).ready(function() {
    $('input[name="autorizacion"]:radio').click(function(){
      switch($(this).val()) {
        case "1":
        $("#lock1").attr("src","{{ asset('images/icons/unlock.png')}}");
        $("#lock2").attr("src","{{ asset('images/icons/lock.png') }}");
        $("#lock3").attr("src","{{ asset('images/icons/lock.png') }}");
        break;
        case "2":
        $("#lock1").attr("src","{{ asset('images/icons/lock.png') }}");
        $("#lock2").attr("src","{{ asset('images/icons/unlock.png')}}");
        $("#lock3").attr("src","{{ asset('images/icons/lock.png') }}");
        break;
        case "3":
        $("#lock1").attr("src","{{ asset('images/icons/lock.png') }}");
        $("#lock2").attr("src","{{ asset('images/icons/lock.png') }}");
        $("#lock3").attr("src","{{ asset('images/icons/unlock.png')}}");
        break;
      }
    });
  });
</script>

<style type="text/css">
@media all and (max-width: 780px){
  #hecho_div{
    width:100%;
    height:auto;

  }
  #gradient{
    height: auto !important;
  }
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
        <h4 align="center" class="modal-title">INVITADOS</h4>
      </div>
      <div class="modal-body" style="background-color: rgba(171, 184, 203, 0.70)">
       Has accedido a INVITADOS en donde podrás enviar invitaciones a gente que conozcas a través de su email.
       <br><br>
       <ul>
        <li>
          <br>
          -Para enviar una invitación habrá que insertar el nombre del invitado junto con su correo y grado de autorización.
          <br>
        </li>

        <li>
          <br>
          -Nivel 1 - el invitado solo podrá ver hechos de grado 1.  
          <br>
        </li>

        <li>
          <br>
          -Nivel 2 - el invitado solo podrá ver hechos de grado 1 y 2.  
          <br>
        </li>

        <li>
          <br>
          -Nivel 3 - el invitado podrá ver todos los hechos.  
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
  'Has accedido a INVITADOS,en donde podrás enviar invitaciones a gente que conozcas a través de su email.Para enviar una invitación habrá que insertar el nombre del invitado,junto con su correo y grado de autorización.Nivel 1,el invitado solo podrá ver hechos de grado 1.Nivel 2,el invitado solo podrá ver hechos de grado 1 y 2.Nivel 3,el invitado podrá ver todos los hechos.Podrás volver a la pantalla de inicio pulsando el icono de la universidad.'
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
