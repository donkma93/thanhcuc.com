@extends('layouts.app')

@section('title', 'Trung Tâm Tiếng Đức Thanh Cúc - Học Tiếng Đức & Luyện Thi Chứng Chỉ')

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

<!-- Featured Courses Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">KHÓA HỌC NỔI BẬT</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Khám phá các khóa học tiếng Đức chất lượng cao tại Thanh Cúc với phương pháp giảng dạy hiện đại</p>
        </div>
        
        @if($featuredCourses->count() > 0)
            <!-- Courses Carousel -->
            <div id="coursesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-indicators">
                    @for($i = 0; $i < ceil($featuredCourses->count() / 3); $i++)
                        <button type="button" data-bs-target="#coursesCarousel" data-bs-slide-to="{{ $i }}" 
                                class="{{ $i === 0 ? 'active' : '' }}"></button>
                    @endfor
                </div>
                
                <div class="carousel-inner">
                    @foreach($featuredCourses->chunk(3) as $chunkIndex => $coursesChunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach($coursesChunk as $course)
                                    <div class="col-lg-4 mb-4">
                                        <div class="card border-0 shadow course-card h-100">
                                            <div class="card-body p-4 text-center">
                                                <!-- Course Icon -->
                                                <div class="course-icon-wrapper mb-3">
                                                    @php
                                                        $courseIcons = [
                                                            'A1-A2' => ['icon' => 'fas fa-seedling', 'color' => '#20c997'],
                                                            'B1-B2' => ['icon' => 'fas fa-chart-line', 'color' => '#fd7e14'],
                                                            'C1-C2' => ['icon' => 'fas fa-crown', 'color' => '#dc3545'],
                                                            'Giao tiếp' => ['icon' => 'fas fa-comments', 'color' => '#ffc107'],
                                                            'Chuyên ngành' => ['icon' => 'fas fa-briefcase', 'color' => '#6c757d'],
                                                            'Luyện thi' => ['icon' => 'fas fa-graduation-cap', 'color' => '#e83e8c']
                                                        ];
                                                        $iconData = $courseIcons[$course->category] ?? ['icon' => 'fas fa-book', 'color' => '#007bff'];
                                                    @endphp
                                                    <i class="{{ $iconData['icon'] }} fa-3x" style="color: {{ $iconData['color'] }};"></i>
                                                </div>
                                                
                                                <!-- Course Title -->
                                                <h5 class="fw-bold text-primary mb-3">{{ $course->name }}</h5>
                                                
                                                <!-- Course Description -->
                                                @if($course->short_description)
                                                    <p class="text-muted mb-3 fst-italic">
                                                        "{{ Str::limit($course->short_description, 100) }}"
                                                    </p>
                                                @endif
                                                
                                                <!-- Course Info -->
                                                <div class="course-info mb-3">
                                                    <div class="row text-center">
                                                        <div class="col-6">
                                                            <div class="info-item">
                                                                <i class="fas fa-layer-group text-primary mb-1"></i>
                                                                <small class="text-muted d-block">Trình độ</small>
                                                                <strong class="text-dark">{{ $course->level ?? $course->category }}</strong>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="info-item">
                                                                <i class="fas fa-clock text-info mb-1"></i>
                                                                <small class="text-muted d-block">Thời lượng</small>
                                                                <strong class="text-info">{{ $course->duration_hours }}h</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Course Features -->
                                                @if($course->features && is_array($course->features))
                                                    <div class="mb-3">
                                                        @foreach(array_slice($course->features, 0, 2) as $feature)
                                                            <span class="badge bg-light text-dark me-1 mb-1">
                                                                <i class="fas fa-check text-success me-1"></i>
                                                                {{ $feature }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                
                                                <!-- Target Score Badge -->
                                                @if($course->target_score)
                                                    <div class="mb-3">
                                                        <span class="badge bg-success">
                                                            <i class="fas fa-target me-1"></i>
                                                            Mục tiêu: {{ $course->target_score }}
                                                        </span>
                                                    </div>
                                                @endif
                                                
                                                <!-- Action Button -->
                                                <div class="mt-3">
                                                    <a href="{{ route('schedule') }}" class="btn btn-primary">
                                                        <i class="fas fa-calendar-alt me-1"></i>
                                                        Đăng ký học thử
                                                    </a>
                                                </div>
                                                
                                                <!-- Rating Stars (for consistency with testimonials) -->
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
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#coursesCarousel" data-bs-slide="prev">
                    <div class="carousel-control-icon">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#coursesCarousel" data-bs-slide="next">
                    <div class="carousel-control-icon">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-5">
                <i class="fas fa-book fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">Chưa có khóa học nào</h4>
                <p class="text-muted">Các khóa học sẽ được cập nhật sớm</p>
            </div>
        @endif
    </div>
</section>

<!-- Teachers Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">ĐỘI NGŨ GIẢNG VIÊN ĐÀO TẠO</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Đội ngũ giảng viên chuyên nghiệp với kinh nghiệm giảng dạy tiếng Đức nhiều năm</p>
        </div>
        
        <!-- Teachers Carousel -->
        <div id="teachersCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#teachersCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#teachersCarousel" data-bs-slide-to="1"></button>
            </div>
            
            <div class="carousel-inner">
                <!-- Slide 1: First 4 teachers -->
                <div class="carousel-item active">
                    <div class="teachers-grid">
                        <div class="row">
                            <!-- Teacher 1 -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="teacher-card card h-100 text-center border-0 shadow">
                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <img src="{{ asset('images/teachers/teacher-1.svg') }}" 
                                                 alt="Thầy Minh" class="rounded-circle teacher-avatar" width="120" height="120">
                                        </div>
                                        <h5 class="fw-bold text-primary mb-2">Thầy Minh</h5>
                                        <p class="text-muted mb-2">Giảng viên tiếng Đức A1-A2</p>
                                        <div class="teacher-info mb-3">
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-graduation-cap text-primary me-2"></i>
                                                <span class="small">Cử nhân Ngôn ngữ Đức</span>
                                            </div>
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-clock text-success me-2"></i>
                                                <span class="small">5 năm kinh nghiệm</span>
                                            </div>
                                            <div class="info-badge">
                                                <i class="fas fa-users text-info me-2"></i>
                                                <span class="small">200+ học viên</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-light text-primary border">Chuyên A1-A2</span>
                                        
                                        <!-- Rating Stars (for consistency) -->
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
                            
                            <!-- Teacher 2 -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="teacher-card card h-100 text-center border-0 shadow">
                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <img src="{{ asset('images/teachers/teacher-2.svg') }}" 
                                                 alt="Cô Lan" class="rounded-circle teacher-avatar" width="120" height="120">
                                        </div>
                                        <h5 class="fw-bold text-primary mb-2">Cô Lan</h5>
                                        <p class="text-muted mb-2">Giảng viên tiếng Đức B1-B2</p>
                                        <div class="teacher-info mb-3">
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-graduation-cap text-primary me-2"></i>
                                                <span class="small">Thạc sĩ Đức học</span>
                                            </div>
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-clock text-success me-2"></i>
                                                <span class="small">7 năm kinh nghiệm</span>
                                            </div>
                                            <div class="info-badge">
                                                <i class="fas fa-users text-info me-2"></i>
                                                <span class="small">300+ học viên</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-light text-primary border">Chuyên B1-B2</span>
                                        
                                        <!-- Rating Stars (for consistency) -->
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
                            
                            <!-- Teacher 3 -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="teacher-card card h-100 text-center border-0 shadow">
                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <div class="teacher-avatar-placeholder bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                                 style="width: 120px; height: 120px;">
                                                <i class="fas fa-user fa-3x text-white"></i>
                                            </div>
                                        </div>
                                        <h5 class="fw-bold text-primary mb-2">Thầy Tuấn</h5>
                                        <p class="text-muted mb-2">Giảng viên tiếng Đức C1-C2</p>
                                        <div class="teacher-info mb-3">
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-certificate text-primary me-2"></i>
                                                <span class="small">Chứng chỉ Goethe C2</span>
                                            </div>
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-clock text-success me-2"></i>
                                                <span class="small">8 năm kinh nghiệm</span>
                                            </div>
                                            <div class="info-badge">
                                                <i class="fas fa-users text-info me-2"></i>
                                                <span class="small">150+ học viên</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-light text-primary border">Chuyên C1-C2</span>
                                        
                                        <!-- Rating Stars (for consistency) -->
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
                            
                            <!-- Teacher 4 -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="teacher-card card h-100 text-center border-0 shadow">
                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <div class="teacher-avatar-placeholder bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                                 style="width: 120px; height: 120px;">
                                                <i class="fas fa-user fa-3x text-white"></i>
                                            </div>
                                        </div>
                                        <h5 class="fw-bold text-primary mb-2">Cô Hương</h5>
                                        <p class="text-muted mb-2">Giảng viên tiếng Đức Giao tiếp</p>
                                        <div class="teacher-info mb-3">
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-graduation-cap text-primary me-2"></i>
                                                <span class="small">Cử nhân Sư phạm Đức</span>
                                            </div>
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-clock text-success me-2"></i>
                                                <span class="small">6 năm kinh nghiệm</span>
                                            </div>
                                            <div class="info-badge">
                                                <i class="fas fa-users text-info me-2"></i>
                                                <span class="small">250+ học viên</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-light text-primary border">Chuyên Giao tiếp</span>
                                        
                                        <!-- Rating Stars (for consistency) -->
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
                
                <!-- Slide 2: Additional 4 teachers -->
                <div class="carousel-item">
                    <div class="teachers-grid">
                        <div class="row">
                            <!-- Teacher 5 -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="teacher-card card h-100 text-center border-0 shadow">
                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <div class="teacher-avatar-placeholder bg-success rounded-circle d-inline-flex align-items-center justify-content-center" 
                                                 style="width: 120px; height: 120px;">
                                                <i class="fas fa-user fa-3x text-white"></i>
                                            </div>
                                        </div>
                                        <h5 class="fw-bold text-primary mb-2">Thầy Nam</h5>
                                        <p class="text-muted mb-2">Giảng viên tiếng Đức TestDaF</p>
                                        <div class="teacher-info mb-3">
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-certificate text-primary me-2"></i>
                                                <span class="small">Chứng chỉ TestDaF</span>
                                            </div>
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-clock text-success me-2"></i>
                                                <span class="small">4 năm kinh nghiệm</span>
                                            </div>
                                            <div class="info-badge">
                                                <i class="fas fa-users text-info me-2"></i>
                                                <span class="small">180+ học viên</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-light text-primary border">Chuyên TestDaF</span>
                                        
                                        <!-- Rating Stars (for consistency) -->
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
                            
                            <!-- Teacher 6 -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="teacher-card card h-100 text-center border-0 shadow">
                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <div class="teacher-avatar-placeholder bg-info rounded-circle d-inline-flex align-items-center justify-content-center" 
                                                 style="width: 120px; height: 120px;">
                                                <i class="fas fa-user fa-3x text-white"></i>
                                            </div>
                                        </div>
                                        <h5 class="fw-bold text-primary mb-2">Cô Mai</h5>
                                        <p class="text-muted mb-2">Giảng viên tiếng Đức Doanh nghiệp</p>
                                        <div class="teacher-info mb-3">
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-briefcase text-primary me-2"></i>
                                                <span class="small">MBA Đức</span>
                                            </div>
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-clock text-success me-2"></i>
                                                <span class="small">6 năm kinh nghiệm</span>
                                            </div>
                                            <div class="info-badge">
                                                <i class="fas fa-users text-info me-2"></i>
                                                <span class="small">120+ học viên</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-light text-primary border">Chuyên Business</span>
                                        
                                        <!-- Rating Stars (for consistency) -->
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
                            
                            <!-- Teacher 7 -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="teacher-card card h-100 text-center border-0 shadow">
                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <div class="teacher-avatar-placeholder bg-warning rounded-circle d-inline-flex align-items-center justify-content-center" 
                                                 style="width: 120px; height: 120px;">
                                                <i class="fas fa-user fa-3x text-white"></i>
                                            </div>
                                        </div>
                                        <h5 class="fw-bold text-primary mb-2">Thầy Đức</h5>
                                        <p class="text-muted mb-2">Giảng viên tiếng Đức Thiếu nhi</p>
                                        <div class="teacher-info mb-3">
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-child text-primary me-2"></i>
                                                <span class="small">Chuyên Thiếu nhi</span>
                                            </div>
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-clock text-success me-2"></i>
                                                <span class="small">3 năm kinh nghiệm</span>
                                            </div>
                                            <div class="info-badge">
                                                <i class="fas fa-users text-info me-2"></i>
                                                <span class="small">90+ học viên</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-light text-primary border">Chuyên Thiếu nhi</span>
                                        
                                        <!-- Rating Stars (for consistency) -->
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
                            
                            <!-- Teacher 8 -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="teacher-card card h-100 text-center border-0 shadow">
                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <div class="teacher-avatar-placeholder bg-danger rounded-circle d-inline-flex align-items-center justify-content-center" 
                                                 style="width: 120px; height: 120px;">
                                                <i class="fas fa-user fa-3x text-white"></i>
                                            </div>
                                        </div>
                                        <h5 class="fw-bold text-primary mb-2">Cô Linh</h5>
                                        <p class="text-muted mb-2">Giảng viên tiếng Đức Du học</p>
                                        <div class="teacher-info mb-3">
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-plane text-primary me-2"></i>
                                                <span class="small">Tư vấn Du học</span>
                                            </div>
                                            <div class="info-badge mb-2">
                                                <i class="fas fa-clock text-success me-2"></i>
                                                <span class="small">5 năm kinh nghiệm</span>
                                            </div>
                                            <div class="info-badge">
                                                <i class="fas fa-users text-info me-2"></i>
                                                <span class="small">160+ học viên</span>
                                            </div>
                                        </div>
                                        <span class="badge bg-light text-primary border">Chuyên Du học</span>
                                        
                                        <!-- Rating Stars (for consistency) -->
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
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#teachersCarousel" data-bs-slide="prev">
                <div class="carousel-control-icon">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#teachersCarousel" data-bs-slide="next">
                <div class="carousel-control-icon">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('about') }}" class="btn btn-outline-primary btn-lg">
                Xem tất cả giảng viên
            </a>
        </div>
    </div>
