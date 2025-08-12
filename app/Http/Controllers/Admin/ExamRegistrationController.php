<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamRegistration;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = ExamRegistration::with(['examSchedule', 'confirmedBy'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'total' => ExamRegistration::count(),
            'pending' => ExamRegistration::pending()->count(),
            'confirmed' => ExamRegistration::confirmed()->count(),
            'cancelled' => ExamRegistration::cancelled()->count(),
            'completed' => ExamRegistration::completed()->count(),
        ];

        return view('admin.exam-registrations.index', compact('registrations', 'stats'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamRegistration $registration)
    {
        $registration->load(['examSchedule', 'confirmedBy']);
        return view('admin.exam-registrations.show', compact('registration'));
    }

    /**
     * Update registration status.
     */
    public function updateStatus(Request $request, ExamRegistration $registration)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        try {
            DB::beginTransaction();

            $oldStatus = $registration->status;
            $newStatus = $request->status;

            // Cập nhật trạng thái
            $registration->update([
                'status' => $newStatus,
                'admin_notes' => $request->admin_notes,
                'confirmed_at' => $newStatus === 'confirmed' ? now() : null,
                'confirmed_by' => $newStatus === 'confirmed' ? auth()->id() : null,
            ]);

            // Cập nhật số lượng đăng ký trong exam schedule
            $examSchedule = $registration->examSchedule;
            
            if ($oldStatus === 'confirmed' && $newStatus !== 'confirmed') {
                // Giảm số lượng đã xác nhận
                $examSchedule->decrement('current_participants');
            } elseif ($oldStatus !== 'confirmed' && $newStatus === 'confirmed') {
                // Tăng số lượng đã xác nhận
                $examSchedule->increment('current_participants');
            }

            DB::commit();

            $statusText = $registration->status_text;
            return redirect()->back()
                ->with('success', "Đã cập nhật trạng thái đăng ký thành '{$statusText}'!");

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi cập nhật trạng thái!');
        }
    }

    /**
     * Get registrations by exam schedule.
     */
    public function byExamSchedule($examScheduleId)
    {
        $examSchedule = ExamSchedule::findOrFail($examScheduleId);
        $registrations = ExamRegistration::with(['confirmedBy'])
            ->where('exam_schedule_id', $examScheduleId)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'total' => ExamRegistration::where('exam_schedule_id', $examScheduleId)->count(),
            'pending' => ExamRegistration::where('exam_schedule_id', $examScheduleId)->pending()->count(),
            'confirmed' => ExamRegistration::where('exam_schedule_id', $examScheduleId)->confirmed()->count(),
            'cancelled' => ExamRegistration::where('exam_schedule_id', $examScheduleId)->cancelled()->count(),
            'completed' => ExamRegistration::where('exam_schedule_id', $examScheduleId)->completed()->count(),
        ];

        return view('admin.exam-registrations.by-exam-schedule', compact('examSchedule', 'registrations', 'stats'));
    }

    /**
     * Export registrations to CSV.
     */
    public function export(Request $request)
    {
        $registrations = ExamRegistration::with(['examSchedule'])
            ->when($request->status, function($query, $status) {
                return $query->where('status', $status);
            })
            ->when($request->exam_schedule_id, function($query, $examScheduleId) {
                return $query->where('exam_schedule_id', $examScheduleId);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $filename = 'exam_registrations_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($registrations) {
            $file = fopen('php://output', 'w');
            
            // Header
            fputcsv($file, [
                'ID', 'Họ và tên', 'Số điện thoại', 'Email', 'Ngày sinh', 
                'CMND/CCCD', 'Địa chỉ', 'Ghi chú', 'Trạng thái', 
                'Lịch thi', 'Ngày đăng ký', 'Ghi chú admin'
            ]);

            // Data
            foreach ($registrations as $registration) {
                fputcsv($file, [
                    $registration->id,
                    $registration->full_name,
                    $registration->phone,
                    $registration->email ?? '',
                    $registration->formatted_birth_date,
                    $registration->id_card ?? '',
                    $registration->address ?? '',
                    $registration->notes ?? '',
                    $registration->status_text,
                    $registration->examSchedule->exam_type . ' - ' . $registration->examSchedule->level,
                    $registration->created_at->format('d/m/Y H:i'),
                    $registration->admin_notes ?? ''
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
