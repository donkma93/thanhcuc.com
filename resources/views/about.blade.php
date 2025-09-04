@extends('layouts.app')

@section('title', __('general.about_us'))

@push('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
/* ===== TRADITIONAL TAB DESIGN ===== */
.company-overview {
    background: white;
    padding: 2rem;
    border-radius: 0;
    border: none;
    box-shadow: none;
    position: relative;
    overflow: visible;
}

.company-overview::before {
    display: none;
}

/* ===== TRADITIONAL TAB DESIGN ===== */
.nav-pills {
    background: transparent;
    padding: 0;
    border-radius: 0;
    box-shadow: none;
    border: none;
    position: relative;
    display: flex;
    flex-wrap: nowrap;
    border-bottom: 1px solid #e0e0e0;
    overflow-x: auto;
    overflow-y: hidden;
}

.nav-pills .nav-link {
    border-radius: 6px 6px 0 0;
    padding: 0.75rem 1.5rem;
    margin: 0;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    border: 1px solid #e0e0e0;
    border-bottom: none;
    background: #f0f0f0;
    color: #333;
    position: relative;
    white-space: nowrap;
    min-width: 120px;
    text-align: center;
    margin-right: -1px;
}

.nav-pills .nav-link:hover {
    background: #e8e8e8;
    color: #333;
    transform: none;
    box-shadow: none;
    border-color: #e0e0e0;
}

.nav-pills .nav-link.active {
    background: white;
    color: #333;
    box-shadow: none;
    border-color: #e0e0e0;
    transform: none;
    border-bottom: 3px solid #dc3545;
    z-index: 10;
}

.nav-pills .nav-link.active::after {
    display: none;
}

/* ===== TRADITIONAL TAB CONTENT ===== */
.tab-content {
    min-height: 300px;
    background: white;
    border-radius: 0;
    border: 1px solid #e0e0e0;
    border-top: none;
    box-shadow: none;
    overflow: hidden;
    position: relative;
    margin-top: -1px;
}

.tab-content::before {
    display: none;
}

.tab-pane {
    transition: all 0.3s ease;
    padding: 2rem;
}

.tab-pane.fade {
    opacity: 0;
    transform: translateY(20px) scale(0.98);
}

.tab-pane.fade.show {
    opacity: 1;
    transform: translateY(0) scale(1);
}

/* ===== CARD ENHANCEMENT ===== */
.card {
    border: none;
    background: transparent;
    box-shadow: none;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-body {
    padding: 0;
    background: transparent;
}

/* ===== ICON STYLING ===== */
.fa-3x {
    font-size: 2.5rem;
    color: #dc3545;
    margin-bottom: 1rem;
    display: inline-block;
}

/* ===== CORE VALUES GRID ===== */
.core-value-item {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border: 1px solid rgba(0, 0, 0, 0.08);
    border-radius: 15px;
    padding: 1.5rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.core-value-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #ff6b35, #f7931e);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.core-value-item:hover::before {
    transform: scaleX(1);
}

.core-value-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    border-color: rgba(255, 107, 53, 0.3);
    background: linear-gradient(135deg, #ffffff 0%, #fff5f0 100%);
}

.core-value-item .bg-primary {
    background: #dc3545 !important;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
}

/* ===== BUTTON STYLING ===== */
.btn {
    border-radius: 50px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: none;
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn:hover::before {
    left: 100%;
}

.btn-primary {
    background: linear-gradient(135deg, #ff6b35, #f7931e);
    color: white;
    box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(255, 107, 53, 0.4);
}

.btn-danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
    color: white;
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
}

.btn-danger:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(220, 53, 69, 0.4);
}

/* ===== TEXT STYLING ===== */
.text-primary {
    color: #dc3545 !important;
    font-weight: 700;
}

.company-overview h2 {
    color: #333;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

/* ===== ANIMATIONS ===== */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.tab-pane.fade.show {
    animation: fadeInScale 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.core-value-item {
    animation: slideInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 991.98px) {
    .company-overview {
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .nav-pills .nav-link {
        padding: 0.7rem 1rem;
        font-size: 0.85rem;
        min-width: 100px;
    }
    
    .tab-pane {
        padding: 1.5rem;
    }
    
    .company-overview h2 {
        font-size: 1.75rem;
    }
}

@media (max-width: 767.98px) {
    .company-overview {
        padding: 1rem;
    }
    
    .nav-pills {
        flex-direction: row;
        flex-wrap: nowrap;
        align-items: stretch;
        border-bottom: 1px solid #e0e0e0;
        overflow-x: auto;
        overflow-y: hidden;
    }
    
    .nav-pills .nav-link {
        width: auto;
        min-width: 100px;
        max-width: none;
        margin: 0;
        border-radius: 6px 6px 0 0;
        border: 1px solid #e0e0e0;
        border-bottom: none;
        white-space: nowrap;
        flex-shrink: 0;
    }
    
    .nav-pills .nav-link.active {
        border-bottom: 3px solid #dc3545;
    }
    
    .tab-pane {
        padding: 1.5rem;
    }
    
    .company-overview h2 {
        font-size: 1.5rem;
    }
    
    .fa-3x {
        font-size: 2rem;
    }
}

@media (max-width: 575.98px) {
    .company-overview {
        padding: 0.75rem;
    }
    
    .nav-pills .nav-link {
        padding: 0.6rem 0.8rem;
        font-size: 0.8rem;
        min-width: 90px;
        max-width: none;
    }
    
    .tab-pane {
        padding: 1rem;
    }
    
    .company-overview h2 {
        font-size: 1.25rem;
    }
    
    .fa-3x {
        font-size: 1.75rem;
    }
    
    .btn {
        padding: 0.6rem 1.2rem;
        font-size: 0.85rem;
    }
    
    .teacher-card .card-body {
        padding: 1.5rem !important;
    }
    
    .teacher-avatar,
    .teacher-avatar-placeholder {
        width: 100px !important;
        height: 100px !important;
    }
}

/* ===== BUILDING IMAGE ENHANCEMENT ===== */
.building-image {
    max-width: 100%;
    height: auto;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.building-image:hover {
    transform: scale(1.03) rotate(1deg);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
}

/* ===== LIGHTNING BOLT ICONS ===== */
/* Removed lightning bolt styling */

/* ===== TEACHER CARDS STYLING ===== */
.teacher-card {
    transition: all 0.3s ease;
    overflow: hidden;
    cursor: pointer;
}

.teacher-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.teacher-avatar {
    object-fit: cover;
    border: 4px solid #f8f9fa;
    transition: transform 0.3s ease;
}

.teacher-card:hover .teacher-avatar {
    transform: scale(1.05);
}

.teacher-avatar-placeholder {
    border: 4px solid #f8f9fa;
    transition: transform 0.3s ease;
}

.teacher-card:hover .teacher-avatar-placeholder {
    transform: scale(1.05);
}

.teacher-card .badge {
    font-size: 0.8rem;
        padding: 0.5rem 1rem;
    border-radius: 20px;
}

.teacher-card .btn {
    border-radius: 20px;
    padding: 0.5rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.teacher-card .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
}

/* ===== TEACHER MODAL STYLING ===== */
#teacherDetailModal {
    z-index: 9999 !important;
}

#teacherDetailModal .modal-dialog {
    z-index: 10000 !important;
}

#teacherDetailModal .modal-content {
    z-index: 10001 !important;
    border: none;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
}

.teacher-modal-avatar {
    object-fit: cover;
    border: 8px solid #ffffff;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    transition: all 0.3s ease;
    width: 200px !important;
    height: 200px !important;
}

.teacher-modal-avatar-placeholder {
    border: 8px solid #ffffff;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    width: 200px !important;
    height: 200px !important;
}

.avatar-ring {
    position: relative;
    display: inline-block;
    padding: 10px;
}

.avatar-ring::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: linear-gradient(45deg, #dc3545, #fd7e14, #ffc107, #20c997);
    border-radius: 50%;
    z-index: -1;
    animation: rotate 4s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #dc3545, #fd7e14) !important;
}

.modal-header {
    position: relative;
    overflow: hidden;
    padding: 2rem 2rem 1.5rem 2rem;
    background: linear-gradient(135deg, #dc3545, #fd7e14) !important;
}

.modal-header-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #dc3545, #fd7e14);
    z-index: 0;
}

.position-relative.z-1 {
    position: relative;
    z-index: 1;
}

.modal-header h4 {
    font-size: 1.8rem;
    font-weight: 700;
    margin: 0;
}

.modal-header .btn-close {
    font-size: 1.5rem;
    opacity: 0.8;
    transition: all 0.3s ease;
}

.modal-header .btn-close:hover {
    opacity: 1;
    transform: scale(1.1);
}

.teacher-quick-stats {
    margin-top: 1.5rem;
}

.stat-item {
    padding: 1.5rem;
    background: white;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    border: 2px solid #f8f9fa;
}

.stat-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    border-color: #dc3545;
}

.stat-item i {
    color: #dc3545;
    margin-bottom: 0.5rem;
}

.stat-item h6 {
    color: #333;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.stat-item small {
    color: #6c757d;
    font-weight: 500;
}

.teacher-header h3 {
    font-size: 2.2rem;
    font-weight: 800;
    background: linear-gradient(135deg, #dc3545, #fd7e14);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.5rem;
}

.teacher-header p {
    font-size: 1.1rem;
    color: #6c757d;
    font-weight: 500;
}

.info-section {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    padding: 2rem;
    border-radius: 20px;
    border-left: 5px solid #dc3545;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.info-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.info-section h6 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.info-section h6 i {
    color: #dc3545;
    margin-right: 0.75rem;
}

.info-section .text-muted {
    color: #495057 !important;
    line-height: 1.7;
    font-size: 1rem;
}

.achievements-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1rem;
}

.achievements-grid .badge {
    background: linear-gradient(135deg, #dc3545, #fd7e14);
    color: white;
    padding: 1rem 1.5rem;
    border-radius: 30px;
    font-size: 0.95rem;
    font-weight: 600;
    text-align: center;
    border: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
}

.achievements-grid .badge:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
}

.modal-footer {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    padding: 2rem;
    border-top: 1px solid #e9ecef;
}

.modal-footer .btn {
    border-radius: 30px;
    padding: 1rem 2.5rem;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.modal-footer .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.modal-footer .btn-primary {
    background: linear-gradient(135deg, #dc3545, #fd7e14);
    border: none;
    color: white;
}

.modal-footer .btn-outline-primary {
    border: 2px solid #dc3545;
    color: #dc3545;
    background: transparent;
}

.modal-footer .btn-outline-primary:hover {
    background: #dc3545;
    color: white;
    border-color: #dc3545;
}

/* Teacher Badges */
.teacher-badges .badge {
    font-size: 0.8rem;
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.teacher-badges .badge.bg-success {
    background: linear-gradient(135deg, #28a745, #20c997) !important;
}

.teacher-badges .badge.bg-info {
    background: linear-gradient(135deg, #17a2b8, #6f42c1) !important;
}

.teacher-badges .badge.bg-warning {
    background: linear-gradient(135deg, #ffc107, #fd7e14) !important;
    color: #333 !important;
}

/* Small Info Sections */
.info-section-small {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 10px;
    border-left: 3px solid #dc3545;
    margin-bottom: 1rem;
}

.info-section-small h6 {
    font-size: 0.95rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 0.75rem;
}

.info-section-small .text-muted {
    color: #495057 !important;
    line-height: 1.5;
    font-size: 0.9rem;
}

/* Small Stats */
.stat-item-small {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 0.75rem;
    border: 2px solid #f8f9fa;
    transition: all 0.3s ease;
}

.stat-item-small:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    border-color: #dc3545;
}

.stat-item-small i {
    color: #dc3545;
    margin-bottom: 0.5rem;
}

.stat-item-small h6 {
    color: #333;
    font-weight: 700;
    margin-bottom: 0.25rem;
    font-size: 1rem;
}

.stat-item-small small {
    color: #6c757d;
    font-weight: 500;
    font-size: 0.85rem;
}

/* Small Achievements Grid */
.achievements-grid-small {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.achievements-grid-small .badge {
    font-size: 0.8rem;
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
    font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .teacher-modal-avatar,
    .teacher-modal-avatar-placeholder {
        width: 150px !important;
        height: 150px !important;
    }
    
    .modal-header h4 {
        font-size: 1.5rem;
    }
    
    .teacher-header h3 {
        font-size: 1.8rem;
    }
    
    .info-section {
        padding: 1.5rem;
    }
    
    .modal-footer .btn {
        padding: 0.875rem 2rem;
        font-size: 0.9rem;
    }
}

/* ===== MODAL FALLBACK STYLING ===== */
.modal {
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal.show {
    display: block;
}

.modal-dialog {
    margin: 1.75rem auto;
    max-width: 800px;
}

.modal-content {
    position: relative;
    background-color: #fff;
    border-radius: 0.375rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
    border-bottom: 1px solid #dee2e6;
}

.modal-body {
    padding: 1rem;
}

.modal-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 0.5rem;
    padding: 1rem;
    border-top: 1px solid #dee2e6;
}

.btn-close {
    background: transparent;
    border: 0;
    font-size: 1.5rem;
    cursor: pointer;
    color: inherit;
}

.btn-close:hover {
    opacity: 0.75;
}

.modal-open {
    overflow: hidden;
}

/* ===== SCROLLBAR STYLING ===== */
.tab-content::-webkit-scrollbar {
    width: 8px;
}

.tab-content::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.05);
    border-radius: 4px;
}

.tab-content::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #ff6b35, #f7931e);
    border-radius: 4px;
}

.tab-content::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #f7931e, #ff6b35);
}

/* ===== TAB NAVIGATION SCROLLBAR ===== */
.nav-pills::-webkit-scrollbar {
    height: 6px;
}

.nav-pills::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.05);
    border-radius: 3px;
}

.nav-pills::-webkit-scrollbar-thumb {
    background: #dc3545;
    border-radius: 3px;
}

.nav-pills::-webkit-scrollbar-thumb:hover {
    background: #c82333;
}
</style>
@endpush

@section('content')
<!-- Full Screen Image Section -->
<section class="fullscreen-image-section position-relative">
    <div class="fullscreen-image-container">
        @php
            $headerImage = \App\Models\Setting::get('about_header_image', 'images/about/team-photo.jpg');
            $headerTitle = \App\Models\Setting::get('about_header_title', 'Đội Ngũ Giảng Viên Chuyên Nghiệp');
            $headerSubtitle = \App\Models\Setting::get('about_header_subtitle', 'Hơn 25 giảng viên giàu kinh nghiệm, tận tâm với sứ mệnh giúp học viên chinh phục tiếng Đức thành công');
            $headerStats = json_decode(\App\Models\Setting::get('about_header_stats', '[]'), true);
            
            // Add timestamp to avoid cache
            $headerImageUrl = asset($headerImage);
            if (strpos($headerImage, '?v=') === false) {
                $headerImageUrl .= '?v=' . time();
            }
        @endphp
        
        <img src="{{ $headerImageUrl }}" 
             alt="{{ $headerTitle }}" 
             class="fullscreen-image"
             onerror="this.src='{{ asset('images/about/team-photo.jpg') }}?v={{ time() }}'">
    </div>
</section>

<!-- Company Overview & Mission Vision Values -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: Company Overview with Tabs -->
            <div class="col-lg-6">
                <div class="company-overview">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary mb-2">{{ $aboutData['overview_title'] ?? 'TỔNG QUAN' }}</h2>
                        <p class="text-muted">{{ __('general.mission_vision_core_values_thanh_cuc') }}</p>
                    </div>
                    
                    <!-- Tab Navigation -->
                    <ul class="nav nav-pills nav-fill mb-4" id="aboutTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                                <i class="fas fa-info-circle me-2"></i>TỔNG QUAN
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="mission-tab" data-bs-toggle="tab" data-bs-target="#mission" type="button" role="tab" aria-controls="mission" aria-selected="false">
                                <i class="fas fa-bullseye me-2"></i>SỨ MỆNH
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="vision-tab" data-bs-toggle="tab" data-bs-target="#vision" type="button" role="tab" aria-controls="vision" aria-selected="false">
                                <i class="fas fa-eye me-2"></i>TẦM NHÌN
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="values-tab" data-bs-toggle="tab" data-bs-target="#values" type="button" role="tab" aria-controls="values" aria-selected="false">
                                <i class="fas fa-star me-2"></i>GIÁ TRỊ
                            </button>
                        </li>
                    </ul>
                    
                    <!-- Tab Content -->
                    <div class="tab-content" id="aboutTabsContent">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4">
                                    <div class="text-start">
                                        @if(isset($aboutData['overview_content']) && !empty($aboutData['overview_content']))
                                            {!! $aboutData['overview_content'] !!}
                                        @else
                                            <p class="text-muted mb-3">
                                                SEC Tiếng Anh Đơn Giản ra đời vào ngày 23/03/2017, với những phương pháp học tiếng Anh cực kỳ đơn giản và hiệu quả. Ngay từ khi thành lập, SEC đã trở thành nơi uy tín của hàng ngàn học sinh, sinh viên. Mỗi tháng, SEC tuyển sinh từ 600 đến 700 học viên mới, minh chứng cho chất lượng giảng dạy của trung tâm.
                                            </p>
                                            <p class="text-muted mb-3">
                                                Tên thương hiệu SEC (Simple English Center) phản ánh kim chỉ nam của chúng tôi: biến Tiếng Anh thành môn học dễ dàng chinh phục cho mọi trình độ. Với phương pháp đơn giản và hiệu quả, SEC giúp học viên không chỉ hiểu sâu bản chất ngôn ngữ mà còn tránh học vẹt và học mẹo.
                                            </p>
                                            <p class="text-muted mb-4">
                                                SEC có khát vọng mãnh liệt lan tỏa phương pháp này mạnh mẽ hơn nữa, giúp hàng triệu người vượt qua môn học Tiếng Anh dễ dàng, một lần và mãi mãi. Hãy đến với SEC để trải nghiệm và chinh phục tiếng Anh ngay hôm nay!
                                            </p>
                                        @endif
                                    </div>
                                    <div class="mt-4">
                                        <div class="d-flex flex-wrap gap-3 justify-content-center">
                                            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="btn btn-danger btn-lg">Đăng kí học ngay ></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Mission Tab -->
                        <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4">
                                    <div class="text-start">
                                        @if(isset($aboutData['mission']) && !empty($aboutData['mission']))
                                            {!! $aboutData['mission'] !!}
                                        @else
                                            <p class="text-muted mb-3">
                                                SEC có sứ mệnh biến Tiếng Anh thành môn học dễ dàng chinh phục cho mọi trình độ. Chúng tôi cam kết mang đến phương pháp học đơn giản, hiệu quả và khoa học.
                                            </p>
                                            <p class="text-muted mb-3">
                                                Với kim chỉ nam rõ ràng, SEC giúp học viên không chỉ hiểu sâu bản chất ngôn ngữ mà còn tránh học vẹt và học mẹo, đảm bảo kiến thức được ghi nhớ lâu dài.
                                            </p>
                                    <p class="text-muted">
                                                Chúng tôi tin rằng mọi người đều có thể chinh phục tiếng Anh một cách tự nhiên và bền vững thông qua phương pháp đúng đắn.
                                    </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Vision Tab -->
                        <div class="tab-pane fade" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4">
                                    <div class="text-start">
                                        @if(isset($aboutData['vision']) && !empty($aboutData['vision']))
                                            {!! $aboutData['vision'] !!}
                                        @else
                                            <p class="text-muted mb-3">
                                                SEC định hướng phát triển thành Trung tâm Anh ngữ số 1 Việt Nam về phổ cập phương pháp Tiếng Anh đơn giản đến mọi lứa tuổi.
                                            </p>
                                            <p class="text-muted mb-3">
                                                Chúng tôi mong muốn trở thành đối tác tin cậy của các tổ chức giáo dục, doanh nghiệp và cá nhân trong việc nâng cao trình độ tiếng Anh.
                                            </p>
                                    <p class="text-muted">
                                                SEC sẽ mở rộng mạng lưới trung tâm trên toàn quốc, mang phương pháp học tiếng Anh đơn giản đến mọi miền đất nước.
                                    </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Core Values Tab -->
                        <div class="tab-pane fade" id="values" role="tabpanel" aria-labelledby="values-tab">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4">
                                    <div class="text-start">
                                        @if(isset($aboutData['core_values']) && !empty($aboutData['core_values']))
                                            @php
                                                $coreValues = is_string($aboutData['core_values']) ? json_decode($aboutData['core_values'], true) : $aboutData['core_values'];
                                    @endphp
                                            @if(is_array($coreValues) && count($coreValues) > 0)
                                        <div class="row g-3">
                                            @foreach($coreValues as $value)
                                                <div class="col-6">
                                                    <div class="text-center p-3 bg-light rounded core-value-item">
                                                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                             style="width: 50px; height: 50px;">
                                                            <i class="{{ $value['icon'] ?? 'fas fa-star' }} text-white"></i>
                                                        </div>
                                                                <h6 class="fw-bold mb-2 small text-primary">{{ $value['title'] ?? 'Giá trị' }}</h6>
                                                                <p class="text-muted small mb-0">{{ $value['description'] ?? 'Mô tả giá trị' }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                                <!-- Fallback values if no data -->
                                                <div class="row g-3">
                                                    <div class="col-6">
                                                        <div class="text-center p-3 bg-light rounded core-value-item">
                                                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                                 style="width: 50px; height: 50px;">
                                                                <i class="fas fa-graduation-cap text-white"></i>
                                                            </div>
                                                            <h6 class="fw-bold mb-2 small text-primary">Chất Lượng</h6>
                                                            <p class="text-muted small mb-0">Cam kết chất lượng giảng dạy cao nhất</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="text-center p-3 bg-light rounded core-value-item">
                                                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                                 style="width: 50px; height: 50px;">
                                                                <i class="fas fa-heart text-white"></i>
                                                            </div>
                                                            <h6 class="fw-bold mb-2 small text-primary">Tận Tâm</h6>
                                                            <p class="text-muted small mb-0">Đặt lợi ích học viên lên hàng đầu</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="text-center p-3 bg-light rounded core-value-item">
                                                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                                 style="width: 50px; height: 50px;">
                                                                <i class="fas fa-lightbulb text-white"></i>
                                                            </div>
                                                            <h6 class="fw-bold mb-2 small text-primary">Sáng Tạo</h6>
                                                            <p class="text-muted small mb-0">Phương pháp học tập đổi mới</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="text-center p-3 bg-light rounded core-value-item">
                                                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                                 style="width: 50px; height: 50px;">
                                                                <i class="fas fa-chart-line text-white"></i>
                                                            </div>
                                                            <h6 class="fw-bold mb-2 small text-primary">Hiệu Quả</h6>
                                                            <p class="text-muted small mb-0">Kết quả học tập rõ ràng</p>
                                                        </div>
                                                    </div>
                                        </div>
                                    @endif
                                        @else
                                            <!-- Fallback values if no data -->
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <div class="text-center p-3 bg-light rounded core-value-item">
                                                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                             style="width: 50px; height: 50px;">
                                                            <i class="fas fa-graduation-cap text-white"></i>
                                </div>
                                                        <h6 class="fw-bold mb-2 small text-primary">Chất Lượng</h6>
                                                        <p class="text-muted small mb-0">Cam kết chất lượng giảng dạy cao nhất</p>
                            </div>
                        </div>
                                                <div class="col-6">
                                                    <div class="text-center p-3 bg-light rounded core-value-item">
                                                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                             style="width: 50px; height: 50px;">
                                                            <i class="fas fa-heart text-white"></i>
                                                        </div>
                                                        <h6 class="fw-bold mb-2 small text-primary">Tận Tâm</h6>
                                                        <p class="text-muted small mb-0">Đặt lợi ích học viên lên hàng đầu</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-center p-3 bg-light rounded core-value-item">
                                                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                             style="width: 50px; height: 50px;">
                                                            <i class="fas fa-lightbulb text-white"></i>
                                                        </div>
                                                        <h6 class="fw-bold mb-2 small text-primary">Sáng Tạo</h6>
                                                        <p class="text-muted small mb-0">Phương pháp học tập đổi mới</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-center p-3 bg-light rounded core-value-item">
                                                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                             style="width: 50px; height: 50px;">
                                                            <i class="fas fa-chart-line text-white"></i>
                                                        </div>
                                                        <h6 class="fw-bold mb-2 small text-primary">Hiệu Quả</h6>
                                                        <p class="text-muted small mb-0">Kết quả học tập rõ ràng</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side: Building Image (Giữ nguyên vị trí cũ) -->
            <div class="col-lg-6">
                @php
                    $buildingImage = \App\Models\Setting::get('about_building_image', 'images/about/sec-building.svg');
                    
                    // Add timestamp to avoid cache
                    $buildingImageUrl = asset($buildingImage);
                    if (strpos($buildingImage, '?v=') === false) {
                        $buildingImageUrl .= '?v=' . time();
                    }
                @endphp
                <img src="{{ $buildingImageUrl }}" 
                     alt="SEC Building" 
                     class="img-fluid rounded shadow-lg animate-on-scroll"
                     onerror="this.src='{{ asset('images/about/sec-building.svg') }}?v={{ time() }}'">
            </div>
        </div>
    </div>
</section>



<style>
    .py-5 .teacher-card ul {
        text-align: left;
    }
</style>

<!-- Teaching Staff -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">ĐỘI NGŨ GIẢNG VIÊN</h2>
            <p class="text-muted">Đội ngũ giảng viên chuyên nghiệp với kinh nghiệm giảng dạy tiếng Anh nhiều năm</p>
        </div>
        
                 <div class="row">
             @php
                 $teachers = \App\Models\Teacher::where('is_active', true)
                     ->orderBy('sort_order')
                     ->orderBy('name')
                     ->get();
             @endphp
             
             @forelse($teachers as $teacher)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="teacher-card card h-100 border-0 shadow-sm" 
                     data-teacher-id="{{ $teacher->id }}"
                     data-teacher-name="{{ $teacher->name }}"
                     data-teacher-specialization="{{ $teacher->specialization }}"
                     data-teacher-certification="{{ $teacher->certification }}"
                     data-teacher-experience="{{ $teacher->experience_years }}"
                     data-teacher-bio="{!! $teacher->bio !!}"
                     data-teacher-achievements="{{ json_encode($teacher->achievements) }}"
                     data-teacher-avatar="{{ $teacher->avatar ? asset('storage/' . $teacher->avatar) : '' }}"
                     style="cursor: pointer;">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                                     @if($teacher->avatar)
                                         <img src="{{ asset('storage/' . $teacher->avatar) }}" 
                                              alt="{{ $teacher->name }}" 
                                     class="rounded-circle teacher-avatar"
                                     width="120" height="120">
                                     @else
                                <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center teacher-avatar-placeholder" 
                                     style="width: 120px; height: 120px;">
                                    <i class="fas fa-user fa-3x text-white"></i>
                                         </div>
                                     @endif
                                         </div>
                        
                        <h5 class="fw-bold text-primary mb-2">{{ $teacher->name }}</h5>
                        <p class="text-muted mb-2">{{ $teacher->specialization }}</p>
                                     
                                     @if($teacher->certification)
                        <span class="badge bg-light text-primary border mb-3">{{ $teacher->certification }}</span>
                                     @endif
                                     
                                     @if($teacher->experience_years)
                        <div class="d-flex justify-content-center align-items-center mb-3 text-left" >
                            <i class="fas fa-clock text-primary me-2"></i>
                            <small class="text-muted">{{ $teacher->experience_years }}+ năm kinh nghiệm</small>
                                     </div>
                                     @endif
                                     
                                     @if($teacher->bio)
                                        {!! $teacher->bio !!}
                                     @endif
                                     
                        <button class="btn btn-outline-primary btn-sm teacher-detail-btn">
                            <i class="fas fa-eye me-1"></i>Xem Chi Tiết
                        </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-users fa-4x text-muted mb-3"></i>
                        <h4 class="text-muted">Chưa có thông tin giảng viên</h4>
                        <p class="text-muted">Thông tin đội ngũ giảng viên sẽ được cập nhật sớm.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Classroom Gallery Slider -->
@php
    $classrooms = \App\Models\Gallery::active()->classroom()->ordered()->get();
@endphp

@if($classrooms->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">LỚP HỌC CỦA THANH CÚC</h2>
            <p class="text-muted">Không gian học tập sinh động và hiện đại, nơi học viên trải nghiệm phương pháp học tiếng Đức độc đáo</p>
        </div>
        
                <!-- Classroom Card Slider -->
        <div class="card-slider-container">
            <div class="swiper classroom-swiper">
                <div class="swiper-wrapper">
                    @foreach($classrooms as $index => $classroom)
                        <div class="swiper-slide">
                            <div class="card-slider-card" onclick="openGallery('classroom', {{ $index }})">
                                <div class="card-image-container">
                                    <img src="{{ $classroom->image_url }}" 
                                         alt="{{ $classroom->title }}" 
                                         class="card-image">
                                    @if($classroom->level)
                                        <div class="card-badge">
                                            <span class="badge bg-primary">{{ $classroom->level }}</span>
                                        </div>
                                    @endif
                                    <div class="card-overlay">
                                        <div class="card-content">
                                            <h6 class="text-white fw-bold mb-2">{{ $classroom->title }}</h6>
                                            <p class="text-white-50 mb-2">{{ $classroom->description }}</p>
                                            @if($classroom->students)
                                                <span class="badge bg-light text-dark">
                                                    <i class="fas fa-users me-1"></i>{{ $classroom->students }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-click-overlay">
                                        <i class="fas fa-search-plus fa-2x text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Facilities Slider -->
@php
    $facilities = \App\Models\Gallery::active()->facility()->ordered()->get();
@endphp

@if($facilities->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">CƠ SỞ VẬT CHẤT</h2>
            <p class="text-muted">Không gian học tập hiện đại, trang thiết bị đầy đủ cho việc học tiếng Đức hiệu quả</p>
        </div>
        
                        <!-- Facilities Card Slider -->
        <div class="card-slider-container">
            <div class="swiper facilities-swiper">
                <div class="swiper-wrapper">
            @foreach($facilities as $index => $facility)
                        <div class="swiper-slide">
                            <div class="card-slider-card" onclick="openGallery('facility', {{ $index }})">
                                <div class="card-image-container">
                                    <img src="{{ $facility->image_url }}" 
                                         alt="{{ $facility->title }}" 
                                         class="card-image">
                                    <div class="card-overlay">
                                        <div class="card-content">
                                            <h6 class="text-white fw-bold mb-2">{{ $facility->title }}</h6>
                                            <p class="text-white-50 mb-0">{{ $facility->description }}</p>
                                </div>
                            </div>
                                    <div class="card-click-overlay">
                                        <i class="fas fa-search-plus fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                </div>
                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        </div>
        

    </div>
</section>
@endif





<!-- Teacher Detail Modal -->
<div class="modal fade" id="teacherDetailModal" tabindex="-1" aria-labelledby="teacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="teacherModalLabel">Chi tiết giảng viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="teacherModalBody">
                <!-- Content will be loaded here -->
            </div>

        </div>
    </div>
</div>

<!-- Image Gallery Modal -->
<div class="modal fade" id="imageGalleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white" id="galleryModalTitle">Gallery</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="position-relative">
                    <img id="galleryModalImage" src="" alt="" class="img-fluid w-100" style="max-height: 70vh; object-fit: contain;">
                    
                    <!-- Navigation arrows -->
                    <button class="gallery-nav gallery-prev" onclick="changeGalleryImage(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="gallery-nav gallery-next" onclick="changeGalleryImage(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Image counter -->
                    <div class="gallery-counter">
                        <span id="currentImageIndex">1</span> / <span id="totalImages">1</span>
                    </div>
                </div>
                
                <!-- Image info -->
                <div class="p-4">
                    <h6 class="text-white mb-2" id="galleryImageTitle">Title</h6>
                    <p class="text-light mb-0" id="galleryImageDescription">Description</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">{{ \App\Models\Setting::get('about_cta_title', 'Sẵn sàng trở thành một phần của cộng đồng SEC?') }}</h3>
                <p class="mb-0">
                    {{ \App\Models\Setting::get('about_cta_description', 'Hãy đến với SEC để trải nghiệm phương pháp học tiếng Anh đột phá và đạt được thành công ngay hôm nay!') }}
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="btn btn-light btn-lg me-3">Học Thử Miễn Phí</a>
                <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Liên Hệ Ngay
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Tab System Styles */
.nav-tabs {
    border-bottom: 2px solid #e9ecef;
}

.nav-tabs .nav-link {
    border: none;
    color: #6c757d;
    font-weight: 600;
    padding: 1rem 2rem;
    margin: 0 0.5rem;
    border-radius: 10px 10px 0 0;
    transition: all 0.3s ease;
    position: relative;
}

.nav-tabs .nav-link:hover {
    color: var(--primary-color);
    background-color: rgba(1, 88, 98, 0.05);
    border: none;
}

.nav-tabs .nav-link.active {
    color: var(--primary-color);
    background-color: white;
    border: none;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
}

.nav-tabs .nav-link.active::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    height: 2px;
    background-color: var(--primary-color);
}

.nav-tabs .nav-link i {
    transition: transform 0.3s ease;
}

.nav-tabs .nav-link:hover i,
.nav-tabs .nav-link.active i {
    transform: scale(1.1);
}

.tab-content {
    background: white;
    border-radius: 0 0 15px 15px;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.tab-pane {
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Tab Design */
@media (max-width: 768px) {
    .nav-tabs {
        flex-direction: column;
        border-bottom: none;
    }
    
    .nav-tabs .nav-link {
        margin: 0.25rem 0;
        border-radius: 10px;
        text-align: center;
    }
    
    .nav-tabs .nav-link.active::after {
        display: none;
    }
    
    .tab-content {
        border-radius: 15px;
        margin-top: 1rem;
    }
}

@media (max-width: 576px) {
    .nav-tabs .nav-link {
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }
    
    .tab-content {
        padding: 1.5rem;
    }
}
/* Teaching Staff Styles */
.teacher-card {
    transition: all 0.3s ease;
    overflow: hidden;
    height: auto;
}

.teacher-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.teacher-image-container {
    position: relative;
    overflow: hidden;
    height: 200px;
    flex-shrink: 0;
}

.teacher-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 2px dashed #dee2e6;
}

.teacher-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.teacher-card:hover .teacher-image {
    transform: scale(1.05);
}

.teacher-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(1, 88, 98, 0.8), rgba(62, 184, 80, 0.8));
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.teacher-card:hover .teacher-overlay {
    opacity: 1;
}

.teacher-social a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.teacher-social a:hover {
    transform: scale(1.1);
    background: white !important;
    color: var(--primary-color) !important;
}

.teacher-card .badge {
    font-size: 0.7rem;
    padding: 0.3rem 0.6rem;
    border: 1px solid #dee2e6;
}

/* Teacher Bio Content */
.teacher-card .small {
    line-height: 1.6;
    color: #6c757d;
}

.teacher-card .small p {
    margin-bottom: 0.5rem;
}

.teacher-card .small p:last-child {
    margin-bottom: 0;
}

.teacher-card .small ul, 
.teacher-card .small ol {
    margin-bottom: 0.5rem;
    padding-left: 1.2rem;
}

.teacher-card .small li {
    margin-bottom: 0.25rem;
}

/* Professional Card Slider Styles */
.card-slider-container {
    width: 100%;
    position: relative;
    padding: 40px 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.swiper {
    width: 100%;
    padding: 20px 0 60px 0;
}

.swiper-slide {
    height: 320px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.card-slider-card {
    width: 100%;
    height: 100%;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    background: white;
}

.card-slider-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
}

.card-image-container {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.card-slider-card:hover .card-image {
    transform: scale(1.1);
}

.card-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 10;
}

.card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 100%);
    padding: 2rem;
    transform: translateY(100%);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    backdrop-filter: blur(10px);
}

.card-slider-card:hover .card-overlay {
    transform: translateY(0);
}

.card-content h6 {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: white;
}

.card-content p {
    font-size: 0.9rem;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 1rem;
}

.card-click-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.7);
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    backdrop-filter: blur(5px);
}

.card-slider-card:hover .card-click-overlay {
    opacity: 1;
}

/* Swiper Navigation Buttons */
.swiper-button-next,
.swiper-button-prev {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    color: #333;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
    background: white;
    color: #dc3545;
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.swiper-button-next::after,
.swiper-button-prev::after {
    font-size: 1.2rem;
    font-weight: bold;
}

/* Swiper Pagination */
.swiper-pagination {
    bottom: 20px;
}

.swiper-pagination-bullet {
    width: 12px;
    height: 12px;
    background: rgba(255, 255, 255, 0.5);
    opacity: 1;
    transition: all 0.3s ease;
}

.swiper-pagination-bullet-active {
    background: #dc3545;
    transform: scale(1.2);
}

/* Gallery Modal Navigation Styles */
.gallery-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 10;
    cursor: pointer;
}

.gallery-nav:hover {
    background: rgba(0, 0, 0, 0.8);
    transform: translateY(-50%) scale(1.1);
    color: white;
}

.gallery-prev {
    left: 20px;
}

.gallery-next {
    right: 20px;
}

.gallery-counter {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    z-index: 10;
}

/* Gallery Modal Responsive */
@media (max-width: 768px) {
    .gallery-nav {
        width: 50px;
        height: 50px;
    }
}

@media (max-width: 576px) {
    .gallery-nav {
        width: 45px;
        height: 45px;
    }
    
    .gallery-prev {
        left: 10px;
    }
    
    .gallery-next {
        right: 10px;
    }
}



.gallery-card {
    width: 100%;
    height: 100%;
    position: relative;
    cursor: pointer;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border: 2px solid rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
}

.gallery-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    border-color: rgba(220, 53, 69, 0.3);
}

.gallery-image-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    border-radius: 20px;
    filter: brightness(0.9) contrast(1.1);
}

.gallery-card:hover .gallery-image {
    transform: scale(1.08);
    filter: brightness(1) contrast(1.2);
}

.gallery-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 10;
}

