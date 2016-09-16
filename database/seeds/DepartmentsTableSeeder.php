<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name'=>'Departamento de Electrónica Nuclear',
            'description'=>'Departamento de Electrónica Nuclear',
            'slug'=>'departamento-de-electronica-nuclear'
        ]);
        DB::table('departments')->insert([
            'name'=>'Departamento de Técnicas Analíticas Nucleares',
            'description'=>'Departamento de Técnicas Analíticas Nucleares',
            'slug'=>'departamento-de-tecnicas-analiticas-nucleares'
        ]);
        DB::table('departments')->insert([
            'name'=>'Departamento de Dosimetría y Metrología de Radionúclidos',
            'description'=>'Departamento de Dosimetría y Metrología de Radionúclidos',
            'slug'=>'departamento-de-dosimetria-y-metrologia-de-radionuclidos'
        ]);
    }
}
