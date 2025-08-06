@extends('admin.layouts.app')

@section('title', 'Chi tiết Nhận xét')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-eye me-2"></i>
            Chi tiết Nhận xét
        </h1>
        <p class="text-muted mb-0">{{ $testimonial->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-primary">
            <i class="fas fa-edit me-1"></i>
            Chỉnh sửa
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>
            Quay lại
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-comment me-2"></i>
                        Nội dung Nhận xét
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Student Info -->
                    <div class="row mb-4">
                        <div class="col-md-3 text-center">
                            @if($testimonial->avatar_path)
                                <img src="{{ $testimonial->avatar_url }}" 
                                     alt="{{ $testimonial->name }}" 
                                     class="rounded-circle shadow-sm mb-3" 
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm" 
                                     style="width: 120px; height: 120px;">
                                    <i class="fas fa-user fa-3x text-muted"></i>
                                </div>
                            @endif
                            
                            <!-- Rating -->
                            <div class="mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-muted"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="text-muted small">{{ $testimonial->rating }}/5 sao</div>
                        </div>
                        
                        <div class="col-md-9">
                            <h3 class="mb-2">{{ $testimonial->name }}</h3>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-graduation-cap text-primary me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Chương trình</small>
                                            <strong>{{ $testimonial->program }}</strong>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-briefcase text-success me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Công việc hiện tại</small>
                                            <strong>{{ $testimonial->current_job }}</strong>
                                        </div>
                                    </div>
                                </div>
                                
                                @if($testimonial->company)
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-building text-info me-2"></i>
                                            <div>
                                                <small class="text-muted d-block">Công ty</small>
                                                <strong>{{ $testimonial->company }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                                @if($testimonial->location)
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                            <div>
                                                <small class="text-muted d-block">Địa điểm</small>
                                                <strong>{{ $testimonial->location }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial Content -->
                    <div class="mb-4">
                        <h5 class="mb-3">
                            <i class="fas fa-quote-left me-2"></i>
                            Nội dung nhận xét
                        </h5>
                        <div class="bg-light p-4 rounded position-relative">
                            <i class="fas fa-quote-left text-muted position-absolute" 
                               style="top: 10px; left: 15px; font-size: 2rem; opacity: 0.3;"></i>
                            <div class="ps-4">
                                {!! nl2br(e($testimonial->content)) !!}
                            </div>
                            <i class="fas fa-quote-right text-muted position-absolute" 
                               style="bottom: 10px; right: 15px; font-size: 2rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                    
                    <!-- Signature -->
                    <div class="text-end">
                        <div class="d-inline-block text-start">
                            <div class="fw-bold">{{ $testimonial->name }}</div>
                            <div class="text-muted">{{ $testimonial->current_job }}</div>
                            @if($testimonial->company)
                                <div class="text-primary small">{{ $testimonial->company }}</div>
                            @endif
                            @if($testimonial->location)
                                <div class="text-success small">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $testimonial->location }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Status Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-toggle-on me-2"></i>
                        Trạng thái
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Hiển thị công khai:</span>
                        <span class="badge {{ $testimonial->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                            {{ $testimonial->is_active ? 'Đang hiển thị' : 'Đã ẩn' }}
                        </span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Nhận xét nổi bật:</span>
                        <span class="badge {{ $testimonial->is_featured ? 'bg-warning' : 'bg-light text-dark' }} fs-6">
                            {{ $testimonial->is_featured ? 'Nổi bật' : 'Bình thường' }}
                        </span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Thứ tự hiển thị:</span>
                        <span class="badge bg-info fs-6">#{{ $testimonial->sort_order }}</span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-grid gap-2">
                        <form action="{{ route('admin.testimonials.toggle-status', $testimonial) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $testimonial->is_active ? 'btn-warning' : 'btn-success' }} w-100">
                                <i class="fas {{ $testimonial->is_active ? 'fa-eye-slash' : 'fa-eye' }} me-1"></i>
                                {{ $testimonial->is_active ? 'Ẩn nhận xét' : 'Hiển thị nhận xét' }}
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.testimonials.toggle-featured', $testimonial) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $testimonial->is_featured ? 'btn-outline-warning' : 'btn-warning' }} w-100">
                                <i class="fas fa-star me-1"></i>
                                {{ $testimonial->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Rating Details -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-star me-2"></i>
                        Chi tiết đánh giá
                    </h5>
                </div>
                <div class="card-body text-center">
                    <div class="display-4 text-warning mb-2">{{ $testimonial->rating }}</div>
                    <div class="mb-3">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $testimonial->rating)
                                <i class="fas fa-star text-warning fa-lg"></i>
                            @else
                                <i class="far fa-star text-muted fa-lg"></i>
                            @endif
                        @endfor
                    </div>
                    <div class="text-muted">
                        @switch($testimonial->rating)
                            @case(5)
                                Xuất sắc
                                @break
                            @case(4)
                                Rất tốt
                                @break
                            @case(3)
                                Tốt
                                @break
                            @case(2)
                                Khá
                                @break
                            @case(1)
                                Trung bình
                                @break
                            @default
                                Chưa đánh giá
                        @endswitch
                    </div>
                </div>
            </div>
            
            <!-- Meta Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-info me-2"></i>
                        Thông tin meta
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block">Ngày tạo</small>
                        <strong>{{ $testimonial->created_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted d-block">Cập nhật lần cuối</small>
                        <strong>{{ $testimonial->updated_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted d-block">Độ dài nội dung</small>
                        <strong>{{ strlen($testimonial->content) }} ký tự</strong>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-tools me-2"></i>
                        Thao tác
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-1"></i>
                            Chỉnh sửa
                        </a>
                        
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i>
                            Thêm nhận xét mới
                        </a>
                        
                        <hr>
                        
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                              method="POST" 
                              data-confirm="Bạn có chắc muốn xóa nhận xét này? Hành động này không thể hoàn tác!"
                              data-confirm-type="danger">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-1"></i>
                                Xóa nhận xét
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .badge.fs-6 {
        font-size: 0.875rem !important;
    }
    
    .fa-star {
        margin: 0 1px;
    }
    
    .rounded-circle {
        border: 3px solid #e9ecef;
    }
</style>
@endpush