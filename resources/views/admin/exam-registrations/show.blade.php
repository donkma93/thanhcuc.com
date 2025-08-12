@extends('admin.layouts.app')

@section('title', 'Chi tiết đăng ký lịch thi')

@section('header')
    <h1 class="h3 mb-0 text-gray-800">Chi tiết đăng ký lịch thi</h1>
    <div>
        <a href="{{ route('admin.exam-registrations.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
        <button type="button" class="btn btn-warning" 
                onclick="openStatusModal('{{ $registration->status }}')">
            <i class="fas fa-edit me-2"></i>Cập nhật trạng thái
        </button>
    </div>
@endsection

@section('content')
<div class="row">
    <!-- Registration Details -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user me-2"></i>
                    Thông tin đăng ký
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Họ và tên:</label>
                        <p class="mb-0">{{ $registration->full_name }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Số điện thoại:</label>
                        <p class="mb-0">
                            <a href="tel:{{ $registration->phone }}" class="text-decoration-none">
                                <i class="fas fa-phone me-2 text-primary"></i>
                                {{ $registration->phone }}
                            </a>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Email:</label>
                        <p class="mb-0">
                            @if($registration->email)
                                <a href="mailto:{{ $registration->email }}" class="text-decoration-none">
                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                    {{ $registration->email }}
                                </a>
                            @else
                                <span class="text-muted">Không có</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Ngày sinh:</label>
                        <p class="mb-0">{{ $registration->formatted_birth_date }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">CMND/CCCD:</label>
                        <p class="mb-0">{{ $registration->id_card ?: 'Không có' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Địa chỉ:</label>
                        <p class="mb-0">{{ $registration->address ?: 'Không có' }}</p>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label fw-bold">Ghi chú:</label>
                        <p class="mb-0">{{ $registration->notes ?: 'Không có' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exam Schedule Details -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-calendar-check me-2"></i>
                    Thông tin lịch thi
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Loại thi:</label>
                        <p class="mb-0">
                            <span class="badge bg-primary">{{ $registration->examSchedule->exam_type }}</span>
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Trình độ:</label>
                        <p class="mb-0">
                            @if($registration->examSchedule->level)
                                <span class="badge bg-secondary">{{ $registration->examSchedule->level }}</span>
                            @else
                                <span class="text-muted">Không có</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Ngày thi:</label>
                        <p class="mb-0">{{ $registration->examSchedule->formatted_exam_date }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Giờ thi:</label>
                        <p class="mb-0">
                            @if($registration->examSchedule->exam_time)
                                {{ $registration->examSchedule->exam_time }}
                            @else
                                <span class="text-muted">Chưa có</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Lệ phí:</label>
                        <p class="mb-0">{{ $registration->examSchedule->formatted_fee }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Địa điểm:</label>
                        <p class="mb-0">{{ $registration->examSchedule->location }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Hạn đăng ký:</label>
                        <p class="mb-0">{{ $registration->examSchedule->formatted_registration_deadline }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Số lượng:</label>
                        <p class="mb-0">
                            {{ $registration->examSchedule->current_participants }} / 
                            {{ $registration->examSchedule->max_participants ?: 'Không giới hạn' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Status Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Trạng thái
                </h6>
            </div>
            <div class="card-body text-center">
                <span class="badge {{ $registration->status_badge }} fs-6 px-3 py-2">
                    {{ $registration->status_text }}
                </span>
                
                @if($registration->confirmed_at)
                    <div class="mt-3">
                        <small class="text-muted">Xác nhận lúc:</small><br>
                        <strong>{{ $registration->formatted_confirmed_at }}</strong>
                    </div>
                @endif

                @if($registration->confirmedBy)
                    <div class="mt-2">
                        <small class="text-muted">Bởi:</small><br>
                        <strong>{{ $registration->confirmedBy->name }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <!-- Timeline Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-clock me-2"></i>
                    Lịch sử
                </h6>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-primary"></div>
                        <div class="timeline-content">
                            <div class="timeline-title">Đăng ký</div>
                            <div class="timeline-time">{{ $registration->created_at->format('d/m/Y H:i') }}</div>
                        </div>
                    </div>
                    
                    @if($registration->confirmed_at)
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <div class="timeline-title">Xác nhận</div>
                                <div class="timeline-time">{{ $registration->formatted_confirmed_at }}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Admin Notes Card -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="fas fa-sticky-note me-2"></i>
                    Ghi chú admin
                </h6>
            </div>
            <div class="card-body">
                @if($registration->admin_notes)
                    <p class="mb-0">{{ $registration->admin_notes }}</p>
                @else
                    <p class="text-muted mb-0">Chưa có ghi chú</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật trạng thái đăng ký</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.exam-registrations.update-status', $registration) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái mới</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending" {{ $registration->status === 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
                            <option value="confirmed" {{ $registration->status === 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                            <option value="cancelled" {{ $registration->status === 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                            <option value="completed" {{ $registration->status === 'completed' ? 'selected' : '' }}>Đã hoàn thành</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="admin_notes" class="form-label">Ghi chú admin</label>
                        <textarea class="form-control" id="admin_notes" name="admin_notes" rows="3" 
                                  placeholder="Ghi chú về việc cập nhật trạng thái...">{{ $registration->admin_notes }}</textarea>
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

@push('styles')
<style>
.timeline {
    position: relative;
    padding-left: 20px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -30px;
    top: 0;
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.timeline-content {
    padding-left: 10px;
}

.timeline-title {
    font-weight: 600;
    margin-bottom: 2px;
}

.timeline-time {
    font-size: 0.875rem;
    color: #6c757d;
}
</style>
@endpush

@push('scripts')
<script>
function openStatusModal(currentStatus) {
    const modal = document.getElementById('statusModal');
    const statusSelect = document.getElementById('status');
    
    // Set current status
    statusSelect.value = currentStatus;
    
    // Show modal
    const bootstrapModal = new bootstrap.Modal(modal);
    bootstrapModal.show();
}
</script>
@endpush
