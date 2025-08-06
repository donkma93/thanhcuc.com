@extends('admin.layouts.app')

@section('title', 'Demo Admin Actions')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Demo Admin Actions</h1>
        <p class="text-muted">Kiểm tra các tính năng admin actions với messagebox</p>
    </div>
</div>

<div class="row">
    <!-- Delete Actions -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-trash me-2"></i>Delete Actions
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Các nút xóa với confirmation dialog.</p>
                
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-danger btn-delete" 
                       data-url="/admin/demo/delete/1" 
                       data-name="Khóa học Laravel">
                        <i class="fas fa-trash me-2"></i>Xóa Khóa học
                    </a>
                    <a href="#" class="btn btn-outline-danger btn-delete" 
                       data-url="/admin/demo/delete/2" 
                       data-name="Testimonial từ Nguyễn Văn A"
                       data-message="Bạn có chắc chắn muốn xóa testimonial này không?">
                        <i class="fas fa-trash me-2"></i>Xóa Testimonial (Custom Message)
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Toggle -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-toggle-on me-2"></i>Status Toggle
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Thay đổi trạng thái với confirmation.</p>
                
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-success btn-toggle-status" 
                       data-url="/admin/demo/toggle/1" 
                       data-action="kích hoạt"
                       data-name="Khóa học PHP">
                        <i class="fas fa-eye me-2"></i>Kích hoạt
                    </a>
                    <a href="#" class="btn btn-warning btn-toggle-status" 
                       data-url="/admin/demo/toggle/2" 
                       data-action="đánh dấu nổi bật"
                       data-name="Chương trình React">
                        <i class="fas fa-star me-2"></i>Đánh dấu nổi bật
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Actions -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-list me-2"></i>Bulk Actions Demo
                </h5>
            </div>
            <div class="card-body">
                <form class="bulk-action-form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select name="action" class="form-select">
                                <option value="">-- Chọn hành động --</option>
                                <option value="activate">Kích hoạt</option>
                                <option value="deactivate">Vô hiệu hóa</option>
                                <option value="feature">Đánh dấu nổi bật</option>
                                <option value="delete">Xóa</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-play me-2"></i>Thực hiện
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="50">
                                        <input type="checkbox" class="form-check-input" id="selectAll">
                                    </th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="selected_items[]" value="1">
                                    </td>
                                    <td>Khóa học Laravel</td>
                                    <td><span class="badge bg-success">Hoạt động</span></td>
                                    <td>{{ now()->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="selected_items[]" value="2">
                                    </td>
                                    <td>Khóa học PHP</td>
                                    <td><span class="badge bg-warning">Chờ duyệt</span></td>
                                    <td>{{ now()->subDay()->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="selected_items[]" value="3">
                                    </td>
                                    <td>Khóa học React</td>
                                    <td><span class="badge bg-danger">Tạm dừng</span></td>
                                    <td>{{ now()->subDays(2)->format('d/m/Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- AJAX Form -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-wifi me-2"></i>AJAX Form
                </h5>
            </div>
            <div class="card-body">
                <form class="ajax-form" action="{{ route('admin.demo.messagebox.form') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ajaxName" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="ajaxName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="ajaxEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="ajaxEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="ajaxMessage" class="form-label">Tin nhắn</label>
                        <textarea class="form-control" id="ajaxMessage" name="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-2"></i>Gửi (AJAX)
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Quick Edit & Auto Save -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-edit me-2"></i>Quick Edit & Auto Save
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Quick Edit Demo</label>
                    <div class="d-flex align-items-center">
                        <span class="me-2">Tên khóa học: <strong>Laravel Cơ bản</strong></span>
                        <button type="button" class="btn btn-sm btn-outline-primary btn-quick-edit"
                                data-url="/admin/demo/quick-edit/1"
                                data-field="name"
                                data-value="Laravel Cơ bản"
                                data-name="Khóa học #1">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Auto Save Demo</label>
                    <div class="form-check">
                        <input class="form-check-input auto-save" type="checkbox" 
                               data-url="/admin/demo/auto-save/1" 
                               name="is_featured" 
                               id="autoSaveDemo">
                        <label class="form-check-label" for="autoSaveDemo">
                            Đánh dấu nổi bật (tự động lưu)
                        </label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="autoSaveSelect" class="form-label">Trạng thái (Auto Save)</label>
                    <select class="form-select auto-save" 
                            data-url="/admin/demo/auto-save/1" 
                            name="status" 
                            id="autoSaveSelect">
                        <option value="draft">Nháp</option>
                        <option value="published" selected>Đã xuất bản</option>
                        <option value="archived">Lưu trữ</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Sortable List -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-sort me-2"></i>Sortable List
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Kéo thả để sắp xếp thứ tự.</p>
                
                <ul class="list-group sortable-list" data-sort-url="/admin/demo/sort-order">
                    <li class="list-group-item d-flex align-items-center" data-id="1">
                        <i class="fas fa-grip-vertical sort-handle me-3 text-muted" style="cursor: move;"></i>
                        <span>Khóa học Laravel</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center" data-id="2">
                        <i class="fas fa-grip-vertical sort-handle me-3 text-muted" style="cursor: move;"></i>
                        <span>Khóa học PHP</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center" data-id="3">
                        <i class="fas fa-grip-vertical sort-handle me-3 text-muted" style="cursor: move;"></i>
                        <span>Khóa học React</span>
                    </li>
                    <li class="list-group-item d-flex align-items-center" data-id="4">
                        <i class="fas fa-grip-vertical sort-handle me-3 text-muted" style="cursor: move;"></i>
                        <span>Khóa học Vue.js</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copy to Clipboard -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-copy me-2"></i>Copy to Clipboard
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">URL Khóa học</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="https://thanhcuc.com/khoa-hoc/laravel-co-ban" readonly>
                        <button class="btn btn-outline-secondary btn-copy" 
                                data-text="https://thanhcuc.com/khoa-hoc/laravel-co-ban">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Mã nhúng</label>
                    <div class="input-group">
                        <textarea class="form-control" rows="2" readonly><iframe src="https://thanhcuc.com/embed/course/1" width="100%" height="400"></iframe></textarea>
                        <button class="btn btn-outline-secondary btn-copy" 
                                data-text='<iframe src="https://thanhcuc.com/embed/course/1" width="100%" height="400"></iframe>'>
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Select all checkbox functionality
$(document).ready(function() {
    $('#selectAll').on('change', function() {
        const isChecked = $(this).is(':checked');
        $('input[name="selected_items[]"]').prop('checked', isChecked);
    });
    
    // Update select all when individual checkboxes change
    $('input[name="selected_items[]"]').on('change', function() {
        const totalCheckboxes = $('input[name="selected_items[]"]').length;
        const checkedCheckboxes = $('input[name="selected_items[]"]:checked').length;
        
        $('#selectAll').prop('checked', totalCheckboxes === checkedCheckboxes);
    });
});
</script>
@endpush