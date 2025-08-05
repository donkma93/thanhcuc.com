<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'current_job' => 'required|string|max:255',
            'content' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $avatar->getClientOriginalExtension();
            $path = $avatar->storeAs('testimonials', $filename, 'public');
            $data['avatar_path'] = $path;
        }

        // Set default sort order
        if (!isset($data['sort_order'])) {
            $data['sort_order'] = Testimonial::max('sort_order') + 1;
        }

        // Handle checkboxes
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial đã được tạo thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'current_job' => 'required|string|max:255',
            'content' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($testimonial->avatar_path) {
                Storage::disk('public')->delete($testimonial->avatar_path);
            }
            
            $avatar = $request->file('avatar');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $avatar->getClientOriginalExtension();
            $path = $avatar->storeAs('testimonials', $filename, 'public');
            $data['avatar_path'] = $path;
        }

        // Handle checkboxes
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete avatar file
        if ($testimonial->avatar_path) {
            Storage::disk('public')->delete($testimonial->avatar_path);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial đã được xóa thành công!');
    }

    /**
     * Toggle testimonial status
     */
    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->update([
            'is_active' => !$testimonial->is_active
        ]);

        $status = $testimonial->is_active ? 'hiển thị' : 'ẩn';
        
        return redirect()->back()
            ->with('success', "Testimonial đã được {$status} thành công!");
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Testimonial $testimonial)
    {
        $testimonial->update([
            'is_featured' => !$testimonial->is_featured
        ]);

        $status = $testimonial->is_featured ? 'đánh dấu nổi bật' : 'bỏ đánh dấu nổi bật';
        
        return redirect()->back()
            ->with('success', "Testimonial đã được {$status} thành công!");
    }

    /**
     * Update testimonials order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:testimonials,id',
            'items.*.sort_order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Testimonial::where('id', $item['id'])
                ->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Thứ tự testimonial đã được cập nhật!'
        ]);
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:activate,deactivate,feature,unfeature,delete',
            'testimonials' => 'required|array',
            'testimonials.*' => 'exists:testimonials,id',
        ]);

        $testimonials = Testimonial::whereIn('id', $request->testimonials);

        switch ($request->action) {
            case 'activate':
                $testimonials->update(['is_active' => true]);
                $message = 'Các testimonial đã được kích hoạt!';
                break;
            case 'deactivate':
                $testimonials->update(['is_active' => false]);
                $message = 'Các testimonial đã được ẩn!';
                break;
            case 'feature':
                $testimonials->update(['is_featured' => true]);
                $message = 'Các testimonial đã được đánh dấu nổi bật!';
                break;
            case 'unfeature':
                $testimonials->update(['is_featured' => false]);
                $message = 'Các testimonial đã được bỏ đánh dấu nổi bật!';
                break;
            case 'delete':
                // Delete avatar files
                foreach ($testimonials->get() as $testimonial) {
                    if ($testimonial->avatar_path) {
                        Storage::disk('public')->delete($testimonial->avatar_path);
                    }
                }
                $testimonials->delete();
                $message = 'Các testimonial đã được xóa!';
                break;
        }

        return redirect()->back()->with('success', $message);
    }
}
