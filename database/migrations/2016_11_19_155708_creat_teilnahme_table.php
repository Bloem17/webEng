<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatTeilnahmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teilnahme', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->integer('id_teilnehmer')->length(10)->unsigned();
            $table->integer('id_event')->length(10)->unsigned();
        });

        Schema::table('teilnahme', function(Blueprint $table) {


            $table->foreign('id_teilnehmer')->references('id')->on('teilnehmer')->onDelete('cascade');
            $table->foreign('id_event')->references('id')->on('event')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teilnahme');
    }
}
