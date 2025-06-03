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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('user_uuid')->comment('UUID của người dùng');
            $table->integer('subscription_id')->comment('ID của gói cước');
            $table->decimal('amount', 10, 2)->comment('Số tiền thanh toán');
            $table->timestamp('payment_date')->comment('Ngày thanh toán');
            $table->string('transaction_id')->nullable()->comment('ID giao dịch thanh toán (nếu có)');
            $table->string('bank_code')->comment('Mã ngân hàng thanh toán');
            $table->integer('status')->default(1)->comment('Trạng thái thanh toán (1: thành công, 0: thất bại, 2: đang xử lý)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