.gallery-badge .badge {
    font-size: 0.75rem;
    padding: 10px 16px;
    border-radius: 25px;
    font-weight: 700;
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    border: 2px solid rgba(255, 255, 255, 0.9);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, 
        rgba(220, 53, 69, 0.9) 0%, 
        rgba(253, 126, 20, 0.8) 50%, 
        rgba(0, 0, 0, 0.7) 100%);
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    display: flex;
    align-items: flex-end;
    padding: 2rem;
    z-index: 5;
    backdrop-filter: blur(5px);
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
    transform: translateY(0);
}

.gallery-content {
    transform: translateY(30px);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    width: 100%;
    text-align: center;
}

.gallery-card:hover .gallery-content {
    transform: translateY(0);
}

.gallery-content h6 {
    font-size: 1.1rem;
    font-weight: 800;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    margin-bottom: 0.75rem;
}

.gallery-content p {
    font-size: 0.9rem;
    line-height: 1.4;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
    margin-bottom: 1rem;
}

.gallery-content .badge {
    font-size: 0.8rem;
    padding: 8px 12px;
    border-radius: 20px;
    font-weight: 600;
    background: rgba(255, 255, 255, 0.95);
    color: #333;
    border: 1px solid rgba(255, 255, 255, 0.8);
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
}

