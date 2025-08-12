<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\AdminUser;
use App\Models\ExamSchedule;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use HasMessagebox;
    public function dashboard()
    {
        // Thống kê tổng quan
        $stats = [
            'total_contacts' => Contact::count(),
            'new_contacts' => Contact::new()->count(),
            'contacted' => Contact::contacted()->count(),
            'completed' => Contact::completed()->count(),
            'total_admins' => AdminUser::count(),
            'total_exam_schedules' => ExamSchedule::count(),
            'active_exam_schedules' => ExamSchedule::where('status', 'active')->count(),
            'featured_exam_schedules' => ExamSchedule::where('is_featured', true)->count(),
            'total_exam_registrations' => \App\Models\ExamRegistration::count(),
            'pending_exam_registrations' => \App\Models\ExamRegistration::where('status', 'pending')->count(),
            'confirmed_exam_registrations' => \App\Models\ExamRegistration::where('status', 'confirmed')->count(),
        ];

        // Liên hệ mới nhất
        $recentContacts = Contact::latest()->take(5)->get();

        // Thống kê theo tháng (6 tháng gần nhất)
        $monthlyStats = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyStats[] = [
                'month' => $date->format('m/Y'),
                'contacts' => Contact::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        }

        return view('admin.dashboard', compact('stats', 'recentContacts', 'monthlyStats'));
    }

    public function profile()
    {
        $adminUser = AdminUser::find(session('admin_user')['id']);
        return view('admin.profile', compact('adminUser'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_users,email,' . session('admin_user')['id'],
            'password' => 'nullable|min:6|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        $adminUser = AdminUser::find(session('admin_user')['id']);
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $adminUser->update($data);

        // Cập nhật session
        session(['admin_user' => [
            'id' => $adminUser->id,
            'name' => $adminUser->name,
            'email' => $adminUser->email,
            'role' => $adminUser->role,
            'is_active' => $adminUser->is_active,
        ]]);

        return $this->successAndBack('Cập nhật thông tin thành công!');
    }
}
