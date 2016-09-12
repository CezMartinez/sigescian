<?php

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            'name' => 'Oxigeno',
            'description'=>'Da energia a las celulas de la sangre'
        ]);
        DB::table('materials')->insert([
            'name' => 'Hidrogeno',
            'description' => 'Reductor de minerales metalicos'
        ]);
        DB::table('materials')->insert([
            'name' => 'Fosforo',
            'description' => 'Compuestos para fertilizantes'
        ]);
    }
}