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
        Schema::table('overviews', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('video_title');
            $table->string('image_title')->nullable()->after('image_path');
        });

        DB::table('overviews')
            ->whereNull('image_path')
            ->update([
                'image_path' => 'images/about/team-photo.jpg',
                'image_title' => 'Tổng quan Trung tâm Tiếng Đức Thanh Cúc',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('overviews', function (Blueprint $table) {
            $table->dropColumn(['image_path', 'image_title']);
        });
    }
};