.gallery-click-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    opacity: 0;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    z-index: 8;
    pointer-events: auto;
    cursor: pointer;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 50%;
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    border: 3px solid rgba(255, 255, 255, 0.8);
}

.gallery-card:hover .gallery-click-overlay {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
}

.gallery-click-overlay i {
    color: #dc3545;
    font-size: 1.8rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Professional Carousel Navigation */
.carousel-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    border: none;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    z-index: 15;
    cursor: pointer;
    font-size: 1.4rem;
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
    border: 3px solid rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
}

.carousel-nav:hover {
    background: linear-gradient(135deg, #c82333 0%, #e55a00 100%);
    transform: translateY(-50%) scale(1.15);
    color: white;
    box-shadow: 0 12px 35px rgba(220, 53, 69, 0.6);
    border-color: rgba(255, 255, 255, 1);
}

.carousel-nav:disabled {
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
    cursor: not-allowed;
    opacity: 0.6;
    transform: translateY(-50%) scale(0.9);
}

.carousel-nav:disabled:hover {
    transform: translateY(-50%) scale(0.9);
    box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
}

.carousel-prev {
    left: -30px;
}

.carousel-next {
    right: -30px;
}

/* Professional Carousel Pagination */
.carousel-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
    gap: 12px;
    padding: 0 20px;
}

