@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa tin tức')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa tin tức</h1>
        <div>
            <a href="{{ route('admin.news.show', $news) }}" class="btn btn-info me-2">
                <i class="fas fa-eye"></i> Xem
            </a>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin tin tức</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $news->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Tóm tắt</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" 
                                      id="excerpt" name="excerpt" rows="3" 
                                      placeholder="Tóm tắt ngắn gọn về nội dung tin tức...">{{ old('excerpt', $news->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Tối đa 500 ký tự</div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Nội dung <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="15" required>{{ old('content', $news->content) }}</textarea>
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
                                <option value="KIẾN THỨC TIẾNG ĐỨC" {{ old('category', $news->category) == 'KIẾN THỨC TIẾNG ĐỨC' ? 'selected' : '' }}>
                                    KIẾN THỨC TIẾNG ĐỨC
                                </option>
                                <option value="HOẠT ĐỘNG CÔNG TY" {{ old('category', $news->category) == 'HOẠT ĐỘNG CÔNG TY' ? 'selected' : '' }}>
                                    HOẠT ĐỘNG CÔNG TY
                                </option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Hình ảnh đại diện</label>
                            @if($news->featured_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $news->featured_image) }}" 
                                         alt="{{ $news->title }}" 
                                         class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @endif
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
                                   id="published_at" name="published_at" 
                                   value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}">
                            @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Để trống để xuất bản ngay</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" 
                                       value="1" {{ old('is_published', $news->is_published) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">
                                    Xuất bản
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                                       value="1" {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    Tin tức nổi bật
                                </label>
                            </div>
                        </div>

                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">Thông tin bổ sung</h6>
                                <p class="card-text mb-1">
                                    <strong>Slug:</strong> {{ $news->slug }}
                                </p>
                                <p class="card-text mb-1">
                                    <strong>Tác giả:</strong> {{ $news->author->name ?? 'N/A' }}
                                </p>
                                <p class="card-text mb-1">
                                    <strong>Tạo lúc:</strong> {{ $news->created_at->format('d/m/Y H:i') }}
                                </p>
                                <p class="card-text mb-0">
                                    <strong>Cập nhật:</strong> {{ $news->updated_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Cập nhật tin tức
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
});
</script>
@endpush
