<?php

use Illuminate\Database\Seeder;

class TechnicianProcedureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technician_procedures')->insert([
            'code'      =>'PT-SL-CIAN1',
            'name'      =>'Seguridad en Laboratorio',
            'acronym'   =>'SL',
            'state'     => true,
            'laboratory_id'=>1,
            'section_id'=> 1,
        ]);
    }
}
