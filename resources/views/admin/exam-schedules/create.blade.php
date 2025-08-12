@extends('admin.layouts.app')

@section('title', 'Thêm lịch thi mới')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-plus me-2"></i>
            Thêm lịch thi mới
        </h1>
        <p class="text-muted mb-0">Tạo lịch thi mới cho các chứng chỉ tiếng Đức</p>
    </div>
    <div>
        <a href="{{ route('admin.exam-schedules.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>
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
                        <i class="fas fa-calendar-plus me-2"></i>
                        Thông tin lịch thi
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.exam-schedules.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="exam_type" class="form-label">Loại thi <span class="text-danger">*</span></label>
                                <select class="form-select @error('exam_type') is-invalid @enderror" id="exam_type" name="exam_type" required>
                                    <option value="">Chọn loại thi</option>
                                    <option value="Goethe" {{ old('exam_type') == 'Goethe' ? 'selected' : '' }}>Goethe</option>
                                    <option value="TestDaF" {{ old('exam_type') == 'TestDaF' ? 'selected' : '' }}>TestDaF</option>
                                    <option value="Telc" {{ old('exam_type') == 'Telc' ? 'selected' : '' }}>Telc</option>
                                    <option value="DSH" {{ old('exam_type') == 'DSH' ? 'selected' : '' }}>DSH</option>
                                    <option value="ÖSD" {{ old('exam_type') == 'ÖSD' ? 'selected' : '' }}>ÖSD</option>
                                </select>
                                @error('exam_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="level" class="form-label">Trình độ <span class="text-danger">*</span></label>
                                <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                                    <option value="">Chọn trình độ</option>
                                    <option value="A1" {{ old('level') == 'A1' ? 'selected' : '' }}>A1</option>
                                    <option value="A2" {{ old('level') == 'A2' ? 'selected' : '' }}>A2</option>
                                    <option value="B1" {{ old('level') == 'B1' ? 'selected' : '' }}>B1</option>
                                    <option value="B2" {{ old('level') == 'B2' ? 'selected' : '' }}>B2</option>
                                    <option value="C1" {{ old('level') == 'C1' ? 'selected' : '' }}>C1</option>
                                    <option value="C2" {{ old('level') == 'C2' ? 'selected' : '' }}>C2</option>
                                    <option value="B2-C1" {{ old('level') == 'B2-C1' ? 'selected' : '' }}>B2-C1 (TestDaF)</option>
                                </select>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="exam_period" class="form-label">Kỳ thi</label>
                                <input type="text" class="form-control @error('exam_period') is-invalid @enderror" 
                                       id="exam_period" name="exam_period" value="{{ old('exam_period') }}" 
                                       placeholder="VD: 1/2025, 2/2025">
                                @error('exam_period')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="exam_date" class="form-label">Ngày thi <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('exam_date') is-invalid @enderror" 
                                       id="exam_date" name="exam_date" value="{{ old('exam_date') }}" required>
                                @error('exam_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="exam_time" class="form-label">Giờ thi</label>
                                <input type="time" class="form-control @error('exam_time') is-invalid @enderror" 
                                       id="exam_time" name="exam_time" value="{{ old('exam_time') }}">
                                @error('exam_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="registration_deadline" class="form-label">Hạn đăng ký <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('registration_deadline') is-invalid @enderror" 
                                       id="registration_deadline" name="registration_deadline" value="{{ old('registration_deadline') }}" required>
                                @error('registration_deadline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fee" class="form-label">Lệ phí (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('fee') is-invalid @enderror" 
                                       id="fee" name="fee" value="{{ old('fee') }}" min="0" step="1000" required>
                                @error('fee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Không hoạt động</option>
                                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Đã hoàn thành</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="max_participants" class="form-label">Số lượng tối đa</label>
                                <input type="number" class="form-control @error('max_participants') is-invalid @enderror" 
                                       id="max_participants" name="max_participants" value="{{ old('max_participants') }}" 
                                       min="1" placeholder="Để trống nếu không giới hạn">
                                @error('max_participants')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="current_participants" class="form-label">Số lượng hiện tại</label>
                                <input type="number" class="form-control @error('current_participants') is-invalid @enderror" 
                                       id="current_participants" name="current_participants" value="{{ old('current_participants', 0) }}" 
                                       min="0">
                                @error('current_participants')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Địa điểm thi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                   id="location" name="location" value="{{ old('location') }}" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả thêm</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" 
                                      placeholder="Mô tả chi tiết về kỳ thi, yêu cầu, lưu ý...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="sort_order" class="form-label">Thứ tự sắp xếp</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" 
                                           {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Đánh dấu nổi bật
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Tạo lịch thi
                            </button>
                            <a href="{{ route('admin.exam-schedules.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>
                                Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Hướng dẫn
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>Ngày thi:</strong> Phải sau ngày hôm nay
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>Hạn đăng ký:</strong> Phải trước ngày thi
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>Lệ phí:</strong> Nhập số tiền bằng VNĐ
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>Số lượng:</strong> Để trống nếu không giới hạn
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>Nổi bật:</strong> Hiển thị ưu tiên trên website
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        Gợi ý
                    </h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-2">
                        <strong>Goethe:</strong> A1, A2, B1, B2, C1, C2
                    </p>
                    <p class="small text-muted mb-2">
                        <strong>TestDaF:</strong> B2-C1 (không có trình độ riêng)
                    </p>
                    <p class="small text-muted mb-2">
                        <strong>Telc:</strong> A1, A2, B1, B2, C1, C2
                    </p>
                    <p class="small text-muted mb-0">
                        <strong>Kỳ thi:</strong> 1/2025, 2/2025, 3/2025...
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tự động set hạn đăng ký = ngày thi - 30 ngày
    const examDateInput = document.getElementById('exam_date');
    const deadlineInput = document.getElementById('registration_deadline');
    
    examDateInput.addEventListener('change', function() {
        if (this.value) {
            const examDate = new Date(this.value);
            const deadline = new Date(examDate);
            deadline.setDate(deadline.getDate() - 30);
            
            const deadlineStr = deadline.toISOString().split('T')[0];
            deadlineInput.value = deadlineStr;
        }
    });

    // Validate ngày thi phải sau hôm nay
    examDateInput.addEventListener('change', function() {
        const today = new Date().toISOString().split('T')[0];
        if (this.value <= today) {
            alert('Ngày thi phải sau ngày hôm nay!');
            this.value = '';
        }
    });

    // Validate hạn đăng ký phải trước ngày thi
    deadlineInput.addEventListener('change', function() {
        const examDate = examDateInput.value;
        if (examDate && this.value >= examDate) {
            alert('Hạn đăng ký phải trước ngày thi!');
            this.value = '';
        }
    });
});
</script>
@endpush
