<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
  	protected $fillable = [
		'nombre','descripcion_corta','descripcion_larga','modelo','marca',
		'tipo_parte_id', 'codigo_barras', 'numero_parte','stock_id','estado_id',
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->where('nombre','LIKE', "%$nombre%")
        		  ->orwhere('descripcion_corta','LIKE', "%$nombre%")
        		  ->orwhere('descripcion_larga','LIKE', "%$nombre%")
        		  ->orwhere('modelo','LIKE', "%$nombre%")
              ->orwhere('marca','LIKE', "%$nombre%")
        		  ->orwhere('codigo_barras','LIKE', "%$nombre%")
        		  ->orwhere('numero_parte','LIKE', "%$nombre%");
    }
}
