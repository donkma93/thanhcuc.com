@extends('admin.layouts.app')

@section('title', 'Quản lý Kết Quả Học Viên')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Quản lý Kết Quả Học Viên</h3>
                    <a href="{{ route('admin.student-results.create') }}" class="btn btn-primary">
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
                                    <option value="score" {{ request('type') === 'score' ? 'selected' : '' }}>Bảng điểm</option>
                                    <option value="feedback" {{ request('type') === 'feedback' ? 'selected' : '' }}>Phản hồi</option>
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
                                <a href="{{ route('admin.student-results.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </form>

                    <!-- Student Results Grid -->
                    @if($studentResults->count() > 0)
                        <div class="row" id="student-results-grid">
                            @foreach($studentResults as $studentResult)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-id="{{ $studentResult->id }}">
                                    <div class="card student-result-item">
                                        <div class="position-relative">
                                            <img src="{{ $studentResult->image_url }}" alt="{{ $studentResult->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                            
                                            <!-- Status Badge -->
                                            <span class="badge badge-{{ $studentResult->is_active ? 'success' : 'secondary' }} position-absolute" style="top: 10px; left: 10px;">
                                                {{ $studentResult->is_active ? 'Hoạt động' : 'Tạm dừng' }}
                                            </span>
                                            
                                            <!-- Type Badge -->
                                            <span class="badge badge-primary position-absolute" style="top: 10px; right: 10px;">
                                                {{ $studentResult->type === 'score' ? 'Bảng điểm' : 'Phản hồi' }}
                                            </span>
                                            
                                            @if($studentResult->level)
                                                <span class="badge badge-info position-absolute" style="bottom: 10px; left: 10px;">
                                                    {{ $studentResult->level }}
                                                </span>
                                            @endif

                                            @if($studentResult->is_featured)
                                                <span class="badge badge-warning position-absolute" style="bottom: 10px; right: 10px;">
                                                    <i class="fas fa-star"></i>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $studentResult->title }}</h6>
                                            <p class="card-text small text-muted">{{ Str::limit($studentResult->description, 60) }}</p>
                                            
                                            @if($studentResult->student_name)
                                                <small class="text-info">
                                                    <i class="fas fa-user"></i> {{ $studentResult->student_name }}
                                                </small>
                                            @endif

                                            @if($studentResult->certificate_type)
                                                <small class="text-success d-block">
                                                    <i class="fas fa-certificate"></i> {{ $studentResult->certificate_type }}
                                                </small>
                                            @endif

                                            @if($studentResult->score)
                                                <small class="text-warning d-block">
                                                    <i class="fas fa-chart-line"></i> {{ $studentResult->score }}
                                                </small>
                                            @endif
                                            
                                            <div class="mt-2">
                                                <small class="text-muted">Thứ tự: {{ $studentResult->sort_order }}</small>
                                            </div>
                                        </div>
                                        
                                        <div class="card-footer bg-transparent">
                                            <div class="btn-group w-100" role="group">
                                                <a href="{{ route('admin.student-results.edit', $studentResult) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.student-results.show', $studentResult) }}" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('admin.student-results.toggle-status', $studentResult) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-{{ $studentResult->is_active ? 'warning' : 'success' }}" title="{{ $studentResult->is_active ? 'Tạm dừng' : 'Kích hoạt' }}">
                                                        <i class="fas fa-{{ $studentResult->is_active ? 'pause' : 'play' }}"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.student-results.toggle-featured', $studentResult) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-{{ $studentResult->is_featured ? 'secondary' : 'warning' }}" title="{{ $studentResult->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}">
                                                        <i class="fas fa-star"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.student-results.destroy', $studentResult) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
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
                            {{ $studentResults->appends(request()->query())->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-trophy fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Chưa có kết quả học viên nào</h5>
                            <a href="{{ route('admin.student-results.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Thêm kết quả đầu tiên
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
.student-result-item {
    transition: all 0.3s ease;
    cursor: move;
}

.student-result-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.student-result-item .card-img-top {
    transition: transform 0.3s ease;
}

.student-result-item:hover .card-img-top {
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
    const studentResultsGrid = document.getElementById('student-results-grid');
    if (studentResultsGrid) {
        new Sortable(studentResultsGrid, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            onEnd: function(evt) {
                const items = [];
                studentResultsGrid.querySelectorAll('[data-id]').forEach((item, index) => {
                    items.push({
                        id: item.dataset.id,
                        sort_order: index
                    });
                });
                
                // Send AJAX request to update order
                fetch('{{ route("admin.student-results.update-order") }}', {
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
