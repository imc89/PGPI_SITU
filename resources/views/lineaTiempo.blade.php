{{!$logins = DB::table('users')->select('logins')->where('name', Auth::user()->name)->first()->logins }}
{{! $logins++ }}
{{! DB::table('users')
->where('name', Auth::user()->name)
->update(['logins' => $logins ])}}

{{! $alumno_id = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->join('users','users.id','=','user_id')
->select('alumno.id')
->get() }}

@foreach($alumno_id as $aluid)
{{ $aluid->id }} 
{{! $hechos = DB::table('hechos')
->where('alumno_id','=', $aluid->id)
->get() }}
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

  <!-- CSS LINK CON NOMENCLATURA LARAVEL -->
  <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />


</head>


<body>
  <!-- INICIO NAVEGADOR -->
  <div class="topnav navbar navbar-inverse  navbar-fixed-top" id="myTopnav">
   <a href="alumno" align="center" style="padding: 0 0 0 0 "> 
     <img width="50px" src="{{ asset('images/icono.jpg') }}" >
   </a>
   <a  data-toggle="modal" data-target="#myModal">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About
  </a>
  <a id="btn" onmouseover="style='cursor: help;'" onmouseout="style='cursor: default'">
    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ayuda 
  </a>
  <a href="#">
    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> INVITAR 
  </a>
  <a href="crear_hechos">
    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> HECHOS 
  </a>
  <a href="lineaTiempo">
    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> LÍNEA TEMPORAL 
  </a>
  <!-- BOTÓN DE LOGIN -->

  <ul  class="nav navbar-nav navbar-right" style="margin-right: 1%">
    <!-- Authentication Links -->
    @guest
    <li><a href="{{ route('login') }}">Login</a></li>
    @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
        <img src="/images/avatar/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:-35px; border-radius:50%">    
        {{ Auth::user()->name }} <span class="caret"></span>
      </a>

      <ul class="dropdown-menu" style="border-radius: 10px; text-align: left;">

       <li>
        <a style="font-weight: bold;" href="perfilAlumno" class="glyphicon glyphicon-user"> Perfil</a>
      </li>

      <li>
        <a style="font-weight: bold;" href="configPerfil" class="glyphicon glyphicon-cog"> Configuración</a>
      </li>

      <li>
        <a style="font-weight: bold;" href="{{ route('logout') }}" class="glyphicon glyphicon-log-out" 
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



<a href="javascript:void(0);" style="font-size:15px; background: #435E80;border-radius: 5px;
" class="icon" onclick="myFunction()">&#9776;</a>

</div> 

<br><br><br>
<!-- FIN DE NAVEGADOR -->


<!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->
<!-- <div class="container">
  <div class="line time">
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>
    <p>A FECHA DE : 12-12-18 <br>HOLA MUNDO</p>

  </div>
</div> -->

<div class="body">
  <ul id="time-line">

    @foreach($hechos as $u)

    <li>
      <div>
        <p>
          A FECHA DE : {{ $u->fecha }}
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
          <b>FOTO:</b> <img src="{{ URL::asset('/images/fotos/'.$u->foto) }}" style="width: 300px;"/> <br>
          @endif
          @if($u->anexo !== NULL)
          <b>Documento Anexo:</b> <b><a href="{{ URL::asset('/images/anexos/'.$u->anexo) }}"  target="_blank"> {{ $u->anexo }} </a></b> <br>
          @endif
          @if($u->proposito !== NULL)
          <b>Propósito:</b>  {{ $u->proposito }} <br>
          @endif
        </p>
      </div>
    </li>
    @endforeach

  </ul>

</div>

<!-- FINAL CARRUSEL -->






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



<style type="text/css">
.site-link{
  padding: 5px 15px;
  position: fixed;
  z-index: 99999;
  background: #fff;
  box-shadow: 0 0 4px rgba(0,0,0,.14), 0 4px 8px rgba(0,0,0,.28);
  right: 30px;
  bottom: 30px;
  border-radius: 10px;
}
.site-link img{
  width: 30px;
  height: 30px;
}
</style>


<style type="text/css">

.body{
  background: url('/images/fondo_body.jpg')fixed;
  padding: 0;
  margin: 0;
  font-family: arial;
}
ul#time-line{
  padding: 50px 0;
  margin: 0;
  list-style-type: none;
  position: relative;
  overflow: hidden;
}
ul#time-line:after{
  position: absolute;
  content: '';
  height: 100%;
  width: 5px;
  border-radius: 20px;
  background: #303030;
  left: 0;
  right: 0;
  top: 0;
  pointer-events: none;
  margin: auto;
}
ul#time-line li{
  width: 50%;
  margin-left: auto;
  text-align: left;
  transition: all cubic-bezier(0.68,0.55,0.265,1.55) .5s;
  transform: rotateX(90deg);
}
ul#time-line li:nth-child(2n){
  margin-left: 0;
  margin-right: auto;
  text-align: right;
}
ul#time-line li div{
  width: 70%;
  display: inline-block;
  background: #303030;
  padding: 30px;
  margin: 20px;
  border-radius: 30px;  
  position: relative;
  color: #fff;
}
ul#time-line li div:hover{

  background: rgba(48, 48, 48, 0.5);

}
ul#time-line li div:after{
  content: '';
  position: absolute;
  left: auto;
  right: 100%;
  top: 45%;
  border: solid 10px;
  border-color: transparent #303030 transparent transparent;
}
ul#time-line li div:before{
  content: '';
  position: absolute;
  height: 20px;
  width: 20px;
  background: #303030;
  border-radius: 50%;
  left: -30px;
  top: 45%;
}
ul#time-line li:nth-child(2n) div:before{
  right: -30px;
  left: auto;
}
ul#time-line li:nth-child(2n) div:after{
  left: 100%;
  right: auto;
  border-color: transparent transparent transparent #303030;
}
ul#time-line li.visibility {
  transform: rotateX(0deg) perspective(360px);
}
</style>

<script type="text/javascript">
  $('ul#time-line li').each(function(){     
    var stop = $(window).scrollTop() + $(window).height()/1.2;
    var litop = $(this).offset().top;
    if (stop > litop){
      $(this).addClass('visibility');
    }     
  });
  $(window).scroll(function(){  
    $('ul#time-line li').each(function(){     
      var stop = $(window).scrollTop() + $(window).height()/1.2;
      var litop = $(this).offset().top;
      if (stop > litop){
        $(this).addClass('visibility');
      } else{
        $(this).removeClass('visibility');
      };
      console.log(litop+' - '+stop);
    });
  });
</script>