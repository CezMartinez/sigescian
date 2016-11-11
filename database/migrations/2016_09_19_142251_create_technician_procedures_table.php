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
            $table->integer('correlative')->unsigned();
            $table->string('name');
            $table->string('acronym')->unique();
            $table->integer('version')->unsigned();
            $table->boolean('state')->default(true);
            $table->integer('laboratory_id')->unsigned();
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->integer('procedure_document_id')->unsigned()->nullable();
            $table->foreign('procedure_document_id')->references('id')->on('procedure_documents')->onDelete('cascade');
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
            $table->dropForeign('technician_procedures_section_id_foreign');
            $table->dropForeign('technician_procedures_procedure_document_id_foreign');
        });
        Schema::dropIfExists('technician_procedures');
    }
}
