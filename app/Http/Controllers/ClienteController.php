<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Clientes=Cliente::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('Clientes.index',compact('Clientes'));
  }

  public function edit($id){
  	$Clientes=Cliente::find($id);
  	return view ('Clientes.edit',compact('Clientes'));
  }

  public function create(){
    $Clientes=Cliente::all();
  	return view ('Clientes.create',compact('Clientes'));
  }

  public function store(ClienteRequest $request){
    $Clientes = new Cliente;
    $Clientes->nombre=strtoupper($request->nombre);
    $Clientes->rfc=strtoupper($request->rfc);
    $Clientes->direccion=strtoupper($request->direccion);
    $Clientes->telefono=$request->telefono;
    $Clientes->correo_electronico=strtoupper($request->correo_electronico);
    $Clientes->descuento_id=$request->descuento_id;
    $Clientes->estado_id=1;
    $Clientes->save();
    return redirect()->route('Clientes.index')
    ->with('info','El Cliente fue guardado');
  }

  public function update(ClienteRequest $request, $id){
    $Clientes = Cliente::find($id);
    $Clientes->nombre=strtoupper($request->nombre);
    $Clientes->rfc=strtoupper($request->rfc);
    $Clientes->direccion=strtoupper($request->direccion);
    $Clientes->telefono=$request->telefono;
    $Clientes->correo_electronico=strtoupper($request->correo_electronico);
    $Clientes->descuento_id=$request->descuento_id;
    $Clientes->save();
	  return redirect()->route('Clientes.index')
    ->with('info','El Cliente fue actualizado');
  }

  public function destroy($id){
    $Clientes = Cliente::find($id);
    $Clientes->estado_id=2;
    $Clientes->save();
    return redirect()->route('Clientes.index')
    ->with('info','El Cliente fue eliminado');
  }
}
