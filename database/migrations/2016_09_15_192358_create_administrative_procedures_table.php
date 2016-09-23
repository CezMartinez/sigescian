<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativeProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_procedures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->string('acronym')->unique();
            $table->text('politic');
            $table->boolean('state')->default(true);
            $table->integer('flow_chart_file_id')->nullable()->unsigned();
            $table->foreign('flow_chart_file_id')->references('id')->on('flow_chart_files')->onDelete('cascade');
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
        Schema::table('administrative_procedures', function (Blueprint $table) {
            $table->dropForeign('administrative_procedures_flow_chart_file_id_foreign');
            $table->dropForeign('administrative_procedures_section_id_foreign');
        });
        Schema::dropIfExists('administrative_procedures');
    }
}
