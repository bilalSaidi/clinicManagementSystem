<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wating_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('LastName');
            $table->string('Phone');
            $table->integer('idPatient')->unsigned();
            $table->foreign('idPatient')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('wating_lists');
    }
}
