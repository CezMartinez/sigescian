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
            'name' => 'Crear Roles',
            'slug' => 'crear-roles',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Roles',
            'slug' => 'editar-roles',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Roles',
            'slug' => 'ver-roles',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Eliminar Roles',
            'slug' => 'eliminar-roles',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Roles',
            'slug' => 'editar-roles',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Crear Clientes',
            'slug' => 'crear-clientes',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Clientes',
            'slug' => 'editar-clientes',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Eliminar Clientes',
            'slug' => 'eliminar-clientes',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Clientes',
            'slug' => 'ver-clientes',
        ]);

    }
}
