@extends('admin.layouts.app')

@section('title', 'Thêm Kết Quả Học Viên')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.student-results.index') }}">Kết Quả Học Viên</a></li>
                        <li class="breadcrumb-item active">Thêm Mới</li>
                    </ol>
                </div>
                <h4 class="page-title">
                    <i class="fas fa-plus me-2"></i>
                    Thêm Kết Quả Học Viên
                </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title">
                        <i class="fas fa-edit me-2"></i>
                        Thông Tin Kết Quả
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.student-results.store') }}" method="POST" enctype="multipart/form-data" id="createForm">
                        @csrf
                        
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-lg-8">
                                <!-- Basic Information -->
                                <div class="mb-4">
                                    <h5 class="mb-3">
                                        <i class="fas fa-info-circle text-primary me-2"></i>
                                        Thông Tin Cơ Bản
                                    </h5>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="title" class="form-label">
                                                Tiêu đề <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                                   id="title" name="title" value="{{ old('title') }}" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="type" class="form-label">
                                                Loại kết quả <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select @error('type') is-invalid @enderror" 
                                                    id="type" name="type" required>
                                                <option value="">Chọn loại</option>
                                                <option value="score" {{ old('type') == 'score' ? 'selected' : '' }}>
                                                    📊 Bảng Điểm
                                                </option>
                                                <option value="feedback" {{ old('type') == 'feedback' ? 'selected' : '' }}>
                                                    💬 Phản Hồi
                                                </option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô tả</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  id="description" name="description" rows="3" 
                                                  placeholder="Mô tả chi tiết về kết quả...">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Student Information -->
                                <div class="mb-4">
                                    <h5 class="mb-3">
                                        <i class="fas fa-user text-success me-2"></i>
                                        Thông Tin Học Viên
                                    </h5>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="student_name" class="form-label">Tên học viên</label>
                                            <input type="text" class="form-control @error('student_name') is-invalid @enderror" 
                                                   id="student_name" name="student_name" value="{{ old('student_name') }}"
                                                   placeholder="Nhập tên học viên (nếu có)">
                                            @error('student_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="certificate_type" class="form-label">Loại chứng chỉ</label>
                                            <select class="form-select @error('certificate_type') is-invalid @enderror" 
                                                    id="certificate_type" name="certificate_type">
                                                <option value="">Chọn loại chứng chỉ</option>
                                                <option value="Goethe" {{ old('certificate_type') == 'Goethe' ? 'selected' : '' }}>Goethe</option>
                                                <option value="TestDaF" {{ old('certificate_type') == 'TestDaF' ? 'selected' : '' }}>TestDaF</option>
                                                <option value="DSH" {{ old('certificate_type') == 'DSH' ? 'selected' : '' }}>DSH</option>
                                                <option value="Telc" {{ old('certificate_type') == 'Telc' ? 'selected' : '' }}>Telc</option>
                                                <option value="Khác" {{ old('certificate_type') == 'Khác' ? 'selected' : '' }}>Khác</option>
                                            </select>
                                            @error('certificate_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="level" class="form-label">Cấp độ</label>
                                            <select class="form-select @error('level') is-invalid @enderror" 
                                                    id="level" name="level">
                                                <option value="">Chọn cấp độ</option>
                                                <option value="A1" {{ old('level') == 'A1' ? 'selected' : '' }}>A1 - Cơ bản</option>
                                                <option value="A2" {{ old('level') == 'A2' ? 'selected' : '' }}>A2 - Sơ cấp</option>
                                                <option value="B1" {{ old('level') == 'B1' ? 'selected' : '' }}>B1 - Trung cấp</option>
                                                <option value="B2" {{ old('level') == 'B2' ? 'selected' : '' }}>B2 - Trung cao cấp</option>
                                                <option value="C1" {{ old('level') == 'C1' ? 'selected' : '' }}>C1 - Cao cấp</option>
                                                <option value="C2" {{ old('level') == 'C2' ? 'selected' : '' }}>C2 - Thành thạo</option>
                                            </select>
                                            @error('level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3" id="scoreField" style="display: none;">
                                            <label for="score" class="form-label">Điểm số</label>
                                            <input type="text" class="form-control @error('score') is-invalid @enderror" 
                                                   id="score" name="score" value="{{ old('score') }}"
                                                   placeholder="VD: 95, A+, 4x4...">
                                            @error('score')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="mb-4">
                                    <h5 class="mb-3">
                                        <i class="fas fa-image text-warning me-2"></i>
                                        Hình Ảnh
                                    </h5>
                                    
                                    <div class="mb-3">
                                        <label for="image" class="form-label">
                                            Chọn ảnh <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*" required>
                                        <div class="form-text">
                                            Định dạng: JPG, PNG, GIF. Kích thước tối đa: 2MB
                                        </div>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div id="imagePreview" class="d-none">
                                        <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-4">
                                <!-- Settings -->
                                <div class="mb-4">
                                    <h5 class="mb-3">
                                        <i class="fas fa-cog text-info me-2"></i>
                                        Cài Đặt
                                    </h5>
                                    
                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">Thứ tự sắp xếp</label>
                                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                               id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                        <div class="form-text">Số càng nhỏ càng hiển thị trước</div>
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="hidden" name="is_active" value="0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Hiển thị ngay
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="hidden" name="is_featured" value="0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                                                   value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_featured">
                                                Đánh dấu nổi bật
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Card -->
                                <div class="mb-4">
                                    <h5 class="mb-3">
                                        <i class="fas fa-eye text-secondary me-2"></i>
                                        Xem Trước
                                    </h5>
                                    
                                    <div class="card border-dashed" id="previewCard">
                                        <div class="card-body text-center py-4">
                                            <i class="fas fa-image fa-3x text-muted mb-3"></i>
                                            <h6 class="text-muted">Chưa có ảnh</h6>
                                            <p class="text-muted small mb-0">Chọn ảnh để xem trước</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>
                                        Lưu Kết Quả
                                    </button>
                                    <a href="{{ route('admin.student-results.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>
                                        Quay Lại
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const scoreField = document.getElementById('scoreField');
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const previewCard = document.getElementById('previewCard');
    
    // Toggle score field based on type
    typeSelect.addEventListener('change', function() {
        if (this.value === 'score') {
            scoreField.style.display = 'block';
        } else {
            scoreField.style.display = 'none';
        }
    });
    
    // Image preview
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('d-none');
                previewCard.classList.add('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add('d-none');
            previewCard.classList.remove('d-none');
        }
    });
    
    // Form validation
    const form = document.getElementById('createForm');
    form.addEventListener('submit', function(e) {
        const type = typeSelect.value;
        const image = imageInput.files[0];
        
        if (!type) {
            e.preventDefault();
            alert('Vui lòng chọn loại kết quả!');
            typeSelect.focus();
            return;
        }
        
        if (!image) {
            e.preventDefault();
            alert('Vui lòng chọn ảnh!');
            imageInput.focus();
            return;
        }
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang lưu...';
        submitBtn.disabled = true;
        
        // Reset after 5 seconds (adjust based on actual form processing)
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 5000);
    });
    
    // Initialize score field visibility
    if (typeSelect.value === 'score') {
        scoreField.style.display = 'block';
    }
});
</script>
@endpush

@push('styles')
<style>
.border-dashed {
    border: 2px dashed #dee2e6 !important;
}

.form-label {
    font-weight: 600;
    color: #495057;
}

.form-control:focus,
.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.form-check-input:checked {
    background-color: #007bff;
    border-color: #007bff;
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

#imagePreview img {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-text {
    font-size: 0.875rem;
    color: #6c757d;
}

.invalid-feedback {
    font-size: 0.875rem;
}

@media (max-width: 768px) {
    .col-lg-8 {
        order: 2;
    }
    
    .col-lg-4 {
        order: 1;
        margin-bottom: 2rem;
    }
}
</style>
@endpush
