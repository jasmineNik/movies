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
        Schema::create('stuff_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId("movie_id")->constrained("movies")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("stuff_id")->constrained("stuffs")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("role_id")->constrained("roles")->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('stuff_role');
    }
};
