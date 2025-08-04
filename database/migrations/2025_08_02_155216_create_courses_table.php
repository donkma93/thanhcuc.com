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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->string('category'); // TOEIC, IELTS, Giao tiếp, VSTEP, etc.
            $table->string('level')->nullable(); // Beginner, Intermediate, Advanced
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('duration_hours')->nullable();
            $table->string('target_score')->nullable(); // 500-800+, 4.5-5.5+, etc.
            $table->json('features')->nullable(); // Array of course features
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
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
        Schema::dropIfExists('courses');
    }
};
