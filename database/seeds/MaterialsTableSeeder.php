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
            'description'=>'Da energia a las celulas de la sangre',
            'slug'=>'oxigeno-1'
        ]);
        DB::table('materials')->insert([
            'name' => 'Hidrogeno',
            'description' => 'Reductor de minerales metalicos',
            'slug'=>'hidrogeno-1'
        ]);
        DB::table('materials')->insert([
            'name' => 'Fosforo',
            'description' => 'Compuestos para fertilizantes',
            'slug'=>'fosforo-1'

        ]);
    }
}