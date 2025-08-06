@extends('admin.layouts.app')

@section('title', 'Quản lý Lý do')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-heart me-2"></i>
            Lý do chọn Thanh Cúc
        </h1>
        <p class="text-muted mb-0">Quản lý các lý do khách hàng nên chọn Thanh Cúc</p>
    </div>
    <div>
        <a href="{{ route('admin.reasons.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>
            Thêm Lý do
        </a>
    </div>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $reasons->total() }}</h4>
                            <p class="mb-0">Tổng lý do</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-heart fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $reasons->where('is_active', true)->count() }}</h4>
                            <p class="mb-0">Đang hiển thị</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $reasons->where('is_active', false)->count() }}</h4>
                            <p class="mb-0">Đã ẩn</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-eye-slash fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reasons List -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Danh sách Lý do
            </h5>
        </div>
        <div class="card-body">
            @if($reasons->count() > 0)
                <div class="row" id="sortable">
                    @foreach($reasons as $reason)
                        <div class="col-md-6 col-lg-4 mb-4" data-id="{{ $reason->id }}">
                            <div class="card h-100 reason-card" style="border-left: 4px solid {{ $reason->color ?? '#6c757d' }};">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="reason-icon" style="color: {{ $reason->color ?? '#6c757d' }};">
                                            @if($reason->icon)
                                                <i class="{{ $reason->icon }} fa-2x"></i>
                                            @else
                                                <i class="fas fa-star fa-2x"></i>
                                            @endif
                                        </div>
                                        <div class="drag-handle" style="cursor: move;">
                                            <i class="fas fa-grip-vertical text-muted"></i>
                                        </div>
                                    </div>
                                    
                                    <h6 class="card-title">{{ $reason->title }}</h6>
                                    <p class="card-text text-muted small">
                                        {{ Str::limit($reason->description, 120) }}
                                    </p>
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            <span class="badge {{ $reason->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $reason->is_active ? 'Hiển thị' : 'Ẩn' }}
                                            </span>
                                            <span class="badge bg-light text-dark">
                                                #{{ $reason->sort_order }}
                                            </span>
                                        </div>
                                        
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.reasons.edit', $reason) }}" 
                                               class="btn btn-outline-primary" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.reasons.destroy', $reason) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" 
                                                        title="Xóa"
                                                        data-delete="Lý do: {{ $reason->title }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <small class="text-muted">
                            Hiển thị {{ $reasons->firstItem() }} - {{ $reasons->lastItem() }} 
                            trong tổng số {{ $reasons->total() }} lý do
                        </small>
                    </div>
                    <div>
                        {{ $reasons->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-heart fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Chưa có lý do nào</h5>
                    <p class="text-muted">Hãy thêm lý do đầu tiên để khách hàng chọn Thanh Cúc</p>
                    <a href="{{ route('admin.reasons.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Thêm Lý do Đầu Tiên
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
    
    .reason-card {
        transition: all 0.3s ease;
        cursor: move;
    }
    
    .reason-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .reason-icon {
        opacity: 0.8;
    }
    
    .drag-handle {
        opacity: 0.5;
        transition: opacity 0.3s ease;
    }
    
    .reason-card:hover .drag-handle {
        opacity: 1;
    }
    
    .badge {
        font-size: 0.7rem;
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
                handle: '.drag-handle',
                onEnd: function(evt) {
                    const items = [];
                    const cards = sortable.querySelectorAll('[data-id]');
                    
                    cards.forEach((card, index) => {
                        items.push({
                            id: card.dataset.id,
                            sort_order: index
                        });
                    });
                    
                    // Send AJAX request to update order
                    fetch('{{ route("admin.reasons.update-order") }}', {
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
                            cards.forEach((card, index) => {
                                const badge = card.querySelector('.badge.bg-light');
                                if (badge) {
                                    badge.textContent = '#' + index;
                                }
                            });
                            
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