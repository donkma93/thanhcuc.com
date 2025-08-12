<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseOffer;

class CourseOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offers = [
            [
                'title' => 'Giảm 30% học phí',
                'description' => 'Ưu đãi đặc biệt cho khóa học Tiếng Đức cơ bản và nâng cao',
                'icon' => 'fas fa-percentage',
                'badge_text' => 'Tiết kiệm 3.000.000đ',
                'badge_color' => 'danger',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'Tặng tài liệu miễn phí',
                'description' => 'BỘ SÁCH TIẾNG ĐỨC CHUYÊN NGHIỆP + AUDIO CD TRỊ GIÁ 800.000Đ',
                'icon' => 'fas fa-book',
                'badge_text' => 'Miễn phí',
                'badge_color' => 'success',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'title' => 'Học thử 2 buổi miễn phí',
                'description' => 'Trải nghiệm phương pháp giảng dạy trước khi quyết định đăng ký',
                'icon' => 'fas fa-chalkboard-teacher',
                'badge_text' => 'Không mất phí',
                'badge_color' => 'info',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'title' => 'Cam kết đầu ra A2-B1',
                'description' => 'Không đạt chuẩn sẽ được học lại miễn phí hoặc hoàn tiền 100%',
                'icon' => 'fas fa-certificate',
                'badge_text' => 'Bảo đảm',
                'badge_color' => 'warning',
                'is_active' => true,
                'sort_order' => 4
            ]
        ];

        foreach ($offers as $offer) {
            CourseOffer::create($offer);
        }
    }
}
