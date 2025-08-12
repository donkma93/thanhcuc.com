@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa Ưu đãi Khóa học')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa Ưu đãi Khóa học</h1>
        <a href="{{ route('admin.course-offers.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin Ưu đãi</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.course-offers.update', $offer->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $offer->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" required>{{ old('description', $offer->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon (FontAwesome)</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                   id="icon" name="icon" value="{{ old('icon', $offer->icon) }}" 
                                   placeholder="fas fa-gift">
                            <div class="form-text">Ví dụ: fas fa-gift, fas fa-book, fas fa-certificate</div>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="badge_text" class="form-label">Badge Text</label>
                            <input type="text" class="form-control @error('badge_text') is-invalid @enderror" 
                                   id="badge_text" name="badge_text" value="{{ old('badge_text', $offer->badge_text) }}" 
                                   placeholder="Miễn phí">
                            @error('badge_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="badge_color" class="form-label">Badge Color</label>
                            <select class="form-select @error('badge_color') is-invalid @enderror" 
                                    id="badge_color" name="badge_color">
                                <option value="success" {{ old('badge_color', $offer->badge_color) == 'success' ? 'selected' : '' }}>Xanh lá (Success)</option>
                                <option value="primary" {{ old('badge_color', $offer->badge_color) == 'primary' ? 'selected' : '' }}>Xanh dương (Primary)</option>
                                <option value="info" {{ old('badge_color', $offer->badge_color) == 'info' ? 'selected' : '' }}>Xanh nhạt (Info)</option>
                                <option value="warning" {{ old('badge_color', $offer->badge_color) == 'warning' ? 'selected' : '' }}>Vàng (Warning)</option>
                                <option value="danger" {{ old('badge_color', $offer->badge_color) == 'danger' ? 'selected' : '' }}>Đỏ (Danger)</option>
                                <option value="secondary" {{ old('badge_color', $offer->badge_color) == 'secondary' ? 'selected' : '' }}>Xám (Secondary)</option>
                                <option value="dark" {{ old('badge_color', $offer->badge_color) == 'dark' ? 'selected' : '' }}>Đen (Dark)</option>
                            </select>
                            @error('badge_color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Thứ tự hiển thị</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" name="sort_order" value="{{ old('sort_order', $offer->sort_order) }}" min="0">
                            <div class="form-text">Số càng nhỏ hiển thị càng trước</div>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                       {{ old('is_active', $offer->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Hiển thị trên trang chủ
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.course-offers.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Cập nhật Ưu đãi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
