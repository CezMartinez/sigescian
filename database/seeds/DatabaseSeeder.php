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
        $this->call(StandardsTableSeeder::class);
        $this->call(SubStandardsTableSeeder::class);
        $this->call(SubSubStandardsTableSeeder::class);
        $this->call(SubSubSubStandardsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(PlantsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(LaboratoriesTableSeeder::class);
    }
}