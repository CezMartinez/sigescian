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

        /**---------Materiales--------**/

        DB::table('permissions')->insert([
            'name' => 'Crear Materiales',
            'slug' => 'crear-materiales',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Materiales',
            'slug' => 'editar-materiales',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Eliminar Materiales',
            'slug' => 'eliminar-materiales',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Materiales',
            'slug' => 'ver-materiales',
        ]);

        /**---------Equipos--------**/

        DB::table('permissions')->insert([
            'name' => 'Crear Equipos',
            'slug' => 'crear-equipos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Equipos',
            'slug' => 'editar-equipos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Eliminar Equipos',
            'slug' => 'eliminar-equipos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Equipos',
            'slug' => 'ver-equipos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Calibrar Equipos',
            'slug' => 'calibrar-equipos',
        ]);

        /**---------Departamentos--------**/

        DB::table('permissions')->insert([
            'name' => 'Crear Departamentos',
            'slug' => 'crear-departamentos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Departamentos',
            'slug' => 'editar-departamentos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Eliminar Departamentos',
            'slug' => 'eliminar-departamentos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Departamentos',
            'slug' => 'ver-departamentos',
        ]);

        /**---------Laboratorios--------**/

        DB::table('permissions')->insert([
            'name' => 'Crear Laboratorios',
            'slug' => 'crear-laboratorios',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Laboratorios',
            'slug' => 'editar-laboratorios',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Eliminar Laboratorios',
            'slug' => 'eliminar-laboratorios',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Laboratorios',
            'slug' => 'ver-laboratorios',
        ]);

        /**---------Procedimientos Generales--------**/

        DB::table('permissions')->insert([
            'name' => 'Crear Procedimientos Generales',
            'slug' => 'crear-procedimientos-generales',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Procedimientos Generales',
            'slug' => 'editar-procedimientos-generales',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Procedimientos Generales',
            'slug' => 'ver-procedimientos-generales',
        ]);

        /**---------Procedimientos Tecnicos--------**/

        DB::table('permissions')->insert([
            'name' => 'Crear Procedimientos Técnicos',
            'slug' => 'crear-procedimientos-tecnicos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Editar Procedimientos Técnicos',
            'slug' => 'editar-procedimientos-tecnicos',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Procedimientos Técnicos',
            'slug' => 'ver-procedimientos-tecnicos',
        ]);

        /**---------Solicitudes--------**/

        DB::table('permissions')->insert([
            'name' => 'Crear Solicitudes',
            'slug' => 'crear-solicitudes',
        ]);
        DB::table('permissions')->insert([
            'name' => 'Ver Solicitudes',
            'slug' => 'ver-solicitudes',
        ]);
        /**---------Documentos--------**/

        DB::table('permissions')->insert([
            'name' => 'Ver Documentos',
            'slug' => 'ver-documentos',
        ]);


    }
}
