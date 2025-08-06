<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('student_name'); // Tên học viên
            $table->string('class_name')->nullable(); // Lớp học
            $table->string('avatar')->nullable(); // Ảnh đại diện
            $table->enum('category', ['monthly', 'exam', 'scholarship']); // Loại thành tích
            $table->decimal('score', 4, 2)->nullable(); // Điểm số (9.8/10)
            $table->string('achievement_title'); // Tiêu đề thành tích
            $table->text('description')->nullable(); // Mô tả chi tiết
            $table->string('certificate')->nullable(); // Chứng chỉ đạt được
            $table->string('university')->nullable(); // Trường đại học (cho scholarship)
            $table->date('achievement_date'); // Ngày đạt thành tích
            $table->integer('rank')->default(1); // Thứ hạng (1, 2, 3)
            $table->boolean('is_featured')->default(false); // Nổi bật
            $table->boolean('is_active')->default(true); // Kích hoạt
            $table->integer('sort_order')->default(0); // Thứ tự sắp xếp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievements');
    }
};
