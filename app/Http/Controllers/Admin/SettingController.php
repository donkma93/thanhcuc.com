<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    use HasMessagebox;
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

                // Normalize JSON settings from structured fields
                if ($setting->type === 'json') {
                    // If the incoming value is an array (e.g., branches[name,address]) encode to JSON
                    if (is_array($value)) {
                        $value = json_encode($value, JSON_UNESCAPED_UNICODE);
                    }
                }
                
                $setting->update(['value' => $value]);
            }
        }

        // Manage branches (group: branches) - create/update/delete
        $existingBranches = $request->input('branches', []);
        foreach ($existingBranches as $branchKey => $branchData) {
            $branchSetting = Setting::where('group', 'branches')->where('key', $branchKey)->first();
            if (!$branchSetting) {
                continue;
            }

            // Delete branch if requested
            if (isset($branchData['delete']) && (bool)$branchData['delete']) {
                $branchSetting->delete();
                continue;
            }

            // Update branch fields
            $branchValue = [
                'name' => trim($branchData['name'] ?? ''),
                'address' => trim($branchData['address'] ?? ''),
                'phone' => trim($branchData['phone'] ?? ''),
                'working_hours' => trim($branchData['working_hours'] ?? ''),
            ];

            $branchSetting->label = $branchData['label'] ?? ($branchValue['name'] ?: $branchSetting->label);
            if (isset($branchData['sort_order'])) {
                $branchSetting->sort_order = (int) $branchData['sort_order'];
            }
            $branchSetting->type = 'json';
            $branchSetting->value = json_encode($branchValue, JSON_UNESCAPED_UNICODE);
            $branchSetting->save();
        }

        // Create new branches
        $newBranches = $request->input('new_branches', []);
        if (is_array($newBranches)) {
            // Determine base sort order
            $maxSort = (int) Setting::where('group', 'branches')->max('sort_order');
            foreach ($newBranches as $nb) {
                $name = trim($nb['name'] ?? '');
                $address = trim($nb['address'] ?? '');
                if ($name === '' && $address === '') {
                    continue;
                }

                $label = $nb['label'] ?? $name;
                $sortOrder = isset($nb['sort_order']) ? (int) $nb['sort_order'] : (++$maxSort);

                // Generate unique key
                $baseKey = 'branch_' . Str::slug($name ?: ('chi-nhanh-' . uniqid()));
                $key = $baseKey;
                $suffix = 1;
                while (Setting::where('key', $key)->exists()) {
                    $key = $baseKey . '_' . $suffix++;
                }

                Setting::create([
                    'key' => $key,
                    'value' => json_encode([
                        'name' => $name,
                        'address' => $address,
                        'phone' => trim($nb['phone'] ?? ''),
                        'working_hours' => trim($nb['working_hours'] ?? ''),
                    ], JSON_UNESCAPED_UNICODE),
                    'type' => 'json',
                    'group' => 'branches',
                    'label' => $label ?: $key,
                    'description' => 'Thông tin chi nhánh',
                    'sort_order' => $sortOrder,
                ]);
            }
        }

        // Clear cached footer data so updates reflect immediately
        cache()->forget('footer_branches');
        cache()->forget('footer_settings');
        cache()->forget('footer_courses');

        return $this->successAndRedirect('Cài đặt website đã được cập nhật thành công!', 'admin.settings.index');
    }
}
