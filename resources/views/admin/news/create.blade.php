@extends('admin.layouts.app')

@section('title', 'Thêm tin tức mới')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Thêm tin tức mới</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Language Tabs -->
                        <ul class="nav nav-tabs mb-4" id="languageTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="vi-tab" data-bs-toggle="tab" data-bs-target="#vi" type="button" role="tab">
                                    🇻🇳 Tiếng Việt
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab">
                                    🇺🇸 English
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="de-tab" data-bs-toggle="tab" data-bs-target="#de" type="button" role="tab">
                                    🇩🇪 Deutsch
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content" id="languageTabContent">
                            <!-- Vietnamese Tab -->
                            <div class="tab-pane fade show active" id="vi" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tiêu đề (Tiếng Việt) *</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                                   id="title" name="title" value="{{ old('title') }}" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="excerpt" class="form-label">Tóm tắt (Tiếng Việt)</label>
                                            <textarea class="form-control @error('excerpt') is-invalid @enderror" 
                                                      id="excerpt" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
                                            @error('excerpt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="content" class="form-label">Nội dung (Tiếng Việt) *</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                                      id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Danh mục *</label>
                                            <select class="form-select @error('category') is-invalid @enderror" 
                                                    id="category" name="category" required>
                                                <option value="">Chọn danh mục</option>
                                                <option value="KIẾN THỨC TIẾNG ĐỨC" {{ old('category') == 'KIẾN THỨC TIẾNG ĐỨC' ? 'selected' : '' }}>
                                                    Kiến thức tiếng Đức
                                                </option>
                                                <option value="HOẠT ĐỘNG CÔNG TY" {{ old('category') == 'HOẠT ĐỘNG CÔNG TY' ? 'selected' : '' }}>
                                                    Hoạt động công ty
                                                </option>
                                            </select>
                                            @error('category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="featured_image" class="form-label">Hình ảnh nổi bật</label>
                                            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                                   id="featured_image" name="featured_image" accept="image/*">
                                            @error('featured_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" {{ old('is_published') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_published">
                                                    Xuất bản ngay
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_featured">
                                                    Tin nổi bật
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="published_at" class="form-label">Ngày xuất bản</label>
                                            <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" 
                                                   id="published_at" name="published_at" value="{{ old('published_at') }}">
                                            @error('published_at')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- English Tab -->
                            <div class="tab-pane fade" id="en" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="title_en" class="form-label">Title (English)</label>
                                            <input type="text" class="form-control" id="title_en" name="translations[en][title]" 
                                                   placeholder="Enter title in English">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="excerpt_en" class="form-label">Excerpt (English)</label>
                                            <textarea class="form-control" id="excerpt_en" name="translations[en][excerpt]" 
                                                      rows="3" placeholder="Enter excerpt in English"></textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="content_en" class="form-label">Content (English)</label>
                                            <textarea class="form-control" id="content_en" name="translations[en][content]" 
                                                      rows="10" placeholder="Enter content in English"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle me-2"></i>
                                            <strong>Note:</strong> English translations are optional. If not provided, the Vietnamese content will be used as fallback.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- German Tab -->
                            <div class="tab-pane fade" id="de" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="title_de" class="form-label">Titel (Deutsch)</label>
                                            <input type="text" class="form-control" id="title_de" name="translations[de][title]" 
                                                   placeholder="Titel auf Deutsch eingeben">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="excerpt_de" class="form-label">Zusammenfassung (Deutsch)</label>
                                            <textarea class="form-control" id="excerpt_de" name="translations[de][excerpt]" 
                                                      rows="3" placeholder="Zusammenfassung auf Deutsch eingeben"></textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="content_de" class="form-label">Inhalt (Deutsch)</label>
                                            <textarea class="form-control" id="content_de" name="translations[de][content]" 
                                                      rows="10" placeholder="Inhalt auf Deutsch eingeben"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle me-2"></i>
                                            <strong>Hinweis:</strong> Deutsche Übersetzungen sind optional. Falls nicht angegeben, wird der vietnamesische Inhalt als Fallback verwendet.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden fields for translations -->
                        <input type="hidden" name="translations[en][locale]" value="en">
                        <input type="hidden" name="translations[de][locale]" value="de">

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Quay lại
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Lưu tin tức
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.nav-tabs .nav-link {
    border-radius: 8px 8px 0 0;
    margin-right: 5px;
    font-weight: 500;
}

.nav-tabs .nav-link.active {
    background-color: var(--primary-color);
    color: var(--dark-color);
    border-color: var(--primary-color);
}

.tab-content {
    padding: 20px 0;
}

.alert-info {
    background-color: rgba(1, 88, 98, 0.1);
    border-color: var(--primary-color);
    color: var(--dark-color);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tabs
    var triggerTabList = [].slice.call(document.querySelectorAll('#languageTabs button'))
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)
        
        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })
});
</script>
@endsection
