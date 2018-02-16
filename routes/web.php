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


Route::get('admin', function () {
    return view('admin');
});
Route::get('alumno', function () {
    return view('alumno');
});
Route::get('profesor', function () {
    return view('profesor');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
