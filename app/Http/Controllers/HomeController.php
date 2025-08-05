<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::where('is_active', true)
            ->orderBy('sort_order')
            ->take(4)
            ->get();
            
        $featuredTeachers = Teacher::where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->take(8)
            ->get();
            
        $latestNews = News::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
            
        return view('home', compact('featuredCourses', 'featuredTeachers', 'latestNews'));
    }
    
    public function about()
    {
        return view('about');
    }
    
    public function news()
    {
        $news = News::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(12);
            
        return view('news.index', compact('news'));
    }
    
    public function newsDetail($slug)
    {
        $article = News::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
            
        return view('news.detail', compact('article'));
    }
    
    public function schedule()
    {
        return view('schedule');
    }
    
    public function results()
    {
        return view('results');
    }
    
    public function trial()
    {
        return view('trial');
    }
    
    public function onlineTest()
    {
        return view('online-test');
    }
    
    public function examSchedule()
    {
        return view('exam-schedule');
    }
    
    public function contactPage()
    {
        return view('contact');
    }
    
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'course' => 'required|string|max:100',
            'message' => 'nullable|string|max:1000',
        ]);
        
        // Xử lý lưu thông tin liên hệ hoặc gửi email
        // Có thể tạo model ContactForm hoặc gửi email trực tiếp
        
        // Log thông tin để debug (có thể xóa sau)
        \Log::info('Contact form submitted', [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'course' => $request->course,
            'message' => $request->message,
        ]);
        
        return back()->with('success', 'Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để tư vấn về khóa học ' . $request->course . '.');
    }
}
