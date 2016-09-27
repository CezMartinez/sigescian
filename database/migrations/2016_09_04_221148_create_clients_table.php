<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_type')->unsigned()->index();
            $table->foreign('customer_type')->references('id')->on('customer_types')->onDelete('cascade');
            $table->string('nit')->unique();
            $table->string('name');
            $table->string('legal_agent');
            $table->string('address');
            $table->string('slug')->unique();
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
        Schema::table('clients',function (Blueprint $table){
            $table->dropForeign('clients_customer_type_foreign');
        });
        Schema::drop('clients');
        //
    }
}
