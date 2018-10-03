<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $fillable = ['codigo','b','c', 'd','e'];
    public $timestamps ='false';
}
