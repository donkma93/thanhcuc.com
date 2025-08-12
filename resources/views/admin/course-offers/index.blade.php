@extends('admin.layouts.app')

@section('title', 'Quản lý Ưu đãi Khóa học')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý Ưu đãi Khóa học</h1>
        <a href="{{ route('admin.course-offers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm Ưu đãi Mới
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Ưu đãi Khóa học</h6>
        </div>
        <div class="card-body">
            @if($offers->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th width="50">STT</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th>Icon</th>
                                <th>Badge</th>
                                <th width="100">Thứ tự</th>
                                <th width="100">Trạng thái</th>
                                <th width="150">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offers as $index => $offer)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $offer->title }}</strong>
                                    </td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 300px;" title="{{ $offer->description }}">
                                            {{ $offer->description }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($offer->icon)
                                            <i class="{{ $offer->icon }} fa-2x text-primary"></i>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($offer->badge_text)
                                            <span class="badge bg-{{ $offer->badge_color }}">{{ $offer->badge_text }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $offer->sort_order }}</td>
                                    <td class="text-center">
                                        @if($offer->is_active)
                                            <span class="badge bg-success">Hoạt động</span>
                                        @else
                                            <span class="badge bg-secondary">Ẩn</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.course-offers.show', $offer->id) }}" 
                                               class="btn btn-sm btn-info" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.course-offers.edit', $offer->id) }}" 
                                               class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.course-offers.destroy', $offer->id) }}" 
                                                  method="POST" class="d-inline" 
                                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa ưu đãi này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-gift fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Chưa có ưu đãi nào</h5>
                    <p class="text-muted">Hãy tạo ưu đãi đầu tiên để hiển thị trên trang chủ</p>
                    <a href="{{ route('admin.course-offers.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm Ưu đãi Đầu tiên
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
