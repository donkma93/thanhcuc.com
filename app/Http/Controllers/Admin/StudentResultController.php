<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = StudentResult::query();

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('student_name', 'like', '%' . $request->search . '%');
            });
        }

        $studentResults = $query->ordered()->paginate(12);

        return view('admin.student-results.index', compact('studentResults'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student-results.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:score,feedback',
            'student_name' => 'nullable|string|max:255',
            'certificate_type' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:10',
            'score' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'in:0,1',
            'is_featured' => 'in:0,1'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('student-results', $filename, 'public');
            $data['image_path'] = $path;
        }

        $data['is_active'] = (bool) $request->input('is_active', 0);
        $data['is_featured'] = (bool) $request->input('is_featured', 0);
        $data['sort_order'] = $request->sort_order ?? 0;

        StudentResult::create($data);

        return redirect()->route('admin.student-results.index')
            ->with('success', 'Kết quả học viên đã được tạo thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentResult $studentResult)
    {
        return view('admin.student-results.show', compact('studentResult'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentResult $studentResult)
    {
        return view('admin.student-results.edit', compact('studentResult'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentResult $studentResult)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:score,feedback',
            'student_name' => 'nullable|string|max:255',
            'certificate_type' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:10',
            'score' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'in:0,1',
            'is_featured' => 'in:0,1'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($studentResult->image_path && Storage::disk('public')->exists($studentResult->image_path)) {
                Storage::disk('public')->delete($studentResult->image_path);
            }

            $image = $request->file('image');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('student-results', $filename, 'public');
            $data['image_path'] = $path;
        }

        $data['is_active'] = (bool) $request->input('is_active', 0);
        $data['is_featured'] = (bool) $request->input('is_featured', 0);
        $data['sort_order'] = $request->sort_order ?? 0;

        $studentResult->update($data);

        return redirect()->route('admin.student-results.index')
            ->with('success', 'Kết quả học viên đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentResult $studentResult)
    {
        // Delete image file
        if ($studentResult->image_path && Storage::disk('public')->exists($studentResult->image_path)) {
            Storage::disk('public')->delete($studentResult->image_path);
        }

        $studentResult->delete();

        return redirect()->route('admin.student-results.index')
            ->with('success', 'Kết quả học viên đã được xóa thành công!');
    }

    /**
     * Update sort order via AJAX
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:student_results,id',
            'items.*.sort_order' => 'required|integer|min:0'
        ]);

        foreach ($request->items as $item) {
            StudentResult::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json(['success' => true, 'message' => 'Thứ tự đã được cập nhật!']);
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(StudentResult $studentResult)
    {
        $studentResult->update(['is_active' => !$studentResult->is_active]);

        return redirect()->back()
            ->with('success', 'Trạng thái đã được cập nhật!');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(StudentResult $studentResult)
    {
        $studentResult->update(['is_featured' => !$studentResult->is_featured]);

        return redirect()->back()
            ->with('success', 'Trạng thái nổi bật đã được cập nhật!');
    }
}
