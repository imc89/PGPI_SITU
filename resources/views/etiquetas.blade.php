{{! $etiquetas = DB::table('tags')->get() }}
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
   <a href="/admin" align="center" style="padding: 0 0 0 0 ">
     <img width="50px" src="{{ asset('images/icono.jpg') }}" >
   </a>
   <a  data-toggle="modal" data-target="#myModal">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About
  </a>
  <a href="mailpassword">
    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Dar Alta Usuario
  </a>
  <a href="log_admin_login">
    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Log Logins
  </a>
  <a href="etiquetas">
    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Etiquetas
  </a>
    <!-- BOTÓN DE LOGIN -->

    <ul  class="nav navbar-nav navbar-right" style="margin-right: 1%">
        <!-- Authentication Links -->
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="\passwords\reset">
                            <span aria-hidden="true"></span> Cambiar Pass
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
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
<!--
  @guest
        <a  href="{{ route('login') }}">Login</a>
  @else
    <span class="dropdown">
      <a href="#" class=" dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
            </form>
          </li>
        </ul>
        @endguest

            </ul>

            </span> -->


        <a href="javascript:void(0);" style="font-size:15px; background: #435E80;border-radius: 5px;
" class="icon" onclick="myFunction()">&#9776;</a>

</div>




<!-- FIN DE NAVEGADOR -->
<br>
<br>
<br>
<div class="container">
    <h1 class="mb-2 text-center">ETIQUETAS</h1>

    <tr><a class="btn btn-primary btn-sm" href="crear_etiquetas">NUEVA ETIQUETA</a></tr>
    <br>
    <br>
<table class="table table-striped table-dark">
  <?php $contador=0 ?>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre Etiqueta</th>
    </tr>
  </thead>
  <tbody>
     @foreach($etiquetas as $u)
    <tr>
      <th scope="row"><?php $contador++; echo $contador ?></th>
      <td> {{ $u->name }} </td>
  
    </tr>
    @endforeach
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
