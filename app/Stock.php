<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
  	protected $fillable = [
  		'cantidad','proveedor_id','producto_id','precio_compra','precio_venta',
  	];
}
