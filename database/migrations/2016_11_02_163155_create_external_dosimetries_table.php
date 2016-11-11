<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalDosimetriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_dosimetries', function (Blueprint $table) {
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
            $table->string('name_visit');
            $table->string('position_visit');
            $table->string('phone_visit');
            $table->string('name_admin');
            $table->string('position_admin');
            $table->string('phone_admin');
            $table->integer('pd_number')->nullable();
            $table->integer('anillo_number')->nullable();
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
        Schema::dropIfExists('external_dosimetries');
    }
}
