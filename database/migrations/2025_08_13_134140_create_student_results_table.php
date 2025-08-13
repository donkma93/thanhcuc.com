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
        Schema::create('student_results', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề của kết quả
            $table->text('description')->nullable(); // Mô tả chi tiết
            $table->enum('type', ['score', 'feedback']); // Loại: score (bảng điểm) hoặc feedback (phản hồi)
            $table->string('image_path'); // Đường dẫn ảnh
            $table->string('student_name')->nullable(); // Tên học viên (nếu có)
            $table->string('certificate_type')->nullable(); // Loại chứng chỉ (Goethe, TestDaF, DSH...)
            $table->string('level')->nullable(); // Cấp độ (A1, A2, B1, B2, C1, C2...)
            $table->string('score')->nullable(); // Điểm số (nếu là bảng điểm)
            $table->integer('sort_order')->default(0); // Thứ tự sắp xếp
            $table->boolean('is_active')->default(true); // Trạng thái hiển thị
            $table->boolean('is_featured')->default(false); // Có nổi bật không
            $table->timestamps();
            
            // Indexes
            $table->index(['type', 'is_active']);
            $table->index('sort_order');
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_results');
    }
};
