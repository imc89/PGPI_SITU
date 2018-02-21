<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtiquetasadminController extends Controller
{

        public function send_etiqueta(Request $request)
    {

        //$request->name;

        //RECOGER DATO NOMBRE ETIQUETA
        function getEtiqueta() {
            //$request = request();
            $etiqueta = request('nombre');
            return $etiqueta;
        }

        DB::table('tags')->insert(['nombre' => getEtiqueta()]);

        return redirect()->back()->with('message', '¡Etiqueta Guardada');



    }
}
