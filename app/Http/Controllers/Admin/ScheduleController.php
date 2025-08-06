<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    use HasMessagebox;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Schedule::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('teacher_name', 'like', "%{$search}%")
                  ->orWhere('level', 'like', "%{$search}%");
            });
        }

        // Filter by level
        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by course type
        if ($request->filled('course_type')) {
            $query->where('course_type', $request->course_type);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $schedules = $query->paginate(15)->withQueryString();

        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'schedule_days' => 'required|array',
            'schedule_days.*' => 'string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'duration_months' => 'required|integer|min:1',
            'max_students' => 'required|integer|min:1',
            'current_students' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'teacher_name' => 'required|string|max:255',
            'teacher_title' => 'nullable|string|max:255',
            'teacher_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_type' => 'required|string',
            'status' => 'required|string',
            'is_featured' => 'boolean',
            'is_popular' => 'boolean',
            'registration_deadline' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'requirements' => 'nullable|array',
            'benefits' => 'nullable|array',
            'curriculum' => 'nullable|array',
            'certificate' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:schedules,slug',
            'sort_order' => 'nullable|integer'
        ]);

        // Handle teacher avatar upload
        if ($request->hasFile('teacher_avatar')) {
            $validated['teacher_avatar'] = $request->file('teacher_avatar')->store('teachers', 'public');
        }

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Calculate discount percentage if not provided
        if (empty($validated['discount_percentage']) && !empty($validated['original_price']) && $validated['original_price'] > $validated['price']) {
            $validated['discount_percentage'] = round((($validated['original_price'] - $validated['price']) / $validated['original_price']) * 100);
        }

        // Set current students to 0 if not provided
        $validated['current_students'] = $validated['current_students'] ?? 0;

        // Convert boolean fields
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_popular'] = $request->has('is_popular');

        $schedule = Schedule::create($validated);

        return $this->successAndRedirect(
            'Lịch khai giảng "' . $schedule->title . '" đã được tạo thành công!',
            'admin.schedules.index'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        return view('admin.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'schedule_days' => 'required|array',
            'schedule_days.*' => 'string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'duration_months' => 'required|integer|min:1',
            'max_students' => 'required|integer|min:1',
            'current_students' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'teacher_name' => 'required|string|max:255',
            'teacher_title' => 'nullable|string|max:255',
            'teacher_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_type' => 'required|string',
            'status' => 'required|string',
            'is_featured' => 'boolean',
            'is_popular' => 'boolean',
            'registration_deadline' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'requirements' => 'nullable|array',
            'benefits' => 'nullable|array',
            'curriculum' => 'nullable|array',
            'certificate' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:schedules,slug,' . $schedule->id,
            'sort_order' => 'nullable|integer'
        ]);

        // Handle teacher avatar upload
        if ($request->hasFile('teacher_avatar')) {
            // Delete old avatar if exists
            if ($schedule->teacher_avatar) {
                Storage::disk('public')->delete($schedule->teacher_avatar);
            }
            $validated['teacher_avatar'] = $request->file('teacher_avatar')->store('teachers', 'public');
        }

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Calculate discount percentage if not provided
        if (empty($validated['discount_percentage']) && !empty($validated['original_price']) && $validated['original_price'] > $validated['price']) {
            $validated['discount_percentage'] = round((($validated['original_price'] - $validated['price']) / $validated['original_price']) * 100);
        }

        // Convert boolean fields
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_popular'] = $request->has('is_popular');

        $schedule->update($validated);

        return $this->successAndRedirect(
            'Lịch khai giảng "' . $schedule->title . '" đã được cập nhật thành công!',
            'admin.schedules.index'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        // Delete teacher avatar if exists
        if ($schedule->teacher_avatar) {
            Storage::disk('public')->delete($schedule->teacher_avatar);
        }

        $scheduleTitle = $schedule->title;
        $schedule->delete();

        return $this->successAndRedirect(
            'Lịch khai giảng "' . $scheduleTitle . '" đã được xóa thành công!',
            'admin.schedules.index'
        );
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $schedule = Schedule::withTrashed()->findOrFail($id);
        $schedule->restore();

        return $this->successAndRedirect(
            'Lịch khai giảng "' . $schedule->title . '" đã được khôi phục thành công!',
            'admin.schedules.index'
        );
    }

    /**
     * Force delete the specified resource from storage.
     */
    public function forceDelete($id)
    {
        $schedule = Schedule::withTrashed()->findOrFail($id);
        
        // Delete teacher avatar if exists
        if ($schedule->teacher_avatar) {
            Storage::disk('public')->delete($schedule->teacher_avatar);
        }

        $scheduleTitle = $schedule->title;
        $schedule->forceDelete();

        return $this->successAndRedirect(
            'Lịch khai giảng "' . $scheduleTitle . '" đã được xóa vĩnh viễn!',
            'admin.schedules.index'
        );
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|string|in:delete,publish,unpublish,feature,unfeature',
            'selected_ids' => 'required|array',
            'selected_ids.*' => 'integer|exists:schedules,id'
        ]);

        $schedules = Schedule::whereIn('id', $request->selected_ids);

        switch ($request->action) {
            case 'delete':
                $schedules->delete();
                $message = 'Các lịch khai giảng đã được xóa thành công!';
                break;
            case 'publish':
                $schedules->update(['status' => 'published']);
                $message = 'Các lịch khai giảng đã được xuất bản thành công!';
                break;
            case 'unpublish':
                $schedules->update(['status' => 'draft']);
                $message = 'Các lịch khai giảng đã được chuyển về bản nháp!';
                break;
            case 'feature':
                $schedules->update(['is_featured' => true]);
                $message = 'Các lịch khai giảng đã được đánh dấu nổi bật!';
                break;
            case 'unfeature':
                $schedules->update(['is_featured' => false]);
                $message = 'Các lịch khai giảng đã được bỏ đánh dấu nổi bật!';
                break;
        }

        return $this->successAndRedirect($message, 'admin.schedules.index');
    }

    /**
     * Duplicate schedule
     */
    public function duplicate(Schedule $schedule)
    {
        $newSchedule = $schedule->replicate();
        $newSchedule->title = $schedule->title . ' (Bản sao)';
        $newSchedule->slug = Str::slug($newSchedule->title);
        $newSchedule->status = 'draft';
        $newSchedule->current_students = 0;
        $newSchedule->save();

        return $this->successAndRedirect(
            'Lịch khai giảng "' . $newSchedule->title . '" đã được sao chép thành công!',
            'admin.schedules.edit',
            ['schedule' => $newSchedule]
        );
    }
}