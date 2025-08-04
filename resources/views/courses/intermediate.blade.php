@extends('layouts.app')

@section('title', 'Khóa Học Trung Cấp B1-B2 - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Khóa Học Trung Cấp B1-B2</h1>
                <p class="lead">
                    Phát triển kỹ năng giao tiếp và sử dụng tiếng Đức trong các tình huống thực tế
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Course Overview -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold text-primary mb-4">TIẾNG ĐỨC TRUNG CẤP B1-B2</h2>
                <p class="lead mb-4">
                    Khóa học dành cho học viên đã có kiến thức cơ bản tiếng Đức, muốn nâng cao khả năng 
                    giao tiếp và sử dụng ngôn ngữ trong công việc, học tập.
                </p>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-clock text-secondary me-3"></i>
                            <div>
                                <strong>Thời gian:</strong><br>
                                8-10 tháng
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-users text-secondary me-3"></i>
                            <div>
                                <strong>Lớp học:</strong><br>
                                8-12 học viên
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-secondary me-3"></i>
                            <div>
                                <strong>Lịch học:</strong><br>
                                3 buổi/tuần
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-certificate text-secondary me-3"></i>
                            <div>
                                <strong>Chứng chỉ:</strong><br>
                                Goethe B1/B2
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Đăng Ký Ngay</a>
                    <a href="tel:0975186230" class="btn btn-outline-primary btn-lg">0975.186.230</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/courses/german-b1b2-icon.svg') }}" 
                     alt="German B1-B2 Course" class="img-fluid rounded shadow-lg animate-pulse" style="max-width: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Course Content -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">NỘI DUNG KHÓA HỌC</h2>
            <p class="lead text-muted">Chương trình học toàn diện theo khung CEFR</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-comments text-white"></i>
                            </div>
                            <h5 class="fw-bold mb-0">Trình độ B1</h5>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giao tiếp trong các tình huống quen thuộc</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Hiểu ý chính của văn bản phức tạp</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Thảo luận về sở thích và kế hoạch</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Viết văn bản liên kết về chủ đề quen thuộc</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mô tả kinh nghiệm, sự kiện, ước mơ</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-accent-color rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-graduation-cap text-white"></i>
                            </div>
                            <h5 class="fw-bold mb-0">Trình độ B2</h5>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Hiểu ý chính của văn bản phức tạp</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giao tiếp tự nhiên với người bản ngữ</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Thảo luận về nhiều chủ đề khác nhau</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Viết văn bản rõ ràng về nhiều chủ đề</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giải thích quan điểm về vấn đề thời sự</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Learning Outcomes -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">SAU KHÓA HỌC BẠN SẼ</h2>
            <p class="lead text-muted">Những kỹ năng và kiến thức bạn đạt được</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-microphone fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Nói Lưu Loát</h5>
                    <p class="text-muted">Giao tiếp tự tin trong môi trường làm việc và học tập</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-book-open fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Đọc Hiểu Tốt</h5>
                    <p class="text-muted">Hiểu các văn bản phức tạp, báo chí, tài liệu chuyên môn</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-pen fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Viết Chính Xác</h5>
                    <p class="text-muted">Soạn thảo email, báo cáo, luận văn một cách chuyên nghiệp</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-headphones fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Nghe Hiểu Tốt</h5>
                    <p class="text-muted">Theo dõi các cuộc thảo luận, bài giảng, chương trình truyền hình</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">CHƯƠNG TRÌNH HỌC</h2>
            <p class="lead text-muted">Lộ trình học tập chi tiết theo từng giai đoạn</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0"><i class="fas fa-star me-2"></i>Giai đoạn B1 (4-5 tháng)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Ngữ pháp:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Konjunktiv II</li>
                                    <li>• Passiv</li>
                                    <li>• Relativsätze</li>
                                    <li>• Temporale Nebensätze</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Chủ đề:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Arbeit und Beruf</li>
                                    <li>• Gesundheit</li>
                                    <li>• Medien</li>
                                    <li>• Umwelt</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-accent-color text-white">
                        <h5 class="mb-0"><i class="fas fa-trophy me-2"></i>Giai đoạn B2 (4-5 tháng)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Ngữ pháp:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Partizipien</li>
                                    <li>• Nominalisierung</li>
                                    <li>• Subjektive Modalverben</li>
                                    <li>• Erweiterte Infinitive</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Chủ đề:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Wissenschaft</li>
                                    <li>• Kultur</li>
                                    <li>• Politik</li>
                                    <li>• Globalisierung</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">HỌC PHÍ</h2>
            <p class="lead text-muted">Đầu tư xứng đáng cho tương lai của bạn</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-header bg-secondary text-white text-center py-4">
                        <h4 class="fw-bold mb-0">Trình độ B1</h4>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold text-primary mb-3">8.500.000₫</div>
                        <p class="text-muted mb-4">4-5 tháng học</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>120 giờ học</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giảng viên bản ngữ</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tài liệu miễn phí</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Luyện thi Goethe B1</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-secondary btn-lg w-100">Đăng Ký Ngay</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 border-warning">
                    <div class="card-header bg-accent-color text-white text-center py-4">
                        <h4 class="fw-bold mb-0">Trình độ B2</h4>
                        <small class="badge bg-white text-warning">Phổ biến nhất</small>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold text-primary mb-3">9.500.000₫</div>
                        <p class="text-muted mb-4">4-5 tháng học</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>140 giờ học</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giảng viên bản ngữ</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tài liệu miễn phí</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Luyện thi Goethe B2</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tư vấn du học</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-warning btn-lg w-100">Đăng Ký Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Sẵn sàng nâng cao trình độ tiếng Đức của bạn?</h3>
                <p class="mb-0">Đăng ký học thử miễn phí để trải nghiệm phương pháp giảng dạy của chúng tôi!</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">Đăng Ký Ngay</a>
                <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Gọi Ngay
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
