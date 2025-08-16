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
                                      id="content" name="content" rows="15" style="display: none;">{{ old('content', $news->content) }}</textarea>
                            <div id="content-editor" class="border rounded p-3 @error('content') border-danger @enderror" style="min-height: 400px;">
                                <div class="text-muted text-center py-5">
                                    <i class="fas fa-spinner fa-spin fa-2x mb-3"></i>
                                    <p>Đang tải editor...</p>
                                </div>
                            </div>
                            @error('content')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Nhập nội dung tin tức vào editor bên trên</div>
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

@push('styles')
<style>
#content-editor {
    border: 1px solid #ced4da;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

#content-editor:focus-within {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

#content-editor.border-danger {
    border-color: #dc3545;
}

#content-editor.border-danger:focus-within {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.ck-editor__editable {
    min-height: 350px !important;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
let editor = null;
let editorReady = false;

// Function to initialize CKEditor
function initCKEditor() {
    console.log('Initializing CKEditor...');
    
    ClassicEditor
        .create(document.querySelector('#content-editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'],
            language: 'vi',
            placeholder: 'Nhập nội dung tin tức...'
        })
        .then(newEditor => {
            editor = newEditor;
            editorReady = true;
            console.log('CKEditor initialized successfully');
            
            // Clear loading message
            const editorContainer = document.getElementById('content-editor');
            editorContainer.innerHTML = '';
            
            // Set initial content from existing news
            const existingContent = document.getElementById('content').value;
            if (existingContent) {
                editor.setData(existingContent);
            }
            
            // Add change event listener to sync content
            editor.model.document.on('change:data', () => {
                const content = editor.getData();
                document.getElementById('content').value = content;
                console.log('Content synced to textarea:', content);
            });
        })
        .catch(error => {
            console.error('CKEditor error:', error);
            // Fallback: show textarea if CKEditor fails
            document.getElementById('content').style.display = 'block';
            document.getElementById('content-editor').style.display = 'none';
        });
}

// Function to handle form submission
function handleFormSubmit(e) {
    console.log('Form submitting...');
    
    if (editorReady && editor) {
        // Get content from CKEditor
        const content = editor.getData();
        console.log('CKEditor content:', content);
        
        // Update hidden textarea
        document.getElementById('content').value = content;
        
        // Validate content
        if (!content.trim()) {
            e.preventDefault();
            alert('Vui lòng nhập nội dung tin tức!');
            return false;
        }
        
        console.log('Content validation passed, form will submit');
        return true;
    } else {
        console.log('Editor not ready, checking textarea directly');
        // Fallback validation
        const textareaContent = document.getElementById('content').value;
        if (!textareaContent.trim()) {
            e.preventDefault();
            alert('Vui lòng nhập nội dung tin tức!');
            return false;
        }
        return true;
    }
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
        initCKEditor();
        setupFormHandling();
    });
} else {
    // DOM is already ready
    initCKEditor();
    setupFormHandling();
}

// Setup form handling
function setupFormHandling() {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', handleFormSubmit);
        console.log('Form submit handler attached');
    }
}

// Debug: Check if script is loaded
console.log('News edit script loaded');
</script>
@endpush
