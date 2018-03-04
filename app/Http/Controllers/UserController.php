<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function profile(){
        return view('configPerfil', array('user' => Auth::user()) );
    }
    public function update_avatar(Request $request){
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/avatar/' . $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('configPerfil', array('user' => Auth::user()) );

    }

    public function actualizar_perfil(Request $request){

// EN CASO DE QUE EL CAMPO ESTE LLAMADO IGUAL EN OTRAS TABLAS COMO EMAIL ADJUDICAR A LA TABLA CORRESPONDIENTE.
 // 'dato_opcion1' => $request->dato_opcion1 , 'dato_opcion2' => $request->dato_opcion2 , 'dato_opcion3' => $request->dato_opcion3 , 'opcion1_valor' => $request->opcion1_valor , 'opcion2_valor' => $request->opcion2_valor, 'opcion3_valor' => $request->opcion3_valor]);

if ($request->nombre != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['nombre' => $request->nombre]);
}
if ($request->apellidos != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['apellidos' => $request->apellidos]);
}
if ($request->dni != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['dni' => $request->dni]);
}
if ($request->email != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['alumno.email' => $request->email]);
}
if ($request->direccion != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['direccion' => $request->direccion]);
}
if ($request->carrera != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['carrera' => $request->carrera]);
}

if ($request->dato_opcion1 != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['dato_opcion1' => $request->dato_opcion1]);
}
if ($request->dato_opcion2 != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['dato_opcion2' => $request->dato_opcion2]);
}
if ($request->dato_opcion3 != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['dato_opcion3' => $request->dato_opcion3]);
}

if ($request->opcion1_valor != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['opcion1_valor' => $request->opcion1_valor]);
}
if ($request->opcion2_valor != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['opcion2_valor' => $request->opcion2_valor]);
}
if ($request->opcion3_valor != NULL) {
   DB::table('alumno')
   ->join('users','users.id','=','user_id')
   ->where('users.id','=', Auth::user()->id)
   ->update(['opcion3_valor' => $request->opcion3_valor]);
}

return redirect()->back()->with('message', 'INFORMACIÓN DE PERFIL ACTUALIZADA CORRECTAMENTE');


}
}