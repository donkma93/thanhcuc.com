@extends('layouts.app')

@section('title', 'Tin Tức - Trung Tâm Tiếng Đức Thanh Cúc')
@section('description', 'Cập nhật tin tức mới nhất về trung tâm tiếng Đức Thanh Cúc, lịch khai giảng, lịch thi và các hoạt động của trung tâm.')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">tin tức</li>
                </ol>
            </nav>
            
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary mb-3">TIN TỨC</h1>
                <p class="lead text-muted">Cập nhật những tin tức mới nhất về trung tâm và các hoạt động học tập</p>
            </div>
        </div>
    </div>

            <!-- KIẾN THỨC TIẾNG ĐỨC Section -->
        <div class="news-section">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center category-header">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 category-icon" 
                             style="width: 50px; height: 50px;">
                            <i class="fas fa-graduation-cap fa-lg"></i>
                        </div>
                        <h2 class="mb-0 text-primary fw-bold">KIẾN THỨC TIẾNG ĐỨC</h2>
                    </div>
                </div>
            </div>

        @if($germanKnowledge->count() > 0)
            <div class="row mb-5">
                @foreach($germanKnowledge as $article)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 news-card">
                            @if($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $article->title }}"
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <i class="fas fa-newspaper fa-3x text-muted"></i>
                                </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge bg-primary">{{ $article->category }}</span>
                                    @if($article->is_featured)
                                        <span class="badge bg-warning">Nổi bật</span>
                                    @endif
                                </div>
                                
                                <h5 class="card-title">
                                    <a href="{{ route('news.detail', $article->slug) }}" 
                                       class="text-decoration-none text-dark">
                                        {{ $article->title }}
                                    </a>
                                </h5>
                                
                                @if($article->excerpt)
                                    <p class="card-text text-muted flex-grow-1">
                                        {{ Str::limit($article->excerpt, 120) }}
                                    </p>
                                @endif
                                
                                <div class="mt-auto">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ $article->published_at ? $article->published_at->format('d/m/Y') : 'Chưa xuất bản' }}
                                    </small>
                                    
                                    <a href="{{ route('news.detail', $article->slug) }}" 
                                       class="btn btn-outline-primary btn-sm mt-2">
                                        Đọc thêm <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <div class="py-4">
                        <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Chưa có bài viết về kiến thức tiếng Đức</h4>
                        <p class="text-muted">Hãy quay lại sau để xem những bài viết mới nhất!</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- HOẠT ĐỘNG CÔNG TY Section -->
        <div class="news-section">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center category-header">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 category-icon" 
                             style="width: 50px; height: 50px;">
                            <i class="fas fa-building fa-lg"></i>
                        </div>
                        <h2 class="mb-0 text-success fw-bold">HOẠT ĐỘNG CÔNG TY</h2>
                    </div>
                </div>
            </div>

        @if($companyActivities->count() > 0)
            <div class="row">
                @foreach($companyActivities as $article)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0 news-card">
                            @if($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $article->title }}"
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <i class="fas fa-newspaper fa-3x text-muted"></i>
                                </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge bg-success">{{ $article->category }}</span>
                                    @if($article->is_featured)
                                        <span class="badge bg-warning">Nổi bật</span>
                                    @endif
                                </div>
                                
                                <h5 class="card-title">
                                    <a href="{{ route('news.detail', $article->slug) }}" 
                                       class="text-decoration-none text-dark">
                                        {{ $article->title }}
                                    </a>
                                </h5>
                                
                                @if($article->excerpt)
                                    <p class="card-text text-muted flex-grow-1">
                                        {{ Str::limit($article->excerpt, 120) }}
                                    </p>
                                @endif
                                
                                <div class="mt-auto">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ $article->published_at ? $article->published_at->format('d/m/Y') : 'Chưa xuất bản' }}
                                    </small>
                                    
                                    <a href="{{ route('news.detail', $article->slug) }}" 
                                       class="btn btn-outline-success btn-sm mt-2">
                                        Đọc thêm <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <div class="py-4">
                        <i class="fas fa-building fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Chưa có tin tức về hoạt động công ty</h4>
                        <p class="text-muted">Hãy quay lại sau để xem những tin tức mới nhất!</p>
                    </div>
                </div>
            </div>
        @endif
</div>

    <style>
    .news-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    
    .news-card .card-title a:hover {
        color: var(--primary-color) !important;
    }
    
    .badge {
        font-size: 0.75rem;
    }
    
    .category-header {
        position: relative;
        padding-bottom: 1rem;
        margin-bottom: 2rem;
    }
    
    .category-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        border-radius: 2px;
    }
    
    .category-icon {
        transition: transform 0.3s ease;
    }
    
    .category-header:hover .category-icon {
        transform: scale(1.1);
    }
    
    .news-section {
        margin-bottom: 4rem;
    }
    
    .news-section:last-child {
        margin-bottom: 2rem;
    }
    </style>
@endsection
