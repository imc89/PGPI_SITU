
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
	$hechoskey = DB::table('hechos')
	->where('alumno_id','=', $idalu)
	->join('alumno','alumno.id','=','hechos.alumno_id')
	->select('*')
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

{{! $pathecho = public_path().'/images/icons/hecho.png' }}
{{! $type5 = pathinfo($pathecho, PATHINFO_EXTENSION) }}
{{! $data5 = file_get_contents($pathecho) }}
{{! $base5 = 'data:image/' . $type5 . ';base64,' . base64_encode($data5)  }}


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
	<ul id="time-line">



		@foreach($hechoskey as $k)

		{{! $array = explode( ',', $k->keywords )}}

		@foreach($array as $ar)



		@if( $ar === 'CV')

	


		
		

		
		<div id="hechos" style="word-wrap: break-word;background: red background: #93A3B2; border-radius: 10px; width: 500px;color: white;text-align: left; padding: 10px 10px 10px 10px;box-shadow: 0px 5px 10px #444 inset;" align="center"  >
			<p>
				A FECHA DE : {{ $k->fecha }}
				@if($k->etiqueta !== NULL)
				<br><b>Tipo:</b> {{ $k->etiqueta }} <br>
				@endif

				@if($k->titulo !== NULL)
				<b>Título:</b>  {{ $k->titulo }} <br>
				@endif

				@if($k->curso !== NULL)
				<b>Curso:</b>  {{ $k->curso }}º <br>
				@endif

				@if($k->contenido !== NULL)
				<b>Contenido:</b> {{ $k->contenido }} <br>
				@endif


				@if($k->video !== NULL)
				<b>URL Video:</b> <b><a href="{{ URL::asset($k->video) }}"  target="_blank"> {{ $k->video }} </a></b> <br>
				@endif


				@if($k->encuentro !== NULL)
				<b>Encuentro:</b> {{ $k->encuentro }}  <br>
				@endif


				@if($k->foto !== NULL)
				<b>FOTO:</b> <img id="foto" src="{{ URL::asset('/images/fotos/'.$k->foto) }}" style="width: 300px;"/> <br>
				@endif
				@if($k->anexo !== NULL)
				<b>Documento Anexo:</b> <b><a href="{{ URL::asset('/images/anexos/'.$k->anexo) }}"  target="_blank"> {{ $k->anexo }} </a></b> <br>
				@endif
				@if($k->proposito !== NULL)
				<b>Propósito:</b>  {{ $k->proposito }} <br>
				@endif

				@if($k->keywords !== NULL)
				{{! $array = explode( ',', $k->keywords )}}
				<b>Keywords:</b> 
				@foreach ($array as $item) 
				<b><button class="btn btn-primary" disabled style="border-radius: 3px ;cursor: default ; padding: 2px 2px 2px 2px">{{$item}}</button></b>
				@endforeach 
				<br>
				@endif

				@if($k->autorizacion !== NULL)
				<b>Autorización:</b>  {{ $k->autorizacion }} <br>
				@endif

			</p>
		</div>
		<br>
		@endif

		@endforeach
		@endforeach

	</ul>
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
