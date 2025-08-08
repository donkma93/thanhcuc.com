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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->enum('type', ['classroom', 'facility'])->default('classroom');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('level')->nullable(); // For classroom type (A1, A2, B1, B2, etc.)
            $table->string('students')->nullable(); // For classroom type (15-20 học viên)
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
        Schema::dropIfExists('galleries');
    }
};
