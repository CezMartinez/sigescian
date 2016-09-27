<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment',function (Blueprint $table){
            $table->increments('id');
            $table->string('stock_number');
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->string('slug');
            $table->integer('laboratory_id')->unsigned();
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->integer('need_calibration');
            $table->integer('days_of_calibration')->nullable();
            $table->string('calibrate_company')->nullable();
            $table->timestamp('date_calibration')->nullable();
            $table->timestamp('date_end_calibration')->nullable(); //
            $table->timestamps();
        });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipment',function (Blueprint $table){
            $table->dropForeign('equipment_laboratory_id_foreign');
        });
        Schema::dropIfExists('equipment');
    }
}

