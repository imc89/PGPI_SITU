<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class EliminarController extends Controller
{
	public function eliminar_hecho(Request $request)
	{


		DB::table('hechos')->where('hechos.id', '=', $request->data)->delete();

		return redirect()->back()->with('message', '""HECHO BORRADO CON ÉXITO""');



	}

	public function eliminar_keyword(Request $request)
	{



		DB::table('keywords')->where('keywords.id', '=', $request->data)->delete();

		return redirect()->back()->with('message', '""KEYWORD BORRADA CON ÉXITO""');




	}

	public function eliminar_usuario(Request $request)
	{



		$elima_user = $request->data . "_Oculto";

		DB::table('users')
		->where('users.id', '=', Auth::user()->id)
		->update(['email' => $elima_user]);


		

		DB::table('alumno')
		->where('alumno.user_id', '=', Auth::user()->id)
		->update(['nombre' => NULL, 'apellidos' => NULL, 'dni' => NULL,'email' => NULL, 'direccion' => NULL, 'carrera' => NULL, 'dato_opcion1' => NULL, 'dato_opcion2' => NULL, 'dato_opcion3' => NULL, 'opcion1_valor' => NULL, 'opcion2_valor' => NULL, 'opcion3_valor' => NULL ]);


		Auth::logout();
		return redirect('/');

	}



}
