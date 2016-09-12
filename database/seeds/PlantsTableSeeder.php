<?php

use Illuminate\Database\Seeder;

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plants')->insert([
            'name' => 'Equipo de rayos X',
            'brand'=>'Lenovo',
            'model'=>'Thinkpad'
        ]);
        DB::table('plants')->insert([
            'name' => 'Equipo de rayos Y',
            'brand'=>'HP',
            'model'=>'Pavilion'
        ]);
        DB::table('plants')->insert([
            'name' => 'Equipo de rayos Z',
            'brand'=>'Sony',
            'model'=>'Vaio'
        ]);
    }
}
