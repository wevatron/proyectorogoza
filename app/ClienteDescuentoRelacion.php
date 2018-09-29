<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDescuentoRelacion extends Model
{
  protected $table = 'clientes_descuentos_relacion';
  protected $fillable = [
    'cliente_id','descuento_id','estado_id',
  ];
}
