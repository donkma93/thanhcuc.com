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
        Schema::create('exam_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_schedule_id')->constrained('exam_schedules')->onDelete('cascade');
            $table->string('full_name'); // Họ và tên
            $table->string('phone'); // Số điện thoại
            $table->string('email')->nullable(); // Email (không bắt buộc)
            $table->date('birth_date')->nullable(); // Ngày sinh
            $table->string('id_card')->nullable(); // CMND/CCCD
            $table->text('address')->nullable(); // Địa chỉ
            $table->text('notes')->nullable(); // Ghi chú thêm
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending'); // Trạng thái
            $table->text('admin_notes')->nullable(); // Ghi chú của admin
            $table->timestamp('confirmed_at')->nullable(); // Thời gian xác nhận
            $table->foreignId('confirmed_by')->nullable()->constrained('admin_users')->onDelete('set null'); // Admin xác nhận
            $table->timestamps();
            
            // Indexes
            $table->index(['exam_schedule_id', 'status']);
            $table->index(['phone', 'email']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_registrations');
    }
};
