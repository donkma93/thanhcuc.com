@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa Lý do')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-edit me-2"></i>
            Chỉnh sửa Lý do
        </h1>
        <p class="text-muted mb-0">{{ $reason->title }}</p>
    </div>
    <div>
        <a href="{{ route('admin.reasons.index') }}" class="btn btn-outline-secondary">
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
                        Thông tin Lý do
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.reasons.update', $reason) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Tiêu đề <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $reason->title) }}" 
                                   placeholder="VD: Học Phí Miễn Phí"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Mô tả <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Mô tả chi tiết về lý do này..."
                                      required>{{ old('description', $reason->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Hãy viết mô tả hấp dẫn và thuyết phục để thu hút khách hàng
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="icon" class="form-label">Icon FontAwesome</label>
                                    <input type="text" 
                                           class="form-control @error('icon') is-invalid @enderror" 
                                           id="icon" 
                                           name="icon" 
                                           value="{{ old('icon', $reason->icon) }}" 
                                           placeholder="VD: fas fa-graduation-cap">
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
                                    <label for="color" class="form-label">Màu sắc</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('color') is-invalid @enderror" 
                                           id="color" 
                                           name="color" 
                                           value="{{ old('color', $reason->color ?? '#F9D200') }}"
                                           style="width: 60px; height: 40px;">
                                    @error('color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Chọn màu phù hợp với nội dung</div>
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
                                           value="{{ old('sort_order', $reason->sort_order) }}" 
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
                                               {{ old('is_active', $reason->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Hiển thị trên website
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.reasons.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>
                                Hủy
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Cập nhật Lý do
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
                        Hiện tại
                    </h5>
                </div>
                <div class="card-body">
                    <div class="card h-100" style="border-left: 4px solid {{ $reason->color ?? '#6c757d' }};">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="reason-icon" style="color: {{ $reason->color ?? '#6c757d' }};">
                                    @if($reason->icon)
                                        <i class="{{ $reason->icon }} fa-2x"></i>
                                    @else
                                        <i class="fas fa-star fa-2x"></i>
                                    @endif
                                </div>
                            </div>
                            
                            <h6 class="card-title">{{ $reason->title }}</h6>
                            <p class="card-text text-muted small">
                                {{ Str::limit($reason->description, 120) }}
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <span class="badge {{ $reason->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $reason->is_active ? 'Hiển thị' : 'Ẩn' }}
                                    </span>
                                    <span class="badge bg-light text-dark">
                                        #{{ $reason->sort_order }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Live Preview -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-magic me-2"></i>
                        Xem trước thay đổi
                    </h5>
                </div>
                <div class="card-body">
                    <div id="reasonPreview" class="card h-100" style="border-left: 4px solid {{ $reason->color ?? '#F9D200' }};">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="reason-icon" style="color: {{ $reason->color ?? '#F9D200' }};" id="previewIconContainer">
                                    @if($reason->icon)
                                        <i class="{{ $reason->icon }} fa-2x"></i>
                                    @else
                                        <i class="fas fa-star fa-2x"></i>
                                    @endif
                                </div>
                            </div>
                            
                            <h6 class="card-title" id="previewTitle">{{ $reason->title }}</h6>
                            <p class="card-text text-muted small" id="previewDescription">
                                {{ $reason->description }}
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <span class="badge {{ $reason->is_active ? 'bg-success' : 'bg-secondary' }}" id="previewStatus">
                                        {{ $reason->is_active ? 'Hiển thị' : 'Ẩn' }}
                                    </span>
                                    <span class="badge bg-light text-dark" id="previewOrder">
                                        #{{ $reason->sort_order }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Color Suggestions -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-palette me-2"></i>
                        Gợi ý màu sắc
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="color-suggestion" 
                                 style="background-color: #F9D200; height: 40px; border-radius: 8px; cursor: pointer;" 
                                 data-color="#F9D200" 
                                 title="Vàng - Học phí miễn phí"></div>
                        </div>
                        <div class="col-3">
                            <div class="color-suggestion" 
                                 style="background-color: #F57F25; height: 40px; border-radius: 8px; cursor: pointer;" 
                                 data-color="#F57F25" 
                                 title="Cam - Mức lương hấp dẫn"></div>
                        </div>
                        <div class="col-3">
                            <div class="color-suggestion" 
                                 style="background-color: #3EB850; height: 40px; border-radius: 8px; cursor: pointer;" 
                                 data-color="#3EB850" 
                                 title="Xanh lá - Cơ hội định cư"></div>
                        </div>
                        <div class="col-3">
                            <div class="color-suggestion" 
                                 style="background-color: #CADD2D; height: 40px; border-radius: 8px; cursor: pointer;" 
                                 data-color="#CADD2D" 
                                 title="Xanh chanh - Hỗ trợ toàn diện"></div>
                        </div>
                        <div class="col-3">
                            <div class="color-suggestion" 
                                 style="background-color: #015862; height: 40px; border-radius: 8px; cursor: pointer;" 
                                 data-color="#015862" 
                                 title="Xanh đậm - Tỷ lệ thành công cao"></div>
                        </div>
                        <div class="col-3">
                            <div class="color-suggestion" 
                                 style="background-color: #6f42c1; height: 40px; border-radius: 8px; cursor: pointer;" 
                                 data-color="#6f42c1" 
                                 title="Tím - Môi trường làm việc tốt"></div>
                        </div>
                        <div class="col-3">
                            <div class="color-suggestion" 
                                 style="background-color: #dc3545; height: 40px; border-radius: 8px; cursor: pointer;" 
                                 data-color="#dc3545" 
                                 title="Đỏ - Khẩn cấp"></div>
                        </div>
                        <div class="col-3">
                            <div class="color-suggestion" 
                                 style="background-color: #007bff; height: 40px; border-radius: 8px; cursor: pointer;" 
                                 data-color="#007bff" 
                                 title="Xanh dương - Tin cậy"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Icon Suggestions -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-icons me-2"></i>
                        Gợi ý icon
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-2 text-center">
                        <div class="col-3">
                            <div class="icon-suggestion p-2 border rounded" 
                                 data-icon="fas fa-graduation-cap" 
                                 style="cursor: pointer;">
                                <i class="fas fa-graduation-cap fa-lg"></i>
                                <small class="d-block">Học tập</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-suggestion p-2 border rounded" 
                                 data-icon="fas fa-euro-sign" 
                                 style="cursor: pointer;">
                                <i class="fas fa-euro-sign fa-lg"></i>
                                <small class="d-block">Tiền lương</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-suggestion p-2 border rounded" 
                                 data-icon="fas fa-home" 
                                 style="cursor: pointer;">
                                <i class="fas fa-home fa-lg"></i>
                                <small class="d-block">Định cư</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-suggestion p-2 border rounded" 
                                 data-icon="fas fa-hands-helping" 
                                 style="cursor: pointer;">
                                <i class="fas fa-hands-helping fa-lg"></i>
                                <small class="d-block">Hỗ trợ</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-suggestion p-2 border rounded" 
                                 data-icon="fas fa-chart-line" 
                                 style="cursor: pointer;">
                                <i class="fas fa-chart-line fa-lg"></i>
                                <small class="d-block">Thành công</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-suggestion p-2 border rounded" 
                                 data-icon="fas fa-briefcase" 
                                 style="cursor: pointer;">
                                <i class="fas fa-briefcase fa-lg"></i>
                                <small class="d-block">Công việc</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-suggestion p-2 border rounded" 
                                 data-icon="fas fa-star" 
                                 style="cursor: pointer;">
                                <i class="fas fa-star fa-lg"></i>
                                <small class="d-block">Chất lượng</small>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-suggestion p-2 border rounded" 
                                 data-icon="fas fa-shield-alt" 
                                 style="cursor: pointer;">
                                <i class="fas fa-shield-alt fa-lg"></i>
                                <small class="d-block">Bảo đảm</small>
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
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.getElementById('title');
        const descriptionInput = document.getElementById('description');
        const iconInput = document.getElementById('icon');
        const colorInput = document.getElementById('color');
        const sortOrderInput = document.getElementById('sort_order');
        const isActiveInput = document.getElementById('is_active');
        
        // Live preview update
        titleInput.addEventListener('input', updatePreview);
        descriptionInput.addEventListener('input', updatePreview);
        iconInput.addEventListener('input', updatePreview);
        colorInput.addEventListener('change', updatePreview);
        sortOrderInput.addEventListener('input', updatePreview);
        isActiveInput.addEventListener('change', updatePreview);
        
        // Color suggestions
        document.querySelectorAll('.color-suggestion').forEach(suggestion => {
            suggestion.addEventListener('click', function() {
                const color = this.dataset.color;
                colorInput.value = color;
                updatePreview();
            });
        });
        
        // Icon suggestions
        document.querySelectorAll('.icon-suggestion').forEach(suggestion => {
            suggestion.addEventListener('click', function() {
                const icon = this.dataset.icon;
                iconInput.value = icon;
                updatePreview();
            });
        });
        
        function updatePreview() {
            const title = titleInput.value || '{{ $reason->title }}';
            const description = descriptionInput.value || '{{ $reason->description }}';
            const icon = iconInput.value || '{{ $reason->icon ?? "fas fa-star" }}';
            const color = colorInput.value || '{{ $reason->color ?? "#F9D200" }}';
            const sortOrder = sortOrderInput.value || '{{ $reason->sort_order }}';
            const isActive = isActiveInput.checked;
            
            // Update preview content
            document.getElementById('previewTitle').textContent = title;
            document.getElementById('previewDescription').textContent = description;
            
            // Update icon
            const iconContainer = document.getElementById('previewIconContainer');
            iconContainer.innerHTML = `<i class="${icon} fa-2x"></i>`;
            iconContainer.style.color = color;
            
            // Update card border and color
            const previewCard = document.getElementById('reasonPreview');
            previewCard.style.borderLeftColor = color;
            
            // Update status badge
            const statusBadge = document.getElementById('previewStatus');
            statusBadge.className = `badge ${isActive ? 'bg-success' : 'bg-secondary'}`;
            statusBadge.textContent = isActive ? 'Hiển thị' : 'Ẩn';
            
            // Update sort order
            const orderBadge = document.getElementById('previewOrder');
            orderBadge.textContent = `#${sortOrder}`;
        }
        
        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const title = titleInput.value.trim();
            const description = descriptionInput.value.trim();
            
            if (!title || !description) {
                e.preventDefault();
                showAlert('error', 'Vui lòng điền đầy đủ tiêu đề và mô tả');
                return;
            }
            
            if (title.length < 3) {
                e.preventDefault();
                titleInput.focus();
                showAlert('error', 'Tiêu đề phải có ít nhất 3 ký tự');
                return;
            }
            
            if (description.length < 10) {
                e.preventDefault();
                descriptionInput.focus();
                showAlert('error', 'Mô tả phải có ít nhất 10 ký tự');
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
        
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    }
</script>
@endpush