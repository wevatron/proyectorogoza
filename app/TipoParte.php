<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoParte extends Model
{
    protected $table = 'tipo_partes';
  	protected $fillable = [
    	'nombre','descripcion','estado_id',
  	];
    public function scopeNombre($query, $nombre){
        if($nombre)
            $query->where('nombre','LIKE', "%$nombre%")
        		  ->orwhere('descripcion','LIKE', "%$nombre%")
        		  ->orwhere('estado_id','LIKE', "%$nombre%");
    }
}
