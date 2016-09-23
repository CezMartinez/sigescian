<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativeProcedureSubSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_procedure_sub_section', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('administrative_procedure_id');
            $table->integer('sub_section_id');
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
        Schema::dropIfExists('administrative_procedure_sub_section');
    }
}
