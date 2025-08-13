@extends('layouts.app')

@section('title', 'Đội Ngũ Giảng Viên - Anh Ngữ SEC')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Đội Ngũ Giảng Viên Top Đầu</h1>
                <p class="lead">
                    Đội ngũ giảng viên giàu kinh nghiệm với chứng chỉ quốc tế, 
                    cam kết mang đến chất lượng giảng dạy tốt nhất cho học viên
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Teachers Section -->
<section class="py-5">
    <div class="container">
        @foreach($teachers as $specialization => $teacherGroup)
        <div class="mb-5">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary mb-2">Giảng Viên {{ $specialization }}</h2>
                <div class="border-bottom border-primary mx-auto" style="width: 100px;"></div>
            </div>
            
            <div class="row">
                @foreach($teacherGroup as $teacher)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="teacher-card card h-100 text-center">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                @if($teacher->avatar)
                                    <img src="{{ $teacher->avatar }}" alt="{{ $teacher->name }}" 
                                         class="rounded-circle" width="100" height="100">
                                @else
                                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                         style="width: 100px; height: 100px;">
                                        <i class="fas fa-user fa-3x text-white"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <h5 class="fw-bold text-uppercase mb-2">{{ $teacher->name }}</h5>
                            <p class="text-muted small mb-2">Giảng viên {{ $teacher->specialization }}</p>
                            <span class="course-badge mb-3 d-inline-block">{{ $teacher->certification }}</span>
                            
                            @if($teacher->bio)
                                <p class="text-muted small mb-3">{!! Str::limit(strip_tags($teacher->bio), 100) !!}</p>
                            @endif
                            
                            @if($teacher->experience_years)
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <i class="fas fa-clock text-primary me-2"></i>
                                    <small class="text-muted">{{ $teacher->experience_years }} năm kinh nghiệm</small>
                                </div>
                            @endif
                            
                            <a href="{{ route('teachers.show', $teacher->slug) }}" class="btn btn-outline-primary btn-sm">
                                Xem Chi Tiết
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Muốn học với đội ngũ giảng viên chuyên nghiệp?</h3>
                <p class="text-muted mb-0">
                    Đăng ký tư vấn miễn phí để được tư vấn lộ trình học phù hợp và gặp gỡ giảng viên
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
@endsection
