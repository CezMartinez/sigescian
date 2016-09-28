<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepTechnicianProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_technician_procedure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('step_id')->unsigned();
            $table->foreign('step_id')->references('id')->on('steps')->onDelete('cascade');
            $table->integer('technician_procedure_id')->unsigned();
            $table->foreign('technician_procedure_id')->references('id')->on('technician_procedures')->onDelete('cascade');
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
        Schema::table('step_technician_procedure',function (Blueprint $table){
            $table->dropForeign('step_technician_procedure_step_id_foreign');
            $table->dropForeign('step_technician_procedure_technician_procedure_id_foreign');
        });
        Schema::dropIfExists('step_technician_procedure');
    }
}
