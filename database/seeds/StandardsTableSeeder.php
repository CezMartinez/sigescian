<?php

use Illuminate\Database\Seeder;

class StandardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('standards')->insert([
            'section' => 'Sección 2',
            'route'=>'norma-seccion-2.pdf',
        ]);
        DB::table('standards')->insert([
            'section' => 'Sección 4',
            'route'=>'norma-seccion-4.pdf',
        ]);
    }
}
