{{! $datos = DB::table('alumno')
->select('alumno.id')
->where('users.id','=', Auth::user()->id)
->join('users','users.id','=','user_id')
->get()
}}

@foreach($datos as $a)
{{! $idrelacion = $a->id}}
@endforeach
@foreach ($hecho as $h) 
{{! $array = explode( ',', $h->keywords )}}
@endforeach



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

  <!--  LINK KEYWORD TAGS BOOTSTRAP JQUERY -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js">
  </script>
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

        <span class="glyphicon glyphicon-user" aria-hidden="true" style="color: white"></span>      
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
     {{ Auth::user()->name }} <span class="caret"></span>
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


<div class="body">

  <br><br><br>
  <?php $contador=0 ?>



  @foreach($hecho as $u)

<form  method="POST" id="programmer_form" enctype="multipart/form-data" action="hecho_modificado" class="form-horizontal fv-form fv-form-bootstrap" onsubmit="return validarForm();">
  {{ csrf_field() }}
    <div align="center">

      @if(session('message'))
      <div align="center" class='alert alert-success'>
        {{ session('message') }}
      </div>
      @endif

      <h1 style="font-weight: bold">
        MODIFICACIÓN DEL HECHO :   
        @if($u->titulo !== NULL)
        {{mb_strtoupper($u->titulo)}} 
      @endif</h1>
      <!-- MANDAR ID A CONTROLLER -->
      <input type="hidden" name="id" value="{{$u->id}}">

      <br><br>


      <div id="hecho_div">

        <b>Fecha:</b>  {{ $u->fecha }}&nbsp;&nbsp;&nbsp;
        <div align="center" class="form-group">
          <input style="font-weight: bold;width: 480px" type="date" class="form-control" name="fecha" id="fecha" value='{{$u->fecha}}'>
        </div>

        @if($u->etiqueta !== NULL)
        <br><b>Tipo:</b> {{ $u->etiqueta }} <br>

        <div align="center" class="form-group"><!-- ETIQUETAS -->
          {{! $etiquetas = DB::table('tags')->get() }}
          <select style="font-weight: bold;width: 480px" id="hecho" class="form-control" name="etiqueta" value='{{$u->etiqueta}}'>
            <option>-</option>
            @foreach($etiquetas as $tag)
            <option> {{ $tag->name }} </option>
            @endforeach
          </select>
        </div>
        @endif

        @if($u->titulo !== NULL)
        <b>Título:</b>  {{ $u->titulo }} <br>
        <div class="form-group" align="center">
          <input style="font-weight: bold;width: 480px" type="text" class="form-control" name="titulo" value='{{$u->titulo}}' />
        </div>
        @endif

        @if($u->curso !== NULL)
        <b>Curso:</b>  {{ $u->curso }}º <br>
        <div class="form-group">

          <div class="col-xs-8" id="curso6">
            <div class="radio">
              <label><input type="radio"  class="form-check-input" name="curso" value="1">
              1º CURSO</label>
            </div>
            <div class="radio">
              <label><input type="radio"   class="form-check-input" name="curso" value="2">
              2º CURSO</label>
            </div>
            <div class="radio">
              <label><input type="radio"  class="form-check-input" name="curso" value="3">
              3º CURSO</label>
            </div>
            <div class="radio">
              <label><input type="radio" class="form-check-input" name="curso" value="4">
              4º CURSO</label>
            </div>
            <div class="radio">
              <label><input type="radio" class="form-check-input" name="curso" value="5">
              5º CURSO</label>
            </div>
            <div class="radio">
              <label><input type="radio" class="form-check-input" name="curso" value="6">
              6º CURSO</label>
            </div>
          </div>
        </div>
        @endif

        <b>Contenido:</b>  {{ $u->contenido }} <br>
        <div class="form-group" align="center">
          <textarea  name="contenido" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{$u->contenido}}" style="max-width: 480px;min-width: 480px;min-height: 50px;font-weight: bold" >{{$u->contenido}}</textarea>
        </div>

        @if($u->video !== NULL)
        <b>URL Video:</b> <b><a href="{{ URL::asset($u->video) }}"  target="_blank"> {{ $u->video }} </a></b> <br>
        <div class="form-group" align="center">
          <input style="font-weight: bold;width: 480px" type="text" name="video" class="form-control" id="videos" value="{{$u->video}}}" />
          <br>
          <span id="videoOK"></span>
        </div>

        @endif

        @if($u->encuentro !== NULL)
        <b>Encuentro:</b> {{ $u->encuentro }}  <br>

        <input style="font-weight: bold" type="text" class="form-control" name="encuentro" value="{{$u->encuentro}}" />

        @endif

        @if($u->foto !== NULL)
        <br>
        <div id="foto" class="form-group">
          <div class="col-xs-8">
            <b>Foto:</b> 
            <input type="file" name="foto" id="profile-img" accept="image/*">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br>
            <div style="border-style: dashed; border-width: 4px;width:158px;">
              <img src="images/fotos/{{$u->foto}}" id="profile-img-tag" width="150px"  />
            </div>
          </div>
        </div>

        @endif

        <b>Documento Anexo:</b> <b><a href="{{ URL::asset('/images/anexos/'.$u->anexo) }}"  target="_blank"> {{ $u->anexo }} </a></b> <br>
        <input type="file" name="anexo" value="{{$u->anexo}}">
        

        <b>Propósito:</b>  {{ $u->proposito }} <br>
        <div class="form-group" align="center">
          <textarea name="proposito" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{$u->proposito}}" style="max-width: 480px;min-width: 480px;min-height: 50px;font-weight: bold" >{{$u->proposito}}</textarea>
        </div>


        {{! $array = explode( ',', $u->keywords )}}
        <br><b>Keywords:</b> 

        @foreach ($array as $item) 
        @if($item !== '')
        <b><button class="btn btn-primary" disabled style="border-radius: 3px ;cursor: default ; padding: 2px 2px 2px 2px">{{$item}}</button></b>
        @endif
        @endforeach 

        <div class="form-group">
          <label class="col-xs-7">Añade tus Keywords: </label>
          <div class="col-xs-8" style="font-weight: bold" >
            <input  autocomplete="off" type="text" name="keywords" id="keywords" 
            @foreach ($array as $item) @if($item != NULL) placeholder="@foreach ($array as $item) {{ $item }},@endforeach "  @else value="" @endif @endforeach
            class="form-control "/>
          </div>
        </div>

        <br><br>

        @if($u->autorizacion !== NULL)
        <div class="form-group" align="center" >
          <br><b> 
            <div style="background: #8492A2;width: 480px;padding-top: 5px">
              <img style="width: 3%" src="{{ asset('images/icons/lockh.png')}}");"></b>  {{ $u->autorizacion }} <br>
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
          </div>
          @endif


          <br>



          <div class="form-group" align="center">
            <div id="bhechos" >
              <input id="bhechos" type="submit" name="submit" id="submit" class="btn btn-primary"  value="MODIFICAR HECHO" style="width: 480px; align-content: center" onClick="return empty()">
            </div>
          </div>

        </div>




      </div>
      <br>



    </form>
    @endforeach


  </div>



  @if (Auth::user()->logins ==1)
  <div class="modal-background">
    <div class="modal-container">
      <div align="center" class="modal-header">BIENVENIDO A LA PLATAFORMA SITU 
        <i class="modal-close">x</i>

      </div>
      <div class="modal-info">
        Bienvenido a tu nuevo perfil de usuario, te recomendamos que inicies tus datos de perfil, de esta forma podrás la información generada será más precisa, como tu curriculum o los datos que puedas compartir con tu profesor.
        Esta pantalla solo saldrá en tu primer login.
        Muchas gracias por confiar en nosotros.
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
          <h4 align="center" class="modal-title">ALUMNO</h4>
        </div>
        <div class="modal-body" style="background-color: rgba(171, 184, 203, 0.70)">

          Has accedido a la sección de alumno.
          En esta sección se muestran los hechos por orden de creación.
          <ul>
            <li>
              <br>
              -Para acceder a la configuración de usuario, donde podrás editar tus datos y foto de perfil pulsa tu nombre a la derecha del menú  y selecciona &nbsp; <span class="glyphicon glyphicon-cog"></span> &nbsp; <b style="font-weight: bold">Configuración</b>.  
              <br>
            </li>

            <li>
              <br>
              -Para acceder a tus datos de perfil donde también podrás dar de baja tu cuenta pulsa tu nombre a la derecha del menú  y selecciona  &nbsp; <span class="glyphicon glyphicon-user"></span> &nbsp; <b style="font-weight: bold">Perfil</b>.  
              <br>
            </li>

            <li>
              <br>
              -Para acceder al área de invitaciones pulsa el botón &nbsp; <span class="glyphicon glyphicon-bullhorn"></span> &nbsp; <b style="font-weight: bold">Invitar</b>.  
              <br>
            </li>

            <li>
              <br>
              -Para gestionar tus keywords de hechos pulsa el botón &nbsp; <span class="glyphicon glyphicon-tags"></span> &nbsp; <b style="font-weight: bold">Keywords</b>.  
              <br>
            </li>

            <li>
              <br>
              -Para crear nuevos hechos pulsa el botón &nbsp; <span class="glyphicon glyphicon-list-alt"></span> &nbsp; <b style="font-weight: bold">Hechos</b>.  
              <br>
            </li>

            <li>
              <br>
              -Para visualizar la línea temporal de  hechos pulsa el botón &nbsp; <span class="glyphicon glyphicon-time"></span> &nbsp; <b style="font-weight: bold">Línea Temporal</b>.  
              <br>
            </li>
          </ul>

          <br><br>

          <div align="center">
            Podrás salir del perfil de alumno pulsando en el menú sobre tu nombre y a continuación sobre Logout.
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
    'Has accedido a la sección de alumno.En esta sección se muestran los hechos por orden de creación.Para acceder a la configuración de usuario, donde podrás editar tus datos y foto de perfil pulsa tu nombre a la derecha del menú  y seleccionaconfiguración.Para acceder a tus datos de perfil, donde también podrás dar de baja tu cuenta, pulsa tu nombre a la derecha del menú  y selecciona perfil.Para acceder al área de invitaciones pulsa el botón invitar.Para gestionar tuskeywords de hechos pulsa el botón keywords.Para crear nuevos hechos pulsa el botón Hechos.Para visualizar la línea temporal de  hechos pulsa el botón Línea Temporal. Podrás salir del perfil de alumno pulsando en el menú sobre tu nombre y a continuación sobreLogout.'
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

