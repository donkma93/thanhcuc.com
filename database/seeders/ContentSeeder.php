<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Reason;
use App\Models\Program;
use App\Models\Setting;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSliders();
        $this->createTestimonials();
        $this->createReasons();
        $this->createPrograms();
        $this->createSettings();
        
        $this->command->info('Content data created successfully!');
    }
    
    private function createSliders()
    {
        $sliders = [
            [
                'title' => 'Du Học Nghề Đức - Cơ Hội Vàng 2024',
                'description' => 'Chương trình Ausbildung với mức lương hấp dẫn 1.200-1.500€/tháng. Học phí miễn phí, có lương trong quá trình học.',
                'image_path' => 'sliders/slider-1.jpg',
                'button_text' => 'Tư Vấn Ngay',
                'button_link' => '/lien-he',
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'title' => 'Ausbildung IT & Công Nghệ',
                'description' => 'Ngành IT đang thiếu hụt nhân lực tại Đức. Cơ hội việc làm cao, lương khởi điểm 1.400€/tháng.',
                'image_path' => 'sliders/slider-2.jpg',
                'button_text' => 'Xem Chi Tiết',
                'button_link' => '/chuong-trinh-ausbildung',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Hỗ Trợ Toàn Diện A-Z',
                'description' => 'Từ học tiếng Đức, làm hồ sơ, xin visa đến hỗ trợ định cư. Đội ngũ tư vấn viên giàu kinh nghiệm.',
                'image_path' => 'sliders/slider-3.jpg',
                'button_text' => 'Liên Hệ Tư Vấn',
                'button_link' => '/lien-he',
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];
        
        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
    
    private function createTestimonials()
    {
        $testimonials = [
            [
                'name' => 'Nguyễn Minh Anh',
                'program' => 'Ausbildung IT & Công nghệ',
                'current_job' => 'Software Developer',
                'content' => 'Tôi đã hoàn thành chương trình Ausbildung IT tại Đức và hiện đang làm việc tại một công ty công nghệ lớn ở Berlin. Mức lương hiện tại 2.800€/tháng, cuộc sống ổn định. Cảm ơn Thanh Cúc đã hỗ trợ tôi từ A-Z.',
                'avatar_path' => 'testimonials/minh-anh.jpg',
                'company' => 'SAP SE',
                'location' => 'Berlin, Đức',
                'rating' => 5,
                'sort_order' => 0,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Trần Văn Đức',
                'program' => 'Ausbildung Kỹ thuật & Cơ khí',
                'current_job' => 'Mechanical Engineer',
                'content' => 'Chương trình Ausbildung cơ khí tại Đức thực sự tuyệt vời. Tôi được học hỏi từ những kỹ sư giàu kinh nghiệm và áp dụng ngay vào thực tế. Hiện tại đang làm việc tại BMW với mức lương 3.200€/tháng.',
                'avatar_path' => 'testimonials/van-duc.jpg',
                'company' => 'BMW Group',
                'location' => 'Munich, Đức',
                'rating' => 5,
                'sort_order' => 1,
                'is_featured' => true,
                'is_active' => true,
            ],
        ];
        
        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
    
    private function createReasons()
    {
        $reasons = [
            [
                'title' => 'Học Phí Miễn Phí',
                'description' => 'Chương trình Ausbildung hoàn toàn miễn phí học phí, thậm chí còn được trả lương trong quá trình học từ 600-1.200€/tháng.',
                'icon' => 'fas fa-graduation-cap',
                'color' => '#F9D200',
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'title' => 'Mức Lương Hấp Dẫn',
                'description' => 'Sau khi hoàn thành Ausbildung, mức lương khởi điểm từ 1.200-1.500€/tháng, có thể lên đến 3.000€+ với kinh nghiệm.',
                'icon' => 'fas fa-euro-sign',
                'color' => '#F57F25',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Cơ Hội Định Cư',
                'description' => 'Sau khi hoàn thành chương trình, bạn có thể xin thường trú và định cư lâu dài tại Đức - một trong những nước phát triển nhất thế giới.',
                'icon' => 'fas fa-home',
                'color' => '#3EB850',
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];
        
        foreach ($reasons as $reason) {
            Reason::create($reason);
        }
    }
    
    private function createPrograms()
    {
        $programs = [
            [
                'name' => 'Ausbildung IT & Công nghệ',
                'slug' => 'ausbildung-it-cong-nghe',
                'description' => 'Chương trình đào tạo nghề IT tại Đức với nhu cầu nhân lực cao.',
                'short_description' => 'Đào tạo nghề IT với cơ hội việc làm cao',
                'image_path' => 'programs/it-technology.jpg',
                'duration' => '3 năm',
                'salary_range' => '1.200-1.500€',
                'opportunity_level' => 'Rất cao',
                'requirements' => json_encode(['Tốt nghiệp THPT', 'Tiếng Đức B1']),
                'benefits' => json_encode(['Học phí miễn phí', 'Lương cao']),
                'icon' => 'fas fa-laptop-code',
                'color' => '#007bff',
                'sort_order' => 0,
                'is_featured' => true,
                'is_active' => true,
            ],
        ];
        
        foreach ($programs as $program) {
            Program::create($program);
        }
    }
    
    private function createSettings()
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'Thanh Cúc Du Học Nghề Đức',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Tên website',
                'description' => 'Tên hiển thị của website',
                'sort_order' => 0,
            ],
            [
                'key' => 'contact_phone',
                'value' => '0975.186.230',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Số điện thoại',
                'description' => 'Số điện thoại liên hệ chính',
                'sort_order' => 0,
            ],
        ];
        
        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}