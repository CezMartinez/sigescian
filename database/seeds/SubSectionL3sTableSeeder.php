<?php

use Illuminate\Database\Seeder;

class SubSectionL3sTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_section_level3s')->insert([
            'section' => 'Calibración',
            'route'=>'seccion_5_6_2_1',
            'sub_section_level2_id' =>'19'
        ]);
        DB::table('sub_section_level3s')->insert([
            'section' => 'Ensayos',
            'route'=>'seccion_5_6_2_2',
            'sub_section_level2_id' =>'19'
        ]);
        DB::table('sub_section_level3s')->insert([
            'section' => 'Patrones de Referencia',
            'route'=>'seccion_5_6_3_1',
            'sub_section_level2_id' =>'20'
        ]);
        DB::table('sub_section_level3s')->insert([
            'section' => 'Materiales de Referencia',
            'route'=>'seccion_5_6_3_2',
            'sub_section_level2_id' =>'20'
        ]);
        DB::table('sub_section_level3s')->insert([
            'section' => 'Validaciones Intermedias',
            'route'=>'seccion_5_6_3_3',
            'sub_section_level2_id' =>'20'
        ]);
        DB::table('sub_section_level3s')->insert([
            'section' => 'Transporte y Almacenamiento',
            'route'=>'seccion_5_6_3_4',
            'sub_section_level2_id' =>'20'
        ]);
    }
}
