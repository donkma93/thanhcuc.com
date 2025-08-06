<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    use HasMessagebox;

    /**
     * Display the about page settings.
     */
    public function index()
    {
        $aboutSettings = Setting::byGroup('about')
            ->ordered()
            ->get();

        return view('admin.about.index', compact('aboutSettings'));
    }

    /**
     * Update the about page settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'settings.about_page_title' => 'required|string|max:255',
            'settings.about_page_subtitle' => 'required|string',
            'settings.about_overview_title' => 'required|string|max:255',
            'settings.about_overview_content' => 'required|string',
            'settings.about_mission' => 'required|string',
            'settings.about_vision' => 'required|string',
            'settings.about_cta_title' => 'required|string|max:255',
            'settings.about_cta_description' => 'required|string',
        ], [
            'settings.about_page_title.required' => 'Tiêu đề trang là bắt buộc',
            'settings.about_page_subtitle.required' => 'Mô tả ngắn trang là bắt buộc',
            'settings.about_overview_title.required' => 'Tiêu đề tổng quan là bắt buộc',
            'settings.about_overview_content.required' => 'Nội dung tổng quan là bắt buộc',
            'settings.about_mission.required' => 'Sứ mệnh là bắt buộc',
            'settings.about_vision.required' => 'Tầm nhìn là bắt buộc',
            'settings.about_cta_title.required' => 'Tiêu đề Call-to-Action là bắt buộc',
            'settings.about_cta_description.required' => 'Mô tả Call-to-Action là bắt buộc',
        ]);

        $settings = $request->input('settings', []);
        
        foreach ($settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting) {
                // Handle JSON fields
                if ($setting->type === 'json') {
                    // Validate JSON format
                    $decoded = json_decode($value, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        return $this->errorAndRedirect('Dữ liệu JSON không hợp lệ cho trường: ' . $setting->label, 'admin.about.index');
                    }
                    $value = $value; // Keep as JSON string
                }
                
                // Handle file uploads
                if ($setting->type === 'image' && $request->hasFile("settings.{$key}")) {
                    // Delete old file
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    
                    $file = $request->file("settings.{$key}");
                    $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('about', $filename, 'public');
                    $value = $path;
                }
                
                $setting->update(['value' => $value]);
            }
        }

        return $this->successAndRedirect('Thông tin Về chúng tôi đã được cập nhật thành công!', 'admin.about.index');
    }

    /**
     * Reset about settings to default values.
     */
    public function reset()
    {
        // Run the seeder to reset to default values
        \Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\AboutSettingsSeeder']);
        
        return $this->successAndRedirect('Đã khôi phục thông tin Về chúng tôi về mặc định!', 'admin.about.index');
    }
}