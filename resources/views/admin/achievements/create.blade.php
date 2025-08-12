@extends('admin.layouts.app')

@section('title', 'Thêm thành tích')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Thêm thành tích</h1>
        <p class="text-muted">Thêm thành tích mới vào bảng vàng</p>
    </div>
    <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Quay lại
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Thông tin thành tích</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.achievements.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="student_name" class="form-label">Tên học viên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('student_name') is-invalid @enderror" 
                                       id="student_name" name="student_name" value="{{ old('student_name') }}" required>
                                @error('student_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="class_name" class="form-label">Lớp học</label>
                                <input type="text" class="form-control @error('class_name') is-invalid @enderror" 
                                       id="class_name" name="class_name" value="{{ old('class_name') }}" 
                                       placeholder="VD: A1.1, B2.2, C1...">
                                @error('class_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Loại thành tích <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="Thành tích thi cử" readonly>
                                <input type="hidden" name="category" value="exam">
                                <small class="form-text text-muted">Chỉ hiển thị thành tích thi cử</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rank" class="form-label">Hạng <span class="text-danger">*</span></label>
                                <select class="form-select @error('rank') is-invalid @enderror" 
                                        id="rank" name="rank" required>
                                    <option value="">Chọn hạng</option>
                                    <option value="1" {{ old('rank') == '1' ? 'selected' : '' }}>Hạng 1 (Vàng)</option>
                                    <option value="2" {{ old('rank') == '2' ? 'selected' : '' }}>Hạng 2 (Bạc)</option>
                                    <option value="3" {{ old('rank') == '3' ? 'selected' : '' }}>Hạng 3 (Đồng)</option>
                                </select>
                                @error('rank')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="achievement_title" class="form-label">Tiêu đề thành tích <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('achievement_title') is-invalid @enderror" 
                               id="achievement_title" name="achievement_title" value="{{ old('achievement_title') }}" 
                               placeholder="VD: Học viên xuất sắc tháng 12, Đạt chứng chỉ B2..." required>
                        @error('achievement_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="score" class="form-label">Điểm số</label>
                                <input type="number" class="form-control @error('score') is-invalid @enderror" 
                                       id="score" name="score" value="{{ old('score') }}" 
                                       min="0" max="10" step="0.1" placeholder="VD: 9.8">
                                @error('score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Điểm từ 0 đến 10</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="achievement_date" class="form-label">Ngày đạt thành tích <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('achievement_date') is-invalid @enderror" 
                                       id="achievement_date" name="achievement_date" value="{{ old('achievement_date') }}" required>
                                @error('achievement_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="certificate" class="form-label">Chứng chỉ</label>
                                <input type="text" class="form-control @error('certificate') is-invalid @enderror" 
                                       id="certificate" name="certificate" value="{{ old('certificate') }}" 
                                       placeholder="VD: Goethe B2, TestDaF 4...">
                                @error('certificate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="university" class="form-label">Trường đại học</label>
                                <input type="text" class="form-control @error('university') is-invalid @enderror" 
                                       id="university" name="university" value="{{ old('university') }}" 
                                       placeholder="VD: TU München, RWTH Aachen...">
                                @error('university')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Dành cho thành tích du học</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả chi tiết</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" 
                                  placeholder="Mô tả chi tiết về thành tích...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="avatar" class="form-label">Ảnh học viên</label>
                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" 
                               id="avatar" name="avatar" accept="image/*">
                        @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Chấp nhận: JPG, PNG, GIF. Kích thước tối đa: 2MB. Nên có tỷ lệ 1:1 (vuông)</div>
                        
                        <!-- Image preview -->
                        <div id="image-preview" class="mt-2" style="display: none;">
                            <img id="preview-img" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Thứ tự hiển thị</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Số nhỏ hơn sẽ hiển thị trước</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Hủy
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Lưu thành tích
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
                               value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Kích hoạt thành tích
                        </label>
                    </div>
                    <div class="form-text">Thành tích sẽ hiển thị trên website</div>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                               value="1" {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            Thành tích nổi bật
                        </label>
                    </div>
                    <div class="form-text">Hiển thị ưu tiên trên trang chủ</div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Hướng dẫn</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-trophy text-warning me-2"></i>
                        <strong>Hạng 1:</strong> Hiển thị với huy chương vàng
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-medal text-secondary me-2"></i>
                        <strong>Hạng 2:</strong> Hiển thị với huy chương bạc
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-award text-info me-2"></i>
                        <strong>Hạng 3:</strong> Hiển thị với huy chương đồng
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-graduation-cap text-info me-2"></i>
                        <strong>Thành tích thi cử:</strong> Đạt chứng chỉ, điểm cao trong các kỳ thi
                    </li>
                    <li>
                        <i class="fas fa-info-circle text-info me-2"></i>
                        <strong>Lưu ý:</strong> Chỉ hiển thị thành tích thi cử trên website
                    </li>
                </ul>
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

    // Auto-fill achievement title based on category and rank
    document.getElementById('category').addEventListener('change', updateAchievementTitle);
    document.getElementById('rank').addEventListener('change', updateAchievementTitle);

    function updateAchievementTitle() {
        const category = document.getElementById('category').value;
        const rank = document.getElementById('rank').value;
        const titleField = document.getElementById('achievement_title');
        
        if (category && rank && !titleField.value) {
            let title = '';
            const rankText = rank == 1 ? 'Hạng nhất' : (rank == 2 ? 'Hạng nhì' : 'Hạng ba');
            
            switch(category) {
                case 'monthly':
                    title = `Học viên xuất sắc ${rankText} tháng ${new Date().getMonth() + 1}`;
                    break;
                case 'exam':
                    title = `Đạt ${rankText} kỳ thi chứng chỉ`;
                    break;
                case 'scholarship':
                    title = `Du học thành công - ${rankText}`;
                    break;
            }
            
            titleField.value = title;
        }
    }

    // Show/hide fields based on category
    document.getElementById('category').addEventListener('change', function() {
        const category = this.value;
        const universityField = document.getElementById('university').closest('.mb-3');
        const scoreField = document.getElementById('score').closest('.mb-3');
        const certificateField = document.getElementById('certificate').closest('.mb-3');
        
        // Reset visibility
        universityField.style.display = 'block';
        scoreField.style.display = 'block';
        certificateField.style.display = 'block';
        
        if (category === 'scholarship') {
            // For scholarship, university is important
            universityField.style.display = 'block';
        } else if (category === 'exam') {
            // For exam, certificate and score are important
            certificateField.style.display = 'block';
            scoreField.style.display = 'block';
        }
    });
</script>
@endpush