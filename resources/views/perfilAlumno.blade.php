<!-- BASE DE DATOS TOMAMOS DATOS DE PERFIL -->
<!-- NOMBRE -->
{{! $nombre_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('nombre')
->join('users','users.id','=','user_id')
->get() }}
<!-- APELLIDO -->
{{! $apellidos_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('apellidos')
->join('users','users.id','=','user_id')
->get() }}
<!-- DNI -->
{{! $dni_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('dni')
->join('users','users.id','=','user_id')
->get() }}
<!-- EMAIL -->
{{! $email_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('alumno.email')
->join('users','users.id','=','user_id')
->get() }}
<!-- DIRECCION -->
{{! $direccion_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('direccion')
->join('users','users.id','=','user_id')
->get() }}
<!-- CARRERA -->
{{! $carrera_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('carrera')
->join('users','users.id','=','user_id')
->get() }}

<!-- OPCIONES -->
{{! $dato1_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('dato_opcion1')
->join('users','users.id','=','user_id')
->get() }}
{{! $dato2_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('dato_opcion2')
->join('users','users.id','=','user_id')
->get() }}
{{! $dato3_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('dato_opcion3')
->join('users','users.id','=','user_id')
->get() }}
<!-- VALORES -->
{{! $valor1_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('opcion1_valor')
->join('users','users.id','=','user_id')
->get() }}
{{! $valor2_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('opcion2_valor')
->join('users','users.id','=','user_id')
->get() }}
{{! $valor3_alumno = DB::table('alumno')
->where('users.id','=', Auth::user()->id)
->select('opcion3_valor')
->join('users','users.id','=','user_id')
->get() }}
<!-- FIN BASE DATOS -->

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


<body style="background: transparent;">
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


<!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->
<div style="height:100%; background: linear-gradient(to bottom, rgba(246,246,246,1) 0%, rgba(255,255,255,1) 0%, rgba(89,112,146,1) 100%)center center no-repeat ; ">

<div>
  <br><br>
  <div align="center">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <img src="/images/avatar/{{ Auth::user()->avatar }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
          <h2>Perfil de {{ Auth::user()->name }}</h2>
        </div>
      </div>
    </div>
  </div>

</div>

<div align="center">
  <h1>DATOS DE PERFIL</h1>
</div>

