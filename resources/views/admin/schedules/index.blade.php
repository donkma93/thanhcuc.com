@extends('admin.layouts.app')

@section('title', 'Quản lý Lịch Khai Giảng')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Quản lý Lịch Khai Giảng</h1>
        <p class="text-muted">Quản lý các khóa học và lịch khai giảng</p>
    </div>
    <div>
        <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Thêm Lịch Khai Giảng
        </a>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.schedules.index') }}" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Tìm kiếm</label>
                <input type="text" name="search" class="form-control" placeholder="Tên khóa học, giảng viên..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Trình độ</label>
                <select name="level" class="form-select">
                    <option value="">Tất cả</option>
                    @foreach(\App\Models\Schedule::LEVELS as $key => $value)
                        <option value="{{ $key }}" {{ request('level') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="">Tất cả</option>
                    @foreach(\App\Models\Schedule::STATUSES as $key => $value)
                        <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Loại khóa học</label>
                <select name="course_type" class="form-select">
                    <option value="">Tất cả</option>
                    @foreach(\App\Models\Schedule::TYPES as $key => $value)
                        <option value="{{ $key }}" {{ request('course_type') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-search me-1"></i>Lọc
                    </button>
                    <a href="{{ route('admin.schedules.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-1"></i>Xóa bộ lọc
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Bulk Actions -->
<div class="card mb-4">
    <div class="card-body">
        <form id="bulkActionForm" method="POST" action="{{ route('admin.schedules.bulk-action') }}">
            @csrf
            <div class="row align-items-center">
                <div class="col-md-3">
                    <select name="action" class="form-select" required>
                        <option value="">Chọn hành động</option>
                        <option value="publish">Xuất bản</option>
                        <option value="unpublish">Chuyển về bản nháp</option>
                        <option value="feature">Đánh dấu nổi bật</option>
                        <option value="unfeature">Bỏ đánh dấu nổi bật</option>
                        <option value="delete">Xóa</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-warning" 
                            data-confirm="Bạn có chắc chắn muốn thực hiện hành động này?"
                            data-confirm-type="warning">
                        <i class="fas fa-bolt me-1"></i>Thực hiện
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

<!-- Schedules Table -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">
            <i class="fas fa-calendar-alt me-2"></i>Danh sách Lịch Khai Giảng
            <span class="badge bg-primary ms-2">{{ $schedules->total() }}</span>
        </h5>
    </div>
    <div class="card-body p-0">
        @if($schedules->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="50">
                                <input type="checkbox" id="selectAll" class="form-check-input">
                            </th>
                            <th>Khóa học</th>
                            <th>Trình độ</th>
                            <th>Giảng viên</th>
                            <th>Thời gian</th>
                            <th>Học viên</th>
                            <th>Học phí</th>
                            <th>Trạng thái</th>
                            <th width="150">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td>
                                    <input type="checkbox" name="selected_ids[]" value="{{ $schedule->id }}" class="form-check-input schedule-checkbox">
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($schedule->teacher_avatar)
                                            <img src="{{ Storage::url($schedule->teacher_avatar) }}" alt="Avatar" class="rounded-circle me-2" width="40" height="40">
                                        @else
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $schedule->title }}</h6>
                                            <small class="text-muted">{{ Str::limit($schedule->description, 50) }}</small>
                                            @if($schedule->is_featured)
                                                <span class="badge bg-warning text-dark ms-1">Nổi bật</span>
                                            @endif
                                            @if($schedule->is_popular)
                                                <span class="badge bg-info text-white ms-1">Phổ biến</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $schedule->level_name }}</span>
                                </td>
                                <td>
                                    <div>
                                        <strong>{{ $schedule->teacher_name }}</strong>
                                        @if($schedule->teacher_title)
                                            <br><small class="text-muted">{{ $schedule->teacher_title }}</small>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <strong>{{ $schedule->start_date->format('d/m/Y') }}</strong>
                                        <br><small class="text-muted">{{ $schedule->start_time }} - {{ $schedule->end_time }}</small>
                                        <br><small class="text-muted">{{ $schedule->formatted_schedule_days }}</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <div class="fw-bold">{{ $schedule->current_students }}/{{ $schedule->max_students }}</div>
                                        <div class="progress mt-1" style="height: 4px;">
                                            <div class="progress-bar {{ $schedule->badge_class }}" style="width: {{ $schedule->availability_percentage }}%"></div>
                                        </div>
                                        <small class="text-muted">{{ $schedule->available_spots }} chỗ trống</small>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <strong class="text-primary">{{ $schedule->formatted_price }}</strong>
                                        @if($schedule->original_price && $schedule->original_price > $schedule->price)
                                            <br><small class="text-muted text-decoration-line-through">{{ $schedule->formatted_original_price }}</small>
                                            <br><small class="text-success">-{{ $schedule->discount_percentage }}%</small>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @switch($schedule->status)
                                        @case('published')
                                            <span class="badge bg-success">{{ $schedule->status_name }}</span>
                                            @break
                                        @case('draft')
                                            <span class="badge bg-secondary">{{ $schedule->status_name }}</span>
                                            @break
                                        @case('full')
                                            <span class="badge bg-warning text-dark">{{ $schedule->status_name }}</span>
                                            @break
                                        @case('cancelled')
                                            <span class="badge bg-danger">{{ $schedule->status_name }}</span>
                                            @break
                                        @case('completed')
                                            <span class="badge bg-info">{{ $schedule->status_name }}</span>
                                            @break
                                        @default
                                            <span class="badge bg-light text-dark">{{ $schedule->status_name }}</span>
                                    @endswitch
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.schedules.show', $schedule) }}" class="btn btn-sm btn-outline-info" title="Xem chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.schedules.edit', $schedule) }}" class="btn btn-sm btn-outline-primary" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('admin.schedules.duplicate', $schedule) }}">
                                                    <i class="fas fa-copy me-2"></i>Sao chép
                                                </a></li>
                                                @if($schedule->trashed())
                                                    <li><a class="dropdown-item text-success" href="{{ route('admin.schedules.restore', $schedule->id) }}">
                                                        <i class="fas fa-undo me-2"></i>Khôi phục
                                                    </a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" 
                                                           href="{{ route('admin.schedules.force-delete', $schedule->id) }}" 
                                                           data-confirm="Bạn có chắc chắn muốn xóa vĩnh viễn? Hành động này không thể hoàn tác!"
                                                           data-confirm-type="danger">
                                                        <i class="fas fa-trash-alt me-2"></i>Xóa vĩnh viễn
                                                    </a></li>
                                                @else
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" href="#" onclick="deleteSchedule({{ $schedule->id }})">
                                                        <i class="fas fa-trash me-2"></i>Xóa
                                                    </a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Không có lịch khai giảng nào</h5>
                <p class="text-muted">Hãy tạo lịch khai giảng đầu tiên của bạn!</p>
                <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Thêm Lịch Khai Giảng
                </a>
            </div>
        @endif
    </div>
    
    @if($schedules->hasPages())
        <div class="card-footer">
            {{ $schedules->links() }}
        </div>
    @endif
