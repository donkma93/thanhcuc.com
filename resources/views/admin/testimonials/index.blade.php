@extends('admin.layouts.app')

@section('title', 'Quản lý Nhận xét')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-comments me-2"></i>
            Quản lý Nhận xét Học viên
        </h1>
        <p class="text-muted mb-0">Quản lý nhận xét và đánh giá từ học viên</p>
    </div>
    <div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>
            Thêm Nhận xét
        </a>
    </div>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $testimonials->total() }}</h4>
                            <p class="mb-0">Tổng nhận xét</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-comments fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $testimonials->where('is_active', true)->count() }}</h4>
                            <p class="mb-0">Đang hiển thị</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $testimonials->where('is_featured', true)->count() }}</h4>
                            <p class="mb-0">Nổi bật</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-star fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ number_format($testimonials->avg('rating'), 1) }}</h4>
                            <p class="mb-0">Đánh giá TB</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-star-half-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials List -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Danh sách Nhận xét
            </h5>
        </div>
        <div class="card-body">
            @if($testimonials->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover" id="testimonialsTable">
                        <thead>
                            <tr>
                                <th width="60">
                                    <i class="fas fa-sort" title="Kéo thả để sắp xếp"></i>
                                </th>
                                <th width="80">Avatar</th>
                                <th>Học viên</th>
                                <th>Chương trình</th>
                                <th>Nội dung</th>
                                <th width="100">Đánh giá</th>
                                <th width="100">Trạng thái</th>
                                <th width="80">Nổi bật</th>
                                <th width="150">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                            @foreach($testimonials as $testimonial)
                                <tr data-id="{{ $testimonial->id }}">
                                    <td class="text-center">
                                        <i class="fas fa-grip-vertical text-muted" style="cursor: move;"></i>
                                    </td>
                                    <td>
                                        @if($testimonial->avatar_path)
                                            <img src="{{ $testimonial->avatar_url }}" 
                                                 alt="{{ $testimonial->name }}" 
                                                 class="rounded-circle" 
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-user text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <strong>{{ $testimonial->name }}</strong>
                                            @if($testimonial->current_job)
                                                <br><small class="text-muted">{{ $testimonial->current_job }}</small>
                                            @endif
                                            @if($testimonial->company)
                                                <br><small class="text-primary">{{ $testimonial->company }}</small>
                                            @endif
                                            @if($testimonial->location)
                                                <br><small class="text-success">
                                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $testimonial->location }}
                                                </small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $testimonial->program }}</span>
                                    </td>
                                    <td>
                                        <div style="max-width: 300px;">
                                            {{ Str::limit($testimonial->content, 150) }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $testimonial->rating)
                                                    <i class="fas fa-star text-warning"></i>
                                                @else
                                                    <i class="far fa-star text-muted"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <small class="text-muted">{{ $testimonial->rating }}/5</small>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.testimonials.toggle-status', $testimonial) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $testimonial->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                @if($testimonial->is_active)
                                                    <i class="fas fa-eye"></i>
                                                @else
                                                    <i class="fas fa-eye-slash"></i>
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.testimonials.toggle-featured', $testimonial) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $testimonial->is_featured ? 'btn-warning' : 'btn-outline-warning' }}">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.testimonials.show', $testimonial) }}" 
                                               class="btn btn-outline-info" title="Xem">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                               class="btn btn-outline-primary" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" 
                                                        title="Xóa"
                                                        data-delete="Nhận xét của {{ $testimonial->name }}">
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

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <small class="text-muted">
                            Hiển thị {{ $testimonials->firstItem() }} - {{ $testimonials->lastItem() }} 
                            trong tổng số {{ $testimonials->total() }} nhận xét
                        </small>
                    </div>
                    <div>
                        {{ $testimonials->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-comments fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Chưa có nhận xét nào</h5>
                    <p class="text-muted">Hãy thêm nhận xét đầu tiên từ học viên</p>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Thêm Nhận xét Đầu Tiên
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.css">
<style>
    .sortable-ghost {
        opacity: 0.4;
    }
    
    .sortable-chosen {
        background-color: #f8f9fa;
    }
    
    #sortable tr {
        cursor: move;
    }
    
    .rounded-circle {
        border: 2px solid #e9ecef;
    }
    
    .fa-star {
        font-size: 0.9rem;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sortable functionality
        const sortable = document.getElementById('sortable');
        if (sortable) {
            new Sortable(sortable, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                chosenClass: 'sortable-chosen',
                onEnd: function(evt) {
                    const items = [];
                    const rows = sortable.querySelectorAll('tr[data-id]');
                    
                    rows.forEach((row, index) => {
                        items.push({
                            id: row.dataset.id,
                            sort_order: index
                        });
                    });
                    
                    // Send AJAX request to update order
                    fetch('{{ route("admin.testimonials.update-order") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ items: items })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
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
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        
        const alert = document.createElement('div');
        alert.className = `alert ${alertClass} alert-dismissible fade show`;
        alert.innerHTML = `
            <i class="fas ${icon} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        const container = document.querySelector('.main-content');
        container.insertBefore(alert, container.firstChild);
        
        // Auto dismiss after 3 seconds
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 3000);
    }
</script>
@endpush