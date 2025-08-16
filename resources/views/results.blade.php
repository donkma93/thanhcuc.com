@extends('layouts.app')

@section('title', 'Kết Quả Học Viên - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')

<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">KẾT QUẢ HỌC VIÊN</h1>
                <p class="lead">Thành tích và phản hồi từ học viên Thanh Cúc</p>
            </div>
        </div>
    </div>
 </section>

<!-- Student Results Section -->
<section class="py-5 student-results-section" id="student-results">
    <div class="container">


        <!-- Scores Section -->
        @if($scores->count() > 0)
        <div class="mb-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary mb-3">CHỨNG CHỈ B1 CỦA HỌC VIÊN THANH CÚC</h2>
                <p class="text-muted">Những tấm bằng B1 có điểm số ấn tượng trong thời gian qua của Thanh Cúc</p>
                            </div>
            
            <!-- Scores Grid -->
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                @foreach($scores as $index => $score)
                    <div class="col">
                        <div class="slider-card" data-gallery="scores" data-index="{{ $index }}" onclick="openGallery('scores', {{ $index }})" role="button">
                            <div class="slider-image-container">
                                <img src="{{ $score->image_url }}" 
                                     alt="{{ $score->title }}" 
                                     class="slider-image">
                                @if($score->level)
                                    <div class="slider-level-badge">
                                        <span class="badge bg-primary">{{ $score->level }}</span>
                                    </div>
                                @endif
                                <div class="slider-overlay">
                                    <div class="slider-content">
                                        <h6 class="text-white fw-bold mb-1">{{ $score->title }}</h6>
                                        <p class="text-white-50 small mb-1">{{ Str::limit($score->description, 80) }}</p>
                                        @if($score->student_name)
                                            <span class="badge bg-light text-dark small">
                                                <i class="fas fa-user me-1"></i>{{ $score->student_name }}
                                            </span>
                                        @endif
                                        @if($score->score)
                                            <span class="badge bg-success small ms-1">
                                                <i class="fas fa-chart-line me-1"></i>{{ $score->score }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Feedbacks Section -->
        @if($feedbacks->count() > 0)
        <div class="mb-5 bg-light py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-primary mb-3">PHẢN HỒI HỌC VIÊN</h2>
                    <p class="text-muted">Những chia sẻ chân thực và đánh giá tích cực từ học viên</p>
                            </div>
                
                <!-- Feedbacks Grid -->
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                    @foreach($feedbacks as $index => $feedback)
                        <div class="col">
                            <div class="slider-card" data-gallery="feedbacks" data-index="{{ $index }}" onclick="openGallery('feedbacks', {{ $index }})" role="button">
                                <div class="slider-image-container">
                                    <img src="{{ $feedback->image_url }}" 
                                         alt="{{ $feedback->title }}" 
                                         class="slider-image">
                                    @if($feedback->level)
                                        <div class="slider-level-badge">
                                            <span class="badge bg-info">{{ $feedback->level }}</span>
                                        </div>
                                    @endif
                                    <div class="slider-overlay">
                                        <div class="slider-content">
                                            <h6 class="text-white fw-bold mb-1">{{ $feedback->title }}</h6>
                                            <p class="text-white-50 small mb-1">{{ Str::limit($feedback->description, 80) }}</p>
                                            @if($feedback->student_name)
                                                <span class="badge bg-light text-dark small">
                                                    <i class="fas fa-user me-1"></i>{{ $feedback->student_name }}
                                                </span>
                                            @endif
                                            @if($feedback->certificate_type)
                                                <span class="badge bg-warning small ms-1">
                                                    <i class="fas fa-certificate me-1"></i>{{ $feedback->certificate_type }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
            </div>
        @endif

        <!-- Featured Courses Section -->
        @if($featuredCourses->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="display-2 fw-bold text-primary mb-4">KHÓA HỌC NỔI BẬT</h2>
                    <p class="lead text-muted">Khám phá các khóa học tiếng Đức chất lượng cao với phương pháp giảng dạy hiện đại</p>
                </div>
                
                <!-- Courses Grid -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach($featuredCourses as $course)
                        <div class="col">
                            <div class="sec-course-card position-relative overflow-hidden rounded shadow-lg" style="cursor: pointer;" 
                                 onclick="openCourseModal({{ $course->id }}, '{{ $course->name }}', false)">
                                <!-- Course Image as Background -->
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
                                
                                <!-- Course Name -->
                                <div class="sec-roadmap position-absolute bottom-0 start-0 w-100 text-center pb-2">
                                    <small class="text-white fw-bold" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                                        {{ $course->name }}
                                    </small>
                                </div>
                            </div>
                            
                            <!-- View More Button -->
                            <div class="text-center mt-2">
                                <button class="btn btn-outline-warning btn-sm sec-view-more" 
                                        onclick="openCourseModal({{ $course->id }}, '{{ $course->name }}', false)">
                                    XEM THÊM <i class="fas fa-chevron-right ms-1"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Course Registration Section (moved from homepage) -->
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

                        @if($courseOffers->count() > 0)
                            <div class="row g-4">
                                @foreach($courseOffers as $offer)
                                    <div class="col-md-6">
                                        <div class="offer-card h-100">
                                            <div class="offer-icon">
                                                @if(!empty($offer->icon))
                                                    <i class="{{ $offer->icon }}"></i>
                                                @else
                                                    <i class="fas fa-gift"></i>
                                                @endif
                                            </div>
                                            <h5 class="fw-bold mb-2 text-danger">{{ $offer->title }}</h5>
                                            <p class="text-muted mb-0">{{ $offer->description }}</p>
                                            @if($offer->badge_text)
                                                <div class="offer-badge">
                                                    <span class="badge bg-danger">{{ $offer->badge_text }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <!-- Fallback offers if no database offers -->
                            <div class="row g-4">
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

                                <div class="col-md-12">
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
                            </div>
                        @endif

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
    </div>
</section>

<!-- Image Gallery Modal -->
<div class="modal fade" id="imageGalleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white" id="galleryModalTitle">Gallery</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="position-relative">
                    <img id="galleryModalImage" src="" alt="" class="img-fluid w-100" style="max-height: 70vh; object-fit: contain;">
                    
                    <!-- Navigation arrows -->
                    <button class="gallery-nav gallery-prev" onclick="changeGalleryImage(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="gallery-nav gallery-next" onclick="changeGalleryImage(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Image counter -->
                    <div class="gallery-counter">
                        <span id="currentImageIndex">1</span> / <span id="totalImages">1</span>
                    </div>
                </div>
                
                <!-- Image info -->
                <div class="p-4">
                    <h6 class="text-white mb-2" id="galleryImageTitle">Title</h6>
                    <p class="text-light mb-0" id="galleryImageDescription">Description</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Course Modal -->
<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
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
                <a href="{{ route('contact') }}" class="btn btn-primary" id="contactBtn">
                    <i class="fas fa-envelope me-1"></i>Liên Hệ Ngay
                </a>
                <a href="{{ route('trial') }}" class="btn btn-primary" id="trialBtn">
                    <i class="fas fa-calendar-check me-1"></i>Đăng ký học thử
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<style>
/* Student Results Section Styles */
.student-results-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.title-highlight {
    color: var(--primary-color);
    position: relative;
}

.title-highlight::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--primary-color);
    border-radius: 2px;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}



/* Featured Courses Styles */
.sec-course-card {
    width: 100%;
    height: 200px;
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
}

.sec-course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.sec-bg-gradient {
    background: linear-gradient(135deg, #FFD700 0%, #FF8C00 50%, #FF4500 100%);
}

.sec-roadmap {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
    padding: 20px 10px 10px;
    text-align: center;
}

.sec-view-more {
    border: 2px solid #FF8C00;
    color: #FF8C00;
    font-weight: 600;
    padding: 8px 16px;
    border-radius: 25px;
    transition: all 0.3s ease;
    background: transparent;
}

.sec-view-more:hover {
    background: #FF8C00;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
}

/* Course Modal Styles */
.modal-header {
    background: linear-gradient(135deg, #015862 0%, #3EB850 100%);
    color: white;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #015862 0%, #3EB850 100%);
}

/* Gallery Slider Styles */
.gallery-slider {
    overflow: hidden;
    position: relative;
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease;
    gap: 20px;
}

.slider-item {
    flex: 0 0 300px;
    height: 250px;
    cursor: pointer;
}

.slider-card {
    height: 100%;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.slider-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.slider-image-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.slider-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.slider-card:hover .slider-image {
    transform: scale(1.1);
}

.slider-level-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 3;
}

.slider-level-badge .badge {
    font-size: 0.8rem;
    padding: 6px 10px;
    border-radius: 15px;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.slider-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(1, 88, 98, 0.8), rgba(62, 184, 80, 0.8));
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: end;
    padding: 1.5rem;
    z-index: 2;
}

.slider-card:hover .slider-overlay {
    opacity: 1;
}

.slider-content {
    transform: translateY(20px);
    transition: transform 0.3s ease;
    width: 100%;
}

.slider-card:hover .slider-content {
    transform: translateY(0);
}

.slider-click-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 4;
    pointer-events: auto;
    cursor: pointer;
}

.slider-card:hover .slider-click-overlay {
    opacity: 1;
}

/* Slider Navigation */
.slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(1, 88, 98, 0.8);
    border: none;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 5;
    cursor: pointer;
}

.slider-nav:hover {
    background: var(--primary-color);
    transform: translateY(-50%) scale(1.1);
    color: white;
}

.slider-prev {
    left: -25px;
}

.slider-next {
    right: -25px;
}

/* Gallery Modal Styles */
.gallery-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 10;
    cursor: pointer;
}

.gallery-nav:hover {
    background: rgba(0, 0, 0, 0.8);
    transform: translateY(-50%) scale(1.1);
    color: white;
}

.gallery-prev {
    left: 20px;
}

.gallery-next {
    right: 20px;
}

.gallery-counter {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    z-index: 10;
}

/* Offer Cards and Registration Styles (imported) */
.offers-header h3 { color: #2c3e50; }
.offer-card { background: white; padding: 1.5rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; border: 1px solid rgba(0, 0, 0, 0.05); position: relative; overflow: hidden; }
.offer-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); }
.offer-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(135deg, #015862, #3EB850); }
.offer-icon { width: 50px; height: 50px; background: linear-gradient(135deg, #015862, #3EB850); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; }
.offer-icon i { font-size: 20px; color: white; }
.offer-card h5 { margin-bottom: 0.8rem; font-size: 1.1rem; }
.offer-card p { line-height: 1.5; margin-bottom: 1rem; font-size: 0.9rem; }
.offer-badge { margin-top: 0.5rem; }
.offer-badge .badge { font-size: 0.75rem; padding: 0.4rem 0.8rem; }
.urgency-notice { animation: pulse-border 2s ease-in-out infinite; }
@keyframes pulse-border { 0%, 100% { border-color: #ffc107; } 50% { border-color: #ff8c00; } }
.registration-form-card { background: linear-gradient(135deg, #015862, #3EB850); padding: 2.5rem; border-radius: 20px; box-shadow: 0 15px 35px rgba(1, 88, 98, 0.3); position: relative; overflow: hidden; }
.registration-form-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%); pointer-events: none; }
.form-header { position: relative; z-index: 2; }
.form-icon { width: 80px; height: 80px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; backdrop-filter: blur(10px); border: 2px solid rgba(255, 255, 255, 0.3); }
.form-icon i { font-size: 32px; color: white; }
.consultation-form { position: relative; z-index: 2; }
.consultation-form .form-control, .consultation-form .form-select { border: 2px solid rgba(255, 255, 255, 0.2); background: rgba(255, 255, 255, 0.95); border-radius: 10px; padding: 0.75rem 1rem; font-size: 16px; height: auto; transition: all 0.3s ease; backdrop-filter: blur(10px); }
.consultation-form .form-control:focus, .consultation-form .form-select:focus { border-color: rgba(255, 255, 255, 0.5); background: white; box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25); transform: translateY(-2px); }
.consultation-form .form-control::placeholder { color: #6c757d; }
.consultation-form .btn-warning { background: linear-gradient(135deg, #ffc107, #ff8c00); border: none; border-radius: 10px; font-weight: 600; letter-spacing: 0.5px; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4); }
.consultation-form .btn-warning:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(255, 193, 7, 0.6); background: linear-gradient(135deg, #ff8c00, #ffc107); }
@media (max-width: 991px) { .offer-card { padding: 1.25rem; margin-bottom: 1rem; } .registration-form-card { padding: 2rem; margin-top: 2rem; } .offer-icon { width: 45px; height: 45px; margin-bottom: 0.8rem; } .offer-icon i { font-size: 18px; } .form-icon { width: 60px; height: 60px; } .form-icon i { font-size: 24px; } .offers-header h3 { font-size: 1.3rem; } .urgency-notice { margin-top: 2rem !important; } }

/* Responsive Design */
@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }
    
    .slider-item {
        flex: 0 0 250px;
        height: 200px;
    }
    
    .slider-overlay {
        padding: 1rem;
    }
    
    .slider-nav {
        width: 40px;
        height: 40px;
    }
    
    .slider-prev {
        left: -20px;
    }
    
    .slider-next {
        right: -20px;
    }
    
    .gallery-nav {
        width: 50px;
        height: 50px;
    }
}

@media (max-width: 576px) {
    .slider-item {
        flex: 0 0 200px;
        height: 180px;
    }
    
    .slider-container {
        gap: 15px;
    }
    
    .gallery-nav {
        width: 45px;
        height: 45px;
    }
    
    .gallery-prev {
        left: 10px;
    }
    
    .gallery-next {
        right: 10px;
    }
    
    .result-content {
        padding: 1rem;
    }
}

/* Animation for scroll */
.slider-item {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.6s ease forwards;
}

.slider-item:nth-child(1) { animation-delay: 0.1s; }
.slider-item:nth-child(2) { animation-delay: 0.2s; }
.slider-item:nth-child(3) { animation-delay: 0.3s; }
.slider-item:nth-child(4) { animation-delay: 0.4s; }
.slider-item:nth-child(5) { animation-delay: 0.5s; }
.slider-item:nth-child(6) { animation-delay: 0.6s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
    }
</style>
@endpush

@push('scripts')
<script>
// Gallery data from database
@php
    $allScores = \App\Models\StudentResult::scores()->active()->ordered()->get();
    $allFeedbacks = \App\Models\StudentResult::feedbacks()->active()->ordered()->get();
@endphp

const galleryData = {
    scores: [
        @foreach($allScores as $score)
        {
            image: '{{ $score->image_url }}',
            title: '{{ $score->title }}',
            description: '{{ $score->description ?? '' }}',
            student_name: '{{ $score->student_name ?? '' }}',
            level: '{{ $score->level ?? '' }}',
            score: '{{ $score->score ?? '' }}',
            certificate_type: '{{ $score->certificate_type ?? '' }}'
        }@if(!$loop->last),@endif
        @endforeach
    ],
    feedbacks: [
        @foreach($allFeedbacks as $feedback)
        {
            image: '{{ $feedback->image_url }}',
            title: '{{ $feedback->title }}',
            description: '{{ $feedback->description ?? '' }}',
            student_name: '{{ $feedback->student_name ?? '' }}',
            level: '{{ $feedback->level ?? '' }}',
            certificate_type: '{{ $feedback->certificate_type ?? '' }}'
        }@if(!$loop->last),@endif
        @endforeach
    ]
};

// Slider positions
const sliderPositions = {
    scoresSlider: 0,
    feedbacksSlider: 0
};

// Current gallery state
let currentGallery = null;
let currentImageIndex = 0;

// Move slider function
function moveSlider(sliderId, direction) {
    const slider = document.getElementById(sliderId);
    const container = slider.querySelector('.slider-container');
    const items = container.querySelectorAll('.slider-item');
    const itemWidth = 320; // 300px + 20px gap
    const visibleItems = Math.floor(slider.offsetWidth / itemWidth);
    const maxPosition = -(items.length - visibleItems) * itemWidth;
    
    // Only move if there are more items than visible
    if (items.length <= visibleItems) {
        return;
    }
    
    sliderPositions[sliderId] += direction * itemWidth;
    
    // Boundary checks
    if (sliderPositions[sliderId] > 0) {
        sliderPositions[sliderId] = 0;
    } else if (sliderPositions[sliderId] < maxPosition) {
        sliderPositions[sliderId] = maxPosition;
    }
    
    container.style.transform = `translateX(${sliderPositions[sliderId]}px)`;
    
    // Update navigation button states
    updateNavigationButtons(sliderId);
}

// Update navigation button states
function updateNavigationButtons(sliderId) {
    const slider = document.getElementById(sliderId);
    const container = slider.querySelector('.slider-container');
    const items = container.querySelectorAll('.slider-item');
    const itemWidth = 320;
    const visibleItems = Math.floor(slider.offsetWidth / itemWidth);
    const maxPosition = -(items.length - visibleItems) * itemWidth;
    
    const prevBtn = slider.parentElement.querySelector('.slider-prev');
    const nextBtn = slider.parentElement.querySelector('.slider-next');
    
    if (prevBtn && nextBtn) {
        // Disable/enable prev button
        if (sliderPositions[sliderId] >= 0) {
            prevBtn.style.opacity = '0.5';
            prevBtn.style.pointerEvents = 'none';
        } else {
            prevBtn.style.opacity = '1';
            prevBtn.style.pointerEvents = 'auto';
        }
        
        // Disable/enable next button
        if (sliderPositions[sliderId] <= maxPosition) {
            nextBtn.style.opacity = '0.5';
            nextBtn.style.pointerEvents = 'none';
        } else {
            nextBtn.style.opacity = '1';
            nextBtn.style.pointerEvents = 'auto';
        }
    }
}

    // Open gallery modal
    function openGallery(galleryType, imageIndex) {
    console.log('Opening gallery:', galleryType, imageIndex);
    console.log('Gallery data:', galleryData);
        
    currentGallery = galleryType;
        currentImageIndex = imageIndex;
        
    const modal = new bootstrap.Modal(document.getElementById('imageGalleryModal'));
            updateGalleryModal();
            modal.show();
    }

    // Update gallery modal content
    function updateGalleryModal() {
    console.log('Updating modal for:', currentGallery, currentImageIndex);
        
    if (!currentGallery || !galleryData[currentGallery]) {
        console.log('No gallery data found for:', currentGallery);
            return;
        }
        
    const data = galleryData[currentGallery];
    const currentImage = data[currentImageIndex];
    
        console.log('Current image data:', currentImage);
    
    if (!currentImage) {
        console.log('No image found at index:', currentImageIndex);
        return;
    }
        
        const modalImage = document.getElementById('galleryModalImage');
    modalImage.src = currentImage.image;
    modalImage.alt = currentImage.title;
    
    // Add error handling for missing images
    modalImage.onerror = function() {
        console.log('Image failed to load:', currentImage.image);
        this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxOCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkltYWdlIG5vdCBmb3VuZDwvdGV4dD48L3N2Zz4=';
    };
    
    document.getElementById('galleryImageTitle').textContent = currentImage.title;
    
    // Build description with additional info
    let description = currentImage.description || '';
    if (currentImage.student_name) {
        description += (description ? ' | ' : '') + 'Học viên: ' + currentImage.student_name;
    }
    if (currentImage.level) {
        description += (description ? ' | ' : '') + 'Cấp độ: ' + currentImage.level;
    }
    if (currentImage.score) {
        description += (description ? ' | ' : '') + 'Điểm: ' + currentImage.score;
    }
    if (currentImage.certificate_type) {
        description += (description ? ' | ' : '') + 'Chứng chỉ: ' + currentImage.certificate_type;
    }
    
    document.getElementById('galleryImageDescription').textContent = description;
    document.getElementById('currentImageIndex').textContent = currentImageIndex + 1;
    document.getElementById('totalImages').textContent = data.length;
    
    // Update modal title
    const modalTitle = currentGallery === 'scores' ? 'CHỨNG CHỈ B1 CỦA HỌC VIÊN THANH CÚC' : 'PHẢN HỒI HỌC VIÊN';
    document.getElementById('galleryModalTitle').textContent = modalTitle;
    }

    // Change gallery image
    function changeGalleryImage(direction) {
    if (!currentGallery || !galleryData[currentGallery]) return;
        
    const data = galleryData[currentGallery];
        currentImageIndex += direction;
        
        // Boundary checks with loop
    if (currentImageIndex >= data.length) {
            currentImageIndex = 0;
        } else if (currentImageIndex < 0) {
        currentImageIndex = data.length - 1;
        }
        
        updateGalleryModal();
    }

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Add click event listeners to slider items
    document.querySelectorAll('.slider-item').forEach(item => {
        item.addEventListener('click', function() {
            const galleryType = this.getAttribute('data-gallery');
            const imageIndex = parseInt(this.getAttribute('data-index'));
            openGallery(galleryType, imageIndex);
        });
    });
    


    // Keyboard navigation for gallery
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('imageGalleryModal');
        if (modal.classList.contains('show')) {
            if (e.key === 'ArrowLeft') {
                changeGalleryImage(-1);
            } else if (e.key === 'ArrowRight') {
                changeGalleryImage(1);
            } else if (e.key === 'Escape') {
                bootstrap.Modal.getInstance(modal).hide();
            }
        }
    });
    
    // Grids do not require slider navigation initialization
    
    // Auto-resize sliders on window resize
    window.addEventListener('resize', function() {
        // Reset slider positions on resize
        Object.keys(sliderPositions).forEach(sliderId => {
            sliderPositions[sliderId] = 0;
            const slider = document.getElementById(sliderId);
            if (slider) {
                const container = slider.querySelector('.slider-container');
                container.style.transform = 'translateX(0px)';
                updateNavigationButtons(sliderId);
            }
        });
    });
    
    // Touch/swipe support for mobile
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    
    document.querySelectorAll('.gallery-slider').forEach(slider => {
        slider.addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
            isDragging = true;
        });
        
        slider.addEventListener('touchmove', function(e) {
            if (!isDragging) return;
            currentX = e.touches[0].clientX;
        });
        
        slider.addEventListener('touchend', function(e) {
            if (!isDragging) return;
            isDragging = false;
            
            const diffX = startX - currentX;
            const threshold = 50;
            
            if (Math.abs(diffX) > threshold) {
                const direction = diffX > 0 ? 1 : -1;
                moveSlider(this.id, direction);
            }
        });
    });
    
    // Course Modal Functionality
    window.openCourseModal = function(courseId, courseName, isFromHomepage = false) {
        // Show loading spinner
        document.getElementById('courseModalBody').innerHTML = `
            <div class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Đang tải thông tin khóa học...</p>
            </div>
        `;
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('courseModal'));
        modal.show();
        
        // Update modal title
        document.getElementById('courseModalLabel').textContent = courseName;
        
        // Fetch course details from API
        fetch(`/api/courses/${courseId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const course = data.course;
                    
                    // Build course content HTML
                    const courseContent = `
                        <div class="row">
                            <div class="col-md-4 text-center mb-3">
                                ${course.image ? 
                                    `<img src="/storage/${course.image}" alt="${course.name}" class="img-fluid rounded" style="max-width: 200px;">` :
                                    `<div class="bg-gradient-primary text-white rounded p-4" style="width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                        <i class="fas fa-book fa-3x"></i>
                                    </div>`
                                }
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-primary mb-3">${course.name}</h4>
                                <p class="text-muted mb-3">${course.short_description || course.description || 'Khóa học chất lượng cao'}</p>
                                
                                ${course.duration ? `
                                    <div class="row mb-2">
                                        <div class="col-2"><i class="fas fa-clock text-primary"></i></div>
                                        <div class="col-10">
                                            <small class="text-muted">Thời lượng</small><br>
                                            <strong>${course.duration}</strong>
                                        </div>
                                    </div>
                                ` : ''}
                                
                                ${course.price ? `
                                    <div class="row mb-2">
                                        <div class="col-2"><i class="fas fa-tag text-primary"></i></div>
                                        <div class="col-10">
                                            <small class="text-muted">Học phí</small><br>
                                            <strong class="text-success">${course.price.toLocaleString('vi-VN')} VNĐ</strong>
                                        </div>
                                    </div>
                                ` : ''}
                                
                                ${course.features ? `
                                    <div class="mb-3">
                                        <h6 class="text-primary mb-2">Tính năng nổi bật:</h6>
                                        <div class="row">
                                            ${JSON.parse(course.features).map(feature => 
                                                `<div class="col-6 mb-1">
                                                    <span class="badge bg-success">${feature}</span>
                                                </div>`
                                            ).join('')}
                                        </div>
                                    </div>
                                ` : ''}
                                
                                ${course.description ? `
                                    <div class="mb-3">
                                        <h6 class="text-primary mb-2">Mô tả chi tiết:</h6>
                                        <div class="border-start border-primary ps-3">
                                            ${course.description}
                                        </div>
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                    `;
                    
                    document.getElementById('courseModalBody').innerHTML = courseContent;
                } else {
                    document.getElementById('courseModalBody').innerHTML = `
                        <div class="text-center text-danger py-4">
                            <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                            <p>Không thể tải thông tin khóa học. Vui lòng thử lại sau.</p>
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error fetching course details:', error);
                document.getElementById('courseModalBody').innerHTML = `
                    <div class="text-center text-danger py-4">
                        <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                        <p>Đã xảy ra lỗi khi tải thông tin khóa học.</p>
                    </div>
                `;
            });
    };
});
</script>
@endpush
