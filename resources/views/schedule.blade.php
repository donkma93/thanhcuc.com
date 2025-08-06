@extends('layouts.app')

@section('title', 'Lịch Khai Giảng - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Enhanced Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-bg-pattern"></div>
    <div class="container position-relative">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-10 mx-auto text-center">
                <div class="hero-content">
                    <span class="badge bg-light text-primary fs-6 mb-3 animate-fade-in-up">
                        <i class="fas fa-star me-1"></i>Khai giảng tháng {{ date('m/Y') }}
                    </span>
                    <h1 class="display-3 fw-bold mb-4 text-white animate-fade-in-up animate-delay-1">
                        Lịch Khai Giảng<br>
                        <span class="text-warning">Các Khóa Học Tiếng Đức</span>
                    </h1>
                    <p class="lead mb-5 text-white-75 animate-fade-in-up animate-delay-2 col-lg-8 mx-auto">
                        Tìm khóa học phù hợp với trình độ và mục tiêu của bạn. Đăng ký sớm để nhận ưu đãi đặc biệt!
                    </p>
                    <div class="hero-actions d-flex flex-wrap justify-content-center gap-3 animate-fade-in-up animate-delay-3">
                        <a href="#courses" class="btn btn-warning btn-lg px-4 py-3 btn-liquid">
                            <i class="fas fa-search me-2"></i>Xem Khóa Học
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-4 py-3 btn-liquid">
                            <i class="fas fa-calendar-plus me-2"></i>Đăng Ký Ngay
                        </a>
                        <a href="tel:0975186230" class="btn btn-outline-light btn-lg px-4 py-3">
                            <i class="fas fa-phone me-2"></i>Tư Vấn: 0975.186.230
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="row mt-5 animate-fade-in-up animate-delay-4">
            <div class="col-lg-10 mx-auto">
                <div class="row g-4 text-center">
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number text-warning fw-bold fs-2">{{ $schedules->count() }}</div>
                            <div class="stat-label text-white-75 small">Khóa học</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number text-warning fw-bold fs-2">{{ $schedules->sum('available_spots') }}+</div>
                            <div class="stat-label text-white-75 small">Chỗ trống</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number text-warning fw-bold fs-2">3-10</div>
                            <div class="stat-label text-white-75 small">Tháng học</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number text-warning fw-bold fs-2">15%</div>
                            <div class="stat-label text-white-75 small">Giảm giá</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Filter & Search Section -->
<section class="py-4 bg-light" id="courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="filter-section bg-white rounded-3 shadow-sm p-4">
                    <div class="row align-items-center g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-primary small mb-1">Trình độ</label>
                            <select class="form-select" id="levelFilter">
                                <option value="">Tất cả trình độ</option>
                                <option value="a1-a2">Cơ bản (A1-A2)</option>
                                <option value="b1-b2">Trung cấp (B1-B2)</option>
                                <option value="c1-c2">Nâng cao (C1-C2)</option>
                                <option value="business">Thương mại</option>
                                <option value="exam">Luyện thi</option>
                                <option value="online">Online</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-primary small mb-1">Thời gian học</label>
                            <select class="form-select" id="timeFilter">
                                <option value="">Tất cả thời gian</option>
                                <option value="morning">Buổi sáng</option>
                                <option value="afternoon">Buổi chiều</option>
                                <option value="evening">Buổi tối</option>
                                <option value="weekend">Cuối tuần</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-primary small mb-1">Sắp xếp theo</label>
                            <select class="form-select" id="sortFilter">
                                <option value="date">Ngày khai giảng</option>
                                <option value="level">Trình độ</option>
                                <option value="price">Học phí</option>
                                <option value="duration">Thời lượng</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                    <i class="fas fa-calendar me-1"></i>{{ $schedules->count() }} khóa học khả dụng
                                </span>
                                <span class="badge bg-success-subtle text-success px-3 py-2">
                                    <i class="fas fa-users me-1"></i>Còn chỗ trống
                                </span>
                                <span class="badge bg-warning-subtle text-warning px-3 py-2">
                                    <i class="fas fa-percentage me-1"></i>Ưu đãi đăng ký sớm
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Current Month Schedule -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">
                Khóa Học Tháng {{ date('m/Y') }}
            </h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">
                Các lớp học sắp khai giảng trong tháng này
                <span class="badge bg-primary ms-2">{{ date('d') }} ngày còn lại</span>
            </p>
        </div>
        
        <div class="row" id="courseGrid">
            @forelse($schedules as $schedule)
            <!-- {{ $schedule->title }} -->
            <div class="col-lg-6 col-xl-4 mb-4" data-level="{{ $schedule->level }}" data-time="{{ $schedule->start_time >= '18:00' ? 'evening' : ($schedule->start_time >= '12:00' ? 'afternoon' : 'morning') }}" data-price="{{ $schedule->price }}">
                <div class="card schedule-card h-100 animate-on-scroll position-relative">
                    <!-- Badges -->
                    @if($schedule->is_popular || $schedule->is_featured || $schedule->available_spots <= 2)
                        <div class="position-absolute top-0 end-0 m-3 z-index-10">
                            @if($schedule->is_popular)
                                <span class="badge bg-warning text-dark mb-1">
                                    <i class="fas fa-fire me-1"></i>Phổ biến
                                </span>
                            @endif
                            @if($schedule->is_featured)
                                <span class="badge bg-info text-white mb-1">
                                    <i class="fas fa-star me-1"></i>Nổi bật
                                </span>
                            @endif
                            @if($schedule->available_spots <= 2)
                                <span class="badge bg-danger text-white">
                                    <i class="fas fa-exclamation-triangle me-1"></i>Sắp hết chỗ
                                </span>
                            @endif
                        </div>
                    @endif
                    
                    @php
                        $headerClass = match($schedule->level) {
                            'a1-a2' => 'bg-primary',
                            'b1-b2' => 'bg-success', 
                            'c1-c2' => 'bg-warning',
                            'business' => 'bg-info',
                            'exam' => 'bg-secondary',
                            'online' => 'bg-dark',
                            default => 'bg-primary'
                        };
                        
                        $icon = match($schedule->level) {
                            'a1-a2' => 'fas fa-book',
                            'b1-b2' => 'fas fa-book-open', 
                            'c1-c2' => 'fas fa-graduation-cap',
                            'business' => 'fas fa-briefcase',
                            'exam' => 'fas fa-certificate',
                            'online' => 'fas fa-laptop',
                            default => 'fas fa-book'
                        };
                    @endphp
                    
                    <div class="card-header {{ $headerClass }} text-white position-relative">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="mb-1 fw-bold">
                                    <i class="{{ $icon }} me-2"></i>{{ $schedule->title }}
                                </h5>
                                @if($schedule->description)
                                    <small class="opacity-75">{{ Str::limit($schedule->description, 50) }}</small>
                                @endif
                            </div>
                            <div class="text-end">
                                <span class="badge bg-light text-{{ str_replace('bg-', '', $headerClass) }} fs-6 mb-1">{{ $schedule->badge_text }}</span>
                                <div class="availability-bar">
                                    <div class="progress" style="height: 4px;">
                                        <div class="progress-bar {{ $schedule->badge_class }}" style="width: {{ $schedule->availability_percentage }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Key Info Grid -->
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="info-item text-center p-2 bg-light rounded">
                                    <i class="fas fa-calendar text-{{ str_replace('bg-', '', $headerClass) }} mb-1"></i>
                                    <div class="fw-bold small">{{ $schedule->start_date->format('d/m') }}</div>
                                    <div class="text-muted x-small">Khai giảng</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="info-item text-center p-2 bg-light rounded">
                                    <i class="fas fa-clock text-{{ str_replace('bg-', '', $headerClass) }} mb-1"></i>
                                    <div class="fw-bold small">{{ $schedule->start_time }}-{{ $schedule->end_time }}</div>
                                    <div class="text-muted x-small">Thời gian</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="info-item text-center p-2 bg-light rounded">
                                    <i class="fas fa-calendar-week text-{{ str_replace('bg-', '', $headerClass) }} mb-1"></i>
                                    <div class="fw-bold small">{{ Str::limit($schedule->formatted_schedule_days, 15) }}</div>
                                    <div class="text-muted x-small">Lịch học</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="info-item text-center p-2 bg-light rounded">
                                    <i class="fas fa-hourglass-half text-{{ str_replace('bg-', '', $headerClass) }} mb-1"></i>
                                    <div class="fw-bold small">{{ $schedule->duration_months }} tháng</div>
                                    <div class="text-muted x-small">Thời lượng</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Price Section -->
                        <div class="price-section bg-{{ str_replace('bg-', '', $headerClass) }}-subtle rounded p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-muted small">Học phí</div>
                                    <div class="fw-bold text-{{ str_replace('bg-', '', $headerClass) }} fs-5">{{ $schedule->formatted_price }}</div>
                                </div>
                                @if($schedule->original_price && $schedule->original_price > $schedule->price)
                                    <div class="text-end">
                                        <div class="text-success small fw-semibold">Giảm {{ $schedule->discount_percentage }}%</div>
                                        <div class="text-decoration-line-through text-muted small">{{ $schedule->formatted_original_price }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Teacher Info -->
                        <div class="teacher-info bg-light p-3 rounded mb-3">
                            <div class="d-flex align-items-center">
                                @if($schedule->teacher_avatar)
                                    <img src="{{ Storage::url($schedule->teacher_avatar) }}" alt="Avatar" class="rounded-circle me-3" width="40" height="40">
                                @else
                                    <div class="teacher-avatar bg-{{ str_replace('bg-', '', $headerClass) }} text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $schedule->teacher_name }}</h6>
                                    @if($schedule->teacher_title)
                                        <small class="text-muted">{{ $schedule->teacher_title }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <a href="{{ route('contact') }}" class="btn btn-{{ str_replace('bg-', '', $headerClass) }} btn-liquid {{ $headerClass === 'bg-warning' ? 'text-white' : '' }}">
                                <i class="fas fa-user-plus me-2"></i>Đăng Ký Ngay
                            </a>
                            <button class="btn btn-outline-{{ str_replace('bg-', '', $headerClass) }} btn-sm" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="{{ $schedule->level }}">
                                <i class="fas fa-info-circle me-1"></i>Xem Chi Tiết
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Hiện tại chưa có lịch khai giảng nào</h5>
                    <p class="text-muted">Vui lòng quay lại sau hoặc liên hệ với chúng tôi để biết thêm thông tin.</p>
                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        <i class="fas fa-phone me-2"></i>Liên hệ tư vấn
                    </a>
                </div>
            </div>
            @endforelse
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
    /* Enhanced Hero Section */
    .hero-section {
        background: var(--bg-primary);
        min-height: 70vh;
        position: relative;
    }
    
    .hero-bg-pattern {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        background-size: 100% 100%;
    }
    
    .min-vh-50 {
        min-height: 50vh;
    }
    
    .text-white-75 {
        color: rgba(255, 255, 255, 0.85) !important;
    }
    
    .stat-item {
        padding: 1rem;
        border-radius: 0.5rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }
    
    .stat-item:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }
    
    /* Filter Section */
    .filter-section {
        border: 1px solid rgba(0, 0, 0, 0.08);
        backdrop-filter: blur(10px);
    }
    
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(1, 88, 98, 0.25);
    }
    
    /* Enhanced Course Cards */
    .schedule-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        border-radius: 1rem;
    }
    
    .schedule-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .schedule-card .card-header {
        border-radius: 1rem 1rem 0 0 !important;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }
    
    .schedule-card .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 100%);
        pointer-events: none;
    }
    
    .info-item {
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .info-item:hover {
        background-color: var(--primary-color) !important;
        color: white;
        transform: translateY(-2px);
    }
    
    .info-item:hover i {
        color: white !important;
    }
    
    .info-item:hover .text-muted {
        color: rgba(255, 255, 255, 0.8) !important;
    }
    
    .price-section {
        border: 1px solid rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }
    
    .price-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.5) 0%, transparent 100%);
        pointer-events: none;
    }
    
    .teacher-info {
        border-left: 4px solid var(--primary-color);
        transition: all 0.3s ease;
    }
    
    .teacher-info:hover {
        background-color: var(--primary-color) !important;
        color: white;
        transform: translateX(5px);
    }
    
    .teacher-info:hover .teacher-avatar {
        background-color: white !important;
        color: var(--primary-color) !important;
    }
    
    .teacher-info:hover .text-muted {
        color: rgba(255, 255, 255, 0.8) !important;
    }
    
    .teacher-avatar {
        transition: all 0.3s ease;
    }
    
    .availability-bar .progress {
        background-color: rgba(255, 255, 255, 0.3);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 60vh;
        }
        
        .display-3 {
            font-size: 2.5rem;
        }
        
        .hero-actions {
            flex-direction: column;
        }
        
        .hero-actions .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
        
        .filter-section {
            padding: 1rem !important;
        }
        
        .schedule-card:hover {
            transform: translateY(-4px);
        }
    }
    
    /* Utility Classes */
    .x-small {
        font-size: 0.7rem;
    }
    
    .z-index-10 {
        z-index: 10;
    }
    
    /* Badge Enhancements */
    .badge {
        font-size: 0.75rem;
        padding: 0.5em 0.75em;
        font-weight: 600;
        letter-spacing: 0.025em;
    }
    
    /* Button Enhancements */
    .btn-liquid {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .btn-liquid::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .btn-liquid:hover::before {
        left: 100%;
    }
    
    /* Animation Delays */
    .animate-delay-1 { animation-delay: 0.1s; }
    .animate-delay-2 { animation-delay: 0.2s; }
    .animate-delay-3 { animation-delay: 0.3s; }
    .animate-delay-4 { animation-delay: 0.4s; }
    .animate-delay-5 { animation-delay: 0.5s; }
    
    /* Benefit Icons */
    .benefit-icon {
        transition: all 0.3s ease;
    }
    
    .benefit-icon:hover {
        transform: scale(1.1) rotate(5deg);
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Course filtering functionality
    const levelFilter = document.getElementById('levelFilter');
    const timeFilter = document.getElementById('timeFilter');
    const sortFilter = document.getElementById('sortFilter');
    const courseGrid = document.getElementById('courseGrid');
    const courseCards = courseGrid.querySelectorAll('[data-level]');

    function filterCourses() {
        const selectedLevel = levelFilter.value;
        const selectedTime = timeFilter.value;
        let visibleCount = 0;

        courseCards.forEach(card => {
            const cardLevel = card.getAttribute('data-level');
            const cardTime = card.getAttribute('data-time');
            
            let showCard = true;

            // Level filter
            if (selectedLevel && cardLevel !== selectedLevel) {
                showCard = false;
            }

            // Time filter
            if (selectedTime && cardTime !== selectedTime) {
                showCard = false;
            }

            if (showCard) {
                card.style.display = 'block';
                card.style.animation = `fadeInUp 0.5s ease ${visibleCount * 0.1}s both`;
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update course count
        const countBadge = document.querySelector('.badge.bg-primary-subtle');
        if (countBadge) {
            countBadge.innerHTML = `<i class="fas fa-calendar me-1"></i>${visibleCount} khóa học khả dụng`;
        }
    }

    function sortCourses() {
        const sortBy = sortFilter.value;
        const cardsArray = Array.from(courseCards);
        
        cardsArray.sort((a, b) => {
            switch (sortBy) {
                case 'price':
                    return parseInt(a.getAttribute('data-price')) - parseInt(b.getAttribute('data-price'));
                case 'level':
                    const levelOrder = {'a1-a2': 1, 'b1-b2': 2, 'c1-c2': 3, 'business': 4, 'exam': 5, 'online': 6};
                    return levelOrder[a.getAttribute('data-level')] - levelOrder[b.getAttribute('data-level')];
                case 'duration':
                    // This would need duration data attributes
                    return 0;
                default: // date
                    return 0;
            }
        });

        // Reorder DOM elements
        cardsArray.forEach(card => {
            courseGrid.appendChild(card);
        });
    }

    // Event listeners
    levelFilter.addEventListener('change', filterCourses);
    timeFilter.addEventListener('change', filterCourses);
    sortFilter.addEventListener('change', sortCourses);

    // Smooth scroll for anchor links
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

    // Course detail modal functionality (if modal exists)
    const courseDetailButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
    courseDetailButtons.forEach(button => {
        button.addEventListener('click', function() {
            const courseType = this.getAttribute('data-course');
            // Here you could load course details dynamically
            console.log('Loading details for course:', courseType);
        });
    });

    // Add loading animation to registration buttons
    const registrationButtons = document.querySelectorAll('a[href*="contact"]');
    registrationButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.classList.contains('loading')) {
                this.classList.add('loading');
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang xử lý...';
                
                // Reset after 2 seconds (in case user comes back)
                setTimeout(() => {
                    this.classList.remove('loading');
                    this.innerHTML = originalText;
                }, 2000);
            }
        });
    });
});
</script>
@endpush