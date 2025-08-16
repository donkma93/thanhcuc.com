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
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
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
                                      id="content" name="content" rows="15" style="display: none;">{{ old('content') }}</textarea>
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
                            <div id="content-debug" class="mt-2 small text-muted"></div>
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
                                       value="1" {{ old('is_published', false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">
                                    Xuất bản ngay
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                                       value="1" {{ old('is_featured', false) ? 'checked' : '' }}>
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
    updateDebugInfo('Đang khởi tạo CKEditor...');
    
    const editorElement = document.querySelector('#content-editor');
    if (!editorElement) {
        console.error('Content editor element not found');
        updateDebugInfo('Không tìm thấy element content-editor');
        return;
    }
    
    ClassicEditor
        .create(editorElement, {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'],
            language: 'vi',
            placeholder: 'Nhập nội dung tin tức...'
        })
        .then(newEditor => {
            editor = newEditor;
            editorReady = true;
            console.log('CKEditor initialized successfully');
            updateDebugInfo('CKEditor đã khởi tạo thành công');
            
            // Clear loading message
            const editorContainer = document.getElementById('content-editor');
            editorContainer.innerHTML = '';
            
            // Set initial content if there's old input
            const oldContent = document.getElementById('content').value;
            if (oldContent) {
                editor.setData(oldContent);
                console.log('Set initial content:', oldContent);
            }
            
            // Add change event listener to sync content
            editor.model.document.on('change:data', () => {
                const content = editor.getData();
                document.getElementById('content').value = content;
                console.log('Content synced to textarea:', content);
                updateDebugInfo('Nội dung đã được sync: ' + (content ? 'Có dữ liệu' : 'Trống'));
            });
        })
        .catch(error => {
            console.error('CKEditor error:', error);
            updateDebugInfo('Lỗi CKEditor: ' + error.message);
            // Fallback: show textarea if CKEditor fails
            document.getElementById('content').style.display = 'block';
            document.getElementById('content-editor').style.display = 'none';
        });
}

// Function to update debug info
function updateDebugInfo(message) {
    const debugElement = document.getElementById('content-debug');
    if (debugElement) {
        debugElement.innerHTML = '<strong>Debug:</strong> ' + message;
    }
}

// Function to handle form submission
function handleFormSubmit(e) {
    console.log('Form submitting...');
    updateDebugInfo('Đang submit form...');
    
    if (editorReady && editor) {
        // Get content from CKEditor
        const content = editor.getData();
        console.log('CKEditor content:', content);
        updateDebugInfo('Lấy nội dung từ CKEditor: ' + (content ? 'Có dữ liệu' : 'Trống'));
        
        // Update hidden textarea
        document.getElementById('content').value = content;
        console.log('Updated textarea value:', document.getElementById('content').value);
        
        // Validate content
        if (!content.trim()) {
            e.preventDefault();
            updateDebugInfo('Lỗi: Nội dung trống, không cho phép submit');
            alert('Vui lòng nhập nội dung tin tức!');
            return false;
        }
        
        console.log('Content validation passed, form will submit');
        updateDebugInfo('Validation thành công, form sẽ submit');
        return true;
    } else {
        console.log('Editor not ready, checking textarea directly');
        updateDebugInfo('Editor chưa sẵn sàng, kiểm tra textarea trực tiếp');
        
        // Fallback validation
        const textareaContent = document.getElementById('content').value;
        console.log('Textarea content:', textareaContent);
        
        if (!textareaContent.trim()) {
            e.preventDefault();
            updateDebugInfo('Lỗi: Textarea trống, không cho phép submit');
            alert('Vui lòng nhập nội dung tin tức!');
            return false;
        }
        
        updateDebugInfo('Validation fallback thành công, form sẽ submit');
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
        updateDebugInfo('Form submit handler đã được gắn');
    } else {
        console.error('Form not found');
        updateDebugInfo('Không tìm thấy form');
    }
    
    // Auto-generate slug from title
    const titleInput = document.getElementById('title');
    if (titleInput) {
        titleInput.addEventListener('input', function() {
            const title = this.value;
            // You can add slug generation logic here if needed
        });
    }
    
    // Test if content field exists
    const contentField = document.getElementById('content');
    if (contentField) {
        console.log('Content field found, current value:', contentField.value);
        updateDebugInfo('Content field đã tìm thấy, giá trị hiện tại: ' + (contentField.value ? 'Có dữ liệu' : 'Trống'));
    } else {
        console.error('Content field not found');
        updateDebugInfo('Không tìm thấy content field');
    }
}

// Debug: Check if script is loaded
console.log('News create script loaded');
</script>
@endpush
