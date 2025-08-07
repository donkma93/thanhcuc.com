<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    use HasMessagebox;
    public function index(Request $request)
    {
        $query = Course::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $courses = $query->orderBy('category')
                        ->orderBy('sort_order')
                        ->paginate(15);

        $categories = Course::distinct()->pluck('category')->sort();

        return view('admin.courses.index', compact('courses', 'categories'));
    }

    public function create()
    {
        $categories = [
            'A1-A2' => 'A1-A2 (Cơ bản)',
            'B1-B2' => 'B1-B2 (Trung cấp)',
            'C1-C2' => 'C1-C2 (Nâng cao)',
            'Giao tiếp' => 'Giao tiếp',
            'Chuyên ngành' => 'Chuyên ngành',
            'Luyện thi' => 'Luyện thi'
        ];

        $levels = [
            'Beginner' => 'Cơ bản',
            'Intermediate' => 'Trung cấp', 
            'Advanced' => 'Nâng cao',
            'All levels' => 'Tất cả trình độ'
        ];

        return view('admin.courses.create', compact('categories', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'level' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'duration_hours' => 'nullable|integer|min:1',
            'target_score' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->all();
        
        // Generate slug
        $data['slug'] = Str::slug($request->name);
        
        // Ensure unique slug
        $originalSlug = $data['slug'];
        $counter = 1;
        while (Course::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('courses', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        // Handle features array
        if ($request->filled('features')) {
            $data['features'] = array_filter($request->features);
        } else {
            $data['features'] = [];
        }

        // Set default sort order
        if (!$request->filled('sort_order')) {
            $maxOrder = Course::where('category', $request->category)->max('sort_order') ?? 0;
            $data['sort_order'] = $maxOrder + 1;
        }

        $course = Course::create($data);

        return $this->successAndRedirect(
            'Khóa học "' . $course->name . '" đã được tạo thành công!',
            'admin.courses.index'
        );
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = [
            'A1-A2' => 'A1-A2 (Cơ bản)',
            'B1-B2' => 'B1-B2 (Trung cấp)',
            'C1-C2' => 'C1-C2 (Nâng cao)',
            'Giao tiếp' => 'Giao tiếp',
            'Chuyên ngành' => 'Chuyên ngành',
            'Luyện thi' => 'Luyện thi'
        ];

        $levels = [
            'Beginner' => 'Cơ bản',
            'Intermediate' => 'Trung cấp', 
            'Advanced' => 'Nâng cao',
            'All levels' => 'Tất cả trình độ'
        ];

        return view('admin.courses.edit', compact('course', 'categories', 'levels'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'level' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'duration_hours' => 'nullable|integer|min:1',
            'target_score' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->all();
        
        // Update slug if name changed
        if ($request->name !== $course->name) {
            $data['slug'] = Str::slug($request->name);
            
            // Ensure unique slug
            $originalSlug = $data['slug'];
            $counter = 1;
            while (Course::where('slug', $data['slug'])->where('id', '!=', $course->id)->exists()) {
                $data['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($course->image && Storage::disk('public')->exists($course->image)) {
                Storage::disk('public')->delete($course->image);
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('courses', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        // Handle features array
        if ($request->filled('features')) {
            $data['features'] = array_filter($request->features);
        } else {
            $data['features'] = [];
        }

        $course->update($data);

        return $this->successAndRedirect(
            'Khóa học "' . $course->name . '" đã được cập nhật thành công!',
            'admin.courses.index'
        );
    }

    public function destroy(Course $course)
    {
        // Delete image if exists
        if ($course->image && Storage::disk('public')->exists($course->image)) {
            Storage::disk('public')->delete($course->image);
        }

        $courseName = $course->name;
        $course->delete();

        return $this->successAndRedirect(
            'Khóa học "' . $courseName . '" đã được xóa thành công!',
            'admin.courses.index'
        );
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:activate,deactivate,delete',
            'selected_courses' => 'required|array',
            'selected_courses.*' => 'exists:courses,id'
        ]);

        // Ensure selected_courses is always an array
        $selectedCourses = is_array($request->selected_courses) ? $request->selected_courses : [$request->selected_courses];
        $selectedCourses = array_filter($selectedCourses); // Remove empty values

        if (empty($selectedCourses)) {
            return $this->errorAndBack('Vui lòng chọn ít nhất một khóa học để thực hiện hành động.');
        }

        $courses = Course::whereIn('id', $selectedCourses);

        $count = count($selectedCourses);
        
        switch ($request->action) {
            case 'activate':
                $courses->update(['is_active' => true]);
                $message = "Đã kích hoạt thành công {$count} khóa học!";
                break;
                
            case 'deactivate':
                $courses->update(['is_active' => false]);
                $message = "Đã vô hiệu hóa thành công {$count} khóa học!";
                break;
                
            case 'delete':
                // Delete images
                foreach ($courses->get() as $course) {
                    if ($course->image && Storage::disk('public')->exists($course->image)) {
                        Storage::disk('public')->delete($course->image);
                    }
                }
                $courses->delete();
                $message = "Đã xóa thành công {$count} khóa học!";
                break;
        }

        return $this->successAndRedirect($message, 'admin.courses.index');
    }

    public function updateSortOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:courses,id',
            'items.*.sort_order' => 'required|integer|min:0'
        ]);

        foreach ($request->items as $item) {
            Course::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }

        return $this->jsonSuccess('Thứ tự khóa học đã được cập nhật thành công!');
    }
}