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






	}
}
