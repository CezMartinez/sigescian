<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationRadio226sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_radio226s', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date_solicitude')->nullable();
            $table->string('petitioner');
            $table->string('address',2048);
            $table->string('phone');
            $table->string('email');
            $table->timestamp('date_reception')->nullable();
            $table->integer('samples');
            $table->float('liters')->nullable();
            $table->float('gallons')->nullable();
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
        Schema::dropIfExists('application_radio226s');
    }
}
