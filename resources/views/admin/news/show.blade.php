@extends('admin.layouts.app')

@section('title', 'Chi tiết tin tức')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chi tiết tin tức</h1>
        <div>
            <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit"></i> Chỉnh sửa
            </a>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Article Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nội dung tin tức</h6>
                </div>
                <div class="card-body">
                    <h2 class="mb-3">{{ $news->title }}</h2>
                    
                    @if($news->featured_image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $news->featured_image) }}" 
                                 alt="{{ $news->title }}" 
                                 class="img-fluid rounded">
                        </div>
                    @endif
                    
                    @if($news->excerpt)
                        <div class="alert alert-info">
                            <strong>Tóm tắt:</strong> {{ $news->excerpt }}
                        </div>
                    @endif
                    
                    <div class="content-body">
                        {!! $news->content !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Article Info -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin tin tức</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>ID:</strong></td>
                            <td>{{ $news->id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Slug:</strong></td>
                            <td><code>{{ $news->slug }}</code></td>
                        </tr>
                        <tr>
                            <td><strong>Danh mục:</strong></td>
                            <td>
                                @if($news->category)
                                    <span class="badge bg-info">{{ $news->category }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Trạng thái:</strong></td>
                            <td>
                                @if($news->is_published)
                                    <span class="badge bg-success">Đã xuất bản</span>
                                @else
                                    <span class="badge bg-warning">Bản nháp</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nổi bật:</strong></td>
                            <td>
                                @if($news->is_featured)
                                    <span class="badge bg-warning">Có</span>
                                @else
                                    <span class="text-muted">Không</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Tác giả:</strong></td>
                            <td>{{ $news->author->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ngày xuất bản:</strong></td>
                            <td>
                                @if($news->published_at)
                                    {{ $news->published_at->format('d/m/Y H:i') }}
                                @else
                                    <span class="text-muted">Chưa xuất bản</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Tạo lúc:</strong></td>
                            <td>{{ $news->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Cập nhật:</strong></td>
                            <td>{{ $news->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thao tác</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                        
                        <form action="{{ route('admin.news.toggle-published', $news) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-{{ $news->is_published ? 'warning' : 'success' }} w-100">
                                <i class="fas fa-{{ $news->is_published ? 'eye-slash' : 'eye' }}"></i>
                                {{ $news->is_published ? 'Ẩn tin tức' : 'Xuất bản' }}
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.news.toggle-featured', $news) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-{{ $news->is_featured ? 'secondary' : 'warning' }} w-100">
                                <i class="fas fa-star"></i>
                                {{ $news->is_featured ? 'Bỏ nổi bật' : 'Gắn nổi bật' }}
                            </button>
                        </form>
                        
                        <a href="{{ route('news.detail', $news->slug) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-external-link-alt"></i> Xem trên website
                        </a>
                        
                        <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?')">
                                <i class="fas fa-trash"></i> Xóa tin tức
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Related News -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tin tức liên quan</h6>
                </div>
                <div class="card-body">
                    @php
                        $relatedNews = \App\Models\News::where('is_published', true)
                            ->where('id', '!=', $news->id)
                            ->orderBy('published_at', 'desc')
                            ->take(5)
                            ->get();
                    @endphp
                    
                    @if($relatedNews->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($relatedNews as $related)
                                <a href="{{ route('admin.news.show', $related) }}" 
                                   class="list-group-item list-group-item-action border-0 px-0">
                                    <div class="d-flex align-items-center">
                                        @if($related->featured_image)
                                            <img src="{{ asset('storage/' . $related->featured_image) }}" 
                                                 class="rounded me-3" 
                                                 alt="{{ $related->title }}"
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-newspaper text-muted"></i>
                                            </div>
                                        @endif
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ Str::limit($related->title, 50) }}</h6>
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
        </div>
    </div>
</div>

<style>
.content-body {
    line-height: 1.8;
    font-size: 1.1rem;
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
</style>
@endsection
