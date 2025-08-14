<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\News;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Schedule;
use App\Models\Achievement;
use App\Models\Overview;
use App\Models\CourseOffer;
use App\Models\Reason;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
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
            
        // Get achievements for golden board - only exam achievements
        $examAchievements = Achievement::where('category', 'exam')
            ->where('is_active', true)
            ->orderBy('rank')
            ->orderBy('sort_order')
            ->take(6)
            ->get();
            
        // Lấy slider từ database
        $sliders = \App\Models\Slider::active()->ordered()->get();
        
        // Testimonials (Học viên nói gì)
        $testimonials = Testimonial::active()->ordered()->take(9)->get();
        
        // Overview content
        $overview = Overview::active()->first();
        
        // Course offers
        $courseOffers = CourseOffer::active()->ordered()->take(4)->get();
        
        // Reasons (Tại sao chọn Thanh Cúc)
        $reasons = Reason::active()->ordered()->take(6)->get();
        
        return view('home', compact(
            'featuredCourses', 
            'featuredTeachers', 
            'latestNews',
            'examAchievements', 
            'sliders',
            'testimonials',
            'overview',
            'courseOffers',
            'reasons'
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
        $schedules = Schedule::where('status', 'published')
            ->orderBy('start_date')
            ->orderBy('sort_order')
            ->get();
            
        // Get featured schedules for highlights
        $featuredSchedules = Schedule::where('status', 'published')
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->take(3)
            ->get();
            
        // Get popular schedules
        $popularSchedules = Schedule::where('status', 'published')
            ->where('is_popular', true)
            ->orderBy('sort_order')
            ->take(3)
            ->get();
            
        // Get schedules starting soon (within 7 days)
        $upcomingSchedules = Schedule::where('status', 'published')
            ->where('start_date', '<=', now()->addDays(7))
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->get();
            
        return view('schedule', compact('schedules', 'featuredSchedules', 'popularSchedules', 'upcomingSchedules'));
    }
    
    public function results()
    {
        // Lấy bảng điểm học viên
        $scores = \App\Models\StudentResult::scores()->active()->ordered()->take(12)->get();
        
        // Lấy phản hồi học viên
        $feedbacks = \App\Models\StudentResult::feedbacks()->active()->ordered()->take(8)->get();
        
        // Lấy thống kê tổng quan
        $totalScores = \App\Models\StudentResult::scores()->active()->count();
        $totalFeedbacks = \App\Models\StudentResult::feedbacks()->active()->count();
        $featuredResults = \App\Models\StudentResult::active()->featured()->ordered()->take(6)->get();
        
        return view('results', compact('scores', 'feedbacks', 'totalScores', 'totalFeedbacks', 'featuredResults'));
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
        // Lấy lịch thi từ database, nhóm theo loại thi
        $goetheExams = \App\Models\ExamSchedule::where('exam_type', 'Goethe')
            ->where('status', 'active')
            ->orderBy('level')
            ->orderBy('exam_date')
            ->get();
            
        $testdafExams = \App\Models\ExamSchedule::where('exam_type', 'TestDaF')
            ->where('status', 'active')
            ->orderBy('exam_date')
            ->get();
            
        $telcExams = \App\Models\ExamSchedule::where('exam_type', 'Telc')
            ->where('status', 'active')
            ->orderBy('level')
            ->orderBy('exam_date')
            ->get();
            
        $otherExams = \App\Models\ExamSchedule::whereNotIn('exam_type', ['Goethe', 'TestDaF', 'Telc'])
            ->where('status', 'active')
            ->orderBy('exam_type')
            ->orderBy('exam_date')
            ->get();
            
        return view('exam-schedule', compact('goetheExams', 'testdafExams', 'telcExams', 'otherExams'));
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
            'selected_course_id' => 'nullable|integer',
            'selected_course_name' => 'nullable|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'email.email' => 'Email không hợp lệ.',
            'course.required' => 'Vui lòng chọn chương trình quan tâm.',
        ]);
        
        // Tạo message với thông tin khóa học cụ thể nếu có
        $message = $request->message;
        if ($request->selected_course_name) {
            $message = "Khóa học quan tâm: " . $request->selected_course_name . "\n\n" . ($message ?: '');
        }
        
        // Lưu thông tin liên hệ vào database
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'program' => $request->course,
            'message' => $message,
            'status' => 'new',
        ]);
        
        $successMessage = 'Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để tư vấn về chương trình ' . $request->course . '.';
        
        if ($request->selected_course_name) {
            $successMessage .= ' Chúng tôi đã ghi nhận bạn quan tâm đến khóa học "' . $request->selected_course_name . '".';
        }
        
        return back()->with('success', $successMessage);
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
