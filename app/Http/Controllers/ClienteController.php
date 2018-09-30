<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cliente;
use App\Descuento;
use App\ClienteDescuentoRelacion;
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

  public function show(Request $request,$id){
    $Clientes=Cliente::find($id);
    $ClientesDescuentos= DB::select('select * from clientes_descuentos_relacion
    inner join clientes on clientes_descuentos_relacion.cliente_id = clientes.id
    inner join descuentos on clientes_descuentos_relacion.descuento_id = descuentos.id
    where clientes_descuentos_relacion.cliente_id='.$id.'
    and clientes.estado_id=1
    and descuentos.estado_id=1
    and clientes_descuentos_relacion.estado_id=1
    order by id_cliente_descuento desc');
    return view('Clientes.show',compact('ClientesDescuentos','Clientes'));
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
    $Clientes->estado_id=1;
    $Clientes->save();
    return redirect()->route('cliente.index')
    ->with('info','El Cliente fue guardado');
  }

  public function update(ClienteRequest $request, $id){
    $Clientes = Cliente::find($id);
    $Clientes->nombre=strtoupper($request->nombre);
    $Clientes->rfc=strtoupper($request->rfc);
    $Clientes->direccion=strtoupper($request->direccion);
    $Clientes->telefono=$request->telefono;
    $Clientes->correo_electronico=strtoupper($request->correo_electronico);
    $Clientes->save();
	  return redirect()->route('cliente.index')
    ->with('info','El Cliente fue actualizado');
  }

  public function destroy($id){
    $Clientes = Cliente::find($id);
    $Clientes->estado_id=2;
    $Clientes->save();
    return redirect()->route('cliente.index')
    ->with('info','El Cliente fue eliminado');
  }

  public function obtener(){
    return  Descuento::orderBy('id','desc')->where('estado_id',1)->get();

  }
}
