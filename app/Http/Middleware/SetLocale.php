<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Closure): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Lấy ngôn ngữ từ URL (ví dụ: /en/about, /de/contact)
        $locale = $request->segment(1);
        
        // Kiểm tra xem locale có hợp lệ không
        $availableLocales = ['vi', 'en', 'de'];
        
        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            // Nếu không có locale trong URL, sử dụng locale từ session hoặc mặc định
            $locale = Session::get('locale', config('app.locale'));
            App::setLocale($locale);
        }
        
        return $next($request);
    }
}
