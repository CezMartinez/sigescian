<?php

use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
            'name' => 'Industria',
        ]);
        DB::table('activities')->insert([
            'name' => 'Medicina',
        ]);
        DB::table('activities')->insert([
            'name' => 'Docencia e Investigación',
        ]);
        DB::table('activities')->insert([
            'name' => 'Seguridad y Prevención',
        ]);
        DB::table('activities')->insert([
            'name' => 'Transporte',
        ]);
        DB::table('activities')->insert([
            'name' => 'Otro',
        ]);
    }
}
