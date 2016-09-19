<?php

use Illuminate\Database\Seeder;

class SubSubStandardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_sub_standards')->insert([
            'section' => 'Generalidades',
            'route'=>'seccion_4_3_1',
            'standard_id' =>'3'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Aprobación y Emisión de los Documentos',
            'route'=>'seccion_4_3_2',
            'standard_id' =>'3'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Cambios a los Documentos',
            'route'=>'seccion_4_3_3',
            'standard_id' =>'3'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Generalidades',
            'route'=>'seccion_4_11_1',
            'standard_id' =>'11'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Analisis de las Causas',
            'route'=>'seccion_4_11_2',
            'standard_id' =>'11'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Selección e Implementación de las Acciones Correctivas',
            'route'=>'seccion_4_11_3',
            'standard_id' =>'11'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Seguimiento de las Acciones Correctivas',
            'route'=>'seccion_4_11_4',
            'standard_id' =>'11'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Auditorías Adicionales',
            'route'=>'seccion_4_11_5',
            'standard_id' =>'11'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Generalidades',
            'route'=>'seccion_4_13_1',
            'standard_id' =>'13'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Registros Técnicos',
            'route'=>'seccion_4_13_2',
            'standard_id' =>'13'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Generalidades',
            'route'=>'seccion_5_4_1',
            'standard_id' =>'19'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Selección de los Métodos',
            'route'=>'seccion_5_4_2',
            'standard_id' =>'19'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Métodos Desarrollados por el Laboratorio',
            'route'=>'seccion_5_4_3',
            'standard_id' =>'19'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Métodos no Normalizados',
            'route'=>'seccion_5_4_4',
            'standard_id' =>'19'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Validación de los Métodos',
            'route'=>'seccion_5_4_5',
            'standard_id' =>'19'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Estimación de la incertidumbre de la medición',
            'route'=>'seccion_5_4_6',
            'standard_id' =>'19'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Control de los Datos',
            'route'=>'seccion_5_4_7',
            'standard_id' =>'19'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Generalidades',
            'route'=>'seccion_5_6_1',
            'standard_id' =>'21'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Requisitos Específicos',
            'route'=>'seccion_5_6_2',
            'standard_id' =>'21'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Patrones de Referencia y Materiales de Referencia',
            'route'=>'seccion_5_6_3',
            'standard_id' =>'21'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Generalidades',
            'route'=>'seccion_5_10_1',
            'standard_id' =>'25'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Informes de Ensayos y Certificados de Calibración',
            'route'=>'seccion_5_10_2',
            'standard_id' =>'25'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Informes de Ensayos',
            'route'=>'seccion_5_10_3',
            'standard_id' =>'25'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Certificados de Calibración',
            'route'=>'seccion_5_10_4',
            'standard_id' =>'25'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Opiniones e Interpretaciones',
            'route'=>'seccion_5_10_5',
            'standard_id' =>'25'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Resultados de Ensayo y Calibración Obtenidos de los Subcontratistas',
            'route'=>'seccion_5_10_6',
            'standard_id' =>'25'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Transmisión Electrónica de los Resultados',
            'route'=>'seccion_5_10_7',
            'standard_id' =>'25'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Presentación de los Informes y de los Certificados',
            'route'=>'seccion_5_10_8',
            'standard_id' =>'25'
        ]);
        DB::table('sub_sub_standards')->insert([
            'section' => 'Modificaciones a los Informes de Ensayo y a los Certificados de Calibración',
            'route'=>'seccion_5_10_9',
            'standard_id' =>'25'
        ]);

    }
}
