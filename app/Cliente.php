<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
  	protected $fillable = [
		'nombre','rfc','direccion','telefono','correo_electronico','descuento_id'
  	];
}
