@extends('layouts.app')

@section('title', 'Kết Quả Học Viên - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up">
                    KẾT QUẢ HỌC VIÊN
                </h1>
                <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1">
                    Những thành tích xuất sắc của học viên Thanh Cúc trong hành trình chinh phục tiếng Đức
                </p>
                <div class="d-flex justify-content-center gap-3 animate-fade-in-up animate-delay-2">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg btn-liquid">
                        <i class="fas fa-graduation-cap me-2"></i>Đăng Ký Ngay
                    </a>
                    <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Tư Vấn Miễn Phí
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">THỐNG KÊ THÀNH TÍCH</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những con số ấn tượng từ học viên Thanh Cúc</p>
        </div>
        
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-trophy fa-3x text-warning"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-primary counter" data-target="95">0</h3>
                        <p class="text-muted">% Tỷ lệ đậu chứng chỉ</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-1">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-success"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-primary counter" data-target="2000">0</h3>
                        <p class="text-muted">Học viên đã tốt nghiệp</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-2">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-plane fa-3x text-info"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-primary counter" data-target="150">0</h3>
                        <p class="text-muted">Học viên du học thành công</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-3">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-briefcase fa-3x text-secondary"></i>
                        </div>
                        <h3 class="display-4 fw-bold text-primary counter" data-target="80">0</h3>
                        <p class="text-muted">% Có việc làm sau tốt nghiệp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">CÂU CHUYỆN THÀNH CÔNG</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những hành trình truyền cảm hứng từ học viên Thanh Cúc</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Nguyễn Minh Anh</h5>
                                <small class="text-muted">Goethe C1 - Du học Đức</small>
                            </div>
                        </div>
                        <p class="text-muted mb-3">
                            "Sau 18 tháng học tại Thanh Cúc, tôi đã đạt chứng chỉ Goethe C1 và hiện đang học thạc sĩ 
                            tại Đại học Technical University of Munich. Cảm ơn các thầy cô đã hỗ trợ tôi rất nhiều!"
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Goethe C1</span>
                            <small class="text-muted">2023</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-1">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Trần Văn Hùng</h5>
                                <small class="text-muted">TestDaF - Làm việc tại Đức</small>
                            </div>
                        </div>
                        <p class="text-muted mb-3">
                            "Tôi đã đạt TestDaF 4x4 và hiện đang làm kỹ sư tại một công ty lớn ở Berlin. 
                            Phương pháp giảng dạy của Thanh Cúc rất thực tế và hiệu quả."
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-info">TestDaF 4x4</span>
                            <small class="text-muted">2023</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-2">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Lê Thị Mai</h5>
                                <small class="text-muted">DSH - Học bác sĩ tại Đức</small>
                            </div>
                        </div>
                        <p class="text-muted mb-3">
                            "Từ A1 đến DSH chỉ trong 2 năm! Giờ tôi đang học y khoa tại Đại học Heidelberg. 
                            Cảm ơn Thanh Cúc đã giúp tôi thực hiện ước mơ."
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary">DSH-2</span>
                            <small class="text-muted">2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certificates Gallery Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">BẰNG CẤP & CHỨNG CHỈ</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những thành tích đáng tự hào của học viên</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card certificate-card h-100 animate-on-scroll">
                    <div class="card-body text-center p-4">
                        <div class="certificate-icon mb-3">
                            <i class="fas fa-certificate fa-4x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Goethe Institut</h5>
                        <p class="text-muted mb-3">Chứng chỉ tiếng Đức quốc tế được công nhận toàn cầu</p>
                        <div class="certificate-stats">
                            <span class="badge bg-success me-2">A1: 98%</span>
                            <span class="badge bg-success me-2">A2: 96%</span>
                            <span class="badge bg-success me-2">B1: 94%</span>
                            <span class="badge bg-success me-2">B2: 92%</span>
                            <span class="badge bg-success">C1: 89%</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card certificate-card h-100 animate-on-scroll animate-delay-1">
                    <div class="card-body text-center p-4">
                        <div class="certificate-icon mb-3">
                            <i class="fas fa-graduation-cap fa-4x text-info"></i>
                        </div>
                        <h5 class="fw-bold mb-2">TestDaF</h5>
                        <p class="text-muted mb-3">Kỳ thi tiếng Đức cho người nước ngoài muốn du học</p>
                        <div class="certificate-stats">
                            <span class="badge bg-info me-2">TDN 3: 85%</span>
                            <span class="badge bg-info me-2">TDN 4: 78%</span>
                            <span class="badge bg-info">TDN 5: 65%</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card certificate-card h-100 animate-on-scroll animate-delay-2">
                    <div class="card-body text-center p-4">
                        <div class="certificate-icon mb-3">
                            <i class="fas fa-university fa-4x text-secondary"></i>
                        </div>
                        <h5 class="fw-bold mb-2">DSH</h5>
                        <p class="text-muted mb-3">Kỳ thi năng lực tiếng Đức cho giáo dục đại học</p>
                        <div class="certificate-stats">
                            <span class="badge bg-secondary me-2">DSH-1: 82%</span>
                            <span class="badge bg-secondary me-2">DSH-2: 75%</span>
                            <span class="badge bg-secondary">DSH-3: 68%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3 animate-fade-in-left">Bạn cũng muốn có thành tích như vậy?</h3>
                <p class="mb-0 animate-fade-in-left animate-delay-1">
                    Hãy bắt đầu hành trình chinh phục tiếng Đức cùng Thanh Cúc ngay hôm nay!
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3 btn-liquid animate-fade-in-right">
                    <i class="fas fa-rocket me-2"></i>Đăng Ký Ngay
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
    .certificate-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .certificate-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .certificate-icon {
        transition: all 0.3s ease;
    }
    
    .certificate-card:hover .certificate-icon {
        transform: scale(1.1);
    }
    
    .certificate-stats .badge {
        font-size: 0.75rem;
        margin-bottom: 5px;
    }
    
    .counter {
        font-family: 'Arial', sans-serif;
    }
</style>
@endpush