<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRechnungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechnung', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('rechnung-nr');
            $table->integer('betrag');
            $table->string('rechnungstyp');
            $table->timestamps();
            $table->integer('id_event')->length(10)->unsigned();
           
        });

        Schema::table('rechnung', function(Blueprint $table) {

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
        Schema::dropIfExists('rechnung');
    }
}
