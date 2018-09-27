<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoParte extends Model
{
    protected $table = 'tipo_partes';
  	protected $fillable = [
    	'nombre','descripcion',
  	];
}
