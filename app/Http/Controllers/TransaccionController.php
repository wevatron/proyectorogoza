<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaccion;
use App\Http\Requests\TransaccionRequest;

class TransaccionController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Transacciones=Transaccion::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('Transacciones.index',compact('Transacciones'));
  }

  public function edit($id){
  	$Transacciones=Transaccion::find($id);
  	return view ('Transacciones.edit',compact('Transacciones'));
  }

  public function create(){
    $Transacciones=Transaccion::all();
  	return view ('Transacciones.create',compact('Transacciones'));
  }

  public function store(TransaccionRequest $request){
    $Transacciones = new Transaccion;
    $Transacciones->cantidad=$request->cantidad;
    $Transacciones->proveedor_id=$request->proveedor_id;
    $Transacciones->producto_id=$request->producto_id;
    $Transacciones->precio_compra=$request->precio_compra;
    $Transacciones->precio_venta=$request->precio_venta;
    $Transacciones->venta_id=$request->venta_id;
    $Transacciones->stock_id=$request->stock_id;
    $Transacciones->compra_id=$request->compra_id;
    $Transacciones->tipo_transaccion=$request->tipo_transaccion;
    $Transacciones->estado_id=1;
    $Transacciones->save();
    return redirect()->route('transaccion.index')
    ->with('info','El Tipo de parte fue guardado');
  }

  public function update(TransaccionRequest $request, $id){
    $Transacciones = Transaccion::find($id);
    $Transacciones->cantidad=$request->cantidad;
    $Transacciones->proveedor_id=$request->proveedor_id;
    $Transacciones->producto_id=$request->producto_id;
    $Transacciones->precio_compra=$request->precio_compra;
    $Transacciones->precio_venta=$request->precio_venta;
    $Transacciones->venta_id=$request->venta_id;
    $Transacciones->stock_id=$request->stock_id;
    $Transacciones->compra_id=$request->compra_id;
    $Transacciones->tipo_transaccion=$request->tipo_transaccion;
    $Transacciones->save();
	  return redirect()->route('transaccion.index')
    ->with('info','El Tipo de parte fue actualizado');
  }

  public function destroy($id){
    $Transacciones = Transaccion::find($id);
    $Transacciones->estado_id=2;
    $Transacciones->save();
    return redirect()->route('transaccion.index')
    ->with('info','El Tipo de parte fue eliminado');
  }
}
