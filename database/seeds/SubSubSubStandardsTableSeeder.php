<?php

use Illuminate\Database\Seeder;

class SubSubSubStandardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_sub_sub_standards')->insert([
            'section' => 'Calibración',
            'route'=>'seccion_5_6_2_1',
            'standard_id' =>'19'
        ]);
        DB::table('sub_sub_sub_standards')->insert([
            'section' => 'Ensayos',
            'route'=>'seccion_5_6_2_2',
            'standard_id' =>'19'
        ]);
        DB::table('sub_sub_sub_standards')->insert([
            'section' => 'Patrones de Referencia',
            'route'=>'seccion_5_6_3_1',
            'standard_id' =>'20'
        ]);
        DB::table('sub_sub_sub_standards')->insert([
            'section' => 'Materiales de Referencia',
            'route'=>'seccion_5_6_3_2',
            'standard_id' =>'20'
        ]);
        DB::table('sub_sub_sub_standards')->insert([
            'section' => 'Validaciones Intermedias',
            'route'=>'seccion_5_6_3_3',
            'standard_id' =>'20'
        ]);
        DB::table('sub_sub_sub_standards')->insert([
            'section' => 'Transporte y Almacenamiento',
            'route'=>'seccion_5_6_3_4',
            'standard_id' =>'20'
        ]);
    }
}
