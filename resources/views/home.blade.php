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
                <div class="hero-slide" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-100">
                            <div class="col-lg-6">
                                <div class="hero-content">
                                    <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up">
                                        CHINH PHỤC TIẾNG ĐỨC CÙNG THANH CÚC
                                    </h1>
                                    <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1">
                                        Ra đời từ năm 2020, Trung tâm Tiếng Đức Thanh Cúc đã trở thành điểm đến tin cậy của hàng ngàn học viên. 
                                        Với đội ngũ giảng viên bản ngữ và phương pháp giảng dạy hiện đại.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3 animate-fade-in-up animate-delay-2">
                                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg btn-liquid">
                                            <i class="fas fa-play me-2"></i>Học Thử Miễn Phí
                                        </a>
                                        <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
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
                <div class="hero-slide" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-100">
                            <div class="col-lg-6">
                                <div class="hero-content">
                                    <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up">
                                        HỌC TẬP TẠI ĐỨC
                                    </h1>
                                    <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1">
                                        Trải nghiệm môi trường học tập hiện đại và chuyên nghiệp tại các trường đại học hàng đầu Đức. 
                                        Phát triển kỹ năng và kiến thức với chất lượng giáo dục đẳng cấp thế giới.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3 animate-fade-in-up animate-delay-2">
                                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg btn-liquid">
                                            <i class="fas fa-graduation-cap me-2"></i>Tư Vấn Du Học
                                        </a>
                                        <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">
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
                <div class="hero-slide" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-100">
                            <div class="col-lg-6">
                                <div class="hero-content">
                                    <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up">
                                        TỐT NGHIỆP THÀNH CÔNG
                                    </h1>
                                    <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1">
                                        Nhận bằng cấp được công nhận quốc tế và mở ra cơ hội nghề nghiệp rộng lớn. 
                                        95% học viên của chúng tôi đã thành công trong hành trình du học và làm việc tại Đức.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3 animate-fade-in-up animate-delay-2">
                                        <a href="{{ route('results') }}" class="btn btn-light btn-lg btn-liquid">
                                            <i class="fas fa-trophy me-2"></i>Xem Kết Quả
                                        </a>
                                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
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

<!-- Courses Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">KHÓA HỌC TIẾNG ĐỨC</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Lộ trình học tập toàn diện từ cơ bản đến nâng cao theo khung CEFR</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/courses/german-a1a2-icon.svg') }}" 
                                 alt="German A1-A2" class="rounded animate-on-scroll" width="80" height="80">
                        </div>
                        <h5 class="fw-bold mb-3">Cơ Bản A1-A2</h5>
                        <p class="text-muted mb-3">Khóa học dành cho người mới bắt đầu<br>Thời gian: 6-8 tháng</p>
                        <a href="{{ route('courses.foundation') }}" class="btn btn-primary btn-morph">Xem thêm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/courses/german-b1b2-icon.svg') }}" 
                                 alt="German B1-B2" class="rounded animate-on-scroll animate-delay-1" width="80" height="80">
                        </div>
                        <h5 class="fw-bold mb-3">Trung Cấp B1-B2</h5>
                        <p class="text-muted mb-3">Phát triển kỹ năng giao tiếp<br>Thời gian: 8-10 tháng</p>
                        <a href="{{ route('courses.intermediate') }}" class="btn btn-primary btn-morph">Xem thêm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/courses/german-c1c2-icon.svg') }}" 
                                 alt="German C1-C2" class="rounded animate-on-scroll animate-delay-2" width="80" height="80">
                        </div>
                        <h5 class="fw-bold mb-3">Nâng Cao C1-C2</h5>
                        <p class="text-muted mb-3">Thành thạo như người bản ngữ<br>Thời gian: 10-12 tháng</p>
                        <a href="{{ route('courses.advanced') }}" class="btn btn-primary btn-morph">Xem thêm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/courses/german-business-icon.svg') }}" 
                                 alt="German Business" class="rounded animate-on-scroll animate-delay-3" width="80" height="80">
                        </div>
                        <h5 class="fw-bold mb-3">Tiếng Đức Thương Mại</h5>
                        <p class="text-muted mb-3">Chuyên ngành kinh doanh<br>Thời gian: 4-6 tháng</p>
                        <a href="{{ route('courses.business') }}" class="btn btn-primary btn-morph">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Teachers Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">ĐỘI NGŨ GIẢNG VIÊN</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Giảng viên bản ngữ Đức với kinh nghiệm giảng dạy chuyên nghiệp</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="teacher-card card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/teachers/teacher-1.svg') }}" 
                                 alt="Herr Schmidt" class="rounded-circle" width="80" height="80">
                        </div>
                        <h6 class="fw-bold text-uppercase mb-2">Herr Schmidt</h6>
                        <p class="text-muted small mb-2">Giảng viên bản ngữ</p>
                        <span class="course-badge">Goethe Institut</span>
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
                        <h6 class="fw-bold text-uppercase mb-2">Frau Müller</h6>
                        <p class="text-muted small mb-2">Giảng viên bản ngữ</p>
                        <span class="course-badge">TestDaF</span>
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
                        <h6 class="fw-bold text-uppercase mb-2">Herr Weber</h6>
                        <p class="text-muted small mb-2">Giảng viên bản ngữ</p>
                        <span class="course-badge">DSH</span>
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
                        <h6 class="fw-bold text-uppercase mb-2">Frau Fischer</h6>
                        <p class="text-muted small mb-2">Giảng viên bản ngữ</p>
                        <span class="course-badge">Business German</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('teachers') }}" class="btn btn-outline-primary btn-lg">
                Xem tất cả giảng viên
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">HỌC VIÊN NÓI GÌ VỀ CHÚNG TÔI</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những chia sẻ chân thực từ học viên</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-primary"></i>
                        </div>
                        <p class="text-muted mb-4">
                            "Tôi đã học tiếng Đức tại Thanh Cúc được 1 năm và đã đạt chứng chỉ B2. 
                            Giảng viên rất tận tâm và phương pháp giảng dạy hiệu quả."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Nguyễn Văn A</h6>
                                <small class="text-muted">Học viên khóa B2</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-1">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-secondary"></i>
                        </div>
                        <p class="text-muted mb-4">
                            "Nhờ có Thanh Cúc mà tôi đã thành công trong kỳ thi Goethe C1 và hiện đang du học tại Đức. 
                            Cảm ơn các thầy cô rất nhiều!"
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Trần Thị B</h6>
                                <small class="text-muted">Du học sinh tại Đức</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-2">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-accent-color"></i>
                        </div>
                        <p class="text-muted mb-4">
                            "Môi trường học tập tại Thanh Cúc rất chuyên nghiệp. 
                            Tôi đã từ không biết gì về tiếng Đức đến có thể giao tiếp thành thạo."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Lê Văn C</h6>
                                <small class="text-muted">Học viên khóa A2</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
