<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Producto;
use App\Stock;
use App\TipoPArte;
use App\Http\Requests\ProductoRequest;
use DB;

class ProductoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Productos=Producto::orderBy('id','desc')
                  ->where('estado_id','=',1)
                  ->nombre($nombre)
                  ->paginate(20);
    return view('Productos.index',compact('Productos'));
  }

  public function edit($id){
  	$Productos=Producto::find($id);
    $tipo_partes = DB::table('tipo_partes')->select('nombre')
    ->where('id', '=', $Productos->tipo_parte_id)->limit(1)->get();
    //dd($tipo_partes[0]->id);
  	return view ('Productos.edit',compact('Productos','tipo_partes'));
   
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
    $completo=explode( '-', strtoupper($request->tipo_parte_id));
    $Productos->tipo_parte_id=strtoupper($completo[0]);
    $Productos->codigo_barras=strtoupper($request->codigo_barras);
    $Productos->precio=$request->precio;
    $Productos->precioiva=$request->precioiva;
    $Productos->comentario=strtoupper($request->comentario);
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
    $completo=explode( '-', strtoupper($request->tipo_parte_id));
    $Productos->tipo_parte_id=strtoupper($completo[0]);
    $Productos->codigo_barras=strtoupper($request->codigo_barras);
    $Productos->precio=$request->precio;
    $Productos->precioiva=$request->precioiva;
    $Productos->comentario=strtoupper($request->comentario);
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

  public function obtener(Request $req){
    return  DB::table('tipo_partes')
    ->where('nombre', 'like', "%$req->nombre%")
    ->select('nombre as label','nombre as value','id as miid' )
    ->limit(5)
    ->get();
  }

  public function show($id){
    $Productos = Producto::find($id);
    $Stocks = Stock::orderBy('stock.id','desc')
    ->selectRaw(' * , stock.id as sid')
    ->join('estado_stock', 'stock.estado_id', '=', 'estado_stock.id')
    ->where('producto_id','=',$id)
    ->whereIn('estado_id',[1,2])
    ->paginate(20);
    
    return view ('Productos.show3',compact('Productos','Stocks'));
  }

}














