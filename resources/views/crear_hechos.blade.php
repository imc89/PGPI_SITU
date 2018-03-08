{{!$logins = DB::table('users')->select('logins')->where('name', Auth::user()->name)->first()->logins }}
{{! $logins++ }}
{{! DB::table('users')
->where('name', Auth::user()->name)
->update(['logins' => $logins ])}}

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



	@if(session('message'))
	<div align="center" class='alert alert-success'>
		{{ session('message') }}
	</div>
	@endif




	<div align="center" class="body">
		<div  style="width: 780px;background: #B7C2D2; border-radius: 10px">

			<div align="center">
				<br><br>
				<h2>CREACIÓN DE HECHOS</h2>
			</div>
			<div class="container">

				<div class="row" align="left">
					<div class="col-xs-12" id="demoContainer">

						<form action="nuevo_hecho" class="form-horizontal fv-form fv-form-bootstrap">

							<br>


							<div class="form-group" required><!-- ETIQUETAS -->
								<label class="col-xs-7">Etiquetas: </label>
								<div class="col-xs-8" >
									{{! $etiquetas = DB::table('tags')->get() }}
									<select id="hecho" class="form-control" name="etiqueta" required>
										@foreach($etiquetas as $tag)
										<option> {{ $tag->name }} </option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-xs-7">Título del hecho: </label>
								<div class="col-xs-8">
									<input type="text" class="form-control" name="titulo" placeholder="Nombre" required/>
								</div>
							</div>

							<div class="form-group" style="width: 780px;">
								<label class="col-xs-7">Fecha del hecho: </label>
								<div class="col-xs-8">
									<input type="date" class="form-control" name="fecha" required>
								</div>
							</div>


							<!--  -->
							<!--  -->
							<div class="form-group" required>
								<label class="col-xs-7">Años de carrera: </label>
								<div class="col-xs-8">
									<div class="radio" style="float:left;">
										<label>
											<input type="checkbox" class="form-check-input"  id="4">
											Carrera de 4 años
										</label>
									</div>

									<div class="radio" style="float:left;">&nbsp;&nbsp;
										<label>
											<input type="checkbox" class="form-check-input"  id="6">
											Carrera de 6 años
										</label>
									</div>
								</div>
							</div>

							<div class="form-group" style='display:none' id="4cursos">
								<div>
									<div style="width: 780px;" class="alert alert-warning" align="center" >
										<strong>Warning!</strong> 
										Si te has confundido de opción no marques curso y deselecciona la casilla de años de carrera.
										<p>
										</div>
										<label >CARRERA DE 4 AÑOS :</label>
									</div>
									<div class="col-xs-8" id="curso4">
										<div class="radio">
											<label><input type="radio" class="form-check-input" name="curso" value="1">
											1º CURSO</label>
										</div>
										<div class="radio">
											<label><input type="radio" class="form-check-input" name="curso" value="2">
											2º CURSO</label>
										</div>
										<div class="radio">
											<label><input type="radio" class="form-check-input" name="curso" value="3">
											3º CURSO</label>
										</div>
										<div class="radio">
											<label><input type="radio" class="form-check-input" name="curso" value="4">
											4º CURSO</label>
										</div>
									</div>
									<br><br>
								</div>
								<div class="form-group" style='display:none' id="6cursos">
									<div>
										<div style="width: 780px;" class="alert alert-warning" align="center" >
											<strong>Warning!</strong> 
											Si te has confundido de opción no marques curso y deselecciona la casilla de años de carrera.
											<p>
											</div>
											<label >CARRERA DE 6 AÑOS :</label>
										</div>
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
										<br><br>
									</div>
									<!--  -->
									<!--  -->
									<!--  -->
									<!--  -->			
									<div class="form-group" id="recuerdos" style="display: none">
										<label class="col-xs-7">Tipo de recuerdo: </label>
										<div class="col-xs-8">
											<select id="tipo_recuerdo">
												<option>-</option>
												<option>Foto</option>
												<option>Video</option>
												<option>Encuentro</option>
											</select>
										</div>
									</div>




									<div class="form-group" id="contenido" style="display: none ">
										<label class="col-xs-7">Contenido del hecho: </label>
										<div class="col-xs-8">
											<textarea name="contenido" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Contenido del hecho..." style="max-width: 750px;min-width: 750px;min-height: 50px;" ></textarea>
										</div>
									</div>


									<div id="foto" class="form-group" style="display: none;">
										<label class="col-xs-7">Foto: </label>
										<div class="col-xs-8">
											<input type="file" name="foto" id="profile-img" accept="image/*">
											<br>
											<div style="border-style: dashed; border-width: 4px;width:158px;">
												<img src="" id="profile-img-tag" width="150px"  />
											</div>
										</div>
									</div>


									<div id="video" class="form-group" style="display: none ;">
										<label class="col-xs-7">Vídeo: </label>
										<div class="col-xs-8">
											<input type="text" name="video" class="form-control" id="videos" placeholder="Video URL" />
											<span id="videoOK"></span>
										</div>
										<div style="width: 780px;" class="alert alert-warning" align="center" >
											<strong>Warning!</strong> 
											Soporta enlaces de Youtube, Vimeo, Dailymotion, Twitter y Facebook.
										</div>
									</div>
									<!-- EJEMPLOS DE ENLACES
									https://www.facebook.com/facebook/videos/10157067236811729/
									https://twitter.com/PokemonGoApp/status/959610651206287360
									https://www.youtube.com/watch?v=lVifa7QSQDY&t=467s
									https://vimeo.com/258885497 -->

									<div id="encuentro" class="form-group" style="display: none;">
										<label class="col-xs-7">Encuentro: </label>
										<div class="col-xs-8">
											<input type="text" class="form-control" name="encuentro" placeholder="Encuentro" />
										</div>
									</div>

									<div class="form-group" required>
										<label class="col-xs-7 "><span class="glyphicon glyphicon-plus"></span> Opciones: </label>
										<div class="col-xs-8">
											<div class="radio" style="float:left;">
												<label>
													<input type="checkbox" class="form-check-input" id="anexo">
													Anexo
												</label>
											</div>
										</div>
									</div>

									<div id="anexon" class="form-group" style="display: none;">
										<label class="col-xs-7">Documento Anexo: </label>
										<div class="col-xs-8">
											<input type="file" name="anexo">
											<br>
											
										</div>
									</div>
									<!-- DEBERÁ APARECER UN INPUT DE TIPO FILE -->

									<div class="form-group" id="proposito" style="display: none" required>
										<label class="col-xs-7">Propósito del hecho: </label>
										<div class="col-xs-8">
											<textarea name="proposito" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="El propósito de este hecho es..." style="max-width: 750px;min-width: 750px;min-height: 50px;" ></textarea>
										</div>
									</div>

									<!--  -->
									<!--  -->
									<!--  -->
									<!--  -->
									<!-- <div class="form-group">
										<label class="col-xs-7">Keywords: </label>
										<div class="col-xs-8">
											<input type="text" class="form-control" name="" placeholder="Keywords (;)" required/>
										</div>
									</div> -->

									<div class="col-xs-8" style="background: #3386E2;color:white;border-radius: 10px; width: 160px; height: 130px; margin-right: 50%;">
										<label class="col-xs-7">Autorización: </label>
										<br>
										<div class="radio">

											<img src="/images/lock.png" id="lock1">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="autorizacion" type="radio"  value="1">
											<label>Nivel 1</label>

										</div>
										<div class="radio">

											<img src="/images/lock.png" id="lock2">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="autorizacion" type="radio" value="2">
											<label>Nivel 2</label>

										</div>
										<div class="radio">

											<img src="/images/lock.png" id="lock3">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="autorizacion" type="radio"  value="3">
											<label>Nivel 3</label>

										</div>
									</div>
									<br><br><br><br>
									<br><br><br>


									<div class="form-group">
										<div>
											<button style="width: 780px; align-content: center" type="submit" class="btn btn-primary" name="signup" value="Sign up">CREAR NUEVO HECHO</button>
										</div>
									</div>
								</form>
								<!--  -->
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


						<!-- SI EL SELECT ES RECUERDO(FOTO,VIDEO,ENCUENTRO) SE ABREN NUEVAS POSIBILIDADES -->
						<script type="text/javascript">
							$(function () {
								$("#hecho").change(function() {
									var val = $(this).val();
									if(val === "Recuerdos") {
										$("#recuerdos").show();
										$("#proposito").show();
									}
									else if(val !==  "Recuerdos") {
										$("#recuerdos").hide();
									}
								});
							});
							// EN CASO DE QUE NO SEA RECUERDO
							$(function () {
								$("#hecho").change(function() {
									var val = $(this).val();
									if(val !== "Recuerdos") {
										$("#contenido").show();
										$("#proposito").show();
										$("#foto").hide();
										$("#video").hide();
										$("#encuentro").hide(); 
									}
									else if(val ===  "Recuerdos") {
										$("#contenido").hide();
									}
								});
							});
							// DIFERENTES OPCIONES DE RECUERDO
							$(function () {
								$("#tipo_recuerdo").change(function() {
									var val = $(this).val();
									if(val === "Foto") {
										$("#foto").show();
									}
									else if(val !==  "Foto") {
										$("#foto").hide();
									}
								});
							});
							$(function () {
								$("#tipo_recuerdo").change(function() {
									var val = $(this).val();
									if(val === "Video") {
										$("#video").show();
									}
									else if(val !==  "Video") {
										$("#video").hide();
									}
								});
							});
							$(function () {
								$("#tipo_recuerdo").change(function() {
									var val = $(this).val();
									if(val === "Encuentro") {
										$("#encuentro").show();
									}
									else if(val !==  "Encuentro") {
										$("#encuentro").hide();
									}
								});
							});

							$("#anexo").click(function() {
								if($(this).is(":checked")) {
									$("#anexon").show();
								} else {
									$("#anexon").hide();
								}
							});
						</script>

						<!-- MOSTRAR IMAGEN SI SE ELIGE FOTO -->
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

						<!-- SE BLOQUEAN LOS CURSOS  NO SELECCIONADOS PARA DESBLOQUEAR PULSAR FUERA -->
						<script type="text/javascript">
							$("#4").click(function() {
								if($(this).is(":checked")) {
									$("#4cursos").show();
									$('#6').attr( 'disabled', true); 
								} else {
									$("#4cursos").hide();
									$('#6').attr( 'disabled', false); 
								}
							});

							$("#6").click(function() {
								if($(this).is(":checked")) {
									$("#6cursos").show();
									$('#4').attr( 'disabled', true); 
								} else {
									$("#6cursos").hide();
									$('#4').attr( 'disabled', false); 
								}
							});
						</script>


						<!--VIDEOS DAILYMOTION, VIMEO Y YOUTUBE VERIFICACIÓN  -->
						<script type="text/javascript">
							document.getElementById('videos').addEventListener('input', function() {
								campo = event.target;
								valido = document.getElementById('videoOK');
								emailRegex = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$|^(?:https?:\/\/)?(?:www\.)?dailymotion.com\/(video|hub)+(\/([^_]+))?[^#]*(‪#‎video‬=([^_&]+))?$|^(?:https?:\/\/)?(?:www\.)?vimeo.com\/([0-9]+)$/;

											    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
											    if (emailRegex.test(campo.value)) {
											    	valido.innerHTML = "<span style=\"color:green;font-weight:bold\">" + "Vídeo válido" + "</span>"
											    } else {
											    	valido.innerHTML = "<span style=\"color:red;font-weight:bold\">" + "Vídeo inválido" + "</span>"
											    }
											});

							document.getElementById('videos').addEventListener('input', function() {
								campo = event.target;
								valido = document.getElementById('videoOK');
								emailRegex = /^http(?:s?):\/\/(?:www\.|web\.|m\.)?facebook\.com\/([A-z0-9\.]+)\/videos(?:\/[0-9A-z].+)?\/(\d+)(?:.+)?$/;

											    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
											    if (emailRegex.test(campo.value)) {
											    	valido.innerHTML = "<span style=\"color:green;font-weight:bold\">" + "Vídeo válido" + "</span>"
											    } else {
											    	valido.innerHTML = "<span style=\"color:red;font-weight:bold\">" + "Vídeo inválido" + "</span>"
											    }
											});

							document.getElementById('videos').addEventListener('input', function() {
								campo = event.target;
								valido = document.getElementById('videoOK');
								emailRegex = /http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/;

											    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
											    if (emailRegex.test(campo.value)) {
											    	valido.innerHTML = "<span style=\"color:green;font-weight:bold\">" + "Vídeo válido" + "</span>"
											    } else {
											    	valido.innerHTML = "<span style=\"color:red;font-weight:bold\">" + "Vídeo inválido" + "</span>"
											    }
											});
										</script>

										<!-- LOCK DE AUTORIZACIÓN -->
										<script>
											$(document).ready(function() {
												$('input[name="autorizacion"]:radio').click(function(){
													switch($(this).val()) {
														case "proteccion1":
														$("#lock1").attr("src","/images/unlock.png");
														$("#lock2").attr("src","/images/lock.png");
														$("#lock3").attr("src","/images/lock.png");
														break;
														case "proteccion2":
														$("#lock1").attr("src","/images/lock.png");
														$("#lock2").attr("src","/images/unlock.png");
														$("#lock3").attr("src","/images/lock.png");
														break;
														case "proteccion3":
														$("#lock1").attr("src","/images/lock.png");
														$("#lock2").attr("src","/images/lock.png");
														$("#lock3").attr("src","/images/unlock.png");
														break;
													}
												});
											});
										</script>


										<script>
											function myFunction() {
												var x = document.getElementById("myTopnav");
												if (x.className === "topnav") {
													x.className += " responsive";
												} else {
													x.className = "topnav";
												}
											}


// IMPIDE PULSAR ENTER PARA ENVIAR FORMULARIO
$(document).on("keypress", "input", function (e) {
	var code = e.keyCode || e.which;
	if (code == 13) {
		e.preventDefault();
		return false;
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

