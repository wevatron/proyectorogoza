<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proveedor;
use App\Http\Requests\ProveedorRequest;

class ProveedorController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Proveedores=Proveedor::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('Proveedores.index',compact('Proveedores'));
  }

  public function edit($id){
  	$Proveedores=Proveedor::find($id);
  	return view ('Proveedores.edit',compact('Proveedores'));
  }

  public function create(){
    $Proveedores=Proveedor::all();
  	return view ('Proveedores.create',compact('Proveedores'));
  }

  public function store(ProveedoreRequest $request){
    $Proveedores = new Proveedor;
    $Proveedores->nombre=strtoupper($request->nombre);
    $Proveedores->RFC=strtoupper($request->RFC);
    $Proveedores->representante_legal=strtoupper($request->representante_legal);
    $Proveedores->direccion=strtoupper($request->direccion);
    $Proveedores->telefono=strtoupper($request->telefono);
    $Proveedores->clave_interbancaria=strtoupper($request->clave_interbancaria);
    $Proveedores->cuenta=strtoupper($request->cuenta);
    $Proveedores->cuenta_debito=strtoupper($request->cuenta_debito);
    $Proveedores->correo_electronico=strtoupper($request->correo_electronico);
    $Proveedores->banco=strtoupper($request->banco);
    $Proveedores->descripcion=strtoupper($request->descripcion);
    $Proveedores->estado_id=1;
    $Proveedores->save();
    return redirect()->route('Proveedores.index')
    ->with('info','El Proveedor fue guardado');
  }

  public function update(ProveedoreRequest $request, $id){
    $Proveedores = Proveedor::find($id);
    $Proveedores->nombre=strtoupper($request->nombre);
    $Proveedores->RFC=strtoupper($request->RFC);
    $Proveedores->representante_legal=strtoupper($request->representante_legal);
    $Proveedores->direccion=strtoupper($request->direccion);
    $Proveedores->telefono=strtoupper($request->telefono);
    $Proveedores->clave_interbancaria=strtoupper($request->clave_interbancaria);
    $Proveedores->cuenta=strtoupper($request->cuenta);
    $Proveedores->cuenta_debito=strtoupper($request->cuenta_debito);
    $Proveedores->correo_electronico=strtoupper($request->correo_electronico);
    $Proveedores->banco=strtoupper($request->banco);
    $Proveedores->descripcion=strtoupper($request->descripcion);
    $Proveedores->save();
	  return redirect()->route('Proveedores.index')
    ->with('info','El Proveedor fue actualizado');
  }

  public function destroy($id){
    $Proveedores = Proveedor::find($id);
    $Proveedores->estado_id=2;
    $Proveedores->save();
    return redirect()->route('Proveedores.index')
    ->with('info','El Proveedor fue eliminado');
  }
}
