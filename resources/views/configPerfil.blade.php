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

<!-- NOTA IMPORTANTE-> INSERT .... WHERE USER:NAME == AUTH:USER-->
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

 <div style="margin: 0 auto; padding-top: 64px; " align="center">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <img src="/images/avatar/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        <h2>{{ $user->name }}'s Profile</h2>
        <form enctype="multipart/form-data" action="configPerfil" method="POST">
          <label>Update Profile Image</label>
          <input type="file" name="avatar">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <br>
          <input type="submit" class="btn btn-sm btn-primary" value="CAMBIAR IMAGEN DE PERFIL" style="width: 400px">
        </form>
      </div>
    </div>
  </div>
</div>

<br>
<br>

@if(session('message'))
<div align="center" class='alert alert-success'>
  {{ session('message') }}
</div>
@endif

<div class="alert alert-warning" align="center">
  <strong>Warning!</strong> Los formatos admitidos son JPG, PNG, GIF
  <p>
    <strong>Warning!</strong> Para que la imagen se vea correctamente esta debe ser cuadrada.
  </div>

</div>


<div align="center" class="body">
  <div  style="width: 780px;height: 850px; background: #B7C2D2; border-radius: 10px">

    <div class="container">
      <div class="row" align="left">
        <div class="col-xs-12" id="demoContainer">

          <form action="actualizarPerfil" class="form-horizontal fv-form fv-form-bootstrap">

            <br>
            <div class="form-group">
              <label class="col-xs-7">Nombre completo: </label>
              <div class="col-xs-8">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" />
              </div>

              <div class="col-xs-8">
                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-xs-7">DNI: </label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="dni" name="dni" />
                <span id="dniOK"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-xs-7">Email: </label>
              <div class="col-xs-8">
                <input type="email" class="form-control" id="email" name="email" />
                <span id="emailOK"></span>
              </div>
            </div>

          <div class="form-group">
            <label class="col-xs-7 ">Dirección: </label>
            <div class="col-xs-8">
              <input type="text" class="form-control" name="direccion" />
            </div>
          </div>


          <div class="form-group">
            <label class="col-xs-7 ">Carrera: </label>
            <div class="col-xs-8">
              <select class="form-control" name="carrera">
                <option>Administración y Dirección de Empresas</option>
                <option>Marketing</option>
                <option>Derecho</option>
                <option>Criminología</option>
                <option>Gastronomía</option>
                <option>Business Analytics</option>
                <option>Educación Infantil</option>
                <option>Educación Primaria</option>
                <option>Ciencias de la Actividad Física y del Deporte</option>
                <option>Medicina</option>
                <option>Enfermería</option>
                <option>Fisioterapia</option>
                <option>Psicología</option>
                <option>Biomedicina</option>
                <option>Biotecnología</option>
                <option>Farmacia</option>
                <option>Arquitectura</option>
                <option>Ingeniería Informática</option>
                <option>Ingeniería Industrial</option>
                <option>Periodismo</option>
                <option>Relaciones Internacionales</option>
                <option>Diseño</option>
                <option>Publicidad</option>
                <option>Bellas Artes</option>
                <option>Creación y Narración de Videojuegos</option>
                <option>Filosofía, Política y Economía</option>
                <option>Humanidades</option>

              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-xs-7 "><span class="glyphicon glyphicon-plus"></span> Opciones: </label>
            <div class="col-xs-8">

             <div class="form-check">
              <input class="form-check-input" type="checkbox" id="Linput1">
              <label class="form-check-label">
                <input type="text" class="form-control" id="input1" name='dato_opcion1'/>
              </label>
              <div class="form-group" id="sinput1">
                <input  class="col-xs-7 inputLikeLabel" id="Pinput1" disabled="disabled" >                  
                </input>
                <div class="col-xs-8">
                  <input type="text" class="form-control" name='opcion1_valor' />
                </div>
              </div>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="Linput2">
              <label class="form-check-label">
                <input type="text" class="form-control" id="input2" name='dato_opcion2'/>
              </label>
              <div class="form-group" id="sinput2">
                <input  class="col-xs-7 inputLikeLabel" id="Pinput2" disabled="disabled" ></input>
                <div class="col-xs-8">
                  <input type="text" class="form-control" name='opcion2_valor' />
                </div>
              </div>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="Linput3">
              <label class="form-check-label">
                <input type="text" class="form-control" id="input3" name='dato_opcion3'/>
              </label>
              <div class="form-group" id="sinput3">
                <input  class="col-xs-7 inputLikeLabel" id="Pinput3" disabled="disabled" ></input>
                <div class="col-xs-8">
                  <input type="text" class="form-control" name='opcion3_valor' />
                </div>
              </div>
            </div>



            <div class="form-group">
              <div>
                <button style="width: 780px; align-content: center" type="submit" class="btn btn-primary" name="signup" value="Sign up">ACTUALIZAR INFORMACIÓN</button>
              </div>
            </div>
          </form>
          <!--  -->
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<br><br>



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

// COPIAR VALOR DE BOTONES OPCIONES EN LAVELS
$('#input1').change(function() {
  $('#Pinput1').val($(this).val());
});
$('#input2').change(function() {
  $('#Pinput2').val($(this).val());
});
$('#input3').change(function() {
  $('#Pinput3').val($(this).val());
});

// IMPIDE PULSAR ENTER PARA ENVIAR FORMULARIO
$(document).on("keypress", "input", function (e) {
  var code = e.keyCode || e.which;
  if (code == 13) {
    e.preventDefault();
    return false;
  }
});

// AUTOMATA EMAIL VERIFICACION
document.getElementById('email').addEventListener('input', function() {
  campo = event.target;
  valido = document.getElementById('emailOK');

  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerHTML = "<span style=\"color:green;font-weight:bold\">" + "Email válido" + "</span>"
    } else {
      valido.innerHTML = "<span style=\"color:red;font-weight:bold\">" + "Email inválido" + "</span>"
    }
  });
</script>

<!-- AUTOMATA DNI VERIFICACION -->
<script>
  document.getElementById('dni').addEventListener('input', function() {
   var numero
   var letra
   var letr
   dni = event.target;
   dniValido = document.getElementById('dniOK');

   dniRegex = /^\d{8}[a-zA-Z]$/;

   if(dniRegex.test(dni.value) == true){
     numero = dni.value.substr(0,dni.value.length-1);
     letr = dni.value.substr(dni.value.length-1,1);
     numero = numero % 23;
     letra='TRWAGMYFPDXBNJZSQVHLCKET';
     letra=letra.substring(numero,numero+1);
     if (letra!=letr.toUpperCase()) {
       dniValido.innerHTML = "<span style=\"color:yellow;font-weight:bold\">" + "Dni erroneo, la letra del NIF no se corresponde" + "</span>";

     }else{
      dniValido.innerHTML = "<span style=\"color:green;font-weight:bold\">" + "Dni correcto" + "</span>";
    }
  }else{
    dniValido.innerHTML = "<span style=\"color:red;font-weight:bold\">" + "Dni erroneo, formato no válido" + "</span>";

  }

});
  

</script>



<style type="text/css">

.body{
  background: url('/images/fondo_body.jpg')fixed;
}

#sinput1 {
  display:none;
}
#Linput1:checked ~ #sinput1 {
  display:block;
}

#sinput2 {
  display:none;
}
#Linput2:checked ~ #sinput2 {
  display:block;
}

#sinput3 {
  display:none;
}
#Linput3:checked ~ #sinput3 {
  display:block;
}

.inputLikeLabel {
  background:rgba(0,0,0,0);
  border:none;
  font-weight: bold;
}

</style>

