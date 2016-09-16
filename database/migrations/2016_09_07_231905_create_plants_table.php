<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->string('slug');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('date_calibration')->nullable();
            $table->timestamp('date_end_calibration')->nullable();
            $table->timestamps();
        });//
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plants');
    }
}
