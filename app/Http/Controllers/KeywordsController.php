<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class KeywordsController extends Controller
{
    //
	public function send_keyword(Request $request)
	{


		$id_alumno = DB::table('alumno')
		->where('users.id','=', Auth::user()->id)
		->select('alumno.id')
		->join('users','users.id','=','user_id')
		->get();

		foreach($id_alumno as $id){
			$id->id;


			DB::table('keywords')
			->join('alumno','alumno.id','=','alumno_id')
			->insert(['alumno_id' => $id->id , 'name' => $request->name]);

		}

		return redirect()->back()->with('message', 'Keyword Guardada');



	}





}







