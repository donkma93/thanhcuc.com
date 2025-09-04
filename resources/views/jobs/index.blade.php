@extends('layouts.app')

@section('title', 'Tuyển Dụng - Anh Ngữ SEC')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('general.jobs_title') }}</h1>
                <p class="lead">
                    Gia nhập đội ngũ SEC - Nơi bạn có thể phát triển sự nghiệp trong lĩnh vực giáo dục 
                    với môi trường làm việc chuyên nghiệp và cơ hội thăng tiến
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Jobs -->
@if($featuredJobs->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">{{ __('general.featured_positions') }}</h2>
            <p class="text-muted">{{ __('general.featured_positions_subtitle') }}</p>
        </div>
        
        <div class="row">
            @foreach($featuredJobs as $job)
            <div class="col-lg-6 mb-4">
                <div class="card feature-card h-100 border-primary">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-primary">{{ $job->department }}</span>
                            <span class="badge bg-success">{{ $job->employment_type }}</span>
                        </div>
                        
                        <h4 class="fw-bold mb-3">{{ $job->title }}</h4>
                        <p class="text-muted mb-3">{{ Str::limit($job->description, 150) }}</p>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $job->location }}
                                </small>
                            </div>
                            @if($job->salary_range)
                            <div class="col-6">
                                <small class="text-muted d-block">
                                    <i class="fas fa-money-bill-wave me-1"></i>{{ $job->salary_range }}
                                </small>
                            </div>
                            @endif
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>{{ $job->created_at->format('d/m/Y') }}
                            </small>
                            <a href="{{ route('jobs.show', ['locale' => app()->getLocale(), 'slug' => $job->slug]) }}" class="btn btn-primary">
                                Xem Chi Tiết
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- All Jobs by Department -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">{{ __('general.all_positions') }}</h2>
            <p class="text-muted">Khám phá các cơ hội nghề nghiệp theo từng bộ phận</p>
        </div>
        
        @foreach($jobs as $department => $jobGroup)
        <div class="mb-5">
            <h3 class="fw-bold mb-4">
                <i class="fas fa-briefcase text-primary me-2"></i>{{ $department }}
            </h3>
            
            <div class="row">
                @foreach($jobGroup as $job)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge bg-secondary">{{ $job->employment_type }}</span>
                                @if($job->application_deadline)
                                    <small class="text-danger">
                                        <i class="fas fa-clock me-1"></i>Hạn: {{ $job->application_deadline->format('d/m/Y') }}
                                    </small>
                                @endif
                            </div>
                            
                            <h5 class="fw-bold mb-3">{{ $job->title }}</h5>
                            <p class="text-muted mb-3">{{ Str::limit($job->description, 100) }}</p>
                            
                            <div class="mb-3">
                                <small class="text-muted d-block">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $job->location }}
                                </small>
                                @if($job->salary_range)
                                <small class="text-muted d-block">
                                    <i class="fas fa-money-bill-wave me-1"></i>{{ $job->salary_range }}
                                </small>
                                @endif
                            </div>
                            
                            <a href="{{ route('jobs.show', ['locale' => app()->getLocale(), 'slug' => $job->slug]) }}" class="btn btn-outline-primary w-100">
                                Xem Chi Tiết & Ứng Tuyển
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

<!-- Why Join SEC -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Tại Sao Nên Làm Việc Tại SEC?</h2>
            <p class="text-muted">Những lợi ích khi gia nhập đội ngũ SEC</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-graduation-cap fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Môi Trường Giáo Dục</h5>
                    <p class="text-muted">Làm việc trong môi trường giáo dục lành mạnh, hỗ trợ phát triển toàn diện</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-chart-line fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Cơ Hội Thăng Tiến</h5>
                    <p class="text-muted">Cơ hội học hỏi và thăng tiến qua trải nghiệm thực tế</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-money-bill-wave fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Lương Thưởng Xứng Đáng</h5>
                    <p class="text-muted">Lương cơ bản + Lương tháng 13 + Thưởng, tùy theo kinh nghiệm và năng lực</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-shield-alt fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Chính Sách Phúc Lợi</h5>
                    <p class="text-muted">Chính sách phúc lợi hấp dẫn, tuân thủ đúng quy định của Luật Lao động</p>
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
                <h3 class="fw-bold mb-3">Sẵn sàng gia nhập đội ngũ SEC?</h3>
                <p class="mb-0">
                    Gửi CV của bạn ngay hôm nay để có cơ hội làm việc trong môi trường giáo dục chuyên nghiệp
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="mailto:hr@anhngusec.edu.vn" class="btn btn-light btn-lg">
                    <i class="fas fa-envelope me-2"></i>Gửi CV Ngay
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
