@extends('admin.layouts.app')

@section('title', 'Chi tiết Gallery')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết Gallery: {{ $gallery->title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Image -->
                            <div class="text-center mb-4">
                                <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" 
                                     class="img-fluid rounded shadow" style="max-height: 500px;">
                            </div>
                            
                            <!-- Title -->
                            <h4 class="mb-3">{{ $gallery->title }}</h4>
                            
                            <!-- Description -->
                            @if($gallery->description)
                                <div class="mb-4">
                                    <h6 class="text-muted">Mô tả:</h6>
                                    <p class="lead">{{ $gallery->description }}</p>
                                </div>
                            @endif
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Gallery Information -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Thông tin Gallery</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Loại:</strong></td>
                                            <td>
                                                <span class="badge badge-primary">{{ $gallery->type_display }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Trạng thái:</strong></td>
                                            <td>
                                                <span class="badge badge-{{ $gallery->is_active ? 'success' : 'secondary' }}">
                                                    {{ $gallery->status_display }}
                                                </span>
                                            </td>
                                        </tr>
                                        @if($gallery->level)
                                            <tr>
                                                <td><strong>Cấp độ:</strong></td>
                                                <td>
                                                    <span class="badge badge-info">{{ $gallery->level }}</span>
                                                </td>
                                            </tr>
                                        @endif
                                        @if($gallery->students)
                                            <tr>
                                                <td><strong>Số học viên:</strong></td>
                                                <td>
                                                    <i class="fas fa-users text-info"></i> {{ $gallery->students }}
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td><strong>Thứ tự:</strong></td>
                                            <td>{{ $gallery->sort_order }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tạo lúc:</strong></td>
                                            <td>{{ $gallery->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Cập nhật:</strong></td>
                                            <td>{{ $gallery->updated_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
                            <!-- Actions -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Hành động</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> Chỉnh sửa
                                        </a>
                                        
                                        <form action="{{ route('admin.galleries.toggle-status', $gallery) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-{{ $gallery->is_active ? 'warning' : 'success' }} w-100">
                                                <i class="fas fa-{{ $gallery->is_active ? 'pause' : 'play' }}"></i>
                                                {{ $gallery->is_active ? 'Tạm dừng' : 'Kích hoạt' }}
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" 
                                              onsubmit="return confirm('Bạn có chắc chắn muốn xóa gallery này? Hành động này không thể hoàn tác.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100">
                                                <i class="fas fa-trash"></i> Xóa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Image Details -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Chi tiết hình ảnh</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless table-sm">
                                        <tr>
                                            <td><strong>Đường dẫn:</strong></td>
                                            <td class="text-break">{{ $gallery->image_path }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>URL:</strong></td>
                                            <td>
                                                <a href="{{ $gallery->image_url }}" target="_blank" class="text-primary">
                                                    <i class="fas fa-external-link-alt"></i> Xem ảnh gốc
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.img-fluid {
    transition: transform 0.3s ease;
}

.img-fluid:hover {
    transform: scale(1.02);
}

.table td {
    padding: 0.5rem 0.75rem;
}

.d-grid {
    display: grid;
}

.gap-2 {
    gap: 0.5rem;
}

.w-100 {
    width: 100% !important;
}

.text-break {
    word-break: break-all;
}
</style>
@endpush
