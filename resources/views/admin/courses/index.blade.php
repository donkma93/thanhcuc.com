@extends('admin.layouts.app')

@section('title', 'Quản lý khóa học')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Quản lý khóa học</h1>
        <p class="text-muted">Danh sách tất cả khóa học</p>
    </div>
    <div>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Thêm khóa học
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.courses.index') }}" class="row g-3">
            <div class="col-md-4">
                <label for="search" class="form-label">Tìm kiếm</label>
                <input type="text" class="form-control" id="search" name="search" 
                       placeholder="Tên khóa học, mô tả..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <label for="category" class="form-label">Danh mục</label>
                <select class="form-select" id="category" name="category">
                    <option value="">Tất cả danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-select" id="status" name="status">
                    <option value="">Tất cả</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Hoạt động</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Không hoạt động</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search me-2"></i>Tìm kiếm
                </button>
                <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Xóa bộ lọc
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Bulk Actions -->
@if($courses->count() > 0)
    <div class="card mb-4">
        <div class="card-body">
            <form id="bulkActionForm" method="POST" action="{{ route('admin.courses.bulk-action') }}">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="bulkAction" class="form-label">Thao tác hàng loạt</label>
                        <select class="form-select" id="bulkAction" name="action" required>
                            <option value="">Chọn thao tác</option>
                            <option value="activate">Kích hoạt</option>
                            <option value="deactivate">Vô hiệu hóa</option>
                            <option value="delete">Xóa</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-warning" onclick="return confirmBulkAction()">
                            <i class="fas fa-bolt me-2"></i>Thực hiện
                        </button>
                    </div>
                    <div class="col-md-6 text-end">
                        <small class="text-muted">
                            <span id="selectedCount">0</span> mục được chọn
                        </small>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif

