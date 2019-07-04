<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('startday');
            $table->string('endday');
            $table->string('StartMorningHour');
            $table->string('EndMorningHour');
            $table->string('StartEveningHour');
            $table->string('EndEveningHour');
            $table->string('name');
            $table->string('Experinces');
            $table->string('Phone');
            $table->string('Adress');
            $table->string('Fax');
            $table->string('Email');
            $table->string('srcProfileImage');
            $table->text('MoreInformation');
            $table->string('titleService1');
            $table->string('srcService1');
            $table->string('titleService2');
            $table->string('srcService2');
            $table->string('titleService3');
            $table->string('srcService3');
            $table->string('titleService4');
            $table->string('srcService4');
            $table->string('titleService5');
            $table->string('srcService5');
            $table->string('titleService6');
            $table->string('srcService6');
            $table->string('titleService7');
            $table->string('srcService7');
            $table->string('titleService8');
            $table->string('srcService8');
            $table->string('note1');
            $table->string('note2');
            $table->string('note3');
            $table->text('location');


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
        Schema::dropIfExists('settings');
    }
}
