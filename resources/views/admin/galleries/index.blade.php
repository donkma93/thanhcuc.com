@extends('admin.layouts.app')

@section('title', 'Quản lý Gallery')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Quản lý Gallery</h3>
                    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm mới
                    </a>
                </div>
                
                <div class="card-body">
                    <!-- Filters -->
                    <form method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="type" class="form-control">
                                    <option value="">Tất cả loại</option>
                                    <option value="classroom" {{ request('type') === 'classroom' ? 'selected' : '' }}>Lớp học</option>
                                    <option value="facility" {{ request('type') === 'facility' ? 'selected' : '' }}>Cơ sở vật chất</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="status" class="form-control">
                                    <option value="">Tất cả trạng thái</option>
                                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Tạm dừng</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-search"></i> Lọc
                                </button>
                                <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Gallery Grid -->
                    @if($galleries->count() > 0)
                        <div class="row" id="gallery-grid">
                            @foreach($galleries as $gallery)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-id="{{ $gallery->id }}">
                                    <div class="card gallery-item">
                                        <div class="position-relative">
                                            <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                            
                                            <!-- Status Badge -->
                                            <span class="badge badge-{{ $gallery->is_active ? 'success' : 'secondary' }} position-absolute" style="top: 10px; left: 10px;">
                                                {{ $gallery->status_display }}
                                            </span>
                                            
                                            <!-- Type Badge -->
                                            <span class="badge badge-primary position-absolute" style="top: 10px; right: 10px;">
                                                {{ $gallery->type_display }}
                                            </span>
                                            
                                            @if($gallery->level)
                                                <span class="badge badge-info position-absolute" style="bottom: 10px; left: 10px;">
                                                    {{ $gallery->level }}
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $gallery->title }}</h6>
                                            <p class="card-text small text-muted">{{ Str::limit($gallery->description, 60) }}</p>
                                            
                                            @if($gallery->students)
                                                <small class="text-info">
                                                    <i class="fas fa-users"></i> {{ $gallery->students }}
                                                </small>
                                            @endif
                                            
                                            <div class="mt-2">
                                                <small class="text-muted">Thứ tự: {{ $gallery->sort_order }}</small>
                                            </div>
                                        </div>
                                        
                                        <div class="card-footer bg-transparent">
                                            <div class="btn-group w-100" role="group">
                                                <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.galleries.show', $gallery) }}" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('admin.galleries.toggle-status', $gallery) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-{{ $gallery->is_active ? 'warning' : 'success' }}" title="{{ $gallery->is_active ? 'Tạm dừng' : 'Kích hoạt' }}">
                                                        <i class="fas fa-{{ $gallery->is_active ? 'pause' : 'play' }}"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $galleries->appends(request()->query())->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-images fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Chưa có gallery nào</h5>
                            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Thêm gallery đầu tiên
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.gallery-item {
    transition: all 0.3s ease;
    cursor: move;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.gallery-item .card-img-top {
    transition: transform 0.3s ease;
}

.gallery-item:hover .card-img-top {
    transform: scale(1.05);
}

.sortable-ghost {
    opacity: 0.5;
}

.sortable-chosen {
    transform: rotate(5deg);
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize sortable
    const galleryGrid = document.getElementById('gallery-grid');
    if (galleryGrid) {
        new Sortable(galleryGrid, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            onEnd: function(evt) {
                const items = [];
                galleryGrid.querySelectorAll('[data-id]').forEach((item, index) => {
                    items.push({
                        id: item.dataset.id,
                        sort_order: index
                    });
                });
                
                // Send AJAX request to update order
                fetch('{{ route("admin.galleries.update-order") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ items: items })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        showAlert('success', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('error', 'Có lỗi xảy ra khi cập nhật thứ tự');
                });
            }
        });
    }
});

function showAlert(type, message) {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const alertHtml = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    `;
    
    const container = document.querySelector('.container-fluid');
    container.insertAdjacentHTML('afterbegin', alertHtml);
    
    // Auto hide after 3 seconds
    setTimeout(() => {
        const alert = container.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 3000);
}
</script>
@endpush
