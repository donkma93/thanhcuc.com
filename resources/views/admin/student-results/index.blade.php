@extends('admin.layouts.app')

@section('title', 'Quản Lý Kết Quả Học Viên')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kết Quả Học Viên</li>
                    </ol>
                </div>
                <h4 class="page-title">
                    <i class="fas fa-trophy me-2"></i>
                    Quản Lý Kết Quả Học Viên
                </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">
                        <i class="fas fa-list me-2"></i>
                        Danh Sách Kết Quả
                    </h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.student-results.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                            Thêm Mới
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs nav-bordered mb-3" id="studentResultsTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="scores-tab" data-bs-toggle="tab" data-bs-target="#scores" type="button" role="tab">
                                <i class="fas fa-chart-line me-1"></i>
                                Bảng Điểm ({{ $scores->count() }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="feedbacks-tab" data-bs-toggle="tab" data-bs-target="#feedbacks" type="button" role="tab">
                                <i class="fas fa-comments me-1"></i>
                                Phản Hồi ({{ $feedbacks->count() }})
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="studentResultsTabContent">
                        <!-- Scores Tab -->
                        <div class="tab-pane fade show active" id="scores" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">
                                    <i class="fas fa-chart-line text-success me-2"></i>
                                    Bảng Điểm Học Viên
                                </h5>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="bulkAction('activate')">
                                        <i class="fas fa-eye me-1"></i> Kích hoạt
                                    </button>
                                    <button type="button" class="btn btn-outline-warning btn-sm" onclick="bulkAction('deactivate')">
                                        <i class="fas fa-eye-slash me-1"></i> Ẩn
                                    </button>
                                    <button type="button" class="btn btn-outline-info btn-sm" onclick="bulkAction('feature')">
                                        <i class="fas fa-star me-1"></i> Nổi bật
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="bulkAction('delete')">
                                        <i class="fas fa-trash me-1"></i> Xóa
                                    </button>
                                </div>
                            </div>

                            @if($scores->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-centered table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th width="30">
                                                    <input type="checkbox" class="form-check-input" id="selectAllScores">
                                                </th>
                                                <th width="80">Ảnh</th>
                                                <th>Thông Tin</th>
                                                <th>Chứng Chỉ</th>
                                                <th>Điểm</th>
                                                <th width="100">Thứ Tự</th>
                                                <th width="120">Trạng Thái</th>
                                                <th width="150">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="scoresTableBody">
                                            @foreach($scores as $score)
                                                <tr data-id="{{ $score->id }}">
                                                    <td>
                                                        <input type="checkbox" class="form-check-input score-checkbox" value="{{ $score->id }}">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $score->image_url }}" alt="{{ $score->title }}" 
                                                             class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-1">{{ $score->title }}</h6>
                                                        @if($score->student_name)
                                                            <small class="text-muted">
                                                                <i class="fas fa-user me-1"></i>{{ $score->student_name }}
                                                            </small>
                                                        @endif
                                                        @if($score->description)
                                                            <p class="mb-0 text-muted small">{{ Str::limit($score->description, 100) }}</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($score->certificate_type)
                                                            <span class="badge bg-primary">{{ $score->certificate_type }}</span>
                                                        @endif
                                                        @if($score->level)
                                                            <span class="badge bg-info">{{ $score->level }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($score->score)
                                                            <span class="badge bg-success fs-6">{{ $score->score }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control form-control-sm sort-order-input" 
                                                               value="{{ $score->sort_order }}" min="0" style="width: 70px;">
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                            <button type="button" class="btn btn-sm {{ $score->is_active ? 'btn-success' : 'btn-secondary' }}"
                                                                    onclick="toggleStatus({{ $score->id }})" title="{{ $score->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}">
                                                                <i class="fas {{ $score->is_active ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm {{ $score->is_featured ? 'btn-warning' : 'btn-outline-warning' }}"
                                                                    onclick="toggleFeatured({{ $score->id }})" title="{{ $score->is_featured ? 'Đang nổi bật' : 'Chưa nổi bật' }}">
                                                                <i class="fas fa-star"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                            <a href="{{ route('admin.student-results.show', $score) }}" class="btn btn-sm btn-info" title="Xem chi tiết">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.student-results.edit', $score) }}" class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteItem({{ $score->id }})" title="Xóa">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-chart-line fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Chưa có bảng điểm nào</h5>
                                    <p class="text-muted">Hãy thêm bảng điểm đầu tiên để bắt đầu!</p>
                                    <a href="{{ route('admin.student-results.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-1"></i>
                                        Thêm Bảng Điểm
                                    </a>
                                </div>
                            @endif
                        </div>

                        <!-- Feedbacks Tab -->
                        <div class="tab-pane fade" id="feedbacks" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">
                                    <i class="fas fa-comments text-info me-2"></i>
                                    Phản Hồi Học Viên
                                </h5>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="bulkAction('activate')">
                                        <i class="fas fa-eye me-1"></i> Kích hoạt
                                    </button>
                                    <button type="button" class="btn btn-outline-warning btn-sm" onclick="bulkAction('deactivate')">
                                        <i class="fas fa-eye-slash me-1"></i> Ẩn
                                    </button>
                                    <button type="button" class="btn btn-outline-info btn-sm" onclick="bulkAction('feature')">
                                        <i class="fas fa-star me-1"></i> Nổi bật
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="bulkAction('delete')">
                                        <i class="fas fa-trash me-1"></i> Xóa
                                    </button>
                                </div>
                            </div>

                            @if($feedbacks->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-centered table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th width="30">
                                                    <input type="checkbox" class="form-check-input" id="selectAllFeedbacks">
                                                </th>
                                                <th width="80">Ảnh</th>
                                                <th>Thông Tin</th>
                                                <th>Chứng Chỉ</th>
                                                <th>Thứ Tự</th>
                                                <th width="120">Trạng Thái</th>
                                                <th width="150">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="feedbacksTableBody">
                                            @foreach($feedbacks as $feedback)
                                                <tr data-id="{{ $feedback->id }}">
                                                    <td>
                                                        <input type="checkbox" class="form-check-input feedback-checkbox" value="{{ $feedback->id }}">
                                                    </td>
                                                    <td>
                                                        <img src="{{ $feedback->image_url }}" alt="{{ $feedback->title }}" 
                                                             class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-1">{{ $feedback->title }}</h6>
                                                        @if($feedback->student_name)
                                                            <small class="text-muted">
                                                                <i class="fas fa-user me-1"></i>{{ $feedback->student_name }}
                                                            </small>
                                                        @endif
                                                        @if($feedback->description)
                                                            <p class="mb-0 text-muted small">{{ Str::limit($feedback->description, 100) }}</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($feedback->certificate_type)
                                                            <span class="badge bg-primary">{{ $feedback->certificate_type }}</span>
                                                        @endif
                                                        @if($feedback->level)
                                                            <span class="badge bg-info">{{ $feedback->level }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control form-control-sm sort-order-input" 
                                                               value="{{ $feedback->sort_order }}" min="0" style="width: 70px;">
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                            <button type="button" class="btn btn-sm {{ $feedback->is_active ? 'btn-success' : 'btn-secondary' }}"
                                                                    onclick="toggleStatus({{ $feedback->id }})" title="{{ $feedback->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}">
                                                                <i class="fas {{ $feedback->is_active ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm {{ $feedback->is_featured ? 'btn-warning' : 'btn-outline-warning' }}"
                                                                    onclick="toggleFeatured({{ $feedback->id }})" title="{{ $feedback->is_featured ? 'Đang nổi bật' : 'Chưa nổi bật' }}">
                                                                <i class="fas fa-star"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                            <a href="{{ route('admin.student-results.show', $feedback) }}" class="btn btn-sm btn-info" title="Xem chi tiết">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.student-results.edit', $feedback) }}" class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteItem({{ $feedback->id }})" title="Xóa">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Chưa có phản hồi nào</h5>
                                    <p class="text-muted">Hãy thêm phản hồi đầu tiên để bắt đầu!</p>
                                    <a href="{{ route('admin.student-results.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-1"></i>
                                        Thêm Phản Hồi
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác Nhận Xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa kết quả này không? Hành động này không thể hoàn tác.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Xóa</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let deleteItemId = null;

// Select all checkboxes
document.getElementById('selectAllScores')?.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.score-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});

document.getElementById('selectAllFeedbacks')?.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.feedback-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});

// Toggle status
function toggleStatus(id) {
    fetch(`/admin/student-results/${id}/toggle-status`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra!');
    });
}

