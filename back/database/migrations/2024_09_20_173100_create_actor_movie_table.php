<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_movie_actor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('tb_movies')->onDelete('cascade');
            $table->foreignId('actor_id')->constrained('tb_actors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_movie_actor');
    }
};
