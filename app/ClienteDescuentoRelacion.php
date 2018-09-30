<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDescuentoRelacion extends Model
{
  protected  $primaryKey = 'id_cliente_descuento';
  protected $table = 'clientes_descuentos_relacion';
  protected $fillable = [
    'cliente_id','descuento_id','estado_id',
  ];
}
