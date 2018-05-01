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
// 
	public function CreatePDFlog(Request $request)
	{


		$dato = $request->data;

		$mail_invitado = DB::table('invitado')
		->select('email')
		->where('invitado.user_id', '=', $dato )
		->get();

		foreach($mail_invitado as $maili){

			if($maili->email !== NULL){

				$datospdf = DB::table('users')
			->select('name','tiempolog')
			->where('users.email', '=', $maili->email )
			->get();
			}
		}
		

		$pdf = PDF::loadView('pdf_log_invitado', compact('datospdf'));

		return $pdf->stream('pdf_log_invitado_'.'.pdf');


	}
// 


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

	public function LineaPDF(Request $request)
	{


		$dato = $request->data;

		$datospdf = DB::table('alumno')
		->join('users','users.id','=','user_id')
		->where('alumno.id','=',$dato)
		->get();

		
		$pdf = PDF::loadView('lineaPdf', compact('datospdf'));


		foreach ($datospdf as $nom){ 
			$no=$nom->nombre;	
			$ape=$nom->apellidos;	
		}


		return $pdf->stream('lineaPdf_'.  ucfirst($no).'_'. ucfirst($ape) .'.pdf');


	}
}