<div class="body" style="background: transparent;">
  <div align="center" >

    <div  style="width: 400px;background: #B7C2D2; border-radius: 10px;box-shadow: 0px 5px 10px #444 inset;">
     <br><br>
     <div align="left">
      <br>
      <tr>
        <th scope="row"></th>
        @foreach($nombre_alumno as $u)
        @if($u->nombre  !== NULL)
        <label style="width: 400px"  onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
         &nbsp;&nbsp; Nombre completo: 
          <tr>
            <td> {{ ucfirst($u->nombre) }} </td>
            @endif
            @endforeach
          </tr>

        </label>
        <tr>
          <th scope="row"></th>
          @foreach($apellidos_alumno as $u)
          @if($u->apellidos  !== NULL)
          <label style="width: 400px"  onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
          &nbsp;&nbsp;  Apellidos: 
            <tr>
              <td> {{ ucfirst($u->apellidos) }} </td>
              @endif
              @endforeach
            </tr>
          </label>

          <tr>
            <th scope="row"></th>
            @foreach($dni_alumno as $u)
            @if($u->dni  !== NULL)
            <label style="width: 400px"  onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
            &nbsp;&nbsp;  Dni: 
              <tr>
                <td> {{ $u->dni }} </td>
                @endif
                @endforeach
              </tr>
            </label>


            <tr>
              <th scope="row"></th>
              @foreach($email_alumno as $u)
              @if($u->email  !== NULL)
              <label style="width: 400px"  onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
              &nbsp;&nbsp;  Email: 
                <tr>
                  <td> {{ $u->email }} </td>
                  @endif
                  @endforeach
                </tr>
              </label>


              <tr>
                <th scope="row"></th>
                @foreach($direccion_alumno as $u)
                @if($u->direccion  !== NULL)
                <label style="width: 400px"  onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
                &nbsp;&nbsp;  Dirección: 
                  <tr>
                    <td> {{ $u->direccion }} </td>
                    @endif
                    @endforeach
                  </tr>
                </label>



                <tr>
                  <th scope="row"></th>
                  @foreach($carrera_alumno as $u)
                  @if($u->carrera  !== NULL && $u->carrera !== "-")
                  <label style="width: 400px"  onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
                &nbsp;&nbsp;    Carrera: 
                    <tr>
                      <td> {{ $u->carrera }} </td>
                      @endif
                      @endforeach
                    </tr>
                  </label>


                  @foreach($dato1_alumno as $u)
                  @if($u->dato_opcion1  !== NULL)
                  <label style="width: 400px"  onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
                &nbsp;&nbsp;    {{ $u->dato_opcion1 }}:
                    @endif
                    @endforeach

                    <th scope="row"></th>
                    @foreach($valor1_alumno as $u)
                    @if($u->opcion1_valor  !== NULL)
                    <tr>
                      <td> {{ $u->opcion1_valor }} </td>
                      @endif
                      @endforeach
                    </tr>
                  </label>


                  @foreach($dato2_alumno as $u)
                  @if($u->dato_opcion2  !== NULL)
                  <label style="width: 400px"  onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
                &nbsp;&nbsp;    {{ $u->dato_opcion2 }}:
                    @endif
                    @endforeach
                  </tr>

                  <th scope="row"></th>
                  @foreach($valor2_alumno as $u)
                  @if($u->opcion2_valor  !== NULL)
                  <tr>
                    <td> {{ $u->opcion2_valor }} </td>
                    @endif
                    @endforeach
                  </tr>
                </label>


                @foreach($dato3_alumno as $u)
                @if($u->dato_opcion3  !== NULL)
                <label style="width: 400px"  onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
                &nbsp;&nbsp;  {{ $u->dato_opcion3 }}:
                  @endif
                  @endforeach
                </tr>

                <th scope="row"></th>
                @foreach($valor3_alumno as $u)
                @if($u->opcion3_valor  !== NULL)
                <tr>
                  <td> {{ $u->opcion3_valor }} </td>
                  @endif
                  @endforeach
                </tr>
              </label>



              <br><br>
              <button data-toggle="modal" data-target="#DELETEMODAL" class="btn btn-primary" style="width: 400px">ELIMINAR PERFIL</button>




            </div>
          </div>
        </div>
      </div>
      <!-- FINAL CARRUSEL -->
</div>

      <!--  BANNER MODAL DELETE ACCOUNT -->
      <div class="modal fade" id="DELETEMODAL" role="dialog">
        <div class="modal-dialog">

          <!-- CONTENIDO DE ABOUT EN BANNER-->
          <div class="modal-content">
            <div class="modal-header" align="center">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ELIMINACIÓN DE LA CUENTA DE USUARIO</h4>
            </div>
            <div class="modal-body" style="background-color: rgba(171, 184, 203, 0.70)  ">
              <p><b>¿ESTÁS ACEPTANDO LA ELIMINACIÓN DE LA CUENTA Y TODOS LOS DATOS QUE CONTENGAN?</b></p>
            </div>
            <div class="modal-footer">

             <div class="btn-group pull-left">

               <form action="eliminar_usuario">

                 {{! $iduser = Auth::user()->email }}

                 <form action="EliminarController.php" method="post">
                  <input style="color: black" type="hidden" name="data" value="{{ $iduser }}">

                 <button  type="submit" class="btn btn-default warning" >ACEPTAR</button>
                </form>

              </form>


            </div>

            <div class="btn-group pull-right">

              <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
            </div>

          </div>
        </div>

      </div>
    </div>
    <!-- FIN BANNER DELETE ACCOUNT -->

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

  .body{
    background: url('/images/fondo_body.jpg')fixed;
    padding: 0;
    margin: 0;
    font-family: arial;
  }


  #resaltar div:hover {
    background: #00a651;
    color: #ffffff;
  }

  a:hover span {
    transform: rotateY(360deg);
    -webkit-transform: rotateY(360deg);
    transition-duration: 1.5s;
    -webkit-transition-duration:1s;
  } 

  .warning:hover {cursor: url(/cursor_warning/warning.cur),auto;}

</style>

