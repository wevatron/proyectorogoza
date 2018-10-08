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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cliente', 'ClienteController');
Route::resource('compra', 'CompraController');
Route::resource('descuento', 'DescuentoController');
Route::resource('producto', 'ProductoController');
Route::resource('proveedor', 'ProveedorController');
Route::resource('stock', 'StockController');
Route::resource('tipoparte', 'TipoparteController');
Route::resource('transaccion', 'TransaccionController');
Route::resource('venta', 'VentaController');
Route::resource('inventario', 'InventariosController');
Route::resource('clientedescuento', 'ClienteDescuentoController');
Route::get('clientedescuentoasync', 'ClienteController@obtener')->name('clientedescuentoasync');
Route::get('productotipoparteasync', 'ProductoController@obtener')->name('productotipoparteasync');
Route::get('proveedorasync', 'StockController@obtener')->name('proveedorasync');
Route::get('bodegaasync', 'StockController@obtenerBodega')->name('bodegaasync');

Route::get('puntoVenta', 'Pv@index')->name('puntoVenta');
Route::get('azInventario', 'Pv@inventario')->name('azInventario');

Route::post('stockasyn','StockController@insertar')->name('stockasyn');



Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

Route::get('/xx', function () {
    return view('importExport');
});
