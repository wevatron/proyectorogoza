<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Compra;
use App\Http\Requests\CompraRequest;

class CompraController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Compras=Compra::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('Compras.index',compact('Compras'));
  }

  public function edit($id){
  	$Compras=Compra::find($id);
  	return view ('Compras.edit',compact('Compras'));
  }

  public function create(){
    $Compras=Compra::all();
  	return view ('Compras.create',compact('Compras'));
  }

  public function store(CompraRequest $request){
    $Compras = new Compra;
    $Compras->monto=$request->monto;
    $Compras->iva=$request->iva;
    $Compras->subtotal=$request->subtotal;
    $Compras->total=$request->total;
    $Compras->descuento=$request->descuento;
    $Compras->estado_id=1;
    $Compras->save();
    return redirect()->route('Compras.index')
    ->with('info','La Compra fue guardada');
  }

  public function update(CompraRequest $request, $id){
    $Compras = Compra::find($id);
    $Compras->monto=$request->monto;
    $Compras->iva=$request->iva;
    $Compras->subtotal=$request->subtotal;
    $Compras->total=$request->total;
    $Compras->descuento=$request->descuento;
    $Compras->save();
	  return redirect()->route('Compras.index')
    ->with('info','La Compra fue actualizada');
  }

  public function destroy($id){
    $Compras = Compra::find($id);
    $Compras->estado_id=2;
    $Compras->save();
    return redirect()->route('Compras.index')
    ->with('info','La Compra fue eliminada');
  }
}
