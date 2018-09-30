<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteDescuentoRequest;
use App\ClienteDescuentoRelacion;

class ClienteDescuentoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function show($id){
    $cliente=$id;
    return view ('ClientesDescuentos.create',compact('id','cliente'));
  }

  public function edit($id){
    $ClientesDescuentos=ClienteDescuentoRelacion::where('id_cliente_descuento','=',$id)->first();
    $cliente=$ClientesDescuentos->cliente_id;
    return view ('ClientesDescuentos.edit',compact('id','ClientesDescuentos','cliente'));
  }

  public function store(ClienteDescuentoRequest $request){
    $ClientesDescuentos = new ClienteDescuentoRelacion;
    $ClientesDescuentos->cliente_id=$request->cliente_id;
    $completo=explode( '-', strtoupper($request->descuento_id));
    $ClientesDescuentos->descuento_id=strtoupper($completo[0]);
    $ClientesDescuentos->estado_id=1;
    $ClientesDescuentos->save();
    return redirect()->route('cliente.show',$ClientesDescuentos->cliente_id)
    ->with('info','El Descuento fue añadido al cliente');
  }

  public function update(ClienteDescuentoRequest $request, $id){
    $ClientesDescuentos = ClienteDescuentoRelacion::find($id);
    $ClientesDescuentos->cliente_id=$request->cliente_id;
    $completo=explode( '-', strtoupper($request->descuento_id));
    $ClientesDescuentos->descuento_id=strtoupper($completo[0]);
    $ClientesDescuentos->save();
    return redirect()->route('cliente.show',$ClientesDescuentos->cliente_id)
    ->with('info','El Descuento se ha guardado');
  }

  public function destroy($id){
    $ClientesDescuentos = ClienteDescuentoRelacion::find($id);
    $ClientesDescuentos->estado_id=2;
    $ClientesDescuentos->save();
    return redirect()->route('cliente.show',$ClientesDescuentos->cliente_id)
    ->with('info','El Descuento fue retirado del cliente');
  }
}
