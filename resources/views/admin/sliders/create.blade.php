@extends('admin.layouts.app')

@section('title', 'Thêm Slider')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-plus me-2"></i>
            Thêm Slider Mới
        </h1>
        <p class="text-muted mb-0">Tạo slider mới cho trang chủ</p>
    </div>
    <div>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>
            Quay lại
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Thông tin Slider
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">
                                        Tiêu đề <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title') }}" 
                                           placeholder="Nhập tiêu đề slider"
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="3" 
                                      placeholder="Nhập mô tả slider (tùy chọn)">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">
                                Hình ảnh <span class="text-danger">*</span>
                            </label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*"
                                   required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Chấp nhận: JPG, PNG, GIF. Kích thước tối đa: 2MB. 
                                Khuyến nghị: 1920x800px
                            </div>
                            
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img id="previewImg" src="" alt="Preview" 
                                     class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_text" class="form-label">Text Button</label>
                                    <input type="text" 
                                           class="form-control @error('button_text') is-invalid @enderror" 
                                           id="button_text" 
                                           name="button_text" 
                                           value="{{ old('button_text') }}" 
                                           placeholder="VD: Tìm hiểu thêm">
                                    @error('button_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="button_link" class="form-label">Link Button</label>
                                    <input type="url" 
                                           class="form-control @error('button_link') is-invalid @enderror" 
                                           id="button_link" 
                                           name="button_link" 
                                           value="{{ old('button_link') }}" 
                                           placeholder="https://example.com">
                                    @error('button_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Thứ tự hiển thị</label>
                                    <input type="number" 
                                           class="form-control @error('sort_order') is-invalid @enderror" 
                                           id="sort_order" 
                                           name="sort_order" 
                                           value="{{ old('sort_order', 0) }}" 
                                           min="0">
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Số nhỏ hơn sẽ hiển thị trước</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Trạng thái</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1"
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Hiển thị trên website
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>
                                Hủy
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Lưu Slider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Preview Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-eye me-2"></i>
                        Xem trước
                    </h5>
                </div>
                <div class="card-body">
                    <div id="sliderPreview" class="border rounded p-3 bg-light">
                        <div class="text-center text-muted">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <p>Chọn hình ảnh để xem trước slider</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tips Card -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        Mẹo thiết kế
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Sử dụng hình ảnh có độ phân giải cao
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Tỷ lệ khuyến nghị: 16:9 (1920x1080px)
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Tiêu đề ngắn gọn, súc tích
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Mô tả không quá 2-3 dòng
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-check text-success me-2"></i>
                            Button text rõ ràng, hành động cụ thể
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const sliderPreview = document.getElementById('sliderPreview');
        const titleInput = document.getElementById('title');
        const descriptionInput = document.getElementById('description');
        const buttonTextInput = document.getElementById('button_text');
        
        // Image preview
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                    updateSliderPreview();
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
                resetSliderPreview();
            }
        });
        
        // Live preview update
        titleInput.addEventListener('input', updateSliderPreview);
        descriptionInput.addEventListener('input', updateSliderPreview);
        buttonTextInput.addEventListener('input', updateSliderPreview);
        
        function updateSliderPreview() {
            const title = titleInput.value || 'Tiêu đề slider';
            const description = descriptionInput.value || 'Mô tả slider sẽ hiển thị ở đây';
            const buttonText = buttonTextInput.value || 'Button';
            const imageSrc = previewImg.src;
            
            if (imageSrc) {
                sliderPreview.innerHTML = `
                    <div class="position-relative">
                        <img src="${imageSrc}" alt="Preview" class="img-fluid rounded" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3 rounded-bottom">
                            <h6 class="mb-1">${title}</h6>
                            <p class="mb-2 small">${description}</p>
                            ${buttonText ? `<button class="btn btn-primary btn-sm">${buttonText}</button>` : ''}
                        </div>
                    </div>
                `;
            }
        }
        
        function resetSliderPreview() {
            sliderPreview.innerHTML = `
                <div class="text-center text-muted">
                    <i class="fas fa-image fa-3x mb-3"></i>
                    <p>Chọn hình ảnh để xem trước slider</p>
                </div>
            `;
        }
        
        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const title = titleInput.value.trim();
            const image = imageInput.files[0];
            
            if (!title) {
                e.preventDefault();
                titleInput.focus();
                showAlert('error', 'Vui lòng nhập tiêu đề slider');
                return;
            }
            
            if (!image) {
                e.preventDefault();
                imageInput.focus();
                showAlert('error', 'Vui lòng chọn hình ảnh slider');
                return;
            }
            
            // Check file size (2MB)
            if (image.size > 2 * 1024 * 1024) {
                e.preventDefault();
                imageInput.focus();
                showAlert('error', 'Kích thước hình ảnh không được vượt quá 2MB');
                return;
            }
        });
    });
    
    function showAlert(type, message) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        
        const alert = document.createElement('div');
        alert.className = `alert ${alertClass} alert-dismissible fade show`;
        alert.innerHTML = `
            <i class="fas ${icon} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        const container = document.querySelector('.main-content');
        container.insertBefore(alert, container.firstChild);
        
        // Auto dismiss after 5 seconds
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    }
</script>
@endpush