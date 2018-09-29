<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaccionDescuentoRelacion extends Model
{
  protected $table = 'transacciones_descuentos_relacion';
  protected $fillable = [
    'transaccion_id','descuento_id','estado_id',
  ];
}
