<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_controls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('customer_id')->unsigned()->index();
            $table->foreign('customer_id')->references('id')->on('customer_types')->onDelete('cascade');
            $table->string('address',2048);
            $table->string('municipality');
            $table->string('department');
            $table->string('country');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('responsable');
            $table->string('position');
            $table->integer('activity_id')->unsigned()->index();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->timestamp('date_reception')->nullable();
            $table->string('name_visit');
            $table->string('position_visit');
            $table->string('phone_visit');
            $table->string('name_admin');
            $table->string('position_admin');
            $table->string('phone_admin');
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
        Schema::dropIfExists('application_controls');
    }
}
