<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
  	protected $fillable = [
		'nombre','rfc','direccion','telefono','correo_electronico','descuento_id','estado_id',
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->where('nombre','LIKE', "%$nombre%")
        		  ->orwhere('rfc','LIKE', "%$nombre%")
        		  ->orwhere('direccion','LIKE', "%$nombre%")
        		  ->orwhere('telefono','LIKE', "%$nombre%")
        		  ->orwhere('correo_electronico','LIKE', "%$nombre%");
    }
}
