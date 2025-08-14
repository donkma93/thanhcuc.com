@extends('admin.layouts.app')

@section('title', 'Chi tiết Kết Quả Học Viên')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết Kết Quả Học Viên: {{ $studentResult->title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.student-results.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                        <a href="{{ route('admin.student-results.edit', $studentResult) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Image -->
                            <div class="text-center mb-4">
                                <img src="{{ $studentResult->image_url }}" alt="{{ $studentResult->title }}" 
                                     class="img-fluid rounded" style="max-width: 100%; max-height: 500px;">
                            </div>
                            
                            <!-- Title and Description -->
                            <div class="mb-4">
                                <h4 class="text-primary">{{ $studentResult->title }}</h4>
                                @if($studentResult->description)
                                    <p class="text-muted">{{ $studentResult->description }}</p>
                                @endif
                            </div>
                            
                            <!-- Student Information -->
                            <div class="row mb-4">
                                @if($studentResult->student_name)
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <strong><i class="fas fa-user text-primary me-2"></i>Tên học viên:</strong>
                                            <span class="ms-2">{{ $studentResult->student_name }}</span>
                                        </div>
                                    </div>
                                @endif
                                
                                @if($studentResult->certificate_type)
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <strong><i class="fas fa-certificate text-success me-2"></i>Loại chứng chỉ:</strong>
                                            <span class="ms-2">{{ $studentResult->certificate_type }}</span>
                                        </div>
                                    </div>
                                @endif
                                
                                @if($studentResult->level)
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <strong><i class="fas fa-layer-group text-info me-2"></i>Cấp độ:</strong>
                                            <span class="ms-2">{{ $studentResult->level }}</span>
                                        </div>
                                    </div>
                                @endif
                                
                                @if($studentResult->score)
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <strong><i class="fas fa-chart-line text-warning me-2"></i>Điểm số:</strong>
                                            <span class="ms-2 badge badge-success fs-6">{{ $studentResult->score }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Status Information -->
                            <div class="card bg-light mb-4">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Thông tin trạng thái</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span><strong>Loại:</strong></span>
                                        <span class="badge badge-{{ $studentResult->type === 'score' ? 'success' : 'info' }}">
                                            {{ $studentResult->type === 'score' ? 'Bảng điểm' : 'Phản hồi' }}
                                        </span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span><strong>Trạng thái:</strong></span>
                                        <span class="badge badge-{{ $studentResult->is_active ? 'success' : 'secondary' }}">
                                            {{ $studentResult->is_active ? 'Hoạt động' : 'Tạm dừng' }}
                                        </span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span><strong>Nổi bật:</strong></span>
                                        <span class="badge badge-{{ $studentResult->is_featured ? 'warning' : 'secondary' }}">
                                            {{ $studentResult->is_featured ? 'Có' : 'Không' }}
                                        </span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span><strong>Thứ tự:</strong></span>
                                        <span class="badge badge-primary">{{ $studentResult->sort_order }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Timestamps -->
                            <div class="card bg-light mb-4">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="fas fa-clock me-2"></i>Thông tin thời gian</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <strong>Tạo lúc:</strong><br>
                                        <small class="text-muted">{{ $studentResult->created_at->format('d/m/Y H:i:s') }}</small>
                                    </div>
                                    <div>
                                        <strong>Cập nhật lúc:</strong><br>
                                        <small class="text-muted">{{ $studentResult->updated_at->format('d/m/Y H:i:s') }}</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Quick Actions -->
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="fas fa-bolt me-2"></i>Thao tác nhanh</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <form action="{{ route('admin.student-results.toggle-status', $studentResult) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-{{ $studentResult->is_active ? 'warning' : 'success' }} btn-sm w-100">
                                                <i class="fas fa-{{ $studentResult->is_active ? 'pause' : 'play' }} me-2"></i>
                                                {{ $studentResult->is_active ? 'Tạm dừng' : 'Kích hoạt' }}
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('admin.student-results.toggle-featured', $studentResult) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-{{ $studentResult->is_featured ? 'secondary' : 'warning' }} btn-sm w-100">
                                                <i class="fas fa-star me-2"></i>
                                                {{ $studentResult->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}
                                            </button>
                                        </form>
                                        
                                        <a href="{{ route('admin.student-results.edit', $studentResult) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit me-2"></i>Chỉnh sửa
                                        </a>
                                        
                                        <form action="{{ route('admin.student-results.destroy', $studentResult) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                                <i class="fas fa-trash me-2"></i>Xóa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.info-item {
    padding: 0.5rem 0;
    border-bottom: 1px solid #f0f0f0;
}

.info-item:last-child {
    border-bottom: none;
}

.badge {
    font-size: 0.875rem;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.card-header h6 {
    margin: 0;
    color: #495057;
}
</style>
@endpush
