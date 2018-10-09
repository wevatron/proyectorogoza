<?php

namespace App\Http\Controllers;
use App\Stock;
use App\Transaccion;
use DB;
use App\Cliente;

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
        ->whereIn('stock.estado_id', array(1,2))
        ->orwhereRaw(" REPLACE(codigo_barras, '-', '')  like '%$req%'")
        ->orWhereRaw(" codigo_barras  like '%$req%'")->get();

        return $Stock->toJson();

	    //dd($Stock->toJson());

	  }

    public function recibo($id){
      $transaccion = Transaccion::find($id);
      $cliente = Cliente::find($transaccion->cliente_id);

      $desgloses= DB::table('stock')
      ->join('productos', 'stock.producto_id', '=', 'productos.id')
      ->selectRaw('*,stock.id as stock__id, productos.id as productos__id')
      ->where('stock.transaccion_id','=',$transaccion->id)
      ->paginate(50);
      //dd($desgloses);
      return view('recibo',compact('transaccion','desgloses','cliente'));
    }

    public function cliente(Request $req)
    {
      $cliente = DB::table('clientes')
        ->selectRaw(' nombre as value, nombre as label, id ')
        ->orwhereRaw(" nombre  like '%$req->nombre%' ")->get();

      return $cliente->toJson();
    }

	  public function index(){

	    return view('pv');

	  }
}












