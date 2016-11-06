<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatFileTechnicianProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_file_technician_procedure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('format_file_id')->unsigned();
            $table->integer('technician_procedure_id')->unsigned();
            $table->boolean('owner')->nullable();
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
        Schema::dropIfExists('format_file_technician_procedure');
    }
}
