<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class ModificarhechoController extends Controller
{
    //
	public function modificar_hecho(Request $request){

		$hecho = DB::table('hechos')->where('hechos.id', '=', $request->data)->select()->get();

		return view('hecho_modificar', compact('hecho'));	
	}

	public function hecho_modificado(Request $request){


		if ($request->titulo != NULL) {
			DB::table('hechos')
			->where('hechos.id', '=', $request->id)
			->update(['titulo' => $request->titulo]);
		}

		if ($request->etiqueta != "-") {
			if ($request->etiqueta != "Recuerdos") {
				if ($request->etiqueta == "Recuerdos") {
					DB::table('hechos')
					->where('hechos.id', '=', $request->id)
					->update(['etiqueta' => $request->etiqueta]);
				}
			}
		}

		if ($request->curso != NULL) {
			DB::table('hechos')
			->where('hechos.id', '=', $request->id)
			->update(['curso' => $request->curso]);
		}

		if ($request->fecha != NULL) {
			DB::table('hechos')
			->where('hechos.id', '=', $request->id)
			->update(['fecha' => $request->fecha]);
		}

//________________________________________________________
		

		if ($request->keywords !== NULL) {

			DB::table('hechos')
			->where('hechos.id', '=', $request->id)
			->update(['keywords' => $request->keywords]);
		}

//________________________________________________________

		DB::table('hechos')
		->where('hechos.id', '=', $request->id)
		->update(['contenido' => $request->contenido]);
		
		DB::table('hechos')
		->where('hechos.id', '=', $request->id)
		->update(['proposito' => $request->proposito]);
		

		DB::table('hechos')
		->where('hechos.id', '=', $request->id)
		->update(['autorizacion' => $request->autorizacion]);
		

		if($request->hasFile('foto')){

			$foto = $request->file('foto');
			$filename = time() . '.' . $foto->getClientOriginalExtension();
			Image::make($foto)->save( public_path('/images/fotos/' . $filename ) );
			DB::table('hechos')
			->where('hechos.id', '=', $request->id)
			->update(['foto' => $filename]);

		}

		if($request->hasFile('anexo')){
			$filename = $request->anexo->getClientOriginalName();
			$request->file('anexo')->move(public_path("/images/anexos/"), $filename);	
			DB::table('hechos')
			->where('hechos.id', '=', $request->id)
			->update(['anexo' => $filename]);	

		}

		if ($request->video != NULL) {
			DB::table('hechos')
			->where('hechos.id', '=', $request->id)
			->update(['video' => $request->video]);
		}
		
		if ($request->encuentro != NULL) {
			DB::table('hechos')
			->where('hechos.id', '=', $request->id)
			->update(['encuentro' => $request->encuentro]);
		}

		return redirect('alumno');

	}
}