</section>

<!-- Achievement Board Section -->
<section class="py-5 bg-gradient-primary">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-white mb-3 animate-on-scroll">
                <i class="fas fa-trophy text-warning me-3"></i>
                BẢNG VÀNG THÀNH TÍCH
            </h2>
            <p class="lead text-white-50 animate-on-scroll animate-delay-1">
                Vinh danh những học viên xuất sắc đạt thành tích cao trong học tập và thi cử
            </p>
        </div>

        <!-- Achievement Tabs -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8">
                <ul class="nav nav-pills justify-content-center achievement-tabs" id="achievementTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="monthly-tab" data-bs-toggle="pill" data-bs-target="#monthly" type="button" role="tab">
                            <i class="fas fa-calendar-alt me-2"></i>Thành tích tháng
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="exam-tab" data-bs-toggle="pill" data-bs-target="#exam" type="button" role="tab">
                            <i class="fas fa-medal me-2"></i>Thành tích thi cử
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="scholarship-tab" data-bs-toggle="pill" data-bs-target="#scholarship" type="button" role="tab">
                            <i class="fas fa-graduation-cap me-2"></i>Du học thành công
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Achievement Content -->
        <div class="tab-content" id="achievementTabsContent">
            <!-- Monthly Achievements -->
            <div class="tab-pane fade show active" id="monthly" role="tabpanel">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="achievement-rank rank-1 mb-3">
                                    <i class="fas fa-crown"></i>
                                    <span class="rank-number">1</span>
                                </div>
                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=100&h=100&fit=crop&crop=face&auto=format" 
                                     alt="Nguyễn Thị Mai" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                <h5 class="fw-bold text-primary mb-2">Nguyễn Thị Mai</h5>
                                <p class="text-muted mb-2">Lớp A2.2</p>
                                <div class="achievement-details mb-3">
                                    <div class="detail-item">
                                        <i class="fas fa-star text-warning me-2"></i>
                                        <span>Điểm trung bình: 9.8/10</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-clock text-success me-2"></i>
                                        <span>Tháng 12/2024</span>
                                    </div>
                                </div>
                                <span class="badge bg-warning text-dark">Học viên xuất sắc nhất</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="achievement-rank rank-2 mb-3">
                                    <i class="fas fa-medal"></i>
                                    <span class="rank-number">2</span>
                                </div>
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face&auto=format" 
                                     alt="Trần Văn Hùng" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                <h5 class="fw-bold text-primary mb-2">Trần Văn Hùng</h5>
                                <p class="text-muted mb-2">Lớp B1.1</p>
                                <div class="achievement-details mb-3">
                                    <div class="detail-item">
                                        <i class="fas fa-star text-warning me-2"></i>
                                        <span>Điểm trung bình: 9.5/10</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-clock text-success me-2"></i>
                                        <span>Tháng 12/2024</span>
                                    </div>
                                </div>
                                <span class="badge bg-light text-primary">Tiến bộ vượt bậc</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="achievement-rank rank-3 mb-3">
                                    <i class="fas fa-award"></i>
                                    <span class="rank-number">3</span>
                                </div>
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face&auto=format" 
                                     alt="Lê Thị Hoa" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                <h5 class="fw-bold text-primary mb-2">Lê Thị Hoa</h5>
                                <p class="text-muted mb-2">Lớp A1.2</p>
                                <div class="achievement-details mb-3">
                                    <div class="detail-item">
                                        <i class="fas fa-star text-warning me-2"></i>
                                        <span>Điểm trung bình: 9.2/10</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-clock text-success me-2"></i>
                                        <span>Tháng 12/2024</span>
                                    </div>
                                </div>
                                <span class="badge bg-light text-primary">Chăm chỉ nhất</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exam Achievements -->
            <div class="tab-pane fade" id="exam" role="tabpanel">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="achievement-rank rank-1 mb-3">
                                    <i class="fas fa-crown"></i>
                                    <span class="rank-number">1</span>
                                </div>
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face&auto=format" 
                                     alt="Phạm Minh Tuấn" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                <h5 class="fw-bold text-primary mb-2">Phạm Minh Tuấn</h5>
                                <p class="text-muted mb-2">Goethe B2</p>
                                <div class="achievement-details mb-3">
                                    <div class="detail-item">
                                        <i class="fas fa-certificate text-warning me-2"></i>
                                        <span>Điểm: 92/100</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-calendar text-success me-2"></i>
                                        <span>Kỳ thi 11/2024</span>
                                    </div>
                                </div>
                                <span class="badge bg-warning text-dark">Điểm cao nhất</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="achievement-rank rank-2 mb-3">
                                    <i class="fas fa-medal"></i>
                                    <span class="rank-number">2</span>
                                </div>
                                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&h=100&fit=crop&crop=face&auto=format" 
                                     alt="Nguyễn Thị Lan" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                <h5 class="fw-bold text-primary mb-2">Nguyễn Thị Lan</h5>
                                <p class="text-muted mb-2">TestDaF</p>
                                <div class="achievement-details mb-3">
                                    <div class="detail-item">
                                        <i class="fas fa-certificate text-warning me-2"></i>
                                        <span>Điểm: TDN 4 (tất cả kỹ năng)</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-calendar text-success me-2"></i>
                                        <span>Kỳ thi 10/2024</span>
                                    </div>
                                </div>
                                <span class="badge bg-light text-primary">Đậu lần đầu</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="achievement-rank rank-3 mb-3">
                                    <i class="fas fa-award"></i>
                                    <span class="rank-number">3</span>
                                </div>
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop&crop=face&auto=format" 
                                     alt="Hoàng Văn Nam" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                <h5 class="fw-bold text-primary mb-2">Hoàng Văn Nam</h5>
                                <p class="text-muted mb-2">Goethe C1</p>
                                <div class="achievement-details mb-3">
                                    <div class="detail-item">
                                        <i class="fas fa-certificate text-warning me-2"></i>
                                        <span>Điểm: 85/100</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-calendar text-success me-2"></i>
                                        <span>Kỳ thi 11/2024</span>
                                    </div>
                                </div>
                                <span class="badge bg-light text-primary">Tiến bộ nhanh</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scholarship Achievements -->
            <div class="tab-pane fade" id="scholarship" role="tabpanel">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="achievement-rank rank-1 mb-3">
                                    <i class="fas fa-crown"></i>
                                    <span class="rank-number">1</span>
                                </div>
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face&auto=format" 
                                     alt="Nguyễn Minh Anh" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                <h5 class="fw-bold text-primary mb-2">Nguyễn Minh Anh</h5>
                                <p class="text-muted mb-2">Ausbildung IT</p>
                                <div class="achievement-details mb-3">
                                    <div class="detail-item">
                                        <i class="fas fa-map-marker-alt text-warning me-2"></i>
                                        <span>Munich, Đức</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-euro-sign text-success me-2"></i>
                                        <span>Lương: 1.400€/tháng</span>
                                    </div>
                                </div>
                                <span class="badge bg-warning text-dark">Du học thành công</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="achievement-rank rank-2 mb-3">
                                    <i class="fas fa-medal"></i>
                                    <span class="rank-number">2</span>
                                </div>
                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=100&h=100&fit=crop&crop=face&auto=format" 
                                     alt="Trần Thị Hương" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                <h5 class="fw-bold text-primary mb-2">Trần Thị Hương</h5>
                                <p class="text-muted mb-2">Ausbildung Y tá</p>
                                <div class="achievement-details mb-3">
                                    <div class="detail-item">
                                        <i class="fas fa-map-marker-alt text-warning me-2"></i>
                                        <span>Berlin, Đức</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-euro-sign text-success me-2"></i>
                                        <span>Lương: 1.200€/tháng</span>
                                    </div>
                                </div>
                                <span class="badge bg-light text-primary">Ngành Y tế</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                <div class="achievement-rank rank-3 mb-3">
                                    <i class="fas fa-award"></i>
                                    <span class="rank-number">3</span>
                                </div>
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face&auto=format" 
                                     alt="Lê Văn Đức" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                <h5 class="fw-bold text-primary mb-2">Lê Văn Đức</h5>
                                <p class="text-muted mb-2">Ausbildung Cơ khí</p>
                                <div class="achievement-details mb-3">
                                    <div class="detail-item">
                                        <i class="fas fa-map-marker-alt text-warning me-2"></i>
                                        <span>Stuttgart, Đức</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-euro-sign text-success me-2"></i>
                                        <span>Lương: 1.350€/tháng</span>
                                    </div>
                                </div>
                                <span class="badge bg-light text-primary">Ngành Kỹ thuật</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- View More Button -->
        <div class="text-center mt-4">
            <a href="{{ route('results') }}" class="btn btn-outline-light btn-lg">
                <i class="fas fa-trophy me-2"></i>
                Xem tất cả thành tích
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

