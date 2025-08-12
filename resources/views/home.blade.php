@extends('layouts.app')

@section('title', 'Trung Tâm Tiếng Đức Thanh Cúc - Học Tiếng Đức & Luyện Thi Chứng Chỉ')

@section('content')
<!-- Hero Slider Section -->
<section class="hero-slider-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        @if(isset($sliders) && $sliders->count() > 0)
        <div class="carousel-indicators">
                @foreach($sliders as $index => $slider)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
                @endforeach
        </div>
        <div class="carousel-inner">
                @foreach($sliders as $index => $slider)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        @if($slider->button_link)
                            <a href="{{ $slider->button_link }}" aria-label="{{ $slider->title }}" class="d-block">
                        @endif
                        <div class="hero-slide overflow-hidden" style="min-height: revert-layer;">
                            <!-- Hero Image -->
                            <img src="{{ $slider->image_url }}" 
                                 alt="{{ $slider->title }}" 
                                 class="hero-slide-image w-100 h-100 position-absolute top-0 start-0 object-fit-cover">
                            
                            <!-- Content Overlay -->
                            <div class="hero-content-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center">
                                <div class="container position-relative">
                        <div class="row align-items-center min-vh-100">
                                        <div class="col-lg-7">
                                <div class="hero-content">
                                                <h1 class="display-4 fw-bold mb-4 animate-fade-in-up hero-title">
                                                    {{ $slider->title }}
                                    </h1>
                                                @if($slider->description)
                                                    <p class="lead mb-4 animate-fade-in-up animate-delay-1 hero-desc">
                                                        {{ $slider->description }}
                                                    </p>
                                                @endif
                                    <div class="d-flex flex-wrap gap-3 animate-fade-in-up animate-delay-2">
                                                    @if($slider->button_text && $slider->button_link)
                                                        <span class="btn btn-dark btn-lg btn-liquid" style="background: #015862; border-color: #015862; pointer-events: none;">
                                                            <i class="fas fa-graduation-cap me-2"></i>{{ $slider->button_text }}
                                                        </span>
                                                    @endif
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        @if($slider->button_link)
                            </a>
                        @endif
                </div>
                @endforeach
            </div>
            @if($sliders->count() > 4)
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        @else
            <!-- Fallback: slider cũ nếu không có dữ liệu -->
            <div class="carousel-inner">
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
                                            Thanh Cúc - Đơn vị tư vấn du học nghề Đức uy tín từ năm 2020. Chương trình Ausbildung với mức lương hấp dẫn, cơ hội định cư và phát triển sự nghiệp tại châu Âu.
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
                                    <img src="{{ asset('images/hero/study-abroad-1.svg') }}" alt="Du học Đức - Cơ hội vàng" class="img-fluid animate-float">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                    </div>
        @endif
                                </div>
</section>

<!-- Video & About Section -->
@if($overview)
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Video Column -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="video-container">
                    <div class="video-wrapper" style="padding-top: 56.25%; position: relative;">
                        <iframe loading="lazy" 
                                title="{{ $overview->video_title }}" 
                                width="100%" 
                                height="100%" 
                                src="{{ $overview->video_embed_url }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                referrerpolicy="strict-origin-when-cross-origin" 
                                allowfullscreen=""
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Information Column -->
            <div class="col-lg-6">
                <div class="about-content">
                    <h2 class="section-title mb-4">
                        {{ $overview->title }}
                    </h2>
                    
                    <div class="about-text">
                        <p class="mb-3">
                            <i class="fas fa-bolt text-warning me-2"></i>
                            {!! $overview->paragraph_1 !!}
                        </p>
                        <p class="mb-4">
                            <i class="fas fa-bolt text-warning me-2"></i>
                            {!! $overview->paragraph_2 !!}
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        @if($overview->button_1_text && $overview->button_1_url)
                            <a href="{{ $overview->button_1_url }}" class="btn btn-secondary me-2 mb-2">
                                <i class="fas fa-arrow-right me-1"></i>{{ $overview->button_1_text }}
                            </a>
                        @endif
                        @if($overview->button_2_text && $overview->button_2_url)
                            <a href="{{ $overview->button_2_url }}" class="btn btn-success me-2 mb-2">
                                <i class="fas fa-phone me-1"></i>{{ $overview->button_2_text }}
                            </a>
                        @endif
                        @if($overview->button_3_text && $overview->button_3_url)
                            <a href="{{ $overview->button_3_url }}" class="btn btn-primary mb-2">
                                <i class="fas fa-arrow-right me-1"></i>{{ $overview->button_3_text }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Features Section -->
<section class="py-5 d-none d-md-block">
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

<!-- Exam Registration Statistics Section -->
<section class="py-5 bg-gradient-primary">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-white mb-3 animate-on-scroll">
                <i class="fas fa-chart-line text-warning me-3"></i>
                THỐNG KÊ ĐĂNG KÝ LỊCH THI
            </h2>
            <p class="lead text-white-50 animate-on-scroll animate-delay-1">
                Theo dõi số lượng học viên đăng ký các kỳ thi chứng chỉ tiếng Đức tại Thanh Cúc
            </p>
        </div>
        
        <div class="row g-4">
            <!-- Total Registrations -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card text-center h-100">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-users fa-3x text-warning"></i>
                    </div>
                    <h3 class="stat-number text-white mb-2">{{ number_format($examRegistrationStats['total']) }}</h3>
                    <p class="stat-label text-white-50 mb-0">Tổng số đăng ký</p>
                </div>
            </div>
            
            <!-- Pending Registrations -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card text-center h-100">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-clock fa-3x text-info"></i>
                    </div>
                    <h3 class="stat-number text-white mb-2">{{ number_format($examRegistrationStats['pending']) }}</h3>
                    <p class="stat-label text-white-50 mb-0">Chờ xác nhận</p>
                </div>
            </div>
            
            <!-- Confirmed Registrations -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card text-center h-100">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-check-circle fa-3x text-success"></i>
                    </div>
                    <h3 class="stat-number text-white mb-2">{{ number_format($examRegistrationStats['confirmed']) }}</h3>
                    <p class="stat-label text-white-50 mb-0">Đã xác nhận</p>
                </div>
            </div>
            
            <!-- Completed Registrations -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card text-center h-100">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-trophy fa-3x text-warning"></i>
                    </div>
                    <h3 class="stat-number text-white mb-2">{{ number_format($examRegistrationStats['completed']) }}</h3>
                    <p class="stat-label text-white-50 mb-0">Hoàn thành</p>
                </div>
            </div>
        </div>
        
        <!-- Call to Action -->
        <div class="text-center mt-5">
            <a href="{{ route('exam-schedule') }}" class="btn btn-warning btn-lg me-3 mb-2">
                <i class="fas fa-calendar-alt me-2"></i>
                Xem lịch thi
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg mb-2">
                <i class="fas fa-phone me-2"></i>
                Tư vấn miễn phí
            </a>
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
            <!-- Courses Slider -->
            <div class="courses-slider-container position-relative">
                <div id="coursesSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
                    <div class="carousel-inner">
                        @foreach($featuredCourses->chunk(4) as $chunkIndex => $coursesChunk)
                            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach($coursesChunk as $course)
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">
                                            <div class="sec-course-card position-relative overflow-hidden rounded shadow-lg" style="height: 320px; cursor: pointer;" 
                                                 onclick="openCourseModal({{ $course->id }})">
                                                <!-- Original Database Image as Background -->
                                                @if($course->image)
                                                    <img src="/storage/{{ $course->image }}" 
                                                         alt="{{ $course->name }}" 
                                                         class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
                                                @else
                                                    <!-- Fallback gradient if no image -->
                                                    <div class="sec-bg-gradient position-absolute top-0 start-0 w-100 h-100" 
                                                         style="background: linear-gradient(135deg, #FFD700 0%, #FF8C00 50%, #FF4500 100%);">
                                                    </div>
                                                    @endif
                                                <!-- Roadmap Text -->
                                                <div class="sec-roadmap position-absolute bottom-0 start-0 w-100 text-center pb-2">
                                                    <small class="text-white fw-bold" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                                                      {{ $course->name }}
                                                    </small>
                                                                </div>
                                                            </div>
                                            <!-- View More Button -->
                                            <div class="text-center mt-2">
                                                <button class="btn btn-outline-warning btn-sm sec-view-more" 
                                                        onclick="openCourseModal({{ $course->id }})">
                                                    XEM THÊM <i class="fas fa-chevron-right ms-1"></i>
                                                </button>
                                                                </div>
                                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Simple Navigation Controls -->
                    @if($featuredCourses->count() > 4)
                        <button class="carousel-control-prev" type="button" data-bs-target="#coursesSlider" data-bs-slide="prev">
                            <div class="slider-nav-btn">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#coursesSlider" data-bs-slide="next">
                            <div class="slider-nav-btn">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
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

<!-- Course Modal -->
<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseModalLabel">Chi tiết khóa học</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="courseModalBody">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <a href="{{ route('schedule') }}" class="btn btn-primary">
                    <i class="fas fa-calendar-alt me-1"></i>Đăng ký học thử
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function openCourseModal(courseId) {
    // Show loading
    document.getElementById('courseModalBody').innerHTML = '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x"></i><p>Đang tải...</p></div>';
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('courseModal'));
    modal.show();
    
    // Load course data via AJAX
    fetch(`/api/courses/${courseId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const course = data.course;
                document.getElementById('courseModalLabel').textContent = course.name;
                document.getElementById('courseModalBody').innerHTML = `
                    <div class="row">
                        <div class="col-md-4">
                            ${course.image ? 
                                `<img src="/storage/${course.image}" alt="${course.name}" class="img-fluid rounded">` :
                                `<div class="bg-gradient rounded d-flex align-items-center justify-content-center" style="height: 200px; background: linear-gradient(135deg, #015862 0%, #3EB850 100%);">
                                    <i class="fas fa-graduation-cap fa-3x text-white opacity-75"></i>
                                </div>`
                            }
                        </div>
                        <div class="col-md-8">
                            <h4 class="text-primary mb-3">${course.name}</h4>
                            ${course.short_description ? `<p class="text-muted mb-3">${course.short_description}</p>` : ''}
                            
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-layer-group text-primary me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Trình độ</small>
                                            <strong>${course.level || course.category}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-clock text-info me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Thời lượng</small>
                                            <strong>${course.duration_hours}h</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            ${course.description ? `
                                <div class="mb-3">
                                    <h6 class="fw-bold">Mô tả chi tiết:</h6>
                                    <div class="text-muted">${course.description}</div>
                                </div>
                            ` : ''}
                            
                            ${course.features && course.features.length > 0 ? `
                                <div class="mb-3">
                                    <h6 class="fw-bold">Đặc điểm nổi bật:</h6>
                                    <div class="row">
                                        ${course.features.map(feature => `
                                            <div class="col-6 mb-1">
                                                <span class="badge bg-light text-dark">
                                                    <i class="fas fa-check text-success me-1"></i>${feature}
                                                </span>
                                            </div>
                                        `).join('')}
                                    </div>
                                </div>
                            ` : ''}
                            
                            ${course.target_score ? `
                                <div class="mb-3">
                                    <span class="badge bg-success">
                                        <i class="fas fa-target me-1"></i>Mục tiêu: ${course.target_score}
                                    </span>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                `;
            } else {
                document.getElementById('courseModalBody').innerHTML = '<div class="text-center text-danger"><i class="fas fa-exclamation-triangle fa-2x"></i><p>Không thể tải thông tin khóa học</p></div>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('courseModalBody').innerHTML = '<div class="text-center text-danger"><i class="fas fa-exclamation-triangle fa-2x"></i><p>Đã xảy ra lỗi khi tải dữ liệu</p></div>';
        });
}
</script>

