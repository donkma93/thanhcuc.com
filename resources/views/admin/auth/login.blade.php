<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng nhập - Quản trị Thanh Cúc</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #F9D200;
            --secondary-color: #F57F25;
            --accent-color: #CADD2D;
            --success-color: #3EB850;
            --dark-color: #015862;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--dark-color) 0%, #024a52 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            margin: 20px;
        }
        
        .login-left {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 60px 40px;
            color: var(--dark-color);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 500px;
        }
        
        .login-right {
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 500px;
        }
        
        .logo {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        
        .login-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .login-subtitle {
            font-size: 1.1rem;
            opacity: 0.8;
            margin-bottom: 30px;
        }
        
        .form-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .form-control {
            border-radius: 12px;
            border: 2px solid #e9ecef;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(249, 210, 0, 0.25);
        }
        
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        
        .input-group i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 10;
        }
        
        .input-group .form-control {
            padding-left: 55px;
            margin-bottom: 0;
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 12px;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-color);
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(249, 210, 0, 0.4);
            color: var(--dark-color);
        }
        
        .alert {
            border: none;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 20px;
        }
        
        .features {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }
        
        .features li {
            padding: 10px 0;
            font-size: 1rem;
            opacity: 0.9;
        }
        
        .features li i {
            margin-right: 10px;
            width: 20px;
        }
        
        .back-to-site {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .back-to-site:hover {
            color: var(--primary-color);
            transform: translateX(-5px);
        }
        
        @media (max-width: 768px) {
            .login-container {
                margin: 10px;
            }
            
            .login-left,
            .login-right {
                padding: 40px 30px;
                min-height: auto;
            }
            
            .login-title {
                font-size: 2rem;
            }
            
            .form-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('home') }}" class="back-to-site">
        <i class="fas fa-arrow-left me-2"></i>
        Về trang chủ
    </a>
    
    <div class="login-container">
        <div class="row g-0">
            <!-- Left side - Branding -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="login-left">
                    <div class="logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h1 class="login-title">Thanh Cúc</h1>
                    <p class="login-subtitle">Hệ thống quản trị du học nghề Đức</p>
                    
                    <ul class="features">
                        <li><i class="fas fa-chart-line"></i> Thống kê chi tiết</li>
                        <li><i class="fas fa-users"></i> Quản lý liên hệ</li>
                        <li><i class="fas fa-envelope"></i> Theo dõi tư vấn</li>
                        <li><i class="fas fa-download"></i> Xuất báo cáo</li>
                        <li><i class="fas fa-shield-alt"></i> Bảo mật cao</li>
                    </ul>
                </div>
            </div>
            
            <!-- Right side - Login form -->
            <div class="col-lg-6">
                <div class="login-right">
                    <h2 class="form-title">Đăng nhập</h2>
                    
                    <!-- Messagebox Component handles all messages -->
                    
                    <form action="{{ route('admin.login.submit') }}" method="POST">
                        @csrf
                        
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" 
                                   placeholder="Email đăng nhập"
                                   value="{{ old('email') }}"
                                   required>
                        </div>
                        
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" 
                                   placeholder="Mật khẩu"
                                   required>
                        </div>
                        
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Đăng nhập
                        </button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <small class="text-muted">
                            <i class="fas fa-shield-alt me-1"></i>
                            Trang quản trị được bảo mật
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
        
        // Focus on first input
        document.addEventListener('DOMContentLoaded', function() {
            const firstInput = document.querySelector('input[name="email"]');
            if (firstInput) {
                firstInput.focus();
            }
        });
    </script>

    <!-- Admin Messagebox Component -->
    @include('admin.components.messagebox')
</body>
</html>