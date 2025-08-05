<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:programs,slug',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'required|string|max:100',
            'salary_range' => 'required|string|max:100',
            'opportunity_level' => 'required|in:Thấp,Trung bình,Cao,Rất cao',
            'requirements' => 'nullable|array',
            'benefits' => 'nullable|array',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        
        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('programs', $filename, 'public');
            $data['image_path'] = $path;
        }

        // Set default sort order
        if (!isset($data['sort_order'])) {
            $data['sort_order'] = Program::max('sort_order') + 1;
        }

        // Handle JSON fields
        $data['requirements'] = json_encode($request->requirements ?? []);
        $data['benefits'] = json_encode($request->benefits ?? []);

        // Handle checkboxes
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        Program::create($data);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Chương trình đã được tạo thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return view('admin.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:programs,slug,' . $program->id,
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'duration' => 'required|string|max:100',
            'salary_range' => 'required|string|max:100',
            'opportunity_level' => 'required|in:Thấp,Trung bình,Cao,Rất cao',
            'requirements' => 'nullable|array',
            'benefits' => 'nullable|array',
            'icon' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:7',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        
        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($program->image_path) {
                Storage::disk('public')->delete($program->image_path);
            }
            
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('programs', $filename, 'public');
            $data['image_path'] = $path;
        }

        // Handle JSON fields
        $data['requirements'] = json_encode($request->requirements ?? []);
        $data['benefits'] = json_encode($request->benefits ?? []);

        // Handle checkboxes
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        $program->update($data);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Chương trình đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        // Delete image file
        if ($program->image_path) {
            Storage::disk('public')->delete($program->image_path);
        }

        $program->delete();

        return redirect()->route('admin.programs.index')
            ->with('success', 'Chương trình đã được xóa thành công!');
    }

    /**
     * Toggle program status
     */
    public function toggleStatus(Program $program)
    {
        $program->update([
            'is_active' => !$program->is_active
        ]);

        $status = $program->is_active ? 'hiển thị' : 'ẩn';
        
        return redirect()->back()
            ->with('success', "Chương trình đã được {$status} thành công!");
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Program $program)
    {
        $program->update([
            'is_featured' => !$program->is_featured
        ]);

        $status = $program->is_featured ? 'đánh dấu nổi bật' : 'bỏ đánh dấu nổi bật';
        
        return redirect()->back()
            ->with('success', "Chương trình đã được {$status} thành công!");
    }

    /**
     * Update programs order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:programs,id',
            'items.*.sort_order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Program::where('id', $item['id'])
                ->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Thứ tự chương trình đã được cập nhật!'
        ]);
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:activate,deactivate,feature,unfeature,delete',
            'programs' => 'required|array',
            'programs.*' => 'exists:programs,id',
        ]);

        $programs = Program::whereIn('id', $request->programs);

        switch ($request->action) {
            case 'activate':
                $programs->update(['is_active' => true]);
                $message = 'Các chương trình đã được kích hoạt!';
                break;
            case 'deactivate':
                $programs->update(['is_active' => false]);
                $message = 'Các chương trình đã được ẩn!';
                break;
            case 'feature':
                $programs->update(['is_featured' => true]);
                $message = 'Các chương trình đã được đánh dấu nổi bật!';
                break;
            case 'unfeature':
                $programs->update(['is_featured' => false]);
                $message = 'Các chương trình đã được bỏ đánh dấu nổi bật!';
                break;
            case 'delete':
                // Delete image files
                foreach ($programs->get() as $program) {
                    if ($program->image_path) {
                        Storage::disk('public')->delete($program->image_path);
                    }
                }
                $programs->delete();
                $message = 'Các chương trình đã được xóa!';
                break;
        }

        return redirect()->back()->with('success', $message);
    }
}