<!-- Teachers Section -->
<section class="py-5 teachers-section position-relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="teachers-bg-decoration"></div>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
    
    <div class="container position-relative">
        <div class="text-center mb-5">
            <div class="section-badge mb-3 animate-on-scroll">
                <i class="fas fa-chalkboard-teacher me-2"></i>
                <span>Đội Ngũ Chuyên Nghiệp</span>
            </div>
            <h2 class="display-4 fw-bold mb-3 animate-on-scroll animate-delay-1">
                <span class="text-gradient">ĐỘI NGŨ GIẢNG VIÊN</span>
                <br>
                <span class="text-primary">ĐÀO TẠO</span>
            </h2>
            <p class="lead text-muted animate-on-scroll animate-delay-2 mx-auto" style="max-width: 600px;">
                Đội ngũ giảng viên chuyên nghiệp với kinh nghiệm giảng dạy tiếng Đức nhiều năm, 
                cam kết mang đến chất lượng giáo dục tốt nhất
            </p>
        </div>
        
        @if(isset($featuredTeachers) && $featuredTeachers->count() > 0)
            <!-- Teachers Slider -->
            <div id="teachersSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <!-- Carousel Indicators -->
                <div class="carousel-indicators">
                    @for($i = 0; $i < ceil($featuredTeachers->count() / 4); $i++)
                        <button type="button" data-bs-target="#teachersSlider" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></button>
                    @endfor
                </div>
                
                <!-- Carousel Items -->
                <div class="carousel-inner">
                    @foreach($featuredTeachers->chunk(4) as $index => $teacherChunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="teachers-grid">
                                <div class="row">
                                    @foreach($teacherChunk as $teacher)
                                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                                            <div class="teacher-card-new" onclick="openTeacherModal({{ $teacher->id }})">
                                                <!-- Teacher Avatar -->
                                                <div class="teacher-avatar-new">
                                                    @if($teacher->avatar)
                                                        <img src="{{ asset('storage/' . $teacher->avatar) }}" 
                                                             alt="{{ $teacher->name }}" class="teacher-img">
                                                    @else
                                                        <div class="teacher-img-placeholder">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                                <!-- Teacher Info -->
                                                <div class="teacher-info-new">
                                                    <h5 class="teacher-name-new">{{ $teacher->name }}</h5>
                                                    <p class="teacher-role-new">GIẢNG VIÊN</p>
                                                    
                                                    <!-- Social Icons -->
                                                    <div class="teacher-social-new">
                                                        <div class="social-icon">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </div>
                                                        <div class="social-icon">
                                                            <i class="fab fa-tiktok"></i>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Achievement -->
                                                    <div class="teacher-achievement-new">
                                                        {{ $teacher->certification }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Carousel Controls -->
                @if($featuredTeachers->count() > 4)
                    <button class="carousel-control-prev" type="button" data-bs-target="#teachersSlider" data-bs-slide="prev">
                        <div class="carousel-control-icon">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#teachersSlider" data-bs-slide="next">
                        <div class="carousel-control-icon">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <span class="visually-hidden">Next</span>
                    </button>
                @endif
            </div>
            
            <!-- View All Button -->
            <div class="text-center mt-4">
                <a href="{{ route('teachers') }}" class="btn-view-all">
                    XEM TẤT CẢ
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        @endif
        
        @if(!isset($featuredTeachers) || $featuredTeachers->count() == 0)
            <!-- Fallback: Hiển thị giáo viên mẫu nếu không có dữ liệu -->
            <div class="teachers-grid">
                <div class="row">
                    <!-- Teacher 1 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="teacher-card-enhanced card h-100 border-0 position-relative overflow-hidden">
                            <div class="card-bg-gradient"></div>
                            <div class="teacher-floating-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="card-body text-center p-4 position-relative">
                                <div class="teacher-avatar-container mb-4">
                                    <div class="avatar-ring"></div>
                                    <img src="{{ asset('images/teachers/teacher-1.svg') }}" 
                                         alt="Thầy Minh" class="teacher-avatar-enhanced rounded-circle">
                                    <div class="teacher-status-badge">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="teacher-info-enhanced">
                                    <h5 class="fw-bold mb-2 teacher-name">Thầy Minh</h5>
                                    <p class="text-muted mb-3 teacher-specialization">
                                        <i class="fas fa-chalkboard-teacher me-2 text-primary"></i>
                                        Giảng viên tiếng Đức A1-A2
                                    </p>
                                    <div class="certification-badge mb-3">
                                        <i class="fas fa-certificate me-2"></i>
                                        <span>Cử nhân Ngôn ngữ Đức</span>
                                    </div>
                                    <div class="teacher-rating mb-3">
                                        <div class="stars">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <small class="text-muted">5.0 (32 đánh giá)</small>
                                    </div>
                                    <div class="teacher-actions">
                                        <a href="#" class="btn btn-teacher-primary">
                                            <i class="fas fa-eye me-2"></i>Xem chi tiết
                                            <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="teacher-hover-overlay"></div>
                        </div>
                    </div>
                    
                    <!-- Teacher 2 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="teacher-card-enhanced card h-100 border-0 position-relative overflow-hidden">
                            <div class="card-bg-gradient"></div>
                            <div class="teacher-floating-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="card-body text-center p-4 position-relative">
                                <div class="teacher-avatar-container mb-4">
                                    <div class="avatar-ring"></div>
                                    <img src="{{ asset('images/teachers/teacher-2.svg') }}" 
                                         alt="Cô Lan" class="teacher-avatar-enhanced rounded-circle">
                                    <div class="teacher-status-badge">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="teacher-info-enhanced">
                                    <h5 class="fw-bold mb-2 teacher-name">Cô Lan</h5>
                                    <p class="text-muted mb-3 teacher-specialization">
                                        <i class="fas fa-chalkboard-teacher me-2 text-primary"></i>
                                        Giảng viên tiếng Đức B1-B2
                                    </p>
                                    <div class="certification-badge mb-3">
                                        <i class="fas fa-certificate me-2"></i>
                                        <span>Thạc sĩ Đức học</span>
                                    </div>
                                    <div class="teacher-rating mb-3">
                                        <div class="stars">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <small class="text-muted">5.0 (28 đánh giá)</small>
                                    </div>
                                    <div class="teacher-actions">
                                        <a href="#" class="btn btn-teacher-primary">
                                            <i class="fas fa-eye me-2"></i>Xem chi tiết
                                            <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="teacher-hover-overlay"></div>
                        </div>
                    </div>
                    
                    <!-- Teacher 3 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="teacher-card-enhanced card h-100 border-0 position-relative overflow-hidden">
                            <div class="card-bg-gradient"></div>
                            <div class="teacher-floating-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="card-body text-center p-4 position-relative">
                                <div class="teacher-avatar-container mb-4">
                                    <div class="avatar-ring"></div>
                                    <div class="teacher-avatar-placeholder-enhanced rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <i class="fas fa-user fa-3x text-white"></i>
                                    </div>
                                    <div class="teacher-status-badge">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="teacher-info-enhanced">
                                    <h5 class="fw-bold mb-2 teacher-name">Thầy Tuấn</h5>
                                    <p class="text-muted mb-3 teacher-specialization">
                                        <i class="fas fa-chalkboard-teacher me-2 text-primary"></i>
                                        Giảng viên tiếng Đức C1-C2
                                    </p>
                                    <div class="certification-badge mb-3">
                                        <i class="fas fa-certificate me-2"></i>
                                        <span>Chứng chỉ Goethe C2</span>
                                    </div>
                                    <div class="teacher-rating mb-3">
                                        <div class="stars">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <small class="text-muted">5.0 (41 đánh giá)</small>
                                    </div>
                                    <div class="teacher-actions">
                                        <a href="#" class="btn btn-teacher-primary">
                                            <i class="fas fa-eye me-2"></i>Xem chi tiết
                                            <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="teacher-hover-overlay"></div>
                        </div>
                    </div>
                    
                    <!-- Teacher 4 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="teacher-card-enhanced card h-100 border-0 position-relative overflow-hidden">
                            <div class="card-bg-gradient"></div>
                            <div class="teacher-floating-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="card-body text-center p-4 position-relative">
                                <div class="teacher-avatar-container mb-4">
                                    <div class="avatar-ring"></div>
                                    <div class="teacher-avatar-placeholder-enhanced rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <i class="fas fa-user fa-3x text-white"></i>
                                    </div>
                                    <div class="teacher-status-badge">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="teacher-info-enhanced">
                                    <h5 class="fw-bold mb-2 teacher-name">Cô Hương</h5>
                                    <p class="text-muted mb-3 teacher-specialization">
                                        <i class="fas fa-chalkboard-teacher me-2 text-primary"></i>
                                        Giảng viên tiếng Đức Giao tiếp
                                    </p>
                                    <div class="certification-badge mb-3">
                                        <i class="fas fa-certificate me-2"></i>
                                        <span>Cử nhân Sư phạm Đức</span>
                                    </div>
                                    <div class="teacher-rating mb-3">
                                        <div class="stars">
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        </div>
                                        <small class="text-muted">5.0 (37 đánh giá)</small>
                                    </div>
                                    <div class="teacher-actions">
                                        <a href="#" class="btn btn-teacher-primary">
                                            <i class="fas fa-eye me-2"></i>Xem chi tiết
                                            <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="teacher-hover-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="text-center mt-5">
            <a href="{{ route('about') }}" class="btn btn-view-all-teachers btn-lg">
                <i class="fas fa-users me-2"></i>
                Xem tất cả giảng viên
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Achievement Board Section -->
<section class="py-5 bg-gradient-primary">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-white mb-3 animate-on-scroll">
                <i class="fas fa-medal text-warning me-3"></i>
                BẢNG VÀNG THÀNH TÍCH THI CỬ
            </h2>
            <p class="lead text-white-50 animate-on-scroll animate-delay-1">
                Vinh danh những học viên xuất sắc đạt thành tích cao trong các kỳ thi và chứng chỉ
            </p>
        </div>

        <!-- Achievement Tabs -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8">
                <ul class="nav nav-pills justify-content-center achievement-tabs" id="achievementTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="exam-tab" data-bs-toggle="pill" data-bs-target="#exam" type="button" role="tab">
                            <i class="fas fa-medal me-2"></i>Thành tích thi cử
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Achievement Content -->
        <div class="tab-content" id="achievementTabsContent">
            <!-- Exam Achievements -->
            <div class="tab-pane fade show active" id="exam" role="tabpanel">
                <div class="row">
                    @forelse($examAchievements as $achievement)
                        @php
                            $avatarUrl = $achievement->avatar
                                ? asset('storage/' . $achievement->avatar)
                                : asset('images/teachers/teacher-1.svg');
                            $rankIcon = $achievement->rank == 1 ? 'fa-crown' : ($achievement->rank == 2 ? 'fa-medal' : ($achievement->rank == 3 ? 'fa-award' : 'fa-star'));
                        @endphp
                    <div class="col-lg-4 mb-4">
                        <div class="achievement-card card border-0 shadow-lg h-100">
                            <div class="card-body text-center p-4">
                                    <div class="achievement-rank rank-{{ $achievement->rank }} mb-3">
                                        <i class="fas {{ $rankIcon }}"></i>
                                        <span class="rank-number">{{ $achievement->rank }}</span>
                                </div>
                                    <img src="{{ $avatarUrl }}" alt="{{ $achievement->student_name }}" class="rounded-circle achievement-avatar mb-3" width="80" height="80">
                                    <h5 class="fw-bold text-primary mb-2">{{ $achievement->student_name }}</h5>
                                    @if($achievement->class_name)
                                        <p class="text-muted mb-2">Lớp {{ $achievement->class_name }}</p>
                                    @endif
                                <div class="achievement-details mb-3">
                                        @if(!is_null($achievement->score))
                                    <div class="detail-item">
                                        <i class="fas fa-star text-warning me-2"></i>
                                                <span>Điểm thi: {{ number_format($achievement->score, 1) }}/10</span>
                                    </div>
                                        @endif
                                    <div class="detail-item">
                                        <i class="fas fa-clock text-success me-2"></i>
                                            <span>{{ optional($achievement->achievement_date)->format('m/Y') }}</span>
                                    </div>
                                </div>
                                    <span class="badge bg-{{ $achievement->rank == 1 ? 'warning text-dark' : 'light text-primary' }}">{{ $achievement->achievement_title }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-light text-center mb-0">Chưa có thành tích thi cử nào được cập nhật.</div>
                                </div>
                    @endforelse
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
                @php $slides = $testimonials->chunk(3); @endphp
                @foreach($slides as $index => $chunk)
                    <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
            
            <div class="carousel-inner">
                @php $slides = $testimonials->chunk(3); @endphp
                @forelse($slides as $slideIndex => $chunk)
                    <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }}">
                    <div class="row">
                            @foreach($chunk as $testimonial)
                        <div class="col-lg-4 mb-4">
                            <div class="card border-0 shadow testimonial-card h-100">
                                <div class="card-body p-4 text-center">
                                            <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->name }}" class="rounded-circle testimonial-avatar mb-3" width="80" height="80">
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left fa-2x text-primary opacity-50"></i>
                                    </div>
                                            <p class="text-muted mb-3 fst-italic">"{{ $testimonial->content }}"</p>
                                            <h6 class="fw-bold text-primary mb-1">{{ $testimonial->name }}</h6>
                                            <small class="text-muted">{{ $testimonial->current_job }}{{ $testimonial->location ? ' - ' . $testimonial->location : '' }}</small>
                                    <div class="mt-2">
                                                @if($testimonial->program)
                                                    <span class="badge bg-info">{{ $testimonial->program }}</span>
                                                @endif
                                                @if($testimonial->company)
                                                    <span class="badge bg-success ms-1">{{ $testimonial->company }}</span>
                                                @endif
                                    </div>
                                    <div class="text-warning mt-2">
                                                {!! $testimonial->stars !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                                    </div>
                                    </div>
                @empty
                    <div class="carousel-item active">
                    <div class="row">
                            <div class="col-12">
                                <div class="alert alert-light text-center mb-0">Chưa có nhận xét học viên nào được hiển thị.</div>
                                    </div>
                                    </div>
                                    </div>
                @endforelse
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

<!-- Course Registration Section -->
<section class="py-5 bg-light position-relative registration-section">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold text-dark mb-3">
                    KHÓA HỌC <span class="text-primary">TIẾNG ĐỨC</span> CHUYÊN NGHIỆP
                </h2>
                <p class="lead text-muted">Đăng ký ngay để nhận ưu đãi đặc biệt và tư vấn miễn phí</p>
            </div>
        </div>

        <div class="row align-items-center">
            <!-- Course Offers Column -->
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="offers-header mb-4">
                    <h3 class="fw-bold text-dark mb-2">
                        <i class="fas fa-gift text-primary me-2"></i>
                        ƯU ĐÃI ĐẶC BIỆT KHÓA HỌC TIẾNG ĐỨC
                    </h3>
                    <p class="text-muted">Chỉ áp dụng cho 50 học viên đăng ký đầu tiên trong tháng này!</p>
                </div>
                
                <div class="row g-4">
                    @forelse($courseOffers as $offer)
                        <div class="col-md-6">
                            <div class="offer-card h-100">
                                @if($offer->icon)
                                    <div class="offer-icon">
                                        <i class="{{ $offer->icon }}"></i>
                                    </div>
                                @endif
                                <h5 class="fw-bold mb-2 text-{{ $offer->badge_color ?? 'success' }}">{{ $offer->title }}</h5>
                                <p class="text-muted mb-0">{{ $offer->description }}</p>
                                @if($offer->badge_text)
                                    <div class="offer-badge">
                                        <span class="badge bg-{{ $offer->badge_color ?? 'success' }}">{{ $offer->badge_text }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <!-- Fallback offers if no offers are configured -->
                        <div class="col-md-6">
                            <div class="offer-card h-100">
                                <div class="offer-icon">
                                    <i class="fas fa-percentage"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-danger">Giảm 30% học phí</h5>
                                <p class="text-muted mb-0">Ưu đãi đặc biệt cho khóa học Tiếng Đức cơ bản và nâng cao</p>
                                <div class="offer-badge">
                                    <span class="badge bg-danger">Tiết kiệm 3.000.000đ</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="offer-card h-100">
                                <div class="offer-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-success">Tặng tài liệu miễn phí</h5>
                                <p class="text-muted mb-0">BỘ SÁCH TIẾNG ĐỨC CHUYÊN NGHIỆP + AUDIO CD TRỊ GIÁ 800.000Đ</p>
                                <div class="offer-badge">
                                    <span class="badge bg-success">Miễn phí</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="offer-card h-100">
                                <div class="offer-icon">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-info">Học thử 2 buổi miễn phí</h5>
                                <p class="text-muted mb-0">Trải nghiệm phương pháp giảng dạy trước khi quyết định đăng ký</p>
                                <div class="offer-badge">
                                    <span class="badge bg-info">Không mất phí</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="offer-card h-100">
                                <div class="offer-icon">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-warning">Cam kết đầu ra A2-B1</h5>
                                <p class="text-muted mb-0">Không đạt chuẩn sẽ được học lại miễn phí hoặc hoàn tiền 100%</p>
                                <div class="offer-badge">
                                    <span class="badge bg-warning">Bảo đảm</span>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                
                <div class="urgency-notice mt-4 p-3 bg-warning bg-opacity-10 border border-warning rounded-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock text-warning me-2"></i>
                        <div>
                            <strong class="text-warning">Ưu đãi có hạn!</strong>
                            <span class="text-muted ms-2">Chỉ còn <strong>7 ngày</strong> để nhận ưu đãi này</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Registration Form Column -->
            <div class="col-lg-5">
                <div class="registration-form-card">
                    <div class="form-header text-center mb-4">
                        <div class="form-icon mb-3">
                            <i class="fas fa-language"></i>
                        </div>
                        <h3 class="fw-bold text-white mb-2">ĐĂNG KÝ KHÓA HỌC TIẾNG ĐỨC</h3>
                        <p class="text-white-50 mb-0">Nhận tư vấn miễn phí và ưu đãi đặc biệt</p>
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
                    
                    <form action="{{ route('contact.submit') }}" method="POST" class="consultation-form">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Họ và tên của bạn" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control form-control-lg" name="phone" placeholder="Số điện thoại" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg" name="email" placeholder="Địa chỉ email">
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-lg" name="course" required>
                                <option value="">Chọn khóa học Tiếng Đức</option>
                                <option value="Tiếng Đức A1 - Cơ bản">Tiếng Đức A1 - Cơ bản</option>
                                <option value="Tiếng Đức A2 - Sơ cấp">Tiếng Đức A2 - Sơ cấp</option>
                                <option value="Tiếng Đức B1 - Trung cấp">Tiếng Đức B1 - Trung cấp</option>
                                <option value="Tiếng Đức B2 - Trung cấp cao">Tiếng Đức B2 - Trung cấp cao</option>
                                <option value="Tiếng Đức giao tiếp">Tiếng Đức giao tiếp</option>
                                <option value="Tư vấn chọn khóa phù hợp">Tư vấn chọn khóa phù hợp</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <select class="form-select form-select-lg" name="location" required>
                                <option value="">Chọn cơ sở học</option>
                                <option value="Hà Nội - Cầu Giấy">Hà Nội - Cầu Giấy</option>
                                <option value="Hà Nội - Đống Đa">Hà Nội - Đống Đa</option>
                                <option value="TP.HCM - Quận 1">TP.HCM - Quận 1</option>
                                <option value="TP.HCM - Quận 3">TP.HCM - Quận 3</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Online">Học Online</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold py-3">
                            <i class="fas fa-paper-plane me-2"></i>ĐĂNG KÝ NGAY
                        </button>
                        
                        <div class="text-center mt-3">
                            <small class="text-white-50">
                                <i class="fas fa-shield-alt me-1"></i>
                                Thông tin của bạn được bảo mật tuyệt đối
                            </small>
                        </div>
                    </form>
                </div>
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
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<style>

/* Offer Cards */
.offers-header h3 {
    color: #2c3e50;
}

.offer-card {
    background: white;
    padding: 1.5rem;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
    position: relative;
    overflow: hidden;
}

.offer-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.offer-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #015862, #3EB850);
}

.offer-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #015862, #3EB850);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.offer-icon i {
    font-size: 20px;
    color: white;
}

