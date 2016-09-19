<?php

use Illuminate\Database\Seeder;

class SubStandardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_section_level1s')->insert([
            'section' => 'Organización',
            'route'=>'seccion_4_1',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Sistema de Gestión',
            'route'=>'seccion_4_2',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Control de los Documentos',
            'route'=>'seccion_4_3',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Revisión de los Pedidos, Ofertas y Contratos',
            'route'=>'seccion_4_4',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Subcontratación de Ensayos y Calibraciones',
            'route'=>'seccion_4_5',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Compras de Servicios y de Suministros',
            'route'=>'seccion_4_6',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Servicio al Cliente',
            'route'=>'seccion_4_7',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Quejas',
            'route'=>'seccion_4_8',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Control de Trabajos de Ensayos o de Calibraciones No Conformes',
            'route'=>'seccion_4_9',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Mejora',
            'route'=>'seccion_4_10',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Acciones Correctivas',
            'route'=>'seccion_4_11',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Acciones Preventivas',
            'route'=>'seccion_4_12',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Control de los Registros',
            'route'=>'seccion_4_13',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Auditorías Internas',
            'route'=>'seccion_4_14',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Revisiones por la Dirección',
            'route'=>'seccion_4_15',
            'section_id' =>'4'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Generalidades',
            'route'=>'seccion_5_1',
            'section_id' =>'5'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Personal',
            'route'=>'seccion_5_2',
            'section_id' =>'5'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Instalaciones y Condiciones Ambientales',
            'route'=>'seccion_5_3',
            'section_id' =>'5'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Métodos de Ensayo y de Calibración y Validación de los Métodos',
            'route'=>'seccion_5_4',
            'section_id' =>'5'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Equipos',
            'route'=>'seccion_5_5',
            'section_id' =>'5'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Trazabilidad de las Mediciones',
            'route'=>'seccion_5_6',
            'section_id' =>'5'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Muestreo',
            'route'=>'seccion_5_7',
            'section_id' =>'5'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Manipulación de los Ítems de Ensayo o de Calibración',
            'route'=>'seccion_5_8',
            'section_id' =>'5'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Aseguramiento de la Calidad de los Resultados de Ensayo y de Calibración',
            'route'=>'seccion_5_9',
            'section_id' =>'5'
        ]);
        DB::table('sub_section_level1s')->insert([
            'section' => 'Informe de los Resultados',
            'route'=>'seccion_5_10',
            'section_id' =>'5'
        ]);
    }
}
