<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'customer_type'=>2,
            'nit'=>'0614-31121994-101-3',
            'name' => 'Carlos Villeda',
            'legal_agent'=>'Carlos Villeda',
            'slug'=>'carlos-villeda',
            'direction'=>'Direccion1'
        ]);
        DB::table('clients')->insert([
            'customer_type'=>1,
            'nit'=>'0822-01011995-101-3',
            'name' => 'Empresa Rayos X',
            'legal_agent'=>'Juan Perez',
            'slug'=>'empresa-rayos-x',
            'direction'=>'Direccion2'
        ]);
        DB::table('clients')->insert([
            'customer_type'=>1,
            'nit'=>'0614-31121994-101-3',
            'name' => 'Laboratorio Y',
            'legal_agent'=>'Maria Gonzalez',
            'slug'=>'laboratorio-y',
            'direction'=>'Direccion3'
        ]);

    }
}
