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
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->string('user_uuid')->comment('UUID của người dùng');
            $table->integer('plan_id')->comment('ID của gói cước');
            $table->integer('voucher_id')->nullable()->comment('ID của voucher (nếu có)');
            $table->timestamp('start_date')->comment('Ngày bắt đầu sử dụng gói cước');
            $table->timestamp('next_bill_at')->comment('Ngày kết thúc sử dụng gói cước');
            $table->integer('status')->default(1)->comment('Trạng thái gói cước (1: hoạt động, 0: hủy bỏ, 2: hết hạn)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription');
    }
};
