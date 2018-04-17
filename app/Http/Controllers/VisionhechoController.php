<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class VisionhechoController extends Controller
{
	public function vision_hecho(Request $request)
	{


		$hecho = DB::table('hechos')->where('hechos.id', '=', $request->data)->select()->get();

		return view('hecho_aislado', compact('hecho'));		
	}
	

}