.pagination-dot {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(220, 53, 69, 0.3) 0%, rgba(253, 126, 20, 0.3) 100%);
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    border: 2px solid rgba(255, 255, 255, 0.8);
    padding: 0;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.pagination-dot::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.pagination-dot.active {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    transform: scale(1.3);
    border-color: rgba(255, 255, 255, 1);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
}

.pagination-dot.active::before {
    width: 100%;
    height: 100%;
}

.pagination-dot:hover {
    background: linear-gradient(135deg, rgba(220, 53, 69, 0.6) 0%, rgba(253, 126, 20, 0.6) 100%);
    transform: scale(1.1);
    border-color: rgba(255, 255, 255, 0.9);
}

/* Gallery Modal Styles */
.gallery-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 10;
    cursor: pointer;
}

.gallery-nav:hover {
    background: rgba(0, 0, 0, 0.8);
    transform: translateY(-50%) scale(1.1);
    color: white;
}

.gallery-prev {
    left: 20px;
}

.gallery-next {
    right: 20px;
}

.gallery-counter {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    z-index: 10;
}



/* Professional Responsive Card Slider Design */
@media (max-width: 1200px) {
    .swiper-slide {
        height: 300px;
    }
    
    .card-content h6 {
        font-size: 1rem;
    }
    
    .card-content p {
        font-size: 0.85rem;
    }
}

