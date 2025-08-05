<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::orderBy('group')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('group');

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $settings = $request->input('settings', []);
        
        foreach ($settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting) {
                // Handle file uploads
                if ($setting->type === 'image' && $request->hasFile("settings.{$key}")) {
                    // Delete old file
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    
                    $file = $request->file("settings.{$key}");
                    $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('settings', $filename, 'public');
                    $value = $path;
                }
                
                $setting->update(['value' => $value]);
            }
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Cài đặt đã được cập nhật thành công!');
    }
}
