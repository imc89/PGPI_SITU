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
  <a href="#">
    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> INVITAR 
  </a>
  <a href="#">
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

<div class="body">
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
<div align="center" class="body">
  <div  style="width: 400px;height: 350px; background: #B7C2D2; border-radius: 10px">

    <div align="left">
     <br>
     <label style="width: 400px" class="col-xs-7" onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
      Nombre completo: 
      <tr>
        <th scope="row"></th>
        @foreach($nombre_alumno as $u)
        <tr>
          <td> {{ $u->nombre }} </td>
          @endforeach
        </tr>
      </label>

      <label style="width: 400px" class="col-xs-7" onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
        Apellidos: 
        <tr>
          <th scope="row"></th>
          @foreach($apellidos_alumno as $u)
          <tr>
            <td> {{ $u->apellidos }} </td>
            @endforeach
          </tr>
        </label>


        <label style="width: 400px" class="col-xs-7" onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
          DNI: 
          <tr>
            <th scope="row"></th>
            @foreach($dni_alumno as $u)
            <tr>
              <td> {{ $u->dni }} </td>
              @endforeach
            </tr>
          </label>

          <label style="width: 400px" class="col-xs-7" onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
            EMAIL: 
            <tr>
              <th scope="row"></th>
              @foreach($email_alumno as $u)
              <tr>
                <td> {{ $u->email }} </td>
                @endforeach
              </tr>
            </label>

            <label style="width: 400px" class="col-xs-7" onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
              DIRECCION: 
              <tr>
                <th scope="row"></th>
                @foreach($direccion_alumno as $u)
                <tr>
                  <td> {{ $u->direccion }} </td>
                  @endforeach
                </tr>
              </label>


              <label style="width: 400px" class="col-xs-7" onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
                CARRERA: 
                <tr>
                  <th scope="row"></th>
                  @foreach($carrera_alumno as $u)
                  <tr>
                    <td> {{ $u->carrera }} </td>
                    @endforeach
                  </tr>
                </label>

                <label style="width: 400px" class="col-xs-7" onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
                  OPCIÓN_1: 
                  @foreach($dato1_alumno as $u)
                  <tr>
                    <td> {{ $u->dato_opcion1 }} </td>
                    @endforeach
                  </tr>

                  <th scope="row"></th>
                  @foreach($valor1_alumno as $u)
                  <tr>
                    <td> {{ $u->opcion1_valor }} </td>
                    @endforeach
                  </tr>
                </label>

                 <label style="width: 400px" class="col-xs-7" onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
                  OPCIÓN_2: 
                  @foreach($dato2_alumno as $u)
                  <tr>
                    <td> {{ $u->dato_opcion2 }} </td>
                    @endforeach
                  </tr>

                  <th scope="row"></th>
                  @foreach($valor2_alumno as $u)
                  <tr>
                    <td> {{ $u->opcion2_valor }} </td>
                    @endforeach
                  </tr>
                </label>

                 <label style="width: 400px" class="col-xs-7" onmouseover="style='background:#C3D1EB; border-radius:5px;width: 400px'" onmouseout="style='background:transparent;width: 400px'">
                  OPCIÓN_3: 
                  @foreach($dato3_alumno as $u)
                  <tr>
                    <td> {{ $u->dato_opcion3 }} </td>
                    @endforeach
                  </tr>

                  <th scope="row"></th>
                  @foreach($valor3_alumno as $u)
                  <tr>
                    <td> {{ $u->opcion3_valor }} </td>
                    @endforeach
                  </tr>
                </label>

              </div>


            </div>
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
      </style>