@push('styles')
<style>
/* Courses Section - Consistent with Testimonials */
.course-card {
    transition: all 0.3s ease;
    border-radius: 0.5rem;
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.course-icon-wrapper {
    margin-bottom: 1rem;
}

.course-info .info-item {
    padding: 0.5rem;
    background: rgba(0, 123, 255, 0.05);
    border-radius: 0.375rem;
    margin-bottom: 0.5rem;
}

.course-info .info-item i {
    font-size: 1.2rem;
}

/* Carousel Controls Styling */
.carousel-control-prev,
.carousel-control-next {
    width: 5%;
    opacity: 0.8;
}

.carousel-control-icon {
    background: rgba(0, 123, 255, 0.8);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.3s ease;
}

.carousel-control-prev:hover .carousel-control-icon,
.carousel-control-next:hover .carousel-control-icon {
    background: rgba(0, 123, 255, 1);
    transform: scale(1.1);
}

.carousel-indicators {
    margin-bottom: -2rem;
}

.carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin: 0 4px;
    background-color: rgba(0, 123, 255, 0.5);
    border: none;
}

.carousel-indicators .active {
    background-color: #007bff;
}

/* Testimonial-like styling for consistency */
.course-card .card-body {
    position: relative;
}

.course-card .card-body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #007bff, #6610f2);
    border-radius: 0.5rem 0.5rem 0 0;
}

