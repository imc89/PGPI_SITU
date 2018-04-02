
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







@foreach($idalu as $u)

{{! $idalu= $u->id }} 

@endforeach
<!--  -->

{{!

	$hechos = DB::table('hechos')
	->where('alumno_id','=', $idalu)
	->join('alumno','alumno.id','=','hechos.alumno_id')
	->ORDERBY('fecha')
	->get()
}}

<body>
	<div align="center" style="background-color:#108AD2;">
		@foreach($hechos as $a)
		<div style="background:#303030;border-radius: 30px" align="center" id="div1">

			<div style="padding: 10px 10px 10px 10px" align="center" id="div2">


				<div > 
					<span>
						@if($a->etiqueta !== NULL)
						<span style="font-weight: bold ;color: white;"> Etiqueta: </span>
						<span style="color: white;">{{ $a->etiqueta }}</span>

						@endif
					</span>

					<span>
						@if($a->fecha !== NULL)
						<span style="font-weight: bold ;color: white;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						A fecha de: </span>
						<span style="color: white;">{{ $a->fecha }}</span>
						@endif
					</span>

				</div>

				<br>

				@if($a->titulo !== NULL)
				<br>
				<span style="font-weight: bold ;color: white;"> Título: </span>
				<span style="color: white;">{{ $a->titulo }}</span>
				<br>
				@endif

				@if($a->curso !== NULL)
				<br>
				<span style="font-weight: bold ;color: white;"> Curso académico: </span>
				<span style="color: white;">{{ $a->curso }}º</span>
				<br>

				@endif


				@if($a->contenido !== NULL)
				<br>
				<span style="font-weight: bold ;color: white;"> Descripción: </span>
				<span style="color: white;">{{ $a->contenido }}</span>
				<br>

				@endif

				@if($a->video !== NULL)
				<span style="font-weight: bold ;color: white;">URL Video:</span> 
				<b>
					<a href="{{ URL::asset($a->video) }}"  target="_blank" style="color: white"> {{ $a->video }} </a>
				</b>
				<br>
				@endif

				@if($a->encuentro !== NULL)
				<span style="font-weight: bold ;color: white;">Encuentro:</span>
				<span style="color: white;"> {{ $a->encuentro }}<span>
					<br>
					@endif

					@if($a->foto !== NULL)


					{{! $path = public_path().'/images/fotos/' . $a->foto }}
					{{! $type = pathinfo($path, PATHINFO_EXTENSION) }}
					{{! $data = file_get_contents($path) }}
					{{! $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data)  }}


					<div>
						<br><br><br>
						<span style="font-weight: bold ;color: white;vertical-align: middle;"> Foto: </span>
						<img id="foto" src="{{$base64}}" style="width: 300px"/> 
					</div>
					@endif

					@if($a->anexo !== NULL)
					<span style="font-weight: bold ;color: white;">Documento Anexo:</span> 
					<b><a href="{{ URL::asset('/images/anexos/'.$a->anexo) }}"  target="_blank" style="color: white"> {{ $a->anexo }} </a></b>
					<br>
					@endif

					@if($a->proposito !== NULL)
					<br>
					<span style="font-weight: bold ;color: white;"> Proposito: </span>
					<span style="color: white;">{{ $a->proposito }}</span>
					<br>
					@endif


					@if($a->keywords !== NULL)
					<br>
					<span style="font-weight: bold ;color: white;"> Keywords: </span>
					{{! $array = explode( ',', $a->keywords )}}
					@foreach ($array as $item) 
					<span style="color: white;">{{$item}}</span>
					@endforeach 
					<br>
					@endif



					@if($a->autorizacion !== NULL)
					<br>
					{{! $pathl = public_path().'/images/icons/lockh.png' }}
					{{! $type2 = pathinfo($pathl, PATHINFO_EXTENSION) }}
					{{! $data2 = file_get_contents($pathl) }}
					{{! $lock = 'data:image/' . $type2 . ';base64,' . base64_encode($data2)  }}

					<b><img style="width: 3%" src="{{$lock}}");"></b>
					<span style="color: white;">  {{ $a->autorizacion }}</span>
					<br>
					@endif

				</div>
			</div>
			@endforeach
		</div>
	</body>


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

	.button {
		margin:0 auto;
		display:block;
	}
	#div1
	{
		width:100%;
		clear:both;
	}
	#div2
	{
		width:50%;
		margin:10px auto;
		text-align: center;
	}
	body{
		background: #108AD2;

	}

</style>
