<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeilnehmerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teilnehmer', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('vorname');
            $table->string('nachname');
            $table->string('strasse');
            $table->integer('strNr');
            $table->integer('plz');
            $table->string('ort');
            $table->integer('reise_id')->length(10)->unsigned();
            
            $table->timestamps();
        });

        Schema::table('teilnehmer', function(Blueprint $table) {

            $table->foreign('reise_id')->references('id')->on('event')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('teilnehmer');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    
    }
}
