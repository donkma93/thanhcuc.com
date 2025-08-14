<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'Khai giảng khóa học tiếng Đức A1 mới',
                'slug' => 'khai-giang-khoa-hoc-tieng-duc-a1-moi',
                'excerpt' => 'Trung tâm Thanh Cúc thông báo khai giảng khóa học tiếng Đức A1 mới với nhiều ưu đãi hấp dẫn cho học viên.',
                'content' => '<h2>Thông báo khai giảng khóa học tiếng Đức A1</h2>
                
                <p>Trung tâm tiếng Đức Thanh Cúc trân trọng thông báo khai giảng khóa học tiếng Đức A1 mới với những điểm nổi bật sau:</p>
                
                <h3>Thông tin khóa học:</h3>
                <ul>
                    <li><strong>Thời gian:</strong> 3 tháng (12 tuần)</li>
                    <li><strong>Lịch học:</strong> Thứ 2, 4, 6 hoặc Thứ 3, 5, 7</li>
                    <li><strong>Giờ học:</strong> 18:00 - 20:00</li>
                    <li><strong>Sĩ số:</strong> Tối đa 15 học viên/lớp</li>
                </ul>
                
                <h3>Nội dung khóa học:</h3>
                <p>Khóa học A1 sẽ trang bị cho học viên những kiến thức cơ bản nhất về tiếng Đức:</p>
                <ul>
                    <li>Bảng chữ cái và cách phát âm</li>
                    <li>Chào hỏi và giới thiệu bản thân</li>
                    <li>Số đếm và thời gian</li>
                    <li>Gia đình và nghề nghiệp</li>
                    <li>Mua sắm và ăn uống</li>
                    <li>Du lịch và phương tiện giao thông</li>
                </ul>
                
                <h3>Ưu đãi đặc biệt:</h3>
                <ul>
                    <li>Giảm 10% học phí cho học viên đăng ký sớm</li>
                    <li>Tặng giáo trình và tài liệu học tập</li>
                    <li>Hỗ trợ thi thử miễn phí</li>
                    <li>Cam kết đạt chứng chỉ A1 sau khóa học</li>
                </ul>
                
                <p><strong>Liên hệ đăng ký:</strong> 0975 186 230 hoặc đến trực tiếp trung tâm để được tư vấn chi tiết.</p>',
                                    'category' => 'HOẠT ĐỘNG CÔNG TY',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Kết quả thi chứng chỉ Goethe tháng 12/2024',
                'slug' => 'ket-qua-thi-chung-chi-goethe-thang-12-2024',
                'excerpt' => 'Công bố kết quả thi chứng chỉ Goethe của học viên trung tâm Thanh Cúc trong tháng 12/2024 với tỷ lệ đạt cao.',
                'content' => '<h2>Kết quả thi chứng chỉ Goethe tháng 12/2024</h2>
                
                <p>Trung tâm tiếng Đức Thanh Cúc vui mừng thông báo kết quả thi chứng chỉ Goethe của học viên trong tháng 12/2024:</p>
                
                <h3>Thống kê tổng quan:</h3>
                <ul>
                    <li><strong>Tổng số thí sinh:</strong> 45 học viên</li>
                    <li><strong>Tỷ lệ đạt:</strong> 93.3% (42/45 học viên)</li>
                    <li><strong>Điểm trung bình:</strong> 85/100</li>
                </ul>
                
                <h3>Kết quả theo cấp độ:</h3>
                <ul>
                    <li><strong>A1:</strong> 15/15 học viên đạt (100%)</li>
                    <li><strong>A2:</strong> 12/13 học viên đạt (92.3%)</li>
                    <li><strong>B1:</strong> 10/11 học viên đạt (90.9%)</li>
                    <li><strong>B2:</strong> 5/6 học viên đạt (83.3%)</li>
                </ul>
                
                <h3>Những thành tích nổi bật:</h3>
                <ul>
                    <li>Nguyễn Thị Anh - Đạt điểm tuyệt đối 100/100 cấp độ A1</li>
                    <li>Trần Văn Bình - Đạt 98/100 cấp độ B1</li>
                    <li>Lê Thị Cẩm - Đạt 95/100 cấp độ A2</li>
                </ul>
                
                <p>Chúc mừng tất cả học viên đã hoàn thành xuất sắc kỳ thi. Trung tâm sẽ tiếp tục nỗ lực để duy trì và nâng cao chất lượng đào tạo.</p>',
                                    'category' => 'HOẠT ĐỘNG CÔNG TY',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Lịch thi chứng chỉ TestDaF tháng 1/2025',
                'slug' => 'lich-thi-chung-chi-testdaf-thang-1-2025',
                'excerpt' => 'Thông báo lịch thi chứng chỉ TestDaF tháng 1/2025 và hướng dẫn đăng ký thi cho học viên.',
                'content' => '<h2>Lịch thi chứng chỉ TestDaF tháng 1/2025</h2>
                
                <p>Trung tâm tiếng Đức Thanh Cúc thông báo lịch thi chứng chỉ TestDaF trong tháng 1/2025:</p>
                
                <h3>Thông tin kỳ thi:</h3>
                <ul>
                    <li><strong>Ngày thi:</strong> 15/01/2025</li>
                    <li><strong>Địa điểm:</strong> Viện Goethe Hà Nội</li>
                    <li><strong>Hạn đăng ký:</strong> 30/12/2024</li>
                    <li><strong>Lệ phí thi:</strong> 2.500.000 VNĐ</li>
                </ul>
                
                <h3>Hướng dẫn đăng ký:</h3>
                <ol>
                    <li>Đăng ký trực tiếp tại trung tâm</li>
                    <li>Nộp hồ sơ đăng ký (CMND/CCCD, ảnh 3x4)</li>
                    <li>Thanh toán lệ phí thi</li>
                    <li>Nhận thông báo xác nhận</li>
                </ol>
                
                <h3>Lưu ý quan trọng:</h3>
                <ul>
                    <li>Thí sinh cần có mặt tại địa điểm thi trước 30 phút</li>
                    <li>Mang theo CMND/CCCD gốc</li>
                    <li>Không được mang điện thoại vào phòng thi</li>
                    <li>Tuân thủ quy định phòng chống dịch</li>
                </ul>
                
                <p><strong>Liên hệ đăng ký:</strong> 0975 186 230 hoặc email: info@thanhcuc.com</p>',
                                    'category' => 'HOẠT ĐỘNG CÔNG TY',
                'is_published' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Chương trình học bổng du học Đức 2025',
                'slug' => 'chuong-trinh-hoc-bong-du-hoc-duc-2025',
                'excerpt' => 'Thông báo chương trình học bổng du học Đức 2025 với nhiều cơ hội hấp dẫn cho sinh viên Việt Nam.',
                'content' => '<h2>Chương trình học bổng du học Đức 2025</h2>
                
                <p>Trung tâm tiếng Đức Thanh Cúc phối hợp với các trường đại học Đức tổ chức chương trình học bổng du học 2025:</p>
                
                <h3>Thông tin học bổng:</h3>
                <ul>
                    <li><strong>Đối tượng:</strong> Sinh viên tốt nghiệp THPT hoặc đại học</li>
                    <li><strong>Ngành học:</strong> Kỹ thuật, Kinh tế, Y tế, Giáo dục</li>
                    <li><strong>Trị giá:</strong> 50-100% học phí</li>
                    <li><strong>Thời hạn:</strong> 3-4 năm</li>
                </ul>
                
                <h3>Điều kiện ứng tuyển:</h3>
                <ul>
                    <li>Đạt chứng chỉ tiếng Đức B2 trở lên</li>
                    <li>Điểm trung bình THPT từ 8.0 trở lên</li>
                    <li>Thư giới thiệu từ giáo viên</li>
                    <li>Bài luận về động lực học tập</li>
                </ul>
                
                <h3>Hỗ trợ từ trung tâm:</h3>
                <ul>
                    <li>Tư vấn chọn trường và ngành học</li>
                    <li>Hướng dẫn chuẩn bị hồ sơ</li>
                    <li>Luyện thi chứng chỉ tiếng Đức</li>
                    <li>Hỗ trợ xin visa và chuẩn bị hành trang</li>
                </ul>
                
                <p><strong>Hạn nộp hồ sơ:</strong> 31/03/2025</p>
                <p><strong>Liên hệ tư vấn:</strong> 0975 186 230</p>',
                                    'category' => 'HOẠT ĐỘNG CÔNG TY',
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(15),
            ],
                            [
                    'title' => 'Hoạt động ngoại khóa: Giao lưu với người Đức',
                    'slug' => 'hoat-dong-ngoai-khoa-giao-luu-voi-nguoi-duc',
                    'excerpt' => 'Chương trình giao lưu văn hóa với người Đức giúp học viên thực hành tiếng Đức và hiểu văn hóa Đức.',
                    'content' => '<h2>Hoạt động ngoại khóa: Giao lưu với người Đức</h2>
                    
                    <p>Trung tâm tiếng Đức Thanh Cúc tổ chức chương trình giao lưu văn hóa với người Đức vào cuối tuần:</p>
                    
                    <h3>Thông tin chương trình:</h3>
                    <ul>
                        <li><strong>Thời gian:</strong> Chủ nhật, 15/12/2024</li>
                        <li><strong>Địa điểm:</strong> Trung tâm Thanh Cúc</li>
                        <li><strong>Đối tượng:</strong> Học viên các khóa A1-B2</li>
                        <li><strong>Phí tham gia:</strong> Miễn phí</li>
                    </ul>
                    
                    <h3>Nội dung chương trình:</h3>
                    <ul>
                        <li>Giao lưu trò chuyện bằng tiếng Đức</li>
                        <li>Chia sẻ văn hóa Việt Nam - Đức</li>
                        <li>Thưởng thức ẩm thực Đức</li>
                        <li>Chơi các trò chơi tương tác</li>
                        <li>Hát các bài hát tiếng Đức</li>
                    </ul>
                    
                    <h3>Lợi ích tham gia:</h3>
                    <ul>
                        <li>Thực hành tiếng Đức với người bản xứ</li>
                        <li>Hiểu sâu hơn về văn hóa Đức</li>
                        <li>Xây dựng mối quan hệ bạn bè</li>
                        <li>Tăng cường kỹ năng giao tiếp</li>
                    </ul>
                    
                    <p><strong>Đăng ký tham gia:</strong> Liên hệ giáo viên hoặc văn phòng trung tâm</p>',
                    'category' => 'HOẠT ĐỘNG CÔNG TY',
                    'is_published' => true,
                    'is_featured' => false,
                    'published_at' => now()->subDays(20),
                ],
                [
                    'title' => 'Cách học từ vựng tiếng Đức hiệu quả',
                    'slug' => 'cach-hoc-tu-vung-tieng-duc-hieu-qua',
                    'excerpt' => 'Chia sẻ các phương pháp học từ vựng tiếng Đức hiệu quả giúp học viên nâng cao vốn từ vựng nhanh chóng.',
                    'content' => '<h2>Cách học từ vựng tiếng Đức hiệu quả</h2>
                    
                    <p>Học từ vựng là một trong những yếu tố quan trọng nhất khi học tiếng Đức. Dưới đây là những phương pháp hiệu quả:</p>
                    
                    <h3>1. Học theo chủ đề</h3>
                    <p>Thay vì học từ vựng một cách ngẫu nhiên, hãy nhóm chúng theo chủ đề:</p>
                    <ul>
                        <li><strong>Gia đình:</strong> Mutter, Vater, Schwester, Bruder, Großeltern</li>
                        <li><strong>Nghề nghiệp:</strong> Lehrer, Arzt, Ingenieur, Verkäufer</li>
                        <li><strong>Thực phẩm:</strong> Brot, Milch, Käse, Wurst, Gemüse</li>
                        <li><strong>Giao thông:</strong> Auto, Bus, Zug, Flugzeug, Fahrrad</li>
                    </ul>
                    
                    <h3>2. Sử dụng flashcards</h3>
                    <p>Flashcards là công cụ tuyệt vời để ghi nhớ từ vựng:</p>
                    <ul>
                        <li>Tạo thẻ với từ tiếng Đức ở một mặt</li>
                        <li>Viết nghĩa tiếng Việt ở mặt còn lại</li>
                        <li>Ôn tập thường xuyên</li>
                        <li>Sử dụng ứng dụng như Anki hoặc Quizlet</li>
                    </ul>
                    
                    <h3>3. Học qua ngữ cảnh</h3>
                    <p>Học từ vựng trong câu hoàn chỉnh giúp hiểu rõ cách sử dụng:</p>
                    <ul>
                        <li>Đọc sách, báo tiếng Đức</li>
                        <li>Xem phim, video có phụ đề</li>
                        <li>Nghe nhạc tiếng Đức</li>
                        <li>Viết câu với từ mới học</li>
                    </ul>
                    
                    <h3>4. Áp dụng quy tắc ghi nhớ</h3>
                    <ul>
                        <li><strong>Spaced Repetition:</strong> Ôn tập theo khoảng thời gian tăng dần</li>
                        <li><strong>Visual Association:</strong> Liên tưởng hình ảnh với từ vựng</li>
                        <li><strong>Mnemonic Devices:</strong> Tạo câu gợi nhớ</li>
                        <li><strong>Word Families:</strong> Học các từ cùng họ</li>
                    </ul>
                    
                    <h3>5. Thực hành thường xuyên</h3>
                    <p>Áp dụng từ vựng vào cuộc sống hàng ngày:</p>
                    <ul>
                        <li>Viết nhật ký bằng tiếng Đức</li>
                        <li>Nói chuyện với bạn bè</li>
                        <li>Tham gia các nhóm học tiếng Đức</li>
                        <li>Làm bài tập từ vựng</li>
                    </ul>
                    
                    <p><strong>Lưu ý:</strong> Học từ vựng cần thời gian và sự kiên nhẫn. Hãy học ít nhưng đều đặn mỗi ngày thay vì học nhiều trong một lần.</p>',
                    'category' => 'KIẾN THỨC TIẾNG ĐỨC',
                    'is_published' => true,
                    'is_featured' => true,
                    'published_at' => now()->subDays(25),
                ],
                [
                    'title' => 'Ngữ pháp tiếng Đức: Cách sử dụng các thì',
                    'slug' => 'ngu-phap-tieng-duc-cach-su-dung-cac-thi',
                    'excerpt' => 'Hướng dẫn chi tiết về cách sử dụng các thì trong tiếng Đức cho người mới bắt đầu.',
                    'content' => '<h2>Ngữ pháp tiếng Đức: Cách sử dụng các thì</h2>
                    
                    <p>Tiếng Đức có 6 thì cơ bản. Dưới đây là hướng dẫn chi tiết về cách sử dụng từng thì:</p>
                    
                    <h3>1. Präsens (Thì hiện tại)</h3>
                    <p><strong>Cách dùng:</strong></p>
                    <ul>
                        <li>Hành động xảy ra ở hiện tại</li>
                        <li>Sự thật hiển nhiên</li>
                        <li>Thói quen, lịch trình</li>
                        <li>Tương lai gần (với trạng từ thời gian)</li>
                    </ul>
                    <p><strong>Ví dụ:</strong></p>
                    <ul>
                        <li>Ich lerne Deutsch. (Tôi học tiếng Đức)</li>
                        <li>Die Sonne scheint. (Mặt trời chiếu sáng)</li>
                        <li>Ich gehe jeden Tag zur Schule. (Tôi đi học mỗi ngày)</li>
                        <li>Morgen fahre ich nach Berlin. (Ngày mai tôi sẽ đi Berlin)</li>
                    </ul>
                    
                    <h3>2. Perfekt (Thì quá khứ hoàn thành)</h3>
                    <p><strong>Cách dùng:</strong></p>
                    <ul>
                        <li>Hành động đã hoàn thành trong quá khứ</li>
                        <li>Kết quả còn ảnh hưởng đến hiện tại</li>
                        <li>Trong văn nói</li>
                    </ul>
                    <p><strong>Cấu trúc:</strong> haben/sein + Partizip II</p>
                    <p><strong>Ví dụ:</strong></p>
                    <ul>
                        <li>Ich habe Deutsch gelernt. (Tôi đã học tiếng Đức)</li>
                        <li>Er ist nach Hause gegangen. (Anh ấy đã về nhà)</li>
                    </ul>
                    
                    <h3>3. Präteritum (Thì quá khứ đơn)</h3>
                    <p><strong>Cách dùng:</strong></p>
                    <ul>
                        <li>Hành động đã hoàn thành trong quá khứ</li>
                        <li>Trong văn viết, báo chí</li>
                        <li>Kể chuyện</li>
                    </ul>
                    <p><strong>Ví dụ:</strong></p>
                    <ul>
                        <li>Ich lernte Deutsch. (Tôi đã học tiếng Đức)</li>
                        <li>Er ging nach Hause. (Anh ấy đã về nhà)</li>
                    </ul>
                    
                    <h3>4. Plusquamperfekt (Thì quá khứ hoàn thành)</h3>
                    <p><strong>Cách dùng:</strong></p>
                    <ul>
                        <li>Hành động xảy ra trước một hành động khác trong quá khứ</li>
                        <li>Trong câu phức</li>
                    </ul>
                    <p><strong>Cấu trúc:</strong> hatte/war + Partizip II</p>
                    <p><strong>Ví dụ:</strong></p>
                    <ul>
                        <li>Ich hatte Deutsch gelernt, bevor ich nach Deutschland ging. (Tôi đã học tiếng Đức trước khi đi Đức)</li>
                    </ul>
                    
                    <h3>5. Futur I (Thì tương lai)</h3>
                    <p><strong>Cách dùng:</strong></p>
                    <ul>
                        <li>Hành động sẽ xảy ra trong tương lai</li>
                        <li>Dự đoán</li>
                        <li>Kế hoạch</li>
                    </ul>
                    <p><strong>Cấu trúc:</strong> werden + Infinitiv</p>
                    <p><strong>Ví dụ:</strong></p>
                    <ul>
                        <li>Ich werde Deutsch lernen. (Tôi sẽ học tiếng Đức)</li>
                        <li>Es wird morgen regnen. (Ngày mai sẽ mưa)</li>
                    </ul>
                    
                    <h3>6. Futur II (Thì tương lai hoàn thành)</h3>
                    <p><strong>Cách dùng:</strong></p>
                    <ul>
                        <li>Hành động sẽ hoàn thành trước một thời điểm trong tương lai</li>
                        <li>Dự đoán về kết quả</li>
                    </ul>
                    <p><strong>Cấu trúc:</strong> werden + haben/sein + Partizip II</p>
                    <p><strong>Ví dụ:</strong></p>
                    <ul>
                        <li>Bis morgen werde ich die Prüfung bestanden haben. (Đến ngày mai tôi sẽ đã vượt qua kỳ thi)</li>
                    </ul>
                    
                    <p><strong>Lưu ý:</strong> Việc sử dụng đúng thì trong tiếng Đức rất quan trọng để diễn đạt chính xác ý nghĩa. Hãy luyện tập thường xuyên để thành thạo.</p>',
                    'category' => 'KIẾN THỨC TIẾNG ĐỨC',
                    'is_published' => true,
                    'is_featured' => false,
                    'published_at' => now()->subDays(30),
                ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
