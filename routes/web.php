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
Route::group(['middleware' => ['verificausuario']], function () { //middleware, verifica que el usuario este logueado
//actualizar
		Route::get('actualizar', function () {
	    return \Sv\actualizar::a(); //cambio los boletos
	});

	Route::get('/dashboard', function () {
	    return view('dashboard');});
		Route::get('/', function () {
	    return view('dashboard');});
	//usuarios
	Route::get('usuarios', 'usuario@vertodos');
	Route::get('usuario-ver-{id}', 'usuario@verUsuario');
	
	Route::get('usuario-nuevo', function () {
	    return view('usuario/nuevo');
	});
	Route::get('usuario-modificar-{id}', 'usuario@ver_modificar');
	Route::post('modUsu','usuario@modificar');

	Route::get('usuario-baja-{id}', 'usuario@baja');
	Route::get('usuario-eliminar-{id}', 'usuario@eliminar');
	Route::post('regU','usuario@registrar');

	//privilegios usuarios
	Route::get('usuario-asignar-privilegios-{id}', 'privilegios@ver');
	Route::post('colPriv','privilegios@asignar');

	Route::get('pagina', function () { //eliminar cuando no se ocupe
	    return \Sv\Privilegios::verificar('3');
	    	});
	// panel de control
	Route::get('panel-control', 'control@ver');
	Route::post('modPag','control@modificar');
	//CLIENTES/*/
	Route::get('clientes', 'clientes@verTodos');
	Route::get('mis-clientes-{id}', 'clientes@mios'); //mi lista de clientes
	Route::get('cliente-nuevo', function () {
	    return view('clientes/nuevo');
	});
	Route::get('cliente-ver-{id}', 'clientes@ver');
	
	Route::get('cliente-modificar-{id}', 'clientes@ver_modificar');//lleva al formulario de modificacionde clientes
	Route::post('modCli','clientes@modificar');
	Route::post('addCli','clientes@nuevo');

	Route::get('cliente-correcto-{id}', 'clientes@correcto');
	

	//VIAJES * //
	Route::get('viajes-panel', 'viajes@ver_panel');
	Route::get('viajes-disponibles', 'viajes@ver_lista');
	Route::get('viajes-ver', 'viajes@ver_listaSimple');
	Route::get('viaje-nuevo', 'viajes@ver_nuevo');
	Route::post('addVia', 'viajes@nuevo');
	Route::get('viaje-modificar-{id}', 'viajes@ver_modificar');
	Route::post('modVia', 'viajes@modificar');
	Route::get('viaje-correcto-{id}', 'viajes@ver_correcto');
	Route::get('viaje-ver-{id}', 'viajes@ver_viaje');
	Route::get('viaje-descripcion-{id}', 'viajes@modificar_desc');
	Route::post('vmoddesc', 'viajes@mod_descripcion');

	//VENTAS* //
	Route::get('venta-nueva', 'ventas@ver');
	Route::get('contrato-asignar-{id}', 'ventas@verConCliente');
	Route::post('addVC', 'ventas@nuevoConCliente');
	Route::post('addVnta', 'ventas@nuevo');
	Route::get('venta-correcto-{id}', 'ventas@ver_correcto');
	Route::get('ventas-listar', 'ventas@listarTodas');
	Route::get('ventas-listar-historial', 'ventas@listarTodas_historial');//historial
	Route::get('ventas-mias', 'ventas@listarMias');
	Route::get('ventas-mias-historial', 'ventas@listarMias_historial');//historial
	Route::get('venta-ver-{id}', 'ventas@ver_venta');
	Route::get('venta-modificar-{id}', 'ventas@modificar_venta');
	Route::post('modVnta', 'ventas@modificar');
	//rutasJson
	Route::get('lc-{id?}', 'clientes@listarJson');//listarclientes
	Route::get('lb-{id?}', 'boletos@listarJson');//listarboletos
	Route::get('lbm-{idViaje?}-{idVenta?}', 'boletos@listarModJson');//listarboletos
	Route::get('lv-{id?}', 'viajes@listarJson');//listarviajes

	//PDF
	Route::get('pdf-venta-{id?}', 'pdfGenerador@venta');	
	Route::get('recibo-imprimir-{id?}', 'pdfGenerador@ticket');	

	//PAGOS
	Route::get('pago-realizar', 'pagos@ver_nuevo');
	Route::get('pago-abonar-{id?}', 'pagos@abonar');
	Route::post('addPago', 'pagos@add_pago');

}); // end middleware

// login usuarios 
Route::get('/login', function () {
    return view('login');
});
Route::post('logU','usuario@login');
Route::get('/logout', function () {
    session()->forget('SUser');
    return view('login');
});



