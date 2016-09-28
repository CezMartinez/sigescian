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
            'nit'=>'0612-311294-101-3',
            'name' => 'Carlos Villeda',
            'legal_agent'=>'Carlos Villeda',
            'slug'=>'carlos-villeda',
            'address'=>'Direccion1'
        ]);
        DB::table('clients')->insert([
            'customer_type'=>1,
            'nit'=>'0822-010195-101-3',
            'name' => 'Empresa Rayos X',
            'legal_agent'=>'Juan Perez',
            'slug'=>'empresa-rayos-x',
            'address'=>'Direccion2'
        ]);
        DB::table('clients')->insert([
            'customer_type'=>1,
            'nit'=>'0614-311294-101-3',
            'name' => 'Laboratorio Y',
            'legal_agent'=>'Maria Gonzalez',
            'slug'=>'laboratorio-y',
            'address'=>'Direccion3'
        ]);

    }
}
