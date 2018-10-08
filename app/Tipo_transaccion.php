<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_transaccion extends Model
{
     protected $table = 'tipo_transaccion';
  	protected $fillable = [
      'nombre',
  	];
}
