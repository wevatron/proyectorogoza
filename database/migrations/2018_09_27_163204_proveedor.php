<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('RFC');
            $table->string('representante_legal');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('clave_interbancaria');
            $table->string('cuenta');
            $table->string('cuenta_debito');
            $table->string('correo_electronico');
            $table->string('banco');
            $table->string('descripcion');
            $table->integer('estado_id');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
