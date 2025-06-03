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
        Schema::create('episode', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique()->nullable();
            $table->integer('series_id')->nullable()->comment('ID of the series');
            $table->integer('season_id')->nullable()->comment('ID of the season');
            $table->integer('episode_number')->nullable(false)->comment('Episode number');
            $table->string('title')->nullable(false);
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('release')->nullable();
            $table->integer('duration')->nullable()->comment('Duration of the episode in minutes');
            $table->string('poster_url')->nullable()->comment('Poster URL of the episode');
            $table->string('trailer_url')->nullable()->comment('Trailer URL of the episode');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episode');
    }
};
