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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('email')->unique();
            $table->string('user_name')->nullable();
            $table->string('avatar_link')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('provider')->default('password');
            $table->date('birthday')->nullable();
            $table->bigInteger('last_login')->nullable();
            $table->integer('status')->default(1);
            $table->integer('role')->default(0);
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
