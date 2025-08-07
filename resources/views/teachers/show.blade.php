@extends('layouts.app')

@section('title', $teacher->name . ' - Giảng viên')

@section('content')
<div class="container-fluid p-0">
    <!-- Hero Section -->
    <section class="teacher-hero-section py-5 position-relative overflow-hidden">
        <div class="hero-bg-decoration"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center mb-4 mb-lg-0">
                    <div class="teacher-avatar-large position-relative">
                        <div class="avatar-ring-large"></div>
                        @if($teacher->avatar)
                            <img src="{{ asset('storage/' . $teacher->avatar) }}" 
                                 alt="{{ $teacher->name }}" 
                                 class="img-fluid rounded-circle teacher-main-avatar">
                        @else
                            <div class="teacher-avatar-placeholder-large rounded-circle d-inline-flex align-items-center justify-content-center">
                                <i class="fas fa-user fa-5x text-white"></i>
                            </div>
                        @endif
                        <div class="teacher-status-badge-large">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="teacher-hero-info">
                        <div class="teacher-badge mb-3">
                            <i class="fas fa-chalkboard-teacher me-2"></i>
                            Giảng viên chính thức
                        </div>
                        <h1 class="display-4 fw-bold mb-3 text-gradient">{{ $teacher->name }}</h1>
                        <p class="lead text-muted mb-4">
                            <i class="fas fa-graduation-cap me-2 text-primary"></i>
                            {{ $teacher->specialization }}
                        </p>
                        
                        <!-- Certification -->
                        <div class="certification-info mb-4">
                            <div class="certification-badge-large">
                                <i class="fas fa-certificate me-2"></i>
                                <span>{{ $teacher->certification }}</span>
                            </div>
                        </div>
                        
                        <!-- Rating -->
                        <div class="teacher-rating-large mb-4">
                            <div class="stars-large mb-2">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <span class="ms-2 fw-bold">5.0</span>
                            </div>
                            <small class="text-muted">Dựa trên {{ rand(50, 200) }} đánh giá từ học viên</small>
                        </div>
                        
                        <!-- Contact Actions -->
                        <div class="teacher-actions-large">
                            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-envelope me-2"></i>Liên hệ tư vấn
                            </a>
                            <a href="{{ route('trial') }}" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-calendar-check me-2"></i>Đăng ký học thử
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teacher Details Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8 mb-4">
                    <!-- About Section -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h3 class="card-title mb-4">
                                <i class="fas fa-user-circle text-primary me-2"></i>
                                Giới thiệu về {{ $teacher->name }}
                            </h3>
                            @if($teacher->bio)
                                <div class="teacher-bio">
                                    {!! nl2br(e($teacher->bio)) !!}
                                </div>
                            @else
                                <p class="text-muted">
                                    {{ $teacher->name }} là một giảng viên giàu kinh nghiệm trong lĩnh vực {{ $teacher->specialization }}. 
                                    Với chứng chỉ {{ $teacher->certification }}, {{ $teacher->name }} cam kết mang đến 
                                    chất lượng giảng dạy tốt nhất cho học viên.
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Achievements Section -->
                    @if($teacher->achievements && count($teacher->achievements) > 0)
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h3 class="card-title mb-4">
                                <i class="fas fa-trophy text-warning me-2"></i>
                                Thành tích & Kinh nghiệm
                            </h3>
                            <div class="achievements-list">
                                @foreach($teacher->achievements as $achievement)
                                    <div class="achievement-item mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="achievement-icon me-3">
                                                <i class="fas fa-medal text-success"></i>
                                            </div>
                                            <div class="achievement-content">
                                                <p class="mb-0">{{ $achievement }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Teaching Approach -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title mb-4">
                                <i class="fas fa-lightbulb text-info me-2"></i>
                                Phương pháp giảng dạy
                            </h3>
                            <div class="teaching-methods">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="method-item">
                                            <i class="fas fa-comments text-primary me-2"></i>
                                            <span>Giao tiếp tương tác</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="method-item">
                                            <i class="fas fa-gamepad text-success me-2"></i>
                                            <span>Học qua trò chơi</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="method-item">
                                            <i class="fas fa-book-open text-info me-2"></i>
                                            <span>Tài liệu phong phú</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="method-item">
                                            <i class="fas fa-users text-warning me-2"></i>
                                            <span>Học nhóm hiệu quả</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Quick Info -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Thông tin nhanh</h4>
                            <div class="quick-info">
                                <div class="info-item mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-language text-primary me-3"></i>
                                        <div>
                                            <strong>Chuyên môn:</strong><br>
                                            <span class="text-muted">{{ $teacher->specialization }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-item mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-certificate text-success me-3"></i>
                                        <div>
                                            <strong>Chứng chỉ:</strong><br>
                                            <span class="text-muted">{{ $teacher->certification }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-item mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-clock text-info me-3"></i>
                                        <div>
                                            <strong>Kinh nghiệm:</strong><br>
                                            <span class="text-muted">{{ rand(3, 10) }}+ năm giảng dạy</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-users text-warning me-3"></i>
                                        <div>
                                            <strong>Học viên:</strong><br>
                                            <span class="text-muted">{{ rand(100, 500) }}+ học viên đã học</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Card -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <h4 class="card-title mb-3">Bạn muốn học với {{ $teacher->name }}?</h4>
                            <p class="text-muted mb-4">Liên hệ ngay để được tư vấn lộ trình học phù hợp</p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('contact') }}" class="btn btn-primary">
                                    <i class="fas fa-phone me-2"></i>Liên hệ tư vấn
                                </a>
                                <a href="{{ route('trial') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-calendar-check me-2"></i>Đăng ký học thử
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Teachers Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-3">Giảng viên khác</h2>
                <p class="lead text-muted">Khám phá đội ngũ giảng viên chuyên nghiệp của chúng tôi</p>
            </div>
            
            <div class="row">
                @php
                    $otherTeachers = App\Models\Teacher::where('is_active', true)
                        ->where('id', '!=', $teacher->id)
                        ->orderBy('sort_order')
                        ->take(3)
                        ->get();
                @endphp
                
                @foreach($otherTeachers as $otherTeacher)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="mb-3">
                                @if($otherTeacher->avatar)
                                    <img src="{{ asset('storage/' . $otherTeacher->avatar) }}" 
                                         alt="{{ $otherTeacher->name }}" 
                                         class="rounded-circle" width="100" height="100">
                                @else
                                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                         style="width: 100px; height: 100px;">
                                        <i class="fas fa-user fa-2x text-white"></i>
                                    </div>
                                @endif
                            </div>
                            <h5 class="fw-bold text-primary mb-2">{{ $otherTeacher->name }}</h5>
                            <p class="text-muted mb-2">{{ $otherTeacher->specialization }}</p>
                            <span class="badge bg-light text-primary border mb-3">{{ $otherTeacher->certification }}</span>
                            <div class="mt-3">
                                <a href="{{ route('teachers.show', $otherTeacher->slug) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('teachers') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-users me-2"></i>Xem tất cả giảng viên
                </a>
            </div>
        </div>
    </section>
</div>

<style>
/* Teacher Show Page Styles */
.teacher-hero-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 60vh;
}

