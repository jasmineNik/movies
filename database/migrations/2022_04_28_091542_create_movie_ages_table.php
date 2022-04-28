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
        Schema::create('movie_ages', function (Blueprint $table) {
            $table->id();
            $table->foreignId("movie_id")->constrained("movies")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("age_id")->constrained("ages")->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('movie_age');
    }
};
