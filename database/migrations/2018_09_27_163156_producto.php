<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion_corta');
            $table->string('descripcion_larga');
            $table->string('modelo');
            $table->string('marca');
            $table->integer('tipo_parte_id');
            $table->string('codigo_barras');
            $table->double('numero_parte');
            $table->integer('stock_id');
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
        //
    }
}