@media (max-width: 992px) {
    .swiper-slide {
        height: 280px;
    }
    
    .card-overlay {
        padding: 1.5rem;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }
}

@media (max-width: 768px) {
    .card-slider-container {
        padding: 30px 0;
    }
    
    .swiper-slide {
        height: 260px;
    }
    
    .card-overlay {
        padding: 1.25rem;
    }
    
    .card-content h6 {
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
    }
    
    .card-content p {
        font-size: 0.8rem;
        margin-bottom: 0.75rem;
    }
    
    .card-badge .badge {
        font-size: 0.7rem;
        padding: 6px 10px;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .teacher-card .card-body {
        padding: 1.5rem !important;
    }
}

@media (max-width: 576px) {
    .card-slider-container {
        padding: 25px 0;
        border-radius: 15px;
    }
    
    .swiper-slide {
        height: 240px;
    }
    
    .card-overlay {
        padding: 1rem;
    }
    
    .card-content h6 {
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    
    .card-content p {
        font-size: 0.75rem;
        margin-bottom: 0.5rem;
    }
    
    .card-badge .badge {
        font-size: 0.65rem;
        padding: 5px 8px;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        width: 35px;
        height: 35px;
        font-size: 0.9rem;
    }
    
    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
    }
}

/* Animation for scroll */
.teacher-card,
.slider-item {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.6s ease forwards;
}

.teacher-card:nth-child(1),
.slider-item:nth-child(1) { animation-delay: 0.1s; }
.teacher-card:nth-child(2),
.slider-item:nth-child(2) { animation-delay: 0.2s; }
.teacher-card:nth-child(3),
.slider-item:nth-child(3) { animation-delay: 0.3s; }
.teacher-card:nth-child(4),
.slider-item:nth-child(4) { animation-delay: 0.4s; }
.teacher-card:nth-child(5),
.slider-item:nth-child(5) { animation-delay: 0.5s; }
.teacher-card:nth-child(6),
.slider-item:nth-child(6) { animation-delay: 0.6s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
// Gallery data from database (safely JSON-encoded)
@php
    $allClassrooms = \App\Models\Gallery::active()->classroom()->ordered()->get();
    $allFacilities = \App\Models\Gallery::active()->facility()->ordered()->get();
    $classroomData = $allClassrooms->map(function($c) {
        return [
            'image' => $c->image_url,
            'title' => $c->title,
            'description' => $c->description ?? '',
            'level' => $c->level ?? null,
            'students' => $c->students ?? null
        ];
    });
    $facilityData = $allFacilities->map(function($f) {
        return [
            'image' => $f->image_url,
            'title' => $f->title,
            'description' => $f->description ?? ''
        ];
    });
@endphp

const galleryData = {
    classroom: @json($classroomData),
    facility: @json($facilityData)
};



// Current gallery state
let currentGallery = null;
let currentImageIndex = 0;

// Professional Card Slider Initialization
document.addEventListener('DOMContentLoaded', function() {
            // Initialize Classroom Swiper
        const classroomSwiper = new Swiper('.classroom-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
            effect: 'slide',
            speed: 600,
            grabCursor: true,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
        });

            // Initialize Facilities Swiper
        const facilitiesSwiper = new Swiper('.facilities-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
            effect: 'slide',
            speed: 600,
            grabCursor: true,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
        });

    // Add hover pause functionality
    const swipers = [classroomSwiper, facilitiesSwiper];
    
    swipers.forEach(swiper => {
        const container = swiper.el;
        
        container.addEventListener('mouseenter', () => {
            swiper.autoplay.stop();
        });
        
        container.addEventListener('mouseleave', () => {
            swiper.autoplay.start();
        });
    });
});





