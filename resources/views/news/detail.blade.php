@extends('layouts.app')

@section('title', $article->title . ' - Trung Tâm Tiếng Đức Thanh Cúc')
@section('description', $article->excerpt ?: 'Đọc tin tức chi tiết từ trung tâm tiếng Đức Thanh Cúc.')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news') }}">Tin tức</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($article->title, 50) }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <article class="news-detail">
                <!-- Article Header -->
                <header class="mb-4">
                    <div class="mb-3">
                        @if($article->category)
                            <span class="badge bg-primary me-2">{{ $article->category }}</span>
                        @endif
                        @if($article->is_featured)
                            <span class="badge bg-warning">Nổi bật</span>
                        @endif
                    </div>
                    
                    <h1 class="display-5 fw-bold text-primary mb-3">{{ $article->title }}</h1>
                    
                    <div class="d-flex align-items-center text-muted mb-4">
                        <i class="fas fa-calendar-alt me-2"></i>
                        <span>{{ $article->published_at ? $article->published_at->format('d/m/Y H:i') : 'Chưa xuất bản' }}</span>
                        
                        @if($article->author)
                            <span class="mx-3">|</span>
                            <i class="fas fa-user me-2"></i>
                            <span>{{ $article->author->name }}</span>
                        @endif
                    </div>
                </header>

                <!-- Featured Image -->
                @if($article->featured_image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $article->featured_image) }}" 
                             class="img-fluid rounded shadow" 
                             alt="{{ $article->title }}">
                    </div>
                @endif

                <!-- Article Content -->
                <div class="article-content">
                    @if($article->excerpt)
                        <div class="lead mb-4 p-3 bg-light rounded">
                            <strong>Tóm tắt:</strong> {{ $article->excerpt }}
                        </div>
                    @endif
                    
                    <div class="content-body">
                        {!! $article->content !!}
                    </div>
                </div>

                <!-- Article Footer -->
                <footer class="mt-5 pt-4 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('news') }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách
                            </a>
                        </div>
                        
                        <div class="text-muted">
                            <small>
                                <i class="fas fa-eye me-1"></i>
                                Đăng lúc: {{ $article->published_at ? $article->published_at->format('d/m/Y H:i') : 'Chưa xuất bản' }}
                            </small>
                        </div>
                    </div>
                </footer>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar">
                <!-- Related News -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-newspaper me-2"></i>Tin tức liên quan
                        </h5>
                    </div>
                    <div class="card-body">
                        @php
                            $relatedNews = \App\Models\News::where('is_published', true)
                                ->where('id', '!=', $article->id)
                                ->orderBy('published_at', 'desc')
                                ->take(5)
                                ->get();
                        @endphp
                        
                        @if($relatedNews->count() > 0)
                            <div class="list-group list-group-flush">
                                @foreach($relatedNews as $related)
                                    <a href="{{ route('news.detail', $related->slug) }}" 
                                       class="list-group-item list-group-item-action border-0 px-0">
                                        <div class="d-flex align-items-center">
                                            @if($related->featured_image)
                                                <img src="{{ asset('storage/' . $related->featured_image) }}" 
                                                     class="rounded me-3" 
                                                     alt="{{ $related->title }}"
                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                                     style="width: 60px; height: 60px;">
                                                    <i class="fas fa-newspaper text-muted"></i>
                                                </div>
                                            @endif
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">{{ Str::limit($related->title, 60) }}</h6>
                                                <small class="text-muted">
                                                    {{ $related->published_at ? $related->published_at->format('d/m/Y') : 'Chưa xuất bản' }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mb-0">Chưa có tin tức liên quan.</p>
                        @endif
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-link me-2"></i>Liên kết nhanh
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('schedule') }}" class="list-group-item list-group-item-action border-0 px-0">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>Lịch khai giảng
                            </a>
                            <a href="{{ route('exam-schedule') }}" class="list-group-item list-group-item-action border-0 px-0">
                                <i class="fas fa-calendar-check me-2 text-success"></i>Lịch thi
                            </a>
                            <a href="{{ route('results') }}" class="list-group-item list-group-item-action border-0 px-0">
                                <i class="fas fa-trophy me-2 text-warning"></i>Kết quả học viên
                            </a>
                            <a href="{{ route('contact') }}" class="list-group-item list-group-item-action border-0 px-0">
                                <i class="fas fa-phone me-2 text-info"></i>Liên hệ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.news-detail {
    background: #fff;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.article-content {
    line-height: 1.8;
    font-size: 1.1rem;
}

.content-body {
    color: #333;
}

.content-body h2, .content-body h3, .content-body h4 {
    color: var(--primary-color);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.content-body p {
    margin-bottom: 1.5rem;
}

.content-body img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1rem 0;
}

.sidebar .card {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.list-group-item:hover {
    background-color: #f8f9fa;
}

.badge {
    font-size: 0.75rem;
}
</style>
@endsection
