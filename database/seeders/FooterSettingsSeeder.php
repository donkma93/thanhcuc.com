<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class FooterSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Company Information
            [
                'key' => 'company_name',
                'value' => 'Trung Tâm Tiếng Đức Thanh Cúc',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Tên công ty',
                'description' => 'Tên đầy đủ của công ty',
                'sort_order' => 1,
            ],
            [
                'key' => 'company_description',
                'value' => 'Trung tâm Tiếng Đức Thanh Cúc - Đồng hành cùng bạn trên con đường học tiếng Đức và luyện thi chứng chỉ. Giảng dạy chuyên nghiệp, kết quả cao.',
                'type' => 'textarea',
                'group' => 'company',
                'label' => 'Mô tả công ty',
                'description' => 'Mô tả ngắn về công ty hiển thị trong footer',
                'sort_order' => 2,
            ],
            [
                'key' => 'company_address',
                'value' => '123 Đường ABC, Quận XYZ, Hà Nội',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Địa chỉ công ty',
                'description' => 'Địa chỉ trụ sở chính',
                'sort_order' => 3,
            ],
            [
                'key' => 'company_phone',
                'value' => '0975186230',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Số điện thoại',
                'description' => 'Số điện thoại chính (không có dấu chấm)',
                'sort_order' => 4,
            ],
            [
                'key' => 'company_phone_display',
                'value' => '0975.186.230',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Số điện thoại hiển thị',
                'description' => 'Số điện thoại hiển thị (có định dạng)',
                'sort_order' => 5,
            ],
            [
                'key' => 'company_email',
                'value' => 'info@thanhcuc.edu.vn',
                'type' => 'email',
                'group' => 'company',
                'label' => 'Email công ty',
                'description' => 'Email liên hệ chính',
                'sort_order' => 6,
            ],
            [
                'key' => 'working_hours',
                'value' => 'T2-T7: 8:00 - 20:00, CN: 8:00 - 17:00',
                'type' => 'text',
                'group' => 'company',
                'label' => 'Giờ làm việc',
                'description' => 'Thời gian làm việc của công ty',
                'sort_order' => 7,
            ],

            // Contact Map Settings
            [
                'key' => 'contact_map_embed',
                'value' => '',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Bản đồ liên hệ (iframe hoặc URL)',
                'description' => 'Dán mã nhúng Google Maps (thẻ iframe) hoặc URL embed của Google Maps.',
                'sort_order' => 1,
            ],
            [
                'key' => 'company_map_embed',
                'value' => '',
                'type' => 'textarea',
                'group' => 'company',
                'label' => 'Bản đồ công ty (iframe hoặc URL)',
                'description' => 'Tùy chọn: Mã nhúng hoặc URL embed Google Maps cho công ty.',
                'sort_order' => 8,
            ],
            [
                'key' => 'map_embed_url',
                'value' => '',
                'type' => 'url',
                'group' => 'contact',
                'label' => 'Google Maps Embed URL',
                'description' => 'Tùy chọn: URL embed nếu không dùng iframe.',
                'sort_order' => 2,
            ],
            [
                'key' => 'google_map_embed',
                'value' => '',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Google Map (iframe)',
                'description' => 'Tùy chọn: Dán thẻ <iframe> Google Map.',
                'sort_order' => 3,
            ],

            // Social Media
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com/thanhcuc.edu.vn',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Facebook URL',
                'description' => 'Đường dẫn trang Facebook',
                'sort_order' => 1,
            ],
            [
                'key' => 'youtube_url',
                'value' => 'https://youtube.com/@thanhcuc',
                'type' => 'url',
                'group' => 'social',
                'label' => 'YouTube URL',
                'description' => 'Đường dẫn kênh YouTube',
                'sort_order' => 2,
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com/thanhcuc.edu.vn',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Instagram URL',
                'description' => 'Đường dẫn trang Instagram',
                'sort_order' => 3,
            ],
            [
                'key' => 'tiktok_url',
                'value' => 'https://tiktok.com/@thanhcuc',
                'type' => 'url',
                'group' => 'social',
                'label' => 'TikTok URL',
                'description' => 'Đường dẫn trang TikTok',
                'sort_order' => 4,
            ],

            // Branches
            [
                'key' => 'branch_hanoi',
                'value' => json_encode([
                    'name' => 'Chi nhánh Hà Nội',
                    'address' => '123 Đường ABC, Quận XYZ, Hà Nội'
                ]),
                'type' => 'json',
                'group' => 'branches',
                'label' => 'Chi nhánh Hà Nội',
                'description' => 'Thông tin chi nhánh Hà Nội',
                'sort_order' => 1,
            ],
            [
                'key' => 'branch_hcm',
                'value' => json_encode([
                    'name' => 'Chi nhánh TP.HCM',
                    'address' => '456 Đường DEF, Quận 1, TP.HCM'
                ]),
                'type' => 'json',
                'group' => 'branches',
                'label' => 'Chi nhánh TP.HCM',
                'description' => 'Thông tin chi nhánh TP.HCM',
                'sort_order' => 2,
            ],
            [
                'key' => 'branch_danang',
                'value' => json_encode([
                    'name' => 'Chi nhánh Đà Nẵng',
                    'address' => '789 Đường GHI, Quận Hải Châu, Đà Nẵng'
                ]),
                'type' => 'json',
                'group' => 'branches',
                'label' => 'Chi nhánh Đà Nẵng',
                'description' => 'Thông tin chi nhánh Đà Nẵng',
                'sort_order' => 3,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
