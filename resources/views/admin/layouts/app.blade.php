<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Quản trị') - Thanh Cúc Du Học</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #F9D200;
            --secondary-color: #F57F25;
            --accent-color: #CADD2D;
            --success-color: #3EB850;
            --dark-color: #015862;
            --light-gray: #f8f9fa;
            --border-color: #dee2e6;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-gray);
        }
        
        .sidebar {
            background: linear-gradient(135deg, var(--dark-color) 0%, #024a52 100%);
            min-height: 100vh;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 2px 10px;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        
        .main-content {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin: 20px;
            padding: 30px;
        }
        
        .navbar-brand {
            color: white !important;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 8px;
            font-weight: 500;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(249, 210, 0, 0.4);
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--dark-color);
            font-weight: 600;
            border-radius: 15px 15px 0 0 !important;
            border: none;
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .table thead th {
            background-color: var(--light-gray);
            border: none;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .badge {
            border-radius: 20px;
            padding: 6px 12px;
            font-weight: 500;
        }
        
        .alert {
            border: none;
            border-radius: 10px;
            padding: 15px 20px;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid var(--border-color);
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(249, 210, 0, 0.25);
        }
        
        .stats-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--dark-color);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(249, 210, 0, 0.3);
        }
        
        .stats-card .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stats-card .stats-label {
            font-size: 0.9rem;
            font-weight: 500;
            opacity: 0.8;
        }
        
        .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .dropdown-item:hover {
            background-color: var(--light-gray);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -250px;
                width: 250px;
                z-index: 1050;
                transition: left 0.3s ease;
            }
            
            .sidebar.show {
                left: 0;
            }
            
            .main-content {
                margin: 10px;
                padding: 20px;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4 class="navbar-brand">
                            <i class="fas fa-graduation-cap me-2"></i>
                            Thanh Cúc Admin
                        </h4>
                        <hr class="text-white-50">
                    </div>
                    
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}" 
                               href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}" 
                               href="{{ route('admin.contacts.index') }}">
                                <i class="fas fa-envelope"></i>
                                Quản lý liên hệ
                                @if(isset($newContactsCount) && $newContactsCount > 0)
                                    <span class="badge bg-danger ms-2">{{ $newContactsCount }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.exam-registrations*') ? 'active' : '' }}" 
                               href="{{ route('admin.exam-registrations.index') }}">
                                <i class="fas fa-user-plus"></i>
                                Quản lý đăng ký lịch thi
                                @if(isset($stats['pending_exam_registrations']) && $stats['pending_exam_registrations'] > 0)
                                    <span class="badge bg-warning ms-2">{{ $stats['pending_exam_registrations'] }}</span>
                                @endif
                            </a>
                        </li>
                        
                        <li class="nav-item mt-2">
                            <small class="text-white-50 px-3">QUẢN LÝ NỘI DUNG</small>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.sliders*') ? 'active' : '' }}" 
                               href="{{ route('admin.sliders.index') }}">
                                <i class="fas fa-images"></i>
                                Slider trang chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}" 
                               href="{{ route('admin.testimonials.index') }}">
                                <i class="fas fa-quote-right"></i>
                                Nhận xét học viên
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.courses*') ? 'active' : '' }}" 
                               href="{{ route('admin.courses.index') }}">
                                <i class="fas fa-book-open"></i>
                                Quản lý khóa học
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.course-offers*') ? 'active' : '' }}" 
                               href="{{ route('admin.course-offers.index') }}">
                                <i class="fas fa-gift"></i>
                                Ưu đãi khóa học
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.teachers*') ? 'active' : '' }}" 
                               href="{{ route('admin.teachers.index') }}">
                                <i class="fas fa-chalkboard-teacher"></i>
                                Quản lý giảng viên
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.achievements*') ? 'active' : '' }}" 
                               href="{{ route('admin.achievements.index') }}">
                                <i class="fas fa-trophy"></i>
                                Bảng vàng thành tích
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.reasons*') ? 'active' : '' }}" 
                               href="{{ route('admin.reasons.index') }}">
                                <i class="fas fa-heart"></i>
                                Lý do chọn Thanh Cúc
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.schedules*') ? 'active' : '' }}" 
                               href="{{ route('admin.schedules.index') }}">
                                <i class="fas fa-calendar-alt"></i>
                                Lịch khai giảng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.exam-schedules*') ? 'active' : '' }}" 
                               href="{{ route('admin.exam-schedules.index') }}">
                                <i class="fas fa-calendar-check"></i>
                                Quản lý lịch thi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.about*') ? 'active' : '' }}" 
                               href="{{ route('admin.about.index') }}">
                                <i class="fas fa-users"></i>
                                Về chúng tôi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.overviews*') ? 'active' : '' }}" 
                               href="{{ route('admin.overviews.index') }}">
                                <i class="fas fa-info-circle"></i>
                                Nội dung tổng quan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.galleries*') ? 'active' : '' }}" 
                               href="{{ route('admin.galleries.index') }}">
                                <i class="fas fa-photo-video"></i>
                                Quản lý Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.news*') ? 'active' : '' }}" 
                               href="{{ route('admin.news.index') }}">
                                <i class="fas fa-newspaper"></i>
                                Quản lý Tin tức
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.student-results*') ? 'active' : '' }}" 
                               href="{{ route('admin.student-results.index') }}">
                                <i class="fas fa-chart-line"></i>
                                Kết quả học viên
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}" 
                               href="{{ route('admin.settings.index') }}">
                                <i class="fas fa-cogs"></i>
                                Cài đặt website
                            </a>
                        </li>
                        

                        
                        <li class="nav-item mt-2">
                            <small class="text-white-50 px-3">TÀI KHOẢN</small>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.profile*') ? 'active' : '' }}" 
                               href="{{ route('admin.profile') }}">
                                <i class="fas fa-user-cog"></i>
                                Thông tin cá nhân
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <hr class="text-white-50">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                                <i class="fas fa-external-link-alt"></i>
                                Xem website
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start" 
                                        data-confirm="Bạn có chắc muốn đăng xuất?"
                                        data-confirm-type="info"
                                        data-confirm-title="Xác nhận đăng xuất">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Đăng xuất
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-0">
                <!-- Top navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4">
                    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" 
                            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="navbar-nav ms-auto">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" 
                               id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-2"></i>
                                {{ session('admin_user')['name'] ?? 'Admin' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <i class="fas fa-user me-2"></i>Thông tin cá nhân
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('admin.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Page content -->
                <div class="main-content">
                    <!-- Messagebox Component handles all messages -->

                    <!-- Page header -->
                    @hasSection('header')
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            @yield('header')
                        </div>
                    @endif

                    <!-- Page content -->
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Admin Messagebox Component -->
    @include('admin.components.messagebox')
    
    <!-- Admin Confirmation Modal Component -->
    @include('admin.components.confirmation-modal')

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js for dashboard -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- jQuery UI for sortable -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>


    <!-- Confirmation Modal Helper -->
    <script src="{{ asset('admin/js/confirmation-helpers.js') }}"></script>
    
    <script>
        // Message notifications are handled by the messagebox component
        
        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.navbar-toggler');
            const sidebar = document.querySelector('.sidebar');
            
            if (sidebarToggle && sidebar) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
                
                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', function(e) {
                    if (window.innerWidth < 768 && 
                        !sidebar.contains(e.target) && 
                        !sidebarToggle.contains(e.target)) {
                        sidebar.classList.remove('show');
                    }
                });
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>