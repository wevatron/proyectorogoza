<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Venta;
use App\Http\Requests\VentaRequest;

class VentaController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Ventas=Venta::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('Ventas.index',compact('Ventas'));
  }

  public function edit($id){
  	$Ventas=Venta::find($id);
  	return view ('Ventas.edit',compact('Ventas'));
  }

  public function create(){
    $Ventas=Venta::all();
  	return view ('Ventas.create',compact('Ventas'));
  }

  public function store(VentaRequest $request){
    $Ventas = new Venta;
    $Ventas->monto=$request->monto;
    $Ventas->iva=$request->iva;
    $Ventas->subtotal=$request->subtotal;
    $Ventas->total=$request->total;
    $Ventas->descuento_id=$request->descuento_id;
    $Ventas->estado_id=1;
    $Ventas->save();
    return redirect()->route('venta.index')
    ->with('info','La Venta fue guardada');
  }

  public function update(VentaRequest $request, $id){
    $Ventas = Venta::find($id);
    $Ventas->monto=$request->monto;
    $Ventas->iva=$request->iva;
    $Ventas->subtotal=$request->subtotal;
    $Ventas->total=$request->total;
    $Ventas->descuento_id=$request->descuento_id;
    $Ventas->save();
	  return redirect()->route('venta.index')
    ->with('info','La Venta fue actualizada');
  }

  public function destroy($id){
    $Ventas = Venta::find($id);
    $Ventas->estado_id=2;
    $Ventas->save();
    return redirect()->route('venta.index')
    ->with('info','La Venta fue eliminada');
  }
}
