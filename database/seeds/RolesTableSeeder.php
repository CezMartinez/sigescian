<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        'name' => 'Administrador del Sistema',
        'slug' => 'administrador-del-sistema',
        ]);
        DB::table('roles')->insert([
        'name' => 'Jefe de Departamento',
        'slug' => 'jefe-de-departamento',
        ]);
        DB::table('roles')->insert([
        'name' => 'Jefe de Calidad',
        'slug' => 'jefe-de-calidad',
        ]);
        DB::table('roles')->insert([
        'name' => 'Tecnico',
        'slug' => 'tecnico',
        ]);
    }
}
