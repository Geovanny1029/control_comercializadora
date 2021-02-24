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


Route::post('/regiprove/',[
			'uses' => 'RegistroController@registroproveedor',
			'as'   => 'registro.regiprove'
]);


Route::get('registroe',[
			'uses' => 'RegistroController@view',
			'as'   => 'registro.view'
]);


Route::get('registroscerrados',[
			'uses' => 'RegistroController@cerrados',
			'as'   => 'registro.cerrados'
]);


Route::get('registrosexport',[
			'uses' => 'RegistroController@vistareportes',
			'as'   => 'registro.export'
		]);


Route::get('registroexportarpendientes',[
			'uses' => 'RegistroController@registroexportarpendientes',
			'as'   => 'registro.exportarPendientes'
]);

Route::get('registroexportarc',[
			'uses' => 'RegistroController@registroexportarC',
			'as'   => 'registro.exportarC'
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
Route::resource('proveedoresExt','ProveedorExternoController');

Route::get('proveedorese',[
			'uses' => 'ProveedorExternoController@view',
			'as'   => 'proveedoresExt.view'
]);

Route::post('proveedoresu',[
			'uses' => 'ProveedorExternoController@actualiza',
			'as'   => 'proveedoresExt.actualiza'
]);


Route::post('/proveedorsearch',[
			'uses' => 'ProveedorExternoController@proveedorsearch',
			'as'   => 'proveedoresExt.search'
]);

// tiempo real tramitadores prg
Route::post('/proveedorajax',[  //tiempo real inicio
	'uses' => 'ProveedorExternoController@timereal',
	'as'   =>  'proveedores.timereal']);


//rutas clientes
Route::resource('clientes','ClienteController');

// tiempo real tramitadores prg
Route::post('/clienteajax',[  //tiempo real inicio
	'uses' => 'ClienteController@timereal',
	'as'   =>  'clientes.timereal']);

Route::get('clientese',[
			'uses' => 'ClienteController@view',
			'as'   => 'clientes.view'
]);

Route::get('/registroproveedores',[
			'uses' => 'RegistroController@registroproveedores',
			'as'   => 'registro.provs'
]);

Route::post('/clientessearch',[
			'uses' => 'ClienteController@searchcliente',
			'as'   => 'clientes.search'
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


//rutas Forma de Pago
Route::resource('formapago','FormapagoController');

Route::get('formapagoe',[
			'uses' => 'FormapagoController@view',
			'as'   => 'formapago.view'
]);

Route::post('formapagou',[
			'uses' => 'FormapagoController@actualiza',
			'as'   => 'formapago.actualiza'
]);





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
