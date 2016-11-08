<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationFrotisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_frotis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('petitioner');
            $table->string('address',2048);
            $table->string('phone');
            $table->string('email');
            $table->boolean('frotis')->default(false);
            $table->boolean('radiation')->default(false);
            $table->boolean('state')->default(false);
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
        Schema::dropIfExists('application_frotis');
    }
}
