@extends('admin.layouts.app')

@section('title', 'Chi tiết thành tích')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Chi tiết thành tích</h1>
        <p class="text-muted">Thông tin chi tiết thành tích của: {{ $achievement->student_name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.achievements.edit', $achievement) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i>Chỉnh sửa
        </a>
        <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Thông tin cơ bản</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        @if($achievement->avatar)
                            <img src="{{ asset('storage/' . $achievement->avatar) }}" 
                                 alt="{{ $achievement->student_name }}" 
                                 class="img-fluid rounded-circle mb-3"
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" 
                                 style="width: 150px; height: 150px;">
                                <i class="fas fa-user fa-3x text-white"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <h3 class="mb-2">
                            {{ $achievement->student_name }}
                            @if($achievement->is_featured)
                                <span class="badge bg-warning text-dark ms-2">
                                    <i class="fas fa-star"></i> Nổi bật
                                </span>
                            @endif
                            @if($achievement->is_active)
                                <span class="badge bg-success ms-1">Hoạt động</span>
                            @else
                                <span class="badge bg-secondary ms-1">Không hoạt động</span>
                            @endif
                        </h3>
                        
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Loại thành tích:</strong>
                            </div>
                            <div class="col-sm-8">
                                <span class="badge bg-info">{{ $achievement->category_display }}</span>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Hạng:</strong>
                            </div>
                            <div class="col-sm-8">
                                <span class="badge bg-{{ $achievement->rank == 1 ? 'warning' : ($achievement->rank == 2 ? 'secondary' : 'info') }}">
                                    <i class="fas fa-trophy"></i> {{ $achievement->rank_display }}
                                </span>
                            </div>
                        </div>
                        
                        @if($achievement->class_name)
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Lớp học:</strong>
                                </div>
                                <div class="col-sm-8">
                                    {{ $achievement->class_name }}
                                </div>
                            </div>
                        @endif
                        
                        @if($achievement->score)
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Điểm số:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <strong class="text-success">{{ $achievement->score }}/10</strong>
                                </div>
                            </div>
                        @endif
                        
                        @if($achievement->certificate)
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Chứng chỉ:</strong>
                                </div>
                                <div class="col-sm-8">
                                    {{ $achievement->certificate }}
                                </div>
                            </div>
                        @endif
                        
                        @if($achievement->university)
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Trường đại học:</strong>
                                </div>
                                <div class="col-sm-8">
                                    {{ $achievement->university }}
                                </div>
                            </div>
                        @endif
                        
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Ngày đạt thành tích:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $achievement->achievement_date->format('d/m/Y') }}
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Thứ tự hiển thị:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $achievement->sort_order }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ $achievement->achievement_title }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        @if($achievement->description)
                            <div class="mb-3">
                                <h6 class="text-muted mb-2">Mô tả chi tiết:</h6>
                                <div class="text-muted">
                                    {!! nl2br(e($achievement->description)) !!}
                                </div>
                            </div>
                        @endif
                        
                        <div class="achievement-summary">
                            <h6 class="text-muted mb-2">Tóm tắt thành tích:</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fas fa-user text-primary me-2"></i>
                                    <strong>Học viên:</strong> {{ $achievement->student_name }}
                                </li>
                                @if($achievement->class_name)
                                    <li class="mb-2">
                                        <i class="fas fa-users text-info me-2"></i>
                                        <strong>Lớp:</strong> {{ $achievement->class_name }}
                                    </li>
                                @endif
                                <li class="mb-2">
                                    <i class="fas fa-trophy text-warning me-2"></i>
                                    <strong>Hạng:</strong> {{ $achievement->rank_display }}
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-calendar text-success me-2"></i>
                                    <strong>Thời gian:</strong> {{ $achievement->achievement_date->format('d/m/Y') }}
                                </li>
                                @if($achievement->score)
                                    <li class="mb-2">
                                        <i class="fas fa-star text-warning me-2"></i>
                                        <strong>Điểm:</strong> {{ $achievement->score }}/10
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <div class="achievement-rank-display mb-3">
                                <div class="rank-icon rank-{{ $achievement->rank }}" style="font-size: 4rem;">
                                    @if($achievement->rank == 1)
                                        <i class="fas fa-crown text-warning"></i>
                                    @elseif($achievement->rank == 2)
                                        <i class="fas fa-medal text-secondary"></i>
                                    @else
                                        <i class="fas fa-award text-info"></i>
                                    @endif
                                </div>
                                <h4 class="text-{{ $achievement->rank == 1 ? 'warning' : ($achievement->rank == 2 ? 'secondary' : 'info') }}">
                                    {{ $achievement->rank_display }}
                                </h4>
                            </div>
                            <span class="badge bg-info fs-6">{{ $achievement->category_display }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Thao tác</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.achievements.edit', $achievement) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Chỉnh sửa thông tin
                    </a>
                    
                    <form method="POST" action="{{ route('admin.achievements.toggle-status', $achievement) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-{{ $achievement->is_active ? 'warning' : 'success' }} w-100">
                            <i class="fas fa-{{ $achievement->is_active ? 'pause' : 'play' }} me-2"></i>
                            {{ $achievement->is_active ? 'Vô hiệu hóa' : 'Kích hoạt' }}
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('admin.achievements.toggle-featured', $achievement) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-{{ $achievement->is_featured ? 'secondary' : 'warning' }} w-100">
                            <i class="fas fa-{{ $achievement->is_featured ? 'star-half-alt' : 'star' }} me-2"></i>
                            {{ $achievement->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}
                        </button>
                    </form>
                    
                    <hr>
                    
                    <form method="POST" action="{{ route('admin.achievements.destroy', $achievement) }}" 
                          data-confirm="Bạn có chắc muốn xóa thành tích này? Hành động này không thể hoàn tác!"
                          data-confirm-type="danger">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Xóa thành tích
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Thông tin hệ thống</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <strong>ID:</strong> {{ $achievement->id }}
                    </li>
                    <li class="mb-2">
                        <strong>Ngày tạo:</strong><br>
                        <small class="text-muted">{{ $achievement->created_at->format('d/m/Y H:i:s') }}</small>
                    </li>
                    <li>
                        <strong>Cập nhật cuối:</strong><br>
                        <small class="text-muted">{{ $achievement->updated_at->format('d/m/Y H:i:s') }}</small>
                    </li>
                </ul>
            </div>
        </div>

        @if(config('app.env') !== 'production')
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Preview</h5>
                </div>
                <div class="card-body">
                    <p class="mb-2">Thành tích này sẽ hiển thị trong:</p>
                    <ul class="list-unstyled">
                        <li class="mb-1">
                            <i class="fas fa-home text-primary me-2"></i>
                            Bảng vàng trang chủ
                        </li>
                        <li class="mb-1">
                            <i class="fas fa-trophy text-warning me-2"></i>
                            Tab "{{ $achievement->category_display }}"
                        </li>
                        <li>
                            <i class="fas fa-sort-numeric-down text-info me-2"></i>
                            Vị trí {{ $achievement->rank_display }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection