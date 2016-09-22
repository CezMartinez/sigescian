<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowChartFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flow_chart_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('originalName');
            $table->string('nameWithoutExtension');
            $table->string('mime');
            $table->string('title');
            $table->string('extension');
            $table->integer('size');
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
        Schema::dropIfExists('flow_chart_files');
    }
}
