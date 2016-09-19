<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
           $table->string('route');
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
        Schema::table('sub_standards',function (Blueprint $table){
            $table->dropForeign('sub_standards_standard_id_foreign');
        });
        Schema::dropIfExists('sub_standards');
    }
}
