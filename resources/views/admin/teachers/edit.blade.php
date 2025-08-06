@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa giảng viên')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa giảng viên</h1>
        <p class="text-muted">Cập nhật thông tin giảng viên: {{ $teacher->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.teachers.show', $teacher) }}" class="btn btn-info me-2">
            <i class="fas fa-eye me-2"></i>Xem chi tiết
        </a>
        <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Thông tin giảng viên</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.teachers.update', $teacher) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên giảng viên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $teacher->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="specialization" class="form-label">Chuyên môn <span class="text-danger">*</span></label>
                                <select class="form-select @error('specialization') is-invalid @enderror" 
                                        id="specialization" name="specialization" required>
                                    <option value="">Chọn chuyên môn</option>
                                    @foreach($specializations as $key => $value)
                                        <option value="{{ $key }}" {{ old('specialization', $teacher->specialization) == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('specialization')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="certification" class="form-label">Chứng chỉ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('certification') is-invalid @enderror" 
                                       id="certification" name="certification" value="{{ old('certification', $teacher->certification) }}" 
                                       placeholder="VD: Goethe B2, TestDaF 4, DSH 2..." required>
                                @error('certification')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="experience_years" class="form-label">Số năm kinh nghiệm</label>
                                <input type="number" class="form-control @error('experience_years') is-invalid @enderror" 
                                       id="experience_years" name="experience_years" value="{{ old('experience_years', $teacher->experience_years) }}" 
                                       min="0" max="50">
                                @error('experience_years')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Tiểu sử</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" 
                                  id="bio" name="bio" rows="4" 
                                  placeholder="Mô tả về kinh nghiệm, phong cách giảng dạy...">{{ old('bio', $teacher->bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="avatar" class="form-label">Ảnh đại diện</label>
                        
                        @if($teacher->avatar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $teacher->avatar) }}" 
                                     alt="{{ $teacher->name }}" 
                                     class="img-thumbnail" 
                                     style="max-width: 200px;">
                                <div class="form-text">Ảnh hiện tại</div>
                            </div>
                        @endif
                        
                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" 
                               id="avatar" name="avatar" accept="image/*">
                        @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Chấp nhận: JPG, PNG, GIF. Kích thước tối đa: 2MB. Để trống nếu không muốn thay đổi.</div>
                        
                        <!-- Image preview -->
                        <div id="image-preview" class="mt-2" style="display: none;">
                            <img id="preview-img" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    </div>

                    <!-- Achievements -->
                    <div class="mb-3">
                        <label class="form-label">Thành tích nổi bật</label>
                        <div id="achievements-container">
                            @php
                                $achievements = old('achievements', is_array($teacher->achievements ?? []) ? $teacher->achievements : []);
                            @endphp
                            @if(count($achievements) > 0)
                                @foreach($achievements as $index => $achievement)
                                    @if($achievement) {{-- Only show non-empty achievements --}}
                                        <div class="achievement-item mb-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="achievements[]" 
                                                       value="{{ $achievement }}" placeholder="VD: Giải nhất cuộc thi giảng dạy...">
                                                <button type="button" class="btn btn-outline-danger remove-achievement">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            
                            {{-- Always have at least one empty field --}}
                            <div class="achievement-item mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="achievements[]" 
                                           placeholder="VD: Giải nhất cuộc thi giảng dạy...">
                                    <button type="button" class="btn btn-outline-danger remove-achievement">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-achievement" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-plus me-1"></i>Thêm thành tích
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Thứ tự hiển thị</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $teacher->sort_order) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Số nhỏ hơn sẽ hiển thị trước</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Hủy
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Cập nhật giảng viên
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Cài đặt</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                               value="1" {{ old('is_active', $teacher->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Kích hoạt giảng viên
                        </label>
                    </div>
                    <div class="form-text">Giảng viên sẽ hiển thị trên website</div>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                               value="1" {{ old('is_featured', $teacher->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            Giảng viên nổi bật
                        </label>
                    </div>
                    <div class="form-text">Hiển thị ưu tiên trên trang chủ</div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Thông tin</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <strong>Slug:</strong> {{ $teacher->slug }}
                    </li>
                    <li class="mb-2">
                        <strong>Ngày tạo:</strong> {{ $teacher->created_at->format('d/m/Y H:i') }}
                    </li>
                    <li>
                        <strong>Cập nhật:</strong> {{ $teacher->updated_at->format('d/m/Y H:i') }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Thao tác nhanh</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <form method="POST" action="{{ route('admin.teachers.toggle-status', $teacher) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-{{ $teacher->is_active ? 'warning' : 'success' }} w-100">
                            <i class="fas fa-{{ $teacher->is_active ? 'pause' : 'play' }} me-2"></i>
                            {{ $teacher->is_active ? 'Vô hiệu hóa' : 'Kích hoạt' }}
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('admin.teachers.toggle-featured', $teacher) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-{{ $teacher->is_featured ? 'secondary' : 'warning' }} w-100">
                            <i class="fas fa-{{ $teacher->is_featured ? 'star-half-alt' : 'star' }} me-2"></i>
                            {{ $teacher->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Image preview
    document.getElementById('avatar').addEventListener('change', function(e) {
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

    // Achievements management
    let achievementIndex = {{ count(old('achievements', is_array($teacher->achievements ?? []) ? $teacher->achievements : [])) }};

    document.getElementById('add-achievement').addEventListener('click', function() {
        const container = document.getElementById('achievements-container');
        const newAchievement = document.createElement('div');
        newAchievement.className = 'achievement-item mb-2';
        newAchievement.innerHTML = `
            <div class="input-group">
                <input type="text" class="form-control" name="achievements[]" 
                       placeholder="VD: Giải nhất cuộc thi giảng dạy...">
                <button type="button" class="btn btn-outline-danger remove-achievement">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        container.appendChild(newAchievement);
        achievementIndex++;
    });

    // Remove achievement
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-achievement')) {
            const achievementItem = e.target.closest('.achievement-item');
            const container = document.getElementById('achievements-container');
            
            // Keep at least one achievement field
            if (container.children.length > 1) {
                achievementItem.remove();
            } else {
                // Clear the input instead of removing
                achievementItem.querySelector('input').value = '';
            }
        }
    });
</script>
@endpush