/* Badge styling consistent with testimonials */
.badge {
    font-size: 0.75rem;
    padding: 0.5rem 0.75rem;
}

.badge.bg-light {
    border: 1px solid #dee2e6;
}

/* Button styling */
.btn-primary {
    border-radius: 0.375rem;
    padding: 0.5rem 1rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 0.25rem 0.5rem rgba(1, 88, 98, 0.3);
}

/* Stars styling */
.text-warning i {
    font-size: 0.875rem;
    margin: 0 1px;
}

/* Course features styling */
.course-card .badge.bg-light {
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
    margin: 0.125rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .carousel-control-prev,
    .carousel-control-next {
        display: none;
    }
    
    .course-info .row {
        margin: 0;
    }
    
    .course-info .col-6 {
        padding: 0.25rem;
    }
    
    .course-card .badge.bg-light {
        font-size: 0.65rem;
        padding: 0.2rem 0.4rem;
    }
}

/* Animation consistency */
.course-card {
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
    transform: translateY(20px);
}

.carousel-item.active .course-card:nth-child(1) { animation-delay: 0.1s; }
.carousel-item.active .course-card:nth-child(2) { animation-delay: 0.2s; }
.carousel-item.active .course-card:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Teachers Section - Grid Layout */
.teachers-grid {
    position: relative;
}