.offer-card h5 {
    margin-bottom: 0.8rem;
    font-size: 1.1rem;
}

.offer-card p {
    line-height: 1.5;
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.offer-badge {
    margin-top: 0.5rem;
}

.offer-badge .badge {
    font-size: 0.75rem;
    padding: 0.4rem 0.8rem;
}

.urgency-notice {
    animation: pulse-border 2s ease-in-out infinite;
}

@keyframes pulse-border {
    0%, 100% { border-color: #ffc107; }
    50% { border-color: #ff8c00; }
}

/* Registration Form Card */
.registration-form-card {
    background: linear-gradient(135deg, #015862, #3EB850);
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(1, 88, 98, 0.3);
    position: relative;
    overflow: hidden;
}

.registration-form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%);
    pointer-events: none;
}

.form-header {
    position: relative;
    z-index: 2;
}

.form-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.form-icon i {
    font-size: 32px;
    color: white;
}

/* Form Styles */
.consultation-form {
    position: relative;
    z-index: 2;
}

.consultation-form .form-control,
.consultation-form .form-select {
    border: 2px solid rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.95);
    border-radius: 10px;
    padding: 0.75rem 1rem;
    font-size: 16px;
    height: auto;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.consultation-form .form-control:focus,
.consultation-form .form-select:focus {
    border-color: rgba(255, 255, 255, 0.5);
    background: white;
    box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
}

.consultation-form .form-control::placeholder {
    color: #6c757d;
}

.consultation-form .btn-warning {
    background: linear-gradient(135deg, #ffc107, #ff8c00);
    border: none;
    border-radius: 10px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
}

.consultation-form .btn-warning:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(255, 193, 7, 0.6);
    background: linear-gradient(135deg, #ff8c00, #ffc107);
}

/* Responsive Design */
@media (max-width: 991px) {
    .offer-card {
        padding: 1.25rem;
        margin-bottom: 1rem;
    }
    
    .registration-form-card {
        padding: 2rem;
        margin-top: 2rem;
    }
    
    .offer-icon {
        width: 45px;
        height: 45px;
        margin-bottom: 0.8rem;
    }
    
    .offer-icon i {
        font-size: 18px;
    }
    
    .form-icon {
        width: 60px;
        height: 60px;
    }
    
    .form-icon i {
        font-size: 24px;
    }
    
    .offers-header h3 {
        font-size: 1.3rem;
    }
    
    .urgency-notice {
        margin-top: 2rem !important;
    }
}

/* Courses Section - Slider Layout */
.courses-slider-container .course-card {
    transition: all 0.3s ease;
    border-radius: 0.5rem;
    height: 100%;
}

.courses-slider-container .course-card:hover {
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

/* Simple Slider Navigation */
.courses-slider-container .carousel-control-prev,
.courses-slider-container .carousel-control-next {
    width: 50px;
    height: 50px;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0.8;
}

.courses-slider-container .carousel-control-prev {
    left: -25px;
}

.courses-slider-container .carousel-control-next {
    right: -25px;
}

.slider-nav-btn {
    background: rgba(0, 123, 255, 0.9);
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.slider-nav-btn:hover {
    background: rgba(0, 123, 255, 1);
    transform: scale(1.1);
}

.slider-nav-btn i {
    font-size: 18px;
}

/* Responsive Slider */
@media (max-width: 991.98px) {
    .courses-slider-container .carousel-control-prev,
    .courses-slider-container .carousel-control-next {
        display: none;
    }
}

@media (max-width: 767.98px) {
    .courses-slider-container .col-sm-6 {
        flex: 0 0 auto;
        width: 50%;
    }
    
    .courses-slider-container .course-card-image {
        height: 160px !important;
    }
    
    .courses-slider-container .course-title {
        font-size: 0.75rem !important;
        line-height: 1.1 !important;
    }
}

.carousel-indicators {
    margin-bottom: 0;
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

/* Enhanced Teachers Section */
.teachers-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
}

.teachers-bg-decoration {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(0, 123, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(102, 16, 242, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 60%, rgba(255, 193, 7, 0.05) 0%, transparent 50%);
    pointer-events: none;
}

.floating-shapes {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
    pointer-events: none;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(45deg, rgba(0, 123, 255, 0.1), rgba(102, 16, 242, 0.1));
    animation: float 6s ease-in-out infinite;
}

.shape-1 {
    width: 100px;
    height: 100px;
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 150px;
    height: 150px;
    top: 60%;
    right: 10%;
    animation-delay: 2s;
}

.shape-3 {
    width: 80px;
    height: 80px;
    bottom: 20%;
    left: 20%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.section-badge {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #007bff, #6610f2);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3); }
    50% { box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4); }
    100% { box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3); }
}

.text-gradient {
    background: linear-gradient(135deg, #007bff, #6610f2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.teachers-grid {
    position: relative;
}

/* Enhanced Teacher Cards */
.teacher-card-enhanced {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border-radius: 1.5rem;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transform: translateY(30px);
    overflow: hidden;
}

.teacher-card-enhanced.animate-on-scroll {
    animation: fadeInUp 0.8s ease forwards;
}

.teacher-card-enhanced:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.card-bg-gradient {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 6px;
    background: linear-gradient(90deg, #007bff, #6610f2, #ffc107, #28a745);
    background-size: 300% 100%;
    animation: gradientShift 3s ease infinite;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.teacher-floating-icon {
    position: absolute;
    top: 1rem;
    right: 1rem;
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #007bff, #6610f2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    z-index: 2;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-5px); }
    60% { transform: translateY(-3px); }
}

.teacher-avatar-container {
    position: relative;
    display: inline-block;
}

.avatar-ring {
    position: absolute;
    top: -8px;
    left: -8px;
    right: -8px;
    bottom: -8px;
    border: 3px solid transparent;
    border-radius: 50%;
    background: linear-gradient(45deg, #007bff, #6610f2, #ffc107) border-box;
    mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
    mask-composite: exclude;
    animation: rotate 3s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.teacher-avatar-enhanced {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border: 4px solid white;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.teacher-avatar-placeholder-enhanced {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #007bff, #6610f2);
    border: 4px solid white;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.teacher-card-enhanced:hover .teacher-avatar-enhanced,
.teacher-card-enhanced:hover .teacher-avatar-placeholder-enhanced {
    transform: scale(1.1);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
}

.teacher-status-badge {
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 24px;
    height: 24px;
    background: #28a745;
    border: 3px solid white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.7rem;
    box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
}

.teacher-info-enhanced {
    position: relative;
    z-index: 1;
}

.teacher-name {
    color: #2c3e50;
    font-size: 1.3rem;
    margin-bottom: 0.5rem;
    transition: color 0.3s ease;
}

.teacher-card-enhanced:hover .teacher-name {
    color: #007bff;
}

.teacher-specialization {
    font-size: 0.95rem;
    margin-bottom: 1rem;
}

.certification-badge {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border: 1px solid #dee2e6;
    border-radius: 25px;
    padding: 0.5rem 1rem;
    font-size: 0.85rem;
    color: #495057;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.teacher-card-enhanced:hover .certification-badge {
    background: linear-gradient(135deg, #007bff, #6610f2);
    color: white;
    transform: scale(1.05);
}

.teacher-rating {
    margin: 1rem 0;
}

.stars {
    margin-bottom: 0.25rem;
}

.stars i {
    font-size: 0.9rem;
    margin-right: 2px;
}

.btn-teacher-primary {
    background: linear-gradient(135deg, #007bff, #6610f2);
    border: none;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    position: relative;
    overflow: hidden;
}

.btn-teacher-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-teacher-primary:hover::before {
    left: 100%;
}

.btn-teacher-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
    color: white;
}

.teacher-hover-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 123, 255, 0.05), rgba(102, 16, 242, 0.05));
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.teacher-card-enhanced:hover .teacher-hover-overlay {
    opacity: 1;
}

.btn-view-all-teachers {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
    position: relative;
    overflow: hidden;
}

.btn-view-all-teachers::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-view-all-teachers:hover::before {
    left: 100%;
}

.btn-view-all-teachers:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
    color: white;
}

/* Legacy teacher card styles for compatibility */
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

/* Responsive adjustments for enhanced teachers */
@media (max-width: 768px) {
    .teacher-avatar-enhanced,
    .teacher-avatar-placeholder-enhanced {
        width: 100px !important;
        height: 100px !important;
    }
    
    .teacher-floating-icon {
        width: 30px;
        height: 30px;
        font-size: 0.8rem;
    }
    
    .teacher-name {
        font-size: 1.1rem;
    }
    
    .certification-badge {
        font-size: 0.75rem;
        padding: 0.4rem 0.8rem;
    }
    
    .btn-teacher-primary {
        padding: 0.6rem 1.2rem;
        font-size: 0.8rem;
    }
}

@media (max-width: 576px) {
    .teacher-card-enhanced {
        margin-bottom: 1.5rem;
    }
    
    .teacher-name {
        font-size: 1rem;
    }
    
    .teacher-specialization {
        font-size: 0.85rem;
    }
    
    .btn-view-all-teachers {
        padding: 0.8rem 1.5rem;
        font-size: 1rem;
    }
}

/* Achievement Board Styles */
.bg-gradient-primary {
    background: var(--bg-primary) !important;
}

/* Exam Registration Statistics Styles */
.stat-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 2rem 1.5rem;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.2);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.6s;
    z-index: 1;
}

.stat-card:hover::before {
    left: 100%;
}

.stat-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.4);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.stat-icon {
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
}

.stat-card:hover .stat-icon {
    transform: scale(1.1);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 900;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
}

.stat-card:hover .stat-number {
    transform: scale(1.05);
}

.stat-label {
    font-size: 1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    z-index: 2;
}

/* Responsive adjustments for statistics */
@media (max-width: 768px) {
    .stat-card {
        padding: 1.5rem 1rem;
        margin-bottom: 1rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .stat-label {
        font-size: 0.9rem;
    }
    
    .stat-icon i {
        font-size: 2.5rem !important;
    }
}

@media (max-width: 576px) {
    .stat-card {
        padding: 1.25rem 0.75rem;
    }
    
    .stat-number {
        font-size: 1.75rem;
    }
    
    .stat-label {
        font-size: 0.8rem;
    }
    
    .stat-icon i {
        font-size: 2rem !important;
    }
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

/* ===== RESPONSIVE TYPOGRAPHY SYSTEM ===== */

/* Base Typography Scale */
:root {
    /* Desktop (≥1200px) - Base scale */
    --font-size-xs: 0.75rem;    /* 12px */
    --font-size-sm: 0.875rem;   /* 14px */
    --font-size-base: 0.8rem;     /* 16px */
    --font-size-lg: 1.125rem;   /* 18px */
    --font-size-xl: 1.25rem;    /* 20px */
    --font-size-2xl: 1.5rem;    /* 24px */
    --font-size-3xl: 1.875rem;  /* 30px */
    --font-size-4xl: 2.25rem;   /* 36px */
    --font-size-5xl: 3rem;      /* 48px */
    --font-size-6xl: 3.75rem;   /* 60px */
    
    /* Line heights */
    --line-height-tight: 1.25;
    --line-height-snug: 1.375;
    --line-height-normal: 1.5;
    --line-height-relaxed: 1.625;
    --line-height-loose: 2;
}

/* Large Desktop (≥1400px) */
@media (min-width: 1400px) {
    :root {
        --font-size-xs: 0.8125rem;   /* 13px */
        --font-size-sm: 0.9375rem;   /* 15px */
        --font-size-base: 1.0625rem; /* 17px */
        --font-size-lg: 1.1875rem;   /* 19px */
        --font-size-xl: 1.3125rem;   /* 21px */
        --font-size-2xl: 1.5625rem;  /* 25px */
        --font-size-3xl: 1.9375rem;  /* 31px */
        --font-size-4xl: 2.3125rem;  /* 37px */
        --font-size-5xl: 3.0625rem;  /* 49px */
        --font-size-6xl: 3.8125rem;  /* 61px */
    }
}

/* Medium Desktop (1200px-1399px) - Default scale */
@media (min-width: 1200px) and (max-width: 1399px) {
    :root {
        /* Keep default values */
    }
}

/* Small Desktop (992px-1199px) */
@media (min-width: 992px) and (max-width: 1199px) {
    :root {
        --font-size-xs: 0.6875rem;   /* 11px */
        --font-size-sm: 0.8125rem;   /* 13px */
        --font-size-base: 0.9375rem; /* 15px */
        --font-size-lg: 1.0625rem;   /* 17px */
        --font-size-xl: 1.1875rem;   /* 19px */
        --font-size-2xl: 1.4375rem;  /* 23px */
        --font-size-3xl: 1.8125rem;  /* 29px */
        --font-size-4xl: 2.1875rem;  /* 35px */
        --font-size-5xl: 2.9375rem;  /* 47px */
        --font-size-6xl: 3.6875rem;  /* 59px */
    }
}

/* Tablet (768px-991px) */
@media (min-width: 768px) and (max-width: 991px) {
    :root {
        --font-size-xs: 0.625rem;    /* 10px */
        --font-size-sm: 0.75rem;     /* 12px */
        --font-size-base: 0.875rem;  /* 14px */
        --font-size-lg: 1rem;        /* 16px */
        --font-size-xl: 1.125rem;    /* 18px */
        --font-size-2xl: 1.375rem;   /* 22px */
        --font-size-3xl: 1.75rem;    /* 28px */
        --font-size-4xl: 2.125rem;   /* 34px */
        --font-size-5xl: 2.875rem;   /* 46px */
        --font-size-6xl: 3.625rem;   /* 58px */
    }
}

/* Large Mobile (576px-767px) */
@media (min-width: 576px) and (max-width: 767px) {
    :root {
        --font-size-xs: 0.5625rem;   /* 9px */
        --font-size-sm: 0.6875rem;   /* 11px */
        --font-size-base: 0.8125rem; /* 13px */
        --font-size-lg: 0.9375rem;   /* 15px */
        --font-size-xl: 1.0625rem;   /* 17px */
        --font-size-2xl: 1.3125rem;  /* 21px */
        --font-size-3xl: 1.6875rem;  /* 27px */
        --font-size-4xl: 2.0625rem;  /* 33px */
        --font-size-5xl: 2.8125rem;  /* 45px */
        --font-size-6xl: 3.5625rem;  /* 57px */
    }
}

/* Small Mobile (≤575px) */
@media (max-width: 575px) {
    :root {
        --font-size-xs: 0.5rem;      /* 8px */
        --font-size-sm: 0.625rem;    /* 10px */
        --font-size-base: 0.75rem;   /* 12px */
        --font-size-lg: 0.875rem;    /* 14px */
        --font-size-xl: 1rem;        /* 16px */
        --font-size-2xl: 1.25rem;    /* 20px */
        --font-size-3xl: 1.625rem;   /* 26px */
        --font-size-4xl: 2rem;       /* 32px */
        --font-size-5xl: 2.75rem;    /* 44px */
        --font-size-6xl: 3.5rem;     /* 56px */
    }
}

/* Apply Typography Scale to All Elements */
h1, .h1 {
    font-size: var(--font-size-5xl) !important;
    line-height: var(--line-height-tight) !important;
}

h2, .h2 {
    font-size: var(--font-size-4xl) !important;
    line-height: var(--line-height-tight) !important;
}

h3, .h3 {
    font-size: var(--font-size-3xl) !important;
    line-height: var(--line-height-snug) !important;
}

h4, .h4 {
    font-size: var(--font-size-2xl) !important;
    line-height: var(--line-height-snug) !important;
}

h5, .h5 {
    font-size: var(--font-size-xl) !important;
    line-height: var(--line-height-normal) !important;
}

h6, .h6 {
    font-size: var(--font-size-lg) !important;
    line-height: var(--line-height-normal) !important;
}

p, .lead {
    font-size: var(--font-size-base) !important;
    line-height: var(--line-height-relaxed) !important;
}

small, .small {
    font-size: var(--font-size-sm) !important;
    line-height: var(--line-height-normal) !important;
}

.display-1 {
    font-size: var(--font-size-6xl) !important;
    line-height: var(--line-height-tight) !important;
}

.display-2 {
    font-size: var(--font-size-5xl) !important;
    line-height: var(--line-height-tight) !important;
}

.display-3 {
    font-size: var(--font-size-4xl) !important;
    line-height: var(--line-height-tight) !important;
}

.display-4 {
    font-size: var(--font-size-3xl) !important;
    line-height: var(--line-height-snug) !important;
}

.display-5 {
    font-size: var(--font-size-2xl) !important;
    line-height: var(--line-height-snug) !important;
}

.display-6 {
    font-size: var(--font-size-xl) !important;
    line-height: var(--line-height-normal) !important;
}

/* Button Typography */
.btn {
    font-size: var(--font-size-base) !important;
    line-height: var(--line-height-normal) !important;
}

.btn-lg {
    font-size: var(--font-size-lg) !important;
    line-height: var(--line-height-normal) !important;
}

.btn-sm {
    font-size: var(--font-size-sm) !important;
    line-height: var(--line-height-normal) !important;
}

/* Form Elements */
.form-control, .form-select {
    font-size: var(--font-size-base) !important;
    line-height: var(--line-height-normal) !important;
}

.form-label {
    font-size: var(--font-size-sm) !important;
    line-height: var(--line-height-normal) !important;
}

/* Navigation */
.navbar-brand {
    font-size: var(--font-size-xl) !important;
    line-height: var(--line-height-tight) !important;
}

.nav-link {
    font-size: 0.8rem !important;
    line-height: var(--line-height-normal) !important;
}

/* Cards */
.card-title {
    font-size: var(--font-size-xl) !important;
    line-height: var(--line-height-snug) !important;
}

.card-text {
    font-size: var(--font-size-base) !important;
    line-height: var(--line-height-relaxed) !important;
}

/* Badges */
.badge {
    font-size: var(--font-size-xs) !important;
    line-height: var(--line-height-normal) !important;
}

/* Alerts */
.alert {
    font-size: var(--font-size-base) !important;
    line-height: var(--line-height-relaxed) !important;
}

/* ===== MOBILE-FIRST RESPONSIVE IMPROVEMENTS ===== */

/* Enhanced Mobile Hero Section */
@media (max-width: 768px) {
    /* Hero Section Mobile Optimization */
    .hero-slide {
        /* min-height: 100vh !important; */
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
        font-size: var(--font-size-4xl) !important;
        line-height: var(--line-height-tight) !important;
        margin-bottom: 1.5rem !important;
        word-wrap: break-word;
    }
    
    .hero-content p.lead {
        font-size: var(--font-size-lg) !important;
        line-height: var(--line-height-relaxed) !important;
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
        font-size: var(--font-size-base) !important;
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
        max-width: 408px;
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
        font-size: var(--font-size-2xl) !important;
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
        font-size: var(--font-size-lg) !important;
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
        /* padding: 3rem 0 !important; */
    }
    
    .container {
        padding: 0 1rem !important;
    }
    
    /* Typography Mobile - Now using CSS variables */
    h1, .h1 {
        font-size: var(--font-size-4xl) !important;
        line-height: var(--line-height-tight) !important;
        margin-bottom: 1.5rem !important;
    }
    
    h2, .h2 {
        font-size: var(--font-size-3xl) !important;
        line-height: var(--line-height-tight) !important;
        margin-bottom: 1.25rem !important;
    }
    
    h3, .h3 {
        font-size: var(--font-size-2xl) !important;
        line-height: var(--line-height-snug) !important;
        margin-bottom: 1rem !important;
    }
    
    p, .lead {
        font-size: var(--font-size-base) !important;
        line-height: var(--line-height-relaxed) !important;
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
        font-size: var(--font-size-4xl) !important;
        margin-bottom: 1rem !important;
    }
}

/* Mobile Touch Improvements */
@media (max-width: 768px) {
    /* Larger Touch Targets */
    .btn {
        min-height: 48px !important;
        padding: 0.75rem 1.5rem !important;
        font-size: var(--font-size-base) !important;
        border-radius: 25px !important;
        font-weight: 500 !important;
    }
    
    .btn-lg {
        min-height: 56px !important;
        padding: 1rem 2rem !important;
        font-size: var(--font-size-lg) !important;
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
        font-size: var(--font-size-base) !important;
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
    /* Sticky CTA Button - Hidden on mobile */
    .mobile-cta-sticky {
        display: none !important;
    }
    
    /* Floating Phone Button - Hidden on mobile */
    .mobile-phone-float {
        display: none !important;
    }
    
    /* Swipe Indicators */
    .swipe-indicator {
        position: absolute !important;
        bottom: 80px !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        color: rgba(255,255,255,0.8) !important;
        font-size: var(--font-size-sm) !important;
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

/* Course Cards Styling */
.course-card-image {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
}

.course-card-image:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2) !important;
}

.course-bg-image img {
    transition: transform 0.3s ease;
}

.course-card-image:hover .course-bg-image img {
    transform: scale(1.05);
}

/* Responsive Course Title Styling */
@media (max-width: 768px) {
    .course-card-image .position-absolute h6 {
        font-size: 0.8rem !important;
        line-height: 1.1 !important;
    }
    
    .course-card-image .position-absolute {
        padding: 0.75rem !important;
    }
}

@media (max-width: 576px) {
    .course-card-image .position-absolute h6 {
        font-size: 0.7rem !important;
        line-height: 1.0 !important;
    }
    
    .course-card-image .position-absolute {
        padding: 0.4rem !important;
    }
    
    .course-card-image {
        height: 140px !important;
    }
}

/* Extra Small Mobile Optimization */
@media (max-width: 480px) {
    .course-card-image {
        height: 120px !important;
    }
    
    .course-card-image .position-absolute h6 {
        font-size: 0.65rem !important;
        line-height: 1.0 !important;
    }
    
    .course-card-image .position-absolute {
        padding: 0.3rem !important;
    }
}

/* Slider Navigation */
.slider-nav-btn {
    width: 50px;
    height: 50px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #015862;
    font-size: 18px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.slider-nav-btn:hover {
    background: #015862;
    color: white;
    transform: scale(1.1);
}

.carousel-control-prev,
.carousel-control-next {
    width: auto;
    opacity: 1;
}

/* Modal Styling */
.modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.modal-header {
    background: linear-gradient(135deg, #015862 0%, #3EB850 100%);
    color: white;
    border-radius: 15px 15px 0 0;
}

.modal-header .btn-close {
    filter: invert(1);
}

/* New Teacher Design Styles */
.teacher-card-new {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
}

.teacher-card-new::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(249, 210, 0, 0.1), transparent);
    transition: left 0.5s;
}

.teacher-card-new:hover::before {
    left: 100%;
}

.teacher-card-new:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    border-color: #F9D200;
}

.teacher-avatar-new {
    margin-bottom: 1.5rem;
    position: relative;
}

.teacher-img {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #F9D200;
    box-shadow: 0 8px 20px rgba(249, 210, 0, 0.3);
    transition: all 0.3s ease;
}

.teacher-img-placeholder {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    background: linear-gradient(135deg, #015862, #F9D200);
    border: 4px solid #F9D200;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 3rem;
    margin: 0 auto;
    box-shadow: 0 8px 20px rgba(249, 210, 0, 0.3);
}

.teacher-card-new:hover .teacher-img,
.teacher-card-new:hover .teacher-img-placeholder {
    transform: scale(1.1);
    box-shadow: 0 12px 25px rgba(249, 210, 0, 0.4);
}

.teacher-name-new {
    font-size: var(--font-size-xl);
    font-weight: 700;
    color: #015862;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    line-height: var(--line-height-tight);
}

.teacher-role-new {
    font-size: var(--font-size-sm);
    color: #6c757d;
    margin-bottom: 1rem;
    font-weight: 500;
    line-height: var(--line-height-normal);
}

.teacher-social-new {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.social-icon {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.social-icon:hover {
    background: #F9D200;
    border-color: #F9D200;
    color: white;
    transform: scale(1.1);
}

.teacher-achievement-new {
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: #015862;
    background: rgba(249, 210, 0, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    border: 1px solid rgba(249, 210, 0, 0.3);
    line-height: var(--line-height-normal);
}

.btn-view-all {
    background: linear-gradient(135deg, #F9D200, #F57F25);
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    font-size: var(--font-size-lg);
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(249, 210, 0, 0.3);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    line-height: var(--line-height-normal);
}

.btn-view-all:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(249, 210, 0, 0.4);
    color: white;
}

.btn-view-all i {
    transition: transform 0.3s ease;
}

.btn-view-all:hover i {
    transform: translateX(5px);
}

/* Teacher Modal Styles */
.teacher-modal-content {
    display: flex;
    gap: 2rem;
}

.teacher-modal-avatar {
    flex-shrink: 0;
}

.teacher-modal-avatar img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #F9D200;
    box-shadow: 0 10px 25px rgba(249, 210, 0, 0.3);
}

.teacher-modal-info {
    flex: 1;
}

.teacher-modal-name {
    font-size: 1.8rem;
    font-weight: 700;
    color: #015862;
    margin-bottom: 0.5rem;
}

.teacher-modal-specialization {
    font-size: 1.1rem;
    color: #F9D200;
    font-weight: 600;
    margin-bottom: 1rem;
}

.teacher-modal-certification {
    background: linear-gradient(135deg, #F9D200, #F57F25);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 1rem;
}

.teacher-modal-bio {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.teacher-modal-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.stat-item {
    text-align: center;
    padding: 1rem;
    background: rgba(249, 210, 0, 0.1);
    border-radius: 10px;
    border: 1px solid rgba(249, 210, 0, 0.2);
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: #015862;
    display: block;
}

.stat-label {
    font-size: 0.8rem;
    color: #6c757d;
    text-transform: uppercase;
    font-weight: 500;
}

.teacher-modal-social {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.teacher-modal-social a {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: #F9D200;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 1.1rem;
}

.teacher-modal-social a:hover {
    transform: scale(1.1);
    background: #F57F25;
    color: white;
}

/* Teachers Slider Styles */
#teachersSlider {
    position: relative;
    overflow: hidden;
}

#teachersSlider .carousel-indicators {
    bottom: -50px;
}

#teachersSlider .carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(249, 210, 0, 0.5);
    border: 2px solid #F9D200;
    margin: 0 5px;
    transition: all 0.3s ease;
}

#teachersSlider .carousel-indicators [data-bs-target].active {
    background-color: #F9D200;
    transform: scale(1.2);
}

#teachersSlider .carousel-control-prev,
#teachersSlider .carousel-control-next {
    width: 50px;
    height: 50px;
    background: rgba(249, 210, 0, 0.9);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    border: 2px solid #F9D200;
    opacity: 0.8;
    transition: all 0.3s ease;
}

#teachersSlider .carousel-control-prev:hover,
#teachersSlider .carousel-control-next:hover {
    background: #F9D200;
    opacity: 1;
    transform: translateY(-50%) scale(1.1);
}

#teachersSlider .carousel-control-icon {
    color: #015862;
    font-size: 1.2rem;
    font-weight: bold;
}

#teachersSlider .carousel-control-prev:hover .carousel-control-icon,
#teachersSlider .carousel-control-next:hover .carousel-control-icon {
    color: white;
}

#teachersSlider .carousel-item {
    transition: transform 0.6s ease-in-out;
}

#teachersSlider .carousel-item.active {
    animation: slideInRight 0.6s ease-out;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100%);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Responsive Design for New Teacher Cards */
@media (max-width: 768px) {
    .teacher-card-new {
        padding: 1.2rem;
    }
    
    .teacher-img,
    .teacher-img-placeholder {
        width: 110px;
        height: 110px;
    }
    
    .teacher-img-placeholder {
        font-size: 2.5rem;
    }
    
    .teacher-name-new {
        font-size: var(--font-size-lg);
    }
    
    .teacher-role-new {
        font-size: var(--font-size-xs);
    }
    
    .teacher-achievement-new {
        font-size: var(--font-size-xs);
        padding: 0.3rem 0.6rem;
    }
    
    .btn-view-all {
        padding: 0.8rem 1.5rem;
        font-size: var(--font-size-base);
    }
    
    .teacher-modal-content {
        flex-direction: column;
        text-align: center;
    }
    
    .teacher-modal-avatar img {
        width: 120px;
        height: 120px;
    }
    
    .teacher-modal-name {
        font-size: var(--font-size-2xl);
    }
    
    .teacher-modal-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    /* Mobile Slider Adjustments */
    #teachersSlider .carousel-control-prev,
    #teachersSlider .carousel-control-next {
        width: 40px;
        height: 40px;
    }
    
    #teachersSlider .carousel-indicators {
        bottom: -40px;
    }
    
    #teachersSlider .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
    }
}

/* Small Mobile - 2 columns layout */
@media (max-width: 576px) {
    .teacher-card-new {
        padding: 1rem;
    }
    
    .teacher-img,
    .teacher-img-placeholder {
        width: 100px;
        height: 100px;
    }
    
    .teacher-img-placeholder {
        font-size: 2rem;
    }
    
    .teacher-name-new {
        font-size: var(--font-size-base);
        margin-bottom: 0.3rem;
    }
    
    .teacher-role-new {
        font-size: var(--font-size-xs);
        margin-bottom: 0.8rem;
    }
    
    .teacher-social-new {
        gap: 0.3rem;
        margin-bottom: 0.8rem;
    }
    
    .social-icon {
        width: 28px;
        height: 28px;
        font-size: var(--font-size-xs);
    }
    
    .teacher-achievement-new {
        font-size: var(--font-size-xs);
        padding: 0.25rem 0.5rem;
    }
    
    /* Adjust grid for 2 columns on small mobile */
    #teachersSlider .col-lg-3.col-md-6.mb-4 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    
    #teachersSlider .carousel-control-prev,
    #teachersSlider .carousel-control-next {
        width: 35px;
        height: 35px;
    }
    
    #teachersSlider .carousel-control-icon {
        font-size: var(--font-size-base);
    }
    
    #teachersSlider .carousel-indicators {
        bottom: -35px;
    }
    
    #teachersSlider .carousel-indicators [data-bs-target] {
        width: 8px;
        height: 8px;
        margin: 0 3px;
    }
}