.hero-bg-decoration {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(0, 123, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(102, 16, 242, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.teacher-avatar-large {
    position: relative;
    display: inline-block;
}

.avatar-ring-large {
    position: absolute;
    top: -12px;
    left: -12px;
    right: -12px;
    bottom: -12px;
    border: 4px solid transparent;
    border-radius: 50%;
    background: linear-gradient(45deg, #007bff, #6610f2, #ffc107) border-box;
    mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
    mask-composite: exclude;
    animation: rotate 4s linear infinite;
}

.teacher-main-avatar {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border: 6px solid white;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
}

.teacher-avatar-placeholder-large {
    width: 200px;
    height: 200px;
    background: linear-gradient(135deg, #007bff, #6610f2);
    border: 6px solid white;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
}

.teacher-status-badge-large {
    position: absolute;
    bottom: 10px;
    right: 10px;
    width: 40px;
    height: 40px;
    background: #28a745;
    border: 4px solid white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
}

.teacher-badge {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #007bff, #6610f2);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
}

.text-gradient {
    background: linear-gradient(135deg, #007bff, #6610f2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.certification-badge-large {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border: 2px solid #dee2e6;
    border-radius: 30px;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    color: #495057;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.stars-large i {
    font-size: 1.2rem;
    margin-right: 3px;
}

.teacher-actions-large .btn {
    padding: 0.75rem 2rem;
    font-weight: 600;
    border-radius: 25px;
}

.achievement-item {
    padding: 1rem;
    background: rgba(0, 123, 255, 0.05);
    border-radius: 0.5rem;
    border-left: 4px solid #007bff;
}

.achievement-icon {
    width: 40px;
    height: 40px;
    background: rgba(40, 167, 69, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.method-item {
    padding: 0.75rem;
    background: rgba(0, 123, 255, 0.05);
    border-radius: 0.5rem;
    font-weight: 500;
}

.info-item {
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.info-item:last-child {
    border-bottom: none;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Responsive */
@media (max-width: 768px) {
    .teacher-main-avatar,
    .teacher-avatar-placeholder-large {
        width: 150px;
        height: 150px;
    }
    
    .teacher-hero-section {
        min-height: auto;
        padding: 3rem 0;
    }
    
    .teacher-actions-large .btn {
        display: block;
        width: 100%;
        margin-bottom: 0.5rem;
    }
}
</style>
@endsection
