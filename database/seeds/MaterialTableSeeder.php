<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            "name"              =>  "Fosforo",
            "description"       =>  "No metal multivalente perteneciente al grupo del nitrógeno",
            "slug"              =>  "fosforo",
            "laboratory_id"     =>  "1",
        ]);
    }
}
