<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'Editar Formularios',
            'slug' => 'editar-formulario',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Procesos',
            'slug' => 'editar-procesos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Materiales',
            'slug' => 'editar-materiales',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Equipos',
            'slug' => 'editar-equipos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Laboratorios',
            'slug' => 'editar-laboratorio',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Eliminar Roles',
            'slug' => 'eliminar-roles',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Roles',
            'slug' => 'editar-roles',
        ]);DB::table('permissions')->insert([
            'name' => 'Editar Roles',
            'slug' => 'editar-roles',
        ]);DB::table('permissions')->insert([
            'name' => 'Editar Roles',
            'slug' => 'editar-roles',
        ]);DB::table('permissions')->insert([
            'name' => 'Editar Roles',
            'slug' => 'editar-roles',
        ]);

    }
}
