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
            'section' => 'Objeto y Campo de Aplicación',
            'route'=>'seccion_1',
        ]);
        DB::table('standards')->insert([
            'section' => 'Normas de Referencia',
            'route'=>'seccion_2',
        ]);
        DB::table('standards')->insert([
            'section' => 'Terminos y Definiciones',
            'route'=>'seccion_3',
        ]);
        DB::table('standards')->insert([
            'section' => 'Requisitos Relativos a la Gestión',
            'route'=>'seccion_4',
        ]);
        DB::table('standards')->insert([
            'section' => 'Requisitos Técnicos',
            'route'=>'seccion_5',
        ]);
        DB::table('standards')->insert([
            'section' => 'Correspondencia',
            'route'=>'seccion_6',
        ]);
    }
}