.teacher-card {
    transition: all 0.3s ease;
    border-radius: 1rem;
    overflow: hidden;
    opacity: 0;
    transform: translateY(30px);
}

.teacher-card.animate-on-scroll {
    animation: fadeInUp 0.8s ease forwards;
}

.teacher-card.animate-delay-1 {
    animation-delay: 0.2s;
}

.teacher-card.animate-delay-2 {
    animation-delay: 0.4s;
}

.teacher-card.animate-delay-3 {
    animation-delay: 0.6s;
}

.teacher-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15) !important;
}

.teacher-avatar {
    border: 4px solid #f8f9fa;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.teacher-card:hover .teacher-avatar {
    transform: scale(1.05);
    border-color: #007bff;
}

.teacher-avatar-placeholder {
    border: 4px solid #f8f9fa;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.teacher-card:hover .teacher-avatar-placeholder {
    transform: scale(1.05);
    border-color: #007bff;
}

.teacher-info {
    text-align: left;
    background: rgba(0, 123, 255, 0.02);
    border-radius: 0.5rem;
    padding: 1rem;
    margin: 1rem 0;
}

.info-badge {
    display: flex;
    align-items: center;
    padding: 0.25rem 0;
}

.info-badge i {
    width: 20px;
    flex-shrink: 0;
}

.info-badge span {
    color: #6c757d;
    font-weight: 500;
}

.teacher-card h5 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.teacher-card .badge {
    font-size: 0.8rem;
    padding: 0.5rem 1rem;
    font-weight: 600;
    border-radius: 1rem;
}

/* Card body enhanced */
.teacher-card .card-body {
    position: relative;
    padding: 2rem 1.5rem;
}

.teacher-card .card-body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #007bff, #6610f2);
    border-radius: 1rem 1rem 0 0;
}

/* Responsive adjustments for teachers */
@media (max-width: 768px) {
    .teacher-avatar,
    .teacher-avatar-placeholder {
        width: 100px !important;
        height: 100px !important;
    }
    
    .teacher-avatar-placeholder i {
        font-size: 2.5rem !important;
    }
    
    .teacher-info {
        padding: 0.75rem;
        margin: 0.75rem 0;
    }
    
    .teacher-card .card-body {
        padding: 1.5rem 1rem;
    }
    
    .info-badge {
        padding: 0.2rem 0;
    }
    
    .info-badge span {
        font-size: 0.8rem;
    }
}

@media (max-width: 576px) {
    .teacher-card h5 {
        font-size: 1.1rem;
    }
    
    .teacher-info {
        padding: 0.5rem;
        margin: 0.5rem 0;
    }
}

/* Achievement Board Styles */
.bg-gradient-primary {
    background: var(--bg-primary) !important;
}

.achievement-tabs .nav-link {
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.2);
    color: white;
    margin: 0 0.5rem;
    border-radius: 2rem;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.achievement-tabs .nav-link:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: var(--secondary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.achievement-tabs .nav-link.active {
    background: var(--secondary-color);
    border-color: var(--secondary-color);
    color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(249, 210, 0, 0.4);
}

.achievement-card {
    background: white;
    border-radius: 1.5rem;
    overflow: hidden;
    transition: all 0.4s ease;
    position: relative;
    border: 3px solid transparent;
}

.achievement-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    border-color: var(--secondary-color);
}

