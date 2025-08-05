<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort_order')->orderBy('id')->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|url',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'image.required' => 'Vui lòng chọn hình ảnh.',
            'image.image' => 'File phải là hình ảnh.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'button_link.url' => 'Link button phải là URL hợp lệ.',
        ]);

        $data = $request->only(['title', 'description', 'button_text', 'button_link', 'sort_order']);
        $data['is_active'] = $request->has('is_active');

        // Upload image
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('sliders', 'public');
        }

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Tạo slider thành công!');
    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|url',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'image.image' => 'File phải là hình ảnh.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'button_link.url' => 'Link button phải là URL hợp lệ.',
        ]);

        $data = $request->only(['title', 'description', 'button_text', 'button_link', 'sort_order']);
        $data['is_active'] = $request->has('is_active');

        // Upload new image if provided
        if ($request->hasFile('image')) {
            // Delete old image
            if ($slider->image_path) {
                Storage::disk('public')->delete($slider->image_path);
            }
            $data['image_path'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Cập nhật slider thành công!');
    }

    public function destroy(Slider $slider)
    {
        // Delete image file
        if ($slider->image_path) {
            Storage::disk('public')->delete($slider->image_path);
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Xóa slider thành công!');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:sliders,id',
            'items.*.sort_order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Slider::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json(['success' => true, 'message' => 'Cập nhật thứ tự thành công!']);
    }

    public function toggleStatus(Slider $slider)
    {
        $slider->update(['is_active' => !$slider->is_active]);
        
        $status = $slider->is_active ? 'kích hoạt' : 'vô hiệu hóa';
        return back()->with('success', "Đã {$status} slider thành công!");
    }
}
