
@foreach($datospdf as $u)

{{! $ids= $u->id }} 

@endforeach

{{! 
	$idalu = DB::table('alumno')
	->where('alumno.user_id','=', $ids)
	->select('alumno.id')
	->join('users','users.id','=','alumno.user_id')
	->get() 
}}




{{! 
	$avatar = DB::table('users')
	->where('users.id','=', $ids)
	->select('avatar')
	->join('alumno','alumno.user_id','=','users.id')
	->get() 


}}


@foreach($avatar as $u)

{{! $avatar= $u->avatar }} 

@endforeach

@foreach($idalu as $u)

{{! $idalu= $u->id }} 

@endforeach
<!--  -->

{{!
	$hechos = DB::table('hechos')
	->where('alumno_id','=', $idalu)
	->where ('keywords', 'LIKE', 'CV')
	->join('alumno','alumno.id','=','hechos.alumno_id')
	->get()
}}


<!--  -->

{{! $path = public_path().'/images/avatar/' . $avatar }}
{{! $type = pathinfo($path, PATHINFO_EXTENSION) }}
{{! $data = file_get_contents($path) }}
{{! $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data)  }}

{{! $pathemail = public_path().'/images/icons/email.png' }}
{{! $type2 = pathinfo($pathemail, PATHINFO_EXTENSION) }}
{{! $data2 = file_get_contents($pathemail) }}
{{! $base2 = 'data:image/' . $type2 . ';base64,' . base64_encode($data2)  }}

{{! $pathelocat = public_path().'/images/icons/location.png' }}
{{! $type3 = pathinfo($pathelocat, PATHINFO_EXTENSION) }}
{{! $data3 = file_get_contents($pathelocat) }}
{{! $base3 = 'data:image/' . $type3 . ';base64,' . base64_encode($data3)  }}

{{! $pathestudi = public_path().'/images/icons/estudios.png' }}
{{! $type4 = pathinfo($pathestudi, PATHINFO_EXTENSION) }}
{{! $data4 = file_get_contents($pathestudi) }}
{{! $base4 = 'data:image/' . $type4 . ';base64,' . base64_encode($data4)  }}


<div class="column_left" style="background-color:#108AD2;">
	<div align="center" style="margin-top: 20px">
		<img src="{{$base64}}" style="width:150px;height: 180px;border-radius: 50%;">
	</div>

	<h3 style="text-align: center;">
		
		@foreach($datospdf as $a)

		<span style="color: white;font-family: Palo seco">{{ ucfirst($a->nombre)}}</span>
		<br>
		<span style="color: white;font-family: Palo seco">{{ ucfirst($a->apellidos)}}</span>

		@endforeach
	</h3>

	<br>
	<hr style="color: white">
	<h3 style="text-align: center;color: white;font-family: Palo seco">
		CONTACTO
	</h3>
	<hr style="color: white">

	<h4>
		<div style="text-align: center;vertical-align: middle;">
			<span style="color: white;">		
				<img src="{{$base2}}" style="vertical-align: middle;width:30px;">		
				@foreach($datospdf as $a)
				{{ ucfirst($a->email)}}
			</span>
			@endforeach	
		</div>
	</h4>

	<h4>
		<div style="text-align: center;vertical-align: middle;">
			<span style="color: white;">		
				<img src="{{$base3}}" style="vertical-align: middle;width:30px;">		
				@foreach($datospdf as $a)
				{{ ucfirst($a->direccion)}}
			</span>
			@endforeach	
		</div>
	</h4>

	<br>
	<hr style="color: white">
	<h3 style="text-align: center;color: white;font-family: Palo seco">
		DATOS
	</h3>
	<hr style="color: white">

	<div style="text-align: center;vertical-align: middle;">
		<span style="color: white;">		
			<img src="{{$base4}}" style="vertical-align: middle;width:30px;">		
			@foreach($datospdf as $a)
			{{ ucfirst($a->carrera)}}
		</span>
		@endforeach	
	</div>

</div>



<div class="column_right" style="background-color:#FFFEFF;">

	<?php $contador = 0?>

	<h2 align="center">


		@foreach($hechos as $a)
		<?php $contador++; echo "#".$contador?>

		@if($a->titulo !== NULL)
		<span style="color: #108AD2;"> Titulo: </span>
		{{ $a->titulo }}
		@endif

		@if($a->etiqueta !== NULL)
		<br>
		<span style="color: #108AD2;"> Tipo de hecho: </span>
		{{ $a->etiqueta }}
		@endif

		@if($a->curso !== NULL)
		<br>
		<span style="color: #108AD2;"> Curso académico: </span>
		{{ $a->curso }}º
		@endif

		@if($a->fecha !== NULL)
		<br>
		<span style="color: #108AD2;"> A fecha de: </span>
		{{ $a->fecha }}
		@endif

		@if($a->contenido !== NULL)
		<br>
		<span style="color: #108AD2;"> Descripción: </span>
		{{ $a->contenido }}
		@endif

		@if($a->proposito !== NULL)
		<br>
		<span style="color: #108AD2;"> Proposito: </span>
		{{ $a->proposito }}
		@endif


		<hr style="color: #108AD2">
		@endforeach	

	</h2>


</div>






<style>

@page {
	margin: 0;
}
.pages {
	margin: .5in;
}
.first-page {
	margin: 0in;
	color: green;
	height: 100%;
	width: 100%;
	position:absolute;
	page-break-before: always;
}


* {
	box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column_left {
	float: left;
	width: 30%;
	height: 100%;
	position:fixed;
}
.column_right {
	float: left;
	width: 70%;
	height: 100%;
}



</style>
