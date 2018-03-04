<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HechosController extends Controller
{
    //
 public function send_hecho(Request $request)
    {
        //RECOGER DATO NOMBRE ETIQUETA
        function getTitulo() {
            //$request = request();
            $titulo = request('titulo');
            return $titulo;
        }

        function getCurso() {
            //$request = request();
            $curso = request('curso_academico');
            return $curso;
        }

        function getFecha() {
            //$request = request();
            $fecha = request('fecha');
            return $fecha;
        }

        function getContenido() {
            //$request = request();
            $contenido = request('contenido');
            return $contenido;
        }

        function getProposito() {
            //$request = request();
            $proposito = request('proposito');
            return $proposito;
        }

        function getEtiqueta() {
            //$request = request();
            $etiqueta = request('tag');
            return $etiqueta;
        }

        function getAutorizacion() {
            //$request = request();
            $autorizacion = request('autorizacion');
            return $autorizacion;
        }



        DB::table('hechos')->insert(['titulo' => getTitulo(),'curso_academico'=> getCurso(), 'fecha' => getFecha(), 'contenido' => getContenido(), 'proposito' => getProposito(), 'nivel_autorizacion' => getAutorizacion()])->join('alumno','id','=','alumno_id');

        return redirect()->back()->with('message', 'ACTUALIZADOS LOS DATOS DE USUARIO CORRECTAMENTE!');

    }
}
