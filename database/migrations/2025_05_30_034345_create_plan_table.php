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
        Schema::create('plan', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Tên gói cước');
            $table->text('description')->nullable()->comment('Mô tả gói cước');
            $table->decimal('price', 10, 2)->comment('Giá gói cước');
            $table->integer('duration_days')->comment('Thời gian sử dụng gói cước (ngày)');
            $table->integer('max_resolution')->default(0)->comment('Độ phân giải tối đa (ví dụ: 720, 1080, 4K)');
            $table->integer('status')->default(1)->comment('Trạng thái gói cước (1: hoạt động, 0: không hoạt động)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan');
    }
};
