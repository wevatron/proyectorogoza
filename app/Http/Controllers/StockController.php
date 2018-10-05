<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;
use App\Proveedor;
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
    $Proveedor=Proveedor::where('id','=',$Stock->proveedor_id)->first();

    $id=$Stock->producto_id;
  	return view ('Stock.edit',compact('Stock','id','Proveedor'));
  }

  public function show($id){

    return view ('Stock.create',compact('id'));
  }

  public function store(StockRequest $request){
    $Stock = new Stock;
    $Stock->cantidad=$request->cantidad;
    $completo=explode( '-', strtoupper($request->proveedor_id));
    $Stock->proveedor_id=strtoupper($completo[0]);
    $Stock->producto_id=$request->producto_id;
    $Stock->precio_compra=$request->precio_compra;
    $Stock->precio_venta=$request->precio_venta;
    $Stock->bodega_id=$request->bodega_id;
    $Stock->estado_id=1;
    $Stock->save();
    return redirect()->route('producto.show',$Stock->producto_id)
    ->with('info','El Stock fue guardado');
  }

  public function update(StockRequest $request, $id){
    $Stock = Stock::find($id);
    $Stock->cantidad=$request->cantidad;
    $completo=explode( '-', strtoupper($request->proveedor_id));
    $Stock->proveedor_id=strtoupper($completo[0]);
    $Stock->producto_id=$request->producto_id;
    $Stock->precio_compra=$request->precio_compra;
    $Stock->precio_venta=$request->precio_venta;
    $Stock->bodega_id=$request->bodega_id;
    $Stock->save();
    return redirect()->route('producto.show',$Stock->producto_id)
    ->with('info','El Stock fue guardado');
  }

  public function destroy($id){
    $Stock = Stock::find($id);
    
    $Stock->estado_id=2;
    $Stock->save();
    return redirect()->route('producto.show',$Stock->producto_id)
    ->with('info','El Stock fue guardado');
  }

  public function obtener(){
    return  Proveedor::orderBy('id','desc')->where('estado_id',1)->get();

  }
}
