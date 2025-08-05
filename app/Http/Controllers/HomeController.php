<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\News;
use App\Models\Contact;

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
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'email.email' => 'Email không hợp lệ.',
            'course.required' => 'Vui lòng chọn chương trình quan tâm.',
        ]);
        
        // Lưu thông tin liên hệ vào database
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'program' => $request->course,
            'message' => $request->message,
            'status' => 'new',
        ]);
        
        return back()->with('success', 'Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để tư vấn về chương trình ' . $request->course . '.');
    }
    
    public function trialSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'program' => 'required|string|max:100',
            'message' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'email.email' => 'Email không hợp lệ.',
            'program.required' => 'Vui lòng chọn chương trình quan tâm.',
        ]);
        
        // Lưu thông tin đăng ký học thử
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'program' => $request->program . ' (Học thử miễn phí)',
            'message' => $request->message,
            'status' => 'new',
        ]);
        
        return back()->with('success', 'Đăng ký học thử thành công! Chúng tôi sẽ liên hệ với bạn để sắp xếp lịch học thử miễn phí.');
    }
    
    public function onlineTestSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'current_level' => 'nullable|string|max:50',
            'message' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'email.email' => 'Email không hợp lệ.',
        ]);
        
        // Lưu thông tin đăng ký kiểm tra trình độ
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'program' => 'Kiểm tra trình độ online' . ($request->current_level ? ' - Trình độ hiện tại: ' . $request->current_level : ''),
            'message' => $request->message,
            'status' => 'new',
        ]);
        
        return back()->with('success', 'Đăng ký kiểm tra trình độ thành công! Chúng tôi sẽ liên hệ với bạn để hướng dẫn thực hiện bài kiểm tra.');
    }
}
