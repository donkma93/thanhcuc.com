@extends('admin.layouts.app')

@section('title', 'Thêm tin tức mới')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm tin tức mới</h1>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin tin tức</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Tóm tắt</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" 
                                      id="excerpt" name="excerpt" rows="3" 
                                      placeholder="Tóm tắt ngắn gọn về nội dung tin tức...">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Tối đa 500 ký tự</div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Nội dung <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="15" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="category" class="form-label">Danh mục</label>
                            <select class="form-select @error('category') is-invalid @enderror" 
                                    id="category" name="category" required>
                                <option value="">-- Chọn danh mục --</option>
                                <option value="KIẾN THỨC TIẾNG ĐỨC" {{ old('category') == 'KIẾN THỨC TIẾNG ĐỨC' ? 'selected' : '' }}>
                                    KIẾN THỨC TIẾNG ĐỨC
                                </option>
                                <option value="HOẠT ĐỘNG CÔNG TY" {{ old('category') == 'HOẠT ĐỘNG CÔNG TY' ? 'selected' : '' }}>
                                    HOẠT ĐỘNG CÔNG TY
                                </option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Hình ảnh đại diện</label>
                            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                   id="featured_image" name="featured_image" accept="image/*">
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Định dạng: JPG, PNG, GIF. Tối đa 2MB</div>
                        </div>

                        <div class="mb-3">
                            <label for="published_at" class="form-label">Ngày xuất bản</label>
                            <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" 
                                   id="published_at" name="published_at" value="{{ old('published_at') }}">
                            @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Để trống để xuất bản ngay</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" 
                                       value="1" {{ old('is_published') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">
                                    Xuất bản ngay
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                                       value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    Tin tức nổi bật
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Lưu tin tức
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'],
            language: 'vi'
        })
        .catch(error => {
            console.error(error);
        });

    // Auto-generate slug from title
    const titleInput = document.getElementById('title');
    titleInput.addEventListener('input', function() {
        const title = this.value;
        // You can add slug generation logic here if needed
    });
});
</script>
@endpush
