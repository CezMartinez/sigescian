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
        /**----------Roles----------**/

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

        /**---------Usuarios--------**/

        DB::table('permissions')->insert([
            'name' => 'Crear Usuarios',
            'slug' => 'crear-usuarios',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Usuarios',
            'slug' => 'editar-usuarios',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Usuarios',
            'slug' => 'ver-usuarios',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Eliminar Usuarios',
            'slug' => 'eliminar-usuarios',
        ]);

        /**---------Clientes--------**/

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