// Open gallery modal
function openGallery(galleryType, imageIndex) {
    console.log('Opening gallery:', galleryType, imageIndex);
    console.log('Gallery data:', galleryData);
    
    currentGallery = galleryType;
    currentImageIndex = imageIndex;
    
    const modal = new bootstrap.Modal(document.getElementById('imageGalleryModal'));
    updateGalleryModal();
    modal.show();
}



// Update gallery modal content
function updateGalleryModal() {
    console.log('Updating modal for:', currentGallery, currentImageIndex);
    
    if (!currentGallery || !galleryData[currentGallery]) {
        console.log('No gallery data found for:', currentGallery);
        return;
    }
    
    const data = galleryData[currentGallery];
    const currentImage = data[currentImageIndex];
    
    console.log('Current image data:', currentImage);
    
    if (!currentImage) {
        console.log('No image found at index:', currentImageIndex);
        return;
    }
    
    const modalImage = document.getElementById('galleryModalImage');
    modalImage.src = currentImage.image;
    modalImage.alt = currentImage.title;
    
    // Add error handling for missing images
    modalImage.onerror = function() {
        console.log('Image failed to load:', currentImage.image);
        this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxOCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkltYWdlIG5vdCBmb3VuZDwvdGV4dD48L3N2Zz4=';
    };
    document.getElementById('galleryImageTitle').textContent = currentImage.title;
    document.getElementById('galleryImageDescription').textContent = currentImage.description || '';
    document.getElementById('currentImageIndex').textContent = currentImageIndex + 1;
    document.getElementById('totalImages').textContent = data.length;
    
    // Update modal title
    const modalTitle = currentGallery === 'classroom' ? 'Lớp Học Của Thanh Cúc' : 'Cơ Sở Vật Chất';
    document.getElementById('galleryModalTitle').textContent = modalTitle;
}

