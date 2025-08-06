@extends('admin.layouts.app')

@section('title', 'Chi tiết khóa học')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Chi tiết khóa học</h1>
        <p class="text-muted">Thông tin chi tiết về khóa học: {{ $course->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i>Chỉnh sửa
        </a>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
    </div>
</div>

<div class="row">
    <!-- Course Information -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-graduation-cap me-2"></i>Thông tin khóa học
                </h5>
            </div>
            <div class="card-body">
                <!-- Course Header -->
                <div class="d-flex align-items-center mb-4 p-3 bg-light rounded">
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" 
                             alt="{{ $course->name }}" 
                             class="rounded me-3" 
                             style="width: 80px; height: 80px; object-fit: cover;">
                    @else
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center me-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-graduation-cap fa-2x text-white"></i>
                        </div>
                    @endif
                    <div>
                        <h3 class="mb-1">{{ $course->name }}</h3>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <span class="badge bg-primary">{{ $course->category }}</span>
                            @if($course->level)
                                <span class="badge bg-secondary">{{ $course->level }}</span>
                            @endif
                            @if($course->is_active)
                                <span class="badge bg-success">Hoạt động</span>
                            @else
                                <span class="badge bg-danger">Không hoạt động</span>
                            @endif
                        </div>
                        @if($course->short_description)
                            <p class="text-muted mb-0">{{ $course->short_description }}</p>
                        @endif
                    </div>
                </div>

                <!-- Course Details -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6 class="text-muted mb-1">Slug</h6>
                            <code>{{ $course->slug }}</code>
                        </div>
                        
                        @if($course->duration_hours)
                            <div class="mb-3">
                                <h6 class="text-muted mb-1">Thời lượng</h6>
                                <div class="fw-bold">{{ $course->duration_hours }} giờ</div>
                            </div>
                        @endif
                        
                        @if($course->target_score)
                            <div class="mb-3">
                                <h6 class="text-muted mb-1">Mục tiêu điểm số</h6>
                                <div class="fw-bold">{{ $course->target_score }}</div>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h6 class="text-muted mb-1">Giá</h6>
                            @if($course->price)
                                <div class="fw-bold text-success fs-5">{{ number_format($course->price, 0, ',', '.') }}đ</div>
                            @else
                                <div class="fw-bold text-muted">Liên hệ</div>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="text-muted mb-1">Thứ tự sắp xếp</h6>
                            <span class="badge bg-light text-dark">{{ $course->sort_order }}</span>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="text-muted mb-1">Ngày tạo</h6>
                            <div class="fw-bold">{{ $course->created_at->format('d/m/Y H:i') }}</div>
                            <small class="text-muted">{{ $course->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
                
                @if($course->description)
                    <div class="mt-4">
                        <h6 class="text-muted mb-2">Mô tả chi tiết</h6>
                        <div class="bg-light p-3 rounded border-start border-primary border-4">
                            {!! nl2br(e($course->description)) !!}
                        </div>
                    </div>
                @endif
                
                @if($course->features && count($course->features) > 0)
                    <div class="mt-4">
                        <h6 class="text-muted mb-2">Tính năng khóa học</h6>
                        <div class="row">
                            @foreach($course->features as $feature)
                                <div class="col-md-6 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span>{{ $feature }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Actions Sidebar -->
    <div class="col-lg-4">
        <!-- Quick Actions -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-bolt me-2"></i>Thao tác nhanh
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Chỉnh sửa khóa học
                    </a>
                    
                    @if($course->is_active)
                        <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_active" value="0">
                            <input type="hidden" name="name" value="{{ $course->name }}">
                            <input type="hidden" name="category" value="{{ $course->category }}">
                            <input type="hidden" name="description" value="{{ $course->description }}">
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fas fa-pause me-2"></i>Vô hiệu hóa
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_active" value="1">
                            <input type="hidden" name="name" value="{{ $course->name }}">
                            <input type="hidden" name="category" value="{{ $course->category }}">
                            <input type="hidden" name="description" value="{{ $course->description }}">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-play me-2"></i>Kích hoạt
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <!-- Course Stats -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-chart-bar me-2"></i>Thống kê
                </h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <div class="border-end">
                            <h4 class="mb-1 text-primary">{{ $course->id }}</h4>
                            <small class="text-muted">ID Khóa học</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="mb-1 text-success">{{ $course->sort_order }}</h4>
                        <small class="text-muted">Thứ tự</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Timeline -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-history me-2"></i>Lịch sử
                </h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-primary"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">Khóa học được tạo</h6>
                            <p class="mb-0 text-muted small">
                                {{ $course->created_at->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>
                    
                    @if($course->updated_at != $course->created_at)
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Cập nhật gần nhất</h6>
                                <p class="mb-0 text-muted small">
                                    {{ $course->updated_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Danger Zone -->
<div class="card border-danger mt-4">
    <div class="card-header bg-danger text-white">
        <h5 class="card-title mb-0">
            <i class="fas fa-exclamation-triangle me-2"></i>Vùng nguy hiểm
        </h5>
    </div>
    <div class="card-body">
        <p class="text-muted">Xóa khóa học này sẽ không thể hoàn tác. Tất cả dữ liệu liên quan sẽ bị mất vĩnh viễn.</p>
        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" 
                    data-delete="Khóa học {{ $course->name }}"
                    data-delete-message="Bạn có chắc chắn muốn xóa khóa học này? Hành động này không thể hoàn tác!">
                <i class="fas fa-trash me-2"></i>Xóa khóa học
            </button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.timeline-marker {
    position: absolute;
    left: -22px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px #e9ecef;
}

.timeline-content {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 3px solid #dee2e6;
}

.timeline-content h6 {
    color: #495057;
    margin-bottom: 5px;
}

.timeline-content p {
    margin-bottom: 0;
}
</style>
@endpush