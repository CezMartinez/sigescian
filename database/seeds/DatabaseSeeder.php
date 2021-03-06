<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolePermissionsSeeder::class);
        $this->call(CustomerTypesTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(SubSectionsTableSeeder::class);
        $this->call(AdministrativeProcedureTableSeeder::class);
    }
}