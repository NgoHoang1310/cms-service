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
        Schema::create('notification', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Tiêu đề thông báo');
            $table->text('content')->nullable()->comment('Nội dung thông báo');
            $table->integer('type')->nullable()->comment('Loại thông báo: 0 - Thông báo chung, 1 - Thông báo quan trọng');
            $table->integer('target_id')->nullable();
            $table->integer('is_read')->default(0)->comment('Trạng thái đọc: 0 - Chưa đọc, 1 - Đã đọc');
            $table->longText('payload')->nullable()->comment('Dữ liệu bổ sung cho thông báo, có thể là JSON');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification');
    }
};
