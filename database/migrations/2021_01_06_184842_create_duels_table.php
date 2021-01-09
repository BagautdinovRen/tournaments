<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duels', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('game');
            $table->unsignedInteger('winner');
            $table->unsignedInteger('loser');
            $table->timestamps();

            $table->foreign('winner')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('loser')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duels');
    }
}
