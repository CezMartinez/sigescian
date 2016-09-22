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
        $this->call(SectionTableSeeder::class);
        $this->call(SubSectionL1sTableSeeder::class);
        $this->call(SubSectionL2sTableSeeder::class);
        $this->call(SubSectionL3sTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
      //  $this->call(PlantsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(LaboratoriesTableSeeder::class);
        $this->call(AdministrativeProcedureTableSeeder::class);
    }
}