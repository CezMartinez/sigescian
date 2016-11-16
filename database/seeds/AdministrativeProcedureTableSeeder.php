<?php

use Carbon\Carbon;
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
            'version'       => 1,
            'politic'       => ' ',
            'section_id'    => 1,
            'created_at'    => Carbon::now(),
        ]);
    }
}
