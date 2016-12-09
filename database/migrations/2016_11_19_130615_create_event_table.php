<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('preis');
            $table->text('kurzbeschrieb');
            $table->text('tag1')->nullable();
            $table->text('tag2')->nullable();
            $table->text('tag3')->nullable();
            $table->text('tag4')->nullable();
            $table->text('tag5')->nullable();
            $table->text('tag6')->nullable();
            $table->text('tag7')->nullable();
            $table->string('titel');
            $table->integer('dauer');
            $table->boolean('status');
            $table->text('datum');
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
        Schema::dropIfExists('event');
    }
}
