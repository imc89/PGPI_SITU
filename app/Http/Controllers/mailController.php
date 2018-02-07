<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class mailController extends Controller
{
	public function send()
	{
		Mail::send(['text'=>'mail'],['name','Iñigo'],function($message){
			$message ->to('mci.m89@gmail.com','To FDSF')->subject('TEST LARAVEL EMAIL');
			$message ->from('mci.m89@gmail.com','Iñigo');
		});

	}
}
 -->