<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExamSchedule;
use Carbon\Carbon;

class ExamScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $examSchedules = [
            // Goethe Certificate
            [
                'exam_type' => 'Goethe',
                'level' => 'A1',
                'exam_period' => '1/2025',
                'exam_date' => '2025-03-15',
                'exam_time' => '09:00:00',
                'registration_deadline' => '2025-02-15',
                'fee' => 2500000,
                'location' => 'Viện Goethe Hà Nội',
                'description' => 'Kỳ thi chứng chỉ Goethe A1 cho người mới bắt đầu học tiếng Đức',
                'status' => 'active',
                'max_participants' => 50,
                'current_participants' => 15,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'exam_type' => 'Goethe',
                'level' => 'A2',
                'exam_period' => '1/2025',
                'exam_date' => '2025-03-22',
                'exam_time' => '09:00:00',
                'registration_deadline' => '2025-02-22',
                'fee' => 2800000,
                'location' => 'Viện Goethe Hà Nội',
                'description' => 'Kỳ thi chứng chỉ Goethe A2 cho người có trình độ sơ cấp',
                'status' => 'active',
                'max_participants' => 50,
                'current_participants' => 20,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'exam_type' => 'Goethe',
                'level' => 'B1',
                'exam_period' => '1/2025',
                'exam_date' => '2025-06-14',
                'exam_time' => '09:00:00',
                'registration_deadline' => '2025-05-14',
                'fee' => 3200000,
                'location' => 'Viện Goethe Hà Nội',
                'description' => 'Kỳ thi chứng chỉ Goethe B1 cho người có trình độ trung cấp',
                'status' => 'active',
                'max_participants' => 40,
                'current_participants' => 25,
                'is_featured' => false,
                'sort_order' => 3,
            ],
            [
                'exam_type' => 'Goethe',
                'level' => 'B2',
                'exam_period' => '1/2025',
                'exam_date' => '2025-06-21',
                'exam_time' => '09:00:00',
                'registration_deadline' => '2025-05-21',
                'fee' => 3800000,
                'location' => 'Viện Goethe Hà Nội',
                'description' => 'Kỳ thi chứng chỉ Goethe B2 cho người có trình độ trung cao cấp',
                'status' => 'active',
                'max_participants' => 35,
                'current_participants' => 18,
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'exam_type' => 'Goethe',
                'level' => 'C1',
                'exam_period' => '1/2025',
                'exam_date' => '2025-09-27',
                'exam_time' => '09:00:00',
                'registration_deadline' => '2025-08-15',
                'fee' => 4500000,
                'location' => 'Viện Goethe Hà Nội',
                'description' => 'Kỳ thi chứng chỉ Goethe C1 cho người có trình độ cao cấp',
                'status' => 'active',
                'max_participants' => 30,
                'current_participants' => 12,
                'is_featured' => true,
                'sort_order' => 5,
            ],
            
            // TestDaF
            [
                'exam_type' => 'TestDaF',
                'level' => 'B2-C1',
                'exam_period' => '1/2025',
                'exam_date' => '2025-05-09',
                'exam_time' => '08:30:00',
                'registration_deadline' => '2025-03-28',
                'fee' => 4200000,
                'location' => 'Đại học Ngoại ngữ Hà Nội',
                'description' => 'Kỳ thi TestDaF 1/2025 - Chứng chỉ tiếng Đức cho mục đích học tập',
                'status' => 'active',
                'max_participants' => 60,
                'current_participants' => 35,
                'is_featured' => true,
                'sort_order' => 6,
            ],
            [
                'exam_type' => 'TestDaF',
                'level' => 'B2-C1',
                'exam_period' => '2/2025',
                'exam_date' => '2025-07-11',
                'exam_time' => '08:30:00',
                'registration_deadline' => '2025-05-30',
                'fee' => 4200000,
                'location' => 'Đại học Ngoại ngữ Hà Nội',
                'description' => 'Kỳ thi TestDaF 2/2025 - Chứng chỉ tiếng Đức cho mục đích học tập',
                'status' => 'active',
                'max_participants' => 60,
                'current_participants' => 22,
                'is_featured' => false,
                'sort_order' => 7,
            ],
            [
                'exam_type' => 'TestDaF',
                'level' => 'B2-C1',
                'exam_period' => '3/2025',
                'exam_date' => '2025-10-10',
                'exam_time' => '08:30:00',
                'registration_deadline' => '2025-08-29',
                'fee' => 4200000,
                'location' => 'Đại học Ngoại ngữ Hà Nội',
                'description' => 'Kỳ thi TestDaF 3/2025 - Chứng chỉ tiếng Đức cho mục đích học tập',
                'status' => 'active',
                'max_participants' => 60,
                'current_participants' => 8,
                'is_featured' => false,
                'sort_order' => 8,
            ],
            
            // Telc
            [
                'exam_type' => 'Telc',
                'level' => 'A1',
                'exam_period' => '1/2025',
                'exam_date' => '2025-04-12',
                'exam_time' => '09:00:00',
                'registration_deadline' => '2025-03-12',
                'fee' => 2300000,
                'location' => 'Trung tâm Ngoại ngữ Thanh Cúc',
                'description' => 'Kỳ thi chứng chỉ Telc A1 - Chứng chỉ tiếng Đức quốc tế',
                'status' => 'active',
                'max_participants' => 25,
                'current_participants' => 15,
                'is_featured' => false,
                'sort_order' => 9,
            ],
            [
                'exam_type' => 'Telc',
                'level' => 'B1',
                'exam_period' => '1/2025',
                'exam_date' => '2025-05-18',
                'exam_time' => '09:00:00',
                'registration_deadline' => '2025-04-18',
                'fee' => 3000000,
                'location' => 'Trung tâm Ngoại ngữ Thanh Cúc',
                'description' => 'Kỳ thi chứng chỉ Telc B1 - Chứng chỉ tiếng Đức quốc tế',
                'status' => 'active',
                'max_participants' => 20,
                'current_participants' => 12,
                'is_featured' => false,
                'sort_order' => 10,
            ],
        ];

        foreach ($examSchedules as $examSchedule) {
            ExamSchedule::create($examSchedule);
        }
    }
}
