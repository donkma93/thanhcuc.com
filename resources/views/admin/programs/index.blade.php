@extends('admin.layouts.app')

@section('title', 'Quản lý Chương trình')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-graduation-cap me-2"></i>
            Quản lý Chương trình Ausbildung
        </h1>
        <p class="text-muted mb-0">Quản lý các chương trình đào tạo nghề tại Đức</p>
    </div>
    <div>
        <a href="{{ route('admin.programs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>
            Thêm Chương trình
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
                            <h4 class="mb-0">{{ $programs->total() }}</h4>
                            <p class="mb-0">Tổng chương trình</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-graduation-cap fa-2x"></i>
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
                            <h4 class="mb-0">{{ $programs->where('is_active', true)->count() }}</h4>
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
                            <h4 class="mb-0">{{ $programs->where('is_featured', true)->count() }}</h4>
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
                            <h4 class="mb-0">{{ $programs->where('opportunity_level', 'Rất cao')->count() }}</h4>
                            <p class="mb-0">Cơ hội rất cao</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Programs List -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Danh sách Chương trình
            </h5>
        </div>
        <div class="card-body">
            @if($programs->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover" id="programsTable">
                        <thead>
                            <tr>
                                <th width="60">
                                    <i class="fas fa-sort" title="Kéo thả để sắp xếp"></i>
                                </th>
                                <th width="100">Hình ảnh</th>
                                <th>Chương trình</th>
                                <th>Thời gian</th>
                                <th>Mức lương</th>
                                <th>Cơ hội</th>
                                <th width="100">Trạng thái</th>
                                <th width="80">Nổi bật</th>
                                <th width="150">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                            @foreach($programs as $program)
                                <tr data-id="{{ $program->id }}">
                                    <td class="text-center">
                                        <i class="fas fa-grip-vertical text-muted" style="cursor: move;"></i>
                                    </td>
                                    <td>
                                        @if($program->image_path)
                                            <img src="{{ $program->image_url }}" 
                                                 alt="{{ $program->name }}" 
                                                 class="img-thumbnail" 
                                                 style="width: 80px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                                                 style="width: 80px; height: 60px; {{ $program->color ? 'background-color: ' . $program->color . ' !important;' : '' }}">
                                                @if($program->icon)
                                                    <i class="{{ $program->icon }} fa-2x {{ $program->color ? 'text-white' : 'text-muted' }}"></i>
                                                @else
                                                    <i class="fas fa-graduation-cap fa-2x text-muted"></i>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <strong>{{ $program->name }}</strong>
                                            @if($program->short_description)
                                                <br><small class="text-muted">{{ Str::limit($program->short_description, 80) }}</small>
                                            @endif
                                            <br><small class="text-primary">
                                                <i class="fas fa-link me-1"></i>{{ $program->slug }}
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $program->duration }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">{{ $program->salary_range }}</span>
                                    </td>
                                    <td>
                                        @php
                                            $levelColors = [
                                                'Thấp' => 'secondary',
                                                'Trung bình' => 'warning',
                                                'Cao' => 'info',
                                                'Rất cao' => 'danger'
                                            ];
                                            $color = $levelColors[$program->opportunity_level] ?? 'secondary';
                                        @endphp
                                        <span class="badge bg-{{ $color }}">{{ $program->opportunity_level }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.programs.toggle-status', $program) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $program->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                @if($program->is_active)
                                                    <i class="fas fa-eye"></i>
                                                @else
                                                    <i class="fas fa-eye-slash"></i>
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.programs.toggle-featured', $program) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-sm {{ $program->is_featured ? 'btn-warning' : 'btn-outline-warning' }}">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.programs.show', $program) }}" 
                                               class="btn btn-outline-info" title="Xem">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.programs.edit', $program) }}" 
                                               class="btn btn-outline-primary" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.programs.destroy', $program) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" 
                                                        title="Xóa"
                                                        data-delete="Chương trình {{ $program->name }}">
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
                            Hiển thị {{ $programs->firstItem() }} - {{ $programs->lastItem() }} 
                            trong tổng số {{ $programs->total() }} chương trình
                        </small>
                    </div>
                    <div>
                        {{ $programs->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-graduation-cap fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Chưa có chương trình nào</h5>
                    <p class="text-muted">Hãy thêm chương trình Ausbildung đầu tiên</p>
                    <a href="{{ route('admin.programs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Thêm Chương trình Đầu Tiên
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
    
    .badge {
        font-size: 0.75rem;
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
                    fetch('{{ route("admin.programs.update-order") }}', {
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