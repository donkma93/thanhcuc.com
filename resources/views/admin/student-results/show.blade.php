@extends('admin.layouts.app')

@section('title', 'Chi Tiết Kết Quả Học Viên')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.student-results.index') }}">Kết Quả Học Viên</a></li>
                        <li class="breadcrumb-item active">Chi Tiết</li>
                    </ol>
                </div>
                <h4 class="page-title">
                    <i class="fas fa-eye me-2"></i>
                    Chi Tiết Kết Quả Học Viên
                </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Thông Tin Chi Tiết
                    </h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.student-results.edit', $studentResult) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>
                            Chỉnh Sửa
                        </a>
                        <a href="{{ route('admin.student-results.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>
                            Quay Lại
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Left Column - Image -->
                        <div class="col-lg-5">
                            <div class="text-center mb-4">
                                <div class="image-container position-relative">
                                    <img src="{{ $studentResult->image_url }}" alt="{{ $studentResult->title }}" 
                                         class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
                                    
                                    <!-- Type Badge -->
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge bg-{{ $studentResult->type == 'score' ? 'success' : 'info' }} fs-6 px-3 py-2">
                                            <i class="fas {{ $studentResult->type == 'score' ? 'fa-chart-line' : 'fa-comments' }} me-2"></i>
                                            {{ $studentResult->type_label }}
                                        </span>
                                    </div>
                                    
                                    <!-- Status Badges -->
                                    <div class="position-absolute top-0 end-0 m-3">
                                        @if($studentResult->is_featured)
                                            <span class="badge bg-warning fs-6 px-3 py-2 mb-2 d-block">
                                                <i class="fas fa-star me-2"></i>
                                                Nổi Bật
                                            </span>
                                        @endif
                                        
                                        <span class="badge bg-{{ $studentResult->is_active ? 'success' : 'secondary' }} fs-6 px-3 py-2">
                                            <i class="fas {{ $studentResult->is_active ? 'fa-eye' : 'fa-eye-slash' }} me-2"></i>
                                            {{ $studentResult->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Quick Actions -->
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-{{ $studentResult->is_active ? 'secondary' : 'success' }} btn-lg"
                                        onclick="toggleStatus({{ $studentResult->id }})">
                                    <i class="fas {{ $studentResult->is_active ? 'fa-eye-slash' : 'fa-eye' }} me-2"></i>
                                    {{ $studentResult->is_active ? 'Ẩn kết quả' : 'Hiển thị kết quả' }}
                                </button>
                                
                                <button type="button" class="btn btn-{{ $studentResult->is_featured ? 'outline-warning' : 'warning' }} btn-lg"
                                        onclick="toggleFeatured({{ $studentResult->id }})">
                                    <i class="fas fa-star me-2"></i>
                                    {{ $studentResult->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}
                                </button>
                            </div>
                        </div>

                        <!-- Right Column - Details -->
                        <div class="col-lg-7">
                            <!-- Basic Information -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fas fa-info-circle text-primary me-2"></i>
                                    Thông Tin Cơ Bản
                                </h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Tiêu đề:</label>
                                        <p class="form-control-plaintext">{{ $studentResult->title }}</p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Loại:</label>
                                        <p class="form-control-plaintext">
                                            <span class="badge bg-{{ $studentResult->type == 'score' ? 'success' : 'info' }} fs-6">
                                                {{ $studentResult->type_label }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                
                                @if($studentResult->description)
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Mô tả:</label>
                                        <p class="form-control-plaintext">{{ $studentResult->description }}</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Student Information -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fas fa-user text-success me-2"></i>
                                    Thông Tin Học Viên
                                </h5>
                                
                                <div class="row">
                                    @if($studentResult->student_name)
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Tên học viên:</label>
                                            <p class="form-control-plaintext">
                                                <i class="fas fa-user me-2 text-muted"></i>
                                                {{ $studentResult->student_name }}
                                            </p>
                                        </div>
                                    @endif
                                    
                                    @if($studentResult->certificate_type)
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Loại chứng chỉ:</label>
                                            <p class="form-control-plaintext">
                                                <span class="badge bg-primary">{{ $studentResult->certificate_type }}</span>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="row">
                                    @if($studentResult->level)
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Cấp độ:</label>
                                            <p class="form-control-plaintext">
                                                <span class="badge bg-info">{{ $studentResult->level }}</span>
                                            </p>
                                        </div>
                                    @endif
                                    
                                    @if($studentResult->score)
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Điểm số:</label>
                                            <p class="form-control-plaintext">
                                                <span class="badge bg-success fs-5">{{ $studentResult->score }}</span>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Settings & Metadata -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fas fa-cog text-info me-2"></i>
                                    Cài Đặt & Thông Tin
                                </h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Thứ tự sắp xếp:</label>
                                        <p class="form-control-plaintext">{{ $studentResult->sort_order }}</p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Ngày tạo:</label>
                                        <p class="form-control-plaintext">
                                            <i class="fas fa-calendar me-2 text-muted"></i>
                                            {{ $studentResult->created_at->format('d/m/Y H:i') }}
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Cập nhật lần cuối:</label>
                                        <p class="form-control-plaintext">
                                            <i class="fas fa-clock me-2 text-muted"></i>
                                            {{ $studentResult->updated_at->format('d/m/Y H:i') }}
                                        </p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">ID:</label>
                                        <p class="form-control-plaintext">
                                            <code class="text-muted">{{ $studentResult->id }}</code>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Information -->
                            <div class="mb-4">
                                <h5 class="mb-3">
                                    <i class="fas fa-image text-warning me-2"></i>
                                    Thông Tin Hình Ảnh
                                </h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Đường dẫn:</label>
                                        <p class="form-control-plaintext">
                                            <code class="text-muted small">{{ $studentResult->image_path }}</code>
                                        </p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">URL:</label>
                                        <p class="form-control-plaintext">
                                            <a href="{{ $studentResult->image_url }}" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-external-link-alt me-2"></i>
                                                Xem ảnh gốc
                                            </a>
                                        </p>
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

@push('scripts')
<script>
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
</script>
@endpush

@push('styles')
<style>
.image-container {
    position: relative;
    display: inline-block;
}

.image-container img {
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease;
}

.image-container:hover img {
    transform: scale(1.02);
}

.badge {
    font-weight: 600;
    letter-spacing: 0.5px;
}

.form-label {
    color: #495057;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-control-plaintext {
    color: #212529;
    font-size: 1rem;
    padding: 0.375rem 0;
    margin-bottom: 0;
    line-height: 1.5;
    background-color: transparent;
    border: solid transparent;
    border-width: 1px 0;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.header-title {
    color: #495057;
    margin: 0;
}

.page-title {
    color: #495057;
}

.breadcrumb-item a {
    color: #007bff;
    text-decoration: none;
}

.breadcrumb-item.active {
    color: #6c757d;
}

.btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1.1rem;
}

code {
    background-color: #f8f9fa;
    padding: 0.2rem 0.4rem;
    border-radius: 0.25rem;
    font-size: 0.875em;
}

@media (max-width: 768px) {
    .col-lg-5 {
        order: 1;
        margin-bottom: 2rem;
    }
    
    .col-lg-7 {
        order: 2;
    }
    
    .image-container {
        max-width: 100%;
    }
}
</style>
@endpush
