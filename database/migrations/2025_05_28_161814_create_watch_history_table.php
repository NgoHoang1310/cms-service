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
        Schema::create('watch_history', function (Blueprint $table) {
            $table->id();
            $table->string('user_uuid')->comment('UUID of the user who watched the video');
            $table->integer('target_id')->index()->comment('ID of the video that was watched');
            $table->integer('target_type')->index()->comment('Type of the target movie or series');
            $table->integer('season_id')->nullable()->index()->comment('ID of the season if applicable');
            $table->integer('episode_id')->nullable()->index()->comment('ID of the episode if applicable');
            $table->integer('progress_seconds')->default(0)->comment('Progress in seconds of the watched video');
            $table->integer('duration_seconds')->default(0)->comment('Total duration in seconds of the watched video');
            $table->integer('is_finished')->default(0)->comment('Indicates if the video was fully watched');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_history');
    }
};
