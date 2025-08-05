@extends('admin.layouts.app')

@section('title', 'Thông tin cá nhân')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-user-cog me-2"></i>
            Thông tin cá nhân
        </h1>
        <p class="text-muted mb-0">Quản lý thông tin tài khoản của bạn</p>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <!-- Profile Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-user me-2"></i>
                        Cập nhật thông tin
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $adminUser->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $adminUser->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu mới</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" placeholder="Để trống nếu không đổi">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Tối thiểu 6 ký tự</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation" 
                                           placeholder="Nhập lại mật khẩu mới">
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Cập nhật thông tin
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="fas fa-undo me-1"></i>
                                Đặt lại
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Account Info -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Thông tin tài khoản
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="avatar-circle bg-primary text-white mb-3">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <h5 class="mb-1">{{ $adminUser->name }}</h5>
                        <p class="text-muted mb-0">{{ $adminUser->email }}</p>
                    </div>
                    
                    <hr>
                    
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="mb-2">
                                <strong>Vai trò</strong>
                            </div>
                            <span class="badge bg-primary">{{ ucfirst($adminUser->role) }}</span>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <strong>Trạng thái</strong>
                            </div>
                            @if($adminUser->is_active)
                                <span class="badge bg-success">Hoạt động</span>
                            @else
                                <span class="badge bg-danger">Vô hiệu hóa</span>
                            @endif
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="small text-muted">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tạo tài khoản:</span>
                            <span>{{ $adminUser->created_at->format('d/m/Y') }}</span>
                        </div>
                        @if($adminUser->last_login_at)
                            <div class="d-flex justify-content-between">
                                <span>Đăng nhập cuối:</span>
                                <span>{{ $adminUser->last_login_at->format('d/m/Y H:i') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Security Tips -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-shield-alt me-2"></i>
                        Bảo mật tài khoản
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6 class="alert-heading">
                            <i class="fas fa-lightbulb me-1"></i>
                            Mẹo bảo mật
                        </h6>
                        <ul class="mb-0 small">
                            <li>Sử dụng mật khẩu mạnh (ít nhất 8 ký tự)</li>
                            <li>Kết hợp chữ hoa, chữ thường, số và ký tự đặc biệt</li>
                            <li>Không chia sẻ thông tin đăng nhập</li>
                            <li>Đăng xuất sau khi sử dụng xong</li>
                            <li>Thường xuyên thay đổi mật khẩu</li>
                        </ul>
                    </div>
                    
                    <div class="d-grid">
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-sign-out-alt me-1"></i>
                                Đăng xuất khỏi tất cả thiết bị
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .avatar-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
</style>
@endpush

@push('scripts')
<script>
    // Password strength indicator
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const strengthIndicator = document.getElementById('passwordStrength');
        
        if (password.length === 0) {
            if (strengthIndicator) strengthIndicator.remove();
            return;
        }
        
        let strength = 0;
        let strengthText = '';
        let strengthClass = '';
        
        // Length check
        if (password.length >= 8) strength++;
        if (password.length >= 12) strength++;
        
        // Character variety checks
        if (/[a-z]/.test(password)) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;
        
        // Determine strength level
        if (strength < 3) {
            strengthText = 'Yếu';
            strengthClass = 'text-danger';
        } else if (strength < 5) {
            strengthText = 'Trung bình';
            strengthClass = 'text-warning';
        } else {
            strengthText = 'Mạnh';
            strengthClass = 'text-success';
        }
        
        // Update or create strength indicator
        let indicator = document.getElementById('passwordStrength');
        if (!indicator) {
            indicator = document.createElement('div');
            indicator.id = 'passwordStrength';
            indicator.className = 'form-text';
            this.parentNode.appendChild(indicator);
        }
        
        indicator.innerHTML = `Độ mạnh mật khẩu: <span class="${strengthClass}">${strengthText}</span>`;
    });
    
    // Confirm password match
    document.getElementById('password_confirmation').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmPassword = this.value;
        
        if (confirmPassword.length === 0) {
            this.classList.remove('is-valid', 'is-invalid');
            return;
        }
        
        if (password === confirmPassword) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        }
    });
</script>
@endpush