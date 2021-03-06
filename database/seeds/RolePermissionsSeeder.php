<?php

use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            'role_id'       => '1',
            'permission_id' => '1',
        ]);
        DB::table('permission_role')->insert([
            'role_id'       => '1',
            'permission_id' => '2',
        ]);
        DB::table('permission_role')->insert([
            'role_id'       => '1',
            'permission_id' => '3',
        ]);
        DB::table('permission_role')->insert([
            'role_id'       => '1',
            'permission_id' => '4',
        ]);
        DB::table('permission_role')->insert([
            'role_id'       => '1',
            'permission_id' => '5',
        ]);
        DB::table('permission_role')->insert([
            'role_id'       => '1',
            'permission_id' => '6',
        ]);
        DB::table('permission_role')->insert([
            'role_id'       => '1',
            'permission_id' => '7',
        ]);
        DB::table('permission_role')->insert([
            'role_id'       => '1',
            'permission_id' => '8',
        ]);
        DB::table('role_user')->insert([
            'user_id'       => '1',
            'role_id'       => '1',
        ]);
        DB::table('role_user')->insert([
            'user_id'       => '2',
            'role_id'       => '2',
        ]);
        for ($i = 1;$i<=34;$i++){
            DB::table('permission_role')->insert([
                'role_id'       => '2',
                'permission_id' => $i
            ]);
        }

    }
}
