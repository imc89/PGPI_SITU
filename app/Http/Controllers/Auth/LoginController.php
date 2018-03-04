<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // protected $redirectTo = '/home';

    public function authenticated($request , $user){

        date_default_timezone_set('Europe/Madrid');
        $date = date('Y-m-d H:i:s');
        $logins = DB::table('users')->select('logins')->where('name', $user->name)->first()->logins;

            // TIEMPO DE REGISTRO DE ADMIN

        if($user->rol=='0'){
            DB::table('users')
            ->where('name', $user->name)
            ->update(['tiempolog' => $date ]);

            return redirect('admin');    
        }

        elseif($user->rol=='1'){
            $logins++;
            // TIEMPO DE REGISTRO DE ALUMNO
            DB::table('users')
            ->where('name', $user->name)
            ->update(['tiempolog' => $date ]);
            //CONTADOR DE LOGINS
            DB::table('users')
            ->where('name', $user->name)
            ->update(['logins' => $logins ]);
            //CREAR NUEVO USUARIO AL LOGUEARSE 
            try {
                DB::table('alumno')->join('users','id','=','user_id')
                ->insert (['user_id' => Auth::user()->id]);
            } catch(\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == '1062'){
                   return redirect('alumno');
               }
           }

           return redirect('alumno');
       }

       elseif($user->rol=='2'){

            // TIEMPO DE REGISTRO DE PROFESOR
        DB::table('users')
        ->where('name', $user->name)
        ->update(['tiempolog' => $date ]);

        return redirect('profesor');

    }
}


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
