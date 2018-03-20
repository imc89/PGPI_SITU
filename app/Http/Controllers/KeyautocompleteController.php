<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class KeyautocompleteController extends Controller
{

	public function autocomplete(Request $request)
	{

		$alumno_id = DB::table('alumno')
		->where('users.id','=', Auth::user()->id)
		->join('users','users.id','=','user_id')
		->select('alumno.id') 
		->get();



		$keywords = $request->keywords;
		
		foreach($alumno_id as $aluid)
			$queries = DB::table('keywords') 
		->where('name', 'like', '%'.$keywords.'%')
		->where('alumno_id','=', $aluid->id)
		->take(50)->get();


		foreach ($queries as $query)
		{
			$results[] = ($query->name);

		}

		return  json_encode($results);
	}
}




