<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_user')) {
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập để truy cập trang quản trị.');
        }

        // Kiểm tra admin user có active không
        $adminUser = session('admin_user');
        if (!$adminUser['is_active']) {
            session()->forget('admin_user');
            return redirect()->route('admin.login')->with('error', 'Tài khoản của bạn đã bị vô hiệu hóa.');
        }

        return $next($request);
    }
}
