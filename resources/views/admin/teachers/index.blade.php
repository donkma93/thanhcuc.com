@extends('admin.layouts.app')

@section('title', 'Quản lý giảng viên')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Quản lý giảng viên</h1>
        <p class="text-muted">Quản lý thông tin giảng viên và đội ngũ giảng dạy</p>
    </div>
    <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Thêm giảng viên
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.teachers.index') }}" class="row g-3">
            <div class="col-md-3">
                <label for="search" class="form-label">Tìm kiếm</label>
                <input type="text" class="form-control" id="search" name="search" 
                       value="{{ request('search') }}" placeholder="Tên, chuyên môn, chứng chỉ...">
            </div>
            <div class="col-md-2">
                <label for="specialization" class="form-label">Chuyên môn</label>
                <select class="form-select" id="specialization" name="specialization">
                    <option value="">Tất cả</option>
                    @if($specializations && count($specializations) > 0)
                        @foreach($specializations as $spec)
                            <option value="{{ $spec }}" {{ request('specialization') == $spec ? 'selected' : '' }}>
                                {{ $spec }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-select" id="status" name="status">
                    <option value="">Tất cả</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Không hoạt động</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="featured" class="form-label">Nổi bật</label>
                <select class="form-select" id="featured" name="featured">
                    <option value="">Tất cả</option>
                    <option value="yes" {{ request('featured') == 'yes' ? 'selected' : '' }}>Nổi bật</option>
                    <option value="no" {{ request('featured') == 'no' ? 'selected' : '' }}>Không nổi bật</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">
                    <i class="fas fa-search me-1"></i>Lọc
                </button>
                <a href="{{ route('admin.teachers.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-1"></i>Xóa bộ lọc
                </a>
            </div>
        </form>
    </div>
</div>

@if($teachers && $teachers->count() > 0)
<!-- Bulk Actions -->
<div class="card mb-4">
    <div class="card-body">
        <form id="bulkActionForm" method="POST" action="{{ route('admin.teachers.bulk-action') }}">
            @csrf
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <input type="checkbox" id="selectAll" class="form-check-input me-2">
                        <label for="selectAll" class="form-check-label me-3">Chọn tất cả</label>
                        <span class="text-muted">Đã chọn: <span id="selectedCount">0</span> giảng viên</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-end">
                        <select name="action" class="form-select me-2" style="width: auto;" required>
                            <option value="">Chọn hành động</option>
                            <option value="activate">Kích hoạt</option>
                            <option value="deactivate">Vô hiệu hóa</option>
                            <option value="feature">Đánh dấu nổi bật</option>
                            <option value="unfeature">Bỏ đánh dấu nổi bật</option>
                            <option value="delete">Xóa</option>
                        </select>
                        <button type="button" class="btn btn-primary" onclick="confirmBulkAction()">
                            Thực hiện
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Teachers Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="50">
                            <input type="checkbox" id="selectAllTable" class="form-check-input">
                        </th>
                        <th width="80">Avatar</th>
                        <th>Tên giảng viên</th>
                        <th>Chuyên môn</th>
                        <th>Chứng chỉ</th>
                        <th>Kinh nghiệm</th>
                        <th>Trạng thái</th>
                        <th width="120">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>
                            <input type="checkbox" name="selected_teachers[]" 
                                   value="{{ $teacher->id }}" class="form-check-input teacher-checkbox">
                        </td>
                        <td>
                            @if($teacher->avatar)
                                <img src="{{ asset('storage/' . $teacher->avatar) }}" 
                                     alt="{{ $teacher->name }}" 
                                     class="rounded-circle" 
                                     style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div>
                                <strong>{{ $teacher->name }}</strong>
                                @if($teacher->is_featured)
                                    <span class="badge bg-warning text-dark ms-1">
                                        <i class="fas fa-star"></i> Nổi bật
                                    </span>
                                @endif
                            </div>
                            <small class="text-muted">{{ Str::limit($teacher->bio, 60) }}</small>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $teacher->specialization }}</span>
                        </td>
                        <td>{{ $teacher->certification }}</td>
                        <td>
                            @if($teacher->experience_years)
                                {{ $teacher->experience_years }} năm
                            @else
                                <span class="text-muted">Chưa cập nhật</span>
                            @endif
                        </td>
                        <td>
                            @if($teacher->is_active)
                                <span class="badge bg-success">Hoạt động</span>
                            @else
                                <span class="badge bg-secondary">Không hoạt động</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.teachers.show', $teacher) }}" 
                                   class="btn btn-sm btn-outline-info" title="Xem chi tiết">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.teachers.edit', $teacher) }}" 
                                   class="btn btn-sm btn-outline-primary" title="Chỉnh sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.teachers.destroy', $teacher) }}" 
                                      class="d-inline"
                                      data-confirm="Bạn có chắc muốn xóa giảng viên này? Hành động này không thể hoàn tác!"
                                      data-confirm-type="danger">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Xóa">
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
            <div class="text-muted">
                Hiển thị {{ $teachers->firstItem() ?? 0 }} đến {{ $teachers->lastItem() ?? 0 }} 
                trong tổng số {{ $teachers->total() ?? 0 }} giảng viên
            </div>
            @if($teachers)
                {{ $teachers->links() }}
            @endif
        </div>
    </div>
