@extends('admin.layouts.app')

@section('title', 'Chi tiết lịch thi')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-eye me-2"></i>
            Chi tiết lịch thi
        </h1>
        <p class="text-muted mb-0">Xem thông tin chi tiết lịch thi</p>
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
                        <i class="fas fa-calendar-check me-2"></i>
                        Thông tin lịch thi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Loại thi:</label>
                            <div>
                                <span class="badge bg-primary fs-6">{{ $examSchedule->exam_type }}</span>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Trình độ:</label>
                            <div>
                                @if($examSchedule->level)
                                    <span class="badge bg-secondary fs-6">{{ $examSchedule->level }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Ngày thi:</label>
                            <div class="fs-5">
                                <strong>{{ $examSchedule->formatted_exam_date }}</strong><br>
                                <small class="text-muted">
                                    {{ $examSchedule->day_of_week }}
                                    @if($examSchedule->exam_time)
                                        , {{ $examSchedule->exam_time }}
                                    @endif
                                </small>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Hạn đăng ký:</label>
                            <div class="fs-5">
                                @if($examSchedule->isRegistrationOpen())
                                    <span class="text-success">{{ $examSchedule->formatted_registration_deadline }}</span>
                                @else
                                    <span class="text-danger">{{ $examSchedule->formatted_registration_deadline }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Lệ phí:</label>
                            <div class="fs-4 text-primary fw-bold">
                                {{ $examSchedule->formatted_fee }}
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Trạng thái:</label>
                            <div>
                                @if($examSchedule->status === 'active')
                                    <span class="badge bg-success fs-6">Hoạt động</span>
                                @elseif($examSchedule->status === 'inactive')
                                    <span class="badge bg-secondary fs-6">Không hoạt động</span>
                                @else
                                    <span class="badge bg-info fs-6">Đã hoàn thành</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Địa điểm thi:</label>
                        <div class="fs-5">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            {{ $examSchedule->location }}
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.exam-schedules.edit', $examSchedule) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Chỉnh sửa
                        </a>
                        <form action="{{ route('admin.exam-schedules.toggle-featured', $examSchedule) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $examSchedule->is_featured ? 'btn-outline-warning' : 'btn-warning' }}">
                                <i class="fas fa-star me-2"></i>
                                {{ $examSchedule->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Thông tin bổ sung
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Ngày tạo:</strong>
                        <p class="mb-0">{{ $examSchedule->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="mb-0">
                        <strong>ID:</strong>
                        <p class="mb-0 text-muted">#{{ $examSchedule->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
