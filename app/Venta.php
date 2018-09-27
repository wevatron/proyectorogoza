<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
 	protected $table = 'ventas';
  	protected $fillable = [
		'monto','iva','subtotal','total','descuento_id'
  	]; 
}
