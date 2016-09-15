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
            'email'             => 'administrador@admin.com',
            'password'          => bcrypt('admin'),
            'remember_token'    => str_random(10),
        ]);
        DB::table('users')->insert([
        'first_name'        => 'Doris',
        'last_name'         => 'Mejia',
        'full_name'         => 'Doris Mejia',
        'email'             => 'gabyhdzmejia@gmail.com',
        'password'          => bcrypt('doris1'),
        'remember_token'    => str_random(10),
        ]);
    }
}
