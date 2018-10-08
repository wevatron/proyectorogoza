<?php

use Illuminate\Database\Seeder;

class estadostockseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_stock')->insert([
            'estado' => "Entrada",
        ]);

        DB::table('estado_stock')->insert([
            'estado' => "Salida",
        ]);

        DB::table('estado_stock')->insert([
            'estado' => "Cancelado",
        ]);
    }
}
