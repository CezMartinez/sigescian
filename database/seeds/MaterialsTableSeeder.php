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
        ]);
        DB::table('materials')->insert([
            'name' => 'Tricarbonato de magnesio',
        ]);
        DB::table('materials')->insert([
            'name' => 'Acido desoxidoribonucleico',
        ]);
    }
}