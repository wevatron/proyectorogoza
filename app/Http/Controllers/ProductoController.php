<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Productos=Producto::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('Productos.index',compact('Productos'));
  }

  public function edit($id){
  	$Productos=Producto::find($id);
  	return view ('Productos.edit',compact('Productos'));
  }

  public function create(){
    $Productos=Producto::all();
  	return view ('Productos.create',compact('Productos'));
  }
  //'nombre','descripcion_corta','descripcion_larga','modelo','marca',
  //'tipo_parte_id', 'codigo_barras', 'numero_parte','stock_id',
  public function store(ProductoRequest $request){
    $Productos = new Producto;
    $Productos->nombre=strtoupper($request->nombre);
    $Productos->descripcion_corta=strtoupper($request->descripcion_corta);
    $Productos->descripcion_larga=strtoupper($request->descripcion_larga);
    $Productos->modelo=strtoupper($request->modelo);
    $Productos->marca=strtoupper($request->marca);
    $Productos->tipo_parte_id=$request->tipo_parte_id;
    $Productos->codigo_barras=strtoupper($request->codigo_barras);
    $Productos->numero_parte=$request->numero_parte;
    $Productos->stock_id=$request->stock_id;
    $Productos->estado_id=1;
    $Productos->save();
    return redirect()->route('producto.index')
    ->with('info','El Producto fue guardado');
  }

  public function update(ProductoRequest $request, $id){
    $Productos = Producto::find($id);
    $Productos->nombre=strtoupper($request->nombre);
    $Productos->descripcion_corta=strtoupper($request->descripcion_corta);
    $Productos->descripcion_larga=strtoupper($request->descripcion_larga);
    $Productos->modelo=strtoupper($request->modelo);
    $Productos->marca=strtoupper($request->marca);
    $Productos->tipo_parte_id=$request->tipo_parte_id;
    $Productos->codigo_barras=strtoupper($request->codigo_barras);
    $Productos->numero_parte=$request->numero_parte;
    $Productos->stock_id=$request->stock_id;
    $Productos->save();
	  return redirect()->route('producto.index')
    ->with('info','El Producto fue actualizado');
  }

  public function destroy($id){
    $Productos = Producto::find($id);
    $Productos->estado_id=2;
    $Productos->save();
    return redirect()->route('producto.index')
    ->with('info','El Producto fue eliminado');
  }
}
