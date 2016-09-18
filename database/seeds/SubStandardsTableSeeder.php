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
        DB::table('sub_standards')->insert([
            'section' => 'Organización',
            'route'=>'seccion_4_1',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Sistema de Gestión',
            'route'=>'seccion_4_2',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Control de los Documentos',
            'route'=>'seccion_4_3',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Revisión de los Pedidos, Ofertas y Contratos',
            'route'=>'seccion_4_4',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Subcontratación de Ensayos y Calibraciones',
            'route'=>'seccion_4_5',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Compras de Servicios y de Suministros',
            'route'=>'seccion_4_6',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Servicio al Cliente',
            'route'=>'seccion_4_7',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Quejas',
            'route'=>'seccion_4_8',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Control de Trabajos de Ensayos o de Calibraciones No Conformes',
            'route'=>'seccion_4_9',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Mejora',
            'route'=>'seccion_4_10',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Acciones Correctivas',
            'route'=>'seccion_4_11',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Acciones Preventivas',
            'route'=>'seccion_4_12',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Control de los Registros',
            'route'=>'seccion_4_13',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Auditorías Internas',
            'route'=>'seccion_4_14',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Revisiones por la Dirección',
            'route'=>'seccion_4_15',
            'standard_id' =>'4'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Generalidades',
            'route'=>'seccion_5_1',
            'standard_id' =>'5'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Personal',
            'route'=>'seccion_5_2',
            'standard_id' =>'5'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Instalaciones y Condiciones Ambientales',
            'route'=>'seccion_5_3',
            'standard_id' =>'5'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Métodos de Ensayo y de Calibración y Validación de los Métodos',
            'route'=>'seccion_5_4',
            'standard_id' =>'5'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Equipos',
            'route'=>'seccion_5_5',
            'standard_id' =>'5'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Trazabilidad de las Mediciones',
            'route'=>'seccion_5_6',
            'standard_id' =>'5'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Muestreo',
            'route'=>'seccion_5_7',
            'standard_id' =>'5'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Manipulación de los Ítems de Ensayo o de Calibración',
            'route'=>'seccion_5_8',
            'standard_id' =>'5'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Aseguramiento de la Calidad de los Resultados de Ensayo y de Calibración',
            'route'=>'seccion_5_9',
            'standard_id' =>'5'
        ]);
        DB::table('sub_standards')->insert([
            'section' => 'Informe de los Resultados',
            'route'=>'seccion_5_10',
            'standard_id' =>'5'
        ]);
    }
}
