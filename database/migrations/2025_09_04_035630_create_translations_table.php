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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5); // vi, en, de
            $table->string('translatable_type'); // Model class name
            $table->unsignedBigInteger('translatable_id'); // Model ID
            $table->string('field'); // Field name to translate
            $table->text('value'); // Translated value
            $table->timestamps();
            
            // Indexes
            $table->index(['locale', 'translatable_type', 'translatable_id', 'field'], 'trans_idx_locale_type_id_field');
            $table->unique(['locale', 'translatable_type', 'translatable_id', 'field'], 'trans_unique_locale_type_id_field');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translations');
    }
};
