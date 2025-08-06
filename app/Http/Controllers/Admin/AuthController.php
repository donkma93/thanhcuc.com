<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Traits\HasMessagebox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use HasMessagebox;
    public function showLoginForm()
    {
        // Nếu đã đăng nhập thì redirect về dashboard
        if (session('admin_user')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ]);

        if ($validator->fails()) {
            return $this->flashValidationErrors($validator, 'Vui lòng kiểm tra lại thông tin đăng nhập.');
        }

        $adminUser = AdminUser::where('email', $request->email)->first();

        if (!$adminUser || !Hash::check($request->password, $adminUser->password)) {
            return $this->errorAndBack('Email hoặc mật khẩu không chính xác.')->withInput();
        }

        if (!$adminUser->isActive()) {
            return $this->errorAndBack('Tài khoản của bạn đã bị vô hiệu hóa.')->withInput();
        }

        // Lưu thông tin admin vào session
        session(['admin_user' => [
            'id' => $adminUser->id,
            'name' => $adminUser->name,
            'email' => $adminUser->email,
            'role' => $adminUser->role,
            'is_active' => $adminUser->is_active,
        ]]);

        // Cập nhật last login
        $adminUser->updateLastLogin();

        return $this->successAndRedirect('Đăng nhập thành công!', 'admin.dashboard');
    }

    public function logout()
    {
        session()->forget('admin_user');
        return $this->successAndRedirect('Đăng xuất thành công!', 'admin.login');
    }
}
