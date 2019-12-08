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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('blocos','BlocoController');

Route::resource('locais','LocalController');

Route::resource ( 'servidores', 'ServidorController');

Route::resource ( 'coordenadores','CoordenadorController');

Route::resource ( 'equipamentos','EquipamentoController');

Route::resource ( 'users','UserController');

Route::post('reserva/{reserva}/aprovar', 'ReservaController@aprovar')->name('reserva.aprovar');
Route::post('reserva/{reserva}/reprovar', 'ReservaController@reprovar')->name('reserva.reprovar');
Route::resource('reservas','ReservaController');
Route::get('reservas/buscarLocaisCoordenador/{id_coordenador}', 'ReservaController@buscarLocaisCoordenador');

Route::get('reserva/{reserva}/datas/create', 'DataController@create')->name('reserva.datas.create');
Route::post('reserva/{reserva}/datas/store', 'DataController@store')->name('reserva.datas.store');
Route::get('reserva/{reserva}/datas', 'DataController@index')->name('reserva.datas');
Route::resource('datas','DataController');