// Toggle featured
function toggleFeatured(id) {
    fetch(`/admin/student-results/${id}/toggle-featured`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra!');
    });
}

// Delete item
function deleteItem(id) {
    deleteItemId = id;
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

document.getElementById('confirmDelete').addEventListener('click', function() {
    if (deleteItemId) {
        fetch(`/admin/student-results/${deleteItemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra!');
        });
    }
});

// Bulk actions
function bulkAction(action) {
    const activeTab = document.querySelector('.tab-pane.active');
    const checkboxes = activeTab.querySelectorAll('input[type="checkbox"]:checked');
    const items = Array.from(checkboxes).map(cb => cb.value);

    if (items.length === 0) {
        alert('Vui lòng chọn ít nhất một mục!');
        return;
    }

    if (action === 'delete' && !confirm('Bạn có chắc chắn muốn xóa các mục đã chọn không?')) {
        return;
    }

    fetch('/admin/student-results/bulk-action', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ action, items })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra!');
    });
}

// Update sort order
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('sort-order-input')) {
        const row = e.target.closest('tr');
        const id = row.dataset.id;
        const sortOrder = e.target.value;

        fetch('/admin/student-results/update-order', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                items: [{ id: parseInt(id), sort_order: parseInt(sortOrder) }]
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success indicator
                e.target.classList.add('is-valid');
                setTimeout(() => e.target.classList.remove('is-valid'), 2000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            e.target.classList.add('is-invalid');
            setTimeout(() => e.target.classList.remove('is-invalid'), 2000);
        });
    }
});
</script>
@endpush

@push('styles')
<style>
.nav-tabs .nav-link {
    border: none;
    border-bottom: 3px solid transparent;
    color: #6c757d;
    font-weight: 500;
    padding: 0.75rem 1.5rem;
}

.nav-tabs .nav-link.active {
    border-bottom-color: #007bff;
    color: #007bff;
    background: transparent;
}

.nav-tabs .nav-link:hover {
    border-bottom-color: #dee2e6;
    color: #495057;
}

.table th {
    border-top: none;
    font-weight: 600;
    color: #495057;
}

.table td {
    vertical-align: middle;
}

.badge {
    font-size: 0.75rem;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}

.sort-order-input.is-valid {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.sort-order-input.is-invalid {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.tab-content {
    min-height: 400px;
}

.empty-state {
    text-align: center;
    padding: 3rem 1rem;
}

.empty-state i {
    font-size: 4rem;
    color: #dee2e6;
    margin-bottom: 1rem;
}
</style>
@endpush
