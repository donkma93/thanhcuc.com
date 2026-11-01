<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class DuHocDucService
{
    const CACHE_KEY = 'du_hoc_duc_settings_data';
    const CACHE_TTL = 3600;

    /**
     * Get default settings for Du Học Đức
     */
    public static function getDefaults(): array
    {
        return [
            // General & Hero
            'page_title' => 'DU HỌC NGHỀ CHLB ĐỨC',
            'meta_title' => 'Du Học Nghề CHLB Đức - Trung Tâm Tiếng Đức Thanh Cúc',
            'meta_description' => 'Du học nghề CHLB Đức miễn 100% học phí, nhận trợ cấp 950 - 1400€/tháng, cơ hội việc làm và định cư lâu dài tại CHLB Đức. Đăng ký tư vấn ngay hôm nay.',
            'banner_image' => 'images/du-hoc-duc/duhoc_banner.jpg',
            
            // About Section
            'about_title' => 'DU HỌC NGHỀ CHLB ĐỨC',
            'about_content_1' => 'Du học nghề CHLB Đức với 6 ngành nghề trọng điểm: điều dưỡng, cơ khí, đầu bếp, nhà hàng, khách sạn, xây dựng... Miễn 100% học phí chuyên ngành đã và đang trở thành một trong những chương trình du học được nhiều bậc phụ huynh và các em học sinh quan tâm hàng đầu hiện nay.',
            'about_content_2' => 'Đức là cường quốc công nghiệp phát triển hàng đầu thế giới, đứng thứ 4 thế giới sau Mỹ, Nhật Bản và Trung Quốc về GDP, đứng thứ hai thế giới về xuất khẩu. Sau khi tốt nghiệp chương trình đào tạo nghề, học viên có cơ hội việc làm rộng mở, thu nhập ổn định và chính sách định cư hấp dẫn.',
            'about_image' => 'images/du-hoc-duc/duhoc_about.jpg',
            'about_btn_text' => 'Đăng ký tư vấn ngay',
            'about_btn_link' => '#form-dang-ky',

            // Values Section
            'values_title' => 'GIÁ TRỊ CỦA CHƯƠNG TRÌNH DU HỌC NGHỀ TẠI CHLB ĐỨC',
            'values_items' => [
                'Miễn 100% học phí đào tạo nghề tại CHLB Đức.',
                'Dễ dàng xin visa du học nghề.',
                'Làm thêm ngoài giờ lên đến 960 h/năm.',
                'Thu nhập sau tốt nghiệp từ 2.500 €/tháng trở lên.',
                'Nhận trợ cấp 950 – 1.400 €/tháng trong suốt thời gian học nghề.',
                'Cơ hội định cư và nhập quốc tịch CHLB Đức sau khi đi làm.'
            ],

            // Conditions Section
            'conditions_title' => 'ĐIỀU KIỆN KHI ĐI DU HỌC NGHỀ ĐỨC',
            'conditions_items' => [
                'Độ tuổi từ 18 - 35 tuổi',
                'Điểm trung bình 3 năm cấp III > 6.5',
                'Không có tiền án, tiền sự',
                'Nữ cao > 1.52m, nặng > 43kg. Nam cao > 1.58m, nặng > 50kg',
                'Sức khỏe tốt, không mắc các bệnh truyền nhiễm',
                'Có chứng chỉ tiếng Đức đạt trình độ B1 tại Việt Nam'
            ],

            // Roadmap Banner
            'roadmap_title' => 'LỘ TRÌNH DU HỌC NGHỀ ĐỨC',
            'roadmap_image' => 'images/du-hoc-duc/duhoc_banner2.jpg',

            // Knowledge / Blog Section
            'blog_title' => 'KIẾN THỨC DU HỌC',
            'blog_articles' => [
                [
                    'title' => '31 NĂM BỨC TƯỜNG BERLIN SỤP ĐỔ 9/11/1989 – 9/11/2020',
                    'date' => '31/01/2024',
                    'summary' => 'Sự hình thành của bức tường Berlin: Vào ngày 13/8/1961, chính phủ Cộng hòa Dân chủ Đức (GDR hay Đông Đức) bắt đầu dựng hàng rào dây thép gai và "bức tường chống phát xít" giữa Đông và Tây Berlin. Mục đích chính thức của Bức tường Berlin này là nhằm ngăn ngừa sự di cư ồ ạt và chia cắt thủ đô nước Đức trong nhiều thập kỷ...',
                    'image' => 'images/du-hoc-duc/blog_berlin.png',
                    'link' => '#form-dang-ky'
                ],
                [
                    'title' => 'CẬP NHẬP CHỨNG MINH TÀI CHÍNH DU HỌC ĐỨC',
                    'date' => '31/01/2024',
                    'summary' => 'Theo quy định mới nhất của Bộ ngoại giao CHLB Đức, mức tiền chứng minh tài chính bắt buộc cho du học sinh và người học nghề tại Đức được cập nhật theo từng giai đoạn để đảm bảo chi phí sinh hoạt tại Đức. Quy định trên trang VFS tại Việt Nam hướng dẫn chi tiết về việc mở tài khoản phong tỏa tại các ngân hàng uy tín...',
                    'image' => 'images/du-hoc-duc/blog_taichinh.png',
                    'link' => '#form-dang-ky'
                ]
            ],

            // Nursing Program (Du học điều dưỡng Đức)
            'nursing_title' => 'Du học nghề điều dưỡng Đức chất lượng cao tại Hà Nội',
            'nursing_subtitle' => 'Bạn đang tìm hiểu du học Đức nhưng chưa biết chọn ngành nào? Hãy cùng Tiếng Đức Thanh Cúc tìm hiểu chi tiết về ngành Điều dưỡng – lựa chọn hàng đầu của du học sinh với mức lương và đãi ngộ hấp dẫn bậc nhất tại CHLB Đức!',
            'nursing_banner_image' => 'images/du-hoc-duc/dieu_duong_banner.png',
            'nursing_sec1_title' => '1. Chuyên ngành & Đào tạo',
            'nursing_majors' => '3 chuyên ngành đào tạo chính: Chăm sóc người già • Điều dưỡng sản phụ – thai nhi • Điều dưỡng đa khoa (bắt buộc học cả 3 chuyên ngành).',
            'nursing_duration' => '3 năm (kết hợp vừa học lý thuyết tại trường nghề, vừa thực hành hưởng lương tại bệnh viện/viện dưỡng lão). Thời hạn lấy bằng tối đa 5 năm.',
            'nursing_overtime' => 'Tối đa 10 tiếng/tuần theo luật lao động Đức.',
            'nursing_sec2_title' => '2. Công việc thực tế',
            'nursing_work_care' => 'Theo dõi các chỉ số sinh tồn của bệnh nhân, cho uống thuốc đúng giờ, tiêm truyền, thay băng và thực hiện các liệu trình phục hồi, trị liệu theo y lệnh của bác sĩ.',
            'nursing_work_manage' => 'Thiết lập và cập nhật hồ sơ bệnh án, quản lý trang thiết bị y tế tại khoa phòng, phối hợp chặt chẽ với các bác sĩ chuyên khoa và điều dưỡng trưởng trong các ca trực.',
            'nursing_sec3_title' => '3. Điều kiện tham gia',
            'nursing_cond_age' => 'Nam/Nữ từ 18 – 35 tuổi, đã tốt nghiệp THPT trở lên.',
            'nursing_cond_lang' => 'Có chứng chỉ tiếng Đức từ B1 trở lên (điều kiện bắt buộc để xin VISA du học nghề tại Đại sứ quán Đức).',
            'nursing_cond_health' => 'Sức khỏe tốt, không mắc các bệnh truyền nhiễm nguy hiểm (Viêm gan B, C, lao phổi, HIV...).',
            'nursing_cond_contract' => 'Phỏng vấn và ký kết hợp đồng đào tạo nghề với doanh nghiệp, bệnh viện tại Đức (được Trung Tâm Tiếng Đức Thanh Cúc hướng dẫn phỏng vấn và bảo đảm hợp đồng 100%).',
            'nursing_sec4_title' => '4. Quyền lợi & Thu nhập',
            'nursing_tuition' => 'MIỄN 100%',
            'nursing_allowance' => '1.100 – 1.400 €/tháng',
            'nursing_salary' => '2.700 – 3.500 €/tháng',
            'nursing_salary_vnd' => '~ 62 – 78 triệu VNĐ/tháng',
            'nursing_settlement' => 'ĐỊNH CƯ VĨNH VIỄN',
            'nursing_settlement_note' => 'Sau 5 năm học tập & làm việc',
            'nursing_benefits_other' => 'Hưởng đầy đủ bảo hiểm y tế, bảo hiểm xã hội, thưởng nghỉ lễ hàng năm và tăng ngày nghỉ phép có lương theo luật lao động Đức.',
            'nursing_sec5_title' => '5. Đánh giá ưu & nhược điểm',
            'nursing_advantages' => [
                '100% học viên có việc làm ngay sau khi tốt nghiệp.',
                'Bằng cấp có giá trị quốc tế và được công nhận trên toàn Châu Âu.',
                'Vừa học lý thuyết vừa thực hành có lương hỗ trợ sinh hoạt đầy đủ.',
                'Cơ hội đón người thân, bảo lãnh gia đình và nhập quốc tịch Đức.'
            ],
            'nursing_challenges' => [
                'Tính chất công việc đòi hỏi sự kiên nhẫn, tận tâm và sức khỏe tốt.',
                'Cần trình độ tiếng Đức thành thạo để giao tiếp tự tin với người bản xứ.',
                'Phải tiếp cận và làm quen với hệ thống máy móc y tế công nghệ cao.'
            ],
        ];
    }

    /**
     * Get all merged settings
     */
    public static function getSettings(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            $defaults = self::getDefaults();
            $dbSettings = Setting::byGroup('du_hoc_duc')->pluck('value', 'key')->toArray();

            $result = $defaults;
            foreach ($dbSettings as $k => $v) {
                if (is_string($v) && (str_starts_with($v, '{') || str_starts_with($v, '['))) {
                    $decoded = json_decode($v, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $result[$k] = $decoded;
                        continue;
                    }
                }
                $result[$k] = $v;
            }

            return $result;
        });
    }

    /**
     * Save settings to database
     */
    public static function saveSettings(array $data): void
    {
        foreach ($data as $key => $value) {
            $valToStore = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : (string)$value;
            $type = is_array($value) ? 'json' : 'text';

            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $valToStore,
                    'type' => $type,
                    'group' => 'du_hoc_duc',
                    'label' => $key,
                ]
            );
        }

        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Reset settings to defaults
     */
    public static function resetToDefaults(): void
    {
        Setting::byGroup('du_hoc_duc')->delete();
        Cache::forget(self::CACHE_KEY);
    }
}
