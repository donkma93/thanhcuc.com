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
