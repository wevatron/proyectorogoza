<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
  	protected $fillable = [
    	'monto','iva','subtotal','total','descuento'
  	];
}
