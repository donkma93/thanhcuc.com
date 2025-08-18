<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class FixSettingsJsonData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:fix-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix and validate JSON data in settings table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting JSON data validation and fix...');
        
        $jsonSettings = [
            'about_core_values' => [
                [
                    'icon' => 'fas fa-heart',
                    'title' => 'Tận Tâm',
                    'description' => 'Luôn đặt lợi ích của học viên lên hàng đầu'
                ]
            ],
            'about_achievements' => [
                [
                    'number' => '1000+',
                    'title' => 'Học Viên',
                    'description' => 'Đã tin tưởng và lựa chọn chúng tôi'
                ]
            ],
            'about_header_stats' => [
                [
                    'number' => '25+',
                    'label' => 'Giảng viên'
                ],
                [
                    'number' => '4+',
                    'label' => 'Năm kinh nghiệm'
                ],
                [
                    'number' => '1000+',
                    'label' => 'Học viên thành công'
                ]
            ],
            'about_locations' => [
                [
                    'name' => 'Cơ Sở 1',
                    'address' => '108B Trường Chinh, Đống Đa, Hà Nội',
                    'phone' => '0975.186.230',
                    'description' => 'Cơ sở chính với đầy đủ tiện nghi hiện đại'
                ]
            ]
        ];
        
        $fixed = 0;
        $errors = 0;
        
        foreach ($jsonSettings as $key => $defaultValue) {
            $setting = Setting::where('key', $key)->first();
            
            if (!$setting) {
                $this->warn("Setting '{$key}' not found, skipping...");
                continue;
            }
            
            // Check if value is valid JSON
            $isValid = false;
            $currentValue = null;
            
            if (!empty($setting->value)) {
                $decoded = json_decode($setting->value, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $isValid = true;
                    $currentValue = $decoded;
                }
            }
            
            if (!$isValid) {
                $this->error("Invalid JSON found in '{$key}': " . json_last_error_msg());
                
                // Fix the setting
                try {
                    $setting->update([
                        'value' => json_encode($defaultValue),
                        'type' => 'json'
                    ]);
                    
                    $this->info("Fixed '{$key}' with default value");
                    $fixed++;
                    
                } catch (\Exception $e) {
                    $this->error("Failed to fix '{$key}': " . $e->getMessage());
                    $errors++;
                    Log::error("Failed to fix setting {$key}: " . $e->getMessage());
                }
            } else {
                $this->info("Setting '{$key}' has valid JSON data");
            }
            
            // Ensure type is set to 'json'
            if ($setting->type !== 'json') {
                $setting->update(['type' => 'json']);
                $this->info("Updated type to 'json' for '{$key}'");
            }
        }
        
        $this->newLine();
        $this->info("JSON validation completed!");
        $this->info("Fixed: {$fixed} settings");
        $this->info("Errors: {$errors} settings");
        
        if ($errors === 0) {
            $this->info('All JSON settings are now valid!');
        }
        
        return 0;
    }
}
