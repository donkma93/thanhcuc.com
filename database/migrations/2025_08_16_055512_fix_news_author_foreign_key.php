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
        Schema::table('news', function (Blueprint $table) {
            // Drop the existing foreign key constraint if it exists
            try {
                $table->dropForeign(['author_id']);
            } catch (\Exception $e) {
                // Foreign key doesn't exist, continue
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            // Re-add the foreign key constraint
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
        });
    }
};
