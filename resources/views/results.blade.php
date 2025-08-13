@extends('layouts.app')

@section('title', 'Kết Quả Học Viên - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')




<!-- Student Results Section -->
<section class="py-5 student-results-section" id="student-results">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title animate-on-scroll">
                KẾT QUẢ <span class="title-highlight">HỌC VIÊN</span>
            </h2>
            <p class="section-subtitle animate-on-scroll animate-delay-1">
                Những thành tích đáng tự hào và phản hồi chân thực từ học viên Thanh Cúc
            </p>
        </div>

        <!-- Featured Results -->
        @if($featuredResults->count() > 0)
        <div class="mb-5">
            <h4 class="text-center mb-4">
                <i class="fas fa-star text-warning me-2"></i>
                Kết Quả Nổi Bật
            </h4>
            <div class="row">
                @foreach($featuredResults->take(3) as $result)
                <div class="col-lg-4 mb-4">
                    <div class="featured-result-card result-card animate-on-scroll">
                        <div class="result-image">
                            <img src="{{ $result->image_url }}" alt="{{ $result->title }}" class="img-fluid">
                            <div class="result-badge">
                                <i class="fas {{ $result->type == 'score' ? 'fa-chart-line' : 'fa-comments' }}"></i>
                                {{ $result->type_label }}
                            </div>
                        </div>
                        <div class="result-content">
                            <h5 class="result-title">{{ $result->title }}</h5>
                            @if($result->student_name)
                                <p class="result-student">
                                    <i class="fas fa-user me-2"></i>{{ $result->student_name }}
                                </p>
                            @endif
                            @if($result->description)
                                <p class="result-description">{{ Str::limit($result->description, 120) }}</p>
                            @endif
                            <div class="result-tags">
                                @if($result->certificate_type)
                                    <span class="tag">{{ $result->certificate_type }}</span>
                                @endif
                                @if($result->level)
                                    <span class="tag">{{ $result->level }}</span>
                                @endif
                                @if($result->score)
                                    <span class="tag score-tag">{{ $result->score }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Scores Section -->
        @if($scores->count() > 0)
        <div class="mb-5">
            <h4 class="text-center mb-4">
                <i class="fas fa-chart-line text-success me-2"></i>
                Bảng Điểm Học Viên
            </h4>
            <div class="row">
                @foreach($scores->take(6) as $score)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="score-card result-card animate-on-scroll">
                        <div class="score-image">
                            <img src="{{ $score->image_url }}" alt="{{ $score->title }}" class="img-fluid">
                            <div class="score-badge">
                                <i class="fas fa-trophy"></i>
                            </div>
                        </div>
                        <div class="score-content">
                            <h6 class="score-title">{{ $score->title }}</h6>
                            @if($score->student_name)
                                <p class="score-student">
                                    <i class="fas fa-user me-2"></i>{{ $score->student_name }}
                                </p>
                            @endif
                            <div class="score-info">
                                @if($score->certificate_type)
                                    <span class="info-tag">{{ $score->certificate_type }}</span>
                                @endif
                                @if($score->level)
                                    <span class="info-tag">{{ $score->level }}</span>
                                @endif
                                @if($score->score)
                                    <span class="score-value">{{ $score->score }}</span>
                                @endif
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
        <div class="mb-5">
            <h4 class="text-center mb-4">
                <i class="fas fa-comments text-info me-2"></i>
                Phản Hồi Học Viên
            </h4>
            <div class="row">
                @foreach($feedbacks->take(6) as $feedback)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feedback-card animate-on-scroll">
                        <div class="feedback-image">
                            <img src="{{ $feedback->image_url }}" alt="{{ $feedback->title }}" class="img-fluid">
                            <div class="feedback-badge">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                        <div class="feedback-content">
                            <h6 class="feedback-title">{{ $feedback->title }}</h6>
                            @if($feedback->student_name)
                                <p class="feedback-student">
                                    <i class="fas fa-user me-2"></i>{{ $feedback->student_name }}
                                </p>
                            @endif
                            @if($feedback->description)
                                <p class="feedback-text">{{ Str::limit($feedback->description, 100) }}</p>
                            @endif
                            <div class="feedback-tags">
                                @if($feedback->certificate_type)
                                    <span class="tag">{{ $feedback->certificate_type }}</span>
                                @endif
                                @if($feedback->level)
                                    <span class="tag">{{ $feedback->level }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Empty State -->
        @if($scores->count() == 0 && $feedbacks->count() == 0)
        <div class="text-center py-5">
            <i class="fas fa-trophy fa-4x text-muted mb-4"></i>
            <h4 class="text-muted">Chưa có kết quả nào</h4>
            <p class="text-muted">Hãy quay lại sau để xem những thành tích của học viên Thanh Cúc!</p>
        </div>
        @endif
    </div>
</section>



<!-- Call to Action Section -->
<section class="cta-section" id="cta-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="cta-content animate-fade-in-left">
                    <div class="cta-badge mb-3">
                        <i class="fas fa-rocket me-2"></i>
                        <span>Bắt Đầu Hành Trình</span>
                    </div>
                    <h3 class="cta-title mb-4">
                        Bạn cũng muốn có <span class="text-gradient">thành tích</span> như vậy?
                    </h3>
                    <p class="cta-subtitle mb-4">
                    Hãy bắt đầu hành trình chinh phục tiếng Đức cùng Thanh Cúc ngay hôm nay!
                        Với đội ngũ giảng viên chuyên nghiệp và phương pháp giảng dạy hiệu quả, 
                        chúng tôi cam kết đồng hành cùng bạn đến thành công.
                </p>
                    <div class="cta-features mb-4">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Giảng viên bản ngữ chuyên nghiệp</span>
            </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Phương pháp giảng dạy hiện đại</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Tỷ lệ đậu chứng chỉ cao</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cta-form-container animate-fade-in-right">
                    <div class="cta-form-card">
                        <div class="form-header">
                            <h4 class="form-title">Đăng Ký Tư Vấn Miễn Phí</h4>
                            <p class="form-subtitle">Nhận tư vấn chi tiết về lộ trình học phù hợp</p>
                        </div>
                        <form class="cta-form" action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <i class="fas fa-user input-icon"></i>
                                    <input type="text" name="name" class="form-control" placeholder="Họ và tên" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <i class="fas fa-phone input-icon"></i>
                                    <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <i class="fas fa-envelope input-icon"></i>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <i class="fas fa-graduation-cap input-icon"></i>
                                    <select name="course_interest" class="form-control" required>
                                        <option value="">Chọn khóa học quan tâm</option>
                                        <option value="A1-A2">Khóa học A1-A2 (Cơ bản)</option>
                                        <option value="B1-B2">Khóa học B1-B2 (Trung cấp)</option>
                                        <option value="C1-C2">Khóa học C1-C2 (Nâng cao)</option>
                                        <option value="TestDaF">Luyện thi TestDaF</option>
                                        <option value="DSH">Luyện thi DSH</option>
                                        <option value="Goethe">Luyện thi Goethe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <i class="fas fa-comment input-icon"></i>
                                    <textarea name="message" class="form-control" rows="3" placeholder="Ghi chú thêm (không bắt buộc)"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-cta-primary w-100">
                                <i class="fas fa-paper-plane me-2"></i>
                                Đăng Ký Tư Vấn Miễn Phí
                                <div class="btn-glow"></div>
                            </button>
                        </form>
                        <div class="form-footer">
                            <p class="form-note">
                                <i class="fas fa-shield-alt me-2"></i>
                                Thông tin của bạn được bảo mật tuyệt đối
                            </p>
                            <div class="contact-options">
                                <a href="tel:0975186230" class="contact-option">
                                    <i class="fas fa-phone"></i>
                                    <span>0975.186.230</span>
                                </a>
                                <a href="mailto:info@thanhcuc.edu.vn" class="contact-option">
                                    <i class="fas fa-envelope"></i>
                                    <span>info@thanhcuc.edu.vn</span>
                </a>
            </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Image Gallery Modal -->
<div class="modal fade" id="imageGalleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white" id="galleryModalTitle">Kết Quả Học Viên</h5>
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

@endsection

@push('styles')
<style>
/* Gallery Modal Styles */
.gallery-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.7);
    border: none;
    color: white;
    font-size: 1.5rem;
    padding: 1rem 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
}

