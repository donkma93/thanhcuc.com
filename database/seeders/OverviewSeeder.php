<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Overview;

class OverviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Overview::create([
            'title' => 'TỔNG QUAN TRUNG TÂM TIẾNG ĐỨC THANH CÚC',
            'paragraph_1' => 'Ra đời từ năm 2020, Thanh Cúc đã trở thành điểm đến tin cậy của hàng ngàn học viên. Với phương pháp học tiếng Đức đơn giản, hiệu quả, Thanh Cúc giúp bạn không chỉ hiểu sâu bản chất ngôn ngữ mà còn tránh học vẹt. Đến nay, hơn 2.000 học viên đã tin tưởng và lựa chọn Thanh Cúc, minh chứng cho chất lượng giảng dạy vượt trội.',
            'paragraph_2' => 'Khát vọng của Thanh Cúc là giúp hàng nghìn người vượt qua Tiếng Đức dễ dàng, một lần và mãi mãi. Hãy đến với Thanh Cúc để trải nghiệm phương pháp học tiếng Đức hiệu quả, giúp bạn tự tin giao tiếp ngay hôm nay!',
            'video_url' => 'https://www.youtube.com/watch?v=-R9y1ZJUD4g',
            'video_title' => 'Phương Pháp Đào Tạo Độc Quyền Tại Thanh Cúc Vinh Dự Lên Sóng Đài Truyền Hình Quốc Gia VTV3',
            'button_1_text' => 'Về chúng tôi',
            'button_1_url' => '/ve-chung-toi',
            'button_2_text' => '0975.186.230',
            'button_2_url' => 'tel:0975.186.230',
            'button_3_text' => 'Đăng ký tư vấn',
            'button_3_url' => '/lien-he',
            'is_active' => true,
        ]);
    }
}
