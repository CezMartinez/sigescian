<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativeProcedureAnnexedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_procedure_annexed_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('administrative_procedure_id')->unsigned();
            $table->integer('annexed_file_id')->unsigned();
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
        Schema::dropIfExists('administrative_procedure_annexed_files');
    }
}
