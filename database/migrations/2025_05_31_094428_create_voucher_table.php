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
        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->integer('type')->default(0)->comment('0: Giảm giá theo phần trăm, 1: Giảm giá theo số tiền');
            $table->decimal('value', 10, 2);
            $table->integer('max_uses')->nullable();       // số lượt dùng tối đa
            $table->integer('used_count')->default(0);     // đã dùng bao nhiêu lượt
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->integer('only_for_new_users')->default(1);
            $table->integer('only_once_per_user')->default(1);
            $table->integer('status')->default(1)->comment('1: Hoạt động, 0: Không hoạt động');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher');
    }
};
