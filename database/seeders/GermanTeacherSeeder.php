<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class GermanTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Xóa dữ liệu cũ
        Teacher::truncate();
        
        $teachers = [
            [
                'name' => 'Nguyễn Thị Lan',
                'slug' => 'nguyen-thi-lan',
                'bio' => 'Giảng viên tiếng Đức với nhiều năm kinh nghiệm, từng học tập tại Đức. Chuyên dạy các khóa học A1-A2 cho người mới bắt đầu.',
                'specialization' => 'Tiếng Đức A1-A2',
                'certification' => 'Goethe C2, DSH-3',
                'experience_years' => 5,
                'avatar' => null,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Trần Văn Minh',
                'slug' => 'tran-van-minh',
                'bio' => 'Chuyên gia tiếng Đức, cựu sinh viên Đại học Munich. Có kinh nghiệm giảng dạy các khóa học B1-B2 chuẩn bị cho Ausbildung.',
                'specialization' => 'Tiếng Đức B1-B2',
                'certification' => 'Goethe C2, TestDaF TDN 5',
                'experience_years' => 7,
                'avatar' => null,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Lê Thị Hương',
                'slug' => 'le-thi-huong',
                'bio' => 'Giảng viên tiếng Đức chuyên nghiệp, chuyên gia luyện thi Goethe. Có phương pháp giảng dạy hiệu quả và dễ hiểu.',
                'specialization' => 'Luyện thi Goethe',
                'certification' => 'Goethe C2, Zertifikat Deutsch',
                'experience_years' => 6,
                'avatar' => null,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Phạm Văn Đức',
                'slug' => 'pham-van-duc',
                'bio' => 'Giảng viên tiếng Đức giàu kinh nghiệm, chuyên ngành kỹ thuật. Từng làm việc tại các công ty Đức trong lĩnh vực cơ khí.',
                'specialization' => 'Tiếng Đức chuyên ngành kỹ thuật',
                'certification' => 'Goethe C1, Fachsprache Technik',
                'experience_years' => 8,
                'avatar' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Hoàng Thị Mai',
                'slug' => 'hoang-thi-mai',
                'bio' => 'Chuyên gia tiếng Đức với phương pháp giảng dạy hiệu quả. Chuyên dạy các khóa học C1-C2 cho học viên muốn đạt trình độ cao.',
                'specialization' => 'Tiếng Đức C1-C2',
                'certification' => 'Goethe C2, DSH-2',
                'experience_years' => 4,
                'avatar' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Vũ Văn Nam',
                'slug' => 'vu-van-nam',
                'bio' => 'Giảng viên tiếng Đức với nhiều năm kinh nghiệm tại Đức. Chuyên dạy giao tiếp thực tế và văn hóa Đức.',
                'specialization' => 'Giao tiếp tiếng Đức',
                'certification' => 'Goethe C1, Zertifikat Deutsch',
                'experience_years' => 6,
                'avatar' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Đỗ Thị Linh',
                'slug' => 'do-thi-linh',
                'bio' => 'Giảng viên tiếng Đức chuyên nghiệp, chuyên ngành y tế. Có kinh nghiệm chuẩn bị cho các bác sĩ, y tá muốn làm việc tại Đức.',
                'specialization' => 'Tiếng Đức y tế',
                'certification' => 'Goethe C2, Fachsprache Medizin',
                'experience_years' => 3,
                'avatar' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Bùi Văn Hùng',
                'slug' => 'bui-van-hung',
                'bio' => 'Chuyên gia luyện thi TestDaF với điểm số xuất sắc. Có kinh nghiệm chuẩn bị cho học viên muốn du học đại học tại Đức.',
                'specialization' => 'Luyện thi TestDaF',
                'certification' => 'TestDaF TDN 5, Goethe C2',
                'experience_years' => 9,
                'avatar' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'name' => 'Anna Schmidt',
                'slug' => 'anna-schmidt',
                'bio' => 'Giảng viên người Đức bản ngữ, có kinh nghiệm giảng dạy tiếng Đức cho người nước ngoài. Chuyên dạy phát âm và giao tiếp.',
                'specialization' => 'Giảng viên bản ngữ',
                'certification' => 'DaF Zertifikat, Goethe Institut',
                'experience_years' => 12,
                'avatar' => null,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'name' => 'Michael Weber',
                'slug' => 'michael-weber',
                'bio' => 'Giảng viên người Đức bản ngữ, chuyên gia về văn hóa và ngôn ngữ Đức. Có kinh nghiệm làm việc với sinh viên quốc tế.',
                'specialization' => 'Văn hóa và ngôn ngữ Đức',
                'certification' => 'DaF Zertifikat, Universität München',
                'experience_years' => 8,
                'avatar' => null,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 10,
            ],
        ];

        foreach ($teachers as $teacherData) {
            Teacher::create($teacherData);
        }
    }
}