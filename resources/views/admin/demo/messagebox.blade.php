@extends('admin.layouts.app')

@section('title', 'Demo Messagebox')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Demo Messagebox System</h1>
        <p class="text-muted">Kiểm tra và demo tất cả các loại messagebox</p>
    </div>
</div>

<div class="row">
    <!-- Session-based Messages -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-server me-2"></i>Session-based Messages
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Các thông báo được lưu trong session và hiển thị sau khi redirect.</p>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.demo.messagebox.session', ['type' => 'success']) }}" class="btn btn-success">
                        <i class="fas fa-check-circle me-2"></i>Success Message
                    </a>
                    <a href="{{ route('admin.demo.messagebox.session', ['type' => 'error']) }}" class="btn btn-danger">
                        <i class="fas fa-exclamation-circle me-2"></i>Error Message
                    </a>
                    <a href="{{ route('admin.demo.messagebox.session', ['type' => 'warning']) }}" class="btn btn-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>Warning Message
                    </a>
                    <a href="{{ route('admin.demo.messagebox.session', ['type' => 'info']) }}" class="btn btn-info">
                        <i class="fas fa-info-circle me-2"></i>Info Message
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript-based Messages -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-code me-2"></i>JavaScript-based Messages
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Các thông báo được tạo bằng JavaScript không cần reload trang.</p>
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success" onclick="showSuccess('Đây là thông báo thành công từ JavaScript!')">
                        <i class="fas fa-check-circle me-2"></i>Success Message
                    </button>
                    <button type="button" class="btn btn-danger" onclick="showError('Đây là thông báo lỗi từ JavaScript!')">
                        <i class="fas fa-exclamation-circle me-2"></i>Error Message
                    </button>
                    <button type="button" class="btn btn-warning" onclick="showWarning('Đây là thông báo cảnh báo từ JavaScript!')">
                        <i class="fas fa-exclamation-triangle me-2"></i>Warning Message
                    </button>
                    <button type="button" class="btn btn-info" onclick="showInfo('Đây là thông báo thông tin từ JavaScript!')">
                        <i class="fas fa-info-circle me-2"></i>Info Message
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Dialogs -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-question-circle me-2"></i>Confirmation Dialogs
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Hộp thoại xác nhận với callback functions.</p>
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary" onclick="demoConfirm()">
                        <i class="fas fa-question me-2"></i>Simple Confirmation
                    </button>
                    <button type="button" class="btn btn-danger" onclick="demoDeleteConfirm()">
                        <i class="fas fa-trash me-2"></i>Delete Confirmation
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- AJAX Messages -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-wifi me-2"></i>AJAX Messages
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">Thông báo từ AJAX responses tự động.</p>
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success" onclick="demoAjaxSuccess()">
                        <i class="fas fa-check-circle me-2"></i>AJAX Success
                    </button>
                    <button type="button" class="btn btn-danger" onclick="demoAjaxError()">
                        <i class="fas fa-exclamation-circle me-2"></i>AJAX Error
                    </button>
                    <button type="button" class="btn btn-warning" onclick="demoAjax422()">
                        <i class="fas fa-exclamation-triangle me-2"></i>Validation Error (422)
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Features -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-cogs me-2"></i>Advanced Features
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Auto Dismiss</h6>
                        <p class="text-muted small">Thông báo tự động ẩn sau thời gian nhất định.</p>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="showSuccess('Thông báo này sẽ tự ẩn sau 3 giây!', 'Auto Dismiss', 3000)">
                            Test Auto Dismiss
                        </button>
                    </div>
                    <div class="col-md-4">
                        <h6>Multiple Messages</h6>
                        <p class="text-muted small">Hiển thị nhiều thông báo cùng lúc.</p>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="demoMultiple()">
                            Show Multiple
                        </button>
                    </div>
                    <div class="col-md-4">
                        <h6>Keyboard Shortcuts</h6>
                        <p class="text-muted small">Nhấn ESC để đóng tất cả thông báo.</p>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="showInfo('Nhấn ESC để đóng tất cả thông báo!')">
                            Test ESC Key
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Demo -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-wpforms me-2"></i>Form Validation Demo
                </h5>
            </div>
            <div class="card-body">
                <form id="demoForm" action="{{ route('admin.demo.messagebox.form') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Tin nhắn</label>
                        <textarea class="form-control" id="message" name="message" rows="3">{{ old('message') }}</textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-2"></i>Submit Form
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="submitFormAjax('#demoForm')">
                            <i class="fas fa-wifi me-2"></i>Submit via AJAX
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Demo functions
function demoConfirm() {
    showConfirm(
        'Bạn có chắc chắn muốn thực hiện hành động này?',
        'Xác nhận',
        function() {
            showSuccess('Bạn đã xác nhận!');
        },
        function() {
            showInfo('Bạn đã hủy bỏ!');
        }
    );
}

function demoDeleteConfirm() {
    showConfirm(
        'Bạn có chắc chắn muốn xóa? Hành động này không thể hoàn tác!',
        'Xác nhận xóa',
        function() {
            showSuccess('Đã xóa thành công!');
        },
        function() {
            showWarning('Đã hủy bỏ việc xóa!');
        }
    );
}

function demoAjaxSuccess() {
    $.post('{{ route("admin.demo.messagebox.ajax") }}', {
        type: 'success',
        _token: '{{ csrf_token() }}'
    });
}

function demoAjaxError() {
    $.post('{{ route("admin.demo.messagebox.ajax") }}', {
        type: 'error',
        _token: '{{ csrf_token() }}'
    });
}

function demoAjax422() {
    $.post('{{ route("admin.demo.messagebox.ajax") }}', {
        type: 'validation',
        _token: '{{ csrf_token() }}'
    });
}

function demoMultiple() {
    showSuccess('Thông báo thành công!');
    setTimeout(() => showWarning('Thông báo cảnh báo!'), 500);
    setTimeout(() => showInfo('Thông báo thông tin!'), 1000);
    setTimeout(() => showError('Thông báo lỗi!'), 1500);
}

// Form submission demo
$(document).ready(function() {
    $('#demoForm').on('submit', function(e) {
        // Let the form submit normally for demo
    });
});
</script>
@endpush