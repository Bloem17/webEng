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
            $table->string('rechnungsNr');
            $table->integer('betrag');
            $table->string('rechnungstyp');
            $table->integer('reise_id')->length(10)->unsigned();
            $table->timestamps();
            
           
        });

        Schema::table('rechnung', function(Blueprint $table) {

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
        Schema::drop('rechnung');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
