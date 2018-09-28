<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Stock=Stock::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('Stock.index',compact('Stock'));
  }

  public function edit($id){
  	$Stock=Stock::find($id);
  	return view ('Stock.edit',compact('Stock'));
  }

  public function create(){
    $Stock=Stock::all();
  	return view ('Stock.create',compact('Stock'));
  }

  public function store(StockRequest $request){
    $Stock = new Stock;
    $Stock->cantidad=$request->cantidad;
    $Stock->proveedor_id=$request->proveedor_id;
    $Stock->producto_id=$request->producto_id;
    $Stock->precio_compra=$request->precio_compra;
    $Stock->precio_venta=$request->precio_venta;
    $Stock->estado_id=1;
    $Stock->save();
    return redirect()->route('stock.index')
    ->with('info','El Stock fue guardado');
  }

  public function update(StockRequest $request, $id){
    $Stock = Stock::find($id);
    $Stock->cantidad=$request->cantidad;
    $Stock->proveedor_id=$request->proveedor_id;
    $Stock->producto_id=$request->producto_id;
    $Stock->precio_compra=$request->precio_compra;
    $Stock->precio_venta=$request->precio_venta;
    $Stock->save();
	  return redirect()->route('stock.index')
    ->with('info','El Stock fue actualizado');
  }

  public function destroy($id){
    $Stock = Stock::find($id);
    $Stock->estado_id=2;
    $Stock->save();
    return redirect()->route('stock.index')
    ->with('info','El Stock fue eliminado');
  }
}
