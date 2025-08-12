@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa Nội dung Tổng quan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa Nội dung Tổng quan</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.overviews.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.overviews.update', $overview->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Basic Information -->
                                <div class="form-group">
                                    <label for="title">Tiêu đề <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $overview->title) }}" 
                                           placeholder="Nhập tiêu đề tổng quan">
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="paragraph_1">Đoạn văn 1 <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('paragraph_1') is-invalid @enderror" 
                                              id="paragraph_1" name="paragraph_1" rows="4" 
                                              placeholder="Nhập nội dung đoạn văn thứ nhất">{{ old('paragraph_1', $overview->paragraph_1) }}</textarea>
                                    @error('paragraph_1')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="paragraph_2">Đoạn văn 2 <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('paragraph_2') is-invalid @enderror" 
                                              id="paragraph_2" name="paragraph_2" rows="4" 
                                              placeholder="Nhập nội dung đoạn văn thứ hai">{{ old('paragraph_2', $overview->paragraph_2) }}</textarea>
                                    @error('paragraph_2')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Video Information -->
                                <div class="form-group">
                                    <label for="video_url">URL Video YouTube</label>
                                    <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                                           id="video_url" name="video_url" value="{{ old('video_url', $overview->video_url) }}" 
                                           placeholder="https://www.youtube.com/watch?v=...">
                                    <small class="form-text text-muted">Nhập URL video YouTube</small>
                                    @error('video_url')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="video_title">Tiêu đề Video</label>
                                    <input type="text" class="form-control @error('video_title') is-invalid @enderror" 
                                           id="video_title" name="video_title" value="{{ old('video_title', $overview->video_title) }}" 
                                           placeholder="Tiêu đề hiển thị cho video">
                                    @error('video_title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Buttons Configuration -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Cấu hình Nút</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="button_1_text">Nút 1 - Văn bản</label>
                                            <input type="text" class="form-control" id="button_1_text" name="button_1_text" 
                                                   value="{{ old('button_1_text', $overview->button_1_text) }}" placeholder="Văn bản nút">
                                        </div>
                                        <div class="form-group">
                                            <label for="button_1_url">Nút 1 - URL</label>
                                            <input type="text" class="form-control" id="button_1_url" name="button_1_url" 
                                                   value="{{ old('button_1_url', $overview->button_1_url) }}" placeholder="URL nút">
                                        </div>

                                        <div class="form-group">
                                            <label for="button_2_text">Nút 2 - Văn bản</label>
                                            <input type="text" class="form-control" id="button_2_text" name="button_2_text" 
                                                   value="{{ old('button_2_text', $overview->button_2_text) }}" placeholder="Văn bản nút">
                                        </div>
                                        <div class="form-group">
                                            <label for="button_2_url">Nút 2 - URL</label>
                                            <input type="text" class="form-control" id="button_2_url" name="button_2_url" 
                                                   value="{{ old('button_2_url', $overview->button_2_url) }}" placeholder="URL nút">
                                        </div>

                                        <div class="form-group">
                                            <label for="button_3_text">Nút 3 - Văn bản</label>
                                            <input type="text" class="form-control" id="button_3_text" name="button_3_text" 
                                                   value="{{ old('button_3_text', $overview->button_3_text) }}" placeholder="Văn bản nút">
                                        </div>
                                        <div class="form-group">
                                            <label for="button_3_url">Nút 3 - URL</label>
                                            <input type="text" class="form-control" id="button_3_url" name="button_3_url" 
                                                   value="{{ old('button_3_url', $overview->button_3_url) }}" placeholder="URL nút">
                                        </div>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" 
                                               {{ old('is_active', $overview->is_active) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">Kích hoạt</label>
                                    </div>
                                    <small class="form-text text-muted">Nếu bật, nội dung này sẽ được hiển thị và ẩn các nội dung khác</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Cập nhật nội dung
                            </button>
                            <a href="{{ route('admin.overviews.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
