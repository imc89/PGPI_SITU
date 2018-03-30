
{{! $alumnos = DB::table('users')
->where('rol','=','1')
->select('users.name','users.email')
->get() }}

<!-- BASE DE DATOS TOMAMOS DATOS DE PERFIL -->
{{! $datos = DB::table('alumno')
->select('alumno.id','nombre','apellidos','dni')
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
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />


</head>

<body onload="deshabilitaRetroceso()" id="gradient" style="background: transparent;">

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

    <li class="login">

      @guest
      <li><a href="{{ route('login') }}">Login</a></li>
      @else


      <li class="dropdown show login" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"> 
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu pull-right " aria-labelledby="dropdownMenuLink" >
          <a style="font-weight: bold;" class="glyphicon glyphicon-log-out" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </div>

      @endguest
    </li>

  </div>





  <!-- FIN DE NAVEGADOR -->


  <!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->
  <div align="center" >
    <h1>BIENVENIDO PROFESOR</h1>
    <h1>TABLÓN DE {{Auth::user()->name}}</h1> 
    <br>


    <table id="table" class="table table-striped table-dark">
      <?php $contador=0 ?>
      <?php $contadato=0 ?>
      <thead id="table">
        <tr id="tabler" class="bordertable">
          <th class="bordertable" scope="col">#</th>
          <th class="bordertable" scope="col">Nombre de Perfil_Alumno</th>
          <th class="bordertable" scope="col">Apellido de Perfil_Alumno</th>
          <th class="bordertable" scope="col">DNI de Perfil_Alumno</th>
          <th class="bordertable" scope="col">Ver Curriculum</th>
          <th class="bordertable" scope="col">Descargar Curriculum</th>

        </tr>
      </thead>
      <tbody id="table">

      </div>
      <b> 
        <div style="text-align: center;">
          <span style="text-align: center;padding: 5px 5px 5px 5px; border-radius: 5px;" 
          class="btn-primary" onmouseover="this.style.background='#6478A7';" onmouseout="this.style.background='#2865A8';">



          {{!$registros = $contar}}
          @foreach ($datos as $a)
          @if($a->nombre == NULL)          
          {{! $registros--}}
          @else
          {{! $contar }}
          @endif
          @endforeach

          {{! $contar }}
          {{$registros}}
        </span> 
      </div>
      <h4><b>Alumnos registrados</b></h4> </b>
      <br> <br>



      <div class="body" style="background: transparent;" >

        @foreach ($datos as $a)
        @if(!empty($a->nombre))

        @if($contar > $contadato)
        <tr id="table" class="bordertable">

          <td id="tabled" class="bordertable" scope="row"><?php $contador++; echo $contador ?></th>
            @if(!empty($a->nombre))
            <td id="tabled" class="bordertable"> {{ucfirst($a->nombre)}} </td>
            @else
            <td  id="tabled" class="bordertable"> DATO NO INTRODUCIDO <p> POR EL ALUMNO </td>
              @endif

              @if(!empty($a->apellidos))
              <td id="tabled" class="bordertable"> {{ucfirst($a->apellidos)}} </td>
              @else
              <td id="tabled" class="bordertable"> DATO NO INTRODUCIDO <p> POR EL ALUMNO </td>
                @endif

                @if(!empty($a->dni))
                <td id="tabled" class="bordertable"> {{$a->dni}} </td>
                @else
                <td id="tabled" class="bordertable"> DATO NO INTRODUCIDO <p> POR EL ALUMNO </td>
                  @endif

                  <?php $contadato++;  ?>
                  <td id="tabled" class="bordertable"> 

                    {{! $datopdf = $a->id}}

                    <form action="viewPdf">

                      <form action="PdfController.php" method="post">
                        <input type="hidden" name="data" value="{{ $datopdf }}">
                        <input type="submit"  class="btn btn-primary" value="VER CURRICULUM">
                      </form>

                    </form>
                  </td>

                  <td id="tabled" class="bordertable"> 
                   <form action="downPdf">

                    <form action="PdfController.php" method="post">
                      <input type="hidden" name="data" value="{{ $datopdf }}">
                      <input type="submit"  class="btn btn-primary" value="DESCARGAR CURRICULUM">
                    </form>
                  </form>

                </td>

                @else
                <td class="bordertable"> - </td>
              </tr>
              <?php $contadato++;  ?>
              @endif
              @else    <?php $contadato--;  ?>

              @endif
              @endforeach 


            </tbody>
          </table>


        </div>

        <!-- FINAL CARRUSEL -->

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
  height:100%;
  background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ;
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

a:hover span {
  transform: rotateY(360deg);
  -webkit-transform: rotateY(360deg);
  transition-duration: 1.5s;
  -webkit-transition-duration:1s;
} 

@media all and (max-width: 780px){
  #hechos{
    width:auto !important;

  }

  footer {
  background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat !important;
  }

  #table  { 
    display: block; 
  }
  

  #tabled  { 
    display: block; 
    text-align: center;


  }

  #tabled:before  { 
    font-weight: bold;
    color: black;

  }

  #tabler { 
    display: none; 
  }

  
  /* Hide table headers (but not display: none;, for accessibility) */



  
  /*
  Label the data
  */
  #tabled:nth-of-type(1):before { content: "#"; }
  #tabled:nth-of-type(2):before { content: "Nombre de Perfil_Alumno : "; }
  #tabled:nth-of-type(3):before { content: "Apellido de Perfil_Alumno : "; }
  #tabled:nth-of-type(4):before { content: "DNI de Perfil_Alumno : "; }
  #tabled:nth-of-type(5):before { content: "Ver Curriculum : "; }
  #tabled:nth-of-type(6):before { content: "Descargar Curriculum : "; }
}


</style>