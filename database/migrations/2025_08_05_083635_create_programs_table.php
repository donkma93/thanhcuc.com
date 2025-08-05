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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('duration'); // VD: "3 năm", "3.5 năm"
            $table->string('salary_range'); // VD: "1.200-1.500€"
            $table->string('opportunity_level'); // VD: "Cao", "Rất cao"
            $table->json('requirements')->nullable(); // Yêu cầu
            $table->json('benefits')->nullable(); // Lợi ích
            $table->string('icon')->nullable(); // Font Awesome icon
            $table->string('color')->default('#F9D200');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
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
        Schema::dropIfExists('programs');
    }
};
