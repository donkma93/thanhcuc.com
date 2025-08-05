@extends('layouts.app')

@section('title', 'Trung Tâm Tiếng Đức Thanh Cúc - Học Tiếng Đức Chuyên Nghiệp')

@section('content')
<!-- Hero Slider Section -->
<section class="hero-slider-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        
        <div class="carousel-inner">
            <!-- Slide 1: Du học Đức -->
            <div class="carousel-item active">
                <div class="hero-slide" style="background: linear-gradient(135deg, #F9D200 0%, #F57F25 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-100">
                            <div class="col-lg-6">
                                <div class="hero-content">
                                    <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up" style="text-shadow: 2px 2px 4px rgba(1, 88, 98, 0.3);">
                                        DU HỌC NGHỀ ĐỨC - TƯƠNG LAI RỘNG MỞ
                                    </h1>
                                    <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1" style="text-shadow: 1px 1px 2px rgba(1, 88, 98, 0.3);">
                                        Thanh Cúc - Đơn vị tư vấn du học nghề Đức uy tín từ năm 2020. Chương trình Ausbildung với mức lương hấp dẫn, 
                                        cơ hội định cư và phát triển sự nghiệp tại châu Âu.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3 animate-fade-in-up animate-delay-2">
                                        <a href="{{ route('contact') }}" class="btn btn-dark btn-lg btn-liquid" style="background: #015862; border-color: #015862;">
                                            <i class="fas fa-graduation-cap me-2"></i>Tư Vấn Miễn Phí
                                        </a>
                                        <a href="tel:0975186230" class="btn btn-outline-light btn-lg" style="border-color: #015862; color: #015862; background: rgba(255,255,255,0.9);">
                                            <i class="fas fa-phone me-2"></i>0975.186.230
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <img src="{{ asset('images/hero/study-abroad-1.svg') }}" 
                                     alt="Du học Đức - Cơ hội vàng" class="img-fluid animate-float">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2: Học tập tại Đức -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(135deg, #CADD2D 0%, #3EB850 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-100">
                            <div class="col-lg-6">
                                <div class="hero-content">
                                    <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up" style="text-shadow: 2px 2px 4px rgba(1, 88, 98, 0.3);">
                                        AUSBILDUNG - HỌC NGHỀ CÓ LƯƠNG
                                    </h1>
                                    <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1" style="text-shadow: 1px 1px 2px rgba(1, 88, 98, 0.3);">
                                        Chương trình đào tạo nghề 3 năm tại Đức với mức lương từ 515-1.500€/tháng. 
                                        Kết hợp lý thuyết và thực hành, đảm bảo việc làm sau tốt nghiệp với mức lương cao.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3 animate-fade-in-up animate-delay-2">
                                        <a href="{{ route('contact') }}" class="btn btn-dark btn-lg btn-liquid" style="background: #015862; border-color: #015862;">
                                            <i class="fas fa-euro-sign me-2"></i>Xem Mức Lương
                                        </a>
                                        <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg" style="border-color: #015862; color: #015862; background: rgba(255,255,255,0.9);">
                                            <i class="fas fa-info-circle me-2"></i>Tìm Hiểu Thêm
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <img src="{{ asset('images/hero/study-abroad-2.svg') }}" 
                                     alt="Học tập tại Đức" class="img-fluid animate-float">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3: Tốt nghiệp thành công -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(135deg, #3EB850 0%, #015862 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-100">
                            <div class="col-lg-6">
                                <div class="hero-content">
                                    <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
                                        ĐỊNH CƯ & PHÁT TRIỂN SỰ NGHIỆP
                                    </h1>
                                    <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1" style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">
                                        Sau khi hoàn thành Ausbildung, bạn có thể xin thường trú, mang gia đình sang Đức. 
                                        95% học viên của chúng tôi đã thành công định cư và có cuộc sống ổn định tại Đức.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3 animate-fade-in-up animate-delay-2">
                                        <a href="{{ route('results') }}" class="btn btn-warning btn-lg btn-liquid" style="background: #F9D200; border-color: #F9D200; color: #015862; font-weight: bold;">
                                            <i class="fas fa-home me-2"></i>Câu Chuyện Thành Công
                                        </a>
                                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg" style="border-color: #F9D200; color: #F9D200; background: rgba(249, 210, 0, 0.1);">
                                            <i class="fas fa-rocket me-2"></i>Bắt Đầu Ngay
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <img src="{{ asset('images/hero/study-abroad-3.svg') }}" 
                                     alt="Tốt nghiệp thành công" class="img-fluid animate-float">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</section>

<!-- Stats Section -->
<section class="stats-section py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll">
                    <h3 class="display-4 fw-bold text-primary counter" data-target="2000">0</h3>
                    <p class="text-muted">Học Viên Đã Tốt Nghiệp</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll animate-delay-1">
                    <h3 class="display-4 fw-bold text-secondary counter" data-target="25">0</h3>
                    <p class="text-muted">Giảng Viên Bản Ngữ</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll animate-delay-2">
                    <h3 class="display-4 fw-bold text-accent-color counter" data-target="95">0</h3>
                    <p class="text-muted">% Học Viên Đạt Chứng Chỉ</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll animate-delay-3">
                    <h3 class="display-4 fw-bold text-success counter" data-target="4">0</h3>
                    <p class="text-muted">Năm Kinh Nghiệm</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">TẠI SAO CHỌN THANH CÚC?</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những ưu điểm vượt trội giúp bạn học tiếng Đức hiệu quả</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Giảng Viên Bản Ngữ</h5>
                        <p class="text-muted">Đội ngũ giảng viên người Đức với kinh nghiệm giảng dạy chuyên nghiệp</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-1">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-certificate fa-3x text-secondary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Chứng Chỉ Quốc Tế</h5>
                        <p class="text-muted">Luyện thi các chứng chỉ Goethe, TestDaF, DSH với tỷ lệ đậu cao</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-2">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-laptop fa-3x text-accent-color"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Học Online & Offline</h5>
                        <p class="text-muted">Linh hoạt hình thức học tập phù hợp với lịch trình của bạn</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-3">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-clock fa-3x text-success"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Lịch Học Linh Hoạt</h5>
                        <p class="text-muted">Nhiều khung giờ học từ sáng đến tối, phù hợp với mọi đối tượng</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-4">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-handshake fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Hỗ Trợ Du Học</h5>
                        <p class="text-muted">Tư vấn và hỗ trợ thủ tục du học Đức miễn phí cho học viên</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-5">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-star fa-3x text-secondary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Chất Lượng Đảm Bảo</h5>
                        <p class="text-muted">Cam kết chất lượng với chính sách hoàn tiền nếu không hài lòng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ausbildung Programs Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">CHƯƠNG TRÌNH AUSBILDUNG PHỔ BIẾN</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Các ngành nghề được yêu thích nhất với mức lương hấp dẫn tại Đức</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-laptop-code fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">IT & Công Nghệ</h5>
                        <p class="text-muted mb-3">Lập trình viên, Quản trị mạng<br>Lương: 1.200-1.500€/tháng</p>
                        <a href="{{ route('schedule') }}" class="btn btn-primary btn-morph">Tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-user-nurse fa-3x text-success"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Y Tế & Chăm Sóc</h5>
                        <p class="text-muted mb-3">Điều dưỡng, Chăm sóc người già<br>Lương: 1.000-1.300€/tháng</p>
                        <a href="{{ route('schedule') }}" class="btn btn-primary btn-morph">Tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-wrench fa-3x text-warning"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Kỹ Thuật & Cơ Khí</h5>
                        <p class="text-muted mb-3">Thợ máy, Kỹ thuật ô tô<br>Lương: 1.100-1.400€/tháng</p>
                        <a href="{{ route('schedule') }}" class="btn btn-primary btn-morph">Tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-utensils fa-3x text-danger"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Khách Sạn & Ẩm Thực</h5>
                        <p class="text-muted mb-3">Đầu bếp, Quản lý khách sạn<br>Lương: 900-1.200€/tháng</p>
                        <a href="{{ route('schedule') }}" class="btn btn-primary btn-morph">Tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Consultants Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">ĐỘI NGŨ TƯ VẤN VIÊN</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Tư vấn viên chuyên nghiệp với kinh nghiệm du học và làm việc tại Đức</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="teacher-card card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/teachers/teacher-1.svg') }}" 
                                 alt="Herr Schmidt" class="rounded-circle" width="80" height="80">
                        </div>
                        <h6 class="fw-bold text-uppercase mb-2">Anh Minh</h6>
                        <p class="text-muted small mb-2">Tư vấn trưởng</p>
                        <span class="course-badge">5 năm kinh nghiệm</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="teacher-card card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/teachers/teacher-2.svg') }}" 
                                 alt="Frau Müller" class="rounded-circle" width="80" height="80">
                        </div>
                        <h6 class="fw-bold text-uppercase mb-2">Chị Lan</h6>
                        <p class="text-muted small mb-2">Chuyên viên visa</p>
                        <span class="course-badge">Du học sinh Đức</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="teacher-card card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                        </div>
                        <h6 class="fw-bold text-uppercase mb-2">Anh Tuấn</h6>
                        <p class="text-muted small mb-2">Chuyên viên Ausbildung</p>
                        <span class="course-badge">Cựu du học sinh</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="teacher-card card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                        </div>
                        <h6 class="fw-bold text-uppercase mb-2">Chị Hương</h6>
                        <p class="text-muted small mb-2">Chuyên viên hỗ trợ</p>
                        <span class="course-badge">Định cư Đức</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('about') }}" class="btn btn-outline-primary btn-lg">
                Tìm hiểu về đội ngũ
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Slider Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">HỌC VIÊN NÓI GÌ VỀ CHÚNG TÔI</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những chia sẻ chân thực từ các bạn đã thành công du học nghề Đức</p>
        </div>
        
        <!-- Testimonials Carousel -->
        <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="2"></button>
            </div>
            
            <div class="carousel-inner">
                <!-- Slide 1: 3 testimonials -->
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face&auto=format" 
                                         alt="Nguyễn Minh Anh" class="rounded-circle testimonial-avatar mb-3" 
                                         width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-primary opacity-50"></i>
                                    </div>
                                    <p class="text-muted mb-3 fst-italic">
                                        "Nhờ Thanh Cúc, tôi đã thành công xin được Ausbildung IT tại Munich với lương 1.400€/tháng."
                                    </p>
                                    <h6 class="fw-bold text-primary mb-1">Nguyễn Minh Anh</h6>
                                    <small class="text-muted">IT - Munich, Đức</small>
                                    <div class="mt-2">
                                        <span class="badge bg-success">Thành công 2023</span>
                                    </div>
                                    <div class="text-warning mt-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face&auto=format" 
                                         alt="Trần Thị Lan" class="rounded-circle testimonial-avatar mb-3" 
                                         width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-secondary opacity-50"></i>
                                    </div>
                                    <p class="text-muted mb-3 fst-italic">
                                        "Hoàn thành Ausbildung điều dưỡng tại Berlin, lương 1.200€/tháng và đã mang gia đình định cư."
                                    </p>
                                    <h6 class="fw-bold text-primary mb-1">Trần Thị Lan</h6>
                                    <small class="text-muted">Điều dưỡng - Berlin, Đức</small>
                                    <div class="mt-2">
                                        <span class="badge bg-info">Định cư thành công</span>
                                    </div>
                                    <div class="text-warning mt-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face&auto=format" 
                                         alt="Lê Văn Hùng" class="rounded-circle testimonial-avatar mb-3" 
                                         width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-warning opacity-50"></i>
                                    </div>
                                    <p class="text-muted mb-3 fst-italic">
                                        "Từ kỹ sư cơ khí VN, giờ làm tại nhà máy ô tô Stuttgart với lương 1.500€/tháng."
                                    </p>
                                    <h6 class="fw-bold text-primary mb-1">Lê Văn Hùng</h6>
                                    <small class="text-muted">Kỹ thuật ô tô - Stuttgart, Đức</small>
                                    <div class="mt-2">
                                        <span class="badge bg-warning">Lương cao nhất</span>
                                    </div>
                                    <div class="text-warning mt-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2: 3 more testimonials -->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face&auto=format" 
                                         alt="Phạm Thị Mai" class="rounded-circle testimonial-avatar mb-3" 
                                         width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-success opacity-50"></i>
                                    </div>
                                    <p class="text-muted mb-3 fst-italic">
                                        "Ausbildung khách sạn tại Hamburg đã mở ra cơ hội mới. Hiện quản lý khách sạn 4 sao với lương 1.300€/tháng."
                                    </p>
                                    <h6 class="fw-bold text-primary mb-1">Phạm Thị Mai</h6>
                                    <small class="text-muted">Quản lý khách sạn - Hamburg, Đức</small>
                                    <div class="mt-2">
                                        <span class="badge bg-primary">Thăng tiến nhanh</span>
                                    </div>
                                    <div class="text-warning mt-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&crop=face&auto=format" 
                                         alt="Đỗ Minh Tuấn" class="rounded-circle testimonial-avatar mb-3" 
                                         width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-danger opacity-50"></i>
                                    </div>
                                    <p class="text-muted mb-3 fst-italic">
                                        "Từ đầu bếp VN, giờ làm tại nhà hàng Michelin star ở Frankfurt. Ước mơ đã thành hiện thực."
                                    </p>
                                    <h6 class="fw-bold text-primary mb-1">Đỗ Minh Tuấn</h6>
                                    <small class="text-muted">Đầu bếp - Frankfurt, Đức</small>
                                    <div class="mt-2">
                                        <span class="badge bg-danger">Michelin Star</span>
                                    </div>
                                    <div class="text-warning mt-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face&auto=format" 
                                         alt="Nguyễn Thị Hoa" class="rounded-circle testimonial-avatar mb-3" 
                                         width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-info opacity-50"></i>
                                    </div>
                                    <p class="text-muted mb-3 fst-italic">
                                        "Ausbildung chăm sóc người già tại Cologne. Công việc ý nghĩa với lương 1.100€/tháng và được tôn trọng."
                                    </p>
                                    <h6 class="fw-bold text-primary mb-1">Nguyễn Thị Hoa</h6>
                                    <small class="text-muted">Chăm sóc người già - Cologne, Đức</small>
                                    <div class="mt-2">
                                        <span class="badge bg-info">Công việc ý nghĩa</span>
                                    </div>
                                    <div class="text-warning mt-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3: 3 final testimonials -->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                    <img src="https://images.unsplash.com/photo-1507591064344-4c6ce005b128?w=150&h=150&fit=crop&crop=face&auto=format" 
                                         alt="Võ Minh Đức" class="rounded-circle testimonial-avatar mb-3" 
                                         width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-dark opacity-50"></i>
                                    </div>
                                    <p class="text-muted mb-3 fst-italic">
                                        "Ausbildung thợ điện tại Dresden. Từ thợ phụ VN thành thợ chính với lương 1.350€/tháng."
                                    </p>
                                    <h6 class="fw-bold text-primary mb-1">Võ Minh Đức</h6>
                                    <small class="text-muted">Thợ điện - Dresden, Đức</small>
                                    <div class="mt-2">
                                        <span class="badge bg-dark">Thợ chính</span>
                                    </div>
                                    <div class="text-warning mt-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                    <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=150&h=150&fit=crop&crop=face&auto=format" 
                                         alt="Lý Thị Kim" class="rounded-circle testimonial-avatar mb-3" 
                                         width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-purple opacity-50"></i>
                                    </div>
                                    <p class="text-muted mb-3 fst-italic">
                                        "Ausbildung dược sĩ tại Düsseldorf. Từ sinh viên dược VN thành dược sĩ Đức với lương 1.250€/tháng."
                                    </p>
                                    <h6 class="fw-bold text-primary mb-1">Lý Thị Kim</h6>
                                    <small class="text-muted">Dược sĩ - Düsseldorf, Đức</small>
                                    <div class="mt-2">
                                        <span class="badge" style="background-color: #6f42c1;">Dược sĩ</span>
                                    </div>
                                    <div class="text-warning mt-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                    <img src="https://images.unsplash.com/photo-1463453091185-61582044d556?w=150&h=150&fit=crop&crop=face&auto=format" 
                                         alt="Hoàng Văn Nam" class="rounded-circle testimonial-avatar mb-3" 
                                         width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-success opacity-50"></i>
                                    </div>
                                    <p class="text-muted mb-3 fst-italic">
                                        "Ausbildung logistics tại Hannover. Quản lý kho hàng lớn với lương 1.200€/tháng và cơ hội thăng tiến."
                                    </p>
                                    <h6 class="fw-bold text-primary mb-1">Hoàng Văn Nam</h6>
                                    <small class="text-muted">Logistics - Hannover, Đức</small>
                                    <div class="mt-2">
                                        <span class="badge bg-success">Quản lý kho</span>
                                    </div>
                                    <div class="text-warning mt-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
                <div class="carousel-control-icon">
                    <i class="fas fa-chevron-left fa-2x text-primary"></i>
                </div>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
                <div class="carousel-control-icon">
                    <i class="fas fa-chevron-right fa-2x text-primary"></i>
                </div>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3 animate-fade-in-left">Sẵn sàng bắt đầu hành trình học tiếng Đức?</h3>
                <p class="mb-0 animate-fade-in-left animate-delay-1">Đăng ký tư vấn miễn phí ngay hôm nay để nhận lộ trình học phù hợp nhất!</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3 btn-liquid animate-fade-in-right">Học Thử Miễn Phí</a>
                <a href="tel:0975186230" class="btn btn-outline-light btn-lg animate-fade-in-right animate-delay-1">
                    <i class="fas fa-phone me-2"></i>Gọi Ngay
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Registration Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content registration-modal-content">
            <div class="modal-header border-0 text-center">
                <div class="w-100">
                    <div class="modal-icon mb-3">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4 class="modal-title fw-bold text-primary" id="registrationModalLabel">
                        🎓 CƠHỘI VÀNG - HỌC THỬ MIỄN PHÍ!
                    </h4>
                    <p class="text-muted mb-0">Đăng ký ngay để nhận ưu đãi đặc biệt</p>
                </div>
                <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 15px; right: 15px;"></button>
            </div>
            
            <div class="modal-body px-4 pb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="benefits-section">
                            <h5 class="fw-bold text-primary mb-3">
                                <i class="fas fa-star me-2"></i>Ưu đãi đặc biệt:
                            </h5>
                            <ul class="benefits-list">
                                <li><i class="fas fa-check-circle text-success me-2"></i>Học thử 1 buổi hoàn toàn MIỄN PHÍ</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i>Tặng tài liệu học tập trị giá 500K</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i>Giảm 20% học phí khóa đầu tiên</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i>Tư vấn lộ trình học 1-1 miễn phí</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i>Cam kết đầu ra hoặc học lại miễn phí</li>
                            </ul>
                            
                            <div class="urgency-banner mt-4">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-clock text-warning me-2"></i>
                                    <span class="fw-bold text-warning">Chỉ còn 3 ngày!</span>
                                </div>
                                <small class="text-muted">Ưu đãi có hạn, đăng ký ngay!</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="registration-form-section">
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
                            
                            <form action="{{ route('contact.submit') }}" method="POST" class="modal-registration-form">
                                @csrf
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" name="name" placeholder="Họ và tên *" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="tel" class="form-control" name="phone" placeholder="Số điện thoại *" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        <select class="form-select" name="course" required>
                                            <option value="">Chọn khóa học quan tâm *</option>
                                            <option value="A1-A2">Cơ bản A1-A2</option>
                                            <option value="B1-B2">Trung cấp B1-B2</option>
                                            <option value="C1-C2">Nâng cao C1-C2</option>
                                            <option value="Business">Tiếng Đức thương mại</option>
                                            <option value="Study-abroad">Tư vấn du học</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <textarea class="form-control" name="message" rows="2" placeholder="Ghi chú thêm (không bắt buộc)"></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100 btn-lg btn-pulse">
                                    <i class="fas fa-rocket me-2"></i>ĐĂNG KÝ NGAY - NHẬN ưu ĐÃI
                                </button>
                                
                                <div class="text-center mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-shield-alt me-1"></i>Thông tin được bảo mật 100%
                                    </small>
                                    <br>
                                    <small class="text-success fw-bold">
                                        <i class="fas fa-phone me-1"></i>Hotline: 0975.186.230
                                    </small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
