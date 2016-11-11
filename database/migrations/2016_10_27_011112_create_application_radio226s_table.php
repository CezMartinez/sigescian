<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('petitioner');
            $table->string('dui');
            $table->string('address',2048);
            $table->string('phone');
            $table->string('email');
            $table->timestamp('date_reception')->nullable();
            $table->integer('samples')->nullable();
            $table->float('liters')->nullable();
            $table->float('gallons')->nullable();
            $table->integer('state')->default(0);
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
