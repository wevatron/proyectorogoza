<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';
  	protected $fillable = [
  		'id',
      'tipo_transaccion_id'
  	];
   
}
