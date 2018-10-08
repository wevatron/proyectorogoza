<?php

use Illuminate\Database\Seeder;

class bodegasseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        DB::table('bodegas')->insert([
            'nombre_bodega' => "Volcanes",
        ]);

        DB::table('bodegas')->insert([
            'nombre_bodega' => "Santa Lucia",
        ]);

        DB::table('bodegas')->insert([
            'nombre_bodega' => "Monumento",
        ]);
    }
}
