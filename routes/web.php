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
Route::resource('clientedescuento', 'ClienteDescuentoController');
