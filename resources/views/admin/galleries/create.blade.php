@extends('admin.layouts.app')

@section('title', 'Thêm Gallery Mới')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thêm Gallery Mới</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
                
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Tiêu đề <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="form-group">
                                    <label for="image">Hình ảnh <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                                               id="image" name="image" accept="image/*" required>
                                        <label class="custom-file-label" for="image">Chọn hình ảnh...</label>
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Định dạng: JPG, PNG, GIF. Kích thước tối đa: 2MB
                                    </small>
                                    
                                    <!-- Image Preview -->
                                    <div id="image-preview" class="mt-3" style="display: none;">
                                        <img id="preview-img" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <!-- Type -->
                                <div class="form-group">
                                    <label for="type">Loại <span class="text-danger">*</span></label>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                        <option value="">Chọn loại</option>
                                        <option value="classroom" {{ old('type') === 'classroom' ? 'selected' : '' }}>Lớp học</option>
                                        <option value="facility" {{ old('type') === 'facility' ? 'selected' : '' }}>Cơ sở vật chất</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Level (for classroom type) -->
                                <div class="form-group" id="level-group" style="display: none;">
                                    <label for="level">Cấp độ</label>
                                    <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                                        <option value="">Chọn cấp độ</option>
                                        <option value="A1" {{ old('level') === 'A1' ? 'selected' : '' }}>A1</option>
                                        <option value="A2" {{ old('level') === 'A2' ? 'selected' : '' }}>A2</option>
                                        <option value="B1" {{ old('level') === 'B1' ? 'selected' : '' }}>B1</option>
                                        <option value="B2" {{ old('level') === 'B2' ? 'selected' : '' }}>B2</option>
                                        <option value="C1" {{ old('level') === 'C1' ? 'selected' : '' }}>C1</option>
                                        <option value="C2" {{ old('level') === 'C2' ? 'selected' : '' }}>C2</option>
                                        <option value="All" {{ old('level') === 'All' ? 'selected' : '' }}>Tất cả cấp độ</option>
                                    </select>
                                    @error('level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Students (for classroom type) -->
                                <div class="form-group" id="students-group" style="display: none;">
                                    <label for="students">Số học viên</label>
                                    <input type="text" class="form-control @error('students') is-invalid @enderror" 
                                           id="students" name="students" value="{{ old('students') }}" 
                                           placeholder="VD: 15-20 học viên">
                                    @error('students')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Sort Order -->
                                <div class="form-group">
                                    <label for="sort_order">Thứ tự sắp xếp</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                           id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Số nhỏ hơn sẽ hiển thị trước</small>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1"
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">Kích hoạt</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Lưu
                        </button>
                        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle file input change
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    const fileLabel = document.querySelector('.custom-file-label');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            fileLabel.textContent = file.name;
            
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            fileLabel.textContent = 'Chọn hình ảnh...';
            imagePreview.style.display = 'none';
        }
    });

    // Handle type change
    const typeSelect = document.getElementById('type');
    const levelGroup = document.getElementById('level-group');
    const studentsGroup = document.getElementById('students-group');

    function toggleClassroomFields() {
        const isClassroom = typeSelect.value === 'classroom';
        levelGroup.style.display = isClassroom ? 'block' : 'none';
        studentsGroup.style.display = isClassroom ? 'block' : 'none';
        
        if (!isClassroom) {
            document.getElementById('level').value = '';
            document.getElementById('students').value = '';
        }
    }

    typeSelect.addEventListener('change', toggleClassroomFields);
    
    // Initialize on page load
    toggleClassroomFields();
});
</script>
@endpush
