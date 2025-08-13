<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentResult;

class StudentResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ nếu có
        StudentResult::truncate();

        // Tạo bảng điểm mẫu
        $scores = [
            [
                'title' => 'Bảng điểm Goethe A1 - Nguyễn Thị Mai',
                'description' => 'Học viên đạt kết quả xuất sắc với điểm số cao trong kỳ thi Goethe A1',
                'type' => 'score',
                'image_path' => 'student-results/sample-score-1.jpg',
                'student_name' => 'Nguyễn Thị Mai',
                'certificate_type' => 'Goethe',
                'level' => 'A1',
                'score' => '95/100',
                'sort_order' => 1,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Kết quả TestDaF - Trần Văn Hùng',
                'description' => 'Học viên đạt TestDaF với điểm số 4x4, đủ điều kiện du học Đức',
                'type' => 'score',
                'image_path' => 'student-results/sample-score-2.jpg',
                'student_name' => 'Trần Văn Hùng',
                'certificate_type' => 'TestDaF',
                'level' => 'B2',
                'score' => '4x4',
                'sort_order' => 2,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Bảng điểm DSH - Lê Thị Lan',
                'description' => 'Học viên đạt DSH-2, đủ điều kiện học đại học tại Đức',
                'type' => 'score',
                'image_path' => 'student-results/sample-score-3.jpg',
                'student_name' => 'Lê Thị Lan',
                'certificate_type' => 'DSH',
                'level' => 'B2',
                'score' => 'DSH-2',
                'sort_order' => 3,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Kết quả Goethe B1 - Hoàng Văn Nam',
                'description' => 'Học viên đạt Goethe B1 với điểm số cao, sẵn sàng cho môi trường làm việc',
                'type' => 'score',
                'image_path' => 'student-results/sample-score-4.jpg',
                'student_name' => 'Hoàng Văn Nam',
                'certificate_type' => 'Goethe',
                'level' => 'B1',
                'score' => '88/100',
                'sort_order' => 4,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Bảng điểm Telc B2 - Phạm Thị Hoa',
                'description' => 'Học viên đạt Telc B2, chứng minh khả năng giao tiếp thành thạo',
                'type' => 'score',
                'image_path' => 'student-results/sample-score-5.jpg',
                'student_name' => 'Phạm Thị Hoa',
                'certificate_type' => 'Telc',
                'level' => 'B2',
                'score' => 'B2',
                'sort_order' => 5,
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        // Tạo phản hồi mẫu
        $feedbacks = [
            [
                'title' => 'Phản hồi từ học viên Goethe C1',
                'description' => '"Tôi rất hài lòng với phương pháp giảng dạy của Thanh Cúc. Các thầy cô rất tận tâm và giúp tôi đạt được mục tiêu Goethe C1 chỉ sau 18 tháng học."',
                'type' => 'feedback',
                'image_path' => 'student-results/sample-feedback-1.jpg',
                'student_name' => 'Nguyễn Minh Anh',
                'certificate_type' => 'Goethe',
                'level' => 'C1',
                'score' => null,
                'sort_order' => 6,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Cảm nhận về khóa TestDaF',
                'description' => '"Khóa học TestDaF tại Thanh Cúc rất thực tế và hiệu quả. Tôi đã đạt được mục tiêu 4x4 và hiện đang làm việc tại Berlin."',
                'type' => 'feedback',
                'image_path' => 'student-results/sample-feedback-2.jpg',
                'student_name' => 'Trần Văn Hùng',
                'certificate_type' => 'TestDaF',
                'level' => 'B2',
                'score' => null,
                'sort_order' => 7,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Đánh giá khóa DSH',
                'description' => '"Từ A1 đến DSH chỉ trong 2 năm! Cảm ơn Thanh Cúc đã giúp tôi thực hiện ước mơ du học y khoa tại Đức."',
                'type' => 'feedback',
                'image_path' => 'student-results/sample-feedback-3.jpg',
                'student_name' => 'Lê Thị Mai',
                'certificate_type' => 'DSH',
                'level' => 'B2',
                'score' => null,
                'sort_order' => 8,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Cảm ơn thầy cô Thanh Cúc',
                'description' => '"Phương pháp giảng dạy của Thanh Cúc rất phù hợp với người Việt. Tôi đã đạt Goethe B2 và đang làm việc tại công ty Đức ở Việt Nam."',
                'type' => 'feedback',
                'image_path' => 'student-results/sample-feedback-4.jpg',
                'student_name' => 'Phạm Thị Hoa',
                'certificate_type' => 'Goethe',
                'level' => 'B2',
                'score' => null,
                'sort_order' => 9,
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        // Tạo bảng điểm
        foreach ($scores as $score) {
            StudentResult::create($score);
        }

        // Tạo phản hồi
        foreach ($feedbacks as $feedback) {
            StudentResult::create($feedback);
        }

        $this->command->info('Đã tạo ' . count($scores) . ' bảng điểm và ' . count($feedbacks) . ' phản hồi mẫu.');
    }
}
