@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa lịch thi')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-edit me-2"></i>
            Chỉnh sửa lịch thi
        </h1>
        <p class="text-muted mb-0">Cập nhật thông tin lịch thi</p>
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
                        <i class="fas fa-calendar-edit me-2"></i>
                        Thông tin lịch thi
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.exam-schedules.update', $examSchedule) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="exam_type" class="form-label">Loại thi <span class="text-danger">*</span></label>
                                <select class="form-select @error('exam_type') is-invalid @enderror" id="exam_type" name="exam_type" required>
                                    <option value="">Chọn loại thi</option>
                                    <option value="Goethe" {{ old('exam_type', $examSchedule->exam_type) == 'Goethe' ? 'selected' : '' }}>Goethe</option>
                                    <option value="TestDaF" {{ old('exam_type', $examSchedule->exam_type) == 'TestDaF' ? 'selected' : '' }}>TestDaF</option>
                                    <option value="Telc" {{ old('exam_type', $examSchedule->exam_type) == 'Telc' ? 'selected' : '' }}>Telc</option>
                                    <option value="DSH" {{ old('exam_type', $examSchedule->exam_type) == 'DSH' ? 'selected' : '' }}>DSH</option>
                                    <option value="ÖSD" {{ old('exam_type', $examSchedule->exam_type) == 'ÖSD' ? 'selected' : '' }}>ÖSD</option>
                                </select>
                                @error('exam_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="level" class="form-label">Trình độ <span class="text-danger">*</span></label>
                                <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                                    <option value="">Chọn trình độ</option>
                                    <option value="A1" {{ old('level', $examSchedule->level) == 'A1' ? 'selected' : '' }}>A1</option>
                                    <option value="A2" {{ old('level', $examSchedule->level) == 'A2' ? 'selected' : '' }}>A2</option>
                                    <option value="B1" {{ old('level', $examSchedule->level) == 'B1' ? 'selected' : '' }}>B1</option>
                                    <option value="B2" {{ old('level', $examSchedule->level) == 'B2' ? 'selected' : '' }}>B2</option>
                                    <option value="C1" {{ old('level', $examSchedule->level) == 'C1' ? 'selected' : '' }}>C1</option>
                                    <option value="C2" {{ old('level', $examSchedule->level) == 'C2' ? 'selected' : '' }}>C2</option>
                                    <option value="B2-C1" {{ old('level', $examSchedule->level) == 'B2-C1' ? 'selected' : '' }}>B2-C1 (TestDaF)</option>
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
                                       id="exam_period" name="exam_period" 
                                       value="{{ old('exam_period', $examSchedule->exam_period) }}" 
                                       placeholder="VD: 1/2025, 2/2025">
                                @error('exam_period')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="exam_date" class="form-label">Ngày thi <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('exam_date') is-invalid @enderror" 
                                       id="exam_date" name="exam_date" 
                                       value="{{ old('exam_date', $examSchedule->exam_date->format('Y-m-d')) }}" required>
                                @error('exam_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="exam_time" class="form-label">Giờ thi</label>
                                <input type="time" class="form-control @error('exam_time') is-invalid @enderror" 
                                       id="exam_time" name="exam_time" 
                                       value="{{ old('exam_time', $examSchedule->exam_time) }}">
                                @error('exam_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="registration_deadline" class="form-label">Hạn đăng ký <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('registration_deadline') is-invalid @enderror" 
                                       id="registration_deadline" name="registration_deadline" 
                                       value="{{ old('registration_deadline', $examSchedule->registration_deadline->format('Y-m-d')) }}" required>
                                @error('registration_deadline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fee" class="form-label">Lệ phí (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('fee') is-invalid @enderror" 
                                       id="fee" name="fee" value="{{ old('fee', $examSchedule->fee) }}" 
                                       min="0" step="1000" required>
                                @error('fee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="active" {{ old('status', $examSchedule->status) == 'active' ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="inactive" {{ old('status', $examSchedule->status) == 'inactive' ? 'selected' : '' }}>Không hoạt động</option>
                                    <option value="completed" {{ old('status', $examSchedule->status) == 'completed' ? 'selected' : '' }}>Đã hoàn thành</option>
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
                                       id="max_participants" name="max_participants" 
                                       value="{{ old('max_participants', $examSchedule->max_participants) }}" 
                                       min="1" placeholder="Để trống nếu không giới hạn">
                                @error('max_participants')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="current_participants" class="form-label">Số lượng hiện tại</label>
                                <input type="number" class="form-control @error('current_participants') is-invalid @enderror" 
                                       id="current_participants" name="current_participants" 
                                       value="{{ old('current_participants', $examSchedule->current_participants) }}" 
                                       min="0">
                                @error('current_participants')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Địa điểm thi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                   id="location" name="location" value="{{ old('location', $examSchedule->location) }}" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả thêm</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" 
                                      placeholder="Mô tả chi tiết về kỳ thi, yêu cầu, lưu ý...">{{ old('description', $examSchedule->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="sort_order" class="form-label">Thứ tự sắp xếp</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" 
                                       value="{{ old('sort_order', $examSchedule->sort_order) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" 
                                           {{ old('is_featured', $examSchedule->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Đánh dấu nổi bật
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Cập nhật
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
                        Thông tin hiện tại
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Loại thi:</strong>
                        <span class="badge bg-primary">{{ $examSchedule->exam_type }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Trình độ:</strong>
                        <span class="badge bg-secondary">{{ $examSchedule->level }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Ngày thi:</strong>
                        <p class="mb-0">{{ $examSchedule->formatted_exam_date }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Hạn đăng ký:</strong>
                        <p class="mb-0">{{ $examSchedule->formatted_registration_deadline }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Lệ phí:</strong>
                        <p class="mb-0 text-primary fw-bold">{{ $examSchedule->formatted_fee }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Trạng thái:</strong>
                        @if($examSchedule->status === 'active')
                            <span class="badge bg-success">Hoạt động</span>
                        @elseif($examSchedule->status === 'inactive')
                            <span class="badge bg-secondary">Không hoạt động</span>
                        @else
                            <span class="badge bg-info">Đã hoàn thành</span>
                        @endif
                    </div>
                    <div class="mb-0">
                        <strong>Nổi bật:</strong>
                        @if($examSchedule->is_featured)
                            <span class="badge bg-warning text-dark">Có</span>
                        @else
                            <span class="badge bg-secondary">Không</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        Hướng dẫn
                    </h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>Ngày thi:</strong> Có thể thay đổi nếu chưa diễn ra
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>Hạn đăng ký:</strong> Phải trước ngày thi
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>Số lượng:</strong> Không được nhỏ hơn số đã đăng ký
                        </li>
                        <li class="mb-0">
                            <i class="fas fa-check text-success me-2"></i>
                            <strong>Trạng thái:</strong> Cập nhật theo tình hình thực tế
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Lưu ý
                    </h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-0">
                        Việc thay đổi thông tin lịch thi có thể ảnh hưởng đến người đăng ký. 
                        Hãy cân nhắc kỹ trước khi cập nhật.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Validate hạn đăng ký phải trước ngày thi
    const examDateInput = document.getElementById('exam_date');
    const deadlineInput = document.getElementById('registration_deadline');
    
    deadlineInput.addEventListener('change', function() {
        const examDate = examDateInput.value;
        if (examDate && this.value >= examDate) {
            alert('Hạn đăng ký phải trước ngày thi!');
            this.value = '';
        }
    });

    // Validate số lượng hiện tại không được lớn hơn số lượng tối đa
    const maxParticipantsInput = document.getElementById('max_participants');
    const currentParticipantsInput = document.getElementById('current_participants');
    
    maxParticipantsInput.addEventListener('change', function() {
        const current = parseInt(currentParticipantsInput.value) || 0;
        const max = parseInt(this.value) || 0;
        if (max > 0 && current > max) {
            alert('Số lượng hiện tại không được lớn hơn số lượng tối đa!');
            currentParticipantsInput.value = max;
        }
    });
});
</script>
@endpush
