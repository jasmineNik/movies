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
        Schema::create('country_movie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')
                  ->constrained('movies')
                  ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('country_id')
                  ->constrained('countries')
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
        Schema::dropIfExists('country_movie');
    }
};
