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
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CustomerTypesTableSeeder::class);
        $this->call(StandardsTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(PlantsTableSeeder::class);
        $this->call(LaboratoriesTableSeeder::class);
    }
}