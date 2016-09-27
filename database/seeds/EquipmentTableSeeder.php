<?php

use Illuminate\Database\Seeder;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment')->insert([
            'stock_number'=>'RX-0000-1',
            'name'=>'Rayos X',
            'brand'=>'ABCX',
            'model'=>'YZ015',
            'slug'=>'rayos-X',
            'laboratory_id'=>2,
            'need_calibration'=>1,
        ]);
    }
}
