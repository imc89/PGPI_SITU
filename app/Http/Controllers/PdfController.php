<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;
use PDF;



class PdfController extends Controller
{
    //
	public function CreatePDF(Request $request)
	{


		$dato = $request->data;

		$datospdf = DB::table('alumno')
		->join('users','users.id','=','user_id')
		->where('alumno.id','=',$dato)
		->get();

		foreach ($datospdf as $nom){ 
			$no=$nom->nombre;	
			$ape=$nom->apellidos;	
		}

		$pdf = PDF::loadView('curriculum', compact('datospdf'));

		return $pdf->stream('curriculum_'.  ucfirst($no).'_'. ucfirst($ape) .'.pdf');


	}

	public function DownloadPDF(Request $request)
	{


		$dato = $request->data;

		$datospdf = DB::table('alumno')
		->join('users','users.id','=','user_id')
		->where('alumno.id','=',$dato)
		->get();

		
		$pdf = PDF::loadView('curriculum', compact('datospdf'));


		foreach ($datospdf as $nom){ 
			$no=$nom->nombre;	
			$ape=$nom->apellidos;	
		}


		return $pdf->download('curriculum_'.  ucfirst($no).'_'. ucfirst($ape) .'.pdf');


	}
}
