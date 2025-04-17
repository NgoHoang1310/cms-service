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
        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->text('description')->nullable();
            $table->timestamp('release')->nullable();
            $table->integer('duration')->nullable();
            $table->string('actors')->nullable();
            $table->string('directors')->nullable();
            $table->string('poster_url')->nullable();
            $table->string('trailer_url')->nullable();
            $table->string('backdrop_url')->nullable();
            $table->float('rating')->default(0);
            $table->integer('is_hot')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie');
    }
};
