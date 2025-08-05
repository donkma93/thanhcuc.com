@extends('layouts.app')

@section('title', 'Học Thử Miễn Phí - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up">
                    HỌC THỬ MIỄN PHÍ
                </h1>
                <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1">
                    Trải nghiệm phương pháp giảng dạy tiếng Đức hiệu quả tại Thanh Cúc hoàn toàn miễn phí
                </p>
                <div class="d-flex justify-content-center gap-3 animate-fade-in-up animate-delay-2">
                    <a href="#trial-form" class="btn btn-light btn-lg btn-liquid">
                        <i class="fas fa-play me-2"></i>Đăng Ký Ngay
                    </a>
                    <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Hotline: 0975.186.230
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">TẠI SAO NÊN HỌC THỬ?</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những lợi ích khi tham gia buổi học thử miễn phí</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-eye fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Trải Nghiệm Thực Tế</h5>
                        <p class="text-muted">Tham gia buổi học thực tế với giảng viên bản ngữ, hiểu rõ phương pháp giảng dạy</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-1">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-user-check fa-3x text-success"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Đánh Giá Trình Độ</h5>
                        <p class="text-muted">Kiểm tra trình độ tiếng Đức hiện tại và nhận tư vấn lộ trình học phù hợp</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-2">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-gift fa-3x text-warning"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Nhận Quà Tặng</h5>
                        <p class="text-muted">Tài liệu học tập miễn phí và voucher giảm giá cho khóa học chính thức</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-3">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-info"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Gặp Gỡ Bạn Học</h5>
                        <p class="text-muted">Kết nối với những người cùng đam mê học tiếng Đức</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-4">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-clock fa-3x text-secondary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Linh Hoạt Thời Gian</h5>
                        <p class="text-muted">Nhiều khung giờ học thử để bạn lựa chọn phù hợp với lịch trình</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-5">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-handshake fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Không Ràng Buộc</h5>
                        <p class="text-muted">Hoàn toàn miễn phí, không có bất kỳ ràng buộc hay cam kết nào</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trial Schedule -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">LỊCH HỌC THỬ</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Các buổi học thử sắp diễn ra trong tuần</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card trial-schedule-card animate-on-scroll">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-calendar-day me-2"></i>Buổi Sáng
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="schedule-item mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">Thứ 2 - Cơ Bản A1</h6>
                                    <small class="text-muted">9:00 - 10:30</small>
                                </div>
                                <span class="badge bg-success">Còn chỗ</span>
                            </div>
                        </div>
                        <div class="schedule-item mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">Thứ 4 - Trung Cấp B1</h6>
                                    <small class="text-muted">9:00 - 10:30</small>
                                </div>
                                <span class="badge bg-warning">Sắp đầy</span>
                            </div>
                        </div>
                        <div class="schedule-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">Thứ 6 - Nâng Cao C1</h6>
                                    <small class="text-muted">9:00 - 10:30</small>
                                </div>
                                <span class="badge bg-success">Còn chỗ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card trial-schedule-card animate-on-scroll animate-delay-1">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-calendar-day me-2"></i>Buổi Tối
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="schedule-item mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">Thứ 3 - Cơ Bản A2</h6>
                                    <small class="text-muted">19:00 - 20:30</small>
                                </div>
                                <span class="badge bg-success">Còn chỗ</span>
                            </div>
                        </div>
                        <div class="schedule-item mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">Thứ 5 - Trung Cấp B2</h6>
                                    <small class="text-muted">19:00 - 20:30</small>
                                </div>
                                <span class="badge bg-success">Còn chỗ</span>
                            </div>
                        </div>
                        <div class="schedule-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">Thứ 7 - Business German</h6>
                                    <small class="text-muted">14:00 - 15:30</small>
                                </div>
                                <span class="badge bg-warning">Sắp đầy</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Registration Form -->
<section class="py-5" id="trial-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-primary mb-3">
                                <i class="fas fa-graduation-cap me-2"></i>ĐĂNG KÝ HỌC THỬ MIỄN PHÍ
                            </h3>
                            <p class="text-muted">Điền thông tin để nhận tư vấn và đăng ký buổi học thử phù hợp</p>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <form action="{{ route('contact.submit') }}" method="POST" class="trial-form">
                            @csrf
                            <input type="hidden" name="form_type" value="trial">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Họ và tên *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Số điện thoại *</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="tel" class="form-control" id="phone" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="level" class="form-label">Trình độ hiện tại</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-level-up-alt"></i></span>
                                        <select class="form-select" id="level" name="level">
                                            <option value="">Chọn trình độ</option>
                                            <option value="Chưa học">Chưa học tiếng Đức</option>
                                            <option value="A1">A1 - Sơ cấp</option>
                                            <option value="A2">A2 - Cơ bản</option>
                                            <option value="B1">B1 - Trung cấp</option>
                                            <option value="B2">B2 - Trung cấp cao</option>
                                            <option value="C1">C1 - Nâng cao</option>
                                            <option value="C2">C2 - Thành thạo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="program" class="form-label">Chương trình quan tâm *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                    <select class="form-select" id="program" name="program" required>
                                        <option value="">Chọn chương trình</option>
                                        <option value="IT">IT & Công nghệ</option>
                                        <option value="Healthcare">Y tế & Chăm sóc</option>
                                        <option value="Engineering">Kỹ thuật & Cơ khí</option>
                                        <option value="Hospitality">Khách sạn & Ẩm thực</option>
                                        <option value="Business">Kinh doanh & Quản lý</option>
                                        <option value="Other">Ngành khác</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="schedule" class="form-label">Thời gian mong muốn</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    <select class="form-select" id="schedule" name="schedule">
                                        <option value="">Chọn thời gian</option>
                                        <option value="Sáng">Buổi sáng (9:00 - 12:00)</option>
                                        <option value="Chiều">Buổi chiều (14:00 - 17:00)</option>
                                        <option value="Tối">Buổi tối (18:00 - 21:00)</option>
                                        <option value="Cuối tuần">Cuối tuần</option>
                                        <option value="Linh hoạt">Linh hoạt</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="message" class="form-label">Ghi chú thêm</label>
                                <textarea class="form-control" id="message" name="message" rows="3" 
                                          placeholder="Mục tiêu học tập, thời gian mong muốn, câu hỏi khác..."></textarea>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg btn-liquid px-5">
                                    <i class="fas fa-paper-plane me-2"></i>ĐĂNG KÝ HỌC THỬ MIỄN PHÍ
                                </button>
                                <p class="text-muted mt-3 small">
                                    <i class="fas fa-shield-alt me-1"></i>Thông tin của bạn được bảo mật tuyệt đối
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">CÂU HỎI THƯỜNG GẶP</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những thắc mắc phổ biến về buổi học thử</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item animate-on-scroll">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Buổi học thử có thực sự miễn phí không?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Có, buổi học thử hoàn toàn miễn phí. Bạn không cần thanh toán bất kỳ khoản phí nào và không có ràng buộc gì sau buổi học thử.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item animate-on-scroll animate-delay-1">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Tôi cần chuẩn bị gì cho buổi học thử?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Bạn chỉ cần mang theo tinh thần học hỏi và một cuốn sổ ghi chép. Trung tâm sẽ cung cấp tài liệu và dụng cụ học tập cần thiết.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item animate-on-scroll animate-delay-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Buổi học thử kéo dài bao lâu?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Mỗi buổi học thử kéo dài 90 phút, bao gồm 60 phút học thực tế và 30 phút tư vấn, đánh giá trình độ.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item animate-on-scroll animate-delay-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Tôi có thể học thử nhiều lần không?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Mỗi học viên được tham gia học thử 1 lần cho mỗi cấp độ. Bạn có thể học thử các cấp độ khác nhau để tìm lớp phù hợp nhất.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .trial-schedule-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .trial-schedule-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .schedule-item {
        padding: 15px;
        border-radius: 10px;
        background: #f8f9fa;
        border-left: 4px solid #007bff;
    }
    
    .trial-form .input-group-text {
        background: var(--primary-color);
        color: white;
        border: none;
    }
    
    .trial-form .form-control,
    .trial-form .form-select {
        border: 2px solid #e9ecef;
        border-left: none;
        transition: all 0.3s ease;
    }
    
    .trial-form .form-control:focus,
    .trial-form .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
    }
    
    .accordion-button {
        font-weight: 600;
    }
    
    .accordion-button:not(.collapsed) {
        background-color: var(--primary-color);
        color: white;
    }
</style>
@endpush