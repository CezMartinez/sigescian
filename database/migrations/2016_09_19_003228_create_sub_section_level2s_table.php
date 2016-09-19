<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSectionLevel2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_section_level2s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section');
            $table->string('route');
            $table->integer('sub_section_level1_id')->unsigned();
            $table->foreign('sub_section_level1_id')->references('id')->on('sub_section_level1s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_section_level2s');
    }
}
