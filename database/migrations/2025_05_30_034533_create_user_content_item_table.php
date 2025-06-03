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
        Schema::create('user_content_item', function (Blueprint $table) {
            $table->id();
            $table->string('user_uuid')->comment('UUID của người dùng');
            $table->unsignedBigInteger('target_id')->comment('ID của mục nội dung');
            $table->integer('target_type')->comment('Loại mục nội dung (ví dụ: 0 cho phim, 1 cho chương trình truyền hình)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_content_item');
    }
};
