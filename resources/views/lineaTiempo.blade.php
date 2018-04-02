{{!$logins = DB::table('users')->select('logins')->where('name', Auth::user()->name)->first()->logins }}
{{! $logins++ }}
{{! DB::table('users')
->where('name', Auth::user()->name)
->update(['logins' => $logins ])}}

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

  <!-- CSS LINK CON NOMENCLATURA LARAVEL -->
  <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />


</head>


<body id="gradient">
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

   <!--    <img src="/images/avatar/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:-35px; border-radius:50%;" >    
   --><img src="{{ asset('images/avatar/'.Auth::user()->avatar) }}" style="width:32px; height:32px; position: relative; border-radius:50%;" >    
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




<!--INICIO FILTROS  -->
<div style="text-align: center; background: transparent;">

  <!-- PRIMER FILTRO -->
  <div style="padding: 10px;margin: 10px;display: inline-block;">

    <form action="filtrar_linea_etiqueta" class="form-horizontal fv-form fv-form-bootstrap">

      <br>
      <div align="center" >
        <div  style="width: 300px">
          <div class="form-group" required><!-- ETIQUETAS -->
            <label style="font-weight: bold">Filtrar por etiqueta: </label>
            <div>
              <form action="FilterhechosController.php" method="post">
                {{! $etiquetas = DB::table('tags')->get() }}
                <select style="font-weight: bold" id="hecho" class="form-control" name="etiqueta" required>
                  <option> Todos los hechos </option>
                  @foreach($etiquetas as $tag)
                  <option> {{ $tag->name }} </option>
                  @endforeach
                </select>
                <input type="submit" class="btn btn-primary"  value="FILTRAR" style="width: 330px; align-content: center;font-weight: bold">        
              </form>
            </div>
          </div>
        </form>
      </div>
    </div>


  </div>

  <!-- SEGUNDO FILTRO -->
  <div style="padding: 10px;margin: 10px;display: inline-block;">

    <form action="filtrar_linea_keyword" class="form-horizontal fv-form fv-form-bootstrap">

      <br>
      <div align="center" >
        <div  style="width: 300px">
          <div class="form-group" required><!-- ETIQUETAS -->
            <label style="font-weight: bold">Filtrar por keywords: </label>
            <div>
              <form action="FilterhechosController.php" method="post">
                {{! $keywords = DB::table('keywords')->get() }}
                <select style="font-weight: bold" id="hecho" class="form-control" name="keyword" required>
                  <option>Cualquier keyword</option>
                  @foreach($keywords as $tag)
                  <option> {{ $tag->name }} </option>
                  @endforeach
                </select>
                <input type="submit" class="btn btn-primary"  value="FILTRAR" style="width: 330px; align-content: center;font-weight: bold">        
              </form>
            </div>
          </div>
        </form>
      </div>
    </div>


  </div>

  <!-- TERCER FILTRO -->
  <div style="padding: 10px;margin: 10px;display: inline-block;">

    <form action="filtrar_linea_titulo" class="form-horizontal fv-form fv-form-bootstrap">

      <br>
      <div align="center" >
        <div  style="width: 300px">
          <div class="form-group" required><!-- ETIQUETAS -->
            <label style="font-weight: bold">Filtrar por título: </label>
            <div>
              <form action="FilterhechosController.php" method="post">
               <input style="font-weight: bold" type="text" class="form-control" name="titulo" required>
               <input type="submit" class="btn btn-primary"  value="FILTRAR" style="width: 330px; align-content: center;font-weight: bold">        
             </form>
           </div>
         </div>
       </form>
     </div>
   </div>


 </div>

 <!--CIERRE DE LOS FILTROS  -->


 <!-- BOTON GENERAR EN PDF LA LINEA-->
 @foreach($datos as $a)
 {{! $datopdf = $a->id}}


 <form action="Pdf_linea">

  <form action="PdfController.php" method="post">
    <input type="hidden" name="data" value="{{ $datopdf }}">
    <input type="submit"  class="btn btn-primary" value="EXPORTAR A PDF">
  </form>
  @endforeach

</form>

<!-- FIN BOTON GENERAR PDF LINEA -->


</div>

<div class="body" >
  <ul id="time-line">

    @foreach($hechos as $u)

    <li>
      <div id="hechos" style="word-wrap: break-word;" >
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
          <b>Contenido:</b> {{ $u->contenido }} <br>
          @endif
          @if($u->video !== NULL)
          <b>URL Video:</b> <b><a href="{{ URL::asset($u->video) }}"  target="_blank"> {{ $u->video }} </a></b> <br>
          @endif
          @if($u->encuentro !== NULL)
          <b>Encuentro:</b> {{ $u->encuentro }}  <br>
          @endif
          @if($u->foto !== NULL)
          <b>FOTO:</b> <img id="foto" src="{{ URL::asset('/images/fotos/'.$u->foto) }}" style="width: 300px;"/> <br>
          @endif
          @if($u->anexo !== NULL)
          <b>Documento Anexo:</b> <b><a href="{{ URL::asset('/images/anexos/'.$u->anexo) }}"  target="_blank"> {{ $u->anexo }} </a></b> <br>
          @endif
          @if($u->proposito !== NULL)
          <b>Propósito:</b>  {{ $u->proposito }} <br>
          @endif

          @if($u->keywords !== NULL)
          {{! $array = explode( ',', $u->keywords )}}
          <b>Keywords:</b> 
          @foreach ($array as $item) 
          <b><button class="btn btn-primary" disabled style="border-radius: 3px ;cursor: default ; padding: 2px 2px 2px 2px">{{$item}}</button></b>
          @endforeach 
          <br>
          @endif

          @if($u->autorizacion !== NULL)
          <b>     <img style="width: 3%" src="{{ asset('images/icons/lockh.png')}}");"></b>  {{ $u->autorizacion }} <br>
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

a:hover span {
  transform: rotateY(360deg);
  -webkit-transform: rotateY(360deg);
  transition-duration: 1.5s;
  -webkit-transition-duration:1s;
}  

select {  text-align-last:center; }


@media all and (max-width: 780px){

  body{
    background: transparent!important;
  }

  #gradient{
    height: auto !important;
    background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat !important;
  }

  #hechos{
    width:auto !important;
    word-break:break-all;

  }
  #foto{
    width:50% !important;
    word-break:break-all;

  }


  ul#time-line{

    text-align: center;
    width: auto !important;

    list-style-type: none;
    position: relative;
    overflow: hidden;
    z-index: 0;
  }
  ul#time-line:after{
    position: absolute;
    height: 100%;
    width: 5px;
    border-radius: 20px;
    margin-left: auto;
    z-index: -1;
  }
  ul#time-line li{
    width:  90% !important;
    margin: auto;
    text-align: center;
    transition: all cubic-bezier(0.68,0.55,0.265,1.55) .5s;
    transform: rotateX(90deg);
  }
  ul#time-line li:nth-child(2n){
    width: 90% !important;
    margin: auto;
    text-align: center;
  }

  ul#time-line li div{
    width:  90% !important;
    display: inline-block;
    background: #303030;
    border-radius: 30px;  
    position: relative;
    color: #fff;
    z-index: 0;

  }
  ul#time-line li div:hover{
    background: rgba(48, 48, 48, 0.5);
    z-index: 0;
  }

  ul#time-line li div:after{
    content: none;

  }
  ul#time-line li div:before{
    content: none;
  }

  ul#time-line li:nth-child(2n) div:before{
   text-align: center;
 }
 ul#time-line li:nth-child(2n) div:after{
   text-align: center;

   border-color: transparent transparent transparent #303030;
 }

} 

html{
  height:100%;
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