<style type="text/css">

#borrar{
 color: black; 
}
#borrar:hover{
 color: red; 
}

#ver{
 color: black; 
}
#ver:hover{
 color: #3565A3; 
}

#hecho_div{
  background: #262626; border-radius: 10px; width: 500px;color: white;text-align: left; padding: 10px 10px 10px 10px;
}
#hecho_div:hover{
  background: #93A3B2; border-radius: 10px; width: 500px;color: white;text-align: left; padding: 10px 10px 10px 10px;
  box-shadow: 0px 5px 10px #444 inset;

}

@media all and (max-width: 780px){
  #hechos{
    width:100% !important;
  }

  #hecho_div{
    width:100%;
    height:auto;

  }

  #hecho_div:hover{
    width:100% !important;
    background: #93A3B2; border-radius: 10px; width: 500px;color: white;text-align: left; padding: 10px 10px 10px 10px;
    box-shadow: 0px 5px 10px #444 inset;

  }
  #gradient{
    height: auto !important;
  }
}
</style>
<!-- MODAL HASTA EL FINAL DEL DOCUMENTO BLADE -->
<script type="text/javascript">
  $(".modal-background, .modal-close").on("click", function(){
    $(".modal-container , .modal-background").hide();
  });
</script>

<style type="text/css">

