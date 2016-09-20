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
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->string('slug');
            $table->integer('need_calibration');
            $table->integer('days_of_calibration')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('date_calibration')->nullable();//19/Sept/16
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
        Schema::dropIfExists('equipment');
    }
}

