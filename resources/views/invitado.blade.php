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
     <a href="#" align="center" style="padding: 0 0 0 0 "> 
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

    {{! $dato = DB::table('invitado')
    ->select('invitado.alumno_id')
    ->where('email','=', Auth::user()->email)
    ->get() }}

    @foreach($dato as $d)
    {{! $datos = DB::table('alumno')
    ->select('alumno.id')
    ->where('alumno.id','=', $d->alumno_id)
    ->get() }}
    @endforeach

    @foreach($datos as $a)

    {{! $datopdf = $a->id}}




    <a href="javascript:void()" onclick="document.getElementById('cvform').submit();"">
     <form action="viewPdf_alumno_invitado" class="cvrotate" id="cvform">
      <form action="PdfController.php" method="post">
        <input type="hidden" name="data" value="{{ $datopdf }}">
        <span class="glyphicon glyphicon-education" aria-hidden="true" style="color: white"></span>      
        CV
      </form>
    </form>
    @endforeach
  </a>
</li>
<li>
 <spam style="font-weight: bold;">
   <?php echo mb_strtoupper('soy un invitado con permiso de nivel '. $autorizacion);?>
 </spam>
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
<!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->
<div class="body"  style="width: 100%; min-height: 100%; height: auto !important; top:0; left: 0;background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;"">
  <br>
  <div align="center">
    <div class="alert alert-warning" style="font-weight: bold"> 
      <strong>Warning!</strong> LA INVITACIÓN CADUCARÁ EN 7 DÍAS DESDE QUE SE HIZO EL ENVIO.
    </div>

    <div class="alert alert-warning" style="font-weight: bold"> 
     <strong>ATENCIÓN</strong> La información a la que estás accediendo está protegida y no se permitirá su divulgación o uso incorrecto, haciendose usted responsable del acceso a dicha información.
     <br><br>
     <button type="button" class="btn btn-info close" data-dismiss="alert" 
     style="background: #808DA4;border-radius: 5px; padding: 5px 5px 5px 5px"> ACEPTAR </button>
   </div>
   <style>
   .close {
     float: none !important;
     font-size: 21px;
     font-weight: bold;
     line-height: 1;
     color: black;
     text-shadow: 0 1px 0 #fff;
     filter: alpha(opacity=0);
     opacity: 1;
   }
   .close:hover,
   .close:focus {
    background: #BBCDDD !important;
    border-radius: 5px !important; 
    color: #000;
    text-decoration: none;
    cursor: pointer;
    filter: alpha(opacity=50);
    opacity: 1;
  }
</style>

<h1 style="font-weight: bold">BIENVENIDO INVITADO</h1>
<h1 style="font-weight: bold">{{Auth::user()->name}}</h1>
<br>
<h1 style="font-weight: bold">
  @if($autorizacion == 1)
  ESTÁS TENIENDO ACCESO A LOS HECHOS DE
  @foreach($propietario as $p)
  {{$p->name}}
  @endforeach
  DE NIVEL 1
  @elseif($autorizacion == 2)
  ESTÁS TENIENDO ACCESO A LOS HECHOS DE
  @foreach($propietario as $p)
  {{$p->name}}
  @endforeach
  DE NIVEL 1 y 2
  @else
  ESTÁS TENIENDO ACCESO A TODO EL CONTENIDO DE
  @foreach($propietario as $p)
  {{$p->name}}
  @endforeach

  @endif
