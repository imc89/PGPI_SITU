<?php
Namespace App\Http\Controllers;
use App\Notifications\InboxMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Admin;
Class ContactController extends Controller
{
	public function show() 
	{
		return view('contact');
	}
	public function mailToAdmin(ContactFormRequest $message, Admin $admin)
	{        //ENVIAR NOTIFICACION DE ADMINISTRADOR
		$admin->notify(new InboxMessage($message));
		// MENSAJE DE CONTESTACIÓN AL ENVIAR CORREO
		return redirect()->back()->with('message', '¡Gracias por tu mensaje! Te responderemos tan pronto como nos sea posible.');
	}
}




