<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
  	protected $fillable = [
		'nombre','descripcion_corta','descripcion_larga','modelo','marca',
		'tipo_parte_id', 'codigo_barras', 'numero_parte','stock_id', 
  	];
}
