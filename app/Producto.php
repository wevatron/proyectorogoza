<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
  	protected $fillable = [
		'nombre','descripcion_corta','descripcion_larga','modelo','marca',
		'tipo_parte_id', 'codigo_barras', 'numero_parte','precio','precioiva','stock_id',
    'estado_id','tipo_transaccion_id',
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->whereRaw(" REPLACE(codigo_barras, '-', '')  like '%$nombre%'")
            ->orWhereRaw(" codigo_barras  like '%$nombre%'");
    }
}
