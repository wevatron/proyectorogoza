<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
  	protected $fillable = [
  		'cantidad','proveedor_id','producto_id','precio_compra','precio_venta','estado_id','bodega_id'
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->where('cantidad','LIKE', "%$nombre%")
        		  ->orwhere('precio_compra','LIKE', "%$nombre%")
        		  ->orwhere('precio_venta','LIKE', "%$nombre%");
    }
}
