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
        \App\Models\Course::create([
            'name' => 'TOEIC 500 - 800+ (L&R)',
            'slug' => 'toeic-500-800-lr',
            'description' => 'Khóa học TOEIC Listening & Reading từ 500 đến 800+ điểm',
            'short_description' => 'Nâng cao điểm TOEIC L&R hiệu quả',
            'category' => 'TOEIC',
            'level' => 'Intermediate',
            'price' => 2500000,
            'duration_hours' => 60,
            'target_score' => '500-800+',
            'features' => json_encode(['Luyện nghe chuyên sâu', 'Đọc hiểu nâng cao', 'Bài tập thực hành', 'Mock test']),
            'is_active' => true,
            'sort_order' => 1,
        ]);

        \App\Models\Course::create([
            'name' => 'TOEIC 240 - 320+ (S&W)',
            'slug' => 'toeic-240-320-sw',
            'description' => 'Khóa học TOEIC Speaking & Writing từ 240 đến 320+ điểm',
            'short_description' => 'Phát triển kỹ năng nói và viết TOEIC',
            'category' => 'TOEIC',
            'level' => 'Intermediate',
            'price' => 2800000,
            'duration_hours' => 50,
            'target_score' => '240-320+',
            'features' => json_encode(['Luyện nói chuyên sâu', 'Kỹ năng viết', 'Phát âm chuẩn', 'Thực hành thường xuyên']),
            'is_active' => true,
            'sort_order' => 2,
        ]);

        \App\Models\Course::create([
            'name' => 'IELTS 5.5 - 6.5+',
            'slug' => 'ielts-55-65',
            'description' => 'Khóa học IELTS từ 5.5 đến 6.5+ band điểm',
            'short_description' => 'Đạt band điểm IELTS mong muốn',
            'category' => 'IELTS',
            'level' => 'Intermediate',
            'price' => 3000000,
            'duration_hours' => 80,
            'target_score' => '5.5-6.5+',
            'features' => json_encode(['4 kỹ năng IELTS', 'Chiến thuật làm bài', 'Từ vựng chuyên sâu', 'Writing task 1&2']),
            'is_active' => true,
            'sort_order' => 1,
        ]);

        \App\Models\Course::create([
            'name' => 'Giao Tiếp Ứng Dụng',
            'slug' => 'giao-tiep-ung-dung',
            'description' => 'Khóa học giao tiếp tiếng Anh thực tế',
            'short_description' => 'Giao tiếp tự tin trong mọi tình huống',
            'category' => 'Giao tiếp',
            'level' => 'All levels',
            'price' => 2000000,
            'duration_hours' => 40,
            'target_score' => null,
            'features' => json_encode(['Phát âm chuẩn', 'Giao tiếp thực tế', 'Từ vựng hàng ngày', 'Thực hành nhiều']),
            'is_active' => true,
            'sort_order' => 1,
        ]);

        // Tạo dữ liệu mẫu cho Job Postings
        \App\Models\JobPosting::create([
            'title' => 'Giảng viên TOEIC',
            'slug' => 'giang-vien-toeic',
            'description' => 'Tuyển dụng giảng viên TOEIC có kinh nghiệm',
            'requirements' => 'TOEIC 950+, kinh nghiệm giảng dạy 2+ năm',
            'benefits' => 'Lương cạnh tranh, môi trường chuyên nghiệp',
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
