<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class FiltrarhechosController extends Controller
{
    //

	public function filtrar_hechos(Request $request){


		echo "LA ETIQUETA ES : " . $request->etiqueta ;

		if ($request->etiqueta == "Todos los hechos") {

			$alumno_id = DB::table('alumno')
			->where('users.id','=', Auth::user()->id)
			->join('users','users.id','=','user_id')
			->select('alumno.id') 
			->get();

			foreach($alumno_id as $aluid)
				$aluid->id; 
			$hechos = DB::table('hechos')
			->where('alumno_id','=', $aluid->id)
			->get();

			return view('alumno', compact('hechos'));		

		}
		else{

			$alumno_id = DB::table('alumno')
			->where('users.id','=', Auth::user()->id)
			->join('users','users.id','=','user_id')
			->select('alumno.id') 
			->get();

			foreach($alumno_id as $aluid)
				$aluid->id;
			$hechos = DB::table('hechos')
			->where('alumno_id','=', $aluid->id)
			->where('etiqueta','=',$request->etiqueta)
			->get();

			return view('alumno', compact('hechos'));		
		}
	}


}
