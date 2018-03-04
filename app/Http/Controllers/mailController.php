<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
class mailController extends Controller
{
	public function send(Request $request)
	{
        if (User::where('email', '=', Input::get('email'))->count() > 0) {
            return redirect()->back()->with('message', 'El usuario ya existe en el sistema');
        }else {

            Mail::send(['text' => 'mail'], ['name', 'ADMINISTRADOR'], function ($message) use ($request) {

                $message->from('adsitufv@gmail.com', 'ADMINISTRADOR');
                $message->to($request->email, $request->name)->subject('SITU');

            });

        DB::table('alumno')->join('users','id','=','user_id')
        ->insert(['user_id' => Auth::user()->id]);
            
            return redirect()->back()->with('message', '¡Gracias por tu mensaje! Te responderemos tan pronto como nos sea posible.');
        }

	}

}
