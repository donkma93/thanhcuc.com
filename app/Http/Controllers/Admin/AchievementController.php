<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    use HasMessagebox;

    public function index(Request $request)
    {
        $query = Achievement::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('student_name', 'like', "%{$search}%")
                  ->orWhere('class_name', 'like', "%{$search}%")
                  ->orWhere('achievement_title', 'like', "%{$search}%")
                  ->orWhere('certificate', 'like', "%{$search}%")
                  ->orWhere('university', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by rank
        if ($request->filled('rank')) {
            $query->where('rank', $request->rank);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured === 'yes');
        }

        $achievements = $query->orderBy('category')
                             ->orderBy('rank')
                             ->orderBy('sort_order')
                             ->paginate(15);

        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        $categories = [
            'monthly' => 'Thành tích tháng',
            'exam' => 'Thành tích thi cử',
            'scholarship' => 'Du học thành công'
        ];

        return view('admin.achievements.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class_name' => 'nullable|string|max:255',
            'category' => 'required|in:monthly,exam,scholarship',
            'score' => 'nullable|numeric|min:0|max:10',
            'achievement_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'achievement_date' => 'required|date',
            'rank' => 'required|integer|min:1|max:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->all();

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . str_replace(' ', '_', $request->student_name) . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('achievements', $avatarName, 'public');
            $data['avatar'] = $avatarPath;
        }

        // Set default sort order
        if (!$request->filled('sort_order')) {
            $maxOrder = Achievement::where('category', $request->category)
                                  ->where('rank', $request->rank)
                                  ->max('sort_order') ?? 0;
            $data['sort_order'] = $maxOrder + 1;
        }

        $achievement = Achievement::create($data);

        return $this->successAndRedirect(
            'Thành tích của "' . $achievement->student_name . '" đã được tạo thành công!',
            'admin.achievements.index'
        );
    }

    public function show(Achievement $achievement)
    {
        return view('admin.achievements.show', compact('achievement'));
    }

    public function edit(Achievement $achievement)
    {
        $categories = [
            'monthly' => 'Thành tích tháng',
            'exam' => 'Thành tích thi cử',
            'scholarship' => 'Du học thành công'
        ];

        return view('admin.achievements.edit', compact('achievement', 'categories'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class_name' => 'nullable|string|max:255',
            'category' => 'required|in:monthly,exam,scholarship',
            'score' => 'nullable|numeric|min:0|max:10',
            'achievement_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'achievement_date' => 'required|date',
            'rank' => 'required|integer|min:1|max:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        $data = $request->all();

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($achievement->avatar && Storage::disk('public')->exists($achievement->avatar)) {
                Storage::disk('public')->delete($achievement->avatar);
            }
            
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . str_replace(' ', '_', $request->student_name) . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('achievements', $avatarName, 'public');
            $data['avatar'] = $avatarPath;
        }

        $achievement->update($data);

        return $this->successAndRedirect(
            'Thành tích của "' . $achievement->student_name . '" đã được cập nhật thành công!',
            'admin.achievements.index'
        );
    }

    public function destroy(Achievement $achievement)
    {
        // Delete avatar if exists
        if ($achievement->avatar && Storage::disk('public')->exists($achievement->avatar)) {
            Storage::disk('public')->delete($achievement->avatar);
        }

        $studentName = $achievement->student_name;
        $achievement->delete();

        return $this->successAndRedirect(
            'Thành tích của "' . $studentName . '" đã được xóa thành công!',
            'admin.achievements.index'
        );
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:activate,deactivate,feature,unfeature,delete',
            'selected_achievements' => 'required|array',
            'selected_achievements.*' => 'exists:achievements,id'
        ]);

        // Ensure selected_achievements is always an array
        $selectedAchievements = is_array($request->selected_achievements) ? $request->selected_achievements : [$request->selected_achievements];
        $selectedAchievements = array_filter($selectedAchievements);

        if (empty($selectedAchievements)) {
            return $this->errorAndBack('Vui lòng chọn ít nhất một thành tích để thực hiện hành động.');
        }

        $achievements = Achievement::whereIn('id', $selectedAchievements);
        $count = count($selectedAchievements);
        
        switch ($request->action) {
            case 'activate':
                $achievements->update(['is_active' => true]);
                $message = "Đã kích hoạt thành công {$count} thành tích!";
                break;
                
            case 'deactivate':
                $achievements->update(['is_active' => false]);
                $message = "Đã vô hiệu hóa thành công {$count} thành tích!";
                break;
                
            case 'feature':
                $achievements->update(['is_featured' => true]);
                $message = "Đã đánh dấu nổi bật thành công {$count} thành tích!";
                break;
                
            case 'unfeature':
                $achievements->update(['is_featured' => false]);
                $message = "Đã bỏ đánh dấu nổi bật thành công {$count} thành tích!";
                break;
                
            case 'delete':
                // Delete avatars
                foreach ($achievements->get() as $achievement) {
                    if ($achievement->avatar && Storage::disk('public')->exists($achievement->avatar)) {
                        Storage::disk('public')->delete($achievement->avatar);
                    }
                }
                $achievements->delete();
                $message = "Đã xóa thành công {$count} thành tích!";
                break;
        }

        return $this->successAndRedirect($message, 'admin.achievements.index');
    }

    public function updateSortOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:achievements,id',
            'items.*.sort_order' => 'required|integer|min:0'
        ]);

        foreach ($request->items as $item) {
            Achievement::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }

        return $this->jsonSuccess('Thứ tự thành tích đã được cập nhật thành công!');
    }

    public function toggleStatus(Achievement $achievement)
    {
        $achievement->update(['is_active' => !$achievement->is_active]);
        
        $status = $achievement->is_active ? 'kích hoạt' : 'vô hiệu hóa';
        return $this->successAndRedirect(
            "Đã {$status} thành tích của \"{$achievement->student_name}\" thành công!",
            'admin.achievements.index'
        );
    }

    public function toggleFeatured(Achievement $achievement)
    {
        $achievement->update(['is_featured' => !$achievement->is_featured]);
        
        $status = $achievement->is_featured ? 'đánh dấu nổi bật' : 'bỏ đánh dấu nổi bật';
        return $this->successAndRedirect(
            "Đã {$status} thành tích của \"{$achievement->student_name}\" thành công!",
            'admin.achievements.index'
        );
    }
}