.gallery-nav:hover {
    background: rgba(0, 0, 0, 0.9);
    color: #007bff;
}

.gallery-nav.gallery-prev {
    left: 1rem;
}

.gallery-nav.gallery-next {
    right: 1rem;
}

.gallery-counter {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
}

/* Clickable overlay for result cards */
.result-card, .feedback-card {
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.result-card:hover, .feedback-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.result-image, .feedback-image, .score-image {
    position: relative;
    overflow: hidden;
}

.result-image::after, .feedback-image::after, .score-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.result-card:hover .result-image::after, 
.feedback-card:hover .feedback-image::after,
.result-card:hover .score-image::after {
    opacity: 1;
}

.result-image::before, .feedback-image::before, .score-image::before {
    content: '🔍';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 2rem;
    color: white;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 2;
}

.result-card:hover .result-image::before, 
.feedback-card:hover .feedback-image::before,
.result-card:hover .score-image::before {
    opacity: 1;
}
</style>
<style>
/* Hero Section Styles */
.hero-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: var(--bg-primary);
    padding: 2rem 0;
}



.min-vh-75 {
    min-height: 75vh;
}

.hero-content {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50px;
    padding: 0.75rem 1.5rem;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 900;
    color: white;
    line-height: 1.2;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.text-gradient {
    background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
}

.hero-stats {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 2rem;
    margin: 0 auto;
    max-width: 500px;
}

.stat-item {
    text-align: center;
    color: white;
}

.stat-number {
    font-size: 2rem;
    font-weight: 900;
    color: var(--secondary-color);
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-top: 0.5rem;
}

.stat-divider {
    width: 2px;
    height: 40px;
    background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.btn-hero-primary {
    background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        border: none;
    color: var(--primary-color);
    font-weight: 700;
    padding: 1rem 2rem;
    border-radius: 50px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(249, 210, 0, 0.4);
}

.btn-hero-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(249, 210, 0, 0.6);
    color: var(--primary-color);
}

.btn-hero-outline {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    font-weight: 700;
    padding: 1rem 2rem;
    border-radius: 50px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.btn-hero-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: var(--secondary-color);
    color: white;
    transform: translateY(-3px);
}



/* Statistics Section */
.stats-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    position: relative;
    z-index: 2;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.title-highlight {
    background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #6c757d;
    max-width: 600px;
    margin: 0 auto;
}

.stats-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
    border: 1px solid rgba(1, 88, 98, 0.1);
    height: 100%;
}

.stats-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(1, 88, 98, 0.15);
    border-color: var(--secondary-color);
}

.stats-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    background: linear-gradient(135deg, var(--primary-color), var(--success-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    transition: all 0.3s ease;
}

.stats-card:hover .stats-icon {
    transform: scale(1.1) rotate(10deg);
}

.stats-content {
    position: relative;
    z-index: 2;
}

.stats-number {
    font-size: 3rem;
    font-weight: 900;
    color: var(--primary-color);
    line-height: 1;
    display: inline-block;
}

.stats-unit {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--secondary-color);
    margin-left: 0.25rem;
}

.stats-label {
    font-size: 1rem;
    color: #6c757d;
    margin-top: 0.5rem;
    font-weight: 600;
}

.stats-decoration {
    position: absolute;
    top: -50px;
    right: -50px;
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
    border-radius: 50%;
    opacity: 0.1;
    transition: all 0.3s ease;
}

.stats-card:hover .stats-decoration {
    transform: scale(1.2);
    opacity: 0.2;
}

/* Student Results Section */
.student-results-section {
    background: white;
    position: relative;
    z-index: 2;
}

/* Featured Result Cards */
.featured-result-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s ease;
    border: 2px solid var(--secondary-color);
    height: 100%;
    position: relative;
    box-shadow: 0 10px 30px rgba(249, 210, 0, 0.2);
}

.featured-result-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 50px rgba(249, 210, 0.3);
}

.result-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.result-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.featured-result-card:hover .result-image img {
    transform: scale(1.1);
}

.result-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
    color: var(--primary-color);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.result-content {
    padding: 1.5rem;
}

.result-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.result-student {
    color: #6c757d;
    font-size: 0.9rem;
    margin-bottom: 0.75rem;
}

.result-description {
    color: #495057;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
}

.result-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.tag {
    background: var(--primary-color);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 600;
}

.score-tag {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    font-weight: 700;
}

/* Score Cards */
.score-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(1, 88, 98, 0.1);
    height: 100%;
}

