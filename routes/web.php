<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Về chúng tôi
Route::get('/ve-chung-toi', [HomeController::class, 'about'])->name('about');
Route::get('/tin-tuc', [HomeController::class, 'news'])->name('news');
Route::get('/tin-tuc/{slug}', [HomeController::class, 'newsDetail'])->name('news.detail');

// Khóa học tiếng Đức
Route::prefix('khoa-hoc')->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    
    // Các khóa học tiếng Đức theo CEFR
    Route::get('/co-ban-a1-a2', [CourseController::class, 'foundation'])->name('foundation');
    Route::get('/trung-cap-b1-b2', [CourseController::class, 'intermediate'])->name('intermediate');
    Route::get('/nang-cao-c1-c2', [CourseController::class, 'advanced'])->name('advanced');
    Route::get('/giao-tiep', [CourseController::class, 'conversation'])->name('conversation');
    Route::get('/thuong-mai', [CourseController::class, 'business'])->name('business');
    Route::get('/luyen-thi-chung-chi', [CourseController::class, 'exam'])->name('exam');
    
    // Giữ lại các routes cũ để tránh 404 (có thể redirect sau)
    // German course routes will be added here if needed
    Route::get('/kien-thuc-nen', [CourseController::class, 'foundation'])->name('foundation_old');
    Route::get('/thcs-thpt', [CourseController::class, 'intermediate'])->name('secondary');
});

// Giảng viên
Route::get('/giang-vien', [TeacherController::class, 'index'])->name('teachers');
Route::get('/giang-vien/{slug}', [TeacherController::class, 'show'])->name('teachers.show');

// Tuyển dụng
Route::prefix('tuyen-dung')->name('jobs.')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/{slug}', [JobController::class, 'show'])->name('show');
    Route::post('/ung-tuyen', [JobController::class, 'apply'])->name('apply');
});

// Các trang chính
Route::get('/lich-khai-giang', [HomeController::class, 'schedule'])->name('schedule');
Route::get('/lich-thi', [HomeController::class, 'examSchedule'])->name('exam-schedule');
Route::get('/ket-qua-hoc-vien', [HomeController::class, 'results'])->name('results');
Route::get('/lien-he', [HomeController::class, 'contactPage'])->name('contact');

// Form liên hệ
Route::post('/lien-he', [HomeController::class, 'contactSubmit'])->name('contact.submit');

// Trang học thử miễn phí
Route::get('/hoc-thu-mien-phi', [HomeController::class, 'trial'])->name('trial');
Route::post('/hoc-thu-mien-phi', [HomeController::class, 'trialSubmit'])->name('trial.submit');

// Trang kiểm tra trình độ online
Route::get('/kiem-tra-trinh-do-online', [HomeController::class, 'onlineTest'])->name('online-test');
Route::post('/kiem-tra-trinh-do-online', [HomeController::class, 'onlineTestSubmit'])->name('online-test.submit');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactController;

// Admin Authentication Routes (không cần middleware)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Redirect /admin to /admin/login if not authenticated
    Route::get('/', function() {
        if (session('admin_user')) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login');
    })->name('index');
});

