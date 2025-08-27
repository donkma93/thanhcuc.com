<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        // Resolve the actual foreign key name (if any) before altering the table
        $constraintName = DB::table('information_schema.KEY_COLUMN_USAGE')
            ->where('TABLE_SCHEMA', DB::getDatabaseName())
            ->where('TABLE_NAME', 'news')
            ->where('COLUMN_NAME', 'author_id')
            ->whereNotNull('REFERENCED_TABLE_NAME')
            ->value('CONSTRAINT_NAME');

        if ($constraintName) {
            Schema::table('news', function (Blueprint $table) use ($constraintName) {
                $table->dropForeign($constraintName);
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
        // Only re-add the foreign key if it does not already exist
        $constraintName = DB::table('information_schema.KEY_COLUMN_USAGE')
            ->where('TABLE_SCHEMA', DB::getDatabaseName())
            ->where('TABLE_NAME', 'news')
            ->where('COLUMN_NAME', 'author_id')
            ->whereNotNull('REFERENCED_TABLE_NAME')
            ->value('CONSTRAINT_NAME');

        if (!$constraintName && Schema::hasTable('news') && Schema::hasTable('users')) {
            Schema::table('news', function (Blueprint $table) {
                $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
            });
        }
    }
};
