<?php

use Illuminate\Database\Seeder;

class tipotransseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_transaccion')->insert([
            'tipo' => "Compra",
        ]);

        DB::table('tipo_transaccion')->insert([
            'tipo' => "Venta",
        ]);

        DB::table('tipo_transaccion')->insert([
            'tipo' => "Compra credito",
        ]);

        DB::table('tipo_transaccion')->insert([
            'tipo' => "Venta credito",
        ]);

        DB::table('tipo_transaccion')->insert([
            'tipo' => "Compra credito pagada",
        ]);

        DB::table('tipo_transaccion')->insert([
            'tipo' => "Venta credito pagada",
        ]);

        DB::table('tipo_transaccion')->insert([
            'tipo' => "Cancelacion",
        ]);
    }
}
