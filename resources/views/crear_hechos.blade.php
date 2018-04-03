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



	<!--  LINK KEYWORD TAGS BOOTSTRAP JQUERY -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js">
	</script>

</head>

<!-- NOTA IMPORTANTE-> INSERT .... WHERE USER:NAME == AUTH:USER-->
<body>
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

<!-- CARRUSEL DE IMAGENES E INFORMACIÓN (POR PONER ALGO) -->


<div class="body">

	<br>
	<br>
	<br>

	@if(session('message'))
	<div align="center" class='alert alert-success'>
		{{ session('message') }}
	</div>
	@endif

	<div align="center" class="body">
		<div  id="hechos" style="width: 780px;background: #B7C2D2; border-radius: 10px">

			<div align="center">
				<br><br>
				<h2>CREACIÓN DE HECHOS</h2>
			</div>
			<div class="container">

				<div class="row" align="left">
					<div class="col-xs-12" id="demoContainer">
						<!-- AÑADIDO id="programmer_form" -->
						<form  method="POST" id="programmer_form" enctype="multipart/form-data" action="nuevo_hecho" class="form-horizontal fv-form fv-form-bootstrap" onsubmit="return validarForm();">

							<br>


							<div class="form-group" required><!-- ETIQUETAS -->
								<label class="col-xs-7">Etiquetas: </label>
								<div class="col-xs-8" >
									{{! $etiquetas = DB::table('tags')->get() }}
									<select style="font-weight: bold" id="hecho" class="form-control" name="etiqueta" required>
										<option>-</option>
										@foreach($etiquetas as $tag)
										<option> {{ $tag->name }} </option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-xs-7">Título del hecho: </label>
								<div class="col-xs-8">
									<input style="font-weight: bold" type="text" class="form-control" name="titulo" placeholder="Nombre" required/>
								</div>
							</div>

							<div id="hechos" class="form-group" style="width: 780px;">
								<label class="col-xs-7">Fecha del hecho: </label>
								<div class="col-xs-8">
									<input style="font-weight: bold" type="date" class="form-control" name="fecha" id="fecha" required>
								</div>
							</div>


							<div class="form-group">
								<label class="col-xs-7">Añade tus Keywords: </label>
								<div class="col-xs-8" style="font-weight: bold">
									<input  autocomplete="off" type="text" name="keywords" id="keywords" placeholder="Keywords" class="form-control "/>
								</div>
							</div>

							<!--  -->
							<!--  -->
							<div class="form-group" required>
								<label class="col-xs-7">Años de carrera: </label>
								<div class="col-xs-8">
									<div class="radio" style="float:left;">
										<label style="font-weight: bold">
											<input type="checkbox" class="form-check-input"  id="4">
											Carrera de 4 años
										</label>
									</div>

									<div class="radio" style="float:left;">
										<label style="font-weight: bold">
											<input type="checkbox" class="form-check-input"  id="6">
											Carrera de 6 años
										</label>
									</div>
								</div>
							</div>

							<div class="form-group" style='display:none' id="4cursos">
								<div>
									<div id="hechos" style="width: 780px;" class="alert alert-warning" align="center" >
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
											<select style="font-weight: bold" id="tipo_recuerdo">
												<option>-</option>
												<option>Foto</option>
												<option>Video</option>
												<option>Encuentro</option>
											</select>
										</div>
									</div>




									<div class="form-group" id="contenido" style="display: none ">
										<label style="font-weight: bold" class="col-xs-7">Contenido del hecho: </label>
										<div class="col-xs-8">
											<textarea  name="contenido" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Contenido del hecho..." style="max-width: 750px;min-width: 750px;min-height: 50px;font-weight: bold" ></textarea>
										</div>
									</div>


									<div id="foto" class="form-group" style="display: none;">
										<label class="col-xs-7">Foto: </label>
										<div class="col-xs-8">
											<input type="file" name="foto" id="profile-img" accept="image/*">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<br>
											<div style="border-style: dashed; border-width: 4px;width:158px;">
												<img src="" id="profile-img-tag" width="150px"  />
											</div>
										</div>
									</div>


									<div id="video" class="form-group" style="display: none ;">
										<label class="col-xs-7">Vídeo: </label>
										<div class="col-xs-8">
											<input style="font-weight: bold" type="text" name="video" class="form-control" id="videos" placeholder="Video URL" />
											<span id="videoOK"></span>
										</div>
										<div id="hechosw" style="width: 780px;font-weight: bold" class="alert alert-warning" align="center" >
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
										<label style="font-weight: bold" class="col-xs-7">Encuentro: </label>
										<div class="col-xs-8">
											<input style="font-weight: bold" type="text" class="form-control" name="encuentro" placeholder="Encuentro" />
										</div>
									</div>

									<div class="form-group" required>
										<label class="col-xs-7 "><span class="glyphicon glyphicon-plus"></span> Opciones: </label>
										<div class="col-xs-8">
											<div class="radio" style="float:left;">
												<label style="font-weight: bold">
													<input type="checkbox" class="form-check-input" id="anexo">
													Anexo <span class="glyphicon glyphicon-open-file"/>
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
										<label style="font-weight: bold" class="col-xs-7">Propósito del hecho: </label>
										<div class="col-xs-8">
											<textarea name="proposito" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="El propósito de este hecho es..." style="max-width: 750px;min-width: 750px;min-height: 50px;font-weight: bold" ></textarea>
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

											<img src="{{ asset('images/icons/lock.png')}}");" id="lock1">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="autorizacion" type="radio"  value="1" required>
											<label style="font-weight: bold">Nivel 1</label>

										</div>
										<div class="radio">

											<img src="{{ asset('images/icons/lock.png')}}");" id="lock2">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="autorizacion" type="radio" value="2">
											<label style="font-weight: bold">Nivel 2</label>

										</div>
										<div class="radio">

											<img src="{{ asset('images/icons/lock.png')}}");" id="lock3">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input name="autorizacion" type="radio"  value="3">
											<label style="font-weight: bold">Nivel 3</label>

										</div>
									</div>
									<br><br><br><br>
									<br><br><br>


									<div class="form-group">
										<div id="bhechos" >
											<input id="bhechos" type="submit" name="submit" id="submit" class="btn btn-primary"  value="CREAR NUEVO HECHO" style="width: 780px; align-content: center" onClick="return empty()">
										</div>
									</div>
								</form>
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
								videoRegex = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$|^(?:https?:\/\/)?(?:www\.)?dailymotion.com\/(video|hub)+(\/([^_]+))?[^#]*(‪#‎video‬=([^_&]+))?$|^(?:https?:\/\/)?(?:www\.)?vimeo.com\/([0-9]+)$/;

								videoRegex2 = /^http(?:s?):\/\/(?:www\.|web\.|m\.)?facebook\.com\/([A-z0-9\.]+)\/videos(?:\/[0-9A-z].+)?\/(\d+)(?:.+)?$/;

								videoRegex3 = /http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/;
											    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
											    if (videoRegex.test(campo.value) || videoRegex2.test(campo.value) || videoRegex3.test(campo.value))  {
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
														case "1":
														$("#lock1").attr("src","{{ asset('images/icons/unlock.png')}}");
														$("#lock2").attr("src","{{ asset('images/icons/lock.png') }}");
														$("#lock3").attr("src","{{ asset('images/icons/lock.png') }}");
														break;
														case "2":
														$("#lock1").attr("src","{{ asset('images/icons/lock.png') }}");
														$("#lock2").attr("src","{{ asset('images/icons/unlock.png')}}");
														$("#lock3").attr("src","{{ asset('images/icons/lock.png') }}");
														break;
														case "3":
														$("#lock1").attr("src","{{ asset('images/icons/lock.png') }}");
														$("#lock2").attr("src","{{ asset('images/icons/lock.png') }}");
														$("#lock3").attr("src","{{ asset('images/icons/unlock.png')}}");
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

<!-- ESTILO DE  LOS KEYWORDS Y SCRIPT-->
<style type="text/css">


div.token{
	background:  #4482B5 !important;
	background:  #4482B5 !important;
	font-weight: bold !important;
	color: white !important;}

	.close{
		margin-right: 0 !important;
		background:  #4482B5 !important;
		opacity:1 !important;
	}

	.close:hover{
		color:red !important;
		opacity:1 !important;
	}

	.ui-menu-divider{
		height: 20px !important;
		color: red !important;
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
		#hechosw{
			width:auto !important;
			padding-top: 60px !important;
		}
		#bhechos{
			width:auto !important;
			text-align: center !important;
		}
		#exampleFormControlTextarea1{
			max-width:auto !important;

			min-width:auto !important;
		}

		.myPosition{
			top:190% !important;
			width:auto !important;
		}

	}
