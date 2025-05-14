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
        Schema::create('season', function (Blueprint $table) {
            $table->id();
            $table->integer('series_id')->nullable(false)->comment('ID of the series');
            $table->integer('season_number')->nullable(false)->comment('Season number');
            $table->string('title')->nullable(false)->comment('Title of the season');
            $table->string('slug')->nullable(false)->comment('Slug for the season');
            $table->text('description')->nullable()->comment('Description of the season');
            $table->timestamp('release')->nullable()->comment('Release date of the season');
            $table->string('poster_url')->nullable()->comment('Poster URL of the season');
            $table->string('trailer_url')->nullable()->comment('Trailer URL of the season');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('season');
    }
};