</h1> 
<br>
</div>
<!--INICIO FILTROS  -->
<div style="text-align: center; word-wrap: break-word;">
  <!-- PRIMER FILTRO -->
  <div style="padding: 10px;margin: 10px;display: inline-block;">
    <form action="filtrar_hinvitado_etiqueta" class="form-horizontal fv-form fv-form-bootstrap">
      <br>
      <div align="center" >
        <div  style="width: 300px">
          <div class="form-group" required><!-- ETIQUETAS -->
            <label style="font-weight: bold" >Filtrar por etiqueta: </label>
            <div>
              <form action="FilterhechosController.php" method="post">
                {{! $etiquetas = DB::table('tags')->get() }}
                <select style="font-weight: bold" id="hecho" class="form-control" name="etiqueta" required>
                  <option> Todos los hechos </option>
                  @foreach($etiquetas as $tag)
                  <option> {{ $tag->name }} </option>
                  @endforeach
                </select>
                <input type="submit" class="btn btn-primary"  value="FILTRAR" style="width: 330px; align-content: center; font-weight: bold">        
              </form>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- SEGUNDO FILTRO -->
  <div style="padding: 10px;margin: 10px;display: inline-block;">
    <form action="filtrar_hinvitado_keyword" class="form-horizontal fv-form fv-form-bootstrap">
      <br>
      <div align="center" >
        <div  style="width: 300px">
          <div class="form-group" required><!-- ETIQUETAS -->
            <label style="font-weight: bold">Filtrar por keywords: </label>
            <div>
              <form action="FilterhechosController.php" method="post">
                {{! $alumno_id = DB::table('invitado')
                ->where('invitado.email','=', Auth::user()->email)
                ->join('users','users.id','=','user_id')
                ->select('invitado.alumno_id') 
                ->get()}}
                @foreach($alumno_id as $aluid)
                {{! $aluid->alumno_id }}
                {{! $keywords = DB::table('keywords')
                ->where('alumno_id','=', $aluid->alumno_id)
                ->select('name')
                ->get() }}
                @endforeach

                <select style="font-weight: bold" id="hecho" class="form-control" name="keyword" required>
                  <option>Cualquier keyword</option>
                  @foreach($keywords as $tag)
                  <option> {{ $tag->name }} </option>
                  @endforeach
                </select>
                <input type="submit" class="btn btn-primary"  value="FILTRAR" style="width: 330px; align-content: center; font-weight: bold">        
              </form>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- TERCER FILTRO -->
  <div style="padding: 10px;margin: 10px;display: inline-block;">
    <form action="filtrar_hinvitado_titulo" class="form-horizontal fv-form fv-form-bootstrap">
      <br>
      <div align="center" >
        <div  style="width: 300px">
          <div class="form-group" required><!-- ETIQUETAS -->
            <label style="font-weight: bold" >Filtrar por título: </label>
            <div>
              <form action="FilterhechosController.php" method="post">
               <input style="font-weight: bold" type="text" class="form-control" name="titulo" required>
               <input type="submit" class="btn btn-primary"  value="FILTRAR" style="width: 330px; align-content: center; font-weight: bold">        
             </form>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>
 <!--FIN FILTROS  -->
 <!-- MOSTRAR HECHOS -->
 <?php $contador=0 ?>
 @foreach($hechos as $u)
 <div align="center">
  <div id="hecho_div">
    <div style="float: left;">
      <u>HECHO Nº <?php $contador++; echo $contador ?></u>
    </div>
    <div style="float: right;">
      <b>Fecha:</b>  {{ $u->fecha }}&nbsp;&nbsp;&nbsp;
    </div>
    @if($u->etiqueta !== NULL)
    <br><b>Tipo:</b> {{ $u->etiqueta }} <br>
    @endif
    @if($u->titulo !== NULL)
    <b>Título:</b>  {{ $u->titulo }} <br>
    @endif
    @if($u->curso !== NULL)
    <b>Curso:</b>  {{ $u->curso }}º <br>
    @endif
    @if($u->contenido !== NULL)
    <b>Contenido:</b>  {{ $u->contenido }} <br>
    @endif
    @if($u->video !== NULL)
    <b>URL Video:</b> <b><a href="{{ URL::asset($u->video) }}"  target="_blank"> {{ $u->video }} </a></b> <br>
    @endif
    @if($u->encuentro !== NULL)
    <b>Encuentro:</b> {{ $u->encuentro }}  <br>
    @endif
    @if($u->foto !== NULL)
    <b>FOTO:</b> <img src="{{ URL::asset('/images/fotos/'.$u->foto) }}" style="max-width: 250px;min-width:250px"/> <br>
    @endif
    @if($u->anexo !== NULL)
    <b>Documento Anexo:</b> <b><a href="{{ URL::asset('/images/anexos/'.$u->anexo) }}"  target="_blank"> {{ $u->anexo }} </a></b> <br>
    @endif
    @if($u->proposito !== NULL)
    <b>Propósito:</b>  {{ $u->proposito }} <br>
    @endif
    @if($u->keywords !== NULL)
    {{! $array = explode( ',', $u->keywords )}}
    <br><b>Keywords:</b> 
    @foreach ($array as $item) 
    <b><button class="btn btn-primary" disabled style="border-radius: 3px ;cursor: default ; padding: 2px 2px 2px 2px">{{$item}}</button></b>
    @endforeach 
    <br>
    @endif
  </div>
  <br>
