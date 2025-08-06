@extends('admin.layouts.app')

@section('title', 'Chi tiết Chương trình')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-eye me-2"></i>
            Chi tiết Chương trình
        </h1>
        <p class="text-muted mb-0">{{ $program->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.programs.edit', $program) }}" class="btn btn-primary">
            <i class="fas fa-edit me-1"></i>
            Chỉnh sửa
        </a>
        <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary">
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
                        <i class="fas fa-info-circle me-2"></i>
                        Thông tin Chương trình
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Program Header -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            @if($program->image_path)
                                <img src="{{ $program->image_url }}" 
                                     alt="{{ $program->name }}" 
                                     class="img-fluid rounded shadow-sm">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                                     style="height: 200px; {{ $program->color ? 'background-color: ' . $program->color . ' !important;' : '' }}">
                                    @if($program->icon)
                                        <i class="{{ $program->icon }} fa-4x {{ $program->color ? 'text-white' : 'text-muted' }}"></i>
                                    @else
                                        <i class="fas fa-graduation-cap fa-4x text-muted"></i>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3 class="mb-3">{{ $program->name }}</h3>
                            
                            @if($program->short_description)
                                <p class="lead text-muted mb-3">{{ $program->short_description }}</p>
                            @endif
                            
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-clock text-primary me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Thời gian</small>
                                            <strong>{{ $program->duration }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-euro-sign text-success me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Mức lương</small>
                                            <strong>{{ $program->salary_range }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-chart-line text-info me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Cơ hội việc làm</small>
                                            @php
                                                $levelColors = [
                                                    'Thấp' => 'secondary',
                                                    'Trung bình' => 'warning',
                                                    'Cao' => 'info',
                                                    'Rất cao' => 'danger'
                                                ];
                                                $color = $levelColors[$program->opportunity_level] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $color }}">{{ $program->opportunity_level }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-link text-secondary me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Slug</small>
                                            <code>{{ $program->slug }}</code>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-4">
                        <h5 class="mb-3">
                            <i class="fas fa-file-alt me-2"></i>
                            Mô tả chi tiết
                        </h5>
                        <div class="bg-light p-3 rounded">
                            {!! nl2br(e($program->description)) !!}
                        </div>
                    </div>
                    
                    <!-- Requirements -->
                    @if($program->requirements_array && count($program->requirements_array) > 0)
                        <div class="mb-4">
                            <h5 class="mb-3">
                                <i class="fas fa-check-circle me-2 text-warning"></i>
                                Yêu cầu đầu vào
                            </h5>
                            <ul class="list-group list-group-flush">
                                @foreach($program->requirements_array as $requirement)
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fas fa-chevron-right text-primary me-2"></i>
                                        {{ $requirement }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- Benefits -->
                    @if($program->benefits_array && count($program->benefits_array) > 0)
                        <div class="mb-4">
                            <h5 class="mb-3">
                                <i class="fas fa-gift me-2 text-success"></i>
                                Lợi ích của chương trình
                            </h5>
                            <ul class="list-group list-group-flush">
                                @foreach($program->benefits_array as $benefit)
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fas fa-check text-success me-2"></i>
                                        {{ $benefit }}
                                    </li>
                                @endforeach
                            </ul>
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
                        <span class="badge {{ $program->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                            {{ $program->is_active ? 'Đang hiển thị' : 'Đã ẩn' }}
                        </span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span>Chương trình nổi bật:</span>
                        <span class="badge {{ $program->is_featured ? 'bg-warning' : 'bg-light text-dark' }} fs-6">
                            {{ $program->is_featured ? 'Nổi bật' : 'Bình thường' }}
                        </span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Thứ tự hiển thị:</span>
                        <span class="badge bg-info fs-6">#{{ $program->sort_order }}</span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-grid gap-2">
                        <form action="{{ route('admin.programs.toggle-status', $program) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $program->is_active ? 'btn-warning' : 'btn-success' }} w-100">
                                <i class="fas {{ $program->is_active ? 'fa-eye-slash' : 'fa-eye' }} me-1"></i>
                                {{ $program->is_active ? 'Ẩn chương trình' : 'Hiển thị chương trình' }}
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.programs.toggle-featured', $program) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $program->is_featured ? 'btn-outline-warning' : 'btn-warning' }} w-100">
                                <i class="fas fa-star me-1"></i>
                                {{ $program->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}
                            </button>
                        </form>
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
                        <strong>{{ $program->created_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted d-block">Cập nhật lần cuối</small>
                        <strong>{{ $program->updated_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    
                    @if($program->icon)
                        <div class="mb-3">
                            <small class="text-muted d-block">Icon</small>
                            <div class="d-flex align-items-center">
                                <i class="{{ $program->icon }} me-2" style="color: {{ $program->color ?? '#6c757d' }};"></i>
                                <code>{{ $program->icon }}</code>
                            </div>
                        </div>
                    @endif
                    
                    @if($program->color)
                        <div class="mb-3">
                            <small class="text-muted d-block">Màu chủ đạo</small>
                            <div class="d-flex align-items-center">
                                <div class="rounded me-2" 
                                     style="width: 20px; height: 20px; background-color: {{ $program->color }};"></div>
                                <code>{{ $program->color }}</code>
                            </div>
                        </div>
                    @endif
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
                        <a href="{{ route('admin.programs.edit', $program) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-1"></i>
                            Chỉnh sửa
                        </a>
                        
                        <a href="{{ route('admin.programs.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i>
                            Tạo chương trình mới
                        </a>
                        
                        <hr>
                        
                        <form action="{{ route('admin.programs.destroy', $program) }}" 
                              method="POST" 
                              data-confirm="Bạn có chắc muốn xóa chương trình này? Hành động này không thể hoàn tác!"
                              data-confirm-type="danger">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash me-1"></i>
                                Xóa chương trình
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
    .list-group-item {
        border-left: none;
        border-right: none;
        padding-left: 0;
        padding-right: 0;
    }
    
    .list-group-item:first-child {
        border-top: none;
    }
    
    .list-group-item:last-child {
        border-bottom: none;
    }
    
    .badge.fs-6 {
        font-size: 0.875rem !important;
    }
    
    code {
        color: #6f42c1;
        background-color: #f8f9fa;
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
    }
</style>
@endpush