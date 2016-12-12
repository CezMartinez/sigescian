<?php

use Illuminate\Database\Seeder;

class LaboratoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laboratories')->insert([
            "name"              =>  "Dosimetria",
            "description"       =>  "Laboratorio de Dosimetria personal externa TLD",
            "slug"              =>  "dosimetria",
            "department_id"     =>  "1",
        ]);
    }
}
