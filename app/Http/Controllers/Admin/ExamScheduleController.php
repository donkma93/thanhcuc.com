<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ExamScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examSchedules = ExamSchedule::orderBy('sort_order')
            ->orderBy('exam_date')
            ->paginate(15);

        return view('admin.exam-schedules.index', compact('examSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $examTypes = [
            'Goethe' => 'Goethe Certificate',
            'TestDaF' => 'TestDaF (Test Deutsch als Fremdsprache)',
            'Telc' => 'Telc Deutsch',
            'ÖSD' => 'ÖSD (Österreichisches Sprachdiplom)',
            'DSH' => 'DSH (Deutsche Sprachprüfung für den Hochschulzugang)'
        ];

        $levels = [
            'A1' => 'A1 - Cơ bản',
            'A2' => 'A2 - Sơ cấp',
            'B1' => 'B1 - Trung cấp',
            'B2' => 'B2 - Trung cao cấp',
            'C1' => 'C1 - Cao cấp',
            'C2' => 'C2 - Thành thạo'
        ];

        $statuses = [
            'active' => 'Hoạt động',
            'inactive' => 'Không hoạt động',
            'completed' => 'Đã hoàn thành'
        ];

        return view('admin.exam-schedules.create', compact('examTypes', 'levels', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exam_type' => 'required|string|max:255',
            'level' => 'required|string|max:10',
            'exam_period' => 'nullable|string|max:100',
            'exam_date' => 'required|date|after:yesterday',
            'exam_time' => 'nullable|date_format:H:i',
            'registration_deadline' => 'required|date|before:exam_date',
            'fee' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive,completed',
            'max_participants' => 'nullable|integer|min:1',
            'current_participants' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ], [
            'exam_date.after' => 'Ngày thi phải sau ngày hôm nay',
            'exam_time.date_format' => 'Giờ thi phải có định dạng HH:MM (ví dụ: 09:00)',
            'registration_deadline.before' => 'Hạn đăng ký phải trước ngày thi',
            'fee.min' => 'Lệ phí không được âm',
            'max_participants.min' => 'Số lượng tối đa phải lớn hơn 0',
            'current_participants.min' => 'Số lượng hiện tại không được âm'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $examSchedule = ExamSchedule::create($request->all());

            DB::commit();

            return redirect()->route('admin.exam-schedules.index')
                ->with('success', 'Lịch thi đã được tạo thành công!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi tạo lịch thi: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamSchedule $examSchedule)
    {
        return view('admin.exam-schedules.show', compact('examSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamSchedule $examSchedule)
    {
        $examTypes = [
            'Goethe' => 'Goethe Certificate',
            'TestDaF' => 'TestDaF (Test Deutsch als Fremdsprache)',
            'Telc' => 'Telc Deutsch',
            'ÖSD' => 'ÖSD (Österreichisches Sprachdiplom)',
            'DSH' => 'DSH (Deutsche Sprachprüfung für den Hochschulzugang)'
        ];

        $levels = [
            'A1' => 'A1 - Cơ bản',
            'A2' => 'A2 - Sơ cấp',
            'B1' => 'B1 - Trung cấp',
            'B2' => 'B2 - Trung cao cấp',
            'C1' => 'C1 - Cao cấp',
            'C2' => 'C2 - Thành thạo'
        ];

        $statuses = [
            'active' => 'Hoạt động',
            'inactive' => 'Không hoạt động',
            'completed' => 'Đã hoàn thành'
        ];

        return view('admin.exam-schedules.edit', compact('examSchedule', 'examTypes', 'levels', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamSchedule $examSchedule)
    {
        $validator = Validator::make($request->all(), [
            'exam_type' => 'required|string|max:255',
            'level' => 'required|string|max:10',
            'exam_period' => 'nullable|string|max:100',
            'exam_date' => 'required|date',
            'exam_time' => 'nullable|date_format:H:i',
            'registration_deadline' => 'required|date|before:exam_date',
            'fee' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive,completed',
            'max_participants' => 'nullable|integer|min:0',
            'current_participants' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ], [
            'exam_time.date_format' => 'Giờ thi phải có định dạng HH:MM (ví dụ: 09:00)',
            'registration_deadline.before' => 'Hạn đăng ký phải trước ngày thi',
            'fee.min' => 'Lệ phí không được âm',
            'max_participants.min' => 'Số lượng tối đa phải lớn hơn 0',
            'current_participants.min' => 'Số lượng hiện tại không được âm'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $examSchedule->update($request->all());

            DB::commit();

            return redirect()->route('admin.exam-schedules.index')
                ->with('success', 'Lịch thi đã được cập nhật thành công!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi cập nhật lịch thi: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamSchedule $examSchedule)
    {
        try {
            $examSchedule->delete();
            return redirect()->route('admin.exam-schedules.index')
                ->with('success', 'Lịch thi đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi xóa lịch thi: ' . $e->getMessage());
        }
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(ExamSchedule $examSchedule)
    {
        try {
            $examSchedule->update([
                'is_featured' => !$examSchedule->is_featured
            ]);

            $status = $examSchedule->is_featured ? 'nổi bật' : 'không nổi bật';
            return redirect()->back()
                ->with('success', "Lịch thi đã được đánh dấu {$status}!");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi thay đổi trạng thái nổi bật!');
        }
    }

    /**
     * Update sort order
     */
    public function updateSortOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:exam_schedules,id',
            'items.*.sort_order' => 'required|integer|min:0'
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->items as $item) {
                ExamSchedule::where('id', $item['id'])
                    ->update(['sort_order' => $item['sort_order']]);
            }

            DB::commit();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
