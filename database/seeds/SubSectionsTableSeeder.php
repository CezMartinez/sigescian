<?php

use Illuminate\Database\Seeder;

class SubSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_sections')->insert([
            'section' => 'Organización',
            'route'=>'seccion_4_1',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Sistema de Gestión',
            'route'=>'seccion_4_2',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Control de los Documentos',
            'route'=>'seccion_4_3',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Revisión de los Pedidos, Ofertas y Contratos',
            'route'=>'seccion_4_4',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Subcontratación de Ensayos y Calibraciones',
            'route'=>'seccion_4_5',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Compras de Servicios y de Suministros',
            'route'=>'seccion_4_6',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Servicio al Cliente',
            'route'=>'seccion_4_7',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Quejas',
            'route'=>'seccion_4_8',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Control de Trabajos de Ensayos o de Calibraciones No Conformes',
            'route'=>'seccion_4_9',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Mejora',
            'route'=>'seccion_4_10',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Acciones Correctivas',
            'route'=>'seccion_4_11',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Acciones Preventivas',
            'route'=>'seccion_4_12',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Control de los Registros',
            'route'=>'seccion_4_13',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Auditorías Internas',
            'route'=>'seccion_4_14',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Revisiones por la Dirección',
            'route'=>'seccion_4_15',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Generalidades',
            'route'=>'seccion_5_1',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Personal',
            'route'=>'seccion_5_2',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Instalaciones y Condiciones Ambientales',
            'route'=>'seccion_5_3',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Métodos de Ensayo y de Calibración y Validación de los Métodos',
            'route'=>'seccion_5_4',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Equipos',
            'route'=>'seccion_5_5',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Trazabilidad de las Mediciones',
            'route'=>'seccion_5_6',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Muestreo',
            'route'=>'seccion_5_7',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Manipulación de los Ítems de Ensayo o de Calibración',
            'route'=>'seccion_5_8',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Aseguramiento de la Calidad de los Resultados de Ensayo y de Calibración',
            'route'=>'seccion_5_9',
        ]);
        DB::table('sub_sections')->insert([
            'section' => 'Informe de los Resultados',
            'route'=>'seccion_5_10',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '1',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '2',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '3',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '4',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '5',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '6',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '7',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '8',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '9',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '10',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '11',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '12',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '13',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '14',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '4',
            'sub_section_id' => '15',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '16',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '17',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '18',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '19',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '20',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '21',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '22',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '23',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '24',
        ]);
        DB::table('section_sub_section')->insert([
            'section_id' => '5',
            'sub_section_id' => '25',
        ]);
    }
}
