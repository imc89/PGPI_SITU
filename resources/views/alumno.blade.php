{{! $logins = DB::table('users')
->where('users.id','=', Auth::user()->id)
->select('logins')
->get() }}




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
  <a href="mail_invitados">
    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> INVITAR 
  </a>
  <a href="keywords">
    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> KEYWORDS 
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
          <a  style="font-weight: bold;" class="glyphicon glyphicon-log-out" href="{{ route('logout') }}"
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




<!-- FIN DE NAVEGADOR -->


<!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->
<div class="body">


  <br><br><br><br><br>
  <div align="center">
    <div class="alert alert-warning">
    <strong>Warning!</strong> Para que tu profesor pueda ver correctamente tu curriculum completa lo mejor posible tus datos de perfil.
  </div>
    <h1>BIENVENIDO ALUMNO</h1>
    <h1>TABLÓN DE HECHOS DE {{Auth::user()->name}}</h1> 
  </div>

  <!-- MOSTRAR HECHOS -->
  <?php $contador=0 ?>


  <!--INICIO FILTROS  -->
  <div style="text-align: center;">

    <!-- PRIMER FILTRO -->
    <div style="padding: 10px;margin: 10px;display: inline-block;">

      <form action="filtrar_hechos_etiqueta" class="form-horizontal fv-form fv-form-bootstrap">

        <br>
        <div align="center" >
          <div  style="width: 300px">
            <div class="form-group" required><!-- ETIQUETAS -->
              <label >Filtrar por etiqueta: </label>
              <div>
                <form action="FilterhechosController.php" method="post">
                  {{! $etiquetas = DB::table('tags')->get() }}
                  <select id="hecho" class="form-control" name="etiqueta" required>
                    <option> Todos los hechos </option>
                    @foreach($etiquetas as $tag)
                    <option> {{ $tag->name }} </option>
                    @endforeach
                  </select>
                  <input type="submit" class="btn btn-primary"  value="FILTRAR" style="width: 330px; align-content: center">        
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>


    </div>

    <!-- SEGUNDO FILTRO -->
    <div style="padding: 10px;margin: 10px;display: inline-block;">

      <form action="filtrar_hechos_keyword" class="form-horizontal fv-form fv-form-bootstrap">

        <br>
        <div align="center" >
          <div  style="width: 300px">
            <div class="form-group" required><!-- ETIQUETAS -->
              <label >Filtrar por keywords: </label>
              <div>
                <form action="FilterhechosController.php" method="post">
                  {{! $keywords = DB::table('keywords')->get() }}
                 <select id="hecho" class="form-control" name="keyword" required>
                  <option>Cualquier keyword</option>
                  @foreach($keywords as $tag)
                  <option> {{ $tag->name }} </option>
                  @endforeach
                </select>
                <input type="submit" class="btn btn-primary"  value="FILTRAR" style="width: 330px; align-content: center">        
              </form>
            </div>
          </div>
        </form>
      </div>
    </div>


  </div>

  <!-- TERCER FILTRO -->
  <div style="padding: 10px;margin: 10px;display: inline-block;">

    <form action="filtrar_hechos_titulo" class="form-horizontal fv-form fv-form-bootstrap">

      <br>
      <div align="center" >
        <div  style="width: 300px">
          <div class="form-group" required><!-- ETIQUETAS -->
            <label >Filtrar por título: </label>
            <div>
              <form action="FilterhechosController.php" method="post">
               <input type="text" class="form-control" name="titulo" required>
               <input type="submit" class="btn btn-primary"  value="FILTRAR" style="width: 330px; align-content: center">        
             </form>
           </div>
         </div>
       </form>
     </div>
   </div>


 </div>

 <!--CIERRE DE LOS FILTROS  -->
</div>






@foreach($hechos as $u)
<div align="center">
  <div id="hecho_div">
    <div style="float: left;">
      <u>HECHO Nº <?php $contador++; echo $contador ?></u>
    </div>
    <div style="float: right;">
      <b>Fecha:</b>  {{ $u->fecha }}&nbsp;&nbsp;&nbsp;
      <div style="float: right;background: #BAB9BB;border-radius:5px">
        <button style="border: none;background: transparent;">
          <span id="borrar" class="glyphicon glyphicon-remove"></span>
        </button>
      </div>
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
</div>
<br>
@endforeach
</div>
</body>
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
</style>
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

select {  text-align-last:center; }

.btn.btn-primary[disabled] {
    color: white;
    opacity: 1;
}

</style>
