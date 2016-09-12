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
            'name' => 'Peroxido de Cloruro',
            'description'=>'Cloruro de Peroxido',
        ]);
        DB::table('materials')->insert([
            'name' => 'Tricarbonato de magnesio',
            'description' => 'Magnesio de tricarbonato',
        ]);
        DB::table('materials')->insert([
            'name' => 'Acido desoxidoribonucleico',
            'description' => 'Desoxidoribonucleico Acido',

        ]);
    }
}