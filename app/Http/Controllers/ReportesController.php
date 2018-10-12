<?php

namespace App\Http\Controllers;
use App\Transaccion;
use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ReportesController extends Controller
{
    public function show($id){
      /*$Total=DB::select('select SUM(precio_venta) AS total
        FROM transacciones INNER JOIN
        stock ON stock.`transaccion_id`=transacciones.`id`
        WHERE tipo_transaccion_id =2');
      $Fecha="2018-10-12";
      $Sucursal='SANTA LUCÍA';
      $Reporte='VENTAS';
      $Desglose=DB::select('SELECT *,SUBSTR(stock.created_at,1,10) AS ff FROM transacciones
        INNER JOIN 
        stock ON stock.`transaccion_id`=transacciones.`id`
        WHERE SUBSTR(stock.created_at,1,10) = "2018-10-09" AND tipo_transaccion_id=2');
      return view('Reportes.reporte', compact('Fecha','Sucursal','Reporte','Total','Desglose'));*/

      $Fecha="2018-10-12";
      $Sucursal='SANTA LUCÍA';
      $Reporte='TICKET';
      $transaccion = Transaccion::find($id);
      $cliente = Cliente::find($transaccion->cliente_id);

      $desgloses= DB::table('stock')
      ->join('productos', 'stock.producto_id', '=', 'productos.id')
      ->selectRaw('*,stock.id as stock__id, productos.id as productos__id')
      ->where('stock.transaccion_id','=',$transaccion->id)
      ->get();
      return view('Reportes.ticket', compact('Fecha','Sucursal','Reporte','Total','transaccion','desgloses','cliente'));
    }
}
