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
    }
}
