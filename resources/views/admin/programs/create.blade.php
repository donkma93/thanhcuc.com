@extends('admin.layouts.app')

@section('title', 'Thêm Chương trình')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-plus me-2"></i>
            Thêm Chương trình Mới
        </h1>
        <p class="text-muted mb-0">Tạo chương trình Ausbildung mới</p>
    </div>
    <div>
        <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary">
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
                        Thông tin Chương trình
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Basic Info -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Tên chương trình <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="VD: Ausbildung IT & Công nghệ"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" 
                                           class="form-control @error('slug') is-invalid @enderror" 
                                           id="slug" 
                                           name="slug" 
                                           value="{{ old('slug') }}" 
                                           placeholder="Tự động tạo từ tên">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Để trống để tự động tạo</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Mô tả ngắn</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                      id="short_description" 
                                      name="short_description" 
                                      rows="2" 
                                      placeholder="Mô tả ngắn gọn về chương trình (tối đa 500 ký tự)">{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Mô tả chi tiết <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Mô tả chi tiết về chương trình, nội dung học, cơ hội nghề nghiệp..."
                                      required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Program Details -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="duration" class="form-label">
                                        Thời gian đào tạo <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('duration') is-invalid @enderror" 
                                           id="duration" 
                                           name="duration" 
                                           value="{{ old('duration') }}" 
                                           placeholder="VD: 3 năm"
                                           required>
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="salary_range" class="form-label">
                                        Mức lương <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('salary_range') is-invalid @enderror" 
                                           id="salary_range" 
                                           name="salary_range" 
                                           value="{{ old('salary_range') }}" 
                                           placeholder="VD: 1.200-1.500€"
                                           required>
                                    @error('salary_range')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="opportunity_level" class="form-label">
                                        Cơ hội việc làm <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('opportunity_level') is-invalid @enderror" 
                                            id="opportunity_level" 
                                            name="opportunity_level" 
                                            required>
                                        <option value="">Chọn mức độ</option>
                                        <option value="Thấp" {{ old('opportunity_level') == 'Thấp' ? 'selected' : '' }}>Thấp</option>
                                        <option value="Trung bình" {{ old('opportunity_level') == 'Trung bình' ? 'selected' : '' }}>Trung bình</option>
                                        <option value="Cao" {{ old('opportunity_level') == 'Cao' ? 'selected' : '' }}>Cao</option>
                                        <option value="Rất cao" {{ old('opportunity_level') == 'Rất cao' ? 'selected' : '' }}>Rất cao</option>
                                    </select>
                                    @error('opportunity_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Requirements -->
                        <div class="mb-3">
                            <label class="form-label">Yêu cầu đầu vào</label>
                            <div id="requirements-container">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="requirements[]" placeholder="VD: Tốt nghiệp THPT">
                                    <button type="button" class="btn btn-outline-danger remove-requirement" style="display: none;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm" id="add-requirement">
                                <i class="fas fa-plus me-1"></i>
                                Thêm yêu cầu
                            </button>
                        </div>
                        
                        <!-- Benefits -->
                        <div class="mb-3">
                            <label class="form-label">Lợi ích của chương trình</label>
                            <div id="benefits-container">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="benefits[]" placeholder="VD: Học phí miễn phí">
                                    <button type="button" class="btn btn-outline-danger remove-benefit" style="display: none;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-success btn-sm" id="add-benefit">
                                <i class="fas fa-plus me-1"></i>
                                Thêm lợi ích
                            </button>
                        </div>
                        
                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh chương trình</label>
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
                                Khuyến nghị: 800x600px
                            </div>
                            
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img id="previewImg" src="" alt="Preview" 
                                     class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                            </div>
                        </div>
                        
                        <!-- Icon & Color -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Icon FontAwesome</label>
                                    <input type="text" 
                                           class="form-control @error('icon') is-invalid @enderror" 
                                           id="icon" 
                                           name="icon" 
                                           value="{{ old('icon') }}" 
                                           placeholder="VD: fas fa-laptop-code">
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        <a href="https://fontawesome.com/icons" target="_blank">Tìm icon tại FontAwesome</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="color" class="form-label">Màu chủ đạo</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('color') is-invalid @enderror" 
                                           id="color" 
                                           name="color" 
                                           value="{{ old('color', '#007bff') }}"
                                           style="width: 60px; height: 40px;">
                                    @error('color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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
                            <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>
                                Hủy
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Lưu Chương trình
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
                    <div id="programPreview">
                        <div class="text-center mb-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                 style="height: 120px;" id="previewIconContainer">
                                <i class="fas fa-graduation-cap fa-3x text-muted"></i>
                            </div>
                        </div>
                        <h6 class="mb-2" id="previewName">Tên chương trình</h6>
                        <p class="text-muted small mb-2" id="previewShortDesc">Mô tả ngắn</p>
                        <div class="row text-center mb-3">
                            <div class="col-4">
                                <small class="text-muted d-block">Thời gian</small>
                                <strong id="previewDuration">-</strong>
                            </div>
                            <div class="col-4">
                                <small class="text-muted d-block">Lương</small>
                                <strong id="previewSalary">-</strong>
                            </div>
                            <div class="col-4">
                                <small class="text-muted d-block">Cơ hội</small>
                                <span class="badge bg-secondary" id="previewOpportunity">-</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tips Card -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        Mẹo tạo chương trình
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Tên chương trình rõ ràng, dễ hiểu
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Mô tả chi tiết về nội dung học
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Yêu cầu đầu vào cụ thể
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Lợi ích hấp dẫn, thực tế
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-check text-success me-2"></i>
                            Sử dụng icon và màu phù hợp
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
        // Auto generate slug
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        
        nameInput.addEventListener('input', function() {
            if (!slugInput.value) {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                slugInput.value = slug;
            }
            updatePreview();
        });
        
        // Dynamic requirements
        document.getElementById('add-requirement').addEventListener('click', function() {
            const container = document.getElementById('requirements-container');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" class="form-control" name="requirements[]" placeholder="Nhập yêu cầu">
                <button type="button" class="btn btn-outline-danger remove-requirement">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(div);
            updateRemoveButtons('requirements');
        });
        
        // Dynamic benefits
        document.getElementById('add-benefit').addEventListener('click', function() {
            const container = document.getElementById('benefits-container');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" class="form-control" name="benefits[]" placeholder="Nhập lợi ích">
                <button type="button" class="btn btn-outline-danger remove-benefit">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(div);
            updateRemoveButtons('benefits');
        });
        
        // Remove buttons
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-requirement')) {
                e.target.closest('.input-group').remove();
                updateRemoveButtons('requirements');
            }
            if (e.target.closest('.remove-benefit')) {
                e.target.closest('.input-group').remove();
                updateRemoveButtons('benefits');
            }
        });
        
        function updateRemoveButtons(type) {
            const container = document.getElementById(`${type}-container`);
            const buttons = container.querySelectorAll(`.remove-${type.slice(0, -1)}`);
            buttons.forEach((btn, index) => {
                btn.style.display = container.children.length > 1 ? 'block' : 'none';
            });
        }
        
        // Image preview
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                    updatePreview();
                };
                reader.readAsDataURL(file);
            }
        });
        
        // Live preview
        ['short_description', 'duration', 'salary_range', 'opportunity_level', 'icon', 'color'].forEach(id => {
            document.getElementById(id).addEventListener('input', updatePreview);
            document.getElementById(id).addEventListener('change', updatePreview);
        });
        
        function updatePreview() {
            const name = nameInput.value || 'Tên chương trình';
            const shortDesc = document.getElementById('short_description').value || 'Mô tả ngắn';
            const duration = document.getElementById('duration').value || '-';
            const salary = document.getElementById('salary_range').value || '-';
            const opportunity = document.getElementById('opportunity_level').value || '-';
            const icon = document.getElementById('icon').value || 'fas fa-graduation-cap';
            const color = document.getElementById('color').value || '#6c757d';
            
            document.getElementById('previewName').textContent = name;
            document.getElementById('previewShortDesc').textContent = shortDesc;
            document.getElementById('previewDuration').textContent = duration;
            document.getElementById('previewSalary').textContent = salary;
            document.getElementById('previewOpportunity').textContent = opportunity;
            
            // Update icon and color
            const iconContainer = document.getElementById('previewIconContainer');
            iconContainer.innerHTML = `<i class="${icon} fa-3x" style="color: ${color};"></i>`;
            iconContainer.style.backgroundColor = color + '20';
            
            // Update opportunity badge color
            const opportunityBadge = document.getElementById('previewOpportunity');
            const colors = {
                'Thấp': 'secondary',
                'Trung bình': 'warning',
                'Cao': 'info',
                'Rất cao': 'danger'
            };
            opportunityBadge.className = `badge bg-${colors[opportunity] || 'secondary'}`;
        }
        
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const required = ['name', 'description', 'duration', 'salary_range', 'opportunity_level'];
            let isValid = true;
            
            required.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                showAlert('error', 'Vui lòng điền đầy đủ các trường bắt buộc');
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
        
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    }
</script>
@endpush