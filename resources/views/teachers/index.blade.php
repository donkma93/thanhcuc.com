@extends('layouts.app')

@section('title', 'Đội ngũ giảng viên')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Đội Ngũ Giảng Viên Tiếng Đức</h1>
                <p class="lead">
                    Đội ngũ giảng viên giàu kinh nghiệm với chứng chỉ quốc tế, 
                    cam kết mang đến chất lượng giảng dạy tiếng Đức tốt nhất cho học viên
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Teachers Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($teachers as $teacher)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="teacher-card card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            @if($teacher->avatar)
                                <img src="{{ asset('storage/' . $teacher->avatar) }}" 
                                     alt="{{ $teacher->name }}" 
                                     class="rounded-circle teacher-avatar"
                                     width="120" height="120">
                            @else
                                <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center teacher-avatar-placeholder" 
                                     style="width: 120px; height: 120px;">
                                    <i class="fas fa-user fa-3x text-white"></i>
                                </div>
                            @endif
                        </div>
                        
                        <h5 class="fw-bold text-primary mb-2">{{ $teacher->name }}</h5>
                        <p class="text-muted mb-2">{{ $teacher->specialization }}</p>
                        
                        @if($teacher->certification)
                        <span class="badge bg-light text-primary border mb-3">{{ $teacher->certification }}</span>
                        @endif
                        
                        @if($teacher->experience_years)
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <i class="fas fa-clock text-primary me-2"></i>
                            <small class="text-muted">{{ $teacher->experience_years }}+ năm kinh nghiệm</small>
                        </div>
                        @endif
                        
                        @if($teacher->bio)
                            <p class="text-muted small mb-3">{!! Str::limit(strip_tags($teacher->bio), 120) !!}</p>
                        @endif
                        
                        <a href="{{ route('teachers.show', $teacher->slug) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>Xem Chi Tiết
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-users fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Chưa có thông tin giảng viên</h4>
                    <p class="text-muted">Thông tin đội ngũ giảng viên sẽ được cập nhật sớm.</p>
                </div>
            </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($teachers->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $teachers->links() }}
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Muốn học với đội ngũ giảng viên tiếng Đức chuyên nghiệp?</h3>
                <p class="text-muted mb-0">
                    Đăng ký tư vấn miễn phí để được tư vấn lộ trình học tiếng Đức phù hợp và gặp gỡ giảng viên
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">Học Thử Miễn Phí</a>
                <a href="tel:0975186230" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-phone me-2"></i>Gọi Ngay
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.teacher-card {
    transition: all 0.3s ease;
    overflow: hidden;
}

.teacher-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.teacher-avatar {
    object-fit: cover;
    border: 4px solid #f8f9fa;
    transition: transform 0.3s ease;
}

.teacher-card:hover .teacher-avatar {
    transform: scale(1.05);
}

.teacher-avatar-placeholder {
    border: 4px solid #f8f9fa;
    transition: transform 0.3s ease;
}

.teacher-card:hover .teacher-avatar-placeholder {
    transform: scale(1.05);
}

.teacher-card .badge {
    font-size: 0.8rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
}

.teacher-card .btn {
    border-radius: 20px;
    padding: 0.5rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.teacher-card .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
}

/* Pagination Styles */
.pagination {
    gap: 0.25rem;
}

.pagination .page-link {
    border: none;
    color: #6c757d;
    padding: 0.5rem 0.75rem;
    border-radius: 0.375rem;
    transition: all 0.3s ease;
    font-weight: 500;
}

.pagination .page-link:hover {
    background-color: rgba(0, 123, 255, 0.1);
    color: var(--primary-color);
    transform: translateY(-1px);
}

.pagination .page-item.active .page-link {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
}

.pagination .page-item.disabled .page-link {
    color: #adb5bd;
    background-color: transparent;
    cursor: not-allowed;
}

/* Responsive */
@media (max-width: 768px) {
    .teacher-card .card-body {
        padding: 1.5rem !important;
    }
    
    .teacher-avatar,
    .teacher-avatar-placeholder {
        width: 100px !important;
        height: 100px !important;
    }
    
    .pagination {
        gap: 0.125rem;
    }
    
    .pagination .page-link {
        padding: 0.375rem 0.5rem;
        font-size: 0.875rem;
    }
}
</style>
@endsection