/* Video & About Section Styles */
.video-container {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.video-wrapper {
    background: #000;
    border-radius: 10px;
}

.video-wrapper iframe {
    border-radius: 10px;
}

.about-content {
    padding: 2rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    height: 100%;
}

.section-title {
    color: #2c3e50;
    font-size: 1.8rem;
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: 1.5rem;
}

.about-text p {
    color: #495057;
    line-height: 1.6;
    font-size: 1rem;
    margin-bottom: 1rem;
}

.about-text strong {
    color: #2c3e50;
    font-weight: 700;
}

.about-text .fas.fa-bolt {
    color: #ffc107;
    font-size: 1.1rem;
}

.action-buttons {
    margin-top: 2rem;
}

.action-buttons .btn {
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.action-buttons .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.action-buttons .btn-secondary {
    background: #6c757d;
    border-color: #6c757d;
    color: white;
}

.action-buttons .btn-secondary:hover {
    background: #5a6268;
    border-color: #5a6268;
    color: white;
}

.action-buttons .btn-success {
    background: #28a745;
    border-color: #28a745;
    color: white;
}

.action-buttons .btn-success:hover {
    background: #218838;
    border-color: #218838;
    color: white;
}

.action-buttons .btn-primary {
    background: #007bff;
    border-color: #007bff;
    color: white;
}

.action-buttons .btn-primary:hover {
    background: #0056b3;
    border-color: #0056b3;
    color: white;
}

/* Responsive Design */
@media (max-width: 991px) {
    .about-content {
        padding: 1.5rem;
        margin-top: 1rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .about-text p {
        font-size: 0.95rem;
    }
}

@media (max-width: 768px) {
    .about-content {
        padding: 1rem;
    }
    
    .section-title {
        font-size: 1.3rem;
        text-align: center;
    }
    
    .about-text p {
        font-size: 0.9rem;
    }
    
    .action-buttons {
        text-align: center;
    }
    
    .action-buttons .btn {
        width: 100%;
        justify-content: center;
        margin-bottom: 0.5rem;
    }
}

@media (max-width: 576px) {
    .video-container {
        border-radius: 8px;
    }
    
    .video-wrapper {
        border-radius: 8px;
    }
    
    .video-wrapper iframe {
        border-radius: 8px;
    }
    
    .about-content {
        border-radius: 10px;
    }
    
    .section-title {
        font-size: 1.2rem;
    }
    
    .about-text p {
        font-size: 0.85rem;
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
    
    // Initialize Teachers Slider
    const teachersSlider = document.getElementById('teachersSlider');
    
    if (teachersSlider) {
        // Initialize carousel
        const carousel = new bootstrap.Carousel(teachersSlider, {
            interval: 5000,
            wrap: true,
            touch: true
        });
        
        // Add animation to cards when carousel slides
        teachersSlider.addEventListener('slide.bs.carousel', function (e) {
            // Reset animations
            const allCards = this.querySelectorAll('.teacher-card-new');
            allCards.forEach(card => {
                card.style.animation = 'none';
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
            });
        });
        
        teachersSlider.addEventListener('slid.bs.carousel', function (e) {
            // Animate new active slide cards
            const activeSlide = this.querySelector('.carousel-item.active');
            const cards = activeSlide.querySelectorAll('.teacher-card-new');
            
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.animation = 'fadeInUp 0.8s ease forwards';
                    card.style.animationDelay = `${index * 0.15}s`;
                }, 100);
            });
        });
        
        // Pause carousel on hover
        teachersSlider.addEventListener('mouseenter', function() {
            carousel.pause();
        });
        
        teachersSlider.addEventListener('mouseleave', function() {
            carousel.cycle();
        });
        
        // Initialize first slide animations
        const firstSlideCards = teachersSlider.querySelectorAll('.carousel-item.active .teacher-card-new');
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
                    const firstSlideCards = entry.target.querySelectorAll('.carousel-item.active .teacher-card-new');
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
        
        teacherObserver.observe(teachersSlider);
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

// Teacher Modal Functions
function openTeacherModal(teacherId) {
    // Show loading state
    const modalBody = document.getElementById('teacherModalBody');
    modalBody.innerHTML = `
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3">Đang tải thông tin giảng viên...</p>
        </div>
    `;
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('teacherModal'));
    modal.show();
    
    // Fetch teacher data
    fetch(`/api/teachers/${teacherId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const teacher = data.teacher;
                modalBody.innerHTML = `
                    <div class="teacher-modal-content">
                        <div class="teacher-modal-avatar">
                            ${teacher.avatar ? 
                                `<img src="/storage/${teacher.avatar}" alt="${teacher.name}">` :
                                `<div class="teacher-img-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>`
                            }
                        </div>
                        <div class="teacher-modal-info">
                            <h3 class="teacher-modal-name">${teacher.name}</h3>
                            <p class="teacher-modal-specialization">${teacher.specialization}</p>
                            <div class="teacher-modal-certification">${teacher.certification}</div>
                            <p class="teacher-modal-bio">${teacher.bio || 'Thông tin chi tiết về giảng viên sẽ được cập nhật sớm.'}</p>
                            
                            <div class="teacher-modal-stats">
                                <div class="stat-item">
                                    <span class="stat-number">${teacher.experience_years || 0}</span>
                                    <span class="stat-label">Năm kinh nghiệm</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">${teacher.is_featured ? 'Có' : 'Không'}</span>
                                    <span class="stat-label">Giảng viên nổi bật</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">${teacher.is_active ? 'Đang dạy' : 'Tạm nghỉ'}</span>
                                    <span class="stat-label">Trạng thái</span>
                                </div>
                            </div>
                            
                            <div class="teacher-modal-social">
                                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" title="TikTok"><i class="fab fa-tiktok"></i></a>
                                <a href="#" title="Email"><i class="fas fa-envelope"></i></a>
                                <a href="#" title="Phone"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                modalBody.innerHTML = `
                    <div class="text-center py-4">
                        <i class="fas fa-exclamation-triangle text-warning fa-3x mb-3"></i>
                        <h5>Không tìm thấy thông tin</h5>
                        <p class="text-muted">Không thể tải thông tin giảng viên. Vui lòng thử lại sau.</p>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error fetching teacher data:', error);
            modalBody.innerHTML = `
                <div class="text-center py-4">
                    <i class="fas fa-exclamation-triangle text-danger fa-3x mb-3"></i>
                    <h5>Lỗi kết nối</h5>
                    <p class="text-muted">Không thể kết nối đến máy chủ. Vui lòng kiểm tra kết nối internet và thử lại.</p>
                </div>
            `;
        });
}
</script>
@endpush

<!-- Teacher Modal -->
<div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="teacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="teacherModalLabel">Thông tin Giảng viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="teacherModalBody">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Mobile-only elements -->
<div class="d-md-none">
    <!-- Mobile sticky CTA will be added by JavaScript -->
    <!-- Mobile floating phone will be added by JavaScript -->
</div>



@endsection


