@extends('admin.layouts.app')

@section('title', 'Thêm Lịch Khai Giảng')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Thêm Lịch Khai Giảng</h1>
        <p class="text-muted">Tạo lịch khai giảng mới cho khóa học</p>
    </div>
    <div>
        <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
    </div>
</div>

<form action="{{ route('admin.schedules.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <!-- Main Information -->
        <div class="col-lg-8">
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
                                <label for="title" class="form-label">Tên khóa học <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="level" class="form-label">Trình độ <span class="text-danger">*</span></label>
                                <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                                    <option value="">Chọn trình độ</option>
                                    @foreach(\App\Models\Schedule::LEVELS as $key => $value)
                                        <option value="{{ $key }}" {{ old('level') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả khóa học</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Ngày khai giảng <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                       id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="end_date" class="form-label">Ngày kết thúc</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                                       id="end_date" name="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="start_time" class="form-label">Giờ bắt đầu <span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror" 
                                       id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                                @error('start_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="end_time" class="form-label">Giờ kết thúc <span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('end_time') is-invalid @enderror" 
                                       id="end_time" name="end_time" value="{{ old('end_time') }}" required>
                                @error('end_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="duration_months" class="form-label">Thời lượng (tháng) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('duration_months') is-invalid @enderror" 
                                       id="duration_months" name="duration_months" value="{{ old('duration_months') }}" min="1" required>
                                @error('duration_months')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lịch học <span class="text-danger">*</span></label>
                        <div class="row">
                            @foreach(\App\Models\Schedule::DAYS as $key => $value)
                                <div class="col-md-3 col-6">
                                    <div class="form-check">
                                        <input class="form-check-input @error('schedule_days') is-invalid @enderror" 
                                               type="checkbox" name="schedule_days[]" value="{{ $key }}" 
                                               id="day_{{ $key }}" {{ in_array($key, old('schedule_days', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="day_{{ $key }}">
                                            {{ $value }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('schedule_days')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Teacher Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chalkboard-teacher me-2"></i>Thông tin giảng viên
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="teacher_name" class="form-label">Tên giảng viên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('teacher_name') is-invalid @enderror" 
                                       id="teacher_name" name="teacher_name" value="{{ old('teacher_name') }}" required>
                                @error('teacher_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="teacher_title" class="form-label">Chức danh</label>
                                <input type="text" class="form-control @error('teacher_title') is-invalid @enderror" 
                                       id="teacher_title" name="teacher_title" value="{{ old('teacher_title') }}" 
                                       placeholder="VD: Giảng viên bản ngữ Đức">
                                @error('teacher_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="teacher_avatar" class="form-label">Ảnh đại diện giảng viên</label>
                        <input type="file" class="form-control @error('teacher_avatar') is-invalid @enderror" 
                               id="teacher_avatar" name="teacher_avatar" accept="image/*">
                        @error('teacher_avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Chấp nhận file: JPG, PNG, GIF. Kích thước tối đa: 2MB</div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i>Thông tin bổ sung
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="location" class="form-label">Địa điểm học</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" 
                               id="location" name="location" value="{{ old('location') }}" 
                               placeholder="VD: Trung tâm Thanh Cúc - 123 Đường ABC">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="certificate" class="form-label">Chứng chỉ</label>
                        <input type="text" class="form-control @error('certificate') is-invalid @enderror" 
                               id="certificate" name="certificate" value="{{ old('certificate') }}" 
                               placeholder="VD: Chứng chỉ Goethe A1">
                        @error('certificate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title (SEO)</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                                       id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug (URL)</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                       id="slug" name="slug" value="{{ old('slug') }}" 
                                       placeholder="Để trống để tự động tạo">
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description (SEO)</label>
                        <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                                  id="meta_description" name="meta_description" rows="3">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Publish Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cog me-2"></i>Cài đặt xuất bản
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            @foreach(\App\Models\Schedule::STATUSES as $key => $value)
                                <option value="{{ $key }}" {{ old('status', 'draft') == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="course_type" class="form-label">Loại khóa học <span class="text-danger">*</span></label>
                        <select class="form-select @error('course_type') is-invalid @enderror" id="course_type" name="course_type" required>
                            @foreach(\App\Models\Schedule::TYPES as $key => $value)
                                <option value="{{ $key }}" {{ old('course_type', 'regular') == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('course_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="registration_deadline" class="form-label">Hạn đăng ký</label>
                        <input type="date" class="form-control @error('registration_deadline') is-invalid @enderror" 
                               id="registration_deadline" name="registration_deadline" value="{{ old('registration_deadline') }}">
                        @error('registration_deadline')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Thứ tự sắp xếp</label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" 
                               {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            Khóa học nổi bật
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular" 
                               {{ old('is_popular') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_popular">
                            Khóa học phổ biến
                        </label>
                    </div>
                </div>
            </div>

            <!-- Students & Pricing -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-users me-2"></i>Học viên & Học phí
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="max_students" class="form-label">Sĩ số tối đa <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('max_students') is-invalid @enderror" 
                                       id="max_students" name="max_students" value="{{ old('max_students') }}" min="1" required>
                                @error('max_students')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="current_students" class="form-label">Đã đăng ký</label>
                                <input type="number" class="form-control @error('current_students') is-invalid @enderror" 
                                       id="current_students" name="current_students" value="{{ old('current_students', 0) }}" min="0">
                                @error('current_students')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Học phí (VNĐ) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                               id="price" name="price" value="{{ old('price') }}" min="0" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="original_price" class="form-label">Giá gốc (VNĐ)</label>
                        <input type="number" class="form-control @error('original_price') is-invalid @enderror" 
                               id="original_price" name="original_price" value="{{ old('original_price') }}" min="0">
                        @error('original_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Để trống nếu không có giảm giá</div>
                    </div>

                    <div class="mb-3">
                        <label for="discount_percentage" class="form-label">Phần trăm giảm giá (%)</label>
                        <input type="number" class="form-control @error('discount_percentage') is-invalid @enderror" 
                               id="discount_percentage" name="discount_percentage" value="{{ old('discount_percentage', 0) }}" 
                               min="0" max="100" required>
                        @error('discount_percentage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Nhập 0 nếu không có giảm giá</div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Lưu Lịch Khai Giảng
                        </button>
                        <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">
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
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug from title
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    
    titleInput.addEventListener('input', function() {
        if (!slugInput.value || slugInput.dataset.manual !== 'true') {
            slugInput.value = generateSlug(this.value);
        }
    });
    
    slugInput.addEventListener('input', function() {
        this.dataset.manual = 'true';
    });
    
    function generateSlug(text) {
        return text
            .toLowerCase()
            .replace(/[àáạảãâầấậẩẫăằắặẳẵ]/g, 'a')
            .replace(/[èéẹẻẽêềếệểễ]/g, 'e')
            .replace(/[ìíịỉĩ]/g, 'i')
            .replace(/[òóọỏõôồốộổỗơờớợởỡ]/g, 'o')
            .replace(/[ùúụủũưừứựửữ]/g, 'u')
            .replace(/[ỳýỵỷỹ]/g, 'y')
            .replace(/đ/g, 'd')
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
    }
    
    // Auto-calculate discount percentage
    const priceInput = document.getElementById('price');
    const originalPriceInput = document.getElementById('original_price');
    const discountInput = document.getElementById('discount_percentage');
    
    function calculateDiscount() {
        const price = parseFloat(priceInput.value) || 0;
        const originalPrice = parseFloat(originalPriceInput.value) || 0;
        
        if (originalPrice > 0 && price > 0 && originalPrice > price) {
            const discount = Math.round(((originalPrice - price) / originalPrice) * 100);
            if (!discountInput.value || discountInput.dataset.manual !== 'true') {
                discountInput.value = discount;
            }
        }
    }
    
    priceInput.addEventListener('input', calculateDiscount);
    originalPriceInput.addEventListener('input', calculateDiscount);
    
    discountInput.addEventListener('input', function() {
        this.dataset.manual = 'true';
    });
    
    // Auto-calculate end date based on start date and duration
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const durationInput = document.getElementById('duration_months');
    
    function calculateEndDate() {
        const startDate = new Date(startDateInput.value);
        const duration = parseInt(durationInput.value) || 0;
        
        if (startDate && duration > 0) {
            const endDate = new Date(startDate);
            endDate.setMonth(endDate.getMonth() + duration);
            
            if (!endDateInput.value || endDateInput.dataset.manual !== 'true') {
                endDateInput.value = endDate.toISOString().split('T')[0];
            }
        }
    }
    
    startDateInput.addEventListener('change', calculateEndDate);
    durationInput.addEventListener('input', calculateEndDate);
    
    endDateInput.addEventListener('input', function() {
        this.dataset.manual = 'true';
    });
});
</script>
@endpush