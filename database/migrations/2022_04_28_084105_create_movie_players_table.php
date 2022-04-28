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
        Schema::create('movie_players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')
                  ->constrained('movies')
                  ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('player_id')
                  ->constrained('players')
                  ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('video_id')
                  ->constrained('videos')
                  ->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('movie_players');
    }
};
