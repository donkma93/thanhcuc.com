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
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-list me-2"></i>
                    Danh sách Slider
                </h5>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" class="form-control" id="searchInput" placeholder="Tìm kiếm slider...">
                        <button class="btn btn-outline-secondary" type="button" id="clearSearch">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <select class="form-select form-select-sm" id="statusFilter" style="width: 150px;">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active">Đang hiển thị</option>
                        <option value="inactive">Đã ẩn</option>
                    </select>
                </div>
            </div>
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
                                <th width="120">Hình ảnh</th>
                                <th width="200">Tiêu đề</th>
                                <th>Mô tả</th>
                                <th width="150">Button</th>
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
                                            <div class="slider-image-container">
                                                <img src="{{ $slider->image_url }}" 
                                                     alt="{{ $slider->title }}" 
                                                     class="slider-thumbnail" 
                                                     data-bs-toggle="modal" 
                                                     data-bs-target="#imageModal"
                                                     data-image="{{ $slider->image_url }}"
                                                     data-title="{{ $slider->title }}">
                                                <div class="slider-image-overlay">
                                                    <i class="fas fa-search-plus"></i>
                                                </div>
                                            </div>
                                        @else
                                            <div class="slider-placeholder">
                                                <i class="fas fa-image text-muted"></i>
                                                <small class="d-block text-muted">Không có ảnh</small>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="slider-title">
                                            <strong>{{ $slider->title }}</strong>
                                            @if($slider->is_active)
                                                <span class="badge bg-success ms-1">Hiển thị</span>
                                            @else
                                                <span class="badge bg-secondary ms-1">Ẩn</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="slider-description">
                                            @if($slider->description)
                                                <div class="text-truncate" title="{{ $slider->description }}">
                                                    {{ Str::limit($slider->description, 80) }}
                                                </div>
                                            @else
                                                <span class="text-muted">Không có mô tả</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @if($slider->button_text && $slider->button_link)
                                            <div class="slider-button-info">
                                                <span class="badge bg-primary">{{ $slider->button_text }}</span>
                                                <div class="text-truncate mt-1" title="{{ $slider->button_link }}">
                                                    <small class="text-muted">{{ Str::limit($slider->button_link, 25) }}</small>
                                                </div>
                                            </div>
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
                                                    <i class="fas fa-eye"></i>
                                                @else
                                                    <i class="fas fa-eye-slash"></i>
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
                                                        data-delete="{{ $slider->title }}">
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
    
    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Xem ảnh slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="" class="img-fluid rounded">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
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
    
    /* Slider Image Styles */
    .slider-image-container {
        position: relative;
        width: 100px;
        height: 60px;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .slider-image-container:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .slider-thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }
    
    .slider-image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 8px;
    }
    
    .slider-image-container:hover .slider-image-overlay {
        opacity: 1;
    }
    
    .slider-image-overlay i {
        color: white;
        font-size: 1.2rem;
    }
    
    .slider-placeholder {
        width: 100px;
        height: 60px;
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #6c757d;
    }
    
    .slider-placeholder i {
        font-size: 1.5rem;
        margin-bottom: 2px;
    }
    
    .slider-placeholder small {
        font-size: 0.7rem;
    }
    
    /* Slider Content Styles */
    .slider-title {
        line-height: 1.4;
    }
    
    .slider-title .badge {
        font-size: 0.7rem;
    }
    
    .slider-description {
        max-width: 300px;
    }
    
    .slider-button-info {
        max-width: 140px;
    }
    
    /* Table Responsive */
    .table-responsive {
        overflow-x: auto;
    }
    
    @media (max-width: 768px) {
        .slider-image-container {
            width: 80px;
            height: 50px;
        }
        
        .slider-placeholder {
            width: 80px;
            height: 50px;
        }
        
        .slider-description {
            max-width: 200px;
        }
        
        .slider-button-info {
            max-width: 120px;
        }
        
        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
    }
    
    @media (max-width: 576px) {
        .slider-image-container {
            width: 60px;
            height: 40px;
        }
        
        .slider-placeholder {
            width: 60px;
            height: 40px;
        }
        
        .slider-description {
            max-width: 150px;
        }
        
        .slider-button-info {
            max-width: 100px;
        }
    }
    
    /* Modal Styles */
    .modal-lg {
        max-width: 800px;
    }
    
    #modalImage {
        max-height: 70vh;
        object-fit: contain;
    }
    
    /* Hover effects */
    .table tbody tr:hover {
        background-color: rgba(0,123,255,0.05);
    }
    
    .btn-group-sm .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    /* Search and Filter Styles */
    .input-group-sm .form-control {
        border-radius: 0.375rem 0 0 0.375rem;
    }
    
    .input-group-sm .btn {
        border-radius: 0 0.375rem 0.375rem 0;
    }
    
    /* Mobile Optimizations */
    @media (max-width: 768px) {
        .card-header .d-flex {
            flex-direction: column;
            gap: 1rem;
        }
        
        .card-header .d-flex .d-flex {
            width: 100%;
        }
        
        .input-group-sm {
            width: 100% !important;
        }
        
        .form-select-sm {
            width: 100% !important;
        }
        
        .table-responsive {
            font-size: 0.875rem;
        }
        
        .btn-group-sm .btn {
            padding: 0.2rem 0.4rem;
            font-size: 0.7rem;
        }
        
        .slider-title .badge {
            font-size: 0.6rem;
            padding: 0.2rem 0.4rem;
        }
    }
    
    @media (max-width: 576px) {
        .card-header h5 {
            font-size: 1rem;
        }
        
        .table th,
        .table td {
            padding: 0.5rem 0.25rem;
        }
        
        .slider-image-container {
            width: 50px;
            height: 35px;
        }
        
        .slider-placeholder {
            width: 50px;
            height: 35px;
        }
        
        .slider-placeholder i {
            font-size: 1rem;
        }
        
        .slider-placeholder small {
            font-size: 0.6rem;
        }
    }
    
    /* Loading States */
    .sortable-ghost {
        opacity: 0.3;
        background-color: #f8f9fa;
    }
    
    .sortable-chosen {
        background-color: #e3f2fd;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    /* Animation for alerts */
    .alert {
        animation: slideInRight 0.3s ease-out;
    }
    
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image Modal Handler
        const imageModal = document.getElementById('imageModal');
        if (imageModal) {
            imageModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const image = button.getAttribute('data-image');
                const title = button.getAttribute('data-title');
                
                const modalImage = document.getElementById('modalImage');
                const modalTitle = document.getElementById('imageModalLabel');
                
                modalImage.src = image;
                modalImage.alt = title;
                modalTitle.textContent = title;
            });
        }
        
        // Sortable functionality
        const sortable = document.getElementById('sortable');
        if (sortable) {
            new Sortable(sortable, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                chosenClass: 'sortable-chosen',
                onStart: function(evt) {
                    // Add loading state
                    evt.item.style.opacity = '0.8';
                },
                onEnd: function(evt) {
                    // Remove loading state
                    evt.item.style.opacity = '1';
                    
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
                                if (badge && badge.classList.contains('bg-light')) {
                                    badge.textContent = index;
                                }
                            });
                            
                            // Show success message
                            showAlert('success', data.message);
                        } else {
                            showAlert('error', data.message || 'Có lỗi xảy ra khi cập nhật thứ tự');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showAlert('error', 'Có lỗi xảy ra khi cập nhật thứ tự');
                    });
                }
            });
        }
        
        // Delete confirmation
        document.querySelectorAll('[data-delete]').forEach(button => {
            button.addEventListener('click', function(e) {
                const title = this.getAttribute('data-delete');
                if (!confirm(`Bạn có chắc chắn muốn xóa slider "${title}"?`)) {
                    e.preventDefault();
                }
            });
        });
        
        // Tooltip initialization
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Search and Filter functionality
        const searchInput = document.getElementById('searchInput');
        const clearSearchBtn = document.getElementById('clearSearch');
        const statusFilter = document.getElementById('statusFilter');
        const tableRows = document.querySelectorAll('#sortable tr');
        
        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusFilterValue = statusFilter.value;
            
            tableRows.forEach(row => {
                const title = row.querySelector('td:nth-child(3) strong').textContent.toLowerCase();
                const description = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                const isActive = row.querySelector('.btn-success') !== null;
                
                let showRow = true;
                
                // Search filter
                if (searchTerm) {
                    showRow = title.includes(searchTerm) || description.includes(searchTerm);
                }
                
                // Status filter
                if (statusFilterValue && showRow) {
                    if (statusFilterValue === 'active') {
                        showRow = isActive;
                    } else if (statusFilterValue === 'inactive') {
                        showRow = !isActive;
                    }
                }
                
                row.style.display = showRow ? '' : 'none';
            });
            
            // Update visible count
            updateVisibleCount();
        }
        
        function updateVisibleCount() {
            const visibleRows = document.querySelectorAll('#sortable tr:not([style*="display: none"])').length;
            const totalRows = tableRows.length;
            
            // You can add a counter element to show the filtered results
            const counterElement = document.querySelector('.slider-counter');
            if (counterElement) {
                counterElement.textContent = `Hiển thị ${visibleRows} / ${totalRows} slider`;
            }
        }
        
        // Event listeners
        if (searchInput) {
            searchInput.addEventListener('input', filterTable);
        }
        
        if (clearSearchBtn) {
            clearSearchBtn.addEventListener('click', function() {
                searchInput.value = '';
                filterTable();
            });
        }
        
        if (statusFilter) {
            statusFilter.addEventListener('change', filterTable);
        }
        
        // Initialize count
        updateVisibleCount();
    });
    
    function showAlert(type, message) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        
        const alert = document.createElement('div');
        alert.className = `alert ${alertClass} alert-dismissible fade show position-fixed`;
        alert.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        alert.innerHTML = `
            <i class="fas ${icon} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(alert);
        
        // Auto dismiss after 3 seconds
        setTimeout(() => {
            if (alert.parentNode) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 3000);
    }
</script>
@endpush