// Admin Protected Routes (cần middleware admin.auth)
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
    
    // Contacts Management
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/{contact}', [ContactController::class, 'show'])->name('show');
        Route::put('/{contact}/status', [ContactController::class, 'updateStatus'])->name('update-status');
        Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-action', [ContactController::class, 'bulkAction'])->name('bulk-action');
        Route::get('/export/csv', [ContactController::class, 'export'])->name('export');
    });
    
    // Content Management
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    Route::post('sliders/update-order', [\App\Http\Controllers\Admin\SliderController::class, 'updateOrder'])->name('sliders.update-order');
    Route::patch('sliders/{slider}/toggle-status', [\App\Http\Controllers\Admin\SliderController::class, 'toggleStatus'])->name('sliders.toggle-status');
    
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::post('testimonials/update-order', [\App\Http\Controllers\Admin\TestimonialController::class, 'updateOrder'])->name('testimonials.update-order');
    Route::patch('testimonials/{testimonial}/toggle-status', [\App\Http\Controllers\Admin\TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle-status');
    Route::patch('testimonials/{testimonial}/toggle-featured', [\App\Http\Controllers\Admin\TestimonialController::class, 'toggleFeatured'])->name('testimonials.toggle-featured');
    
    Route::resource('programs', \App\Http\Controllers\Admin\ProgramController::class);
    Route::post('programs/update-order', [\App\Http\Controllers\Admin\ProgramController::class, 'updateOrder'])->name('programs.update-order');
    Route::patch('programs/{program}/toggle-status', [\App\Http\Controllers\Admin\ProgramController::class, 'toggleStatus'])->name('programs.toggle-status');
    Route::patch('programs/{program}/toggle-featured', [\App\Http\Controllers\Admin\ProgramController::class, 'toggleFeatured'])->name('programs.toggle-featured');
    
    Route::get('reasons', [\App\Http\Controllers\Admin\ReasonController::class, 'index'])->name('reasons.index');
    Route::get('reasons/create', [\App\Http\Controllers\Admin\ReasonController::class, 'create'])->name('reasons.create');
    Route::post('reasons', [\App\Http\Controllers\Admin\ReasonController::class, 'store'])->name('reasons.store');
    Route::get('reasons/{reason}/edit', [\App\Http\Controllers\Admin\ReasonController::class, 'edit'])->name('reasons.edit');
    Route::put('reasons/{reason}', [\App\Http\Controllers\Admin\ReasonController::class, 'update'])->name('reasons.update');
    Route::delete('reasons/{reason}', [\App\Http\Controllers\Admin\ReasonController::class, 'destroy'])->name('reasons.destroy');
    Route::post('reasons/update-order', [\App\Http\Controllers\Admin\ReasonController::class, 'updateOrder'])->name('reasons.update-order');
    
    Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    
    // Schedule Management
    Route::resource('schedules', \App\Http\Controllers\Admin\ScheduleController::class);
    Route::post('schedules/bulk-action', [\App\Http\Controllers\Admin\ScheduleController::class, 'bulkAction'])->name('schedules.bulk-action');
    Route::post('schedules/{schedule}/duplicate', [\App\Http\Controllers\Admin\ScheduleController::class, 'duplicate'])->name('schedules.duplicate');
    Route::post('schedules/{id}/restore', [\App\Http\Controllers\Admin\ScheduleController::class, 'restore'])->name('schedules.restore');
    Route::delete('schedules/{id}/force-delete', [\App\Http\Controllers\Admin\ScheduleController::class, 'forceDelete'])->name('schedules.force-delete');
    
    // Course Management
    Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class);
    Route::post('courses/bulk-action', [\App\Http\Controllers\Admin\CourseController::class, 'bulkAction'])->name('courses.bulk-action');
    Route::post('courses/update-sort-order', [\App\Http\Controllers\Admin\CourseController::class, 'updateSortOrder'])->name('courses.update-sort-order');
    
    // Demo Routes (for development/testing)
    Route::prefix('demo')->name('demo.')->group(function() {
        Route::get('messagebox', [\App\Http\Controllers\Admin\DemoController::class, 'messagebox'])->name('messagebox');
        Route::get('messagebox/session', [\App\Http\Controllers\Admin\DemoController::class, 'messageboxSession'])->name('messagebox.session');
        Route::post('messagebox/ajax', [\App\Http\Controllers\Admin\DemoController::class, 'messageboxAjax'])->name('messagebox.ajax');
        Route::post('messagebox/form', [\App\Http\Controllers\Admin\DemoController::class, 'messageboxForm'])->name('messagebox.form');
        Route::get('messagebox/multiple', [\App\Http\Controllers\Admin\DemoController::class, 'messageboxMultiple'])->name('messagebox.multiple');
        Route::post('messagebox/validation', [\App\Http\Controllers\Admin\DemoController::class, 'messageboxValidation'])->name('messagebox.validation');
        Route::get('messagebox/long', [\App\Http\Controllers\Admin\DemoController::class, 'messageboxLong'])->name('messagebox.long');
        Route::get('messagebox/html', [\App\Http\Controllers\Admin\DemoController::class, 'messageboxHtml'])->name('messagebox.html');
        
        Route::get('admin-actions', [\App\Http\Controllers\Admin\DemoController::class, 'adminActions'])->name('admin-actions');
        Route::get('confirmation-modal', [\App\Http\Controllers\Admin\DemoController::class, 'confirmationModal'])->name('confirmation-modal');
        Route::get('test-confirmation', function() { return view('admin.test-confirmation'); })->name('test-confirmation');
        Route::delete('delete/{id}', [\App\Http\Controllers\Admin\DemoController::class, 'demoDelete'])->name('delete');
        Route::get('toggle/{id}', [\App\Http\Controllers\Admin\DemoController::class, 'demoToggle'])->name('toggle');
        Route::post('quick-edit/{id}', [\App\Http\Controllers\Admin\DemoController::class, 'demoQuickEdit'])->name('quick-edit');
        Route::post('auto-save/{id}', [\App\Http\Controllers\Admin\DemoController::class, 'demoAutoSave'])->name('auto-save');
        Route::post('sort-order', [\App\Http\Controllers\Admin\DemoController::class, 'demoSortOrder'])->name('sort-order');
    });
});