.achievement-rank {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    font-size: 1.5rem;
    font-weight: bold;
    color: white;
    margin: 0 auto;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

.achievement-rank i {
    position: absolute;
    top: -5px;
    font-size: 1.8rem;
    animation: float 3s ease-in-out infinite;
}

.achievement-rank .rank-number {
    font-size: 2rem;
    font-weight: 900;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.rank-1 {
    background: linear-gradient(135deg, #FFD700, #FFA500);
    border: 4px solid #FFD700;
}

.rank-1 i {
    color: #FFD700;
    filter: drop-shadow(0 0 10px #FFD700);
}

.rank-2 {
    background: linear-gradient(135deg, #C0C0C0, #A0A0A0);
    border: 4px solid #C0C0C0;
}

.rank-2 i {
    color: #C0C0C0;
    filter: drop-shadow(0 0 10px #C0C0C0);
}

.rank-3 {
    background: linear-gradient(135deg, #CD7F32, #B8860B);
    border: 4px solid #CD7F32;
}

.rank-3 i {
    color: #CD7F32;
    filter: drop-shadow(0 0 10px #CD7F32);
}

.achievement-avatar {
    border: 4px solid var(--secondary-color);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.achievement-card:hover .achievement-avatar {
    transform: scale(1.1);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
}

.achievement-details {
    background: rgba(1, 88, 98, 0.05);
    border-radius: 1rem;
    padding: 1rem;
    margin: 1rem 0;
}

.detail-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
    font-weight: 500;
}

.detail-item:last-child {
    margin-bottom: 0;
}

.detail-item i {
    width: 20px;
    flex-shrink: 0;
}

.achievement-card .badge {
    font-size: 0.85rem;
    padding: 0.5rem 1rem;
    border-radius: 1.5rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.achievement-card .badge.bg-warning {
    background: linear-gradient(135deg, var(--secondary-color), var(--accent-color)) !important;
    color: var(--primary-color) !important;
    box-shadow: 0 4px 15px rgba(249, 210, 0, 0.4);
}

/* Floating animation for rank icons */
@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-8px);
    }
}

/* Sparkle effect for rank 1 */
.rank-1::before {
    content: '✨';
    position: absolute;
    top: -10px;
    right: -10px;
    font-size: 1.2rem;
    animation: sparkle 2s ease-in-out infinite;
}

@keyframes sparkle {
    0%, 100% {
        opacity: 0;
        transform: scale(0.8) rotate(0deg);
    }
    50% {
        opacity: 1;
        transform: scale(1.2) rotate(180deg);
    }
}

/* Tab content animation */
.tab-pane {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments for achievement board */
@media (max-width: 768px) {
    .achievement-tabs .nav-link {
        margin: 0.25rem;
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }
    
    .achievement-rank {
        width: 60px;
        height: 60px;
        font-size: 1.2rem;
    }
    
    .achievement-rank .rank-number {
        font-size: 1.5rem;
    }
    
    .achievement-rank i {
        font-size: 1.4rem;
    }
    
    .achievement-avatar {
        width: 60px !important;
        height: 60px !important;
    }
    
    .achievement-details {
        padding: 0.75rem;
        margin: 0.75rem 0;
    }
    
    .detail-item {
        font-size: 0.8rem;
    }
    
    .achievement-card .badge {
        font-size: 0.75rem;
        padding: 0.4rem 0.8rem;
    }
}

/* Additional hover effects */
.achievement-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s;
    z-index: 1;
}

.achievement-card:hover::before {
    left: 100%;
}

.achievement-card .card-body {
    position: relative;
    z-index: 2;
}

/* ===== MOBILE-FIRST RESPONSIVE IMPROVEMENTS ===== */

/* Enhanced Mobile Hero Section */
@media (max-width: 768px) {
    /* Hero Section Mobile Optimization */
    .hero-slide {
        min-height: 100vh !important;
        padding: 2rem 0 !important;
    }
    
    .hero-slide .container {
        height: 100vh;
        display: flex;
        align-items: center;
    }
    
    .hero-slide .row {
        min-height: auto !important;
        align-items: center !important;
    }
    
    .hero-content {
        text-align: center !important;
        padding: 2rem 1rem;
    }
    
    .hero-content h1 {
        font-size: 2.2rem !important;
        line-height: 1.2 !important;
        margin-bottom: 1.5rem !important;
        word-wrap: break-word;
    }
    
    .hero-content p.lead {
        font-size: 1.1rem !important;
        line-height: 1.5 !important;
        margin-bottom: 2rem !important;
        padding: 0 0.5rem;
    }
    
    /* Mobile-Optimized Buttons */
    .hero-content .d-flex {
        flex-direction: column !important;
        gap: 1rem !important;
        align-items: center;
    }
    
    .hero-content .btn {
        width: 100% !important;
        max-width: 280px !important;
        padding: 1rem 1.5rem !important;
        font-size: 1.1rem !important;
        font-weight: 600 !important;
        border-radius: 50px !important;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important;
        transition: all 0.3s ease !important;
    }
    
    .hero-content .btn:active {
        transform: scale(0.98) !important;
    }
    
    /* Hero Image Mobile */
    .hero-slide .col-lg-6:last-child {
        margin-top: 2rem;
        order: -1; /* Image first on mobile */
    }
    
    .hero-slide img {
        max-width: 250px !important;
        height: auto !important;
        margin: 0 auto 1rem auto !important;
    }
}

/* Enhanced Mobile Navigation */
@media (max-width: 768px) {
    .navbar {
        padding: 0.5rem 0 !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
    }
    
    .navbar-toggler {
        border: none !important;
        padding: 0.5rem !important;
        font-size: 1.5rem !important;
        border-radius: 8px !important;
        background: rgba(1, 88, 98, 0.1) !important;
    }
    
    .navbar-toggler:focus {
        box-shadow: 0 0 0 3px rgba(1, 88, 98, 0.2) !important;
    }
    
    .navbar-collapse {
        background: white !important;
        margin-top: 1rem !important;
        border-radius: 15px !important;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1) !important;
        padding: 1rem !important;
    }
    
    .navbar-nav .nav-link {
        padding: 1rem 1.5rem !important;
        margin: 0.25rem 0 !important;
        border-radius: 10px !important;
        font-size: 1.1rem !important;
        font-weight: 500 !important;
        color: #333 !important;
        transition: all 0.3s ease !important;
        border-left: 4px solid transparent !important;
    }
    
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        background: linear-gradient(135deg, rgba(1, 88, 98, 0.1), rgba(249, 210, 0, 0.1)) !important;
        border-left-color: #015862 !important;
        transform: translateX(5px) !important;
    }
    
    .navbar-nav .nav-link i {
        width: 20px !important;
        margin-right: 0.75rem !important;
        color: #015862 !important;
    }
}

/* Mobile Content Sections */
@media (max-width: 768px) {
    /* Section Spacing */
    section {
        padding: 3rem 0 !important;
    }
    
    .container {
        padding: 0 1rem !important;
    }
    
    /* Typography Mobile */
    h1, .h1 {
        font-size: 2.2rem !important;
        line-height: 1.2 !important;
        margin-bottom: 1.5rem !important;
    }
    
    h2, .h2 {
        font-size: 1.8rem !important;
        line-height: 1.3 !important;
        margin-bottom: 1.25rem !important;
    }
    
    h3, .h3 {
        font-size: 1.4rem !important;
        line-height: 1.3 !important;
        margin-bottom: 1rem !important;
    }
    
    p, .lead {
        font-size: 1rem !important;
        line-height: 1.6 !important;
        margin-bottom: 1.5rem !important;
    }
    
    /* Cards Mobile */
    .card {
        border-radius: 15px !important;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08) !important;
        margin-bottom: 1.5rem !important;
        border: none !important;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
    
    /* Feature Cards Mobile */
    .feature-card {
        margin-bottom: 2rem !important;
        transform: none !important; /* Disable hover transforms on mobile */
    }
    
    .feature-card:hover {
        transform: none !important;
    }
    
    .feature-card i {
        font-size: 2.5rem !important;
        margin-bottom: 1rem !important;
    }
}

/* Mobile Touch Improvements */
@media (max-width: 768px) {
    /* Larger Touch Targets */
    .btn {
        min-height: 48px !important;
        padding: 0.75rem 1.5rem !important;
        font-size: 1rem !important;
        border-radius: 25px !important;
        font-weight: 500 !important;
    }
    
    .btn-lg {
        min-height: 56px !important;
        padding: 1rem 2rem !important;
        font-size: 1.1rem !important;
    }
    
    /* Links */
    a:not(.btn) {
        min-height: 44px !important;
        display: inline-flex !important;
        align-items: center !important;
        padding: 0.5rem !important;
        margin: -0.5rem !important;
    }
    
    /* Form Controls */
    .form-control {
        min-height: 48px !important;
        padding: 0.75rem 1rem !important;
        font-size: 1rem !important;
        border-radius: 10px !important;
    }
    
    /* Carousel Controls Mobile */
    .carousel-control-prev,
    .carousel-control-next {
        width: 50px !important;
        height: 50px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        background: rgba(1, 88, 98, 0.8) !important;
        border-radius: 50% !important;
        border: 3px solid white !important;
    }
    
    .carousel-indicators {
        bottom: 20px !important;
    }
    
    .carousel-indicators [data-bs-target] {
        width: 15px !important;
        height: 15px !important;
        margin: 0 8px !important;
    }
}

/* Mobile Specific Features */
@media (max-width: 768px) {
    /* Sticky CTA Button */
    .mobile-cta-sticky {
        position: fixed !important;
        bottom: 20px !important;
        left: 20px !important;
        right: 20px !important;
        z-index: 1040 !important;
        background: linear-gradient(135deg, #015862, #F9D200) !important;
        color: white !important;
        border: none !important;
        border-radius: 50px !important;
        padding: 1rem 2rem !important;
        font-size: 1.1rem !important;
        font-weight: 600 !important;
        box-shadow: 0 8px 25px rgba(1, 88, 98, 0.3) !important;
        animation: pulse-cta 2s infinite !important;
    }
    
    /* Floating Phone Button */
    .mobile-phone-float {
        position: fixed !important;
        bottom: 100px !important;
        right: 20px !important;
        width: 60px !important;
        height: 60px !important;
        background: #25D366 !important;
        color: white !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 1.5rem !important;
        z-index: 1040 !important;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4) !important;
        animation: bounce-phone 2s infinite !important;
    }
    
    /* Swipe Indicators */
    .swipe-indicator {
        position: absolute !important;
        bottom: 80px !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        color: rgba(255,255,255,0.8) !important;
        font-size: 0.9rem !important;
        animation: fade-in-out 3s infinite !important;
    }
}

/* Mobile Animations */
@keyframes pulse-cta {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@keyframes bounce-phone {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

@keyframes fade-in-out {
    0%, 100% { opacity: 0.5; }
    50% { opacity: 1; }
}

/* Mobile Performance Optimizations */
@media (max-width: 768px) {
    /* Reduce animations for better performance */
    .animate-float {
        animation: none !important;
    }
    
    /* Optimize images */
    img {
        image-rendering: optimizeQuality !important;
        image-rendering: -webkit-optimize-contrast !important;
    }
    
    /* Reduce shadows for performance */
    .card,
    .btn,
    .feature-card {
        box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap carousel with custom settings
    const coursesCarousel = document.getElementById('coursesCarousel');
    
    if (coursesCarousel) {
        // Initialize carousel
        const carousel = new bootstrap.Carousel(coursesCarousel, {
            interval: 5000,
            wrap: true,
            touch: true
        });
        
        // Add animation to cards when carousel slides
        coursesCarousel.addEventListener('slide.bs.carousel', function (e) {
            // Reset animations
            const allCards = this.querySelectorAll('.course-card');
            allCards.forEach(card => {
                card.style.animation = 'none';
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
            });
        });
        
        coursesCarousel.addEventListener('slid.bs.carousel', function (e) {
            // Animate new active slide cards
            const activeSlide = this.querySelector('.carousel-item.active');
            const cards = activeSlide.querySelectorAll('.course-card');
            
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.animation = 'fadeInUp 0.6s ease forwards';
                    card.style.animationDelay = `${index * 0.1}s`;
                }, 50);
            });
        });
        
        // Pause carousel on hover
        coursesCarousel.addEventListener('mouseenter', function() {
            carousel.pause();
        });
        
        coursesCarousel.addEventListener('mouseleave', function() {
            carousel.cycle();
        });
        
        // Initialize first slide animations
        const firstSlideCards = coursesCarousel.querySelectorAll('.carousel-item.active .course-card');
        firstSlideCards.forEach((card, index) => {
            setTimeout(() => {
                card.style.animation = 'fadeInUp 0.6s ease forwards';
                card.style.animationDelay = `${index * 0.1}s`;
            }, 100);
        });
    }
    
    // Add hover effects to course cards
    const courseCards = document.querySelectorAll('.course-card');
    courseCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const cards = entry.target.querySelectorAll('.course-card');
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.animationPlayState = 'running';
                    }, index * 100);
                });
            }
        });
    }, observerOptions);
    
    // Observe the courses section
    const coursesSection = document.querySelector('.py-5.bg-light');
    if (coursesSection && coursesSection.querySelector('#coursesCarousel')) {
        observer.observe(coursesSection);
    }
    
    // Initialize Teachers Carousel with Grid Layout
    const teachersCarousel = document.getElementById('teachersCarousel');
    
    if (teachersCarousel) {
        // Initialize carousel
        const carousel = new bootstrap.Carousel(teachersCarousel, {
            interval: 7000,
            wrap: true,
            touch: true
        });
        
        // Add animation to cards when carousel slides
        teachersCarousel.addEventListener('slide.bs.carousel', function (e) {
            // Reset animations
            const allCards = this.querySelectorAll('.teacher-card');
            allCards.forEach(card => {
                card.style.animation = 'none';
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
            });
        });
        
        teachersCarousel.addEventListener('slid.bs.carousel', function (e) {
            // Animate new active slide cards
            const activeSlide = this.querySelector('.carousel-item.active');
            const cards = activeSlide.querySelectorAll('.teacher-card');
            
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.animation = 'fadeInUp 0.8s ease forwards';
                    card.style.animationDelay = `${index * 0.15}s`;
                }, 100);
            });
        });
        
        // Pause carousel on hover
        teachersCarousel.addEventListener('mouseenter', function() {
            carousel.pause();
        });
        
        teachersCarousel.addEventListener('mouseleave', function() {
            carousel.cycle();
        });
        
        // Initialize first slide animations
        const firstSlideCards = teachersCarousel.querySelectorAll('.carousel-item.active .teacher-card');
        firstSlideCards.forEach((card, index) => {
            setTimeout(() => {
                card.style.animation = 'fadeInUp 0.8s ease forwards';
                card.style.animationDelay = `${index * 0.15}s`;
            }, 300);
        });
        
        // Intersection Observer for initial load
        const teacherObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const firstSlideCards = entry.target.querySelectorAll('.carousel-item.active .teacher-card');
                    firstSlideCards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.animation = 'fadeInUp 0.8s ease forwards';
                            card.style.animationDelay = `${index * 0.15}s`;
                        }, index * 100);
                    });
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        teacherObserver.observe(teachersCarousel);
    }
    
    // Add hover effects to teacher cards
    const teacherCards = document.querySelectorAll('.teacher-card');
    teacherCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