.score-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(1, 88, 98, 0.15);
    border-color: var(--success-color);
}

.score-image {
    position: relative;
    height: 150px;
    overflow: hidden;
}

.score-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.score-card:hover .score-image img {
    transform: scale(1.05);
}

.score-badge {
    position: absolute;
    top: 0.75rem;
    right: 0.75rem;
    background: var(--success-color);
    color: white;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.score-content {
    padding: 1.25rem;
}

.score-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.score-student {
    color: #6c757d;
    font-size: 0.85rem;
    margin-bottom: 0.75rem;
}

.score-info {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    align-items: center;
}

.info-tag {
    background: var(--primary-color);
    color: white;
    padding: 0.2rem 0.6rem;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 600;
}

.score-value {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    padding: 0.2rem 0.6rem;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 700;
    margin-left: auto;
}

/* Feedback Cards */
.feedback-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid rgba(1, 88, 98, 0.1);
    height: 100%;
}

.feedback-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(1, 88, 98, 0.15);
    border-color: var(--info-color);
}

.feedback-image {
    position: relative;
    height: 150px;
    overflow: hidden;
}

.feedback-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.feedback-card:hover .feedback-image img {
    transform: scale(1.05);
}

.feedback-badge {
    position: absolute;
    top: 0.75rem;
    right: 0.75rem;
    background: var(--info-color);
    color: white;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.feedback-content {
    padding: 1.25rem;
}

.feedback-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.feedback-student {
    color: #6c757d;
    font-size: 0.85rem;
    margin-bottom: 0.75rem;
}

.feedback-text {
    color: #495057;
    font-size: 0.85rem;
    line-height: 1.5;
    margin-bottom: 0.75rem;
    font-style: italic;
}

.feedback-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

/* Certificates Section */
.certificates-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    position: relative;
    z-index: 2;
}

.certificate-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s ease;
    border: 1px solid rgba(1, 88, 98, 0.1);
    height: 100%;
    position: relative;
}

.certificate-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(1, 88, 98, 0.15);
    border-color: var(--secondary-color);
}

.certificate-header {
    padding: 2rem;
    text-align: center;
    position: relative;
    background: linear-gradient(135deg, var(--primary-color), var(--success-color));
    }
    
    .certificate-icon {
    font-size: 3rem;
    color: white;
    margin-bottom: 1rem;
        transition: all 0.3s ease;
    }
    
    .certificate-card:hover .certificate-icon {
    transform: scale(1.1) rotate(10deg);
}

.certificate-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.3), transparent);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.certificate-card:hover .certificate-glow {
    opacity: 1;
}

.certificate-content {
    padding: 2rem;
}

.certificate-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.certificate-desc {
    color: #6c757d;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.certificate-stats {
    space-y: 1rem;
}

.stat-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.stat-level {
    font-weight: 700;
    color: var(--primary-color);
    min-width: 50px;
    font-size: 0.9rem;
}

.stat-bar {
    flex: 1;
    height: 8px;
    background: #e9ecef;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
}

.stat-fill {
    height: 100%;
    background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
    border-radius: 10px;
    width: 0;
    transition: width 2s ease;
}

.stat-percent {
    font-weight: 700;
    color: var(--primary-color);
    min-width: 40px;
    text-align: right;
    font-size: 0.9rem;
}

/* CTA Section */
.cta-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: var(--bg-primary);
    padding: 4rem 0;
}

.cta-content {
    color: white;
}

.cta-badge {
    display: inline-flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50px;
    padding: 0.75rem 1.5rem;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 900;
    line-height: 1.2;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.cta-subtitle {
    font-size: 1.1rem;
    line-height: 1.6;
    opacity: 0.9;
}

.cta-features {
    list-style: none;
    padding: 0;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
    font-size: 1rem;
}

.feature-item i {
    color: var(--secondary-color);
    margin-right: 0.75rem;
    font-size: 1.1rem;
}

.cta-form-container {
    /* Container for the form */
}

.cta-form-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 2.5rem;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.form-header {
    text-align: center;
    margin-bottom: 2rem;
}

.form-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.form-subtitle {
    color: #6c757d;
    font-size: 0.95rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--primary-color);
    z-index: 2;
}

