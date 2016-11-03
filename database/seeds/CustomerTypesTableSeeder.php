<?php

use Illuminate\Database\Seeder;

class CustomerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_types')->insert([
            'name' => 'Pública',
        ]);
        DB::table('customer_types')->insert([
            'name' => 'Privada',
        ]);
        DB::table('customer_types')->insert([
            'name' => 'Otra',
        ]);
    }
}
