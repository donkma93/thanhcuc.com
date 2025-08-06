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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('level');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->json('schedule_days'); // ['monday', 'wednesday', 'friday']
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('duration_months');
            $table->integer('max_students');
            $table->integer('current_students')->default(0);
            $table->decimal('price', 10, 0);
            $table->decimal('original_price', 10, 0)->nullable();
            $table->integer('discount_percentage')->default(0);
            $table->string('teacher_name');
            $table->string('teacher_title')->nullable();
            $table->string('teacher_avatar')->nullable();
            $table->string('course_type')->default('regular');
            $table->enum('status', ['draft', 'published', 'full', 'cancelled', 'completed'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->date('registration_deadline')->nullable();
            $table->string('location')->nullable();
            $table->json('requirements')->nullable(); // Array of requirements
            $table->json('benefits')->nullable(); // Array of benefits
            $table->json('curriculum')->nullable(); // Array of curriculum items
            $table->string('certificate')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('slug')->unique();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index(['status', 'start_date']);
            $table->index(['level', 'status']);
            $table->index(['is_featured', 'status']);
            $table->index(['is_popular', 'status']);
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
