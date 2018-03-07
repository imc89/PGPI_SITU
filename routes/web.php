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

Route::post('send','mailController@send');

Route::get('mailpassword', function () {
	return view('mailpassword');
});

Route::get('log_admin_login', function () {
	return view('log_admin_login');
});

Route::get('etiquetas', function () {
	return view('etiquetas');
});

Route::post('send_etiqueta','EtiquetasadminController@send_etiqueta');



Route::group(['middleware' => ['auth']], function() {
	Route::get('admin', function () {
		return view('admin');
	});
	Route::get('crear_etiquetas', function () {
		return view('crear_etiquetas');
	});

	Route::get('alumno', function () {
		return view('alumno');
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



	Route::get('lineaTiempo', function () {
		return view('lineaTiempo');
	});

	Route::get('profesor', function () {
		return view('profesor');
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
