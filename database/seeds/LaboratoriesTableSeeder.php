<?php

use Illuminate\Database\Seeder;

class LaboratoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laboratories')->insert([
        	'name'=>'Fluorescencia de rayos X',
        	'description'=>'Laboratorio de Fluorescencia de rayos X y reflexión total de rayos x'
        	]);
        DB::table('laboratories')->insert([
        	'name'=>'Dosimetria',
        	'description'=>'Laboratorio de Dosimetria personal externa TLD'
        	]);
        DB::table('laboratories')->insert([
        	'name'=>'Calibracion',
        	'description'=>'Laboratorio de calibracion de monitores de radiacion'
        	]);
    }
}
