@extends('admin.layouts.app')

@section('title', 'Quản lý liên hệ')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-envelope me-2"></i>
            Quản lý liên hệ
        </h1>
        <p class="text-muted mb-0">Danh sách tất cả liên hệ từ website</p>
    </div>
    <div>
        <a href="{{ route('admin.contacts.export', request()->query()) }}" class="btn btn-success me-2">
            <i class="fas fa-download me-1"></i>
            Xuất CSV
        </a>
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fas fa-filter me-1"></i>
                Lọc
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('admin.contacts.index') }}">Tất cả</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.contacts.index', ['status' => 'new']) }}">Mới</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.contacts.index', ['status' => 'contacted']) }}">Đã liên hệ</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.contacts.index', ['status' => 'completed']) }}">Hoàn thành</a></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
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
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-search me-1"></i>
                        Tìm kiếm
                    </button>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-1"></i>
                        Xóa bộ lọc
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
                                <i class="fas fa-bolt me-1"></i>
                                Thực hiện
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
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Danh sách liên hệ ({{ $contacts->total() }} kết quả)
            </h5>
        </div>
        <div class="card-body">
            @if($contacts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="50">
                                    <input type="checkbox" id="selectAll" class="form-check-input">
                                </th>
                                <th>Họ tên</th>
                                <th>Liên hệ</th>
                                <th>Chương trình</th>
                                <th>Trạng thái</th>
                                <th>Thời gian</th>
                                <th width="120">Thao tác</th>
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
                                        <div>
                                            <strong>{{ $contact->name }}</strong>
                                            @if($contact->message)
                                                <br>
                                                <small class="text-muted">
                                                    {{ Str::limit($contact->message, 50) }}
                                                </small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="tel:{{ $contact->phone }}" class="text-decoration-none">
                                                <i class="fas fa-phone me-1"></i>
                                                {{ $contact->phone }}
                                            </a>
                                            @if($contact->email)
                                                <br>
                                                <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                                    <i class="fas fa-envelope me-1"></i>
                                                    {{ $contact->email }}
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">
                                            {{ $contact->program }}
                                        </span>
                                    </td>
                                    <td>
                                        {!! $contact->status_badge !!}
                                        @if($contact->contacted_at)
                                            <br>
                                            <small class="text-muted">
                                                {{ $contact->contacted_at->format('d/m/Y H:i') }}
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <small class="text-muted">
                                                {{ $contact->created_at->format('d/m/Y H:i') }}
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                {{ $contact->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.contacts.show', $contact) }}" 
                                               class="btn btn-outline-primary" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if($contact->status === 'new')
                                                <form action="{{ route('admin.contacts.update-status', $contact) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="contacted">
                                                    <button type="submit" class="btn btn-outline-success" 
                                                            title="Đánh dấu đã liên hệ">
                                                        <i class="fas fa-phone"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.contacts.destroy', $contact) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" 
                                                        title="Xóa"
                                                        onclick="return confirm('Bạn có chắc muốn xóa liên hệ này?')">
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
                            Hiển thị {{ $contacts->firstItem() }} - {{ $contacts->lastItem() }} 
                            trong tổng số {{ $contacts->total() }} kết quả
                        </small>
                    </div>
                    <div>
                        {{ $contacts->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
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
                            <i class="fas fa-times me-1"></i>
                            Xóa bộ lọc
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