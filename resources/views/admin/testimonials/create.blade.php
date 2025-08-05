@extends('admin.layouts.app')

@section('title', 'Thêm Nhận xét')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-plus me-2"></i>
            Thêm Nhận xét Mới
        </h1>
        <p class="text-muted mb-0">Tạo nhận xét mới từ học viên</p>
    </div>
    <div>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">
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
                        Thông tin Nhận xét
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Student Info -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Tên học viên <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="Nhập tên học viên"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="current_job" class="form-label">
                                        Công việc hiện tại <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('current_job') is-invalid @enderror" 
                                           id="current_job" 
                                           name="current_job" 
                                           value="{{ old('current_job') }}" 
                                           placeholder="VD: Software Developer"
                                           required>
                                    @error('current_job')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="program" class="form-label">
                                        Chương trình đã học <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('program') is-invalid @enderror" 
                                           id="program" 
                                           name="program" 
                                           value="{{ old('program') }}" 
                                           placeholder="VD: Ausbildung IT & Công nghệ"
                                           required>
                                    @error('program')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rating" class="form-label">
                                        Đánh giá <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('rating') is-invalid @enderror" 
                                            id="rating" 
                                            name="rating" 
                                            required>
                                        <option value="">Chọn đánh giá</option>
                                        <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Xuất sắc (5 sao)</option>
                                        <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ Rất tốt (4 sao)</option>
                                        <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>⭐⭐⭐ Tốt (3 sao)</option>
                                        <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>⭐⭐ Khá (2 sao)</option>
                                        <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>⭐ Trung bình (1 sao)</option>
                                    </select>
                                    @error('rating')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">Công ty</label>
                                    <input type="text" 
                                           class="form-control @error('company') is-invalid @enderror" 
                                           id="company" 
                                           name="company" 
                                           value="{{ old('company') }}" 
                                           placeholder="VD: SAP SE">
                                    @error('company')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Địa điểm</label>
                                    <input type="text" 
                                           class="form-control @error('location') is-invalid @enderror" 
                                           id="location" 
                                           name="location" 
                                           value="{{ old('location') }}" 
                                           placeholder="VD: Berlin, Đức">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="mb-3">
                            <label for="content" class="form-label">
                                Nội dung nhận xét <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" 
                                      name="content" 
                                      rows="5" 
                                      placeholder="Nhập nội dung nhận xét của học viên..."
                                      required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Hãy viết nhận xét chân thực và chi tiết về trải nghiệm của học viên
                            </div>
                        </div>
                        
                        <!-- Avatar -->
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar học viên</label>
                            <input type="file" 
                                   class="form-control @error('avatar') is-invalid @enderror" 
                                   id="avatar" 
                                   name="avatar" 
                                   accept="image/*">
                            @error('avatar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Chấp nhận: JPG, PNG, GIF. Kích thước tối đa: 2MB. 
                                Khuyến nghị: 300x300px (hình vuông)
                            </div>
                            
                            <!-- Avatar Preview -->
                            <div id="avatarPreview" class="mt-3" style="display: none;">
                                <img id="previewAvatar" src="" alt="Preview" 
                                     class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                        </div>
                        
                        <!-- Settings -->
                        <div class="row">
                            <div class="col-md-4">
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
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nổi bật</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               id="is_featured" 
                                               name="is_featured" 
                                               value="1"
                                               {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Đánh dấu nổi bật
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>
                                Hủy
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Lưu Nhận xét
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
                    <div id="testimonialPreview" class="text-center">
                        <div class="mb-3">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto" 
                                 style="width: 80px; height: 80px;" id="previewAvatarContainer">
                                <i class="fas fa-user fa-2x text-muted"></i>
                            </div>
                        </div>
                        <h6 class="mb-1" id="previewName">Tên học viên</h6>
                        <p class="text-muted small mb-2" id="previewJob">Công việc</p>
                        <div class="mb-2" id="previewRating">
                            <i class="far fa-star text-muted"></i>
                            <i class="far fa-star text-muted"></i>
                            <i class="far fa-star text-muted"></i>
                            <i class="far fa-star text-muted"></i>
                            <i class="far fa-star text-muted"></i>
                        </div>
                        <p class="small text-muted fst-italic" id="previewContent">
                            "Nội dung nhận xét sẽ hiển thị ở đây..."
                        </p>
                        <div class="text-muted small">
                            <div id="previewCompany"></div>
                            <div id="previewLocation"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tips Card -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        Mẹo viết nhận xét
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Sử dụng thông tin thật của học viên
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Nhận xét cụ thể về trải nghiệm
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Đề cập đến kết quả đạt được
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Tránh ngôn ngữ quá cường điệu
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-check text-success me-2"></i>
                            Bao gồm thông tin công ty/địa điểm
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
        const avatarInput = document.getElementById('avatar');
        const avatarPreview = document.getElementById('avatarPreview');
        const previewAvatar = document.getElementById('previewAvatar');
        
        const nameInput = document.getElementById('name');
        const jobInput = document.getElementById('current_job');
        const ratingSelect = document.getElementById('rating');
        const contentInput = document.getElementById('content');
        const companyInput = document.getElementById('company');
        const locationInput = document.getElementById('location');
        
        // Avatar preview
        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewAvatar.src = e.target.result;
                    avatarPreview.style.display = 'block';
                    updateTestimonialPreview();
                };
                reader.readAsDataURL(file);
            } else {
                avatarPreview.style.display = 'none';
                updateTestimonialPreview();
            }
        });
        
        // Live preview update
        nameInput.addEventListener('input', updateTestimonialPreview);
        jobInput.addEventListener('input', updateTestimonialPreview);
        ratingSelect.addEventListener('change', updateTestimonialPreview);
        contentInput.addEventListener('input', updateTestimonialPreview);
        companyInput.addEventListener('input', updateTestimonialPreview);
        locationInput.addEventListener('input', updateTestimonialPreview);
        
        function updateTestimonialPreview() {
            const name = nameInput.value || 'Tên học viên';
            const job = jobInput.value || 'Công việc';
            const rating = parseInt(ratingSelect.value) || 0;
            const content = contentInput.value || 'Nội dung nhận xét sẽ hiển thị ở đây...';
            const company = companyInput.value;
            const location = locationInput.value;
            const avatarSrc = previewAvatar.src;
            
            // Update name
            document.getElementById('previewName').textContent = name;
            
            // Update job
            document.getElementById('previewJob').textContent = job;
            
            // Update rating
            const ratingContainer = document.getElementById('previewRating');
            let ratingHtml = '';
            for (let i = 1; i <= 5; i++) {
                if (i <= rating) {
                    ratingHtml += '<i class="fas fa-star text-warning"></i>';
                } else {
                    ratingHtml += '<i class="far fa-star text-muted"></i>';
                }
            }
            ratingContainer.innerHTML = ratingHtml;
            
            // Update content
            document.getElementById('previewContent').textContent = `"${content}"`;
            
            // Update company
            document.getElementById('previewCompany').textContent = company;
            
            // Update location
            document.getElementById('previewLocation').textContent = location;
            
            // Update avatar
            const avatarContainer = document.getElementById('previewAvatarContainer');
            if (avatarSrc && avatarSrc !== window.location.href) {
                avatarContainer.innerHTML = `<img src="${avatarSrc}" alt="Avatar" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">`;
            } else {
                avatarContainer.innerHTML = '<i class="fas fa-user fa-2x text-muted"></i>';
            }
        }
        
        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const name = nameInput.value.trim();
            const job = jobInput.value.trim();
            const program = document.getElementById('program').value.trim();
            const content = contentInput.value.trim();
            const rating = ratingSelect.value;
            
            if (!name || !job || !program || !content || !rating) {
                e.preventDefault();
                showAlert('error', 'Vui lòng điền đầy đủ các trường bắt buộc');
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