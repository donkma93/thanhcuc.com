@extends('layouts.app')

@section('title', 'Lịch Khai Giảng - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up">
                    LỊCH KHAI GIẢNG
                </h1>
                <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1">
                    Các khóa học tiếng Đức sắp khai giảng tại Trung tâm Thanh Cúc
                </p>
                <div class="d-flex justify-content-center gap-3 animate-fade-in-up animate-delay-2">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg btn-liquid">
                        <i class="fas fa-calendar-plus me-2"></i>Đăng Ký Ngay
                    </a>
                    <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Tư Vấn Miễn Phí
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Current Month Schedule -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">THÁNG {{ date('m/Y') }}</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Các lớp học sắp khai giảng trong tháng này</p>
        </div>
        
        <div class="row">
            <!-- Khóa A1-A2 -->
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="card schedule-card h-100 animate-on-scroll">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-book me-2"></i>Cơ Bản A1-A2
                            </h5>
                            <span class="badge bg-light text-primary">Còn 5 chỗ</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="schedule-info mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar text-primary me-2"></i>
                                <span><strong>Khai giảng:</strong> {{ date('d/m/Y', strtotime('+5 days')) }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock text-primary me-2"></i>
                                <span><strong>Thời gian:</strong> 19:00 - 21:00</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar-week text-primary me-2"></i>
                                <span><strong>Lịch học:</strong> Thứ 2, 4, 6</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-hourglass-half text-primary me-2"></i>
                                <span><strong>Thời lượng:</strong> 6 tháng</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-users text-primary me-2"></i>
                                <span><strong>Sĩ số:</strong> 15 học viên</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-money-bill-wave text-primary me-2"></i>
                                <span><strong>Học phí:</strong> 3.500.000 VNĐ</span>
                            </div>
                        </div>
                        <div class="teacher-info bg-light p-3 rounded mb-3">
                            <h6 class="fw-bold mb-1">
                                <i class="fas fa-chalkboard-teacher text-secondary me-2"></i>Giảng viên
                            </h6>
                            <p class="mb-0 small">Herr Schmidt - Giảng viên bản ngữ Đức</p>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-primary w-100 btn-liquid">
                            <i class="fas fa-user-plus me-2"></i>Đăng Ký Lớp Này
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Khóa B1-B2 -->
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="card schedule-card h-100 animate-on-scroll animate-delay-1">
                    <div class="card-header bg-success text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-book-open me-2"></i>Trung Cấp B1-B2
                            </h5>
                            <span class="badge bg-light text-success">Còn 3 chỗ</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="schedule-info mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar text-success me-2"></i>
                                <span><strong>Khai giảng:</strong> {{ date('d/m/Y', strtotime('+8 days')) }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock text-success me-2"></i>
                                <span><strong>Thời gian:</strong> 18:30 - 20:30</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar-week text-success me-2"></i>
                                <span><strong>Lịch học:</strong> Thứ 3, 5, 7</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-hourglass-half text-success me-2"></i>
                                <span><strong>Thời lượng:</strong> 8 tháng</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-users text-success me-2"></i>
                                <span><strong>Sĩ số:</strong> 12 học viên</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-money-bill-wave text-success me-2"></i>
                                <span><strong>Học phí:</strong> 4.200.000 VNĐ</span>
                            </div>
                        </div>
                        <div class="teacher-info bg-light p-3 rounded mb-3">
                            <h6 class="fw-bold mb-1">
                                <i class="fas fa-chalkboard-teacher text-secondary me-2"></i>Giảng viên
                            </h6>
                            <p class="mb-0 small">Frau Müller - Chuyên gia TestDaF</p>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-success w-100 btn-liquid">
                            <i class="fas fa-user-plus me-2"></i>Đăng Ký Lớp Này
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Khóa C1-C2 -->
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="card schedule-card h-100 animate-on-scroll animate-delay-2">
                    <div class="card-header bg-warning text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-graduation-cap me-2"></i>Nâng Cao C1-C2
                            </h5>
                            <span class="badge bg-light text-warning">Còn 2 chỗ</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="schedule-info mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar text-warning me-2"></i>
                                <span><strong>Khai giảng:</strong> {{ date('d/m/Y', strtotime('+12 days')) }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock text-warning me-2"></i>
                                <span><strong>Thời gian:</strong> 19:30 - 21:30</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar-week text-warning me-2"></i>
                                <span><strong>Lịch học:</strong> Thứ 2, 4, 6</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-hourglass-half text-warning me-2"></i>
                                <span><strong>Thời lượng:</strong> 10 tháng</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-users text-warning me-2"></i>
                                <span><strong>Sĩ số:</strong> 10 học viên</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-money-bill-wave text-warning me-2"></i>
                                <span><strong>Học phí:</strong> 5.500.000 VNĐ</span>
                            </div>
                        </div>
                        <div class="teacher-info bg-light p-3 rounded mb-3">
                            <h6 class="fw-bold mb-1">
                                <i class="fas fa-chalkboard-teacher text-secondary me-2"></i>Giảng viên
                            </h6>
                            <p class="mb-0 small">Herr Weber - Chuyên gia Goethe C1/C2</p>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-warning w-100 btn-liquid text-white">
                            <i class="fas fa-user-plus me-2"></i>Đăng Ký Lớp Này
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Khóa Business German -->
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="card schedule-card h-100 animate-on-scroll animate-delay-3">
                    <div class="card-header bg-info text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-briefcase me-2"></i>Tiếng Đức Thương Mại
                            </h5>
                            <span class="badge bg-light text-info">Còn 8 chỗ</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="schedule-info mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar text-info me-2"></i>
                                <span><strong>Khai giảng:</strong> {{ date('d/m/Y', strtotime('+15 days')) }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock text-info me-2"></i>
                                <span><strong>Thời gian:</strong> 18:00 - 20:00</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar-week text-info me-2"></i>
                                <span><strong>Lịch học:</strong> Thứ 3, 5</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-hourglass-half text-info me-2"></i>
                                <span><strong>Thời lượng:</strong> 4 tháng</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-users text-info me-2"></i>
                                <span><strong>Sĩ số:</strong> 15 học viên</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-money-bill-wave text-info me-2"></i>
                                <span><strong>Học phí:</strong> 2.800.000 VNĐ</span>
                            </div>
                        </div>
                        <div class="teacher-info bg-light p-3 rounded mb-3">
                            <h6 class="fw-bold mb-1">
                                <i class="fas fa-chalkboard-teacher text-secondary me-2"></i>Giảng viên
                            </h6>
                            <p class="mb-0 small">Frau Fischer - Chuyên gia Business German</p>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-info w-100 btn-liquid text-white">
                            <i class="fas fa-user-plus me-2"></i>Đăng Ký Lớp Này
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Khóa Luyện Thi -->
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="card schedule-card h-100 animate-on-scroll animate-delay-4">
                    <div class="card-header bg-secondary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-certificate me-2"></i>Luyện Thi Chứng Chỉ
                            </h5>
                            <span class="badge bg-light text-secondary">Còn 6 chỗ</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="schedule-info mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar text-secondary me-2"></i>
                                <span><strong>Khai giảng:</strong> {{ date('d/m/Y', strtotime('+18 days')) }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock text-secondary me-2"></i>
                                <span><strong>Thời gian:</strong> 14:00 - 16:00</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar-week text-secondary me-2"></i>
                                <span><strong>Lịch học:</strong> Thứ 7, Chủ nhật</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-hourglass-half text-secondary me-2"></i>
                                <span><strong>Thời lượng:</strong> 3 tháng</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-users text-secondary me-2"></i>
                                <span><strong>Sĩ số:</strong> 12 học viên</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-money-bill-wave text-secondary me-2"></i>
                                <span><strong>Học phí:</strong> 2.200.000 VNĐ</span>
                            </div>
                        </div>
                        <div class="teacher-info bg-light p-3 rounded mb-3">
                            <h6 class="fw-bold mb-1">
                                <i class="fas fa-chalkboard-teacher text-secondary me-2"></i>Giảng viên
                            </h6>
                            <p class="mb-0 small">Team giảng viên - Chuyên luyện thi</p>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-secondary w-100 btn-liquid">
                            <i class="fas fa-user-plus me-2"></i>Đăng Ký Lớp Này
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Khóa Online -->
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="card schedule-card h-100 animate-on-scroll animate-delay-5">
                    <div class="card-header bg-dark text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-laptop me-2"></i>Học Online A1-B2
                            </h5>
                            <span class="badge bg-light text-dark">Không giới hạn</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="schedule-info mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar text-dark me-2"></i>
                                <span><strong>Khai giảng:</strong> Linh hoạt</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock text-dark me-2"></i>
                                <span><strong>Thời gian:</strong> Tự chọn</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar-week text-dark me-2"></i>
                                <span><strong>Lịch học:</strong> Linh hoạt</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-hourglass-half text-dark me-2"></i>
                                <span><strong>Thời lượng:</strong> 6-12 tháng</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-users text-dark me-2"></i>
                                <span><strong>Hình thức:</strong> 1-1 hoặc nhóm nhỏ</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-money-bill-wave text-dark me-2"></i>
                                <span><strong>Học phí:</strong> Từ 2.500.000 VNĐ</span>
                            </div>
                        </div>
                        <div class="teacher-info bg-light p-3 rounded mb-3">
                            <h6 class="fw-bold mb-1">
                                <i class="fas fa-chalkboard-teacher text-secondary me-2"></i>Giảng viên
                            </h6>
                            <p class="mb-0 small">Giảng viên bản ngữ - Học online</p>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-dark w-100 btn-liquid">
                            <i class="fas fa-user-plus me-2"></i>Đăng Ký Lớp Này
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Next Month Preview -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">THÁNG TIẾP THEO</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Các khóa học dự kiến khai giảng tháng {{ date('m/Y', strtotime('+1 month')) }}</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-book fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold mb-2">Cơ Bản A1-A2</h5>
                        <p class="text-muted mb-3">Dự kiến: {{ date('d/m/Y', strtotime('+35 days')) }}</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary">Đăng Ký Sớm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm animate-on-scroll animate-delay-1">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-book-open fa-3x text-success mb-3"></i>
                        <h5 class="fw-bold mb-2">Trung Cấp B1-B2</h5>
                        <p class="text-muted mb-3">Dự kiến: {{ date('d/m/Y', strtotime('+40 days')) }}</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-success">Đăng Ký Sớm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm animate-on-scroll animate-delay-2">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-graduation-cap fa-3x text-warning mb-3"></i>
                        <h5 class="fw-bold mb-2">Nâng Cao C1-C2</h5>
                        <p class="text-muted mb-3">Dự kiến: {{ date('d/m/Y', strtotime('+45 days')) }}</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-warning">Đăng Ký Sớm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Registration Benefits -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">ƯU ĐÃI ĐĂNG KÝ SỚM</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những lợi ích khi đăng ký trước thời hạn</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center animate-on-scroll">
                    <div class="benefit-icon mb-3">
                        <i class="fas fa-percentage fa-3x text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Giảm 15% Học Phí</h5>
                    <p class="text-muted">Đăng ký trước 2 tuần</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center animate-on-scroll animate-delay-1">
                    <div class="benefit-icon mb-3">
                        <i class="fas fa-gift fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Tặng Tài Liệu</h5>
                    <p class="text-muted">Bộ sách giáo trình miễn phí</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center animate-on-scroll animate-delay-2">
                    <div class="benefit-icon mb-3">
                        <i class="fas fa-user-tie fa-3x text-info"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Tư Vấn 1-1</h5>
                    <p class="text-muted">Lộ trình học cá nhân hóa</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center animate-on-scroll animate-delay-3">
                    <div class="benefit-icon mb-3">
                        <i class="fas fa-clock fa-3x text-warning"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Học Bù Miễn Phí</h5>
                    <p class="text-muted">Không lo lỡ buổi học</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3 animate-fade-in-left">Sẵn sàng bắt đầu hành trình học tiếng Đức?</h3>
                <p class="mb-0 animate-fade-in-left animate-delay-1">
                    Đăng ký ngay hôm nay để được tư vấn lộ trình học phù hợp và nhận ưu đãi đặc biệt!
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3 btn-liquid animate-fade-in-right">
                    <i class="fas fa-calendar-plus me-2"></i>Đăng Ký Ngay
                </a>
                <a href="tel:0975186230" class="btn btn-outline-light btn-lg animate-fade-in-right animate-delay-1">
                    <i class="fas fa-phone me-2"></i>Gọi Ngay
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .schedule-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    
    .schedule-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .schedule-info {
        font-size: 14px;
    }
    
    .teacher-info {
        border-left: 4px solid #007bff;
    }
    
    .benefit-icon {
        transition: all 0.3s ease;
    }
    
    .benefit-icon:hover {
        transform: scale(1.1);
    }
    
    .badge {
        font-size: 0.75rem;
        padding: 0.5em 0.75em;
    }
    
    .card-header h5 {
        font-size: 1.1rem;
    }
</style>
@endpush