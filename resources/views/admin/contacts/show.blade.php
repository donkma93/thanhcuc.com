@extends('admin.layouts.app')

@section('title', 'Chi tiết liên hệ')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-envelope me-2"></i>
            Chi tiết liên hệ
        </h1>
        <p class="text-muted mb-0">Thông tin chi tiết và quản lý liên hệ</p>
    </div>
    <div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>
            Quay lại
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Contact Information -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-user me-2"></i>
                        Thông tin liên hệ
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Họ và tên:</label>
                                <p class="mb-0">{{ $contact->name }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Số điện thoại:</label>
                                <p class="mb-0">
                                    <a href="tel:{{ $contact->phone }}" class="text-decoration-none">
                                        <i class="fas fa-phone me-1"></i>
                                        {{ $contact->phone }}
                                    </a>
                                </p>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email:</label>
                                <p class="mb-0">
                                    @if($contact->email)
                                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                            <i class="fas fa-envelope me-1"></i>
                                            {{ $contact->email }}
                                        </a>
                                    @else
                                        <span class="text-muted">Chưa cung cấp</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Chương trình quan tâm:</label>
                                <p class="mb-0">
                                    <span class="badge bg-primary fs-6">{{ $contact->program }}</span>
                                </p>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Trạng thái:</label>
                                <p class="mb-0">{!! $contact->status_badge !!}</p>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Thời gian đăng ký:</label>
                                <p class="mb-0">
                                    {{ $contact->created_at->format('d/m/Y H:i:s') }}
                                    <br>
                                    <small class="text-muted">{{ $contact->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                            
                            @if($contact->contacted_at)
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Thời gian liên hệ:</label>
                                    <p class="mb-0">
                                        {{ $contact->contacted_at->format('d/m/Y H:i:s') }}
                                        <br>
                                        <small class="text-muted">{{ $contact->contacted_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    @if($contact->message)
                        <div class="mt-4">
                            <label class="form-label fw-bold">Tin nhắn:</label>
                            <div class="bg-light p-3 rounded">
                                {{ $contact->message }}
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
                    <h5 class="mb-0">
                        <i class="fas fa-bolt me-2"></i>
                        Thao tác nhanh
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <!-- Call Button -->
                        <a href="tel:{{ $contact->phone }}" class="btn btn-success">
                            <i class="fas fa-phone me-2"></i>
                            Gọi điện
                        </a>
                        
                        <!-- Email Button -->
                        @if($contact->email)
                            <a href="mailto:{{ $contact->email }}" class="btn btn-info">
                                <i class="fas fa-envelope me-2"></i>
                                Gửi email
                            </a>
                        @endif
                        
                        <!-- WhatsApp Button -->
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" 
                           target="_blank" class="btn btn-success">
                            <i class="fab fa-whatsapp me-2"></i>
                            WhatsApp
                        </a>
                        
                        <!-- Zalo Button -->
                        <a href="https://zalo.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" 
                           target="_blank" class="btn btn-primary">
                            <i class="fas fa-comment me-2"></i>
                            Zalo
                        </a>
                    </div>
                </div>
            </div>

            <!-- Status Management -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-tasks me-2"></i>
                        Quản lý trạng thái
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái:</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>
                                    Mới
                                </option>
                                <option value="contacted" {{ $contact->status === 'contacted' ? 'selected' : '' }}>
                                    Đã liên hệ
                                </option>
                                <option value="completed" {{ $contact->status === 'completed' ? 'selected' : '' }}>
                                    Hoàn thành
                                </option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save me-1"></i>
                            Cập nhật trạng thái
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Timeline -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-history me-2"></i>
                        Lịch sử
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
        background: #dee2e6;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 20px;
    }
    
    .timeline-marker {
        position: absolute;
        left: -22px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 0 0 2px #dee2e6;
    }
    
    .timeline-content h6 {
        font-size: 0.9rem;
        font-weight: 600;
    }
</style>
@endpush