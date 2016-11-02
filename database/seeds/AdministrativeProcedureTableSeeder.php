<?php

use Illuminate\Database\Seeder;

class AdministrativeProcedureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrative_procedures')->insert([
            'code'          =>'MC-CIAN1',
            'name'          =>'Manual De Calidad',
            'acronym'       =>'MC',
            'correlative'   => 1,
            'state'         => true,
            'politic'       => ' ',
            'section_id'    => 1,
        ]);
    }
}
