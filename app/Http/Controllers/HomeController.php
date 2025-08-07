<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Program;
use App\Models\Teacher;
use App\Models\News;
use App\Models\Contact;
use App\Models\Schedule;
use App\Models\Achievement;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->take(8)
            ->get();
            
        $featuredPrograms = Program::where('is_active', true)
            ->orderBy('sort_order')
            ->take(8)
            ->get();
            
        // Get featured teachers first, then active teachers if not enough featured ones
        $featuredTeachers = Teacher::where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->take(8)
            ->get();
            
        // If we don't have enough featured teachers, get more active teachers
        if ($featuredTeachers->count() < 4) {
            $additionalTeachers = Teacher::where('is_active', true)
                ->whereNotIn('id', $featuredTeachers->pluck('id'))
                ->orderBy('sort_order')
                ->orderBy('name')
                ->take(8 - $featuredTeachers->count())
                ->get();
                
            $featuredTeachers = $featuredTeachers->merge($additionalTeachers);
        }
            
        $latestNews = News::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
            
        // Get achievements for golden board
        $monthlyAchievements = Achievement::where('category', 'monthly')
            ->where('is_active', true)
            ->orderBy('rank')
            ->orderBy('sort_order')
            ->take(3)
            ->get();
            
        $examAchievements = Achievement::where('category', 'exam')
            ->where('is_active', true)
            ->orderBy('rank')
            ->orderBy('sort_order')
            ->take(3)
            ->get();
            
        $scholarshipAchievements = Achievement::where('category', 'scholarship')
            ->where('is_active', true)
            ->orderBy('rank')
            ->orderBy('sort_order')
            ->take(3)
            ->get();
            
        return view('home', compact(
            'featuredCourses', 
            'featuredPrograms', 
            'featuredTeachers', 
            'latestNews',
            'monthlyAchievements',
            'examAchievements', 
            'scholarshipAchievements'
        ));
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
        // Get published schedules ordered by start date
        $schedules = Schedule::published()
            ->available()
            ->orderBy('start_date')
            ->orderBy('sort_order')
            ->get();
            
        // Get featured schedules for highlights
        $featuredSchedules = Schedule::published()
            ->featured()
            ->available()
            ->orderBy('sort_order')
            ->take(3)
            ->get();
            
        // Get popular schedules
        $popularSchedules = Schedule::published()
            ->popular()
            ->available()
            ->orderBy('sort_order')
            ->take(3)
            ->get();
            
        // Get schedules starting soon (within 7 days)
        $upcomingSchedules = Schedule::published()
            ->available()
            ->where('start_date', '<=', now()->addDays(7))
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->get();
            
        return view('schedule', compact('schedules', 'featuredSchedules', 'popularSchedules', 'upcomingSchedules'));
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
