<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

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

            // TIEMPO DE REGISTRO DE ADMIN
     
            if($user->rol=='0'){
                DB::table('users')
                ->where('name', $user->name)
                ->update(['tiempolog' => $date ]);

                return redirect('admin');    
            }

            elseif($user->rol=='1'){

            // TIEMPO DE REGISTRO DE ALUMNO
                DB::table('users')
                ->where('name', $user->name)
                ->update(['tiempolog' => $date ]);


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
