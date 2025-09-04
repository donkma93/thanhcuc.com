<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if foreign key exists before dropping
        $foreignKeys = DB::select("
            SELECT CONSTRAINT_NAME 
            FROM information_schema.KEY_COLUMN_USAGE 
            WHERE TABLE_SCHEMA = DATABASE() 
            AND TABLE_NAME = 'news' 
            AND COLUMN_NAME = 'author_id' 
            AND CONSTRAINT_NAME != 'PRIMARY'
        ");
        
        if (!empty($foreignKeys)) {
            Schema::table('news', function (Blueprint $table) {
                $table->dropForeign(['author_id']);
            });
        }
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
