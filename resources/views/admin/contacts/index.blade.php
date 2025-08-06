@extends('admin.layouts.app')

@section('title', 'Quản lý liên hệ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Quản lý liên hệ</h1>
        <p class="text-muted">Danh sách tất cả liên hệ từ website</p>
    </div>
    <div>
        <a href="{{ route('admin.contacts.export', request()->query()) }}" class="btn btn-success me-2">
            <i class="fas fa-download me-2"></i>Xuất CSV
        </a>
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fas fa-filter me-2"></i>Lọc
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('admin.contacts.index') }}">
                    <i class="fas fa-list me-2"></i>Tất cả
                </a></li>
                <li><a class="dropdown-item" href="{{ route('admin.contacts.index', ['status' => 'new']) }}">
                    <i class="fas fa-circle text-warning me-2"></i>Mới
                </a></li>
                <li><a class="dropdown-item" href="{{ route('admin.contacts.index', ['status' => 'contacted']) }}">
                    <i class="fas fa-circle text-info me-2"></i>Đã liên hệ
                </a></li>
                <li><a class="dropdown-item" href="{{ route('admin.contacts.index', ['status' => 'completed']) }}">
                    <i class="fas fa-circle text-success me-2"></i>Hoàn thành
                </a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Filters -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.contacts.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Tìm kiếm</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           placeholder="Tên, email, điện thoại..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">Tất cả</option>
                        <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>Mới</option>
                        <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Đã liên hệ</option>
                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    </select>
                </div>
                <div class="col-md-5 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>Tìm kiếm
                    </button>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Xóa bộ lọc
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bulk Actions -->
    @if($contacts->count() > 0)
        <div class="card mb-4">
            <div class="card-body">
                <form id="bulkActionForm" method="POST" action="{{ route('admin.contacts.bulk-action') }}">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label for="bulkAction" class="form-label">Thao tác hàng loạt</label>
                            <select class="form-select" id="bulkAction" name="action" required>
                                <option value="">Chọn thao tác</option>
                                <option value="mark_contacted">Đánh dấu đã liên hệ</option>
                                <option value="mark_completed">Đánh dấu hoàn thành</option>
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

    <!-- Contacts Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">
                <i class="fas fa-envelope me-2"></i>Danh sách liên hệ
                <span class="badge bg-primary ms-2">{{ $contacts->total() }}</span>
            </h5>
        </div>
        <div class="card-body p-0">
            @if($contacts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="50">
                                    <input type="checkbox" id="selectAll" class="form-check-input">
                                </th>
                                <th>Thông tin liên hệ</th>
                                <th>Chương trình</th>
                                <th>Trạng thái</th>
                                <th>Thời gian</th>
                                <th width="150">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selected_contacts[]" 
                                               value="{{ $contact->id }}" class="form-check-input contact-checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; min-width: 40px;">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-bold">{{ $contact->name }}</h6>
                                                <div class="mb-1">
                                                    <a href="tel:{{ $contact->phone }}" class="text-decoration-none text-muted small">
                                                        <i class="fas fa-phone me-1"></i>{{ $contact->phone }}
                                                    </a>
                                                </div>
                                                @if($contact->email)
                                                    <div class="mb-1">
                                                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none text-muted small">
                                                            <i class="fas fa-envelope me-1"></i>{{ Str::limit($contact->email, 25) }}
                                                        </a>
                                                    </div>
                                                @endif
                                                @if($contact->message)
                                                    <small class="text-muted">
                                                        <i class="fas fa-comment me-1"></i>{{ Str::limit($contact->message, 40) }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary text-white">
                                            <i class="fas fa-graduation-cap me-1"></i>{{ Str::limit($contact->program, 20) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div>
                                            {!! $contact->status_badge !!}
                                            @if($contact->contacted_at)
                                                <br><small class="text-muted">{{ $contact->contacted_at->format('d/m H:i') }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="fw-bold small">{{ $contact->created_at->format('d/m/Y') }}</div>
                                            <small class="text-muted">{{ $contact->created_at->format('H:i') }}</small>
                                            <br><small class="text-muted">{{ $contact->created_at->diffForHumans() }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.contacts.show', $contact) }}" 
                                               class="btn btn-sm btn-outline-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($contact->status === 'new')
                                                <form action="{{ route('admin.contacts.update-status', $contact) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="contacted">
                                                    <button type="submit" class="btn btn-sm btn-outline-success" 
                                                            title="Đánh dấu đã liên hệ">
                                                        <i class="fas fa-phone"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @if($contact->status !== 'completed')
                                                        <li>
                                                            <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="completed">
                                                                <button type="submit" class="dropdown-item text-success">
                                                                    <i class="fas fa-check me-2"></i>Hoàn thành
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                    @endif
                                                    <li>
                                                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger" 
                                                                    onclick="return confirm('Bạn có chắc muốn xóa liên hệ này?')">
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

                <!-- Pagination -->
                <div class="card-footer bg-white border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">
                                @if($contacts->total() > 0)
                                    Hiển thị {{ $contacts->firstItem() }} - {{ $contacts->lastItem() }} 
                                    trong tổng số {{ $contacts->total() }} kết quả
                                @else
                                    Không có kết quả nào
                                @endif
                            </small>
                        </div>
                        <div>
                            @if($contacts->hasPages())
                                {{ $contacts->appends(request()->query())->links('pagination.bootstrap-4') }}
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-envelope-open fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Không có liên hệ nào</h5>
                    <p class="text-muted">
                        @if(request()->hasAny(['search', 'status']))
                            Không tìm thấy liên hệ nào phù hợp với bộ lọc.
                        @else
                            Chưa có liên hệ nào từ website.
                        @endif
                    </p>
                    @if(request()->hasAny(['search', 'status']))
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary">
                            <i class="fas fa-times me-2"></i>Xóa bộ lọc
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
        const checkboxes = document.querySelectorAll('.contact-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    // Update selected count
    function updateSelectedCount() {
        const selectedCheckboxes = document.querySelectorAll('.contact-checkbox:checked');
        const count = selectedCheckboxes.length;
        document.getElementById('selectedCount').textContent = count;
        
        // Update bulk action form
        const bulkForm = document.getElementById('bulkActionForm');
        if (bulkForm) {
            // Remove existing hidden inputs
            const existingInputs = bulkForm.querySelectorAll('input[name="selected_contacts[]"]');
            existingInputs.forEach(input => input.remove());
            
            // Add new hidden inputs
            selectedCheckboxes.forEach(checkbox => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'selected_contacts[]';
                hiddenInput.value = checkbox.value;
                bulkForm.appendChild(hiddenInput);
            });
        }
    }

    // Add event listeners to individual checkboxes
    document.querySelectorAll('.contact-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCount);
    });

    // Confirm bulk action
    function confirmBulkAction() {
        const selectedCount = document.querySelectorAll('.contact-checkbox:checked').length;
        const action = document.getElementById('bulkAction').value;
        
        if (selectedCount === 0) {
            alert('Vui lòng chọn ít nhất một liên hệ.');
            return false;
        }
        
        if (!action) {
            alert('Vui lòng chọn thao tác.');
            return false;
        }
        
        let message = '';
        switch (action) {
            case 'mark_contacted':
                message = `Đánh dấu ${selectedCount} liên hệ là đã liên hệ?`;
                break;
            case 'mark_completed':
                message = `Đánh dấu ${selectedCount} liên hệ là hoàn thành?`;
                break;
            case 'delete':
                message = `Xóa ${selectedCount} liên hệ? Hành động này không thể hoàn tác.`;
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