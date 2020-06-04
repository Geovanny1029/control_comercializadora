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
    return view('auth.login');
})->name('login');

//rutas registro
Route::resource('registro','RegistroController');

Route::post('registrosu',[
			'uses' => 'RegistroController@actualiza',
			'as'   => 'registro.actualiza'
]);

Route::get('registroe',[
			'uses' => 'RegistroController@view',
			'as'   => 'registro.view'
]);

//rutas usuarios
Route::resource('user','UserController');

Route::get('userse',[
			'uses' => 'UserController@view',
			'as'   => 'user.view'
]);

Route::post('useru',[
			'uses' => 'UserController@actualiza',
			'as'   => 'user.actualiza'
]);

//rutas aduanas
Route::resource('aduanas','AduanaController');

Route::get('aduanase',[
			'uses' => 'AduanaController@view',
			'as'   => 'aduanas.view'
]);

Route::post('aduanasu',[
			'uses' => 'AduanaController@actualiza',
			'as'   => 'aduanas.actualiza'
]);

//rutas proveedor externo
Route::resource('proveedores','ProveedorExternoController');

Route::get('proveedorese',[
			'uses' => 'ProveedorExternoController@view',
			'as'   => 'proveedores.view'
]);

Route::post('proveedoresu',[
			'uses' => 'ProveedorExternoController@actualiza',
			'as'   => 'proveedores.actualiza'
]);

//rutas clientes
Route::resource('clientes','ClienteController');

Route::get('clientese',[
			'uses' => 'ClienteController@view',
			'as'   => 'clientes.view'
]);

Route::post('clientesu',[
			'uses' => 'ClienteController@actualiza',
			'as'   => 'clientes.actualiza'
]);

//rutas ejecutivos
Route::resource('ejecutivos','EjecutivoController');

Route::get('ejecutivose',[
			'uses' => 'EjecutivoController@view',
			'as'   => 'ejecutivos.view'
]);

Route::post('ejecutivosu',[
			'uses' => 'EjecutivoController@actualiza',
			'as'   => 'ejecutivos.actualiza'
]);

//rutas estatus
Route::resource('estatus','EstatusController');

Route::get('estatuse',[
			'uses' => 'EstatusController@view',
			'as'   => 'estatus.view'
]);

Route::post('estatusu',[
			'uses' => 'EstatusController@actualiza',
			'as'   => 'estatus.actualiza'
]);

Route::get('datatable', 'ClienteController@datatable');
Route::get('datatable/getdata', 'ClienteController@getPosts')->name('datatable/getdata');



//rutas razon_social
Route::resource('razon_social','RazonSocialProveedorController');

Route::get('razon_sociale',[
			'uses' => 'RazonSocialProveedorController@view',
			'as'   => 'razon_social.view'
]);

Route::post('razon_socialu',[
			'uses' => 'RazonSocialProveedorController@actualiza',
			'as'   => 'razon_social.actualiza'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
