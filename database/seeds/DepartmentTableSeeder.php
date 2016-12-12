<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            "name"          => "Departamento de Electronica Nuclear",
            "slug"          => "departamento-de-electronica-nuclear",
            "description"   => "Departamento que estudia el subcampo de la electrónica en donde se ocupan del diseño y uso de sistemas electrónicos de alta velocidad para la física nuclear y física de partículas elementales de investigación",
        ]);
    }
}
