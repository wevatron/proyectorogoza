<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table = 'descuentos';
  	protected $fillable = [
      'nombre','porcentaje','costo_fijo',
  	];
}
