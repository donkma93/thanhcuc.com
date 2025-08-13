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
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'building_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'settings.about_header_title' => 'required|string|max:255',
            'settings.about_header_subtitle' => 'required|string',
        ], [
            'settings.about_page_title.required' => 'Tiêu đề trang là bắt buộc',
            'settings.about_page_subtitle.required' => 'Mô tả ngắn trang là bắt buộc',
            'settings.about_overview_title.required' => 'Tiêu đề tổng quan là bắt buộc',
            'settings.about_overview_content.required' => 'Nội dung tổng quan là bắt buộc',
            'settings.about_mission.required' => 'Sứ mệnh là bắt buộc',
            'settings.about_vision.required' => 'Tầm nhìn là bắt buộc',
            'settings.about_cta_title.required' => 'Tiêu đề Call-to-Action là bắt buộc',
            'settings.about_cta_description.required' => 'Mô tả Call-to-Action là bắt buộc',
            'header_image.image' => 'Ảnh header phải là file ảnh hợp lệ',
            'header_image.mimes' => 'Ảnh header phải có định dạng: jpeg, png, jpg, gif, svg',
            'header_image.max' => 'Ảnh header không được lớn hơn 2MB',
            'building_image.image' => 'Ảnh tòa nhà phải là file ảnh hợp lệ',
            'building_image.mimes' => 'Ảnh tòa nhà phải có định dạng: jpeg, png, jpg, gif, svg',
            'building_image.max' => 'Ảnh tòa nhà không được lớn hơn 2MB',
            'settings.about_header_title.required' => 'Tiêu đề header là bắt buộc',
            'settings.about_header_subtitle.required' => 'Mô tả header là bắt buộc',
        ]);

        $settings = $request->input('settings', []);
        
        // Handle header image upload
        if ($request->hasFile('header_image')) {
            $file = $request->file('header_image');
            $filename = 'team-photo.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('about', $filename, 'public');
            
            // Delete old header image files
            $oldFiles = glob(public_path('images/about/team-photo.*'));
            foreach ($oldFiles as $oldFile) {
                if (is_file($oldFile)) {
                    unlink($oldFile);
                }
            }
            
            // Copy to public/images/about for direct access
            $publicPath = public_path('images/about/' . $filename);
            if (!is_dir(dirname($publicPath))) {
                mkdir(dirname($publicPath), 0755, true);
            }
            copy(storage_path('app/public/' . $path), $publicPath);
            
            // Save image path to settings with timestamp to avoid cache
            $timestamp = time();
            Setting::set('about_header_image', 'images/about/' . $filename . '?v=' . $timestamp);
            
            // Clear any cached versions
            \Cache::forget('about_header_image');
            
            // Force browser to reload image
            session()->flash('image_updated', 'header');
        }
        
        // Handle building image upload
        if ($request->hasFile('building_image')) {
            $file = $request->file('building_image');
            $filename = 'sec-building.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('about', $filename, 'public');
            
            // Delete old building image files
            $oldFiles = glob(public_path('images/about/sec-building.*'));
            foreach ($oldFiles as $oldFile) {
                if (is_file($oldFile)) {
                    unlink($oldFile);
                }
            }
            
            // Copy to public/images/about for direct access
            $publicPath = public_path('images/about/' . $filename);
            if (!is_dir(dirname($publicPath))) {
                mkdir(dirname($publicPath), 0755, true);
            }
            copy(storage_path('app/public/' . $path), $publicPath);
            
            // Save image path to settings with timestamp to avoid cache
            $timestamp = time();
            Setting::set('about_building_image', 'images/about/' . $filename . '?v=' . $timestamp);
            
            // Clear any cached versions
            \Cache::forget('about_building_image');
            
            // Force browser to reload image
            session()->flash('image_updated', 'building');
        }
        
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
                    // Ensure value is a valid JSON string
                    $value = json_encode($decoded);
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

    /**
     * Clear image cache for about page.
     */
    public function clearCache()
    {
        try {
            // Clear Laravel cache
            \Cache::forget('about_header_image');
            \Cache::forget('about_building_image');
            
            // Clear file cache if exists
            $headerImage = Setting::get('about_header_image');
            $buildingImage = Setting::get('about_building_image');
            
            if ($headerImage) {
                // Remove timestamp from path
                $cleanPath = preg_replace('/\?v=\d+/', '', $headerImage);
                $newPath = $cleanPath . '?v=' . time();
                Setting::set('about_header_image', $newPath);
            }
            
            if ($buildingImage) {
                // Remove timestamp from path
                $cleanPath = preg_replace('/\?v=\d+/', '', $buildingImage);
                $newPath = $cleanPath . '?v=' . time();
                Setting::set('about_building_image', $newPath);
            }
            
            return $this->successAndRedirect('Đã xóa cache ảnh thành công! Ảnh sẽ được tải lại ngay lập tức.', 'admin.about.index');
            
        } catch (\Exception $e) {
            return $this->errorAndRedirect('Có lỗi xảy ra khi xóa cache: ' . $e->getMessage(), 'admin.about.index');
        }
    }
}