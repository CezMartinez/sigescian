<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Analisis de Radio-226 en Agua Envasada',
            'slug' => 'radio-agua-226',
        ]);
        DB::table('services')->insert([
            'name' => 'Prueba de fuga(frotis) y Nivel de Radiacion',
            'slug' => 'frotis-radiacion',
        ]);
        DB::table('services')->insert([
            'name' => 'Servicio de Control de Calidad',
            'slug' => 'control-de-calidad',
        ]);
        DB::table('services')->insert([
            'name' => 'Dosimetria Personal Externa',
            'slug' => 'dosimetria-personal-externa',
        ]);
    }
}
