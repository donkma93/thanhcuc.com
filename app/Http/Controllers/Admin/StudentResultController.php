<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentResult;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scores = StudentResult::scores()->ordered()->get();
        $feedbacks = StudentResult::feedbacks()->ordered()->get();
        
        return view('admin.student-results.index', compact('scores', 'feedbacks'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:score,feedback',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'student_name' => 'nullable|string|max:255',
            'certificate_type' => 'nullable|string|max:100',
            'level' => 'nullable|string|max:50',
            'score' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'type.required' => 'Vui lòng chọn loại kết quả.',
            'type.in' => 'Loại kết quả không hợp lệ.',
            'image.required' => 'Vui lòng chọn ảnh.',
            'image.image' => 'File phải là ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'image.max' => 'Ảnh không được lớn hơn 2MB.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Xử lý upload ảnh
            $imagePath = $request->file('image')->store('student-results', 'public');
            
            // Tạo kết quả học viên
            StudentResult::create([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'image_path' => $imagePath,
                'student_name' => $request->student_name,
                'certificate_type' => $request->certificate_type,
                'level' => $request->level,
                'score' => $request->score,
                'sort_order' => $request->sort_order ?? 0,
                'is_active' => $request->boolean('is_active'),
                'is_featured' => $request->boolean('is_featured'),
            ]);

            $typeLabel = $request->type === 'score' ? 'Bảng điểm' : 'Phản hồi';
            return redirect()->route('admin.student-results.index')
                ->with('success', "Thêm {$typeLabel} thành công!");

        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage())->withInput();
        }
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:score,feedback',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'student_name' => 'nullable|string|max:255',
            'certificate_type' => 'nullable|string|max:100',
            'level' => 'nullable|string|max:50',
            'score' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'type.required' => 'Vui lòng chọn loại kết quả.',
            'type.in' => 'Loại kết quả không hợp lệ.',
            'image.image' => 'File phải là ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'image.max' => 'Ảnh không được lớn hơn 2MB.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'student_name' => $request->student_name,
                'certificate_type' => $request->certificate_type,
                'level' => $request->level,
                'score' => $request->score,
                'sort_order' => $request->sort_order ?? 0,
                'is_active' => $request->boolean('is_active'),
                'is_featured' => $request->boolean('is_featured'),
            ];

            // Xử lý upload ảnh mới nếu có
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ
                if ($studentResult->image_path && !str_starts_with($studentResult->image_path, 'http')) {
                    Storage::disk('public')->delete($studentResult->image_path);
                }
                
                // Upload ảnh mới
                $data['image_path'] = $request->file('image')->store('student-results', 'public');
            }

            $studentResult->update($data);

            $typeLabel = $request->type === 'score' ? 'Bảng điểm' : 'Phản hồi';
            return redirect()->route('admin.student-results.index')
                ->with('success', "Cập nhật {$typeLabel} thành công!");

        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentResult $studentResult)
    {
        try {
            // Xóa ảnh
            if ($studentResult->image_path && !str_starts_with($studentResult->image_path, 'http')) {
                Storage::disk('public')->delete($studentResult->image_path);
            }
            
            $studentResult->delete();
            
            $typeLabel = $studentResult->type === 'score' ? 'Bảng điểm' : 'Phản hồi';
            return redirect()->route('admin.student-results.index')
                ->with('success', "Xóa {$typeLabel} thành công!");

        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Toggle trạng thái active
     */
    public function toggleStatus(StudentResult $studentResult)
    {
        $studentResult->update(['is_active' => !$studentResult->is_active]);
        
        $status = $studentResult->is_active ? 'kích hoạt' : 'ẩn';
        $typeLabel = $studentResult->type === 'score' ? 'Bảng điểm' : 'Phản hồi';
        
        return back()->with('success', "Đã {$status} {$typeLabel}!");
    }

    /**
     * Toggle trạng thái featured
     */
    public function toggleFeatured(StudentResult $studentResult)
    {
        $studentResult->update(['is_featured' => !$studentResult->is_featured]);
        
        $status = $studentResult->is_featured ? 'nổi bật' : 'bỏ nổi bật';
        $typeLabel = $studentResult->type === 'score' ? 'Bảng điểm' : 'Phản hồi';
        
        return back()->with('success', "Đã {$status} {$typeLabel}!");
    }

    /**
     * Cập nhật thứ tự sắp xếp
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:student_results,id',
            'items.*.sort_order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            StudentResult::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:activate,deactivate,feature,unfeature,delete',
            'items' => 'required|array|min:1',
            'items.*' => 'exists:student_results,id',
        ]);

        $action = $request->action;
        $items = $request->items;

        switch ($action) {
            case 'activate':
                StudentResult::whereIn('id', $items)->update(['is_active' => true]);
                $message = 'Đã kích hoạt các mục đã chọn!';
                break;
                
            case 'deactivate':
                StudentResult::whereIn('id', $items)->update(['is_active' => false]);
                $message = 'Đã ẩn các mục đã chọn!';
                break;
                
            case 'feature':
                StudentResult::whereIn('id', $items)->update(['is_featured' => true]);
                $message = 'Đã đánh dấu nổi bật các mục đã chọn!';
                break;
                
            case 'unfeature':
                StudentResult::whereIn('id', $items)->update(['is_featured' => false]);
                $message = 'Đã bỏ đánh dấu nổi bật các mục đã chọn!';
                break;
                
            case 'delete':
                $results = StudentResult::whereIn('id', $items)->get();
                foreach ($results as $result) {
                    if ($result->image_path && !str_starts_with($result->image_path, 'http')) {
                        Storage::disk('public')->delete($result->image_path);
                    }
                }
                StudentResult::whereIn('id', $items)->delete();
                $message = 'Đã xóa các mục đã chọn!';
                break;
        }

        return back()->with('success', $message);
    }
}
