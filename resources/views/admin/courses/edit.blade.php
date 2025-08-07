@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa khóa học')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa khóa học</h1>
        <p class="text-muted">Cập nhật thông tin khóa học: {{ $course->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-info me-2">
            <i class="fas fa-eye me-2"></i>Xem chi tiết
        </a>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
    </div>
</div>

<form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Basic Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>Thông tin cơ bản
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên khóa học <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $course->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="category" class="form-label">Danh mục <span class="text-danger">*</span></label>
                                <select class="form-select @error('category') is-invalid @enderror" 
                                        id="category" name="category" required>
                                    <option value="">Chọn danh mục</option>
                                    @foreach($categories as $value => $label)
                                        <option value="{{ $value }}" {{ old('category', $course->category) === $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="short_description" class="form-label">Mô tả ngắn</label>
                        <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                  id="short_description" name="short_description" rows="2" 
                                  placeholder="Mô tả ngắn gọn về khóa học">{{ old('short_description', $course->short_description) }}</textarea>
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả chi tiết <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="6" required 
                                  placeholder="Mô tả chi tiết về khóa học, nội dung, mục tiêu...">{{ old('description', $course->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Course Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cogs me-2"></i>Chi tiết khóa học
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="level" class="form-label">Trình độ</label>
                                <select class="form-select @error('level') is-invalid @enderror" 
                                        id="level" name="level">
                                    <option value="">Chọn trình độ</option>
                                    @foreach($levels as $value => $label)
                                        <option value="{{ $value }}" {{ old('level', $course->level) === $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="duration_hours" class="form-label">Thời lượng (giờ)</label>
                                <input type="number" class="form-control @error('duration_hours') is-invalid @enderror" 
                                       id="duration_hours" name="duration_hours" value="{{ old('duration_hours', $course->duration_hours) }}" 
                                       min="1" placeholder="VD: 60">
                                @error('duration_hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="price" class="form-label">Giá (VNĐ)</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price', $course->price) }}" 
                                       min="0" step="1000" placeholder="VD: 2000000">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Để trống nếu giá "Liên hệ"</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="target_score" class="form-label">Mục tiêu điểm số</label>
                        <input type="text" class="form-control @error('target_score') is-invalid @enderror" 
                               id="target_score" name="target_score" value="{{ old('target_score', $course->target_score) }}" 
                               placeholder="VD: 500-800+, 4.5-5.5+, B1-B2">
                        @error('target_score')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Course Features -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-star me-2"></i>Tính năng khóa học
                    </h5>
                </div>
                <div class="card-body">
                    <div id="features-container">
                        @if(old('features') || $course->features)
                            @foreach(old('features', $course->features ?? []) as $index => $feature)
                                <div class="feature-item mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="features[]" 
                                               placeholder="VD: Học 1-1 với giáo viên bản ngữ" value="{{ $feature }}">
                                        <button type="button" class="btn btn-outline-danger remove-feature" {{ $loop->first && $loop->count === 1 ? 'disabled' : '' }}>
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="feature-item mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="features[]" 
                                           placeholder="VD: Học 1-1 với giáo viên bản ngữ">
                                    <button type="button" class="btn btn-outline-danger remove-feature" disabled>
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm" id="add-feature">
                        <i class="fas fa-plus me-1"></i>Thêm tính năng
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Current Image -->
            @if($course->image)
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-image me-2"></i>Hình ảnh hiện tại
                        </h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $course->image) }}" 
                             alt="{{ $course->name }}" 
                             class="img-fluid rounded" 
                             style="max-height: 200px;">
                    </div>
                </div>
            @endif

            <!-- Image Upload -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-upload me-2"></i>{{ $course->image ? 'Thay đổi hình ảnh' : 'Thêm hình ảnh' }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh khóa học</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Định dạng: JPG, PNG, GIF, SVG. Tối đa 2MB.</div>
                    </div>
                    
                    <div id="image-preview" class="text-center" style="display: none;">
                        <img id="preview-img" src="" alt="Preview" class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cog me-2"></i>Cài đặt
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Thứ tự sắp xếp</label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" name="sort_order" value="{{ old('sort_order', $course->sort_order) }}" 
                               min="0" placeholder="0">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Số nhỏ hơn sẽ hiển thị trước</div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                               {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Kích hoạt khóa học
                        </label>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Cập nhật khóa học
                        </button>
                        <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-outline-info">
                            <i class="fas fa-eye me-2"></i>Xem chi tiết
                        </a>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Hủy bỏ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('image-preview').style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('image-preview').style.display = 'none';
        }
    });

    // Features management
    let featureIndex = {{ count(old('features', is_array($course->features ?? []) ? $course->features : [])) }};

    document.getElementById('add-feature').addEventListener('click', function() {
        const container = document.getElementById('features-container');
        const newFeature = document.createElement('div');
        newFeature.className = 'feature-item mb-3';
        newFeature.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="features[]" 
                       placeholder="VD: Học 1-1 với giáo viên bản ngữ">
                <button type="button" class="btn btn-outline-danger remove-feature">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        container.appendChild(newFeature);
        featureIndex++;
        updateRemoveButtons();
    });

    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-feature')) {
            e.target.closest('.feature-item').remove();
            updateRemoveButtons();
        }
    });

    function updateRemoveButtons() {
        const features = document.querySelectorAll('.feature-item');
        features.forEach((feature, index) => {
            const removeBtn = feature.querySelector('.remove-feature');
            removeBtn.disabled = features.length === 1;
        });
    }

    // Initialize remove buttons state
    updateRemoveButtons();
</script>
@endpush