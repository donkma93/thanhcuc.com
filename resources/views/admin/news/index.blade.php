@extends('admin.layouts.app')

@section('title', 'Quản lý Tin tức')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý Tin tức</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm tin tức mới
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách tin tức</h6>
        </div>
        <div class="card-body">
            @if($news->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Trạng thái</th>
                                <th>Nổi bật</th>
                                <th>Ngày xuất bản</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>
                                        @if($article->featured_image)
                                            <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                                 alt="{{ $article->title }}" 
                                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 60px; height: 60px; border-radius: 4px;">
                                                <i class="fas fa-newspaper text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <strong>{{ $article->title }}</strong>
                                            @if($article->excerpt)
                                                <br><small class="text-muted">{{ Str::limit($article->excerpt, 80) }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @if($article->category)
                                            <span class="badge bg-info">{{ $article->category }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($article->is_published)
                                            <span class="badge bg-success">Đã xuất bản</span>
                                        @else
                                            <span class="badge bg-warning">Bản nháp</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($article->is_featured)
                                            <span class="badge bg-warning">Nổi bật</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($article->published_at)
                                            {{ $article->published_at->format('d/m/Y H:i') }}
                                        @else
                                            <span class="text-muted">Chưa xuất bản</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.news.show', $article) }}" 
                                               class="btn btn-sm btn-info" title="Xem">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.news.edit', $article) }}" 
                                               class="btn btn-sm btn-primary" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <form action="{{ route('admin.news.toggle-published', $article) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-{{ $article->is_published ? 'warning' : 'success' }}" 
                                                        title="{{ $article->is_published ? 'Ẩn' : 'Xuất bản' }}">
                                                    <i class="fas fa-{{ $article->is_published ? 'eye-slash' : 'eye' }}"></i>
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.news.toggle-featured', $article) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-{{ $article->is_featured ? 'secondary' : 'warning' }}" 
                                                        title="{{ $article->is_featured ? 'Bỏ nổi bật' : 'Gắn nổi bật' }}">
                                                    <i class="fas fa-star"></i>
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.news.destroy', $article) }}" 
                                                  method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Xóa"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $news->links() }}
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Chưa có tin tức nào</h5>
                    <p class="text-muted">Hãy tạo tin tức đầu tiên để bắt đầu.</p>
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm tin tức mới
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@include('admin.components.confirmation-modal')
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable
    if (typeof $.fn.DataTable !== 'undefined') {
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Vietnamese.json"
            }
        });
    }
});
</script>
@endpush
