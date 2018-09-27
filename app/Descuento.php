<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuentos';
  	protected $fillable = [
      'nombre','porcentaje','costo_fijo','estado_id',
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->where('nombre','LIKE', "%$nombre%")
        		  ->orwhere('porcentaje','LIKE', "%$nombre%")
        		  ->orwhere('costo_fijo','LIKE', "%$nombre%")
        		  ->orwhere('estado_id','LIKE', "%$nombre%");
    }
}
