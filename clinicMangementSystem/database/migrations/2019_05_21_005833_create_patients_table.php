<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('fatherName');
            $table->enum('gender',['male','female']);
            $table->integer('phone');
            $table->string('facebookAcount');
            $table->integer('age');
            $table->string('email',50);
            $table->string('adress');
            $table->integer('socialId');
            $table->enum('idType',['Passpoet','Driver License' , 'National Id Card']);
            $table->date('birthDate');
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
        Schema::dropIfExists('patients');
    }
}
