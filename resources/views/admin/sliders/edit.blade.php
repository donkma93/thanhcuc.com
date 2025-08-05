@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa Slider')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-edit me-2"></i>
            Chỉnh sửa Slider
        </h1>
        <p class="text-muted mb-0">{{ $slider->title }}</p>
    </div>
    <div>
        <a href="{{ route('admin.sliders.show', $slider) }}" class="btn btn-outline-info">
            <i class="fas fa-eye me-1"></i>
            Xem chi tiết
        </a>
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
                    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
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
                                           value="{{ old('title', $slider->title) }}" 
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
                                      placeholder="Nhập mô tả slider (tùy chọn)">{{ old('description', $slider->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh</label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Chấp nhận: JPG, PNG, GIF. Kích thước tối đa: 2MB. 
                                Khuyến nghị: 1920x800px
                            </div>
                            
                            <!-- Current Image -->
                            @if($slider->image_path)
                                <div class="mt-3">
                                    <label class="form-label">Hình ảnh hiện tại:</label>
                                    <div>
                                        <img src="{{ $slider->image_url }}" 
                                             alt="{{ $slider->title }}" 
                                             class="img-thumbnail" 
                                             style="max-width: 300px; max-height: 200px;">
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <label class="form-label">Hình ảnh mới:</label>
                                <div>
                                    <img id="previewImg" src="" alt="Preview" 
                                         class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                                </div>
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
                                           value="{{ old('button_text', $slider->button_text) }}" 
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
                                           value="{{ old('button_link', $slider->button_link) }}" 
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
                                           value="{{ old('sort_order', $slider->sort_order) }}" 
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
                                               {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Hiển thị trên website
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.sliders.show', $slider) }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>
                                Hủy
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Cập nhật Slider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Current Preview -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-eye me-2"></i>
                        Xem trước hiện tại
                    </h5>
                </div>
                <div class="card-body">
                    @if($slider->image_path)
                        <div class="position-relative">
                            <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" 
                                 class="img-fluid rounded" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3 rounded-bottom">
                                <h6 class="mb-1">{{ $slider->title }}</h6>
                                @if($slider->description)
                                    <p class="mb-2 small">{{ Str::limit($slider->description, 80) }}</p>
                                @endif
                                @if($slider->button_text)
                                    <button class="btn btn-primary btn-sm">{{ $slider->button_text }}</button>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="text-center text-muted">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <p>Chưa có hình ảnh</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Live Preview -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-magic me-2"></i>
                        Xem trước thay đổi
                    </h5>
                </div>
                <div class="card-body">
                    <div id="sliderPreview">
                        <div class="text-center text-muted">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <p>Thay đổi sẽ hiển thị ở đây</p>
                        </div>
                    </div>
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
                    updateSliderPreview(e.target.result);
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
        
        function updateSliderPreview(newImageSrc = null) {
            const title = titleInput.value || '{{ $slider->title }}';
            const description = descriptionInput.value || '{{ $slider->description }}';
            const buttonText = buttonTextInput.value || '{{ $slider->button_text }}';
            const imageSrc = newImageSrc || '{{ $slider->image_url }}';
            
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
            } else {
                resetSliderPreview();
            }
        }
        
        function resetSliderPreview() {
            sliderPreview.innerHTML = `
                <div class="text-center text-muted">
                    <i class="fas fa-image fa-3x mb-3"></i>
                    <p>Thay đổi sẽ hiển thị ở đây</p>
                </div>
            `;
        }
        
        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const title = titleInput.value.trim();
            
            if (!title) {
                e.preventDefault();
                titleInput.focus();
                showAlert('error', 'Vui lòng nhập tiêu đề slider');
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