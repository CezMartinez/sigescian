<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'        => 'Super',
            'last_name'         => 'Administrador',
            'full_name'         => 'Super Administrador',
            'email'             => 'administrador@cian.com',
            'password'          => bcrypt('admin'),
            'remember_token'    => str_random(10),
        ]);
        DB::table('users')->insert([
            'first_name'        => 'Cesar',
            'last_name'         => 'Martinez',
            'full_name'         => 'Cesar Martinez',
            'email'             => 'cesar@martinez.com',
            'password'          => bcrypt('cesar'),
            'remember_token'    => str_random(10),
        ]);
        DB::table('users')->insert([
            'first_name'        => 'Doris',
            'last_name'         => 'Mejia',
            'full_name'         => 'Doris Mejia',
            'email'             => 'doris@mejia.com',
            'password'          => bcrypt('doris'),
            'remember_token'    => str_random(10),
        ]);
        DB::table('users')->insert([
            'first_name'        => 'Samuel',
            'last_name'         => 'Zepeda',
            'full_name'         => 'Samuel Zepeda',
            'email'             => 'samuel@zepeda.com',
            'password'          => bcrypt('samuel'),
            'remember_token'    => str_random(10),
        ]);
        DB::table('users')->insert([
            'first_name'        => 'Mario',
            'last_name'         => 'Vides',
            'full_name'         => 'Mario Vides',
            'email'             => 'mario@vides.com',
            'password'          => bcrypt('mario'),
            'remember_token'    => str_random(10),
        ]);
        DB::table('users')->insert([
            'first_name'        => 'Kevin',
            'last_name'         => 'Garcia',
            'full_name'         => 'Kevin Garcia',
            'email'             => 'kevin@garcia.com',
            'password'          => bcrypt('kevin'),
            'remember_token'    => str_random(10),
        ]);
    }
}
