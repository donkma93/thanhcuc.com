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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('program')->nullable(); // Chương trình đã học
            $table->string('current_job')->nullable(); // Công việc hiện tại
            $table->text('content'); // Nội dung nhận xét
            $table->string('avatar_path')->nullable();
            $table->string('company')->nullable(); // Công ty hiện tại
            $table->string('location')->nullable(); // Địa điểm (VD: Berlin, Đức)
            $table->integer('rating')->default(5); // Đánh giá 1-5 sao
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(false); // Nổi bật
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('testimonials');
    }
};
