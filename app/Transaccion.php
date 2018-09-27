<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';
  	protected $fillable = [
  		'cantidad','proveedor_id','producto_id','precio_compra','precio_venta','venta_id','stock_id','compra_id','tipo_transaccion','estado_id',
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->where('cantidad','LIKE', "%$nombre%")
        		  ->orwhere('precio_compra','LIKE', "%$nombre%")
        		  ->orwhere('precio_venta','LIKE', "%$nombre%");
    }
}
