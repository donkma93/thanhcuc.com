@extends('admin.layouts.app')

@section('title', 'Chi tiết Nội dung Tổng quan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết Nội dung Tổng quan</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.overviews.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Quay lại
                        </a>
                        <a href="{{ route('admin.overviews.edit', $overview->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Basic Information -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Thông tin cơ bản</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="150">ID:</th>
                                            <td>{{ $overview->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tiêu đề:</th>
                                            <td><strong>{{ $overview->title }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái:</th>
                                            <td>
                                                @if($overview->is_active)
                                                    <span class="badge badge-success">Kích hoạt</span>
                                                @else
                                                    <span class="badge badge-secondary">Ẩn</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Ngày tạo:</th>
                                            <td>{{ $overview->created_at->format('d/m/Y H:i:s') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Cập nhật lần cuối:</th>
                                            <td>{{ $overview->updated_at->format('d/m/Y H:i:s') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title">Nội dung</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h6>Đoạn văn 1:</h6>
                                        <p class="text-muted">{{ $overview->paragraph_1 }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <h6>Đoạn văn 2:</h6>
                                        <p class="text-muted">{{ $overview->paragraph_2 }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title">Cấu hình Nút</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @if($overview->button_1_text)
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <h6>Nút 1</h6>
                                                        <p class="mb-2"><strong>{{ $overview->button_1_text }}</strong></p>
                                                        <small class="text-muted">{{ $overview->button_1_url }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($overview->button_2_text)
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <h6>Nút 2</h6>
                                                        <p class="mb-2"><strong>{{ $overview->button_2_text }}</strong></p>
                                                        <small class="text-muted">{{ $overview->button_2_url }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($overview->button_3_text)
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <h6>Nút 3</h6>
                                                        <p class="mb-2"><strong>{{ $overview->button_3_text }}</strong></p>
                                                        <small class="text-muted">{{ $overview->button_3_url }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Video Information -->
                            @if($overview->video_url)
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Thông tin Video</h5>
                                    </div>
                                    <div class="card-body">
                                        @if($overview->video_embed_url)
                                            <div class="mb-3">
                                                <div class="video-wrapper" style="padding-top: 56.25%; position: relative;">
                                                    <iframe src="{{ $overview->video_embed_url }}" 
                                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                            frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <strong>URL Video:</strong><br>
                                            <a href="{{ $overview->video_url }}" target="_blank" class="text-primary">
                                                {{ $overview->video_url }}
                                            </a>
                                        </div>
                                        @if($overview->video_title)
                                            <div class="mb-3">
                                                <strong>Tiêu đề Video:</strong><br>
                                                <span class="text-muted">{{ $overview->video_title }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Thông tin Video</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">Chưa có video được cấu hình</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Preview -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5 class="card-title">Xem trước</h5>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Nội dung này sẽ hiển thị trên trang chủ như sau:</p>
                                    <div class="border rounded p-3 bg-light">
                                        <h6>{{ $overview->title }}</h6>
                                        <p class="small text-muted mb-2">{{ Str::limit($overview->paragraph_1, 100) }}</p>
                                        <p class="small text-muted">{{ Str::limit($overview->paragraph_2, 100) }}</p>
                                        @if($overview->is_active)
                                            <span class="badge badge-success">Đang hiển thị</span>
                                        @endif
                                    </div>
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
