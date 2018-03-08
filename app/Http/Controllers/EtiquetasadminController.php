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
            $etiqueta = request('name');
            return $etiqueta;
        }

        DB::table('tags')->insert(['name' => getEtiqueta()]);

        return redirect()->back()->with('message', '¡Etiqueta Guardada');



    }
}
