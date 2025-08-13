<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class AboutSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutSettings = [
            [
                'key' => 'about_page_title',
                'value' => 'Về Chúng Tôi',
                'type' => 'text',
                'group' => 'about',
                'label' => 'Tiêu đề trang',
                'description' => 'Tiêu đề chính của trang Về chúng tôi',
                'sort_order' => 1,
            ],
            [
                'key' => 'about_page_subtitle',
                'value' => 'Tìm hiểu về hành trình 4 năm phát triển của Thanh Cúc và sứ mệnh giúp hàng ngàn người chinh phục tiếng Đức thành công',
                'type' => 'textarea',
                'group' => 'about',
                'label' => 'Mô tả ngắn trang',
                'description' => 'Mô tả ngắn hiển thị dưới tiêu đề trang',
                'sort_order' => 2,
            ],
            [
                'key' => 'about_overview_title',
                'value' => 'TỔNG QUAN TRUNG TÂM ANH NGỮ SEC',
                'type' => 'text',
                'group' => 'about',
                'label' => 'Tiêu đề tổng quan',
                'description' => 'Tiêu đề phần tổng quan trung tâm',
                'sort_order' => 3,
            ],
            [
                'key' => 'about_overview_content',
                'value' => '⚡Ra đời từ năm 2017, SEC (Simple English Center) đã trở thành điểm đến tin cậy của hàng ngàn học viên. Với <strong>phương pháp học tiếng Anh đơn giản, hiệu quả,</strong> SEC giúp bạn không chỉ hiểu sâu bản chất ngôn ngữ mà còn tránh học vẹt. Đến nay, <strong>hơn 30.000 học viên đã tin tưởng và lựa chọn SEC</strong>, minh chứng cho chất lượng giảng dạy vượt trội.

⚡Khát vọng của SEC là giúp hàng triệu người <strong>vượt qua Tiếng Anh dễ dàng, một lần và mãi mãi</strong>. Hãy đến với SEC để trải nghiệm <strong>phương pháp học tiếng Anh hiệu quả, giúp bạn tự tin giao tiếp ngay hôm nay!</strong>',
                'type' => 'textarea',
                'group' => 'about',
                'label' => 'Nội dung tổng quan',
                'description' => 'Nội dung chi tiết về trung tâm (có thể sử dụng HTML)',
                'sort_order' => 4,
            ],
            [
                'key' => 'about_mission',
                'value' => 'Giúp hàng triệu người Việt Nam vượt qua tiếng Anh dễ dàng, một lần và mãi mãi thông qua phương pháp học đơn giản, hiệu quả và khoa học.',
                'type' => 'textarea',
                'group' => 'about',
                'label' => 'Sứ mệnh',
                'description' => 'Sứ mệnh của trung tâm',
                'sort_order' => 5,
            ],
            [
                'key' => 'about_vision',
                'value' => 'Trở thành trung tâm anh ngữ hàng đầu Việt Nam, được công nhận về chất lượng giảng dạy và phương pháp học tiếng Anh độc quyền.',
                'type' => 'textarea',
                'group' => 'about',
                'label' => 'Tầm nhìn',
                'description' => 'Tầm nhìn của trung tâm',
                'sort_order' => 6,
            ],
            [
                'key' => 'about_core_values',
                'value' => json_encode([
                    [
                        'icon' => 'fas fa-heart',
                        'title' => 'Tận Tâm',
                        'description' => 'Luôn đặt lợi ích của học viên lên hàng đầu, tận tâm trong từng buổi học'
                    ],
                    [
                        'icon' => 'fas fa-lightbulb',
                        'title' => 'Sáng Tạo',
                        'description' => 'Không ngừng đổi mới phương pháp giảng dạy để mang lại hiệu quả tốt nhất'
                    ],
                    [
                        'icon' => 'fas fa-award',
                        'title' => 'Chất Lượng',
                        'description' => 'Cam kết chất lượng giảng dạy cao với đội ngũ giảng viên chuyên nghiệp'
                    ],
                    [
                        'icon' => 'fas fa-handshake',
                        'title' => 'Uy Tín',
                        'description' => 'Xây dựng niềm tin với học viên thông qua kết quả học tập thực tế'
                    ]
                ]),
                'type' => 'json',
                'group' => 'about',
                'label' => 'Giá trị cốt lõi',
                'description' => 'Danh sách các giá trị cốt lõi (JSON format)',
                'sort_order' => 7,
            ],
            [
                'key' => 'about_achievements',
                'value' => json_encode([
                    [
                        'number' => '30,000+',
                        'title' => 'Học Viên',
                        'description' => 'Đã tin tưởng và lựa chọn SEC'
                    ],
                    [
                        'number' => '95%',
                        'title' => 'Tỷ Lệ Đạt Mục Tiêu',
                        'description' => 'Học viên đạt điểm số mong muốn'
                    ],
                    [
                        'number' => '4',
                        'title' => 'Cơ Sở',
                        'description' => 'Tại Hà Nội phục vụ học viên'
                    ],
                    [
                        'number' => '50+',
                        'title' => 'Giảng Viên',
                        'description' => 'Chuyên nghiệp với chứng chỉ quốc tế'
                    ]
                ]),
                'type' => 'json',
                'group' => 'about',
                'label' => 'Thành tựu đạt được',
                'description' => 'Danh sách các thành tựu (JSON format)',
                'sort_order' => 8,
            ],
            [
                'key' => 'about_locations',
                'value' => json_encode([
                    [
                        'name' => 'Cơ Sở 1',
                        'address' => '108B Trường Chinh, Đống Đa, Hà Nội',
                        'phone' => '0975.186.230',
                        'description' => 'Cơ sở chính với đầy đủ tiện nghi hiện đại'
                    ],
                    [
                        'name' => 'Cơ Sở 2',
                        'address' => 'Tầng 2, sảnh thương mại tòa HH1 Chung cư Meco Complex ngõ 102 Trường Chinh, Đống Đa Hà Nội',
                        'phone' => '0975.186.230',
                        'description' => 'Cơ sở hiện đại trong khu đô thị'
                    ],
                    [
                        'name' => 'Cơ Sở 3 (Hà Đông)',
                        'address' => 'Số 3 Văn Quán, Hà Đông, Hà Nội',
                        'phone' => '0975.186.230',
                        'description' => 'Phục vụ học viên khu vực Hà Đông'
                    ],
                    [
                        'name' => 'Cơ Sở 4 (Cầu Giấy)',
                        'address' => '59 Trần Quốc Vượng, Dịch Vọng Hậu, Cầu Giấy, Hà Nội',
                        'phone' => '0975.186.230',
                        'description' => 'Thuận tiện cho học viên khu vực Cầu Giấy'
                    ]
                ]),
                'type' => 'json',
                'group' => 'about',
                'label' => 'Hệ thống cơ sở',
                'description' => 'Danh sách các cơ sở (JSON format)',
                'sort_order' => 9,
            ],
            [
                'key' => 'about_cta_title',
                'value' => 'Sẵn sàng trở thành một phần của cộng đồng SEC?',
                'type' => 'text',
                'group' => 'about',
                'label' => 'Tiêu đề Call-to-Action',
                'description' => 'Tiêu đề phần kêu gọi hành động cuối trang',
                'sort_order' => 10,
            ],
            [
                'key' => 'about_cta_description',
                'value' => 'Hãy đến với SEC để trải nghiệm phương pháp học tiếng Anh đột phá và đạt được thành công ngay hôm nay!',
                'type' => 'textarea',
                'group' => 'about',
                'label' => 'Mô tả Call-to-Action',
                'description' => 'Mô tả phần kêu gọi hành động cuối trang',
                'sort_order' => 11,
            ],
        ];

        foreach ($aboutSettings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        // Header settings
        Setting::updateOrCreate(
            ['key' => 'about_header_image'],
            [
                'value' => 'images/about/team-photo.jpg',
                'type' => 'text',
                'group' => 'about',
                'label' => 'Đường dẫn ảnh header',
                'description' => 'Đường dẫn đến ảnh header chính của trang about',
                'sort_order' => 1,
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'about_header_title'],
            [
                'value' => 'Đội Ngũ Giảng Viên Chuyên Nghiệp',
                'type' => 'text',
                'group' => 'about',
                'label' => 'Tiêu đề header',
                'description' => 'Tiêu đề chính hiển thị trên ảnh header',
                'sort_order' => 2,
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'about_header_subtitle'],
            [
                'value' => 'Hơn 25 giảng viên giàu kinh nghiệm, tận tâm với sứ mệnh giúp học viên chinh phục tiếng Đức thành công',
                'type' => 'textarea',
                'group' => 'about',
                'label' => 'Mô tả header',
                'description' => 'Mô tả ngắn gọn hiển thị dưới tiêu đề header',
                'sort_order' => 3,
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'about_header_stats'],
            [
                'value' => json_encode([
                    ['number' => '25+', 'label' => 'Giảng viên'],
                    ['number' => '4+', 'label' => 'Năm kinh nghiệm'],
                    ['number' => '1000+', 'label' => 'Học viên thành công']
                ]),
                'type' => 'json',
                'group' => 'about',
                'label' => 'Thống kê header',
                'description' => 'Các con số thống kê hiển thị trên ảnh header',
                'sort_order' => 4,
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'about_building_image'],
            [
                'value' => 'images/about/sec-building.svg',
                'type' => 'text',
                'group' => 'about',
                'label' => 'Đường dẫn ảnh tòa nhà',
                'description' => 'Đường dẫn đến ảnh tòa nhà trong phần tổng quan',
                'sort_order' => 5,
            ]
        );
    }
}