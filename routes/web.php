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

Route::get('welcome', function () {
	return view('welcome');
});


Route::get('Recuperacioncuenta', 'RecuperarcuentaController@Recuperacion');

Route::get('Homeplace', 'PlaceController@homeplace');


Route::group(['middleware' => ['auth']], function() {
// ADMINISTRADOR

	Route::group(['middleware' => 'admin'], function () {

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

	});

// ALUMNNO
	Route::group(['middleware' => 'alumno'], function () {

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

			$alumno_id = DB::table('alumno')
			->where('users.id','=', Auth::user()->id)
			->join('users','users.id','=','user_id')
			->select('alumno.id') 
			->get();

			foreach($alumno_id as $aluid)
				$aluid->id; 
			$keywords = DB::table('keywords')
			->where('alumno_id','=', $aluid->id)
			->get();


			return view('alumno', compact('hechos','keywords'));		
		});

		Route::get('viewPdf_alumno', 'PdfController@CreatePDF');

		Route::get('Pdf_linea', 'PdfController@LineaPDF');

		Route::get('curriculum', function () {
			return view('curriculum');
		});	

		Route::get('lineaPdf', function () {
			return view('lineaPdf');
		});		

		Route::post('invitar','mailController@invitar');

		Route::get('configPerfil', function () {
			return view('configPerfil');
		});

		Route::get('configPerfil', 'UserController@profile');
		Route::post('configPerfil', 'UserController@update_avatar');

		Route::get('actualizarPerfil', 'UserController@actualizar_perfil');

		Route::get('perfilAlumno', function () {
			return view('perfilAlumno');
		});

		Route::get('keywords', function () {

			$alumno_id = DB::table('alumno')
			->where('users.id','=', Auth::user()->id)
			->join('users','users.id','=','user_id')
			->select('alumno.id') 
			->get();

			foreach($alumno_id as $aluid)
				$aluid->id; 
			$keywords = DB::table('keywords')
			->where('alumno_id','=', $aluid->id)
			->get();

			return view('keywords', compact('keywords'));
		});

		Route::post('send_keyword','KeywordsController@send_keyword');

		Route::get('crear_keyword', function () {
			return view('crear_keywords');
		});

		Route::get('/autocomplete', array('as' => 'autocomplete', 'uses'=>'KeyautocompleteController@autocomplete'));


		Route::get('crear_hechos', function () {

			$alumno_id = DB::table('alumno')
			->where('users.id','=', Auth::user()->id)
			->join('users','users.id','=','user_id')
			->select('alumno.id') 
			->get();

			foreach($alumno_id as $aluid)
				$aluid->id; 
			$keywords = DB::table('keywords')
			->where('alumno_id','=', $aluid->id)
			->get();

			return view('crear_hechos', compact('keywords'));
		});


		Route::get('logs_invitados_alumno', function () {
			return view('logs_invitados_alumno');
		});

		Route::get('hechos_relacionados', 'HechosrelacionadosController@hechos_relacionados');

		Route::get('vision_hecho', 'VisionhechoController@vision_hecho');
		Route::get('modificar_hecho', 'ModificarhechoController@modificar_hecho');
		Route::post('hecho_modificado', 'ModificarhechoController@hecho_modificado');


		Route::get('eliminar_hecho', 'EliminarController@eliminar_hecho');
		Route::get('eliminar_keyword', 'EliminarController@eliminar_keyword');
		Route::get('eliminar_usuario', 'EliminarController@eliminar_usuario');



// FILTRAR PARA TABLON 

		Route::get('filtrar_hechos_etiqueta', 'FiltrarhechosController@filtrar_hechos_etiqueta');
		Route::get('filtrar_hechos_titulo', 'FiltrarhechosController@filtrar_hechos_titulo');
		Route::get('filtrar_hechos_keyword', 'FiltrarhechosController@filtrar_hechos_keyword');


// FILTRAR PARA LINEA TEMPORAL

		Route::get('filtrar_linea_etiqueta', 'FiltrarhechosController@filtrar_linea_etiqueta');
		Route::get('filtrar_linea_titulo', 'FiltrarhechosController@filtrar_linea_titulo');
		Route::get('filtrar_linea_keyword', 'FiltrarhechosController@filtrar_linea_keyword');


		Route::post('nuevo_hecho', 'HechosController@nuevo_hecho');


		Route::get('mail_invitados', function () {
			return view('mail_invitados');
		});
		
		Route::get('lineaTiempo', function () {
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
			->ORDERBY('fecha')
			->get();

			return view('lineaTiempo', compact('hechos'));	

		});

	});

// PROFESOR
Route::group(['middleware' => 'profesor'], function () {

	Route::get('profesor', function () {
		return view('profesor');
	}); 

	Route::get('viewPdf', 'PdfController@CreatePDF');
	Route::get('downPdf', 'PdfController@DownloadPDF');

	Route::get('curriculum', function () {
		return view('curriculum');
	});		

});	


// INVITADO

Route::group(['middleware' => 'invitado'], function () {


	Route::get('viewPdf_alumno_invitado', 'PdfController@CreatePDF');

	Route::get('invitado', function () {

		$datos_invitado = DB::table('invitado')
		->select('alumno_id','acceso','user_id')
		->where('invitado.email', '=' , Auth::user()->email)
		->get();

		foreach($datos_invitado as $aluid)
			$alumno_id = $aluid->alumno_id;
		$autorizacion = $aluid->acceso;

		$propietario=DB::table('users')
		->where('users.id', '=', $aluid->user_id)
		->select('name')
		->get();

		$hechos=DB::table('hechos')
		->where('hechos.alumno_id', '=', $aluid->alumno_id)
		->get();

		foreach($hechos as $h){
			if ($aluid->acceso == 1) {
				$hechos=DB::table('hechos')
				->where('hechos.alumno_id', '=', $aluid->alumno_id)
				->where('hechos.autorizacion', '=', 1)
				->get();
			}
			elseif($aluid->acceso == 2){
				$hechos=DB::table('hechos')
				->where('hechos.alumno_id', '=', $aluid->alumno_id)
				->whereBetween('hechos.autorizacion', [1, 2])->get();

			}
			else{
				$hechos=DB::table('hechos')
				->where('hechos.alumno_id', '=', $aluid->alumno_id)
				->get();

			}
		}

		return view('invitado', compact('hechos','autorizacion','propietario'));		

	});


// FILTRAR PARA INVITADO

	Route::get('filtrar_hinvitado_etiqueta', 'FiltrarhechosController@filtrar_hinvitado_etiqueta');

	Route::get('filtrar_hinvitado_titulo', 'FiltrarhechosController@filtrar_hinvitado_titulo');

	Route::get('filtrar_hinvitado_keyword', 'FiltrarhechosController@filtrar_hinvitado_keyword');







});

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