// About Tabs Functionality
function initializeAboutTabs() {
    const tabLinks = document.querySelectorAll('#aboutTabs .nav-link');
    const tabPanes = document.querySelectorAll('.tab-pane');
    
    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all tabs
            tabLinks.forEach(tab => tab.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('show', 'active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Show corresponding content
            const targetId = this.getAttribute('data-bs-target');
            const targetPane = document.querySelector(targetId);
            if (targetPane) {
                targetPane.classList.add('show', 'active');
            }
        });
    });
}

// Scroll Animation Functionality
function initializeScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
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
}

// Change gallery image
function changeGalleryImage(direction) {
    console.log('changeGalleryImage called with direction:', direction);
    console.log('currentGallery:', currentGallery);
    console.log('currentImageIndex:', currentImageIndex);
    
    if (!currentGallery || !galleryData[currentGallery]) {
        console.log('No gallery data found for:', currentGallery);
        return;
    }
    
    const data = galleryData[currentGallery];
    console.log('Gallery data:', data);
    
    currentImageIndex += direction;
    console.log('New index:', currentImageIndex);
    
    // Boundary checks with loop
    if (currentImageIndex >= data.length) {
        currentImageIndex = 0;
        console.log('Wrapped to beginning, new index:', currentImageIndex);
    } else if (currentImageIndex < 0) {
        currentImageIndex = data.length - 1;
        console.log('Wrapped to end, new index:', currentImageIndex);
    }
    
    console.log('Final index:', currentImageIndex);
    updateGalleryModal();
}





// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize about tabs functionality
    initializeAboutTabs();
    
    // Initialize scroll animations
    initializeScrollAnimations();
    // Expose functions globally for inline onclick handlers
    window.changeGalleryImage = changeGalleryImage;
    window.openGallery = openGallery;
    window.updateGalleryModal = updateGalleryModal;

    // Keyboard navigation for gallery
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('imageGalleryModal');
        if (modal.classList.contains('show')) {
            if (e.key === 'ArrowLeft') {
                changeGalleryImage(-1);
            } else if (e.key === 'ArrowRight') {
                changeGalleryImage(1);
            } else if (e.key === 'Escape') {
                bootstrap.Modal.getInstance(modal).hide();
            }
        }
    });
    

    
    // Teacher Detail Modal Functionality
    function setupTeacherModal() {
        console.log('DOM Content Loaded - Setting up teacher modal functionality');
        
        // Handle teacher card clicks
        const teacherCards = document.querySelectorAll('.teacher-card');
        console.log('Found teacher cards:', teacherCards.length);
        
        teacherCards.forEach(function(card, index) {
            console.log('Setting up card', index, 'with data:', card.dataset);
            
            card.addEventListener('click', function(e) {
                console.log('Card clicked:', index);
                const teacherData = this.dataset;
                console.log('Teacher data from card:', teacherData);
                showTeacherModal(teacherData);
            });
        });
        
        // Handle teacher detail button clicks (prevent event bubbling)
        const teacherButtons = document.querySelectorAll('.teacher-detail-btn');
        console.log('Found teacher buttons:', teacherButtons.length);
        
        teacherButtons.forEach(function(btn, index) {
            btn.addEventListener('click', function(e) {
                console.log('Button clicked:', index);
                e.stopPropagation();
                const card = this.closest('.teacher-card');
                const teacherData = card.dataset;
                console.log('Teacher data from button:', teacherData);
                showTeacherModal(teacherData);
            });
        });
    }
    
    // Try to setup immediately if DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupTeacherModal);
    } else {
        setupTeacherModal();
    }
    
    // Also try after a short delay to ensure everything is loaded
    setTimeout(setupTeacherModal, 1000);
    
    function showTeacherModal(teacherData) {
        console.log('Teacher data:', teacherData); // Debug log
        
        // Show loading
        document.getElementById('teacherModalBody').innerHTML = '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x"></i><p>Đang tải...</p></div>';
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('teacherDetailModal'));
        modal.show();
        
        // Update modal title
        document.getElementById('teacherModalLabel').textContent = teacherData.teacherName || 'Chi tiết giảng viên';
        
        // Build modal content HTML
        const modalContent = `
            <div class="row">
                <div class="col-md-4">
                    ${teacherData.teacherAvatar && teacherData.teacherAvatar.trim() !== '' ? 
                        `<img src="${teacherData.teacherAvatar}" alt="${teacherData.teacherName}" class="img-fluid rounded" style="width: 200px; height: 200px; object-fit: cover;">` :
                        `<div class="bg-gradient rounded d-flex align-items-center justify-content-center" style="height: 200px; background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);">
                            <i class="fas fa-user fa-3x text-white opacity-75"></i>
                        </div>`
                    }
                </div>
                <div class="col-md-8">
                    <h4 class="text-primary mb-3">${teacherData.teacherName || ''}</h4>
                    ${teacherData.teacherSpecialization ? `<p class="text-muted mb-3">${teacherData.teacherSpecialization}</p>` : ''}
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock text-primary me-2"></i>
                                <div>
                                    <small class="text-muted d-block">Kinh nghiệm</small>
                                    <strong>${teacherData.teacherExperience || '0'}+ năm</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-graduation-cap text-info me-2"></i>
                                <div>
                                    <small class="text-muted d-block">Trình độ</small>
                                    <strong>${teacherData.teacherCertification || 'Chưa cập nhật'}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    ${teacherData.teacherBio ? `
                        <div class="mb-3">
                            <h6 class="fw-bold">Giới thiệu:</h6>
                            <div class="text-muted">${teacherData.teacherBio}</div>
                        </div>
                    ` : ''}
                    
                    ${teacherData.teacherAchievements ? `
                        <div class="mb-3">
                            <h6 class="fw-bold">Thành tích & Chứng chỉ:</h6>
                            <div class="row">
                                ${(() => {
                                    try {
                                        const achievements = JSON.parse(teacherData.teacherAchievements);
                                        if (achievements && achievements.length > 0) {
                                            return achievements.map(achievement => `
                                                <div class="col-6 mb-1">
                                                    <span class="badge bg-light text-dark">
                                                        <i class="fas fa-check text-success me-1"></i>${achievement}
                                                    </span>
                                                </div>
                                            `).join('');
                                        }
                                    } catch (e) {
                                        console.error('Error parsing achievements:', e);
                                    }
                                    return '';
                                })()}
                            </div>
                        </div>
                    ` : ''}
                    
                    ${teacherData.teacherSpecialization ? `
                        <div class="mb-3">
                            <span class="badge bg-success">
                                <i class="fas fa-star me-1"></i>Chuyên môn: ${teacherData.teacherSpecialization}
                            </span>
                        </div>
                    ` : ''}
                </div>
            </div>
        `;
        
        // Update modal body
        document.getElementById('teacherModalBody').innerHTML = modalContent;
        
        console.log('Modal content updated successfully');
    }
});
</script>
@endpush
