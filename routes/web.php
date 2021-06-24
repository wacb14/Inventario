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
Route::get('/bienes','App\Http\Controllers\BienController@index')->name('bienes.index');
Route::get('/bienes/crear','App\Http\Controllers\BienController@create')->name('bienes.create');
Route::post('/bienes','App\Http\Controllers\BienController@store')->name('bienes.store');
Route::get('/bienes/{bien}/editar','App\Http\Controllers\BienController@edit')->name('bienes.edit');
Route::get('/bienes/{bien}','App\Http\Controllers\BienController@show')->name('bienes.show');
Route::patch('/bienes/{bien}','App\Http\Controllers\BienController@update')->name('bienes.update');
Route::delete('/bienes/{bien}','App\Http\Controllers\BienController@destroy')->name('bienes.destroy');

Route::get('/movimientos','App\Http\Controllers\MovimientoController@index')->name('movimientos.index');
Route::get('/movimientos/crear','App\Http\Controllers\MovimientoController@create')->name('movimientos.create');
Route::post('/movimientos','App\Http\Controllers\MovimientoController@store')->name('movimientos.store');
Route::get('/movimientos/{movimiento}/editar','App\Http\Controllers\MovimientoController@edit')->name('movimientos.edit');
Route::get('/movimientos/{movimiento}','App\Http\Controllers\MovimientoController@show')->name('movimientos.show');
Route::patch('/movimientos/{movimiento}','App\Http\Controllers\MovimientoController@update')->name('movimientos.update');
Route::delete('/movimientos/{movimiento}','App\Http\Controllers\MovimientoController@destroy')->name('movimientos.destroy');

Route::get('/responsables','App\Http\Controllers\ResponsableController@index')->name('responsables.index');
Route::get('/responsables/crear','App\Http\Controllers\ResponsableController@create')->name('responsables.create');
Route::post('/responsables','App\Http\Controllers\ResponsableController@store')->name('responsables.store');
Route::get('/responsables/{responsable}/editar','App\Http\Controllers\ResponsableController@edit')->name('responsables.edit');
Route::get('/responsables/{responsable}','App\Http\Controllers\ResponsableController@show')->name('responsables.show');
Route::patch('/responsables/{responsable}','App\Http\Controllers\ResponsableController@update')->name('responsables.update');
Route::delete('/responsables/{responsable}','App\Http\Controllers\ResponsableController@destroy')->name('responsables.destroy');

Route::get('/servicios','App\Http\Controllers\ServicioController@index')->name('servicios.index');
Route::get('/servicios/crear','App\Http\Controllers\ServicioController@create')->name('servicios.create');
Route::post('/servicios','App\Http\Controllers\ServicioController@store')->name('servicios.store');
Route::get('/servicios/{servicio}/editar','App\Http\Controllers\ServicioController@edit')->name('servicios.edit');
Route::get('/servicios/{servicio}','App\Http\Controllers\ServicioController@show')->name('servicios.show');
Route::patch('/servicios/{servicio}','App\Http\Controllers\ServicioController@update')->name('servicios.update');
Route::delete('/servicios/{servicio}','App\Http\Controllers\ServicioController@destroy')->name('servicios.destroy');

Route::get('/register','App\Http\Controllers\RegisterController@create')->name('register.index');
Route::get('/login','App\Http\Controllers\SessionController@create')->name('login.index');
Route::post('/register','App\Http\Controllers\RegisterController@store')->name('register.store');

