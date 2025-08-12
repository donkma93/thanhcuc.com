@extends('admin.layouts.app')

@section('title', 'Quản lý Nội dung Tổng quan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản lý Nội dung Tổng quan</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.overviews.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Thêm mới
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="20%">Tiêu đề</th>
                                    <th width="15%">Video</th>
                                    <th width="10%">Trạng thái</th>
                                    <th width="15%">Ngày tạo</th>
                                    <th width="15%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($overviews as $overview)
                                    <tr>
                                        <td>{{ $overview->id }}</td>
                                        <td>
                                            <strong>{{ $overview->title }}</strong>
                                            @if($overview->is_active)
                                                <span class="badge badge-success ml-2">Đang hiển thị</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($overview->video_url)
                                                <a href="{{ $overview->video_url }}" target="_blank" class="btn btn-sm btn-info">
                                                    <i class="fas fa-play"></i> Xem video
                                                </a>
                                            @else
                                                <span class="text-muted">Không có video</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($overview->is_active)
                                                <span class="badge badge-success">Kích hoạt</span>
                                            @else
                                                <span class="badge badge-secondary">Ẩn</span>
                                            @endif
                                        </td>
                                        <td>{{ $overview->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.overviews.show', $overview->id) }}" 
                                                   class="btn btn-sm btn-info" title="Xem chi tiết">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.overviews.edit', $overview->id) }}" 
                                                   class="btn btn-sm btn-warning" title="Chỉnh sửa">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @if($overview->is_active)
                                                    <form action="{{ route('admin.overviews.toggle-active', $overview->id) }}" 
                                                          method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-secondary" title="Ẩn"
                                                                onclick="return confirm('Bạn có chắc muốn ẩn nội dung này?')">
                                                            <i class="fas fa-eye-slash"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.overviews.toggle-active', $overview->id) }}" 
                                                          method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-success" title="Kích hoạt"
                                                                onclick="return confirm('Bạn có chắc muốn kích hoạt nội dung này?')">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.overviews.destroy', $overview->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Xóa"
                                                            onclick="return confirm('Bạn có chắc muốn xóa nội dung này?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Chưa có nội dung tổng quan nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
