<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
 	protected $table = 'ventas';
  	protected $fillable = [
		'monto','iva','subtotal','total','descuento_id','estado_id',
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->where('monto','LIKE', "%$nombre%")
        		  ->orwhere('iva','LIKE', "%$nombre%")
        		  ->orwhere('subtotal','LIKE', "%$nombre%")
              ->orwhere('total','LIKE', "%$nombre%");
    }
}
