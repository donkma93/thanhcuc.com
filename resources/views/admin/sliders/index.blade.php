@extends('admin.layouts.app')

@section('title', 'Quản lý Slider')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-images me-2"></i>
            Quản lý Slider
        </h1>
        <p class="text-muted mb-0">Quản lý slider hiển thị trên trang chủ</p>
    </div>
    <div>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>
            Thêm Slider
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
                            <h4 class="mb-0">{{ $sliders->total() }}</h4>
                            <p class="mb-0">Tổng slider</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-images fa-2x"></i>
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
                            <h4 class="mb-0">{{ $sliders->where('is_active', true)->count() }}</h4>
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
                            <h4 class="mb-0">{{ $sliders->where('is_active', false)->count() }}</h4>
                            <p class="mb-0">Đã ẩn</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-eye-slash fa-2x"></i>
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
                            <h4 class="mb-0">{{ $sliders->where('button_link', '!=', null)->count() }}</h4>
                            <p class="mb-0">Có button</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-mouse-pointer fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sliders List -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Danh sách Slider
            </h5>
        </div>
        <div class="card-body">
            @if($sliders->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover" id="slidersTable">
                        <thead>
                            <tr>
                                <th width="60">
                                    <i class="fas fa-sort" title="Kéo thả để sắp xếp"></i>
                                </th>
                                <th width="100">Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th>Button</th>
                                <th width="100">Trạng thái</th>
                                <th width="80">Thứ tự</th>
                                <th width="150">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                            @foreach($sliders as $slider)
                                <tr data-id="{{ $slider->id }}">
                                    <td class="text-center">
                                        <i class="fas fa-grip-vertical text-muted" style="cursor: move;"></i>
                                    </td>
                                    <td>
                                        @if($slider->image_path)
                                            <img src="{{ $slider->image_url }}" 
                                                 alt="{{ $slider->title }}" 
                                                 class="img-thumbnail" 
                                                 style="width: 80px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 80px; height: 50px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $slider->title }}</strong>
                                    </td>
                                    <td>
                                        @if($slider->description)
                                            {{ Str::limit($slider->description, 100) }}
                                        @else
                                            <span class="text-muted">Không có mô tả</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($slider->button_text && $slider->button_link)
                                            <span class="badge bg-primary">{{ $slider->button_text }}</span>
                                            <br>
                                            <small class="text-muted">{{ Str::limit($slider->button_link, 30) }}</small>
                                        @else
                                            <span class="text-muted">Không có</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.sliders.toggle-status', $slider) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $slider->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                @if($slider->is_active)
                                                    <i class="fas fa-eye"></i> Hiển thị
                                                @else
                                                    <i class="fas fa-eye-slash"></i> Ẩn
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark">{{ $slider->sort_order }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.sliders.show', $slider) }}" 
                                               class="btn btn-outline-info" title="Xem">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.sliders.edit', $slider) }}" 
                                               class="btn btn-outline-primary" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.sliders.destroy', $slider) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" 
                                                        title="Xóa"
                                                        onclick="return confirm('Bạn có chắc muốn xóa slider này?')">
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
                            Hiển thị {{ $sliders->firstItem() }} - {{ $sliders->lastItem() }} 
                            trong tổng số {{ $sliders->total() }} slider
                        </small>
                    </div>
                    <div>
                        {{ $sliders->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-images fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Chưa có slider nào</h5>
                    <p class="text-muted">Hãy tạo slider đầu tiên cho trang chủ</p>
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Tạo Slider Đầu Tiên
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
    
    .img-thumbnail {
        border-radius: 8px;
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
                    fetch('{{ route("admin.sliders.update-order") }}', {
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
                            // Update sort order badges
                            rows.forEach((row, index) => {
                                const badge = row.querySelector('.badge');
                                if (badge) {
                                    badge.textContent = index;
                                }
                            });
                            
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