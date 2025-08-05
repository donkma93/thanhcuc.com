<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'name' => 'Nguyễn Văn An',
                'email' => 'nguyenvanan@gmail.com',
                'phone' => '0987654321',
                'program' => 'Ausbildung IT & Công nghệ',
                'message' => 'Tôi muốn tìm hiểu về chương trình Ausbildung IT tại Đức. Xin tư vấn chi tiết về điều kiện và thủ tục.',
                'status' => 'new',
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Trần Thị Bình',
                'email' => 'tranthibinh@yahoo.com',
                'phone' => '0912345678',
                'program' => 'Ausbildung Y tế & Chăm sóc',
                'message' => 'Em quan tâm đến ngành y tế tại Đức. Mức lương và cơ hội việc làm như thế nào ạ?',
                'status' => 'contacted',
                'contacted_at' => now()->subHours(6),
                'admin_notes' => 'Đã gọi điện tư vấn, khách hàng quan tâm. Hẹn gặp trực tiếp vào tuần sau.',
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'Lê Minh Cường',
                'email' => 'leminhcuong@hotmail.com',
                'phone' => '0934567890',
                'program' => 'Ausbildung Kỹ thuật & Cơ khí',
                'message' => 'Tôi có bằng kỹ sư cơ khí, muốn sang Đức học Ausbildung để có kinh nghiệm thực tế.',
                'status' => 'completed',
                'contacted_at' => now()->subDays(3),
                'admin_notes' => 'Đã hoàn thành hồ sơ, nộp visa thành công. Khách hàng rất hài lòng với dịch vụ.',
                'created_at' => now()->subDays(5),
            ],
            [
                'name' => 'Phạm Thị Dung',
                'email' => 'phamthidung@gmail.com',
                'phone' => '0945678901',
                'program' => 'Ausbildung Khách sạn & Ẩm thực',
                'message' => 'Em muốn học nghề đầu bếp tại Đức. Chi phí và thời gian học bao lâu ạ?',
                'status' => 'new',
                'created_at' => now()->subHours(3),
            ],
            [
                'name' => 'Hoàng Văn Đức',
                'email' => 'hoangvanduc@outlook.com',
                'phone' => '0956789012',
                'program' => 'Ausbildung IT & Công nghệ',
                'message' => 'Tôi đang làm lập trình viên, muốn sang Đức để phát triển sự nghiệp. Xin tư vấn.',
                'status' => 'contacted',
                'contacted_at' => now()->subHours(12),
                'admin_notes' => 'Khách hàng có kinh nghiệm IT tốt. Đã gửi thông tin chi tiết qua email.',
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Vũ Thị Hoa',
                'email' => 'vuthihoa@gmail.com',
                'phone' => '0967890123',
                'program' => 'Kiểm tra trình độ online - Trình độ hiện tại: A2',
                'message' => 'Em muốn kiểm tra trình độ tiếng Đức hiện tại để chuẩn bị cho Ausbildung.',
                'status' => 'new',
                'created_at' => now()->subMinutes(30),
            ],
            [
                'name' => 'Đặng Minh Tuấn',
                'email' => 'dangminhtuan@yahoo.com',
                'phone' => '0978901234',
                'program' => 'Ausbildung Y tế & Chăm sóc (Học thử miễn phí)',
                'message' => 'Tôi muốn học thử khóa tiếng Đức chuẩn bị cho ngành y tế.',
                'status' => 'contacted',
                'contacted_at' => now()->subDays(1),
                'admin_notes' => 'Đã sắp xếp lịch học thử vào thứ 7 tuần này.',
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'Bùi Thị Lan',
                'email' => 'buithilan@gmail.com',
                'phone' => '0989012345',
                'program' => 'Ausbildung Kỹ thuật & Cơ khí',
                'message' => 'Em mới tốt nghiệp đại học kỹ thuật, muốn tìm hiểu về cơ hội Ausbildung.',
                'status' => 'new',
                'created_at' => now()->subHours(8),
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }

        $this->command->info('Sample contacts created successfully!');
    }
}
