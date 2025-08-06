@extends('admin.layouts.app')

@section('title', 'Quản lý bảng vàng thành tích')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Quản lý bảng vàng thành tích</h1>
        <p class="text-muted">Quản lý thành tích học viên xuất sắc hiển thị trên trang chủ</p>
    </div>
    <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Thêm thành tích
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.achievements.index') }}" class="row g-3">
            <div class="col-md-3">
                <label for="search" class="form-label">Tìm kiếm</label>
                <input type="text" class="form-control" id="search" name="search" 
                       value="{{ request('search') }}" placeholder="Tên học viên, lớp, thành tích...">
            </div>
            <div class="col-md-2">
                <label for="category" class="form-label">Loại thành tích</label>
                <select class="form-select" id="category" name="category">
                    <option value="">Tất cả</option>
                    <option value="monthly" {{ request('category') == 'monthly' ? 'selected' : '' }}>Thành tích tháng</option>
                    <option value="exam" {{ request('category') == 'exam' ? 'selected' : '' }}>Thành tích thi cử</option>
                    <option value="scholarship" {{ request('category') == 'scholarship' ? 'selected' : '' }}>Du học thành công</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="rank" class="form-label">Hạng</label>
                <select class="form-select" id="rank" name="rank">
                    <option value="">Tất cả</option>
                    <option value="1" {{ request('rank') == '1' ? 'selected' : '' }}>Hạng 1</option>
                    <option value="2" {{ request('rank') == '2' ? 'selected' : '' }}>Hạng 2</option>
                    <option value="3" {{ request('rank') == '3' ? 'selected' : '' }}>Hạng 3</option>
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
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">
                    <i class="fas fa-search me-1"></i>Lọc
                </button>
                <a href="{{ route('admin.achievements.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-1"></i>Xóa bộ lọc
                </a>
            </div>
        </form>
    </div>
</div>

@if($achievements->count() > 0)
<!-- Bulk Actions -->
<div class="card mb-4">
    <div class="card-body">
        <form id="bulkActionForm" method="POST" action="{{ route('admin.achievements.bulk-action') }}">
            @csrf
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <input type="checkbox" id="selectAll" class="form-check-input me-2">
                        <label for="selectAll" class="form-check-label me-3">Chọn tất cả</label>
                        <span class="text-muted">Đã chọn: <span id="selectedCount">0</span> thành tích</span>
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

<!-- Achievements Table -->
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
                        <th>Học viên</th>
                        <th>Loại thành tích</th>
                        <th>Hạng</th>
                        <th>Điểm/Chứng chỉ</th>
                        <th>Ngày đạt</th>
                        <th>Trạng thái</th>
                        <th width="120">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($achievements as $achievement)
                    <tr>
                        <td>
                            <input type="checkbox" name="selected_achievements[]" 
                                   value="{{ $achievement->id }}" class="form-check-input achievement-checkbox">
                        </td>
                        <td>
                            @if($achievement->avatar)
                                <img src="{{ asset('storage/' . $achievement->avatar) }}" 
                                     alt="{{ $achievement->student_name }}" 
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
                                <strong>{{ $achievement->student_name }}</strong>
                                @if($achievement->is_featured)
                                    <span class="badge bg-warning text-dark ms-1">
                                        <i class="fas fa-star"></i> Nổi bật
                                    </span>
                                @endif
                                @if($achievement->rank <= 3)
                                    <span class="badge bg-{{ $achievement->rank == 1 ? 'warning' : ($achievement->rank == 2 ? 'secondary' : 'info') }} ms-1">
                                        <i class="fas fa-trophy"></i> {{ $achievement->rank_display }}
                                    </span>
                                @endif
                            </div>
                            @if($achievement->class_name)
                                <small class="text-muted">{{ $achievement->class_name }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $achievement->category_display }}</span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $achievement->rank == 1 ? 'warning' : ($achievement->rank == 2 ? 'secondary' : 'info') }}">
                                {{ $achievement->rank }}
                            </span>
                        </td>
                        <td>
                            @if($achievement->score)
                                <strong>{{ $achievement->score }}/10</strong>
                            @endif
                            @if($achievement->certificate)
                                <div><small class="text-muted">{{ $achievement->certificate }}</small></div>
                            @endif
                        </td>
                        <td>{{ $achievement->achievement_date->format('d/m/Y') }}</td>
                        <td>
                            @if($achievement->is_active)
                                <span class="badge bg-success">Hoạt động</span>
                            @else
                                <span class="badge bg-secondary">Không hoạt động</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.achievements.show', $achievement) }}" 
                                   class="btn btn-sm btn-outline-info" title="Xem chi tiết">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.achievements.edit', $achievement) }}" 
                                   class="btn btn-sm btn-outline-primary" title="Chỉnh sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.achievements.destroy', $achievement) }}" 
                                      class="d-inline"
                                      data-confirm="Bạn có chắc muốn xóa thành tích này? Hành động này không thể hoàn tác!"
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
                Hiển thị {{ $achievements->firstItem() ?? 0 }} đến {{ $achievements->lastItem() ?? 0 }} 
                trong tổng số {{ $achievements->total() }} thành tích
            </div>
            {{ $achievements->links() }}
        </div>
    </div>
</div>
@else
<div class="card">
    <div class="card-body text-center py-5">
        <i class="fas fa-trophy fa-3x text-muted mb-3"></i>
        <h5 class="text-muted">Chưa có thành tích nào</h5>
        <p class="text-muted">Hãy thêm thành tích đầu tiên cho bảng vàng.</p>
        <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Thêm thành tích
        </a>
    </div>
</div>
@endif

@endsection

@push('scripts')
<script>
    // Select all functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.achievement-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    document.getElementById('selectAllTable').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.achievement-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    function updateSelectedCount() {
        const selectedCheckboxes = document.querySelectorAll('.achievement-checkbox:checked');
        const count = selectedCheckboxes.length;
        document.getElementById('selectedCount').textContent = count;
        
        // Update bulk action form
        const bulkForm = document.getElementById('bulkActionForm');
        if (bulkForm) {
            // Remove existing hidden inputs
            const existingInputs = bulkForm.querySelectorAll('input[name="selected_achievements[]"]');
            existingInputs.forEach(input => input.remove());
            
            // Add new hidden inputs
            selectedCheckboxes.forEach(checkbox => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'selected_achievements[]';
                hiddenInput.value = checkbox.value;
                bulkForm.appendChild(hiddenInput);
            });
        }
    }

    // Add event listeners to individual checkboxes
    document.querySelectorAll('.achievement-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCount);
    });

    // Confirm bulk action
    function confirmBulkAction() {
        const selectedCount = document.querySelectorAll('.achievement-checkbox:checked').length;
        const action = document.querySelector('select[name="action"]').value;
        
        if (selectedCount === 0) {
            alert('Vui lòng chọn ít nhất một thành tích.');
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
        
        if (confirm(`Bạn có chắc muốn ${actionText} ${selectedCount} thành tích đã chọn?`)) {
            document.getElementById('bulkActionForm').submit();
        }
    }

    // Initialize count
    updateSelectedCount();
</script>
@endpush