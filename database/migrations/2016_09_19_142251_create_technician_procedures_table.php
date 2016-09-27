<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicianProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technician_procedures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->string('acronym')->unique();
            $table->boolean('state')->default(true);
            $table->integer('laboratory_id')->unsigned();
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('technician_procedures',function (Blueprint $table){
            $table->dropForeign('technician_procedures_laboratory_id_foreign');
        });
        Schema::dropIfExists('technician_procedures');
    }
}
