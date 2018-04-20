<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class PlaceController extends Controller
{
    //
	public function homeplace(Request $request){

		if (Auth::user()->rol == 0) {
			return redirect('admin');    

		} 

		if (Auth::user()->rol == 1) {
			return redirect('alumno');    
		} 

		if (Auth::user()->rol == 2) {
			return redirect('profesor');    
		} 

		if (Auth::user()->rol == 3) {
			return redirect('invitado');    
		} 
	}
}
