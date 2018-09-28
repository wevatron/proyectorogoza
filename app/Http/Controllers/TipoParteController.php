<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TipoParte;
use App\Http\Requests\TipoParteRequest;

class TipoParteController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $nombre = $request->get('nombre');
    $TipoPartes=TipoParte::orderBy('id','desc')
                  ->where('estado_id',1)
                  ->nombre($nombre)
                  ->paginate(20);

    return view('TipoPartes.index',compact('TipoPartes'));
  }

  public function edit($id){
  	$TipoPartes=TipoParte::find($id);
  	return view ('TipoPartes.edit',compact('TipoPartes'));
  }

  public function create(){
    $TipoPartes=TipoParte::all();
  	return view ('TipoPartes.create',compact('TipoPartes'));
  }

  public function store(TipoParteRequest $request){
    $TipoPartes = new TipoParte;
    $TipoPartes->nombre=strtoupper($request->nombre);
    $TipoPartes->descripcion=strtoupper($request->descripcion);
    $TipoPartes->estado_id=1;
    $TipoPartes->save();
    return redirect()->route('tipoparte.index')
    ->with('info','El Tipo de parte fue guardado');
  }

  public function update(TipoParteRequest $request, $id){
    $TipoPartes = TipoParte::find($id);
    $TipoPartes->nombre=strtoupper($request->nombre);
    $TipoPartes->descripcion=strtoupper($request->descripcion);
    $TipoPartes->save();
	  return redirect()->route('tipoparte.index')
    ->with('info','El Tipo de parte fue actualizado');
  }

  public function destroy($id){
    $TipoPartes = TipoParte::find($id);
    $TipoPartes->estado_id=2;
    $TipoPartes->save();
    return redirect()->route('tipoparte.index')
    ->with('info','El Tipo de parte fue eliminado');
  }
}
