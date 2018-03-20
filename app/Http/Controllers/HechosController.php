<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class HechosController extends Controller
{



	public function nuevo_hecho(Request $request){

// EN CASO DE QUE EL CAMPO ESTE LLAMADO IGUAL EN OTRAS TABLAS COMO EMAIL ADJUDICAR A LA TABLA CORRESPONDIENTE.
 // 'dato_opcion1' => $request->dato_opcion1 , 'dato_opcion2' => $request->dato_opcion2 , 'dato_opcion3' => $request->dato_opcion3 , 'opcion1_valor' => $request->opcion1_valor , 'opcion2_valor' => $request->opcion2_valor, 'opcion3_valor' => $request->opcion3_valor]);

		$id_alumno = DB::table('alumno')
		->where('users.id','=', Auth::user()->id)
		->select('alumno.id')
		->join('users','users.id','=','user_id')
		->get();


		foreach($id_alumno as $id){
			$id->id;


			if($request->hasFile('anexo') && $request->hasFile('foto')){
				$filename = $request->anexo->getClientOriginalName();
				$request->file('anexo')->move(public_path("/images/anexos/"), $filename);	

				$foto = $request->file('foto');
				$filename2 = time() . '.' . $foto->getClientOriginalExtension();
				Image::make($foto)->save( public_path('/images/fotos/' . $filename2 ) );	

				DB::table('hechos')
				->join('alumno','alumno.id','=','alumno_id')
				->insert(['alumno_id' => $id->id , "etiqueta" => $request->etiqueta , "titulo" => $request->titulo , "curso" => $request->curso , "fecha" => $request->fecha , "keywords" => $request->keywords , "contenido" => $request->contenido , "video" => $request->video , "anexo" => $filename , "encuentro" => $request->encuentro , "proposito" => $request->proposito , "foto" => $filename2 , "autorizacion" => $request->autorizacion ]);	
			}
			elseif($request->hasFile('foto')){
				$foto = $request->file('foto');
				$filename = time() . '.' . $foto->getClientOriginalExtension();
				Image::make($foto)->save( public_path('/images/fotos/' . $filename ) );
				DB::table('hechos')
				->join('alumno','alumno.id','=','alumno_id')
				->insert(['alumno_id' => $id->id , "etiqueta" => $request->etiqueta , "titulo" => $request->titulo , "curso" => $request->curso , "fecha" => $request->fecha , "keywords" => $request->keywords , "foto" => $filename , "proposito" => $request->proposito , "autorizacion" => $request->autorizacion]);
			}

			elseif($request->hasFile('anexo')){
				$filename = $request->anexo->getClientOriginalName();
				$request->file('anexo')->move(public_path("/images/anexos/"), $filename);		
				DB::table('hechos')
				->join('alumno','alumno.id','=','alumno_id')
				->insert(['alumno_id' => $id->id , "etiqueta" => $request->etiqueta , "titulo" => $request->titulo , "curso" => $request->curso , "fecha" => $request->fecha , "keywords" => $request->keywords , "contenido" => $request->contenido , "video" => $request->video , "anexo" => $filename , "encuentro" => $request->encuentro , "proposito" => $request->proposito , "autorizacion" => $request->autorizacion ]);	
			}

			else{
				DB::table('hechos')
				->join('alumno','alumno.id','=','alumno_id')
				->insert(['alumno_id' => $id->id , "etiqueta" => $request->etiqueta , "titulo" => $request->titulo , "curso" => $request->curso , "fecha" => $request->fecha , "keywords" => $request->keywords , "contenido" => $request->contenido , "video" => $request->video , "encuentro" => $request->encuentro , "proposito" => $request->proposito , "autorizacion" => $request->autorizacion ]);

			}


			return redirect()->back()->with('message', 'Hecho creado');

		}
	}




}
