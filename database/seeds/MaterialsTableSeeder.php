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
            'name' => 'Tubo de Ensayo',
            'description'=>'Ocupado para la mezcla de compuestos',
            'slug'=>'tubo-de-ensayo',
            'laboratory_id'=>1
        ]);
        DB::table('materials')->insert([
            'name' => 'Acido Clorihidrico',
            'description' => 'Reductor de minerales metalicos',
            'slug'=>'acido-clorihidrico',
            'laboratory_id'=>2

        ]);
    }
}