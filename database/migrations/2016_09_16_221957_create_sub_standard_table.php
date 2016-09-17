<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubStandardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('sub_standards', function (Blueprint $table) {
                   $table->increments('id');
                   $table->string('section');
                   $table->string('bookmark');
                   $table->integer('standard_id')->unsigned();
                   $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
               });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
