<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class mailController extends Controller
{
	public function send(Request $request)
	{
		Mail::send(['text'=>'mail'],['name','Iñigo'],function($message) use  ($request){
			
			$message ->from('mci.m89@gmail.com','ADMINISTRADOR');
			$message ->to( $request->email ,$request->name)->subject('TEST LARAVEL EMAIL');

		});

		return redirect()->back()->with('message', '¡Gracias por tu mensaje! Te responderemos tan pronto como nos sea posible.');


	}

}
