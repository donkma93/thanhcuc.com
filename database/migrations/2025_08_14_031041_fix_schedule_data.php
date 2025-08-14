<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Fix schedule data - ensure required fields have default values
        DB::table('schedules')->whereNull('current_students')->update(['current_students' => 0]);
        DB::table('schedules')->whereNull('max_students')->update(['max_students' => 20]);
        DB::table('schedules')->whereNull('status')->update(['status' => 'published']);
        DB::table('schedules')->whereNull('is_featured')->update(['is_featured' => false]);
        DB::table('schedules')->whereNull('is_popular')->update(['is_popular' => false]);
        DB::table('schedules')->whereNull('discount_percentage')->update(['discount_percentage' => 0]);
        
        // Log the fix
        \Log::info('Schedule data fixed in migration', [
            'updated_current_students' => DB::table('schedules')->where('current_students', 0)->count(),
            'updated_max_students' => DB::table('schedules')->where('max_students', 20)->count(),
            'updated_status' => DB::table('schedules')->where('status', 'published')->count(),
            'total_schedules' => DB::table('schedules')->count()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration only fixes data, no schema changes to reverse
    }
};