<!-- Courses Table -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">
            <i class="fas fa-graduation-cap me-2"></i>Danh sách khóa học
            <span class="badge bg-primary ms-2">{{ $courses->total() }}</span>
        </h5>
    </div>
    <div class="card-body p-0">
        @if($courses->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="50">
                                <input type="checkbox" id="selectAll" class="form-check-input">
                            </th>
                            <th>Khóa học</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Thứ tự</th>
                            <th width="150">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>
                                    <input type="checkbox" name="selected_courses[]" 
                                           value="{{ $course->id }}" class="form-check-input course-checkbox">
                                </td>
                                <td>
                                    <div class="d-flex align-items-start">
                                        @if($course->image)
                                            <img src="{{ asset('storage/' . $course->image) }}" 
                                                 alt="{{ $course->name }}" 
                                                 class="rounded me-3" 
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-center me-3" 
                                                 style="width: 50px; height: 50px; min-width: 50px;">
                                                <i class="fas fa-graduation-cap text-white"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-1 fw-bold">{{ $course->name }}</h6>
                                            @if($course->short_description)
                                                <small class="text-muted">{{ Str::limit($course->short_description, 60) }}</small>
                                            @endif
                                            <br>
                                            @if($course->level)
                                                <span class="badge bg-light text-dark small">{{ $course->level }}</span>
                                            @endif
                                            @if($course->duration_hours)
                                                <span class="badge bg-info text-white small">{{ $course->duration_hours }}h</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $course->category }}
                                    </span>
                                </td>
                                <td>
                                    @if($course->price)
                                        <span class="fw-bold text-success">{{ number_format($course->price, 0, ',', '.') }}đ</span>
                                    @else
                                        <span class="text-muted">Liên hệ</span>
                                    @endif
                                </td>
                                <td>
                                    @if($course->is_active)
                                        <span class="badge bg-success">Hoạt động</span>
                                    @else
                                        <span class="badge bg-danger">Không hoạt động</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">{{ $course->sort_order }}</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.courses.show', $course) }}" 
                                           class="btn btn-sm btn-outline-info" title="Xem chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.courses.edit', $course) }}" 
                                           class="btn btn-sm btn-outline-primary" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                @if(!$course->is_active)
                                                    <li>
                                                        <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="is_active" value="1">
                                                            <input type="hidden" name="name" value="{{ $course->name }}">
                                                            <input type="hidden" name="category" value="{{ $course->category }}">
                                                            <input type="hidden" name="description" value="{{ $course->description }}">
                                                            <button type="submit" class="dropdown-item text-success">
                                                                <i class="fas fa-check me-2"></i>Kích hoạt
                                                            </button>
                                                        </form>
                                                    </li>
                                                @else
                                                    <li>
                                                        <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="is_active" value="0">
                                                            <input type="hidden" name="name" value="{{ $course->name }}">
                                                            <input type="hidden" name="category" value="{{ $course->category }}">
                                                            <input type="hidden" name="description" value="{{ $course->description }}">
                                                            <button type="submit" class="dropdown-item text-warning">
                                                                <i class="fas fa-pause me-2"></i>Vô hiệu hóa
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endif
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger" 
                                                                onclick="return confirm('Bạn có chắc muốn xóa khóa học này?')">
                                                            <i class="fas fa-trash me-2"></i>Xóa
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($courses->hasPages())
                <div class="card-footer bg-white border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">
                                Hiển thị {{ $courses->firstItem() }} - {{ $courses->lastItem() }} 
                                trong tổng số {{ $courses->total() }} kết quả
                            </small>
                        </div>
                        <div>
                            {{ $courses->appends(request()->query())->links('pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Không có khóa học nào</h5>
                <p class="text-muted">
                    @if(request()->hasAny(['search', 'category', 'status']))
                        Không tìm thấy khóa học nào phù hợp với bộ lọc.
                    @else
                        Chưa có khóa học nào được tạo.
                    @endif
                </p>
                @if(request()->hasAny(['search', 'category', 'status']))
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-primary">
                        <i class="fas fa-times me-2"></i>Xóa bộ lọc
                    </a>
                @else
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tạo khóa học đầu tiên
                    </a>
                @endif
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Select all functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.course-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    // Update selected count
    function updateSelectedCount() {
        const selectedCheckboxes = document.querySelectorAll('.course-checkbox:checked');
        const count = selectedCheckboxes.length;
        document.getElementById('selectedCount').textContent = count;
        
        // Update bulk action form
        const bulkForm = document.getElementById('bulkActionForm');
        if (bulkForm) {
            // Remove existing hidden inputs
            const existingInputs = bulkForm.querySelectorAll('input[name="selected_courses[]"]');
            existingInputs.forEach(input => input.remove());
            
            // Add new hidden inputs
            selectedCheckboxes.forEach(checkbox => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'selected_courses[]';
                hiddenInput.value = checkbox.value;
                bulkForm.appendChild(hiddenInput);
            });
        }
    }

    // Add event listeners to individual checkboxes
    document.querySelectorAll('.course-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCount);
    });

    // Confirm bulk action
    function confirmBulkAction() {
        const selectedCount = document.querySelectorAll('.course-checkbox:checked').length;
        const action = document.getElementById('bulkAction').value;
        
        if (selectedCount === 0) {
            alert('Vui lòng chọn ít nhất một khóa học.');
            return false;
        }
        
        if (!action) {
            alert('Vui lòng chọn thao tác.');
            return false;
        }
        
        let message = '';
        switch (action) {
            case 'activate':
                message = `Kích hoạt ${selectedCount} khóa học?`;
                break;
            case 'deactivate':
                message = `Vô hiệu hóa ${selectedCount} khóa học?`;
                break;
            case 'delete':
                message = `Xóa ${selectedCount} khóa học? Hành động này không thể hoàn tác.`;
                break;
        }
        
        return confirm(message);
    }
</script>
@endpush

@push('styles')
<style>
/* Pagination Styling */
.pagination {
    margin-bottom: 0;
    gap: 4px;
}

.pagination .page-item {
    margin: 0;
}

.pagination .page-link {
    color: #6c757d;
    border: 1px solid #dee2e6;
    padding: 0.375rem 0.75rem;
    border-radius: 6px;
    transition: all 0.2s ease;
    font-size: 0.875rem;
    min-width: 40px;
    text-align: center;
}

.pagination .page-link:hover {
    color: #495057;
    background-color: #e9ecef;
    border-color: #adb5bd;
    text-decoration: none;
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
    font-weight: 600;
}

.pagination .page-item.disabled .page-link {
    color: #adb5bd;
    background-color: #fff;
    border-color: #dee2e6;
    cursor: not-allowed;
}

.pagination .page-link i {
    font-size: 0.75rem;
}

/* Card Footer Styling */
.card-footer {
    padding: 1rem 1.25rem;
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
}

.card-footer.bg-white {
    background-color: #fff !important;
}

/* Responsive pagination */
@media (max-width: 576px) {
    .pagination {
        justify-content: center;
    }
    
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
}
</style>
@endpush