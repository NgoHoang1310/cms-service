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
        Schema::create('voucher_plan', function (Blueprint $table) {
            $table->id();
            $table->integer('voucher_id')->comment('ID của voucher');
            $table->integer('plan_id')->comment('ID của gói cước');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_plan');
    }
};
