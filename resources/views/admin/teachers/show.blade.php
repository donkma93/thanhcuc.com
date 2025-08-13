@extends('admin.layouts.app')

@section('title', 'Chi tiết giảng viên')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Chi tiết giảng viên</h1>
        <p class="text-muted">Thông tin chi tiết của giảng viên: {{ $teacher->name }}</p>
    </div>
    <div>
        <a href="{{ route('admin.teachers.edit', $teacher) }}" class="btn btn-primary me-2">
            <i class="fas fa-edit me-2"></i>Chỉnh sửa
        </a>
        <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">
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
                        @if($teacher->avatar)
                            <img src="{{ asset('storage/' . $teacher->avatar) }}" 
                                 alt="{{ $teacher->name }}" 
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
                            {{ $teacher->name }}
                            @if($teacher->is_featured)
                                <span class="badge bg-warning text-dark ms-2">
                                    <i class="fas fa-star"></i> Nổi bật
                                </span>
                            @endif
                            @if($teacher->is_active)
                                <span class="badge bg-success ms-1">Hoạt động</span>
                            @else
                                <span class="badge bg-secondary ms-1">Không hoạt động</span>
                            @endif
                        </h3>
                        
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Chuyên môn:</strong>
                            </div>
                            <div class="col-sm-8">
                                <span class="badge bg-info">{{ $teacher->specialization }}</span>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Chứng chỉ:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $teacher->certification }}
                            </div>
                        </div>
                        
                        @if($teacher->experience_years)
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <strong>Kinh nghiệm:</strong>
                                </div>
                                <div class="col-sm-8">
                                    {{ $teacher->experience_years }} năm
                                </div>
                            </div>
                        @endif
                        
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Slug:</strong>
                            </div>
                            <div class="col-sm-8">
                                <code>{{ $teacher->slug }}</code>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Thứ tự hiển thị:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $teacher->sort_order }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($teacher->bio)
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tiểu sử</h5>
                </div>
                <div class="card-body">
                    <div class="text-muted">
                        {!! $teacher->bio !!}
                    </div>
                </div>
            </div>
        @endif
        
        @if($teacher->achievements && is_array($teacher->achievements) && count($teacher->achievements) > 0)
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thành tích nổi bật</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($teacher->achievements as $achievement)
                            @if($achievement) {{-- Only show non-empty achievements --}}
                                <div class="col-md-6 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-trophy text-warning me-2"></i>
                                        <span>{{ $achievement }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Thao tác</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.teachers.edit', $teacher) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Chỉnh sửa thông tin
                    </a>
                    
                    <form method="POST" action="{{ route('admin.teachers.toggle-status', $teacher) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-{{ $teacher->is_active ? 'warning' : 'success' }} w-100">
                            <i class="fas fa-{{ $teacher->is_active ? 'pause' : 'play' }} me-2"></i>
                            {{ $teacher->is_active ? 'Vô hiệu hóa' : 'Kích hoạt' }}
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('admin.teachers.toggle-featured', $teacher) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-{{ $teacher->is_featured ? 'secondary' : 'warning' }} w-100">
                            <i class="fas fa-{{ $teacher->is_featured ? 'star-half-alt' : 'star' }} me-2"></i>
                            {{ $teacher->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}
                        </button>
                    </form>
                    
                    <hr>
                    
                    <form method="POST" action="{{ route('admin.teachers.destroy', $teacher) }}" 
                          data-confirm="Bạn có chắc muốn xóa giảng viên này? Hành động này không thể hoàn tác!"
                          data-confirm-type="danger">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Xóa giảng viên
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
                        <strong>ID:</strong> {{ $teacher->id }}
                    </li>
                    <li class="mb-2">
                        <strong>Ngày tạo:</strong><br>
                        <small class="text-muted">{{ $teacher->created_at->format('d/m/Y H:i:s') }}</small>
                    </li>
                    <li>
                        <strong>Cập nhật cuối:</strong><br>
                        <small class="text-muted">{{ $teacher->updated_at->format('d/m/Y H:i:s') }}</small>
                    </li>
                </ul>
            </div>
        </div>

        @if(config('app.env') !== 'production')
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Preview URL</h5>
                </div>
                <div class="card-body">
                    <p class="mb-2">URL trên website:</p>
                    <a href="{{ route('teachers.show', $teacher->slug) }}" 
                       target="_blank" 
                       class="btn btn-outline-info btn-sm">
                        <i class="fas fa-external-link-alt me-1"></i>
                        Xem trên website
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection