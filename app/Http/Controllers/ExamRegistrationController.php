<?php

namespace App\Http\Controllers;

use App\Models\ExamRegistration;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamRegistrationController extends Controller
{
    /**
     * Store a newly created registration.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exam_schedule_id' => 'required|exists:exam_schedules,id',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'birth_date' => 'nullable|date|before:today',
            'id_card' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'notes' => 'nullable|string|max:1000',
        ], [
            'exam_schedule_id.required' => 'Vui lòng chọn lịch thi',
            'exam_schedule_id.exists' => 'Lịch thi không tồn tại',
            'full_name.required' => 'Vui lòng nhập họ và tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.email' => 'Email không đúng định dạng',
            'birth_date.before' => 'Ngày sinh không hợp lệ',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Kiểm tra lịch thi có còn chỗ không
            $examSchedule = ExamSchedule::findOrFail($request->exam_schedule_id);
            
            if ($examSchedule->isFull()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lịch thi này đã hết chỗ'
                ], 400);
            }

            if (!$examSchedule->isRegistrationOpen()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Đã hết hạn đăng ký cho lịch thi này'
                ], 400);
            }

            // Kiểm tra xem số điện thoại đã đăng ký chưa
            $existingRegistration = ExamRegistration::where('phone', $request->phone)
                ->where('exam_schedule_id', $request->exam_schedule_id)
                ->whereIn('status', ['pending', 'confirmed'])
                ->first();

            if ($existingRegistration) {
                return response()->json([
                    'success' => false,
                    'message' => 'Số điện thoại này đã đăng ký cho lịch thi này'
                ], 400);
            }

            // Tạo đăng ký
            $registration = ExamRegistration::create($request->all());

            // Cập nhật số lượng đăng ký hiện tại
            $examSchedule->increment('current_participants');

            return response()->json([
                'success' => true,
                'message' => 'Đăng ký thành công! Chúng tôi sẽ liên hệ sớm nhất.',
                'registration_id' => $registration->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi đăng ký. Vui lòng thử lại.'
            ], 500);
        }
    }

    /**
     * Get exam schedule details for registration.
     */
    public function getExamSchedule($id)
    {
        try {
            $examSchedule = ExamSchedule::with(['registrations' => function($query) {
                $query->where('status', 'confirmed');
            }])->findOrFail($id);

            return response()->json([
                'success' => true,
                'exam_schedule' => [
                    'id' => $examSchedule->id,
                    'exam_type' => $examSchedule->exam_type,
                    'level' => $examSchedule->level,
                    'exam_period' => $examSchedule->exam_period,
                    'exam_date' => $examSchedule->formatted_exam_date,
                    'exam_time' => $examSchedule->exam_time,
                    'fee' => $examSchedule->formatted_fee,
                    'location' => $examSchedule->location,
                    'max_participants' => $examSchedule->max_participants,
                    'current_participants' => $examSchedule->current_participants,
                    'available_slots' => $examSchedule->available_slots,
                    'is_registration_open' => $examSchedule->isRegistrationOpen(),
                    'days_until_exam' => $examSchedule->days_until_exam,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy lịch thi'
            ], 404);
        }
    }
}
