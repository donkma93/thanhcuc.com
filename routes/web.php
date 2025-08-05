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
    Route::get('/toeic', [CourseController::class, 'foundation'])->name('toeic');
    Route::get('/ielts', [CourseController::class, 'intermediate'])->name('ielts');
    Route::get('/vstep', [CourseController::class, 'advanced'])->name('vstep');
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
});

// Admin Protected Routes (cần middleware admin.auth)
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.index');
    
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
});
