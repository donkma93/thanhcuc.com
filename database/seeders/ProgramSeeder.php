<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => 'Ausbildung IT & Công Nghệ',
                'slug' => 'ausbildung-it-cong-nghe',
                'short_description' => 'Chương trình đào tạo lập trình viên, quản trị mạng và các nghề IT hot nhất tại Đức',
                'description' => 'Chương trình Ausbildung IT & Công Nghệ là một trong những ngành nghề được ưa chuộng nhất tại Đức. Học viên sẽ được đào tạo toàn diện về lập trình, quản trị hệ thống, bảo mật mạng và các công nghệ hiện đại. Sau khi hoàn thành chương trình, học viên có thể làm việc tại các công ty công nghệ hàng đầu với mức lương hấp dẫn.',
                'duration' => '3 năm',
                'salary_range' => '1.200-1.500€/tháng',
                'opportunity_level' => 'Rất cao',
                'requirements' => json_encode([
                    'Tốt nghiệp THPT hoặc tương đương',
                    'Có kiến thức cơ bản về máy tính',
                    'Tiếng Đức từ B1 trở lên',
                    'Đam mê công nghệ và lập trình'
                ]),
                'benefits' => json_encode([
                    'Học phí miễn phí',
                    'Nhận lương trong quá trình học',
                    'Cơ hội định cư tại Đức',
                    'Môi trường làm việc hiện đại',
                    'Cơ hội thăng tiến cao'
                ]),
                'icon' => 'fas fa-laptop-code',
                'color' => '#007bff',
                'sort_order' => 1,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ausbildung Y Tế & Chăm Sóc',
                'slug' => 'ausbildung-y-te-cham-soc',
                'short_description' => 'Đào tạo điều dưỡng, chăm sóc người già và các nghề y tế với nhu cầu cao tại Đức',
                'description' => 'Ngành Y tế & Chăm sóc là một trong những lĩnh vực có nhu cầu nhân lực cao nhất tại Đức do dân số già hóa. Chương trình đào tạo toàn diện về chăm sóc sức khỏe, điều dưỡng và hỗ trợ y tế. Đây là nghề có ý nghĩa xã hội cao và được đảm bảo việc làm ổn định.',
                'duration' => '3 năm',
                'salary_range' => '1.000-1.300€/tháng',
                'opportunity_level' => 'Rất cao',
                'requirements' => json_encode([
                    'Tốt nghiệp THPT',
                    'Có tâm huyết với nghề chăm sóc',
                    'Tiếng Đức từ B2 trở lên',
                    'Sức khỏe tốt'
                ]),
                'benefits' => json_encode([
                    'Học phí miễn phí',
                    'Lương cao trong quá trình học',
                    'Đảm bảo việc làm sau tốt nghiệp',
                    'Nghề có ý nghĩa xã hội',
                    'Cơ hội định cư dễ dàng'
                ]),
                'icon' => 'fas fa-user-nurse',
                'color' => '#28a745',
                'sort_order' => 2,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ausbildung Kỹ Thuật & Cơ Khí',
                'slug' => 'ausbildung-ky-thuat-co-khi',
                'short_description' => 'Chương trình đào tạo thợ máy, kỹ thuật ô tô và các nghề kỹ thuật chính xác',
                'description' => 'Đức nổi tiếng với ngành công nghiệp cơ khí phát triển. Chương trình Ausbildung Kỹ thuật & Cơ khí đào tạo các kỹ năng chuyên môn cao về sửa chữa, bảo dưỡng máy móc, kỹ thuật ô tô và sản xuất công nghiệp. Đây là nền tảng vững chắc cho sự nghiệp trong ngành công nghiệp.',
                'duration' => '3.5 năm',
                'salary_range' => '1.100-1.400€/tháng',
                'opportunity_level' => 'Cao',
                'requirements' => json_encode([
                    'Tốt nghiệp THPT',
                    'Có khả năng tư duy logic',
                    'Tiếng Đức từ B1 trở lên',
                    'Khéo léo với tay nghề'
                ]),
                'benefits' => json_encode([
                    'Học phí miễn phí',
                    'Thực hành tại các nhà máy lớn',
                    'Cơ hội làm việc tại các tập đoàn',
                    'Mức lương ổn định',
                    'Nghề truyền thống của Đức'
                ]),
                'icon' => 'fas fa-wrench',
                'color' => '#ffc107',
                'sort_order' => 3,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ausbildung Khách Sạn & Ẩm Thực',
                'slug' => 'ausbildung-khach-san-am-thuc',
                'short_description' => 'Đào tạo đầu bếp, quản lý khách sạn và dịch vụ du lịch chuyên nghiệp',
                'description' => 'Ngành Du lịch & Khách sạn tại Đức phát triển mạnh mẽ với hàng triệu du khách mỗi năm. Chương trình đào tạo kỹ năng nấu ăn, quản lý khách sạn, dịch vụ khách hàng và vận hành nhà hàng. Đây là cơ hội tuyệt vời để phát triển trong ngành dịch vụ sôi động.',
                'duration' => '3 năm',
                'salary_range' => '900-1.200€/tháng',
                'opportunity_level' => 'Cao',
                'requirements' => json_encode([
                    'Tốt nghiệp THPT',
                    'Kỹ năng giao tiếp tốt',
                    'Tiếng Đức từ B1 trở lên',
                    'Yêu thích ngành dịch vụ'
                ]),
                'benefits' => json_encode([
                    'Học phí miễn phí',
                    'Thực tập tại khách sạn 5 sao',
                    'Cơ hội du lịch nhiều nơi',
                    'Phát triển kỹ năng mềm',
                    'Môi trường làm việc quốc tế'
                ]),
                'icon' => 'fas fa-utensils',
                'color' => '#dc3545',
                'sort_order' => 4,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ausbildung Kinh Doanh & Thương Mại',
                'slug' => 'ausbildung-kinh-doanh-thuong-mai',
                'short_description' => 'Chương trình đào tạo quản lý kinh doanh, marketing và thương mại điện tử',
                'description' => 'Chương trình Ausbildung Kinh doanh & Thương mại cung cấp kiến thức toàn diện về quản lý doanh nghiệp, marketing, bán hàng và thương mại điện tử. Học viên sẽ được thực hành tại các công ty thương mại lớn và phát triển kỹ năng lãnh đạo.',
                'duration' => '3 năm',
                'salary_range' => '1.000-1.300€/tháng',
                'opportunity_level' => 'Cao',
                'requirements' => json_encode([
                    'Tốt nghiệp THPT',
                    'Kỹ năng toán học tốt',
                    'Tiếng Đức từ B2 trở lên',
                    'Tư duy kinh doanh'
                ]),
                'benefits' => json_encode([
                    'Học phí miễn phí',
                    'Thực tập tại các tập đoàn',
                    'Cơ hội khởi nghiệp',
                    'Mạng lưới kinh doanh rộng',
                    'Kỹ năng quản lý chuyên nghiệp'
                ]),
                'icon' => 'fas fa-chart-line',
                'color' => '#6f42c1',
                'sort_order' => 5,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Ausbildung Logistics & Vận Tải',
                'slug' => 'ausbildung-logistics-van-tai',
                'short_description' => 'Đào tạo chuyên viên logistics, quản lý kho và vận chuyển hàng hóa',
                'description' => 'Với vị trí trung tâm của châu Âu, Đức là hub logistics quan trọng. Chương trình đào tạo về quản lý chuỗi cung ứng, vận chuyển hàng hóa, quản lý kho và logistics quốc tế. Đây là ngành có triển vọng phát triển mạnh trong thời đại thương mại điện tử.',
                'duration' => '3 năm',
                'salary_range' => '1.100-1.350€/tháng',
                'opportunity_level' => 'Cao',
                'requirements' => json_encode([
                    'Tốt nghiệp THPT',
                    'Kỹ năng tổ chức tốt',
                    'Tiếng Đức từ B1 trở lên',
                    'Khả năng làm việc nhóm'
                ]),
                'benefits' => json_encode([
                    'Học phí miễn phí',
                    'Cơ hội làm việc quốc tế',
                    'Ngành phát triển nhanh',
                    'Môi trường công nghệ cao',
                    'Cơ hội thăng tiến tốt'
                ]),
                'icon' => 'fas fa-truck',
                'color' => '#fd7e14',
                'sort_order' => 6,
                'is_active' => true,
                'is_featured' => true,
            ]
        ];

        foreach ($programs as $programData) {
            Program::create($programData);
        }
    }
}