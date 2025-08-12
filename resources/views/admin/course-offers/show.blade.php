@extends('admin.layouts.app')

@section('title', 'Chi tiết Ưu đãi Khóa học')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chi tiết Ưu đãi Khóa học</h1>
        <div>
            <a href="{{ route('admin.course-offers.edit', $offer->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Chỉnh sửa
            </a>
            <a href="{{ route('admin.course-offers.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin Ưu đãi</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tiêu đề:</label>
                                <p class="form-control-plaintext">{{ $offer->title }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Trạng thái:</label>
                                <p class="form-control-plaintext">
                                    @if($offer->is_active)
                                        <span class="badge bg-success">Hoạt động</span>
                                    @else
                                        <span class="badge bg-secondary">Ẩn</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mô tả:</label>
                        <div class="form-control-plaintext" style="min-height: 100px; background-color: #f8f9fa; padding: 15px; border-radius: 5px;">
                            {{ $offer->description }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Icon:</label>
                                <p class="form-control-plaintext">
                                    @if($offer->icon)
                                        <i class="{{ $offer->icon }} fa-2x text-primary"></i>
                                        <br><small class="text-muted">{{ $offer->icon }}</small>
                                    @else
                                        <span class="text-muted">Không có</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Badge Text:</label>
                                <p class="form-control-plaintext">
                                    @if($offer->badge_text)
                                        <span class="badge bg-{{ $offer->badge_color }}">{{ $offer->badge_text }}</span>
                                    @else
                                        <span class="text-muted">Không có</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Thứ tự hiển thị:</label>
                                <p class="form-control-plaintext">{{ $offer->sort_order }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Ngày tạo:</label>
                                <p class="form-control-plaintext">{{ $offer->created_at->format('d/m/Y H:i:s') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Cập nhật lần cuối:</label>
                                <p class="form-control-plaintext">{{ $offer->updated_at->format('d/m/Y H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Xem trước</h6>
                </div>
                <div class="card-body">
                    <div class="offer-card h-100">
                        @if($offer->icon)
                            <div class="offer-icon">
                                <i class="{{ $offer->icon }}"></i>
                            </div>
                        @endif
                        <h5 class="fw-bold mb-2 text-success">{{ $offer->title }}</h5>
                        <p class="text-muted mb-0">{{ $offer->description }}</p>
                        @if($offer->badge_text)
                            <div class="offer-badge">
                                <span class="badge bg-{{ $offer->badge_color }}">{{ $offer->badge_text }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card shadow mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thao tác</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.course-offers.edit', $offer->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                        <form action="{{ route('admin.course-offers.destroy', $offer->id) }}" method="POST" 
                              onsubmit="return confirm('Bạn có chắc chắn muốn xóa ưu đãi này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </form>
                        <a href="{{ route('admin.course-offers.index') }}" class="btn btn-secondary">
                            <i class="fas fa-list"></i> Danh sách
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
