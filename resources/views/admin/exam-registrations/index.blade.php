@extends('admin.layouts.app')

@section('title', 'Quản lý đăng ký lịch thi')

@section('header')
    <h1 class="h3 mb-0 text-gray-800">Quản lý đăng ký lịch thi</h1>
    <div>
        <a href="{{ route('admin.exam-registrations.export') }}" class="btn btn-success">
            <i class="fas fa-download me-2"></i>Xuất CSV
        </a>
    </div>
@endsection

@section('content')
<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="stats-number">{{ $stats['total'] }}</div>
            <div class="stats-label">Tổng đăng ký</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="stats-number">{{ $stats['pending'] }}</div>
            <div class="stats-label">Chờ xác nhận</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="stats-number">{{ $stats['confirmed'] }}</div>
            <div class="stats-label">Đã xác nhận</div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="stats-number">{{ $stats['completed'] }}</div>
            <div class="stats-label">Đã hoàn thành</div>
        </div>
    </div>
</div>

<!-- Registrations Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>
            Danh sách đăng ký lịch thi
        </h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Số điện thoại</th>
                        <th>Lịch thi</th>
                        <th>Ngày đăng ký</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $registration)
                        <tr>
                            <td class="py-3">
                                <span class="badge bg-secondary">#{{ $registration->id }}</span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                        {{ strtoupper(substr($registration->full_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $registration->full_name }}</div>
                                        @if($registration->email)
                                            <small class="text-muted">{{ $registration->email }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <a href="tel:{{ $registration->phone }}" class="text-decoration-none">
                                    <i class="fas fa-phone me-2 text-primary"></i>
                                    {{ $registration->phone }}
                                </a>
                            </td>
                            <td class="py-3">
                                <div>
                                    <span class="badge bg-primary">{{ $registration->examSchedule->exam_type }}</span>
                                    @if($registration->examSchedule->level)
                                        <span class="badge bg-secondary ms-1">{{ $registration->examSchedule->level }}</span>
                                    @endif
                                </div>
                                <small class="text-muted">
                                    {{ $registration->examSchedule->formatted_exam_date }}
                                    @if($registration->examSchedule->exam_time)
                                        , {{ $registration->examSchedule->exam_time }}
                                    @endif
                                </small>
                            </td>
                            <td class="py-3">
                                <div>{{ $registration->created_at->format('d/m/Y') }}</div>
                                <small class="text-muted">{{ $registration->created_at->format('H:i') }}</small>
                            </td>
                            <td class="py-3">
                                <span class="badge {{ $registration->status_badge }}">
                                    {{ $registration->status_text }}
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.exam-registrations.show', $registration) }}" 
                                       class="btn btn-sm btn-outline-primary" title="Xem chi tiết">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-warning" 
                                            onclick="openStatusModal({{ $registration->id }}, '{{ $registration->status }}')" 
                                            title="Cập nhật trạng thái">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-inbox fa-2x mb-3"></i>
                                    <p>Chưa có đăng ký nào</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
@if($registrations->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $registrations->links() }}
    </div>
@endif

<!-- Status Update Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật trạng thái đăng ký</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="statusForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái mới</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending">Chờ xác nhận</option>
                            <option value="confirmed">Đã xác nhận</option>
                            <option value="cancelled">Đã hủy</option>
                            <option value="completed">Đã hoàn thành</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="admin_notes" class="form-label">Ghi chú admin</label>
                        <textarea class="form-control" id="admin_notes" name="admin_notes" rows="3" 
                                  placeholder="Ghi chú về việc cập nhật trạng thái..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openStatusModal(registrationId, currentStatus) {
    const modal = document.getElementById('statusModal');
    const form = document.getElementById('statusForm');
    const statusSelect = document.getElementById('status');
    
    // Set form action
    form.action = `/admin/exam-registrations/${registrationId}/status`;
    
    // Set current status
    statusSelect.value = currentStatus;
    
    // Show modal
    const bootstrapModal = new bootstrap.Modal(modal);
    bootstrapModal.show();
}
</script>
@endpush
