<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_movie', function (Blueprint $table) {
            $table->id();
            $table->foreignId("movie_id")->constrained("movies")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("player_id")->constrained("players")->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('player_movie');
    }
};
