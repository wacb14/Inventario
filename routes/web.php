<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/','home')->name('home');
Route::get('/bienes/imprimir','App\Http\Controllers\BienController@print')->name('bienes.print')->middleware('auth.admin');
Route::get('/bienes/verificacion','App\Http\Controllers\BienController@index_bien_verif')->name('bienes.verif')->middleware('auth.admin');
Route::get('/bienes','App\Http\Controllers\BienController@index')->name('bienes.index')->middleware('auth');
Route::get('/bienes/crear','App\Http\Controllers\BienController@create')->name('bienes.create')->middleware('auth.admin');
Route::post('/bienes','App\Http\Controllers\BienController@store')->name('bienes.store')->middleware('auth.admin');
Route::get('/bienes/{bien}/editar','App\Http\Controllers\BienController@edit')->name('bienes.edit')->middleware('auth.admin');
Route::get('/bienes/{bien}','App\Http\Controllers\BienController@show')->name('bienes.show')->middleware('auth');
Route::patch('/bienes/{bien}','App\Http\Controllers\BienController@update')->name('bienes.update')->middleware('auth.admin');
// Route::delete('/bienes/{bien}','App\Http\Controllers\BienController@destroy')->name('bienes.destroy')->middleware('auth.admin');


Route::get('/movimientos','App\Http\Controllers\MovimientoController@index')->name('movimientos.index')->middleware('auth');
Route::get('/movimientos/crear','App\Http\Controllers\MovimientoController@create')->name('movimientos.create')->middleware('auth');
Route::post('/movimientos','App\Http\Controllers\MovimientoController@store')->name('movimientos.store')->middleware('auth');
Route::get('/movimientos/{movimiento}/editar','App\Http\Controllers\MovimientoController@edit')->name('movimientos.edit')->middleware('auth');
Route::get('/movimientos/{movimiento}','App\Http\Controllers\MovimientoController@show')->name('movimientos.show')->middleware('auth');
Route::patch('/movimientos/{movimiento}','App\Http\Controllers\MovimientoController@update')->name('movimientos.update')->middleware('auth');
// Route::delete('/movimientos/{movimiento}','App\Http\Controllers\MovimientoController@destroy')->name('movimientos.destroy')->middleware('auth');

Route::get('/responsables','App\Http\Controllers\ResponsableController@index')->name('responsables.index')->middleware('auth');
Route::get('/responsables/crear','App\Http\Controllers\ResponsableController@create')->name('responsables.create')->middleware('auth.admin');
Route::post('/responsables','App\Http\Controllers\ResponsableController@store')->name('responsables.store')->middleware('auth.admin');
Route::get('/responsables/{responsable}/editar','App\Http\Controllers\ResponsableController@edit')->name('responsables.edit')->middleware('auth.admin');
Route::get('/responsables/{responsable}','App\Http\Controllers\ResponsableController@show')->name('responsables.show')->middleware('auth');
Route::patch('/responsables/{responsable}','App\Http\Controllers\ResponsableController@update')->name('responsables.update')->middleware('auth.admin');
// Route::delete('/responsables/{responsable}','App\Http\Controllers\ResponsableController@destroy')->name('responsables.destroy')->middleware('auth.admin');

Route::get('/servicios','App\Http\Controllers\ServicioController@index')->name('servicios.index')->middleware('auth');
Route::get('/servicios/crear','App\Http\Controllers\ServicioController@create')->name('servicios.create')->middleware('auth.admin');
Route::post('/servicios','App\Http\Controllers\ServicioController@store')->name('servicios.store')->middleware('auth.admin');
Route::get('/servicios/{servicio}/editar','App\Http\Controllers\ServicioController@edit')->name('servicios.edit')->middleware('auth.admin');
Route::get('/servicios/{servicio}','App\Http\Controllers\ServicioController@show')->name('servicios.show')->middleware('auth');
Route::get('/servicios/{servicio}/historial','App\Http\Controllers\ServicioController@show_history')->name('servicios.show_history')->middleware('auth');
Route::patch('/servicios/{servicio}','App\Http\Controllers\ServicioController@update')->name('servicios.update')->middleware('auth.admin');
// Route::delete('/servicios/{servicio}','App\Http\Controllers\ServicioController@destroy')->name('servicios.destroy')->middleware('auth.admin');

Route::get('/reportes','App\Http\Controllers\ReporteController@index')->name('reportes.index')->middleware('auth.admin');

Route::get('/users','App\Http\Controllers\RegisterController@index')->name('users.index')->middleware('auth.admin');
Route::get('/users/{user}/editar','App\Http\Controllers\RegisterController@edit')->name('users.edit')->middleware('auth.admin');
Route::get('/passwords/{user}/editar','App\Http\Controllers\RegisterController@edit_pass')->name('passwords.edit')->middleware('auth.admin');
Route::get('/users/{user}','App\Http\Controllers\RegisterController@show')->name('users.show')->middleware('auth.admin');
Route::patch('/users/{user}','App\Http\Controllers\RegisterController@update')->name('users.update')->middleware('auth.admin');
Route::patch('/passwords/{user}','App\Http\Controllers\RegisterController@update_pass')->name('passwords.update')->middleware('auth.admin');
Route::get('/register','App\Http\Controllers\RegisterController@create')->name('register.create')->middleware('auth.admin');
Route::post('/register','App\Http\Controllers\RegisterController@store')->name('register.store')->middleware('auth.admin');
Route::get('/login','App\Http\Controllers\SessionController@create')->name('login.create')->middleware('guest');
Route::post('/login','App\Http\Controllers\SessionController@store')->name('login.store');
Route::get('/logout','App\Http\Controllers\SessionController@destroy')->name('login.destroy')->middleware('auth');