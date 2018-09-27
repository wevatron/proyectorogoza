<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->double('cantidad');
            $table->integer('proveedor_id');
            $table->integer('producto_id');
            $table->double('precio_compra');
            $table->double('precio_venta');
            $table->integer('venta_id');
            $table->integer('stock_id');
            $table->integer('compra_id');
            $table->integer('tipo_transaccion');       
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