.modal-background {
  position: fixed;
  top: 190px;
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

<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#profile-img-tag').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#profile-img").change(function(){
    readURL(this);
  });
</script>


<script type="text/javascript">
  document.getElementById('videos').addEventListener('input', function() {
    campo = event.target;
    valido = document.getElementById('videoOK');
    videoRegex = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$|^(?:https?:\/\/)?(?:www\.)?dailymotion.com\/(video|hub)+(\/([^_]+))?[^#]*(‪#‎video‬=([^_&]+))?$|^(?:https?:\/\/)?(?:www\.)?vimeo.com\/([0-9]+)$/;

    videoRegex2 = /^http(?:s?):\/\/(?:www\.|web\.|m\.)?facebook\.com\/([A-z0-9\.]+)\/videos(?:\/[0-9A-z].+)?\/(\d+)(?:.+)?$/;

    videoRegex3 = /http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/;
                          //Se muestra un texto a modo de ejemplo, luego va a ser un icono
                          if (videoRegex.test(campo.value) || videoRegex2.test(campo.value) || videoRegex3.test(campo.value))  {
                            valido.innerHTML = "<span style=\"color:green;font-weight:bold\">" + "Vídeo válido" + "</span>"
                          } else {
                            valido.innerHTML = "<span style=\"color:red;font-weight:bold\">" + "Vídeo inválido" + "</span>"
                          }
                        });
                      </script>


                      <script>

                        $(document).ready(function(){

                          $('#keywords').tokenfield({
                            autocomplete:{
                              source:'{!!URL::route('autocomplete')!!}',
                              delay:100
                            },
                            showAutocompleteOnFocus: true,
                            allowDuplicates: false,
                          });

                        });


                        if ( $('#fecha')[0].type != 'date' ) $('#fecha').datepicker();

                      </script>
