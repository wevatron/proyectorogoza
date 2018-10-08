<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class Pv extends Controller
{
      public function inventario(Request $req){
	    $Stock = DB::table('stock')
        ->join('productos', 'stock.producto_id', '=', 'productos.id')
        ->join('bodegas', 'stock.bodega_id', '=', 'bodegas.id')
        ->selectRaw('producto_id, sum(cantidad) existencias, productos.descripcion_larga as descripcion, productos.codigo_barras as codigo, productos.precioiva as iva, productos.nombre as label')
        ->groupBy('producto_id')
        ->havingRaw('SUM(cantidad) > 0')
        ->where('stock.estado_id', '=', 1)->get();

        return $Stock->toJson();

	    dd($Stock->toJson());

	  }

	  public function index(){
	    
	    return view('pv');

	  }
}
