<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            // Monthly achievements
            [
                'student_name' => 'Nguyễn Văn An',
                'class_name' => 'A2.1',
                'category' => 'monthly',
                'score' => 9.8,
                'achievement_title' => 'Học viên xuất sắc hạng nhất tháng 12',
                'description' => 'Đạt điểm cao nhất lớp, tích cực tham gia các hoạt động học tập',
                'achievement_date' => '2024-12-15',
                'rank' => 1,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'student_name' => 'Trần Thị Bình',
                'class_name' => 'B1.2',
                'category' => 'monthly',
                'score' => 9.5,
                'achievement_title' => 'Học viên xuất sắc hạng nhì tháng 12',
                'description' => 'Tiến bộ vượt bậc trong kỹ năng giao tiếp',
                'achievement_date' => '2024-12-15',
                'rank' => 2,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'student_name' => 'Lê Văn Cường',
                'class_name' => 'A1.1',
                'category' => 'monthly',
                'score' => 9.2,
                'achievement_title' => 'Học viên xuất sắc hạng ba tháng 12',
                'description' => 'Chăm chỉ học tập, hỗ trợ bạn bè trong lớp',
                'achievement_date' => '2024-12-15',
                'rank' => 3,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            
            // Exam achievements
            [
                'student_name' => 'Phạm Thị Dung',
                'class_name' => 'B2.2',
                'category' => 'exam',
                'score' => 9.7,
                'achievement_title' => 'Đạt hạng nhất kỳ thi chứng chỉ Goethe B2',
                'description' => 'Đạt điểm cao trong kỳ thi chứng chỉ quốc tế',
                'certificate' => 'Goethe B2',
                'achievement_date' => '2024-11-20',
                'rank' => 1,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'student_name' => 'Hoàng Văn Em',
                'class_name' => 'C1.1',
                'category' => 'exam',
                'score' => 9.4,
                'achievement_title' => 'Đạt hạng nhì kỳ thi TestDaF',
                'description' => 'Xuất sắc trong kỳ thi TestDaF với điểm số cao',
                'certificate' => 'TestDaF 4',
                'achievement_date' => '2024-10-15',
                'rank' => 2,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            
            // Scholarship achievements
            [
                'student_name' => 'Vũ Thị Giang',
                'class_name' => 'C1.2',
                'category' => 'scholarship',
                'achievement_title' => 'Du học thành công - Hạng nhất',
                'description' => 'Được nhận vào Đại học Kỹ thuật Munich với học bổng toàn phần',
                'university' => 'TU München',
                'achievement_date' => '2024-09-01',
                'rank' => 1,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'student_name' => 'Đỗ Văn Hùng',
                'class_name' => 'B2.2',
                'category' => 'scholarship',
                'achievement_title' => 'Du học thành công - Hạng nhì',
                'description' => 'Được nhận vào RWTH Aachen University ngành Cơ khí',
                'university' => 'RWTH Aachen',
                'achievement_date' => '2024-08-15',
                'rank' => 2,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'student_name' => 'Ngô Thị Lan',
                'class_name' => 'B2.1',
                'category' => 'scholarship',
                'achievement_title' => 'Du học thành công - Hạng ba',
                'description' => 'Được nhận vào Đại học Stuttgart ngành Kiến trúc',
                'university' => 'Universität Stuttgart',
                'achievement_date' => '2024-07-20',
                'rank' => 3,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}