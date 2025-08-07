<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => 'Tiếng Đức A1',
                'slug' => 'tieng-duc-a1',
                'description' => 'Khóa học tiếng Đức cơ bản dành cho người mới bắt đầu. Học viên sẽ được trang bị những kiến thức nền tảng về ngữ pháp, từ vựng và giao tiếp cơ bản.',
                'short_description' => 'Khóa học cơ bản cho người mới bắt đầu',
                'duration' => '3 tháng',
                'salary_range' => '15-20 triệu',
                'opportunity_level' => 'Cao',
                'requirements' => [
                    'Không yêu cầu kiến thức trước',
                    'Có động lực học tập',
                    'Tham gia đầy đủ các buổi học'
                ],
                'benefits' => [
                    'Nắm vững ngữ pháp cơ bản',
                    'Giao tiếp được trong các tình huống đơn giản',
                    'Chuẩn bị tốt cho cấp độ A2'
                ],
                'icon' => 'fas fa-language',
                'color' => '#F9D200',
                'sort_order' => 1,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Tiếng Đức A2',
                'slug' => 'tieng-duc-a2',
                'description' => 'Khóa học tiếng Đức trình độ sơ cấp, phát triển từ nền tảng A1. Tập trung vào việc mở rộng từ vựng và cải thiện khả năng giao tiếp.',
                'short_description' => 'Phát triển kỹ năng giao tiếp cơ bản',
                'duration' => '3 tháng',
                'salary_range' => '18-25 triệu',
                'opportunity_level' => 'Cao',
                'requirements' => [
                    'Đã hoàn thành A1 hoặc có kiến thức tương đương',
                    'Có thể giao tiếp cơ bản',
                    'Cam kết học tập nghiêm túc'
                ],
                'benefits' => [
                    'Giao tiếp tự tin hơn',
                    'Hiểu được các văn bản đơn giản',
                    'Chuẩn bị cho cấp độ B1'
                ],
                'icon' => 'fas fa-comments',
                'color' => '#3EB850',
                'sort_order' => 2,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Tiếng Đức B1',
                'slug' => 'tieng-duc-b1',
                'description' => 'Khóa học tiếng Đức trình độ trung cấp. Học viên sẽ có thể xử lý hầu hết các tình huống giao tiếp trong cuộc sống hàng ngày.',
                'short_description' => 'Trình độ trung cấp, giao tiếp thành thạo',
                'duration' => '4 tháng',
                'salary_range' => '25-35 triệu',
                'opportunity_level' => 'Rất cao',
                'requirements' => [
                    'Đã hoàn thành A2 hoặc có kiến thức tương đương',
                    'Có thể giao tiếp cơ bản về các chủ đề quen thuộc',
                    'Có động lực học tập cao'
                ],
                'benefits' => [
                    'Giao tiếp thành thạo trong nhiều tình huống',
                    'Đọc hiểu các văn bản phức tạp',
                    'Chuẩn bị cho các kỳ thi quốc tế'
                ],
                'icon' => 'fas fa-graduation-cap',
                'color' => '#F57F25',
                'sort_order' => 3,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Luyện thi Goethe',
                'slug' => 'luyen-thi-goethe',
                'description' => 'Khóa học chuyên biệt để chuẩn bị cho các kỳ thi chứng chỉ Goethe. Tập trung vào kỹ thuật làm bài và luyện tập chuyên sâu.',
                'short_description' => 'Chuẩn bị cho kỳ thi chứng chỉ quốc tế',
                'duration' => '2 tháng',
                'salary_range' => '30-50 triệu',
                'opportunity_level' => 'Rất cao',
                'requirements' => [
                    'Có trình độ tiếng Đức tương ứng với cấp độ thi',
                    'Cam kết tham gia đầy đủ các buổi luyện thi',
                    'Có kế hoạch thi cụ thể'
                ],
                'benefits' => [
                    'Nắm vững cấu trúc đề thi',
                    'Luyện tập với đề thi thật',
                    'Tỷ lệ đậu cao'
                ],
                'icon' => 'fas fa-certificate',
                'color' => '#dc3545',
                'sort_order' => 4,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Luyện thi TestDaF',
                'slug' => 'luyen-thi-testdaf',
                'description' => 'Khóa học chuẩn bị cho kỳ thi TestDaF - chứng chỉ tiếng Đức cho mục đích học tập tại Đức.',
                'short_description' => 'Chuẩn bị du học Đức',
                'duration' => '2.5 tháng',
                'salary_range' => '35-60 triệu',
                'opportunity_level' => 'Rất cao',
                'requirements' => [
                    'Có trình độ B2 trở lên',
                    'Có kế hoạch du học Đức',
                    'Cam kết học tập nghiêm túc'
                ],
                'benefits' => [
                    'Đạt điểm cao trong kỳ thi',
                    'Chuẩn bị tốt cho việc du học',
                    'Hỗ trợ thủ tục du học'
                ],
                'icon' => 'fas fa-plane',
                'color' => '#6f42c1',
                'sort_order' => 5,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Tiếng Đức Giao Tiếp',
                'slug' => 'tieng-duc-giao-tiep',
                'description' => 'Khóa học tập trung vào kỹ năng giao tiếp thực tế, phù hợp cho những người muốn sử dụng tiếng Đức trong công việc.',
                'short_description' => 'Tập trung kỹ năng giao tiếp thực tế',
                'duration' => '2 tháng',
                'salary_range' => '20-30 triệu',
                'opportunity_level' => 'Cao',
                'requirements' => [
                    'Có kiến thức cơ bản về tiếng Đức',
                    'Muốn cải thiện kỹ năng giao tiếp',
                    'Tham gia tích cực các hoạt động'
                ],
                'benefits' => [
                    'Giao tiếp tự tin trong công việc',
                    'Mở rộng cơ hội nghề nghiệp',
                    'Kết nối với cộng đồng người Đức'
                ],
                'icon' => 'fas fa-handshake',
                'color' => '#20c997',
                'sort_order' => 6,
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::updateOrCreate(
                ['slug' => $program['slug']],
                $program
            );
        }
    }
}
