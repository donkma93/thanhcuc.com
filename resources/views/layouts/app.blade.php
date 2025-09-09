<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Trang chủ')</title>
    <meta name="description" content="@yield('description', 'Trung tâm tiếng Đức Thanh Cúc - Học tiếng Đức chuyên nghiệp, luyện thi chứng chỉ Goethe, TestDaF. Lịch khai giảng, lịch thi và kết quả học viên.')">
    <meta name="keywords" content="học tiếng Đức, luyện thi Goethe, TestDaF, chứng chỉ tiếng Đức, trung tâm tiếng Đức, lịch khai giảng, lịch thi">
    
    <!-- Cache and Navigation Meta Tags -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 day">
    
    <!-- Mobile optimization meta tags -->
    <meta name="theme-color" content="#015862">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Thanh Cúc">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=yes">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom Animations -->
    <link href="{{ asset('css/animations.css') }}" rel="stylesheet">
    <!-- Global Site Styles -->
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <!-- Carousel Styles -->
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <!-- Consolidated Responsive Styles -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    
    
    <style>
        :root {
            /* New Color Palette - #015862 as Primary */
            --primary-color: #015862;
            --primary-color-rgb: 1, 88, 98;
            --secondary-color: #F9D200;
            --secondary-color-rgb: 249, 210, 0;
            --accent-color: #F57F25;
            --accent-color-rgb: 245, 127, 37;
            --success-color: #3EB850;
            --success-color-rgb: 62, 184, 80;
            --highlight-color: #CADD2D;
            --highlight-color-rgb: 202, 221, 45;
            
            /* Derived Colors */
            --warning-color: #F57F25;
            --danger-color: #dc3545;
            --info-color: #3EB850;
            --light-color: #f8f9fa;
            
            /* Text Colors */
            --text-primary: #015862;
            --text-secondary: #2c5530;
            --text-muted: #6c757d;
            --text-light: #ffffff;
            
            /* Background Gradients */
            --bg-primary: linear-gradient(135deg, #015862 0%, #3EB850 100%);
            --bg-secondary: linear-gradient(135deg, #F9D200 0%, #F57F25 100%);
            --bg-accent: linear-gradient(135deg, #F57F25 0%, #CADD2D 100%);
            --bg-warm: linear-gradient(135deg, #F57F25 0%, #F9D200 100%);
            --bg-cool: linear-gradient(135deg, #015862 0%, #3EB850 100%);
            --bg-highlight: linear-gradient(135deg, #CADD2D 0%, #3EB850 100%);
            
            /* Legacy support */
            --navy-light: #015862;
            --navy-lighter: #3EB850;
            --dark-color: #015862;
            --dark-color-rgb: 1, 88, 98;
        }
        
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* Keyframe Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        
        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% {
                transform: translateY(0);
            }
            40%, 43% {
                transform: translateY(-10px);
            }
            70% {
                transform: translateY(-5px);
            }
            90% {
                transform: translateY(-2px);
            }
        }
        
        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        
        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        
        @keyframes typewriter {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }
        
        @keyframes blink {
            from, to {
                border-color: transparent;
            }
            50% {
                border-color: var(--primary-color);
            }
        }
        
        /* Animation Classes */
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-fade-in-left {
            animation: fadeInLeft 0.8s ease-out forwards;
        }
        
        .animate-fade-in-right {
            animation: fadeInRight 0.8s ease-out forwards;
        }
        
        .animate-fade-in-down {
            animation: fadeInDown 0.8s ease-out forwards;
        }
        
        .animate-pulse {
            animation: pulse 2s infinite;
        }
        
        .animate-bounce {
            animation: bounce 2s infinite;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Initial hidden state for animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        
        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Stagger animation delays */
        .animate-delay-1 { animation-delay: 0.1s; }
        .animate-delay-2 { animation-delay: 0.2s; }
        .animate-delay-3 { animation-delay: 0.3s; }
        .animate-delay-4 { animation-delay: 0.4s; }
        .animate-delay-5 { animation-delay: 0.5s; }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .navbar-brand:hover {
            transform: scale(1.05);
            color: var(--secondary-color) !important;
        }
        
        .navbar-brand .logo-img {
            height: 72px; /* larger, more prominent */
            width: auto;
            transition: transform 0.3s ease;
            filter: drop-shadow(0 4px 10px rgba(0,0,0,0.18));
        }
        
        .navbar-brand:hover .logo-img {
            transform: scale(1.08) translateY(-1px);
        }
        
        /* Footer logo */
        .footer-logo {
            height: 40px;
            width: auto;
            filter: brightness(1.2) drop-shadow(0 1px 2px rgba(0,0,0,0.3));
        }
        
        /* Responsive design */
        @media (max-width: 992px) and (min-width: 769px) {
            .navbar-brand .logo-img {
                height: 64px;
            }
        }
        
        @media (max-width: 768px) {
            .navbar-brand .logo-img {
                height: 56px;
            }
            .footer-logo {
                height: 35px;
            }
            .navbar-nav .nav-link {
                font-size: 0.85rem;
                padding: 0.6rem 0.8rem;
                margin: 0.1rem 0;
            }
            .navbar-nav .nav-link i {
                font-size: 0.85rem;
                margin-right: 0.4rem;
            }
            .navbar-nav {
                /* Removed gap for mobile consistency */
            }
            
            /* Mobile viewport optimization */
            body {
                font-size: 16px !important; /* Prevent zoom on iOS */
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
            
            /* Mobile touch improvements */
            * {
                -webkit-tap-highlight-color: rgba(1, 88, 98, 0.2);
            }
            
            /* Smooth scrolling for mobile */
            html {
                scroll-behavior: smooth;
                -webkit-overflow-scrolling: touch;
            }
            
            /* Mobile container improvements */
            .container-fluid {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            /* Mobile modal improvements */
            .modal {
                padding: 0 !important;
            }
            
            .modal-dialog {
                margin: 10px;
                max-width: calc(100vw - 20px);
            }
        }
        
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--success-color));
            background-size: 200% 200%;
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            transform: perspective(1px) translateZ(0);
            color: white;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-primary:hover {
            background-position: 100% 0;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .btn-secondary {
            background: linear-gradient(45deg, var(--secondary-color), #dc2626);
            background-size: 200% 200%;
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-position: 100% 0;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.3);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-color);
            transition: left 0.3s ease;
            z-index: -1;
        }
        
        .btn-outline-primary:hover {
            color: white;
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }
        
        .btn-outline-primary:hover::before {
            left: 0;
        }
        
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        .text-accent-color {
            color: var(--accent-color) !important;
        }
        
        .bg-primary {
            background-color: var(--primary-color) !important;
        }
        
        /* Hero Slider Styles */
        .hero-slider-section {
            position: relative;
            z-index: 1;
        }
        
        .hero-slide {
            min-height: 100vh;
            position: initial;
            overflow: hidden;
        }
        
        /* Removed grain overlay to keep slider image crisp */
        /* Make full-slide link look like regular content (no underline, inherit color) */
        .hero-slider-section .carousel-item > a {
            text-decoration: none !important;
            color: inherit !important;
            cursor: pointer;
            display: block;
        }
        .hero-slider-section .carousel-item > a:hover,
        .hero-slider-section .carousel-item > a:focus,
        .hero-slider-section .carousel-item > a:active {
            text-decoration: none !important;
            color: inherit !important;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }

        /* Unified hero text colors to match site palette */
        .hero-title {
            color: #ffc107;
            text-shadow: none !important;
        }
        .hero-desc {
            color: #F57F25;
            text-shadow: none !important;
        }
        
        /* Carousel indicators moved to carousel.css */
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 7%;
            z-index: 3;
        }
        
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 56px;
            height: 56px;
            background-size: 45%;
            background-position: center;
            background-repeat: no-repeat;
            /* background-image: none; keep default arrow, just style the container */
            background-color: transparent;
            /* background: linear-gradient(135deg, #ff8c00, #ffc107); */
            border-radius: 50%;
            box-shadow: 0 8px 24px rgba(255, 140, 0, 0.35), 0 2px 6px rgba(0, 0, 0, 0.15);
            /* border: 2px solid rgba(255, 255, 255, 0.85); */
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }
        
        .carousel-control-prev:hover .carousel-control-prev-icon,
        .carousel-control-next:hover .carousel-control-next-icon {
            transform: scale(1.08);
            box-shadow: 0 10px 28px rgba(255, 140, 0, 0.5), 0 4px 12px rgba(0, 0, 0, 0.2);
            /* background: linear-gradient(135deg, #ffc107, #ff8c00); */
        }
        
        /* Registration Modal Styles */
        .registration-modal-content {
            border: none;
            border-radius: 25px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }
        
        .modal-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            animation: modalIconPulse 2s infinite;
            box-shadow: 0 8px 25px rgba(249, 210, 0, 0.3);
        }
        
        .modal-icon i {
            font-size: 2.5rem;
            color: white;
        }
        
        @keyframes modalIconPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .benefits-list {
            list-style: none;
            padding: 0;
        }
        
        .benefits-list li {
            padding: 8px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        
        .urgency-banner {
            background: linear-gradient(135deg, rgba(249, 210, 0, 0.1) 0%, rgba(245, 127, 37, 0.1) 100%);
            border-radius: 15px;
            padding: 15px;
            border-left: 4px solid var(--secondary-color);
            border: 2px solid rgba(245, 127, 37, 0.2);
        }
        
        .modal-registration-form .input-group-text {
            background: var(--primary-color);
            color: var(--dark-color);
            border: none;
            border-radius: 10px 0 0 10px;
            font-weight: 600;
        }
        
        .modal-registration-form .form-control,
        .modal-registration-form .form-select {
            border: 2px solid #e9ecef;
            border-left: none;
            border-radius: 0 10px 10px 0;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .modal-registration-form .form-control:focus,
        .modal-registration-form .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(249, 210, 0, 0.25);
            outline: none;
        }
        
        .modal-registration-form textarea.form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            resize: vertical;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .modal-registration-form textarea.form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(249, 210, 0, 0.25);
            outline: none;
        }
        
        .btn-pulse {
            animation: btnPulse 2s infinite;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 25px;
            padding: 15px 30px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 30px rgba(245, 127, 37, 0.4);
            color: var(--dark-color);
        }
        
        .btn-pulse:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(245, 127, 37, 0.6);
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
            color: var(--dark-color);
        }
        
        @keyframes btnPulse {
            0%, 100% { 
                box-shadow: 0 10px 30px rgba(245, 127, 37, 0.4);
                transform: scale(1);
            }
            50% { 
                box-shadow: 0 15px 40px rgba(245, 127, 37, 0.6);
                transform: scale(1.02);
            }
        }
        
        /* Modal Alert Styles */
        .registration-modal-content .alert {
            border-radius: 15px;
            border: none;
            font-size: 14px;
            margin-bottom: 20px;
        }
        
        .registration-modal-content .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }
        
        .registration-modal-content .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
        }
        
        .registration-modal-content .alert ul {
            padding-left: 20px;
            margin-bottom: 0;
        }
        
        /* Navbar z-index fix */
        .navbar {
            z-index: 1030 !important;
            padding: 0.9rem 0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            backdrop-filter: saturate(140%) blur(6px);
            background: rgba(255,255,255,0.9) !important;
        }
        
        .navbar .container {
            /* Removed max-width for full width navbar */
        }
        
        .navbar-nav {
            margin: 0 auto;
            /* Removed gap for better spacing */
        }
        
        .navbar-nav .nav-item {
            margin: 0 0.8rem;
        }

        .navbar-nav .nav-link {
            padding: 0.9rem 1.1rem;
            font-weight: 600;
            letter-spacing: 0.3px;
        }
        .navbar-nav .nav-link i { margin-right: 0.4rem; }

        /* Spread out menu like the reference: more spacing and subtle separators */
        @media (min-width: 992px) {
            .navbar .container { max-width: 1440px; }
            .navbar-nav { gap: 0.25rem; }
            .navbar-nav .nav-link {
                border-radius: 999px;
                transition: background-color 0.2s ease, color 0.2s ease;
            }
            .navbar-nav .nav-link:hover {
                background-color: rgba(1, 88, 98, 0.08);
                color: var(--primary-color) !important;
            }
        }

        /* Navbar action buttons: redesigned for harmony */
        .navbar .btn-nav {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.2px;
            padding: 0.5rem 0.95rem;
            min-height: 40px;
            border-radius: 999px;
            transition: transform 0.15s ease, box-shadow 0.2s ease, background-color 0.2s ease, color 0.2s ease;
        }

        .navbar .btn-nav:hover { transform: translateY(-1px); }

        .navbar .btn-nav .btn-nav-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .navbar .btn-nav-outline {
            border: 2px solid var(--primary-color, #015862);
            color: var(--primary-color, #015862) !important;
            background: #fff;
            box-shadow: 0 2px 8px rgba(1, 88, 98, 0.08);
        }
        .navbar .btn-nav-outline .btn-nav-icon { background: rgba(1, 88, 98, 0.08); color: var(--primary-color, #015862); }
        .navbar .btn-nav-outline:hover { background: rgba(1, 88, 98, 0.06); box-shadow: 0 4px 14px rgba(1, 88, 98, 0.14); }

        .navbar .btn-nav-solid {
            border: 0;
            color: #fff !important;
            background: linear-gradient(135deg, var(--primary-color, #015862), #3EB850);
            box-shadow: 0 8px 18px rgba(1, 88, 98, 0.18);
        }
        .navbar .btn-nav-solid .btn-nav-icon { background: rgba(255, 255, 255, 0.2); color: #fff; }
        .navbar .btn-nav-solid:hover { box-shadow: 0 10px 22px rgba(1, 88, 98, 0.22); }

        /* Call button variant */
        .navbar .btn-nav-call {
            border: 0;
            color: #fff !important;
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            box-shadow: 0 10px 22px rgba(39, 174, 96, 0.22);
        }
        .navbar .btn-nav-call .btn-nav-icon { background: rgba(255,255,255,0.2); color: #fff; }
        .navbar .btn-nav-call:hover { box-shadow: 0 12px 26px rgba(39, 174, 96, 0.28); }
        
        /* Modal Responsive */
        @media (max-width: 991.98px) {
            .modal-dialog {
                margin: 15px;
            }
            
            .registration-modal-content {
                border-radius: 20px;
            }
            
            .modal-body .row {
                flex-direction: column-reverse;
            }
            
            .benefits-section {
                margin-top: 20px;
            }
        }
        
        @media (max-width: 767.98px) {
            .modal-dialog {
                margin: 10px;
            }
            
            .modal-body {
                padding: 20px 15px;
            }
            
            .modal-icon {
                width: 60px;
                height: 60px;
            }
            
            .modal-icon i {
                font-size: 2rem;
            }
            
            .modal-title {
                font-size: 1.2rem;
            }
            
            .benefits-list li {
                font-size: 13px;
            }
        }
        
        .feature-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background: white;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px) rotateX(5deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        
        .feature-card:hover::before {
            opacity: 0.05;
        }
        
        .feature-card .card-body {
            position: relative;
            z-index: 1;
        }
        
        .feature-card i {
            transition: all 0.3s ease;
        }
        
        .feature-card:hover i {
            transform: scale(1.2) rotate(10deg);
            color: var(--primary-color);
        }
        
        .teacher-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            position: relative;
        }
        
        .teacher-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, var(--primary-color), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .teacher-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
        
        .teacher-card:hover::after {
            opacity: 0.1;
        }
        
        .teacher-card img {
            transition: transform 0.3s ease;
        }
        
        .teacher-card:hover img {
            transform: scale(1.1);
        }
        
        .teacher-avatar {
            object-fit: cover;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 3px solid var(--primary-color);
        }
        
        .teacher-avatar:hover {
            transform: scale(1.05);
            border-color: var(--secondary-color);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        
        .teacher-avatar-placeholder {
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .teacher-avatar-placeholder:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        
        .course-badge {
            background-color: var(--secondary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .stats-section {
            background-color: var(--light-color);
        }
        
        .footer {
            background-color: var(--dark-color);
            color: white;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            margin: 0 0.2rem;
            border-radius: 8px;
            color: var(--dark-color) !important;
        }
        
        .navbar-nav .nav-link i {
            transition: all 0.3s ease;
            color: var(--dark-color);
            font-size: 0.9rem;
            margin-right: 0.5rem;
            width: 16px;
            text-align: center;
        }
        
        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-1px);
            background-color: rgba(1, 88, 98, 0.1);
            box-shadow: 0 2px 8px rgba(1, 88, 98, 0.2);
        }
        
        .navbar-nav .nav-link:hover i {
            color: var(--secondary-color);
            transform: scale(1.1) rotate(5deg);
        }
        
        .navbar-nav .nav-link:hover::before {
            width: 80%;
        }
        
        .navbar-nav .nav-link.active {
            background-color: rgba(1, 88, 98, 0.15);
            box-shadow: 0 2px 8px rgba(1, 88, 98, 0.3);
        }
        
        .navbar-nav .nav-link.active i {
            color: var(--secondary-color);
        }
        
        .navbar-nav .nav-link.active::before {
            width: 80%;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            pointer-events: none;
        }
        
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }
        
        .dropdown-item {
            transition: all 0.3s ease;
            padding: 0.5rem 1.5rem;
            position: relative;
        }
        
        .dropdown-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--primary-color);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .dropdown-item:hover {
            background-color: rgba(19, 38, 91, 0.1);
            color: var(--primary-color);
            padding-left: 2rem;
        }
        
        .dropdown-item:hover::before {
            transform: scaleY(1);
        }
        
        /* Social Media Icons Animation */
        .footer .text-light {
            transition: all 0.3s ease;
        }
        
        .footer a.text-light {
            position: relative;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .footer a.text-light:hover {
            color: var(--secondary-color) !important;
            transform: translateY(-3px) scale(1.2);
        }
        
        .footer a.text-light i {
            transition: all 0.3s ease;
        }
        
                .footer a.text-light:hover i {
            animation: bounce 1s ease;
        }

        /* Contact Widget Container - Independent Layer */
        #contact-widget-container {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            pointer-events: none !important;
            z-index: 999999 !important;
            overflow: visible !important;
        }
        
        /* Contact Widget - Always Visible */
        .contact-widget {
            position: absolute !important;
            bottom: 20px !important;
            right: 20px !important;
            z-index: 1 !important;
            pointer-events: none;
            display: flex !important;
            flex-direction: column;
            gap: 15px;
            margin: 0 !important;
            padding: 0 !important;
            float: none !important;
            clear: none !important;
            top: auto !important;
            left: auto !important;
        }
        
        .contact-widget * {
            pointer-events: auto;
        }
        
        /* Restore styling for contact buttons */
        .contact-widget .contact-btn {
            /* Reset the widget container overrides for buttons */
            box-sizing: border-box !important;
            border-radius: 50% !important;
            transition: all 0.3s ease !important;
            animation: pulseGlow 2s ease-in-out infinite, float 3s ease-in-out infinite !important;
        }

        .contact-btn {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            animation: pulseGlow 2s ease-in-out infinite;
            position: relative;
            overflow: hidden;
        }

        .contact-btn:nth-child(1) { animation-delay: 0s; }
        .contact-btn:nth-child(2) { animation-delay: 0.7s; }
        .contact-btn:nth-child(3) { animation-delay: 1.4s; }

        .contact-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            transition: transform 0.3s ease;
        }

        .contact-btn:hover::before {
            transform: scale(1);
        }

        .contact-btn.facebook {
            background: #1877f2;
        }

        .contact-btn.zalo {
            background: #0068ff;
        }

        .contact-btn.phone {
            background: #25d366;
        }

        .contact-btn:hover {
            transform: scale(1.15) translateX(-8px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
            animation-play-state: paused;
        }

        .contact-btn i {
            color: white;
            font-size: 20px;
            position: relative;
            z-index: 2;
            transition: transform 0.3s ease;
        }

        .contact-btn:hover i {
            transform: scale(1.1) rotate(5deg);
        }

        /* Pulse Glow Animation */
        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                transform: scale(1);
            }
            50% {
                box-shadow: 0 6px 30px rgba(0, 0, 0, 0.4);
                transform: scale(1.05);
            }
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        .contact-btn.facebook {
            animation: pulseGlow 2s ease-in-out infinite, float 3s ease-in-out infinite;
        }

        .contact-btn.zalo {
            animation: pulseGlow 2s ease-in-out infinite, float 3s ease-in-out infinite 1s;
        }

        .contact-btn.phone {
            animation: pulseGlow 2s ease-in-out infinite, float 3s ease-in-out infinite 2s;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .contact-widget {
                position: absolute !important;
                bottom: 15px !important;
                right: 15px !important;
                gap: 10px !important;
                z-index: 1 !important;
                margin: 0 !important;
                padding: 0 !important;
                float: none !important;
                top: auto !important;
                left: auto !important;
            }
            
            .contact-toggle {
                width: 55px;
                height: 55px;
            }
            
            .contact-toggle i {
                font-size: 20px;
            }
            
            .contact-btn {
                width: 45px;
                height: 45px;
            }
            
            .contact-btn i {
                font-size: 16px;
            }
        }
        
        /* Extra small devices */
        @media (max-width: 576px) {
            .contact-widget {
                position: absolute !important;
                bottom: 10px !important;
                right: 10px !important;
                gap: 8px !important;
                z-index: 1 !important;
                margin: 0 !important;
                padding: 0 !important;
                float: none !important;
                top: auto !important;
                left: auto !important;
            }
            
            .contact-btn {
                width: 40px;
                height: 40px;
            }
            
            .contact-btn i {
                font-size: 14px;
            }
        }
        
        /* Fix layout spacing issues */
        body {
            margin: 0 !important;
            padding: 0 !important;
            overflow-x: hidden;
        }
        
        main {
            margin: 0 !important;
            padding: 0 !important;
        }
        
        /* Ensure footer doesn't have extra spacing */
        .footer {
            margin: 0 !important;
        }
        
        /* Remove any clearfix issues and ensure proper positioning */
        .contact-widget::after,
        .contact-widget::before {
            display: none !important;
        }
        
        /* Loading animation */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Parallax effect */
        .parallax-element {
            transition: transform 0.1s ease-out;
        }
        
        /* Text reveal animation */
        .text-reveal {
            overflow: hidden;
            position: relative;
        }
        
        .text-reveal .text-content {
            display: inline-block;
            opacity: 0;
            transform: translateY(100%);
            animation: textReveal 0.8s ease-out forwards;
        }
        
        @keyframes textReveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Counter animation */
        .counter {
            font-weight: bold;
            font-size: 2rem;
        }
        
        /* Glowing effect */
        .glow-effect {
            position: relative;
        }
        
        .glow-effect::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color), var(--primary-color));
            border-radius: inherit;
            opacity: 0;
            filter: blur(10px);
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        
        .glow-effect:hover::before {
            opacity: 0.7;
        }
        
        /* Testimonials Slider Styles */
        .testimonial-card {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            height: 100%;
        }
        
        .testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
        }
        
        .testimonial-avatar {
            border: 3px solid var(--primary-color);
            object-fit: cover;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .testimonial-avatar:hover {
            transform: scale(1.1);
            border-color: var(--secondary-color);
        }
        
        /* Carousel indicators moved to carousel.css */
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }
        
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
        }
        
        .carousel-control-icon {
            background: rgba(0, 123, 255, 1);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .carousel-control-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        
        .testimonial-author h5 {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Responsive testimonials and teachers */
        @media (max-width: 768px) {
            .testimonial-card .card-body {
                padding: 1.5rem !important;
            }
            
            .testimonial-avatar {
                width: 70px !important;
                height: 70px !important;
            }
            
            /* Teacher avatar responsive */
            .teacher-avatar {
                width: 140px !important;
                height: 140px !important;
            }
            
            .teacher-avatar-placeholder {
                width: 140px !important;
                height: 140px !important;
            }
            
            .teacher-avatar-placeholder i {
                font-size: 3rem !important;
            }
            
            /* Carousel indicators moved to carousel.css */
            
            .carousel-control-icon {
                width: 40px;
                height: 40px;
            }
            
            #testimonialsCarousel .col-lg-4 {
                margin-bottom: 1rem;
            }
        }
        
        @media (max-width: 576px) {
            .testimonial-card .card-body {
                padding: 1rem !important;
            }
            
            .testimonial-avatar {
                width: 60px !important;
                height: 60px !important;
            }
            
            /* Teacher avatar mobile */
            .teacher-avatar {
                width: 120px !important;
                height: 120px !important;
            }
            
            .teacher-avatar-placeholder {
                width: 120px !important;
                height: 120px !important;
            }
            
            .teacher-avatar-placeholder i {
                font-size: 2.5rem !important;
            }
            
            .testimonial-card p {
                font-size: 0.9rem;
            }
        }
      
        /* Ensure page content is always visible */
        html, body {
            background-color: #ffffff;
        }
        
        .main-content {
            opacity: 1;
        }
        
        /* Prevent flash of unstyled content */
        .container, .container-fluid {
            opacity: 1;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" style="z-index: 1050;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo/thanh-cuc-logo.png') }}" alt="Thanh Cúc Logo" class="logo-img">
            </a>
            
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="navbar-collapse" id="navbarNav">
                <!-- Mobile Menu Header -->
                <div class="mobile-menu-header d-lg-none">
                    <h5>Menu Chính</h5>
                </div>
                
                <!-- Close Button for Mobile -->
                <button class="navbar-close d-lg-none" type="button" onclick="window.closeMobileMenu()">
                    <i class="fas fa-times"></i>
                </button>
                
                <ul class="navbar-nav me-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-2"></i>TRANG CHỦ
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('ve-chung-toi') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="fas fa-users me-2"></i>VỀ CHÚNG TÔI
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('lich-khai-giang') ? 'active' : '' }}" href="{{ route('schedule') }}">
                            <i class="fas fa-calendar-alt me-2"></i>LỊCH KHAI GIẢNG
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('lich-thi') ? 'active' : '' }}" href="{{ route('exam-schedule') }}">
                            <i class="fas fa-calendar-check me-2"></i>LỊCH THI
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('ket-qua-hoc-vien') ? 'active' : '' }}" href="{{ route('results') }}">
                            <i class="fas fa-trophy me-2"></i>KẾT QUẢ HỌC VIÊN
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tin-tuc*') ? 'active' : '' }}" href="{{ route('news') }}">
                            <i class="fas fa-newspaper me-2"></i>TIN TỨC
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('lien-he') ? 'active' : '' }}" href="{{ route('contact') }}">
                            <i class="fas fa-phone-alt me-2"></i>LIÊN HỆ
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center">
                    @php 
                        $hotlineRaw = $footerSettings['company_phone'] ?? '0975186230';
                        $hotlineLabel = $footerSettings['company_phone_display'] ?? $hotlineRaw;
                    @endphp
                    <a href="tel:{{ $hotlineRaw }}" class="btn-nav btn-nav-call" title="Gọi: {{ $hotlineRaw }}">
                        <span class="btn-nav-icon"><i class="fas fa-phone"></i></span>
                        {{ $hotlineLabel }}
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Mobile Menu Backdrop -->
    <div class="navbar-backdrop" id="navbarBackdrop" onclick="window.closeMobileMenu()"></div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Contact Widget Container - Completely Independent -->
    <div id="contact-widget-container" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; pointer-events: none; z-index: 999999;">
        <!-- Contact Widget - Always Visible -->
        <div class="contact-widget">
        @if(isset($footerSettings['facebook_url']) && $footerSettings['facebook_url'])
            <a href="{{ $footerSettings['facebook_url'] }}" target="_blank" class="contact-btn facebook" title="Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
        @endif

        @if(isset($footerSettings['company_phone_display']) && $footerSettings['company_phone_display'])
            <a href="https://zalo.me/{{ preg_replace('/[^0-9]/', '', $footerSettings['company_phone_display']) }}" target="_blank" class="contact-btn zalo" title="Zalo">
                <i class="fas fa-comments"></i>
            </a>
        @endif

        @if(isset($footerSettings['company_phone_display']) && $footerSettings['company_phone_display'])
            <a href="tel:{{ $footerSettings['company_phone_display'] }}" class="contact-btn phone" title="Gọi điện: {{ $footerSettings['company_phone_display'] }}">
                <i class="fas fa-phone"></i>
            </a>
        @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Advanced Animations -->
    <script src="{{ asset('js/advanced-animations.js') }}"></script>
    <!-- Mobile Course Cards Optimization -->
    <script src="{{ asset('js/mobile-courses.js') }}"></script>
    
    <!-- Animation and Interaction Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure contact widget is properly positioned
            function ensureContactWidgetPosition() {
                const container = document.getElementById('contact-widget-container');
                const contactWidget = document.querySelector('.contact-widget');
                
                if (container) {
                    // Force container positioning
                    container.style.position = 'fixed';
                    container.style.top = '0';
                    container.style.left = '0';
                    container.style.width = '100vw';
                    container.style.height = '100vh';
                    container.style.pointerEvents = 'none';
                    container.style.zIndex = '999999';
                    container.style.overflow = 'visible';
                }
                
                if (contactWidget) {
                    // Force widget positioning within container
                    contactWidget.style.position = 'absolute';
                    contactWidget.style.bottom = '20px';
                    contactWidget.style.right = '20px';
                    contactWidget.style.zIndex = '1';
                    contactWidget.style.display = 'flex';
                    contactWidget.style.flexDirection = 'column';
                    contactWidget.style.gap = '15px';
                    contactWidget.style.margin = '0';
                    contactWidget.style.padding = '0';
                    contactWidget.style.float = 'none';
                    contactWidget.style.clear = 'none';
                    contactWidget.style.top = 'auto';
                    contactWidget.style.left = 'auto';
                    contactWidget.style.transform = 'translateZ(0)';
                }
            }
            
            // Run on load
            ensureContactWidgetPosition();
            
            // Run on resize
            window.addEventListener('resize', ensureContactWidgetPosition);
            
            // Run on scroll (in case something changes)
            window.addEventListener('scroll', ensureContactWidgetPosition);
            // Fix for browser back button white page issue
            window.addEventListener('pageshow', function(event) {
                // Force page refresh if coming from cache (back button)
                if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                    // Ensure page is visible
                    document.body.style.opacity = '1';
                    document.body.style.transform = 'scale(1)';
                    document.body.classList.add('page-loaded');
                    
                    // Re-initialize any necessary components
                    const navbar = document.querySelector('.navbar .navbar-collapse');
                    if (navbar && navbar.classList.contains('show')) {
                        navbar.classList.remove('show');
                    }
                }
            });
            
            // Mobile Navigation Functions
            window.openMobileMenu = function() {
                const navbar = document.querySelector('.navbar .navbar-collapse');
                const backdrop = document.getElementById('navbarBackdrop');
                const body = document.body;
                
                if (navbar && backdrop) {
                    navbar.classList.add('show');
                    backdrop.classList.add('show');
                    body.classList.add('navbar-open');
                }
            };
            
            window.closeMobileMenu = function() {
                const navbar = document.querySelector('.navbar .navbar-collapse');
                const backdrop = document.getElementById('navbarBackdrop');
                const body = document.body;
                
                if (navbar && backdrop) {
                    navbar.classList.remove('show');
                    backdrop.classList.remove('show');
                    body.classList.remove('navbar-open');
                }
            };
            
            // Override Bootstrap's default mobile menu behavior
            const navbarToggler = document.querySelector('.navbar-toggler');
            if (navbarToggler) {
                navbarToggler.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.openMobileMenu();
                });
            }
            
            // Close menu when clicking on nav links (mobile only)
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        window.closeMobileMenu();
                    }
                });
            });
            
            // Close menu on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    window.closeMobileMenu();
                }
            });
            
            // Close menu on window resize to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    window.closeMobileMenu();
                }
            });
            
            // Prevent page from being cached in a way that causes issues
            window.addEventListener('beforeunload', function() {
                // Don't manipulate page appearance on unload
                // This was causing the white page issue
            });
            
            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, observerOptions);
            
            // Observe all elements with animate-on-scroll class
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
            

            
            // Counter animation
            function animateCounter(element, target, duration = 2000) {
                let start = 0;
                const increment = target / (duration / 16);
                
                function updateCounter() {
                    start += increment;
                    if (start < target) {
                        element.textContent = Math.floor(start);
                        requestAnimationFrame(updateCounter);
                    } else {
                        element.textContent = target;
                    }
                }
                updateCounter();
            }
            
            // Observe counters
            const counterObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-target'));
                        animateCounter(counter, target);
                        counterObserver.unobserve(counter);
                    }
                });
            });
            
            document.querySelectorAll('.counter').forEach(counter => {
                counterObserver.observe(counter);
            });
            
            // Typing animation
            function typeWriter(element, text, speed = 100) {
                let i = 0;
                element.innerHTML = '';
                
                function type() {
                    if (i < text.length) {
                        element.innerHTML += text.charAt(i);
                        i++;
                        setTimeout(type, speed);
                    }
                }
                type();
            }
            
            // Initialize typing animation for elements with data-typewriter
            document.querySelectorAll('[data-typewriter]').forEach(element => {
                const text = element.getAttribute('data-typewriter');
                const speed = parseInt(element.getAttribute('data-speed')) || 100;
                
                const typingObserver = new IntersectionObserver(function(entries) {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            typeWriter(entry.target, text, speed);
                            typingObserver.unobserve(entry.target);
                        }
                    });
                });
                
                typingObserver.observe(element);
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Add loading animation to buttons on click
            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', function() {
                    if (!this.classList.contains('loading')) {
                        const originalText = this.innerHTML;
                        this.classList.add('loading');
                        this.innerHTML = '<span class="loading-spinner"></span> Loading...';
                        
                        // Remove loading state after 2 seconds (adjust as needed)
                        setTimeout(() => {
                            this.classList.remove('loading');
                            this.innerHTML = originalText;
                        }, 2000);
                    }
                });
            });
            
            // Mouse parallax effect removed per user request
            
            // Add stagger animation to cards
            function addStaggerAnimation(selector, animationClass, delay = 100) {
                const elements = document.querySelectorAll(selector);
                elements.forEach((element, index) => {
                    setTimeout(() => {
                        element.classList.add(animationClass);
                    }, index * delay);
                });
            }
            
            // Initialize stagger animations when elements come into view
            const staggerObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const container = entry.target;
                        const cards = container.querySelectorAll('.feature-card, .teacher-card');
                        cards.forEach((card, index) => {
                            setTimeout(() => {
                                card.classList.add('animate-fade-in-up');
                            }, index * 150);
                        });
                        staggerObserver.unobserve(container);
                    }
                });
            });
            
            document.querySelectorAll('.row').forEach(row => {
                if (row.querySelector('.feature-card, .teacher-card')) {
                    staggerObserver.observe(row);
                }
            });
            
            // Add hover sound effect (optional)
            function playHoverSound() {
                // You can add audio files and play them on hover
                // const audio = new Audio('/sounds/hover.mp3');
                // audio.volume = 0.1;
                // audio.play().catch(() => {}); // Ignore errors if audio fails
            }
            
            // Add hover effects to interactive elements
            document.querySelectorAll('.btn, .feature-card, .teacher-card').forEach(element => {
                element.addEventListener('mouseenter', playHoverSound);
            });
            
            // Initialize page with fade in (improved for back button compatibility)
            if (!document.body.classList.contains('page-loaded')) {
                document.body.style.opacity = '0';
                document.body.style.transition = 'opacity 0.3s ease';
                
                setTimeout(() => {
                    document.body.style.opacity = '1';
                    document.body.classList.add('page-loaded');
                }, 50);
            }
        });
        
        // Utility function to add animation classes
        function addAnimationClass(element, animationClass, delay = 0) {
            setTimeout(() => {
                element.classList.add(animationClass);
            }, delay);
        }
        
        // Function to create floating particles (optional)
        function createFloatingParticles(container, count = 20) {
            for (let i = 0; i < count; i++) {
                const particle = document.createElement('div');
                particle.style.cssText = `
                    position: absolute;
                    width: 4px;
                    height: 4px;
                    background: rgba(37, 99, 235, 0.3);
                    border-radius: 50%;
                    pointer-events: none;
                    animation: float ${3 + Math.random() * 4}s ease-in-out infinite;
                    animation-delay: ${Math.random() * 2}s;
                    left: ${Math.random() * 100}%;
                    top: ${Math.random() * 100}%;
                `;
                container.appendChild(particle);
            }
        }
        
        // Initialize floating particles for hero section
        document.addEventListener('DOMContentLoaded', function() {
            const heroSection = document.querySelector('.hero-section');
            if (heroSection) {
                heroSection.style.position = 'relative';
                createFloatingParticles(heroSection, 15);
            }
        });
    </script>
    
    <!-- Registration Modal Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if modal has been shown before (using localStorage)
            const modalShown = localStorage.getItem('registrationModalShown');
            const modalDismissed = sessionStorage.getItem('registrationModalDismissed');
            
            // Only show modal if it hasn't been shown before and not dismissed in this session
            if (!modalShown && !modalDismissed) {
                // Show modal after 5 seconds
                setTimeout(function() {
                    const registrationModal = new bootstrap.Modal(document.getElementById('registrationModal'), {
                        backdrop: true,
                        keyboard: true
                    });
                    registrationModal.show();
                    
                    // Mark as shown
                    localStorage.setItem('registrationModalShown', 'true');
                }, 5000);
            }
            
            // Handle modal dismiss
            const modalElement = document.getElementById('registrationModal');
            if (modalElement) {
                modalElement.addEventListener('hidden.bs.modal', function() {
                    // Mark as dismissed for this session
                    sessionStorage.setItem('registrationModalDismissed', 'true');
                });
                
                // Reset localStorage after 24 hours (show modal again tomorrow)
                const lastShown = localStorage.getItem('registrationModalLastShown');
                const now = new Date().getTime();
                const oneDay = 24 * 60 * 60 * 1000; // 24 hours in milliseconds
                
                if (lastShown && (now - parseInt(lastShown)) > oneDay) {
                    localStorage.removeItem('registrationModalShown');
                    localStorage.removeItem('registrationModalLastShown');
                }
                
                // Set last shown time when modal is displayed
                modalElement.addEventListener('shown.bs.modal', function() {
                    localStorage.setItem('registrationModalLastShown', now.toString());
                });
            }
            
            // Handle browser back button when modal is open (simplified)
            let modalInstance = null;
            
            // Store modal instance when shown
            if (modalElement) {
                modalElement.addEventListener('shown.bs.modal', function() {
                    modalInstance = bootstrap.Modal.getInstance(modalElement);
                });
                
                modalElement.addEventListener('hidden.bs.modal', function() {
                    modalInstance = null;
                });
            }
            
            // Handle popstate (back button) event - simplified approach
            window.addEventListener('popstate', function(event) {
                // Only close modal if it's open, don't manipulate history
                if (modalInstance && modalElement && modalElement.classList.contains('show')) {
                    modalInstance.hide();
                }
            });
            
            // Add click tracking for analytics (optional)
            const submitButton = document.querySelector('.modal-registration-form button[type="submit"]');
            if (submitButton) {
                submitButton.addEventListener('click', function() {
                    // Track modal form submission
                    console.log('Modal registration form submitted');
                    
                    // You can add Google Analytics or other tracking here
                    // gtag('event', 'modal_registration_submit', {
                    //     'event_category': 'engagement',
                    //     'event_label': 'registration_modal'
                    // });
                });
            }
        });
    </script>
    
    @stack('scripts')
    
    <!-- Include Mobile Bottom Navigation -->
    @include('partials.mobile-bottom-nav')
</body>
</html>
