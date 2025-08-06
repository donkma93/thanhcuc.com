@extends('admin.layouts.app')

@section('title', 'Demo Confirmation Modal')

@section('header')
    <h1 class="h3 mb-0">
        <i class="fas fa-question-circle me-2"></i>
        Demo Confirmation Modal
    </h1>
    <div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay lại Dashboard
        </a>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-play-circle me-2"></i>
                    Demo Confirmation Modal
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-4">
                    Đây là trang demo để test confirmation modal. Modal sẽ hiển thị ở giữa màn hình với backdrop blur.
                </p>

                <div class="row g-4">
                    <!-- Basic Confirmations -->
                    <div class="col-md-6">
                        <div class="card border-primary">
                            <div class="card-header bg-primary text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-check-circle me-2"></i>
                                    Basic Confirmations
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-3">
                                    <button type="button" class="btn btn-danger" onclick="testBasicConfirm()">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        Basic Confirm (Danger)
                                    </button>
                                    
                                    <button type="button" class="btn btn-warning" onclick="testWarningConfirm()">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        Warning Confirm
                                    </button>
                                    
                                    <button type="button" class="btn btn-info" onclick="testInfoConfirm()">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Info Confirm
                                    </button>
                                    
                                    <button type="button" class="btn btn-success" onclick="testSuccessConfirm()">
                                        <i class="fas fa-check-circle me-2"></i>
                                        Success Confirm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Confirmations -->
                    <div class="col-md-6">
                        <div class="card border-danger">
                            <div class="card-header bg-danger text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-trash me-2"></i>
                                    Delete Confirmations
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-3">
                                    <button type="button" class="btn btn-outline-danger" onclick="testDeleteConfirm()">
                                        <i class="fas fa-trash me-2"></i>
                                        Delete Item
                                    </button>
                                    
                                    <button type="button" class="btn btn-outline-danger" onclick="testDeleteUser()">
                                        <i class="fas fa-user-times me-2"></i>
                                        Delete User
                                    </button>
                                    
                                    <button type="button" class="btn btn-outline-danger" onclick="testDeleteMultiple()">
                                        <i class="fas fa-trash-alt me-2"></i>
                                        Delete Multiple Items
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Attributes -->
                    <div class="col-md-6">
                        <div class="card border-success">
                            <div class="card-header bg-success text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-code me-2"></i>
                                    Data Attributes
                                </h6>
                            </div>
                            <div class="card-body">
                                <p class="small text-muted mb-3">
                                    Sử dụng data attributes để tự động bind confirmation:
                                </p>
                                
                                <div class="d-grid gap-3">
                                    <a href="#" class="btn btn-outline-primary" 
                                       data-confirm="Bạn có muốn thực hiện hành động này không?"
                                       data-confirm-type="info"
                                       data-confirm-title="Xác nhận hành động">
                                        <i class="fas fa-link me-2"></i>
                                        Link with data-confirm
                                    </a>
                                    
                                    <button type="button" class="btn btn-outline-warning"
                                            data-delete="Testimonial của Nguyễn Văn A"
                                            onclick="event.preventDefault();">
                                        <i class="fas fa-trash me-2"></i>
                                        Button with data-delete
                                    </button>
                                    
                                    <button type="button" class="btn btn-outline-danger"
                                            data-confirm="Bạn có chắc chắn muốn reset tất cả dữ liệu?"
                                            data-confirm-type="danger"
                                            data-confirm-title="Cảnh báo!"
                                            data-confirm-text="Reset ngay"
                                            data-cancel-text="Không, giữ lại"
                                            onclick="event.preventDefault();">
                                        <i class="fas fa-redo me-2"></i>
                                        Custom Texts
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- AJAX Actions -->
                    <div class="col-md-6">
                        <div class="card border-warning">
                            <div class="card-header bg-warning text-dark">
                                <h6 class="mb-0">
                                    <i class="fas fa-sync me-2"></i>
                                    AJAX Actions
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-3">
                                    <button type="button" class="btn btn-outline-primary" onclick="testAjaxAction()">
                                        <i class="fas fa-cloud me-2"></i>
                                        AJAX Action (Success)
                                    </button>
                                    
                                    <button type="button" class="btn btn-outline-danger" onclick="testAjaxError()">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        AJAX Action (Error)
                                    </button>
                                    
                                    <button type="button" class="btn btn-outline-info" onclick="testAjaxLoading()">
                                        <i class="fas fa-spinner me-2"></i>
                                        AJAX with Loading
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Confirmations -->
                    <div class="col-12">
                        <div class="card border-info">
                            <div class="card-header bg-info text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-wpforms me-2"></i>
                                    Form Confirmations
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form data-confirm="Bạn có chắc chắn muốn gửi form này?"
                                              data-confirm-type="warning"
                                              data-confirm-title="Xác nhận gửi form">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Tên:</label>
                                                <input type="text" class="form-control" name="name" value="Test User">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email:</label>
                                                <input type="email" class="form-control" name="email" value="test@example.com">
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-paper-plane me-2"></i>
                                                Submit Form
                                            </button>
                                        </form>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <form id="deleteForm" action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mb-3">
                                                <label class="form-label">Item to delete:</label>
                                                <select class="form-select" name="item_id">
                                                    <option value="1">Item 1</option>
                                                    <option value="2">Item 2</option>
                                                    <option value="3">Item 3</option>
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-danger"
                                                    data-confirm="Bạn có chắc chắn muốn xóa item đã chọn?"
                                                    data-confirm-type="danger"
                                                    data-form="deleteForm">
                                                <i class="fas fa-trash me-2"></i>
                                                Delete Selected
                                            </button>
                                        </form>
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

