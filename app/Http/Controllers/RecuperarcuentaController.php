<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;


class RecuperarcuentaController extends Controller
{
    //
	public function Recuperacion(Request $request)
	{

		$correo_oculto= $request->data.'_Oculto';

		$email = DB::table('users')->where('email','=',$correo_oculto)->select('users.email')->get();

		foreach ($email as $e ) {
			$email = $e->email;
		}

		if ($correo_oculto === $email) {

		$email = DB::table('users')->where('email','=',$correo_oculto)->select('users.email')->get();

			foreach ($email as $em) {

				$email= substr($em->email, 0, -7);
			}


			DB::table('users')->where('email','=',$correo_oculto)->update(['users.email' => $email])	;



			return redirect()->back()->with('message', '""CUENTA RECUPERADA CON ÉXITO""');
		}
		else{
			return redirect()->back()->with('message', '""LA CUENTA A RECUPERAR NO EXISTE O ESTÁ EN USO""');
		}


	}
}
