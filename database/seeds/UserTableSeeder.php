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
            'first_name'        => 'Gabriela',
            'last_name'         => 'Mejia',
            'full_name'         => 'Gabriela Mejia',
            'email'             => 'gabyhdzmejia@gmail.com',
            'password'          => bcrypt('123456'),
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
    }
}
