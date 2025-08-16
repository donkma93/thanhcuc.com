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
        // Update specific settings to have type 'json'
        $jsonSettings = [
            'about_core_values',
            'about_achievements', 
            'about_header_stats',
            'about_locations',
            'footer_social_links',
            'footer_quick_links',
            'footer_contact_info'
        ];
        
        foreach ($jsonSettings as $settingKey) {
            DB::table('settings')
                ->where('key', $settingKey)
                ->update(['type' => 'json']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to 'text' type
        $jsonSettings = [
            'about_core_values',
            'about_achievements', 
            'about_header_stats',
            'about_locations',
            'footer_social_links',
            'footer_quick_links',
            'footer_contact_info'
        ];
        
        foreach ($jsonSettings as $settingKey) {
            DB::table('settings')
                ->where('key', $settingKey)
                ->update(['type' => 'text']);
        }
    }
};
