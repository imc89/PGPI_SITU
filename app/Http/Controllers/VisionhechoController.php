<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class VisionhechoController extends Controller
{
	public function vision_hecho(Request $request)
	{


//COJO LOS DATOS DEL HECHO SELECCIONADO DE FORMA AISLADA
		$hecho = DB::table('hechos')->where('hechos.id', '=', $request->data)->select()->get();

//COJO LAS KEYWORDS DEL HECHO 

		$hecho_key = DB::table('hechos')->where('hechos.id', '=', $request->data)->select('keywords')->get();

		$titulo = DB::table('hechos')->where('hechos.id', '=', $request->data)->select('titulo')->get();

//COJO LA ID DEL USUARIO DUEÑO DE LOS HECHOS
		$alumno_id = DB::table('alumno')
		->where('users.id','=', Auth::user()->id)
		->join('users','users.id','=','user_id')
		->select('alumno.id') 
		->get();


		foreach ($hecho_key as $key ) {
//CREO UN ARRAY DONDE SEPARO EL STRING DE KEYWORDS
			$arrayk = explode( ',', $key->keywords );
		}
//ENTRO DENTRO DE LOS HECHOS DEL ALUMNO
		foreach($alumno_id as $aluid){
			$aluid->id; 

//PARA CADA KEYWORD DEL HECHO
			foreach($titulo as $t){


//SELECCIONO LOS TITULOS DE LOS HECHOS QUE TENGAN ALGUNA KEYWORD IGUAL

				$hechok = DB::table('hechos')
				->where('alumno_id','=', $aluid->id)
				->where('titulo','<>', $t->titulo )
				->Where(function ($query) use ($arrayk) {
					for ($i = 0; $i < count($arrayk); $i++){
						$key=trim($arrayk[$i]);
						$query->orwhere('keywords', 'LIKE',  '%'.$key.'%');
					}      
				})->get();
//EMPUJO AL ARRAY EL RESULTADO

			}
		}


		return view('hecho_aislado', compact('hecho','arrayk','alumno_id','hechok'));		

		// YA SE LO QUE PASA-> LA VARIABLE SE MACHACA EN CADA FOREACH 

	}


}