.form-control {
    padding: 1rem 1rem 1rem 3rem;
    border: 2px solid #e9ecef;
    border-radius: 15px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
}

.form-control:focus {
    border-color: var(--secondary-color);
    box-shadow: 0 0 0 0.2rem rgba(249, 210, 0, 0.25);
    outline: none;
}

.btn-cta-primary {
    background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
    border: none;
    color: var(--primary-color);
    font-weight: 700;
    padding: 1rem 2rem;
    border-radius: 15px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-cta-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(249, 210, 0, 0.4);
    color: var(--primary-color);
}

.btn-glow {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s;
}

.btn-cta-primary:hover .btn-glow {
    left: 100%;
}

.form-footer {
    margin-top: 2rem;
    text-align: center;
}

.form-note {
    font-size: 0.85rem;
    color: #6c757d;
    margin-bottom: 1rem;
}

.contact-options {
    display: flex;
    justify-content: center;
    gap: 2rem;
}

.contact-option {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-color);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.contact-option:hover {
    color: var(--secondary-color);
    transform: translateY(-2px);
}



/* Animations */
@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 1rem;
    }
    
    .stat-divider {
        width: 40px;
        height: 2px;
        background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.3), transparent);
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .contact-options {
        flex-direction: column;
        gap: 1rem;
    }
    
    .cta-form-card {
        padding: 2rem;
    }
    
    .success-card-horizontal {
        flex-direction: column;
        text-align: center;
    }
}

/* Counter Animation */
    .counter {
    transition: all 2s ease;
}

/* Fix for overlapping issues */
section {
    position: relative;
}

.stats-section,
.success-stories-section,
.certificates-section {
    z-index: 1;
}

/* Ensure proper stacking context */
.navbar {
    z-index: 1050 !important;
}

/* Prevent content from going under navbar */
main {
    position: relative;
    z-index: 1;
}

/* Fix for backdrop-filter issues */
.hero-badge,
.achievement-tabs .nav-link,
.btn-hero-outline,
.cta-badge,
.cta-form-card {
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
    will-change: transform;
}

