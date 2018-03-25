 <!-- INICIO NAVEGADOR -->
  <div class="topnav navbar navbar-inverse  navbar-fixed-top" id="myTopnav">
   <a href="#" align="center" style="padding: 0 0 0 0 "> 
     <img width="50px" src="{{ asset('images/icono.jpg') }}" >
   </a>
   <a  data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About
  </a>
  <a data-toggle="modal" data-target="#AYUDA" onmouseover="style='cursor: help;'" onmouseout="style='cursor: default'">
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

        
          <a style="font-weight: bold; display: block" href="perfilAlumno" class="glyphicon glyphicon-user"> Perfil</a>

          <a style="font-weight: bold;" href="configPerfil" class="glyphicon glyphicon-cog">Configuración</a>


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
