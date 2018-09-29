<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteDescuentoRequest;
use App\ClienteDescuentoRelacion;

class ClienteDescuentoController extends Controller
{
  public function show($id){
    $ClientesDescuentos=ClienteDescuentoRelacion::where('id_cliente_descuento','=',$id)->first();
    return view ('ClientesDescuentos.create',compact('id','ClientesDescuentos'));
  }
  public function edit($id){
    $ClientesDescuentos=ClienteDescuentoRelacion::where('id_cliente_descuento','=',$id)->first();

    return view ('ClientesDescuentos.edit',compact('id','ClientesDescuentos'));
  }
  public function store(ClienteDescuentoRequest $request){
    $ClientesDescuentos = new ClienteDescuentoRelacion;
    $ClientesDescuentos->cliente_id=$request->cliente_id;
    $ClientesDescuentos->descuento_id=$request->descuento_id;
    $ClientesDescuentos->estado_id=1;
    $ClientesDescuentos->save();
    return redirect()->route('cliente.show',$ClientesDescuentos->cliente_id)
    ->with('info','El Descuento fue guardado');
  }
  public function update(ClienteDescuentoRequest $request, $id){
    $ClientesDescuentos = new ClienteDescuentoRelacion;
    $ClientesDescuentos->cliente_id=$request->cliente_id;
    $ClientesDescuentos->descuento_id=$request->descuento_id;
    $ClientesDescuentos->estado_id=1;
    $ClientesDescuentos->save();
    return redirect()->route('cliente.show',$ClientesDescuentos->cliente_id)
    ->with('info','El Descuento fue guardado');
  }
}