</div>
@else
<div class="card">
    <div class="card-body text-center py-5">
        <i class="fas fa-chalkboard-teacher fa-3x text-muted mb-3"></i>
        <h5 class="text-muted">Chưa có giảng viên nào</h5>
        <p class="text-muted">Hãy thêm giảng viên đầu tiên cho hệ thống.</p>
        <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Thêm giảng viên
        </a>
    </div>
</div>
@endif

@endsection

@push('scripts')
<script>
    // Select all functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.teacher-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    document.getElementById('selectAllTable').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.teacher-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    function updateSelectedCount() {
        const selectedCheckboxes = document.querySelectorAll('.teacher-checkbox:checked');
        const count = selectedCheckboxes.length;
        document.getElementById('selectedCount').textContent = count;
        
        // Update bulk action form
        const bulkForm = document.getElementById('bulkActionForm');
        if (bulkForm) {
            // Remove existing hidden inputs
            const existingInputs = bulkForm.querySelectorAll('input[name="selected_teachers[]"]');
            existingInputs.forEach(input => input.remove());
            
            // Add new hidden inputs
            selectedCheckboxes.forEach(checkbox => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'selected_teachers[]';
                hiddenInput.value = checkbox.value;
                bulkForm.appendChild(hiddenInput);
            });
        }
    }

    // Add event listeners to individual checkboxes
    document.querySelectorAll('.teacher-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCount);
    });

    // Confirm bulk action
    function confirmBulkAction() {
        const selectedCount = document.querySelectorAll('.teacher-checkbox:checked').length;
        const action = document.querySelector('select[name="action"]').value;
        
        if (selectedCount === 0) {
            alert('Vui lòng chọn ít nhất một giảng viên.');
            return;
        }
        
        if (!action) {
            alert('Vui lòng chọn hành động cần thực hiện.');
            return;
        }
        
        let actionText = '';
        switch(action) {
            case 'activate': actionText = 'kích hoạt'; break;
            case 'deactivate': actionText = 'vô hiệu hóa'; break;
            case 'feature': actionText = 'đánh dấu nổi bật'; break;
            case 'unfeature': actionText = 'bỏ đánh dấu nổi bật'; break;
            case 'delete': actionText = 'xóa'; break;
        }
        
        if (confirm(`Bạn có chắc muốn ${actionText} ${selectedCount} giảng viên đã chọn?`)) {
            document.getElementById('bulkActionForm').submit();
        }
    }

    // Initialize count
    updateSelectedCount();
</script>
@endpush