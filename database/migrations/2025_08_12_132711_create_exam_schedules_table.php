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
        Schema::create('exam_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('exam_type'); // Loại thi: Goethe, TestDaF, etc.
            $table->string('level'); // Trình độ: A1, A2, B1, B2, C1, C2
            $table->string('exam_period')->nullable(); // Kỳ thi: 1/2024, 2/2024, etc.
            $table->date('exam_date'); // Ngày thi
            $table->time('exam_time')->nullable(); // Giờ thi
            $table->date('registration_deadline'); // Hạn đăng ký
            $table->decimal('fee', 10, 2); // Lệ phí
            $table->string('location'); // Địa điểm thi
            $table->text('description')->nullable(); // Mô tả thêm
            $table->enum('status', ['active', 'inactive', 'completed'])->default('active'); // Trạng thái
            $table->integer('max_participants')->nullable(); // Số lượng tối đa
            $table->integer('current_participants')->default(0); // Số lượng hiện tại
            $table->boolean('is_featured')->default(false); // Có nổi bật không
            $table->integer('sort_order')->default(0); // Thứ tự sắp xếp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_schedules');
    }
};