</style>



<script>

	$(document).ready(function(){

		$('#keywords').tokenfield({
			autocomplete:{
				source:'{!!URL::route('autocomplete')!!}',
				delay:100
			},
			showAutocompleteOnFocus: true,
			allowDuplicates: false,
		});

	});

	
	if ( $('#fecha')[0].type != 'date' ) $('#fecha').datepicker();
	
</script>


<div id="dialog" style="display: none">
	<div id="hechos" class="modal-content">
		<div id="hechos" class="modal-header">

			<h4 class="modal-title" align="center">ETIQUETA INCORRECTA</h4>
		</div>
		<div class="modal-body" id="hechos" style="background-color: rgba(171, 184, 203, 0.70);border-radius: 30px ">
			<p style="font-weight: bold">Por favor etiquete correctamente el hecho para que pueda ser creado, la etiqueta debe ser distita de "-" .</p>
		</div>
	</div>
</div>



<script>
	function empty() {
		var x;
		x = document.getElementById("hecho").value;
		if (x == "-") {
			$( "#dialog" ).dialog({
				dialogClass: 'myPosition',
				resizable: false,
				height: "auto",
				width: "auto",
				modal: true,
				open: function(event, ui) {
					$(event.target).parent().css('position', 'absolute');
					$(event.target).parent().css('top', '80%');
					$(event.target).parent().focus();

				}
			});
			$( "#dialog" ).style.display = "block";
			return false;
		}
		
	}
</script>
<style type="text/css">
.myPosition {
	-moz-box-shadow:    inset 0 0 10px #000000;
	-webkit-box-shadow: inset 0 0 10px #000000;
	box-shadow:         inset 0 0 10px #000000;
	border-radius: 10px;
}
</style>
