<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            // Khóa học tiếng Đức A1-A2 (Cơ bản)
            [
                'name' => 'Tiếng Đức A1 - Cơ bản',
                'slug' => 'tieng-duc-a1-co-ban',
                'description' => 'Khóa học tiếng Đức A1 dành cho người mới bắt đầu. Học viên sẽ học được các kiến thức cơ bản về ngữ pháp, từ vựng và giao tiếp hàng ngày theo chuẩn CEFR A1. Đây là bước đầu tiên để chuẩn bị cho chương trình Ausbildung tại Đức.',
                'short_description' => 'Khóa học tiếng Đức cơ bản theo chuẩn A1 CEFR',
                'category' => 'A1-A2',
                'level' => 'Beginner',
                'price' => 2800000,
                'duration_hours' => 90,
                'target_score' => 'A1 CEFR',
                'features' => [
                    'Giáo viên người Đức bản ngữ',
                    'Sách giáo khoa Netzwerk A1',
                    'Luyện phát âm chuẩn',
                    'Văn hóa Đức trong bài học',
                    'Chứng chỉ hoàn thành khóa học'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Tiếng Đức A2 - Sơ cấp',
                'slug' => 'tieng-duc-a2-so-cap',
                'description' => 'Khóa học tiếng Đức A2 giúp học viên nâng cao kỹ năng giao tiếp và hiểu biết về ngôn ngữ Đức. Phù hợp cho học viên đã hoàn thành A1 hoặc có kiến thức tương đương. Chuẩn bị tốt cho việc học tiếp lên B1.',
                'short_description' => 'Khóa học tiếng Đức sơ cấp theo chuẩn A2 CEFR',
                'category' => 'A1-A2',
                'level' => 'Beginner',
                'price' => 3200000,
                'duration_hours' => 100,
                'target_score' => 'A2 CEFR',
                'features' => [
                    'Tăng cường kỹ năng nghe nói',
                    'Bài tập thực hành phong phú',
                    'Mô phỏng tình huống thực tế',
                    'Chuẩn bị cho kỳ thi A2',
                    'Hỗ trợ học tập cá nhân'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // Khóa học tiếng Đức B1-B2 (Trung cấp)
            [
                'name' => 'Tiếng Đức B1 - Trung cấp',
                'slug' => 'tieng-duc-b1-trung-cap',
                'description' => 'Khóa học tiếng Đức B1 giúp học viên đạt được trình độ trung cấp, có thể giao tiếp tự tin trong các tình huống hàng ngày và công việc cơ bản tại Đức. Đây là trình độ tối thiểu để tham gia chương trình Ausbildung.',
                'short_description' => 'Khóa học tiếng Đức trung cấp theo chuẩn B1 CEFR',
                'category' => 'B1-B2',
                'level' => 'Intermediate',
                'price' => 3800000,
                'duration_hours' => 120,
                'target_score' => 'B1 CEFR',
                'features' => [
                    'Luyện giao tiếp thực tế',
                    'Ngữ pháp nâng cao',
                    'Từ vựng chuyên ngành',
                    'Chuẩn bị cho Ausbildung',
                    'Thi thử B1 định kỳ'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Tiếng Đức B2 - Trung cấp cao',
                'slug' => 'tieng-duc-b2-trung-cap-cao',
                'description' => 'Khóa học tiếng Đức B2 giúp học viên đạt trình độ trung cấp cao, có thể làm việc và học tập hiệu quả tại Đức. Đây là trình độ yêu cầu cho nhiều chương trình Ausbildung chất lượng cao và cơ hội việc làm tốt hơn.',
                'short_description' => 'Khóa học tiếng Đức trung cấp cao theo chuẩn B2 CEFR',
                'category' => 'B1-B2',
                'level' => 'Intermediate',
                'price' => 4200000,
                'duration_hours' => 140,
                'target_score' => 'B2 CEFR',
                'features' => [
                    'Chuẩn bị cho môi trường làm việc',
                    'Kỹ năng thuyết trình',
                    'Viết báo cáo chuyên nghiệp',
                    'Hiểu văn bản phức tạp',
                    'Đảm bảo đầu ra B2'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // Khóa học tiếng Đức C1-C2 (Nâng cao)
            [
                'name' => 'Tiếng Đức C1 - Nâng cao',
                'slug' => 'tieng-duc-c1-nang-cao',
                'description' => 'Khóa học tiếng Đức C1 dành cho học viên muốn đạt trình độ nâng cao. Phù hợp cho những ai muốn học đại học tại Đức hoặc làm việc trong các vị trí quản lý, kỹ thuật cao.',
                'short_description' => 'Khóa học tiếng Đức nâng cao theo chuẩn C1 CEFR',
                'category' => 'C1-C2',
                'level' => 'Advanced',
                'price' => 4800000,
                'duration_hours' => 160,
                'target_score' => 'C1 CEFR',
                'features' => [
                    'Tiếng Đức học thuật',
                    'Kỹ năng viết luận',
                    'Thảo luận chuyên sâu',
                    'Chuẩn bị cho đại học',
                    'Chứng chỉ C1 quốc tế'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Tiếng Đức C2 - Thành thạo',
                'slug' => 'tieng-duc-c2-thanh-thao',
                'description' => 'Khóa học tiếng Đức C2 giúp học viên đạt trình độ thành thạo như người bản ngữ. Phù hợp cho những ai muốn làm việc trong các lĩnh vực đòi hỏi trình độ tiếng Đức cao như y tế, luật, giáo dục.',
                'short_description' => 'Khóa học tiếng Đức thành thạo theo chuẩn C2 CEFR',
                'category' => 'C1-C2',
                'level' => 'Advanced',
                'price' => 5500000,
                'duration_hours' => 180,
                'target_score' => 'C2 CEFR',
                'features' => [
                    'Trình độ như người bản ngữ',
                    'Chuyên ngành y tế, kỹ thuật',
                    'Kỹ năng dịch thuật',
                    'Chuẩn bị cho nghề nghiệp cao',
                    'Chứng chỉ C2 quốc tế'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // Khóa học chuyên biệt
            [
                'name' => 'Tiếng Đức Giao tiếp Hàng ngày',
                'slug' => 'tieng-duc-giao-tiep-hang-ngay',
                'description' => 'Khóa học tiếng Đức giao tiếp tập trung vào các tình huống thực tế hàng ngày tại Đức. Phù hợp cho những ai muốn nhanh chóng có thể giao tiếp cơ bản khi đến Đức.',
                'short_description' => 'Khóa học giao tiếp tiếng Đức thực tế',
                'category' => 'Giao tiếp',
                'level' => 'Beginner',
                'price' => 2500000,
                'duration_hours' => 60,
                'target_score' => null,
                'features' => [
                    'Tình huống giao tiếp thực tế',
                    'Từ vựng hàng ngày',
                    'Phát âm chuẩn',
                    'Văn hóa Đức',
                    'Lớp học nhỏ'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Tiếng Đức Chuyên ngành Kỹ thuật',
                'slug' => 'tieng-duc-chuyen-nganh-ky-thuat',
                'description' => 'Khóa học tiếng Đức chuyên ngành kỹ thuật dành cho những ai muốn tham gia các chương trình Ausbildung trong lĩnh vực kỹ thuật, cơ khí, điện tử.',
                'short_description' => 'Tiếng Đức chuyên ngành cho kỹ thuật viên',
                'category' => 'Chuyên ngành',
                'level' => 'Intermediate',
                'price' => 3500000,
                'duration_hours' => 80,
                'target_score' => 'B1+ Kỹ thuật',
                'features' => [
                    'Từ vựng kỹ thuật chuyên sâu',
                    'Đọc hiểu tài liệu kỹ thuật',
                    'Giao tiếp trong xưởng',
                    'An toàn lao động',
                    'Chuẩn bị cho Ausbildung kỹ thuật'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Tiếng Đức Chuyên ngành Y tế',
                'slug' => 'tieng-duc-chuyen-nganh-y-te',
                'description' => 'Khóa học tiếng Đức chuyên ngành y tế dành cho bác sĩ, y tá, điều dưỡng muốn làm việc tại Đức. Tập trung vào từ vựng y khoa và giao tiếp với bệnh nhân.',
                'short_description' => 'Tiếng Đức chuyên ngành cho nhân viên y tế',
                'category' => 'Chuyên ngành',
                'level' => 'Advanced',
                'price' => 4500000,
                'duration_hours' => 120,
                'target_score' => 'B2+ Y tế',
                'features' => [
                    'Từ vựng y khoa chuyên sâu',
                    'Giao tiếp với bệnh nhân',
                    'Viết báo cáo y tế',
                    'Đạo đức nghề nghiệp',
                    'Chuẩn bị cho kỳ thi FSP'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Luyện thi Chứng chỉ Goethe',
                'slug' => 'luyen-thi-chung-chi-goethe',
                'description' => 'Khóa học luyện thi chứng chỉ Goethe (A1-C2) - chứng chỉ tiếng Đức được công nhận rộng rãi nhất. Chuẩn bị kỹ lưỡng cho các kỳ thi chính thức.',
                'short_description' => 'Luyện thi chứng chỉ Goethe các cấp độ',
                'category' => 'Luyện thi',
                'level' => 'All levels',
                'price' => 3000000,
                'duration_hours' => 60,
                'target_score' => 'Goethe A1-C2',
                'features' => [
                    'Đề thi mẫu chính thức',
                    'Kỹ thuật làm bài hiệu quả',
                    'Luyện 4 kỹ năng toàn diện',
                    'Giáo viên có chứng chỉ Goethe',
                    'Cam kết đậu chứng chỉ'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Luyện thi TestDaF',
                'slug' => 'luyen-thi-testdaf',
                'description' => 'Khóa học luyện thi TestDaF - kỳ thi tiếng Đức dành cho du học sinh muốn vào đại học tại Đức. Yêu cầu trình độ tối thiểu B2-C1.',
                'short_description' => 'Luyện thi TestDaF cho du học đại học',
                'category' => 'Luyện thi',
                'level' => 'Advanced',
                'price' => 4000000,
                'duration_hours' => 100,
                'target_score' => 'TestDaF TDN 4-5',
                'features' => [
                    'Chuyên biệt cho du học',
                    'Kỹ năng học thuật',
                    'Đề thi TestDaF thực tế',
                    'Chiến lược làm bài',
                    'Hỗ trợ đăng ký thi'
                ],
                'image' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }
    }
}