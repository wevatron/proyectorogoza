<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
  	protected $fillable = [
		'nombre','RFC','representante_legal','direccion','telefono','clave_interbancaria',
		'cuenta','cuenta_debito','correo_electronico','banco','descripcion',
  	];
}
