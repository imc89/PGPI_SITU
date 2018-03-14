<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiltrarhechosController extends Controller
{
    //

	public function filtrar_hechos(Request $request){


	echo "LA ETIQUETA ES : " . $request->etiqueta ;

	}
}