/* Smooth transitions */
* {
    -webkit-transform: translateZ(0);
    transform: translateZ(0);
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Counter Animation
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const increment = target / 100;
            let current = 0;
            
            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent = Math.ceil(current);
                    setTimeout(updateCounter, 20);
                } else {
                    counter.textContent = target;
                }
            };
            
            updateCounter();
        });
    }
    
    // Certificate Stats Animation
    function animateStats() {
        const statFills = document.querySelectorAll('.stat-fill');
        
        statFills.forEach(fill => {
            const percent = fill.getAttribute('data-percent');
            setTimeout(() => {
                fill.style.width = percent + '%';
            }, 500);
        });
    }
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('stats-section')) {
                    animateCounters();
                }
                if (entry.target.classList.contains('certificates-section')) {
                    animateStats();
                }
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe sections
    document.querySelectorAll('.stats-section, .certificates-section').forEach(section => {
        observer.observe(section);
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Form submission enhancement
    const ctaForm = document.querySelector('.cta-form');
    if (ctaForm) {
        ctaForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang gửi...';
            submitBtn.disabled = true;
            
            // Reset after 3 seconds (adjust based on actual form processing)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });
    }

    // Gallery functionality for student results and feedbacks
    let currentGalleryData = [];
    let currentImageIndex = 0;
    let currentGalleryType = '';
    
    // Debug: Check if data is available
    console.log('Available data on page load:');
    console.log('Scores count:', {{ $scores->count() }});
    console.log('Feedbacks count:', {{ $feedbacks->count() }});
    console.log('Sample score:', {!! json_encode($scores->first()) !!});
    console.log('Sample feedback:', {!! json_encode($feedbacks->first()) !!});

    // Open gallery modal
    function openGallery(galleryType, imageIndex) {
        console.log('openGallery called with:', galleryType, imageIndex);
        
        currentGalleryType = galleryType;
        currentImageIndex = imageIndex;
        
        // Set gallery data based on type
        if (galleryType === 'scores') {
            currentGalleryData = {!! json_encode($scores) !!};
            console.log('Scores data:', currentGalleryData);
        } else if (galleryType === 'feedbacks') {
            currentGalleryData = {!! json_encode($feedbacks) !!};
            console.log('Feedbacks data:', currentGalleryData);
        }
        
        console.log('Current gallery data:', currentGalleryData);
        console.log('Current image index:', currentImageIndex);
        
        const modalElement = document.getElementById('imageGalleryModal');
        if (modalElement) {
            const modal = new bootstrap.Modal(modalElement);
            updateGalleryModal();
            modal.show();
        } else {
            console.error('Modal element not found!');
        }
    }

    // Update gallery modal content
    function updateGalleryModal() {
        console.log('updateGalleryModal called');
        console.log('currentGalleryData:', currentGalleryData);
        console.log('currentImageIndex:', currentImageIndex);
        
        if (currentGalleryData.length === 0) {
            console.log('No gallery data available');
            return;
        }
        
        const currentImage = currentGalleryData[currentImageIndex];
        console.log('Current image data:', currentImage);
        
        const modalImage = document.getElementById('galleryModalImage');
        const modalTitle = document.getElementById('galleryModalTitle');
        const imageTitle = document.getElementById('galleryImageTitle');
        const imageDescription = document.getElementById('galleryImageDescription');
        const currentIndex = document.getElementById('currentImageIndex');
        const totalImages = document.getElementById('totalImages');
        
        console.log('Modal elements found:', {
            modalImage: !!modalImage,
            modalTitle: !!modalTitle,
            imageTitle: !!imageTitle,
            imageDescription: !!imageDescription,
            currentIndex: !!currentIndex,
            totalImages: !!totalImages
        });
        
        if (modalImage && currentImage) {
            modalImage.src = currentImage.image_url;
            modalImage.alt = currentImage.title;
            console.log('Set image src to:', currentImage.image_url);
        }
        
        // Update modal title based on gallery type
        if (modalTitle) {
            if (currentGalleryType === 'scores') {
                modalTitle.textContent = 'Bảng Điểm Học Viên';
            } else if (currentGalleryType === 'feedbacks') {
                modalTitle.textContent = 'Phản Hồi Học Viên';
            }
        }
        
        if (imageTitle) imageTitle.textContent = currentImage.title;
        if (imageDescription) imageDescription.textContent = currentImage.description || '';
        if (currentIndex) currentIndex.textContent = currentImageIndex + 1;
        if (totalImages) totalImages.textContent = currentGalleryData.length;
        
        // Show/hide navigation arrows
        const prevBtn = document.querySelector('.gallery-prev');
        const nextBtn = document.querySelector('.gallery-next');
        
        if (prevBtn) prevBtn.style.display = currentImageIndex === 0 ? 'none' : 'block';
        if (nextBtn) nextBtn.style.display = currentImageIndex === currentGalleryData.length - 1 ? 'none' : 'block';
    }

    // Change gallery image
    function changeGalleryImage(direction) {
        if (currentGalleryData.length === 0) return;
        
        currentImageIndex += direction;
        
        // Boundary checks with loop
        if (currentImageIndex >= currentGalleryData.length) {
            currentImageIndex = 0;
        } else if (currentImageIndex < 0) {
            currentImageIndex = currentGalleryData.length - 1;
        }
        
        updateGalleryModal();
    }

    // Add click event listeners to result and feedback cards
    console.log('Setting up click listeners...');
    
    // Check if modal exists
    const modalElement = document.getElementById('imageGalleryModal');
    console.log('Modal element found:', !!modalElement);
    
    // For score cards (result-card class)
    const scoreCards = document.querySelectorAll('.result-card');
    console.log('Score cards found:', scoreCards.length);
    scoreCards.forEach((card, index) => {
        console.log('Adding click listener to score card:', index);
        card.addEventListener('click', function() {
            console.log('Score card clicked:', index);
            openGallery('scores', index);
        });
    });
    
    // For feedback cards (feedback-card class)
    const feedbackCards = document.querySelectorAll('.feedback-card');
    console.log('Feedback cards found:', feedbackCards.length);
    feedbackCards.forEach((card, index) => {
        console.log('Adding click listener to feedback card:', index);
        card.addEventListener('click', function() {
            console.log('Feedback card clicked:', index);
            openGallery('feedbacks', index);
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
                const modalInstance = bootstrap.Modal.getInstance(modal);
                if (modalInstance) {
                    modalInstance.hide();
                }
            }
        }
    });
});
</script>
@endpush