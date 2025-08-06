@extends('admin.layouts.app')

@section('title', 'Chi tiết Lịch Khai Giảng')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Chi tiết Lịch Khai Giảng</h1>
        <p class="text-muted">{{ $schedule->title }}</p>
    </div>
    <div>
        <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
        <a href="{{ route('admin.schedules.edit', $schedule) }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Chỉnh sửa
        </a>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fas fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('admin.schedules.duplicate', $schedule) }}">
                    <i class="fas fa-copy me-2"></i>Sao chép
                </a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#" onclick="deleteSchedule({{ $schedule->id }})">
                    <i class="fas fa-trash me-2"></i>Xóa
                </a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <!-- Main Content -->
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
                    <div class="col-md-6">
                        <h6 class="text-muted">Tên khóa học</h6>
                        <p class="fw-bold">{{ $schedule->title }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Trình độ</h6>
                        <p><span class="badge bg-secondary fs-6">{{ $schedule->level_name }}</span></p>
                    </div>
                </div>

                @if($schedule->description)
                    <div class="mb-3">
                        <h6 class="text-muted">Mô tả</h6>
                        <p>{{ $schedule->description }}</p>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-4">
                        <h6 class="text-muted">Ngày khai giảng</h6>
                        <p class="fw-bold text-primary">{{ $schedule->start_date->format('d/m/Y') }}</p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-muted">Ngày kết thúc</h6>
                        <p>{{ $schedule->end_date ? $schedule->end_date->format('d/m/Y') : 'Chưa xác định' }}</p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-muted">Thời lượng</h6>
                        <p>{{ $schedule->duration_months }} tháng</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted">Thời gian học</h6>
                        <p>{{ $schedule->start_time }} - {{ $schedule->end_time }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Lịch học</h6>
                        <p>{{ $schedule->formatted_schedule_days }}</p>
                    </div>
                </div>

                @if($schedule->location)
                    <div class="mb-3">
                        <h6 class="text-muted">Địa điểm học</h6>
                        <p><i class="fas fa-map-marker-alt me-2"></i>{{ $schedule->location }}</p>
                    </div>
                @endif

                @if($schedule->certificate)
                    <div class="mb-3">
                        <h6 class="text-muted">Chứng chỉ</h6>
                        <p><i class="fas fa-certificate me-2"></i>{{ $schedule->certificate }}</p>
                    </div>
                @endif
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
                <div class="d-flex align-items-center">
                    @if($schedule->teacher_avatar)
                        <img src="{{ Storage::url($schedule->teacher_avatar) }}" alt="Avatar" class="rounded-circle me-3" width="80" height="80">
                    @else
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-user fa-2x text-white"></i>
                        </div>
                    @endif
                    <div>
                        <h5 class="mb-1">{{ $schedule->teacher_name }}</h5>
                        @if($schedule->teacher_title)
                            <p class="text-muted mb-0">{{ $schedule->teacher_title }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Information -->
        @if($schedule->meta_title || $schedule->meta_description || $schedule->slug)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-search me-2"></i>Thông tin SEO
                    </h5>
                </div>
                <div class="card-body">
                    @if($schedule->meta_title)
                        <div class="mb-3">
                            <h6 class="text-muted">Meta Title</h6>
                            <p>{{ $schedule->meta_title }}</p>
                        </div>
                    @endif

                    @if($schedule->meta_description)
                        <div class="mb-3">
                            <h6 class="text-muted">Meta Description</h6>
                            <p>{{ $schedule->meta_description }}</p>
                        </div>
                    @endif

                    <div class="mb-3">
                        <h6 class="text-muted">Slug (URL)</h6>
                        <p><code>{{ $schedule->slug }}</code></p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Status & Settings -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-cog me-2"></i>Trạng thái & Cài đặt
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="text-muted">Trạng thái</h6>
                    @switch($schedule->status)
                        @case('published')
                            <span class="badge bg-success fs-6">{{ $schedule->status_name }}</span>
                            @break
                        @case('draft')
                            <span class="badge bg-secondary fs-6">{{ $schedule->status_name }}</span>
                            @break
                        @case('full')
                            <span class="badge bg-warning text-dark fs-6">{{ $schedule->status_name }}</span>
                            @break
                        @case('cancelled')
                            <span class="badge bg-danger fs-6">{{ $schedule->status_name }}</span>
                            @break
                        @case('completed')
                            <span class="badge bg-info fs-6">{{ $schedule->status_name }}</span>
                            @break
                        @default
                            <span class="badge bg-light text-dark fs-6">{{ $schedule->status_name }}</span>
                    @endswitch
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Loại khóa học</h6>
                    <p>{{ $schedule->type_name }}</p>
                </div>

                @if($schedule->registration_deadline)
                    <div class="mb-3">
                        <h6 class="text-muted">Hạn đăng ký</h6>
                        <p class="{{ $schedule->is_registration_open ? 'text-success' : 'text-danger' }}">
                            {{ $schedule->registration_deadline->format('d/m/Y') }}
                            @if(!$schedule->is_registration_open)
                                <br><small>(Đã hết hạn)</small>
                            @endif
                        </p>
                    </div>
                @endif

                <div class="mb-3">
                    <h6 class="text-muted">Đặc điểm</h6>
                    <div>
                        @if($schedule->is_featured)
                            <span class="badge bg-warning text-dark me-1">Nổi bật</span>
                        @endif
                        @if($schedule->is_popular)
                            <span class="badge bg-info text-white me-1">Phổ biến</span>
                        @endif
                        @if($schedule->is_starting_soon)
                            <span class="badge bg-success text-white me-1">Sắp khai giảng</span>
                        @endif
                        @if(!$schedule->is_featured && !$schedule->is_popular && !$schedule->is_starting_soon)
                            <span class="text-muted">Không có</span>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Thứ tự sắp xếp</h6>
                    <p>{{ $schedule->sort_order }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Ngày tạo</h6>
                    <p>{{ $schedule->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Cập nhật lần cuối</h6>
                    <p>{{ $schedule->updated_at->format('d/m/Y H:i') }}</p>
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
                <div class="mb-3">
                    <h6 class="text-muted">Tình trạng đăng ký</h6>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>{{ $schedule->current_students }}/{{ $schedule->max_students }} học viên</span>
                        <span class="badge {{ $schedule->badge_class }}">{{ $schedule->badge_text }}</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar {{ $schedule->badge_class }}" style="width: {{ $schedule->availability_percentage }}%"></div>
                    </div>
                    <small class="text-muted">{{ $schedule->available_spots }} chỗ trống</small>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Học phí</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="h5 text-primary mb-0">{{ $schedule->formatted_price }}</div>
                            @if($schedule->original_price && $schedule->original_price > $schedule->price)
                                <small class="text-muted text-decoration-line-through">{{ $schedule->formatted_original_price }}</small>
                                <span class="badge bg-success ms-1">-{{ $schedule->discount_percentage }}%</span>
                            @endif
                        </div>
                    </div>
                </div>

                @if($schedule->original_price && $schedule->original_price > $schedule->price)
                    <div class="mb-3">
                        <h6 class="text-muted">Tiết kiệm</h6>
                        <p class="text-success fw-bold">{{ number_format($schedule->original_price - $schedule->price, 0, ',', '.') }}₫</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-bolt me-2"></i>Thao tác nhanh
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.schedules.edit', $schedule) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Chỉnh sửa
                    </a>
                    <a href="{{ route('admin.schedules.duplicate', $schedule) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-copy me-2"></i>Sao chép
                    </a>
                    @if($schedule->status === 'draft')
                        <form action="{{ route('admin.schedules.update', $schedule) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="published">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-eye me-2"></i>Xuất bản
                            </button>
                        </form>
                    @elseif($schedule->status === 'published')
                        <form action="{{ route('admin.schedules.update', $schedule) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="draft">
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fas fa-eye-slash me-2"></i>Ẩn khỏi trang chủ
                            </button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-outline-danger" onclick="deleteSchedule({{ $schedule->id }})">
                        <i class="fas fa-trash me-2"></i>Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Form -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
function deleteSchedule(id) {
    if (confirm('Bạn có chắc chắn muốn xóa lịch khai giảng này?')) {
        const form = document.getElementById('deleteForm');
        form.action = `/admin/schedules/${id}`;
        form.submit();
    }
}
</script>
@endpush