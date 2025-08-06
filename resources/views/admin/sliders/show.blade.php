@extends('admin.layouts.app')

@section('title', 'Chi tiết Slider')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-eye me-2"></i>
            Chi tiết Slider
        </h1>
        <p class="text-muted mb-0">{{ $slider->title }}</p>
    </div>
    <div>
        <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-primary">
            <i class="fas fa-edit me-1"></i>
            Chỉnh sửa
        </a>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>
            Quay lại
        </a>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Slider Preview -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-desktop me-2"></i>
                        Xem trước Slider
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($slider->image_path)
                        <div class="position-relative">
                            <img src="{{ $slider->image_url }}" 
                                 alt="{{ $slider->title }}" 
                                 class="img-fluid w-100"
                                 style="max-height: 400px; object-fit: cover;">
                            
                            <!-- Overlay Content -->
                            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-4">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h2 class="mb-3">{{ $slider->title }}</h2>
                                            @if($slider->description)
                                                <p class="mb-3 lead">{{ $slider->description }}</p>
                                            @endif
                                            @if($slider->button_text && $slider->button_link)
                                                <a href="{{ $slider->button_link }}" 
                                                   class="btn btn-primary btn-lg"
                                                   target="_blank">
                                                    {{ $slider->button_text }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5 bg-light">
                            <i class="fas fa-image fa-4x text-muted mb-3"></i>
                            <h5 class="text-muted">Chưa có hình ảnh</h5>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Slider Details -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Thông tin chi tiết
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Title -->
                    <div class="mb-4">
                        <h5 class="mb-2">
                            <i class="fas fa-heading me-2 text-primary"></i>
                            Tiêu đề
                        </h5>
                        <div class="bg-light p-3 rounded">
                            <h4 class="mb-0">{{ $slider->title }}</h4>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    @if($slider->description)
                        <div class="mb-4">
                            <h5 class="mb-2">
                                <i class="fas fa-align-left me-2 text-info"></i>
                                Mô tả
                            </h5>
                            <div class="bg-light p-3 rounded">
                                {!! nl2br(e($slider->description)) !!}
                            </div>
                        </div>
                    @endif
                    
                    <!-- Button Info -->
                    @if($slider->button_text || $slider->button_link)
                        <div class="mb-4">
                            <h5 class="mb-2">
                                <i class="fas fa-mouse-pointer me-2 text-success"></i>
                                Thông tin Button
                            </h5>
                            <div class="row">
                                @if($slider->button_text)
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded">
                                            <small class="text-muted d-block">Text Button</small>
                                            <strong>{{ $slider->button_text }}</strong>
                                        </div>
                                    </div>
                                @endif
                                @if($slider->button_link)
                                    <div class="col-md-6">
                                        <div class="bg-light p-3 rounded">
                                            <small class="text-muted d-block">Link Button</small>
                                            <a href="{{ $slider->button_link }}" 
                                               target="_blank" 
                                               class="text-decoration-none">
                                                {{ Str::limit($slider->button_link, 40) }}
                                                <i class="fas fa-external-link-alt ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    
                    <!-- Image Info -->
                    @if($slider->image_path)
                        <div class="mb-4">
                            <h5 class="mb-2">
                                <i class="fas fa-image me-2 text-warning"></i>
                                Thông tin hình ảnh
                            </h5>
                            <div class="bg-light p-3 rounded">
                                <div class="row">
                                    <div class="col-md-6">
                                        <small class="text-muted d-block">Đường dẫn</small>
                                        <code>{{ $slider->image_path }}</code>
                                    </div>
                                    <div class="col-md-6">
                                        <small class="text-muted d-block">URL đầy đủ</small>
                                        <a href="{{ $slider->image_url }}" 
                                           target="_blank" 
                                           class="text-decoration-none">
                                            Xem ảnh gốc
                                            <i class="fas fa-external-link-alt ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
                        <span class="badge {{ $slider->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                            {{ $slider->is_active ? 'Đang hiển thị' : 'Đã ẩn' }}
                        </span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Thứ tự hiển thị:</span>
                        <span class="badge bg-info fs-6">#{{ $slider->sort_order }}</span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-grid">
                        <form action="{{ route('admin.sliders.toggle-status', $slider) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $slider->is_active ? 'btn-warning' : 'btn-success' }} w-100">
                                <i class="fas {{ $slider->is_active ? 'fa-eye-slash' : 'fa-eye' }} me-1"></i>
                                {{ $slider->is_active ? 'Ẩn slider' : 'Hiển thị slider' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-bar me-2"></i>
                        Thống kê nhanh
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border-end">
                                <div class="h4 mb-1 text-primary">{{ strlen($slider->title) }}</div>
                                <small class="text-muted">Ký tự tiêu đề</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h4 mb-1 text-info">{{ $slider->description ? strlen($slider->description) : 0 }}</div>
                            <small class="text-muted">Ký tự mô tả</small>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="border-end">
                                <div class="h5 mb-1 {{ $slider->button_text ? 'text-success' : 'text-muted' }}">
                                    <i class="fas {{ $slider->button_text ? 'fa-check' : 'fa-times' }}"></i>
                                </div>
                                <small class="text-muted">Có button</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h5 mb-1 {{ $slider->image_path ? 'text-success' : 'text-muted' }}">
                                <i class="fas {{ $slider->image_path ? 'fa-check' : 'fa-times' }}"></i>
                            </div>
                            <small class="text-muted">Có hình ảnh</small>
                        </div>
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
                        <strong>{{ $slider->created_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted d-block">Cập nhật lần cuối</small>
                        <strong>{{ $slider->updated_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted d-block">ID</small>
                        <code>#{{ $slider->id }}</code>
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
                        <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-1"></i>
                            Chỉnh sửa
                        </a>
                        
                        <a href="{{ route('admin.sliders.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i>
                            Tạo slider mới
                        </a>
                        
                        <hr>
                        
                        <form action="{{ route('admin.sliders.destroy', $slider) }}" 
                              method="POST" 
                              data-confirm="Bạn có chắc muốn xóa slider này? Hành động này không thể hoàn tác!"
                              data-confirm-type="danger">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-1"></i>
                                Xóa slider
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
    
    code {
        color: #6f42c1;
        background-color: #f8f9fa;
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-size: 0.875rem;
    }
    
    .border-end {
        border-right: 1px solid #dee2e6 !important;
    }
</style>
@endpush