// Mobile-specific features
function initMobileFeatures() {
    if (window.innerWidth <= 768) {
        // Add mobile CTA button
        if (!document.querySelector('.mobile-cta-sticky')) {
            const mobileCTA = document.createElement('a');
            mobileCTA.href = '{{ route("contact") }}';
            mobileCTA.className = 'mobile-cta-sticky d-md-none';
            mobileCTA.innerHTML = '<i class="fas fa-graduation-cap me-2"></i>Tư Vấn Miễn Phí';
            document.body.appendChild(mobileCTA);
        }
        
        // Add floating phone button
        if (!document.querySelector('.mobile-phone-float')) {
            const phoneFloat = document.createElement('a');
            phoneFloat.href = 'tel:0975186230';
            phoneFloat.className = 'mobile-phone-float d-md-none';
            phoneFloat.innerHTML = '<i class="fas fa-phone"></i>';
            phoneFloat.title = 'Gọi ngay: 0975.186.230';
            document.body.appendChild(phoneFloat);
        }
        
        // Add swipe indicators to hero carousel
        const carouselItems = document.querySelectorAll('.carousel-item');
        carouselItems.forEach(item => {
            if (!item.querySelector('.swipe-indicator')) {
                const swipeIndicator = document.createElement('div');
                swipeIndicator.className = 'swipe-indicator d-md-none';
                swipeIndicator.innerHTML = '<i class="fas fa-chevron-left me-2"></i>Vuốt để xem thêm<i class="fas fa-chevron-right ms-2"></i>';
                item.appendChild(swipeIndicator);
            }
        });
        
        // Optimize touch scrolling
        document.body.style.webkitOverflowScrolling = 'touch';
        
        // Add touch feedback to buttons
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(btn => {
            btn.addEventListener('touchstart', function() {
                this.style.transform = 'scale(0.98)';
            });
            btn.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    }
}

// Initialize mobile features
initMobileFeatures();

// Re-initialize on resize
window.addEventListener('resize', initMobileFeatures);
</script>
@endpush

<!-- Mobile-only elements -->
<div class="d-md-none">
    <!-- Mobile sticky CTA will be added by JavaScript -->
    <!-- Mobile floating phone will be added by JavaScript -->
</div>

@endsection

