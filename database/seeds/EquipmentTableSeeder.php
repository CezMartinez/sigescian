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
            "stock_number"      =>  "RX-1234-0000",
            "name"              =>  "Rayos X",
            "brand"             =>  "Osteosis",
            "model"             =>  "SONOST 3001",
            "slug"              =>  "rayos-x",
            "laboratory_id"     =>  "1",
            "need_calibration"  =>  "1",
        ]);
        
    }
}