</div>
@endforeach
<!-- FOOTER CON INFORMACIÓN Y REDES SOCIALES (COPIADO DE LA PÁGINA WEB DE LA UFV) -->
<footer class="body_bottom body" id="footer" style="position: relative;bottom: 0">
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
</div>
<!--CIERRE DE LOS FILTROS  -->
</div>
<!-- FINAL CARRUSEL -->
@if (Auth::user()->logins ==1)
<div class="modal-background">
  <div class="modal-container">
    <div align="center" class="modal-header">BIENVENIDO A LA PLATAFORMA SITU 
      <span class="glyphicon glyphicon-remove modal-close"></span>
      <!-- <i class="modal-close">x</i> --></div>
      <div class="modal-info">
        Este mensaje 
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
        <br><br>
        <div align="center">INICIE SUS DATOS DE PERFIL</div>
      </div>
      <div class="button-container" align="center">
        <a href="configPerfil" class="btn btn-primary">ACEPTAR</a>
      </div>
    </div>
  </div>
  @endif
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
          <h4 align="center" class="modal-title">INVITADO</h4>
        </div>
        <div class="modal-body" style="background-color: rgba(171, 184, 203, 0.70)">
          Has accedido a la sección de invitado.
          En esta sección se muestran los hechos de la persona que te ha invitado.
          <ul>
            <li>
              <br>
              -En el caso de que ya existan hechos creados se mostrarán pudiendo filtrarlos por etiqueta, eligiendo una etiqueta en el desplegable de la izquierda y pulsando FILTRAR, por keywords, eligiendo una keyword en el desplegable central y pulsando FILTRAR, o en caso de que recuerdes el título del hecho buscando a partir de texto. 
              <br>
            </li>
            <li>
              <br>
              -Para ver el currículum de la persona que te invitó &nbsp; <span class="glyphicon glyphicon-education"></span> &nbsp; <b style="font-weight: bold">CV</b>.  
              <br>
            </li>
          </ul>
          <br><br>
          <div align="center">
           Podrás salir del perfil de invitado pulsando en el menú sobre tu nombre y a continuación sobre Logout.
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
  ' Has accedido a la sección de invitado.En esta sección se muestran los hechos de la persona que te ha invitado.En el caso de que ya existan hechos creados se mostrarán pudiendo filtrarlos por etiqueta, eligiendo una etiqueta en el desplegable de la izquierda y pulsando FILTRAR, por keywords, eligiendo una keyword en el desplegable central y pulsando FILTRAR, o en caso de que recuerdes el título del hecho buscando a partir de texto.Para ver el currículum de la persona que te invitó pulsa el botón CV.Podrás salir del perfil de invitado pulsando en el menú sobre tu nombre y a continuación sobre Logout.'
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
<style type="text/css">
#borrar{
 color: black; 
}
#borrar:hover{
 color: red; 
}
#hecho_div{
  background: #262626; border-radius: 10px; width: 500px;color: white;text-align: left; padding: 10px 10px 10px 10px;
}
#hecho_div:hover{
  background: #93A3B2; border-radius: 10px; width: 500px;color: white;text-align: left; padding: 10px 10px 10px 10px;
  box-shadow: 0px 5px 10px #444 inset;
}
@media all and (max-width: 780px){
  #hecho_div{
    width:100%;
    height:auto;
  }
  #gradient{
    height: auto !important;
  }
}
<!-- MODAL HASTA EL FINAL DEL DOCUMENTO BLADE -->
<script type="text/javascript">
$(".modal-background, .modal-close").on("click", function(){
  $(".modal-container, .modal-background").hide();
  });
</script>
<style type="text/css">
.modal-background {
  position: fixed;
  top: 45%;
  left: 0;
  background: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
  z-index: 1;
}
.modal-container {
  box-shadow: 0px 5px 10px #444 inset;
  border-style: double;
  border-color:black;
  position: relative;
  z-index: 1;
  width: 500px;
  margin:  auto;
  background: #fff;
  border-radius: 10px;
  font-family: Arial, Sans-serif;
  font-size: 12px;
}
.modal-container .modal-close {
  float: right;
  cursor: pointer;
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
a:hover span {
  transform: rotateY(360deg);
  -webkit-transform: rotateY(360deg);
  transition-duration: 1.5s;
  -webkit-transition-duration:1s;
} 
select {  text-align-last:center; }
html{
  height:100%;
  background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;
}
.btn.btn-primary[disabled] {
  color: white;
  opacity: 1;
}
.sound_on:hover{
  color:green;
}
.sound_off:hover{
  color:red;
}
</style>