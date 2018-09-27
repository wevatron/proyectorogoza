<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
  	protected $fillable = [
		'nombre','RFC','representante_legal','direccion','telefono','clave_interbancaria',
		'cuenta','cuenta_debito','correo_electronico','banco','descripcion','estado_id',
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->where('nombre','LIKE', "%$nombre%")
        		  ->orwhere('RFC','LIKE', "%$nombre%")
        		  ->orwhere('representante_legal','LIKE', "%$nombre%")
        		  ->orwhere('direccion','LIKE', "%$nombre%")
              ->orwhere('telefono','LIKE', "%$nombre%")
        		  ->orwhere('clave_interbancaria','LIKE', "%$nombre%")
        		  ->orwhere('cuenta','LIKE', "%$nombre%")
              ->orwhere('cuenta_debito','LIKE', "%$nombre%")
              ->orwhere('correo_electronico','LIKE', "%$nombre%")
        		  ->orwhere('banco','LIKE', "%$nombre%")
        		  ->orwhere('descripcion','LIKE', "%$nombre%");
    }
}
