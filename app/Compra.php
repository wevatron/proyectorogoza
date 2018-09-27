<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
  	protected $fillable = [
    	'monto','iva','subtotal','total','descuento','estado_id',
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->where('monto','LIKE', "%$nombre%")
        		  ->orwhere('iva','LIKE', "%$nombre%")
        		  ->orwhere('subtotal','LIKE', "%$nombre%")
        		  ->orwhere('total','LIKE', "%$nombre%")
        		  ->orwhere('descuento','LIKE', "%$nombre%");
    }
}
