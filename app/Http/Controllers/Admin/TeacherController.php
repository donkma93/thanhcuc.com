<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    use HasMessagebox;

    public function index(Request $request)
    {
        $query = Teacher::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('specialization', 'like', "%{$search}%")
                  ->orWhere('certification', 'like', "%{$search}%")
                  ->orWhere('bio', 'like', "%{$search}%");
            });
        }

        // Filter by specialization
        if ($request->filled('specialization')) {
            $query->where('specialization', $request->specialization);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured === 'yes');
        }

        $teachers = $query->orderBy('sort_order')
                         ->orderBy('name')
                         ->paginate(15);

        $specializations = Teacher::distinct()->pluck('specialization')->sort();

        return view('admin.teachers.index', compact('teachers', 'specializations'));
    }

    public function create()
    {
        $specializations = [
            'Tiếng Đức A1-A2' => 'Tiếng Đức A1-A2',
            'Tiếng Đức B1-B2' => 'Tiếng Đức B1-B2',
            'Tiếng Đức C1-C2' => 'Tiếng Đức C1-C2',
            'Giao tiếp tiếng Đức' => 'Giao tiếp tiếng Đức',
            'Tiếng Đức thương mại' => 'Tiếng Đức thương mại',
            'Luyện thi chứng chỉ' => 'Luyện thi chứng chỉ',
            'Du học nghề Đức' => 'Du học nghề Đức'
        ];

        return view('admin.teachers.create', compact('specializations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'specialization' => 'required|string|max:255',
            'certification' => 'required|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'achievements' => 'nullable|array',
            'achievements.*' => 'string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->all();
        
        // Generate slug
        $data['slug'] = Str::slug($request->name);
        
        // Ensure unique slug
        $originalSlug = $data['slug'];
        $counter = 1;
        while (Teacher::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . Str::slug($request->name) . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('teachers', $avatarName, 'public');
            $data['avatar'] = $avatarPath;
        }

        // Handle achievements array
        if ($request->filled('achievements')) {
            $data['achievements'] = array_filter($request->achievements);
        } else {
            $data['achievements'] = [];
        }

        // Set default sort order
        if (!$request->filled('sort_order')) {
            $maxOrder = Teacher::max('sort_order') ?? 0;
            $data['sort_order'] = $maxOrder + 1;
        }

        $teacher = Teacher::create($data);

        return $this->successAndRedirect(
            'Giảng viên "' . $teacher->name . '" đã được tạo thành công!',
            'admin.teachers.index'
        );
    }

    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $specializations = [
            'Tiếng Đức A1-A2' => 'Tiếng Đức A1-A2',
            'Tiếng Đức B1-B2' => 'Tiếng Đức B1-B2',
            'Tiếng Đức C1-C2' => 'Tiếng Đức C1-C2',
            'Giao tiếp tiếng Đức' => 'Giao tiếp tiếng Đức',
            'Tiếng Đức thương mại' => 'Tiếng Đức thương mại',
            'Luyện thi chứng chỉ' => 'Luyện thi chứng chỉ',
            'Du học nghề Đức' => 'Du học nghề Đức'
        ];

        return view('admin.teachers.edit', compact('teacher', 'specializations'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'specialization' => 'required|string|max:255',
            'certification' => 'required|string|max:255',
            'experience_years' => 'nullable|integer|min:0',
            'achievements' => 'nullable|array',
            'achievements.*' => 'string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->all();
        
        // Update slug if name changed
        if ($request->name !== $teacher->name) {
            $data['slug'] = Str::slug($request->name);
            
            // Ensure unique slug
            $originalSlug = $data['slug'];
            $counter = 1;
            while (Teacher::where('slug', $data['slug'])->where('id', '!=', $teacher->id)->exists()) {
                $data['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($teacher->avatar && Storage::disk('public')->exists($teacher->avatar)) {
                Storage::disk('public')->delete($teacher->avatar);
            }
            
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . Str::slug($request->name) . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('teachers', $avatarName, 'public');
            $data['avatar'] = $avatarPath;
        }

        // Handle achievements array
        if ($request->filled('achievements')) {
            $data['achievements'] = array_filter($request->achievements);
        } else {
            $data['achievements'] = [];
        }

        $teacher->update($data);

        return $this->successAndRedirect(
            'Giảng viên "' . $teacher->name . '" đã được cập nhật thành công!',
            'admin.teachers.index'
        );
    }

    public function destroy(Teacher $teacher)
    {
        // Delete avatar if exists
        if ($teacher->avatar && Storage::disk('public')->exists($teacher->avatar)) {
            Storage::disk('public')->delete($teacher->avatar);
        }

        $teacherName = $teacher->name;
        $teacher->delete();

        return $this->successAndRedirect(
            'Giảng viên "' . $teacherName . '" đã được xóa thành công!',
            'admin.teachers.index'
        );
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:activate,deactivate,feature,unfeature,delete',
            'selected_teachers' => 'required|array',
            'selected_teachers.*' => 'exists:teachers,id'
        ]);

        // Ensure selected_teachers is always an array
        $selectedTeachers = is_array($request->selected_teachers) ? $request->selected_teachers : [$request->selected_teachers];
        $selectedTeachers = array_filter($selectedTeachers);

        if (empty($selectedTeachers)) {
            return $this->errorAndBack('Vui lòng chọn ít nhất một giảng viên để thực hiện hành động.');
        }

        $teachers = Teacher::whereIn('id', $selectedTeachers);
        $count = count($selectedTeachers);
        
        switch ($request->action) {
            case 'activate':
                $teachers->update(['is_active' => true]);
                $message = "Đã kích hoạt thành công {$count} giảng viên!";
                break;
                
            case 'deactivate':
                $teachers->update(['is_active' => false]);
                $message = "Đã vô hiệu hóa thành công {$count} giảng viên!";
                break;
                
            case 'feature':
                $teachers->update(['is_featured' => true]);
                $message = "Đã đánh dấu nổi bật thành công {$count} giảng viên!";
                break;
                
            case 'unfeature':
                $teachers->update(['is_featured' => false]);
                $message = "Đã bỏ đánh dấu nổi bật thành công {$count} giảng viên!";
                break;
                
            case 'delete':
                // Delete avatars
                foreach ($teachers->get() as $teacher) {
                    if ($teacher->avatar && Storage::disk('public')->exists($teacher->avatar)) {
                        Storage::disk('public')->delete($teacher->avatar);
                    }
                }
                $teachers->delete();
                $message = "Đã xóa thành công {$count} giảng viên!";
                break;
        }

        return $this->successAndRedirect($message, 'admin.teachers.index');
    }

    public function updateSortOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:teachers,id',
            'items.*.sort_order' => 'required|integer|min:0'
        ]);

        foreach ($request->items as $item) {
            Teacher::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }

        return $this->jsonSuccess('Thứ tự giảng viên đã được cập nhật thành công!');
    }

    public function toggleStatus(Teacher $teacher)
    {
        $teacher->update(['is_active' => !$teacher->is_active]);
        
        $status = $teacher->is_active ? 'kích hoạt' : 'vô hiệu hóa';
        return $this->successAndRedirect(
            "Đã {$status} giảng viên \"{$teacher->name}\" thành công!",
            'admin.teachers.index'
        );
    }

    public function toggleFeatured(Teacher $teacher)
    {
        $teacher->update(['is_featured' => !$teacher->is_featured]);
        
        $status = $teacher->is_featured ? 'đánh dấu nổi bật' : 'bỏ đánh dấu nổi bật';
        return $this->successAndRedirect(
            "Đã {$status} giảng viên \"{$teacher->name}\" thành công!",
            'admin.teachers.index'
        );
    }
}