</div>

<!-- Delete Form -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const scheduleCheckboxes = document.querySelectorAll('.schedule-checkbox');
    const selectedCountSpan = document.getElementById('selectedCount');
    const bulkActionForm = document.getElementById('bulkActionForm');

    selectAllCheckbox.addEventListener('change', function() {
        scheduleCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    scheduleCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCount);
    });

    function updateSelectedCount() {
        const selectedCheckboxes = document.querySelectorAll('.schedule-checkbox:checked');
        selectedCountSpan.textContent = selectedCheckboxes.length;
        
        // Update select all checkbox state
        if (selectedCheckboxes.length === 0) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = false;
        } else if (selectedCheckboxes.length === scheduleCheckboxes.length) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = true;
        } else {
            selectAllCheckbox.indeterminate = true;
        }
    }

    // Bulk action form submission
    bulkActionForm.addEventListener('submit', function(e) {
        const selectedCheckboxes = document.querySelectorAll('.schedule-checkbox:checked');
        if (selectedCheckboxes.length === 0) {
            e.preventDefault();
            alert('Vui lòng chọn ít nhất một mục để thực hiện hành động.');
            return;
        }

        // Add selected IDs to form
        selectedCheckboxes.forEach(checkbox => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'selected_ids[]';
            input.value = checkbox.value;
            this.appendChild(input);
        });
    });

    // Delete function
    window.deleteSchedule = function(id) {
        confirmDelete('Lịch khai giảng này', function() {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/schedules/${id}`;
            form.submit();
        });
    };
});
</script>
@endpush