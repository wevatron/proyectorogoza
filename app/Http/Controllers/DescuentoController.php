<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Descuento;
use App\Http\Requests\DescuentoRequest;

class DescuentoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Descuentos=Descuento::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('Descuentos.index',compact('Descuentos'));
  }

  public function edit($id){
  	$Descuentos=Descuento::find($id);
  	return view ('Descuentos.edit',compact('Descuentos'));
  }

  public function create(){
    $Descuentos=Descuento::all();
  	return view ('Descuentos.create',compact('Descuentos'));
  }

  public function store(DescuentoRequest $request){
    $Descuentos = new Descuento;
    $Descuentos->nombre=strtoupper($request->nombre);
    $Descuentos->porcentaje=$request->porcentaje;
    $Descuentos->costo_fijo=$request->costo_fijo;
    $Descuentos->estado_id=1;
    $Descuentos->save();
    return redirect()->route('Descuentos.index')
    ->with('info','El Descuento fue guardado');
  }

  public function update(DescuentoRequest $request, $id){
    $Descuentos = Descuento::find($id);
    $Descuentos->nombre=strtoupper($request->nombre);
    $Descuentos->porcentaje=$request->porcentaje;
    $Descuentos->costo_fijo=$request->costo_fijo;
    $Descuentos->save();
	  return redirect()->route('Descuentos.index')
    ->with('info','El Descuento fue actualizado');
  }

  public function destroy($id){
    $Descuentos = Descuento::find($id);
    $Descuentos->estado_id=2;
    $Descuentos->save();
    return redirect()->route('Descuentos.index')
    ->with('info','El Descuento fue eliminado');
  }
}
