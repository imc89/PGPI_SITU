<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});





Route::group(['middleware' => ['auth']], function() {
// ADMINISTRADOR
	Route::get('admin', function () {
		return view('admin');
	});

	Route::get('log_admin_login', function () {
		return view('log_admin_login');
	});


	Route::get('etiquetas', function () {
		return view('etiquetas');
	});

	Route::post('send_etiqueta','EtiquetasadminController@send_etiqueta');


	Route::post('send','mailController@send');

	Route::get('mailpassword', function () {
		return view('mailpassword');
	});

	Route::get('crear_etiquetas', function () {
		return view('crear_etiquetas');
	});



// ALUMNNO
	Route::get('alumno', function () {
// FILTRO
		$alumno_id = DB::table('alumno')
		->where('users.id','=', Auth::user()->id)
		->join('users','users.id','=','user_id')
		->select('alumno.id') 
		->get();

		foreach($alumno_id as $aluid)
			$aluid->id; 
		$hechos = DB::table('hechos')
		->where('alumno_id','=', $aluid->id)
		->get();

		return view('alumno', compact('hechos'));		
	});

	Route::get('configPerfil', function () {
		return view('configPerfil');
	});
	
	Route::get('configPerfil', 'UserController@profile');
	Route::post('configPerfil', 'UserController@update_avatar');
	
	Route::get('actualizarPerfil', 'UserController@actualizar_perfil');

	Route::get('perfilAlumno', function () {
		return view('perfilAlumno');
	});

	Route::get('crear_hechos', function () {
		return view('crear_hechos');
	});

	Route::get('filtrar_hechos', 'FiltrarhechosController@filtrar_hechos');


	Route::post('nuevo_hecho', 'HechosController@nuevo_hecho');


	Route::get('mail_invitados', function () {
		return view('mail_invitados');
	});

	Route::get('lineaTiempo', function () {
		return view('lineaTiempo');
	});



	Route::get('profesor', function () {
		return view('profesor');
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
