<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;
use App\Proveedor;
use App\Http\Requests\StockRequest;
use DB;

class StockController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $Stock=Stock::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('Stock.index',compact('Stock'));
  }

  public function edit($id){
  	$Stock=Stock::find($id);
    $Proveedor=Proveedor::where('id','=',$Stock->proveedor_id)->first();

    $id=$Stock->producto_id;
  	return view ('Stock.edit',compact('Stock','id','Proveedor'));
  }

  public function show($id){

    return view ('Stock.create',compact('id'));
  }

  public function store(StockRequest $request){
    $Stock = new Stock;
    $Stock->cantidad=$request->cantidad;
    $completo=explode( '-', strtoupper($request->proveedor_id));
    $Stock->proveedor_id=strtoupper($completo[0]);
    $Stock->producto_id=$request->producto_id;
    $Stock->precio_compra=$request->precio_compra;
    $Stock->precio_venta=$request->precio_venta;
    $Stock->bodega_id=$request->bodega_id;
    $Stock->estado_id=1;
    $Stock->save();
    return redirect()->route('producto.show',$Stock->producto_id)
    ->with('info','El Stock fue guardado');
  }

  public function update(StockRequest $request, $id){
    $Stock = Stock::find($id);
    $Stock->cantidad=$request->cantidad;
    $completo=explode( '-', strtoupper($request->proveedor_id));
    $Stock->proveedor_id=strtoupper($completo[0]);
    $Stock->producto_id=$request->producto_id;
    $Stock->precio_compra=$request->precio_compra;
    $Stock->precio_venta=$request->precio_venta;
    $Stock->bodega_id=$request->bodega_id;
    $Stock->save();
    return redirect()->route('producto.show',$Stock->producto_id)
    ->with('info','El Stock fue guardado');
  }

  public function destroy($id){
    $Stock = Stock::find($id);
    $Stock->estado_id=3;
    $Stock->save();
    return redirect()->route('producto.show',$Stock->producto_id)
    ->with('info','El Stock fue guardado');
  }

  public function obtener(Request $req){
    return  DB::table('proveedores')
    ->where('nombre', 'like', "%$req->nombre%")
    ->select('nombre as label','nombre as value','id as miid' )
    ->limit(5)
    ->get();

  }
  public function obtenerBodega(Request $req){
    return  DB::table('bodegas')
    ->where('nombre_bodega', 'like', "%$req->nombre%")
    ->select('nombre_bodega as label','nombre_bodega as value','id as miid' )
    ->limit(5)
    ->get();

  }

  public function insertar(){

    foreach ($_POST['lalo'] as $value) {
        
        $stock = new Stock;
        $stock->cantidad = 10;
        $stock->proveedor_id = 0;
        $stock->producto_id = 0;
        $stock->precio_compra = 100;
        $stock->precio_venta = 120;
        $stock->estado_id = 2;
        $stock->bodega_id = 1;
        $stock->save();
    }


    echo "ok";
    /*

    $Stock = new Stock;
    $Stock->cantidad=$cantidad;
    $completo=explode( '-', strtoupper($proveedor_id));
    $Stock->proveedor_id=strtoupper($completo[0]);
    $Stock->producto_id=$producto_id;
    $Stock->precio_compra=$precio_compra;
    $Stock->precio_venta=$precio_venta;
    $Stock->bodega_id=$bodega_id;
    $Stock->estado_id=1;
    $Stock->save();
    */
  }
}
