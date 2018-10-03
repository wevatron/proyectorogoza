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
            $table->string('nombre')->nullable();
            $table->string('descripcion_corta')->nullable();
            $table->string('descripcion_larga')->nullable();
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->integer('tipo_parte_id')->nullable();
            $table->string('codigo_barras')->nullable();
            $table->double('numero_parte')->nullable();
            $table->double('precio')->nullable();
            $table->double('precioiva')->nullable();
            $table->string('comentario')->nullable();
            $table->integer('stock_id')->nullable();
            $table->integer('estado_id')->nullable();
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
