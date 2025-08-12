<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tạo admin users
        $this->call(AdminUserSeeder::class);
        
        // Bỏ seed Programs (đã loại bỏ model/programs khỏi hệ thống)
        
        // Tạo settings cho footer
        $this->call(FooterSettingsSeeder::class);
        
        // Tạo dữ liệu mẫu cho Teachers
        \App\Models\Teacher::create([
            'name' => 'Nguyễn Tiến Đạt',
            'slug' => 'nguyen-tien-dat',
            'bio' => 'Giảng viên TOEIC với nhiều năm kinh nghiệm',
            'specialization' => 'TOEIC',
            'certification' => 'TOEIC 975/990',
            'experience_years' => 5,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        \App\Models\Teacher::create([
            'name' => 'Trần Thị Oanh',
            'slug' => 'tran-thi-oanh',
            'bio' => 'Chuyên gia TOEIC với điểm số cao',
            'specialization' => 'TOEIC',
            'certification' => 'TOEIC 980/990',
            'experience_years' => 7,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        \App\Models\Teacher::create([
            'name' => 'Bùi Minh Trang',
            'slug' => 'bui-minh-trang',
            'bio' => 'Giảng viên IELTS chuyên nghiệp',
            'specialization' => 'IELTS',
            'certification' => 'IELTS Overall 8.0',
            'experience_years' => 6,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 3,
        ]);

        \App\Models\Teacher::create([
            'name' => 'Tống Mai Liên',
            'slug' => 'tong-mai-lien',
            'bio' => 'Giảng viên TOEIC giàu kinh nghiệm',
            'specialization' => 'TOEIC',
            'certification' => 'TOEIC 980/990',
            'experience_years' => 8,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 4,
        ]);

        \App\Models\Teacher::create([
            'name' => 'Nguyễn Đình Tùng',
            'slug' => 'nguyen-dinh-tung',
            'bio' => 'Chuyên gia TOEIC với phương pháp giảng dạy hiệu quả',
            'specialization' => 'TOEIC',
            'certification' => 'TOEIC 985/990',
            'experience_years' => 4,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 5,
        ]);

        \App\Models\Teacher::create([
            'name' => 'Dương Văn Hưng',
            'slug' => 'duong-van-hung',
            'bio' => 'Giảng viên TOEIC với nhiều năm kinh nghiệm',
            'specialization' => 'TOEIC',
            'certification' => 'TOEIC 965/990',
            'experience_years' => 6,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 6,
        ]);

        \App\Models\Teacher::create([
            'name' => 'Phạm Thị Bích Hạnh',
            'slug' => 'pham-thi-bich-hanh',
            'bio' => 'Giảng viên TOEIC chuyên nghiệp',
            'specialization' => 'TOEIC',
            'certification' => 'TOEIC 965/990',
            'experience_years' => 5,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 7,
        ]);

        \App\Models\Teacher::create([
            'name' => 'Đinh Khắc An',
            'slug' => 'dinh-khac-an',
            'bio' => 'Chuyên gia IELTS với điểm số xuất sắc',
            'specialization' => 'IELTS',
            'certification' => 'IELTS Overall 8.5',
            'experience_years' => 7,
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 8,
        ]);

        // Tạo dữ liệu mẫu cho Courses
        $this->call(CourseSeeder::class);

        // Thành tích học viên (bảng vàng)
        $this->call(AchievementSeeder::class);

        // Tạo dữ liệu mẫu cho Overview
        $this->call(OverviewSeeder::class);

        // Tạo dữ liệu mẫu cho Exam Schedules
        $this->call(ExamScheduleSeeder::class);

        // Tạo dữ liệu mẫu cho Job Postings
        \App\Models\JobPosting::create([
            'title' => 'Giảng viên tiếng Đức',
            'slug' => 'giang-vien-tieng-duc',
            'description' => 'Tuyển dụng giảng viên tiếng Đức có kinh nghiệm',
            'requirements' => 'Goethe C1+, kinh nghiệm giảng dạy 2+ năm, từng học tập hoặc làm việc tại Đức',
            'benefits' => 'Lương cạnh tranh, môi trường chuyên nghiệp, cơ hội phát triển',
            'salary_range' => '15-25 triệu',
            'location' => 'Hà Nội',
            'employment_type' => 'Full-time',
            'department' => 'Giảng viên',
            'is_active' => true,
            'is_featured' => true,
        ]);

        \App\Models\JobPosting::create([
            'title' => 'Chuyên viên tư vấn tuyển sinh',
            'slug' => 'chuyen-vien-tu-van-tuyen-sinh',
            'description' => 'Tuyển dụng chuyên viên tư vấn tuyển sinh',
            'requirements' => 'Kỹ năng giao tiếp tốt, kinh nghiệm tư vấn',
            'benefits' => 'Hoa hồng hấp dẫn, đào tạo chuyên nghiệp',
            'salary_range' => '8-15 triệu',
            'location' => 'Hà Nội',
            'employment_type' => 'Full-time',
            'department' => 'Tư vấn',
            'is_active' => true,
            'is_featured' => false,
        ]);
    }
}
