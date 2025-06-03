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
        Schema::create('subscription_vouchers', function (Blueprint $table) {
            $table->id();
            $table->integer('subscription_id')->comment('ID của tài khoản đăng ký');
            $table->integer('voucher_id')->comment('ID của voucher');
            $table->decimal('discount_amount', 10, 2)->comment('Số tiền giảm giá từ voucher');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_vouchers');
    }
};
