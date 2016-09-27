<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionSubSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_sub_section', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->integer('sub_section_id')->unsigned();
            $table->foreign('sub_section_id')->references('id')->on('sub_sections')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('section_sub_section',function (Blueprint $table){
            $table->dropForeign('section_sub_section_section_id_foreign');
            $table->dropForeign('section_sub_section_sub_section_id_foreign');

        });
        Schema::dropIfExists('section_sub_section');
    }
}
