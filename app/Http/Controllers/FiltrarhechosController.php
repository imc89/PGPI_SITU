<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class FiltrarhechosController extends Controller
{

// FILTRAR PARA TABLON


	public function filtrar_hechos_etiqueta(Request $request){



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

	public function filtrar_hechos_titulo(Request $request){

		$alumno_id = DB::table('alumno')
		->where('users.id','=', Auth::user()->id)
		->join('users','users.id','=','user_id')
		->select('alumno.id') 
		->get();

		foreach($alumno_id as $aluid)
			$aluid->id;
		$hechos = DB::table('hechos')
		->where('alumno_id','=', $aluid->id)
		->where('titulo','=',$request->titulo)
		->get();

		return view('alumno', compact('hechos'));		


	}

	public function filtrar_hechos_keyword(Request $request){

		if ($request->keyword == "Cualquier keyword") {

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
			->where ('keywords', 'LIKE', '%'.$request->keyword.'%')
			->get();

			return view('alumno', compact('hechos'));		
		}

	}



// FILTRAR PARA LINEA TEMPORAL


	public function filtrar_linea_etiqueta(Request $request){



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
			->ORDERBY('fecha')
			->get();

			return view('lineaTiempo', compact('hechos'));		

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
			->ORDERBY('fecha')
			->get();

			return view('lineaTiempo', compact('hechos'));		
		}
	}

	public function filtrar_linea_titulo(Request $request){

		$alumno_id = DB::table('alumno')
		->where('users.id','=', Auth::user()->id)
		->join('users','users.id','=','user_id')
		->select('alumno.id') 
		->get();

		foreach($alumno_id as $aluid)
			$aluid->id;
		$hechos = DB::table('hechos')
		->where('alumno_id','=', $aluid->id)
		->where('titulo','=',$request->titulo)
		->ORDERBY('fecha')
		->get();

		return view('lineaTiempo', compact('hechos'));		


	}

	public function filtrar_linea_keyword(Request $request){

		if ($request->keyword == "Cualquier keyword") {

			$alumno_id = DB::table('alumno')
			->where('users.id','=', Auth::user()->id)
			->join('users','users.id','=','user_id')
			->select('alumno.id') 
			->get();

			foreach($alumno_id as $aluid)
				$aluid->id;
			$hechos = DB::table('hechos')
			->where('alumno_id','=', $aluid->id)
			->ORDERBY('fecha')
			->get();

			return view('lineaTiempo', compact('hechos'));		

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
			->where ('keywords', 'LIKE', '%'.$request->keyword.'%')
			->ORDERBY('fecha')
			->get();

			return view('lineaTiempo', compact('hechos'));		
		}

	}

// FILTRAR EN INVITADO

	public function filtrar_hinvitado_etiqueta(Request $request){

		$datos_invitado = DB::table('invitado')
		->select('alumno_id','acceso','user_id')
		->where('invitado.email', '=' , Auth::user()->email)
		->get();


		foreach($datos_invitado as $aluid)
			$alumno_id = $aluid->alumno_id;
		$autorizacion = $aluid->acceso;


		$propietario=DB::table('users')
		->where('users.id', '=', $aluid->user_id)
		->select('name')
		->get();

		if ($request->etiqueta == "Todos los hechos") {

			
			$hechos = DB::table('hechos')
			->where('alumno_id','=', $alumno_id)
			->get();

			return view('invitado', compact('hechos','autorizacion','propietario'));		

		}
		else{

			$hechos = DB::table('hechos')
			->where('alumno_id','=', $alumno_id)
			->where('etiqueta','=',$request->etiqueta)
			->get();

			return view('invitado', compact('hechos','autorizacion','propietario'));		
		}
	}


	public function filtrar_hinvitado_titulo(Request $request){

		$datos_invitado = DB::table('invitado')
		->select('alumno_id','acceso','user_id')
		->where('invitado.email', '=' , Auth::user()->email)
		->get();


		foreach($datos_invitado as $aluid)
			$alumno_id = $aluid->alumno_id;
		$autorizacion = $aluid->acceso;


		$propietario=DB::table('users')
		->where('users.id', '=', $aluid->user_id)
		->select('name')
		->get();
		


		$hechos = DB::table('hechos')
		->where('alumno_id','=', $alumno_id)
		->where('titulo','=',$request->titulo)
		->get();

		return view('invitado', compact('hechos','autorizacion','propietario'));		

	}

	public function filtrar_hinvitado_keyword(Request $request){
		$datos_invitado = DB::table('invitado')
		->select('alumno_id','acceso','user_id')
		->where('invitado.email', '=' , Auth::user()->email)
		->get();


		foreach($datos_invitado as $aluid)
			$alumno_id = $aluid->alumno_id;
		$autorizacion = $aluid->acceso;


		$propietario=DB::table('users')
		->where('users.id', '=', $aluid->user_id)
		->select('name')
		->get();

		if ($request->keyword == "Cualquier keyword") {
			
			$hechos = DB::table('hechos')
			->where('alumno_id','=', $alumno_id)
			->get();

			return view('invitado', compact('hechos','autorizacion','propietario'));		

		}
		else{

			$hechos = DB::table('hechos')
			->where('alumno_id','=', $alumno_id)
			->where ('keywords', 'LIKE', '%'.$request->keyword.'%')
			->get();

			return view('invitado', compact('hechos','autorizacion','propietario'));		
		}

	}


}