<script>
// Basic confirmation tests
function testBasicConfirm() {
    confirmAction(
        'Đây là một confirmation dialog cơ bản. Bạn có muốn tiếp tục không?',
        function() {
            showSuccess('Bạn đã xác nhận hành động!');
        },
        function() {
            showInfo('Bạn đã hủy hành động.');
        }
    );
}

function testWarningConfirm() {
    confirmWarning(
        'Đây là một cảnh báo quan trọng. Hành động này có thể ảnh hưởng đến dữ liệu của bạn.',
        function() {
            showSuccess('Bạn đã tiếp tục dù có cảnh báo!');
        }
    );
}

function testInfoConfirm() {
    confirmInfo(
        'Đây là thông tin quan trọng mà bạn cần biết trước khi tiếp tục.',
        function() {
            showSuccess('Bạn đã đọc và đồng ý với thông tin!');
        }
    );
}

function testSuccessConfirm() {
    showConfirmation({
        title: 'Hoàn thành!',
        message: 'Quá trình đã hoàn thành thành công. Bạn có muốn xem kết quả không?',
        type: 'success',
        confirmText: 'Xem kết quả',
        cancelText: 'Đóng',
        onConfirm: function() {
            showSuccess('Đang chuyển đến trang kết quả...');
        }
    });
}

// Delete confirmation tests
function testDeleteConfirm() {
    confirmDelete(
        'Bài viết "Hướng dẫn học tiếng Đức"',
        function() {
            showSuccess('Đã xóa bài viết thành công!');
        }
    );
}

function testDeleteUser() {
    confirmDelete(
        'Người dùng "Nguyễn Văn A"',
        function() {
            showSuccess('Đã xóa người dùng thành công!');
        }
    );
}

function testDeleteMultiple() {
    showConfirmation({
        title: 'Xác nhận xóa hàng loạt',
        message: 'Bạn có chắc chắn muốn xóa 5 mục đã chọn? Hành động này không thể hoàn tác.',
        type: 'danger',
        confirmText: 'Xóa tất cả',
        cancelText: 'Hủy bỏ',
        onConfirm: function() {
            showSuccess('Đã xóa 5 mục thành công!');
        }
    });
}

// AJAX action tests
function testAjaxAction() {
    showConfirmation({
        title: 'Xác nhận AJAX',
        message: 'Bạn có muốn thực hiện AJAX request không?',
        type: 'info',
        onConfirm: function() {
            // Simulate successful AJAX
            return new Promise((resolve) => {
                setTimeout(() => {
                    showSuccess('AJAX request thành công!');
                    resolve();
                }, 2000);
            });
        }
    });
}

function testAjaxError() {
    showConfirmation({
        title: 'Test AJAX Error',
        message: 'Test AJAX request sẽ fail. Bạn có muốn thử không?',
        type: 'warning',
        onConfirm: function() {
            // Simulate failed AJAX
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                    showError('AJAX request thất bại!');
                    reject(new Error('Simulated error'));
                }, 2000);
            });
        }
    });
}

function testAjaxLoading() {
    showConfirmation({
        title: 'Test Loading State',
        message: 'Test loading state trong 3 giây. Bạn có muốn thử không?',
        type: 'info',
        onConfirm: function() {
            return new Promise((resolve) => {
                setTimeout(() => {
                    showSuccess('Loading hoàn thành!');
                    resolve();
                }, 3000);
            });
        }
    });
}
</script>
@endsection
