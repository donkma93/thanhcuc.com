@extends('admin.layouts.app')

@section('title', 'Chỉnh Sửa Kết Quả Học Viên')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.student-results.index') }}">Kết Quả Học Viên</a></li>
                        <li class="breadcrumb-item active">Chỉnh Sửa</li>
                    </ol>
                </div>
                <h4 class="page-title">
                    <i class="fas fa-edit me-2"></i>
                    Chỉnh Sửa Kết Quả Học Viên
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
                    <form action="{{ route('admin.student-results.update', $studentResult) }}" method="POST" enctype="multipart/form-data" id="editForm">
                        @csrf
                        @method('PUT')
                        
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
                                                   id="title" name="title" value="{{ old('title', $studentResult->title) }}" required>
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
                                                <option value="score" {{ old('type', $studentResult->type) == 'score' ? 'selected' : '' }}>
                                                    📊 Bảng Điểm
                                                </option>
                                                <option value="feedback" {{ old('type', $studentResult->type) == 'feedback' ? 'selected' : '' }}>
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
                                                  placeholder="Mô tả chi tiết về kết quả...">{{ old('description', $studentResult->description) }}</textarea>
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
                                                   id="student_name" name="student_name" value="{{ old('student_name', $studentResult->student_name) }}"
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
                                                <option value="Goethe" {{ old('certificate_type', $studentResult->certificate_type) == 'Goethe' ? 'selected' : '' }}>Goethe</option>
                                                <option value="TestDaF" {{ old('certificate_type', $studentResult->certificate_type) == 'TestDaF' ? 'selected' : '' }}>TestDaF</option>
                                                <option value="DSH" {{ old('certificate_type', $studentResult->certificate_type) == 'DSH' ? 'selected' : '' }}>DSH</option>
                                                <option value="Telc" {{ old('certificate_type', $studentResult->certificate_type) == 'Telc' ? 'selected' : '' }}>Telc</option>
                                                <option value="Khác" {{ old('certificate_type', $studentResult->certificate_type) == 'Khác' ? 'selected' : '' }}>Khác</option>
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
                                                <option value="A1" {{ old('level', $studentResult->level) == 'A1' ? 'selected' : '' }}>A1 - Cơ bản</option>
                                                <option value="A2" {{ old('level', $studentResult->level) == 'A2' ? 'selected' : '' }}>A2 - Sơ cấp</option>
                                                <option value="B1" {{ old('level', $studentResult->level) == 'B1' ? 'selected' : '' }}>B1 - Trung cấp</option>
                                                <option value="B2" {{ old('level', $studentResult->level) == 'B2' ? 'selected' : '' }}>B2 - Trung cao cấp</option>
                                                <option value="C1" {{ old('level', $studentResult->level) == 'C1' ? 'selected' : '' }}>C1 - Cao cấp</option>
                                                <option value="C2" {{ old('level', $studentResult->level) == 'C2' ? 'selected' : '' }}>C2 - Thành thạo</option>
                                            </select>
                                            @error('level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3" id="scoreField" style="display: {{ $studentResult->type == 'score' ? 'block' : 'none' }};">
                                            <label for="score" class="form-label">Điểm số</label>
                                            <input type="text" class="form-control @error('score') is-invalid @enderror" 
                                                   id="score" name="score" value="{{ old('score', $studentResult->score) }}"
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
                                        <label for="image" class="form-label">Chọn ảnh mới (không bắt buộc)</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*">
                                        <div class="form-text">
                                            Định dạng: JPG, PNG, GIF. Kích thước tối đa: 2MB. Để trống nếu không muốn thay đổi ảnh.
                                        </div>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh hiện tại</label>
                                        <div class="current-image">
                                            <img src="{{ $studentResult->image_url }}" alt="{{ $studentResult->title }}" 
                                                 class="img-thumbnail" style="max-width: 300px;">
                                        </div>
                                    </div>
                                    
                                    <div id="imagePreview" class="d-none">
                                        <label class="form-label">Ảnh mới</label>
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
                                               id="sort_order" name="sort_order" value="{{ old('sort_order', $studentResult->sort_order) }}" min="0">
                                        <div class="form-text">Số càng nhỏ càng hiển thị trước</div>
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="hidden" name="is_active" value="0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                                   value="1" {{ old('is_active', $studentResult->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Hiển thị
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="hidden" name="is_featured" value="0">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                                                   value="1" {{ old('is_featured', $studentResult->is_featured) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_featured">
                                                Đánh dấu nổi bật
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Current Status -->
                                <div class="mb-4">
                                    <h5 class="mb-3">
                                        <i class="fas fa-info-circle text-secondary me-2"></i>
                                        Trạng Thái Hiện Tại
                                    </h5>
                                    
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="fw-bold">Loại:</span>
                                                <span class="badge bg-{{ $studentResult->type == 'score' ? 'success' : 'info' }}">
                                                    {{ $studentResult->type_label }}
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="fw-bold">Trạng thái:</span>
                                                <span class="badge bg-{{ $studentResult->is_active ? 'success' : 'secondary' }}">
                                                    {{ $studentResult->is_active ? 'Đang hiển thị' : 'Đang ẩn' }}
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="fw-bold">Nổi bật:</span>
                                                <span class="badge bg-{{ $studentResult->is_featured ? 'warning' : 'secondary' }}">
                                                    {{ $studentResult->is_featured ? 'Có' : 'Không' }}
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fw-bold">Ngày tạo:</span>
                                                <small class="text-muted">{{ $studentResult->created_at->format('d/m/Y H:i') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-2"></i>
                                        Cập Nhật
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
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add('d-none');
        }
    });
    
    // Form validation
    const form = document.getElementById('editForm');
    form.addEventListener('submit', function(e) {
        const type = typeSelect.value;
        
        if (!type) {
            e.preventDefault();
            alert('Vui lòng chọn loại kết quả!');
            typeSelect.focus();
            return;
        }
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang cập nhật...';
        submitBtn.disabled = true;
        
        // Reset after 5 seconds (adjust based on actual form processing)
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 5000);
    });
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

.current-image img {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

.badge {
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
