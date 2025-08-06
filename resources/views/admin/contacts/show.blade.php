@extends('admin.layouts.app')

@section('title', 'Chi tiết liên hệ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Chi tiết liên hệ</h1>
        <p class="text-muted">Thông tin chi tiết về liên hệ từ {{ $contact->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary me-2">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
        @if($contact->status === 'new')
            <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="contacted">
                <button type="submit" class="btn btn-success me-2">
                    <i class="fas fa-phone me-2"></i>Đánh dấu đã liên hệ
                </button>
            </form>
        @endif
        @if($contact->status !== 'completed')
            <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="completed">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-check me-2"></i>Hoàn thành
                </button>
            </form>
        @endif
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fas fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
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
</div>
    <div class="row">
        <!-- Contact Information -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user me-2"></i>Thông tin liên hệ
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Contact Header -->
                    <div class="d-flex align-items-center mb-4 p-3 bg-light rounded">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-user fa-2x text-white"></i>
                        </div>
                        <div>
                            <h4 class="mb-1">{{ $contact->name }}</h4>
                            <div class="d-flex align-items-center gap-3">
                                <a href="tel:{{ $contact->phone }}" class="text-decoration-none">
                                    <i class="fas fa-phone me-1"></i>{{ $contact->phone }}
                                </a>
                                @if($contact->email)
                                    <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                        <i class="fas fa-envelope me-1"></i>{{ $contact->email }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted mb-1">Chương trình quan tâm</h6>
                                <span class="badge bg-secondary fs-6">
                                    <i class="fas fa-graduation-cap me-1"></i>{{ $contact->program }}
                                </span>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="text-muted mb-1">Thời gian gửi</h6>
                                <div class="fw-bold">{{ $contact->created_at->format('d/m/Y H:i:s') }}</div>
                                <small class="text-muted">{{ $contact->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted mb-1">Trạng thái</h6>
                                <div>{!! $contact->status_badge !!}</div>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="text-muted mb-1">ID liên hệ</h6>
                                <code>#{{ $contact->id }}</code>
                            </div>
                            
                            @if($contact->contacted_at)
                                <div class="mb-3">
                                    <h6 class="text-muted mb-1">Thời gian liên hệ</h6>
                                    <div class="fw-bold">{{ $contact->contacted_at->format('d/m/Y H:i:s') }}</div>
                                    <small class="text-muted">{{ $contact->contacted_at->diffForHumans() }}</small>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    @if($contact->message)
                        <div class="mt-4">
                            <h6 class="text-muted mb-2">Tin nhắn</h6>
                            <div class="bg-light p-3 rounded border-start border-primary border-4">
                                <i class="fas fa-quote-left text-muted me-2"></i>
                                <span>{{ $contact->message }}</span>
                                <i class="fas fa-quote-right text-muted ms-2"></i>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Admin Notes -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-sticky-note me-2"></i>
                        Ghi chú quản trị
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="{{ $contact->status }}">
                        
                        <div class="mb-3">
                            <label for="admin_notes" class="form-label">Ghi chú:</label>
                            <textarea class="form-control" id="admin_notes" name="admin_notes" 
                                      rows="4" placeholder="Thêm ghi chú về cuộc liên hệ này...">{{ $contact->admin_notes }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Lưu ghi chú
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Actions Sidebar -->
        <div class="col-lg-4">
            <!-- Quick Actions -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt me-2"></i>Thao tác nhanh
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <!-- Call Button -->
                        <a href="tel:{{ $contact->phone }}" class="btn btn-success">
                            <i class="fas fa-phone me-2"></i>Gọi điện
                        </a>
                        
                        <!-- Email Button -->
                        @if($contact->email)
                            <a href="mailto:{{ $contact->email }}" class="btn btn-info">
                                <i class="fas fa-envelope me-2"></i>Gửi email
                            </a>
                        @endif
                        
                        <!-- WhatsApp Button -->
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" 
                           target="_blank" class="btn btn-outline-success">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                        
                        <!-- Zalo Button -->
                        <a href="https://zalo.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" 
                           target="_blank" class="btn btn-outline-primary">
                            <i class="fas fa-comment me-2"></i>Zalo
                        </a>
                    </div>
                </div>
            </div>

            <!-- Status Management -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-tasks me-2"></i>Quản lý trạng thái
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Trạng thái hiện tại</label>
                        <div>{!! $contact->status_badge !!}</div>
                    </div>
                    
                    <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Cập nhật trạng thái</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>
                                    <i class="fas fa-circle text-warning"></i> Mới
                                </option>
                                <option value="contacted" {{ $contact->status === 'contacted' ? 'selected' : '' }}>
                                    <i class="fas fa-circle text-info"></i> Đã liên hệ
                                </option>
                                <option value="completed" {{ $contact->status === 'completed' ? 'selected' : '' }}>
                                    <i class="fas fa-circle text-success"></i> Hoàn thành
                                </option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save me-2"></i>Cập nhật trạng thái
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Timeline -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-history me-2"></i>Lịch sử
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Đăng ký liên hệ</h6>
                                <p class="mb-0 text-muted small">
                                    {{ $contact->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                        </div>
                        
                        @if($contact->contacted_at)
                            <div class="timeline-item">
                                <div class="timeline-marker bg-warning"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Đã liên hệ</h6>
                                    <p class="mb-0 text-muted small">
                                        {{ $contact->contacted_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                        
                        @if($contact->status === 'completed')
                            <div class="timeline-item">
                                <div class="timeline-marker bg-success"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Hoàn thành</h6>
                                    <p class="mb-0 text-muted small">
                                        {{ $contact->updated_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa liên hệ này?</p>
                    <p class="text-danger"><strong>Hành động này không thể hoàn tác!</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.timeline-marker {
    position: absolute;
    left: -22px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px #e9ecef;
}

.timeline-content {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 3px solid #dee2e6;
}

.timeline-content h6 {
    color: #495057;
    margin-bottom: 5px;
}

.timeline-content p {
    margin-bottom: 0;
}
</style>
@endpush