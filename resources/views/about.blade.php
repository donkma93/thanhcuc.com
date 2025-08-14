@extends('layouts.app')

@section('title', 'Về Chúng Tôi - Trung Tâm Tiếng Đức Thanh Cúc')

@push('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<style>
/* Company Overview & Mission Vision Values Section */
.company-overview {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.mission-vision-tabs {
    height: 100%;
}

/* Tab Navigation Styling */
.nav-pills .nav-link {
    border-radius: 25px;
    padding: 0.75rem 1.5rem;
    margin: 0 0.25rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    background-color: #f8f9fa;
    color: #6c757d;
}

.nav-pills .nav-link:hover {
    background-color: rgba(1, 88, 98, 0.1);
    color: var(--primary-color, #015862);
    transform: translateY(-2px);
    border-color: rgba(1, 88, 98, 0.2);
}

.nav-pills .nav-link.active {
    background-color: var(--primary-color, #015862);
    color: white;
    box-shadow: 0 4px 15px rgba(1, 88, 98, 0.3);
    border-color: var(--primary-color, #015862);
}

/* Tab Content Styling */
.tab-content {
    min-height: 300px;
}

.tab-pane {
    transition: all 0.3s ease;
}

.tab-pane.fade {
    opacity: 0;
    transform: translateY(10px);
}

.tab-pane.fade.show {
    opacity: 1;
    transform: translateY(0);
}

/* Card Styling */
.card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 5px 20px rgba(1, 88, 98, 0.08);
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(1, 88, 98, 0.15);
    background: linear-gradient(135deg, #ffffff 0%, #f0f8f9 100%);
}

.card-body {
    padding: 2rem;
}

/* Icon Styling */
.fa-3x {
    font-size: 3rem;
    color: var(--primary-color, #015862);
}

/* Core Values Icons */
.core-values-grid .bg-primary {
    background-color: var(--primary-color, #015862) !important;
}

.core-values-grid .bg-light {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
    border: 1px solid rgba(1, 88, 98, 0.1);
}

/* Core Values Grid */
.core-values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
}

/* Building Image Section */
.building-image {
    max-width: 100%;
    height: auto;
    transition: all 0.3s ease;
}

.building-image:hover {
    transform: scale(1.02);
}

/* Responsive Design */
@media (max-width: 991.98px) {
    .company-overview {
        margin-bottom: 3rem;
        text-align: center;
    }
    
    .mission-vision-tabs {
        text-align: center;
    }
    
    .nav-pills {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .nav-pills .nav-link {
        margin: 0.25rem;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .fa-3x {
        font-size: 2.5rem;
    }
}

@media (max-width: 767.98px) {
    .nav-pills .nav-link {
        padding: 0.5rem 0.75rem;
        font-size: 0.8rem;
        margin: 0.125rem;
    }
    
    .card-body {
        padding: 1rem;
    }
    
    .fa-3x {
        font-size: 2rem;
    }
    
    .company-overview h2 {
        font-size: 1.75rem;
    }
    
    .mission-vision-tabs h3 {
        font-size: 1.5rem;
    }
}

@media (max-width: 575.98px) {
    .nav-pills {
        flex-direction: column;
        align-items: center;
    }
    
    .nav-pills .nav-link {
        width: 100%;
        max-width: 200px;
        margin: 0.25rem 0;
    }
    
    .card-body {
        padding: 0.75rem;
    }
    
    .fa-3x {
        font-size: 1.75rem;
    }
    
    .company-overview h2 {
        font-size: 1.5rem;
    }
    
    .mission-vision-tabs h3 {
        font-size: 1.25rem;
    }
    
    .btn-lg {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
}

/* Animation Classes */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease;
}

.animate-on-scroll.animated {
    opacity: 1;
    transform: translateY(0);
}

/* Hover Effects */
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(1, 88, 98, 0.25);
    transition: all 0.3s ease;
}

/* Button Styling */
.btn-primary {
    background: linear-gradient(135deg, var(--primary-color, #015862) 0%, #027a8a 100%);
    border: none;
    box-shadow: 0 2px 8px rgba(1, 88, 98, 0.2);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #027a8a 0%, var(--primary-color, #015862) 100%);
    box-shadow: 0 4px 15px rgba(1, 88, 98, 0.3);
}

.btn-outline-primary {
    color: var(--primary-color, #015862);
    border-color: var(--primary-color, #015862);
    background: transparent;
}

.btn-outline-primary:hover {
    background: var(--primary-color, #015862);
    color: white;
    box-shadow: 0 4px 15px rgba(1, 88, 98, 0.3);
}

/* Custom Scrollbar for Tab Content */
.tab-content::-webkit-scrollbar {
    width: 6px;
}

.tab-content::-webkit-scrollbar-track {
    background: #f8f9fa;
    border-radius: 3px;
}

.tab-content::-webkit-scrollbar-thumb {
    background: rgba(1, 88, 98, 0.3);
    border-radius: 3px;
}

.tab-content::-webkit-scrollbar-thumb:hover {
    background: rgba(1, 88, 98, 0.5);
}

/* Section Background */
.company-overview {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    padding: 2rem;
    border-radius: 15px;
    border: 1px solid rgba(1, 88, 98, 0.05);
}

/* Text Colors */
.text-primary {
    color: var(--primary-color, #015862) !important;
}

.text-muted {
    color: #6c757d !important;
}

/* Card Body Enhancement */
.card-body {
    background: linear-gradient(135deg, #ffffff 0%, #fafbfc 100%);
}

/* Core Value Items Enhancement */
.core-value-item {
    transition: all 0.3s ease;
    border: 1px solid rgba(1, 88, 98, 0.1);
}

.core-value-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(1, 88, 98, 0.15);
    border-color: rgba(1, 88, 98, 0.2);
    background: linear-gradient(135deg, #ffffff 0%, #f0f8f9 100%) !important;
}

/* Tab Content Enhancement */
.tab-content {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-radius: 15px;
    border: 1px solid rgba(1, 88, 98, 0.05);
}

/* Section Header Enhancement */
.company-overview h2 {
    background: linear-gradient(135deg, var(--primary-color, #015862) 0%, #027a8a 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: inline-block;
}

/* Animation Enhancement */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.tab-pane.fade.show {
    animation: fadeInUp 0.5s ease-out;
}

/* Responsive Color Adjustments */
@media (max-width: 768px) {
    .company-overview {
        background: linear-gradient(135deg, #ffffff 0%, #f5f7f8 100%);
    }
    
    .nav-pills .nav-link {
        background-color: #f8f9fa;
        border: 1px solid rgba(1, 88, 98, 0.1);
    }
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
                        <h2 class="fw-bold text-primary mb-2">Tổng Quan</h2>
                        <p class="text-muted">Những định hướng và giá trị cốt lõi của Thanh Cúc</p>
                    </div>
                    
                    <!-- Tab Navigation -->
                    <ul class="nav nav-pills nav-fill mb-4" id="aboutTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                                <i class="fas fa-info-circle me-2"></i>Tổng Quan
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="mission-tab" data-bs-toggle="tab" data-bs-target="#mission" type="button" role="tab" aria-controls="mission" aria-selected="false">
                                <i class="fas fa-bullseye me-2"></i>Sứ Mệnh
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="vision-tab" data-bs-toggle="tab" data-bs-target="#vision" type="button" role="tab" aria-controls="vision" aria-selected="false">
                                <i class="fas fa-eye me-2"></i>Tầm Nhìn
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="values-tab" data-bs-toggle="tab" data-bs-target="#values" type="button" role="tab" aria-controls="values" aria-selected="false">
                                <i class="fas fa-star me-2"></i>Giá Trị
                            </button>
                        </li>
                    </ul>
                    
                    <!-- Tab Content -->
                    <div class="tab-content" id="aboutTabsContent">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-building fa-3x text-primary"></i>
                                    </div>
                                    <h4 class="fw-bold mb-3 text-primary">Tổng Quan</h4>
                                    <p class="text-muted">
                                        {{ \App\Models\Setting::get('about_overview_short', 'Trung tâm tiếng Đức Thanh Cúc - Nơi ươm mầm tài năng, kiến tạo tương lai cho học viên Việt Nam.') }}
                                    </p>
                                    <div class="mt-4">
                                        <div class="d-flex flex-wrap gap-3 justify-content-center">
                                            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Học Thử Miễn Phí</a>
                                            <a href="tel:0975186230" class="btn btn-outline-primary btn-lg">0975.186.230</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Mission Tab -->
                        <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-bullseye fa-3x text-primary"></i>
                                    </div>
                                    <h4 class="fw-bold mb-3 text-primary">Sứ Mệnh</h4>
                                    <p class="text-muted">
                                        {{ \App\Models\Setting::get('about_mission', 'Giúp hàng triệu người Việt Nam vượt qua tiếng Đức dễ dàng, một lần và mãi mãi thông qua phương pháp học đơn giản, hiệu quả và khoa học.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Vision Tab -->
                        <div class="tab-pane fade" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-eye fa-3x text-primary"></i>
                                    </div>
                                    <h4 class="fw-bold mb-3 text-primary">Tầm Nhìn</h4>
                                    <p class="text-muted">
                                        {{ \App\Models\Setting::get('about_vision', 'Trở thành trung tâm tiếng Đức hàng đầu Việt Nam, được công nhận về chất lượng giảng dạy và phương pháp học tiếng Đức độc quyền.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Core Values Tab -->
                        <div class="tab-pane fade" id="values" role="tabpanel" aria-labelledby="values-tab">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4">
                                    <div class="text-center mb-3">
                                        <i class="fas fa-star fa-3x text-primary"></i>
                                        <h4 class="fw-bold mb-3 text-primary">Giá Trị Cốt Lõi</h4>
                                    </div>
                                    @php
                                        $coreValues = json_decode(\App\Models\Setting::get('about_core_values', '[]'), true);
                                    @endphp
                                    
                                    @if(count($coreValues) > 0)
                                        <div class="row g-3">
                                            @foreach($coreValues as $value)
                                                <div class="col-6">
                                                    <div class="text-center p-3 bg-light rounded core-value-item">
                                                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                             style="width: 50px; height: 50px;">
                                                            <i class="{{ $value['icon'] ?? 'fas fa-star' }} text-white"></i>
                                                        </div>
                                                        <h6 class="fw-bold mb-2 small text-primary">{{ $value['title'] ?? '' }}</h6>
                                                        <p class="text-muted small mb-0">{{ Str::limit($value['description'] ?? '', 60) }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <p class="text-muted">Chất lượng - Tận tâm - Sáng tạo - Hiệu quả</p>
                                        </div>
                                    @endif
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
                     alt="Thanh Cúc Building" 
                     class="img-fluid rounded shadow-lg animate-on-scroll"
                     onerror="this.src='{{ asset('images/about/sec-building.svg') }}?v={{ time() }}'">
            </div>
        </div>
    </div>
</section>





<!-- Teaching Staff -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Đội Ngũ Giảng Viên</h2>
            <p class="text-muted">Đội ngũ giảng viên chuyên nghiệp với kinh nghiệm giảng dạy tiếng Đức nhiều năm</p>
        </div>
        
                 <div class="row">
             @php
                 $teachers = \App\Models\Teacher::where('is_active', true)
                     ->orderBy('sort_order')
                     ->orderBy('name')
                     ->get();
             @endphp
             
             @forelse($teachers as $teacher)
                <div class="col-lg-6 mb-5">
                    <div class="card h-100 border-0 shadow-sm teacher-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                                                <div class="teacher-image-container">
                                     @if($teacher->avatar)
                                         <img src="{{ asset('storage/' . $teacher->avatar) }}" 
                                              alt="{{ $teacher->name }}" 
                                              class="img-fluid teacher-image">
                                     @else
                                         <div class="teacher-placeholder d-flex align-items-center justify-content-center">
                                             <i class="fas fa-user fa-3x text-muted"></i>
                                         </div>
                                     @endif
                                     <div class="teacher-overlay">
                                         <div class="teacher-social">
                                             <a href="#" class="btn btn-light btn-sm rounded-circle">
                                                 <i class="fas fa-envelope"></i>
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body p-4">
                                     <h5 class="fw-bold text-primary mb-1">{{ $teacher->name }}</h5>
                                     <p class="text-muted mb-3">{{ $teacher->specialization }}</p>
                                     
                                     @if($teacher->certification)
                                     <div class="mb-3">
                                         <h6 class="fw-bold mb-2">
                                             <i class="fas fa-graduation-cap text-primary me-2"></i>Trình độ
                                         </h6>
                                         <p class="small mb-0">{{ $teacher->certification }}</p>
                                     </div>
                                     @endif
                                     
                                     @if($teacher->experience_years)
                                     <div class="mb-3">
                                         <h6 class="fw-bold mb-2">
                                             <i class="fas fa-clock text-primary me-2"></i>Kinh nghiệm
                                         </h6>
                                         <p class="small mb-0">{{ $teacher->experience_years }}+ năm kinh nghiệm</p>
                                     </div>
                                     @endif
                                     
                                     @if($teacher->bio)
                                     <div class="mb-3">
                                         <h6 class="fw-bold mb-2">
                                             <i class="fas fa-info-circle text-primary me-2"></i>Giới thiệu
                                         </h6>
                                         <div class="small mb-0">{!! $teacher->bio !!}</div>
                                     </div>
                                     @endif
                                     
                                     @if($teacher->achievements && count($teacher->achievements) > 0)
                                     <div>
                                         <h6 class="fw-bold mb-2">
                                             <i class="fas fa-trophy text-primary me-2"></i>Thành tích
                                         </h6>
                                         <div class="d-flex flex-wrap gap-1">
                                             @foreach($teacher->achievements as $achievement)
                                                 <span class="badge bg-light text-dark">{{ $achievement }}</span>
                                             @endforeach
                                         </div>
                                     </div>
                                     @endif
                                 </div>
                             </div>
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
            <h2 class="fw-bold text-primary mb-3">Lớp Học Của Thanh Cúc</h2>
            <p class="text-muted">Không gian học tập sinh động và hiện đại, nơi học viên trải nghiệm phương pháp học tiếng Đức độc đáo</p>
        </div>
        
        <!-- Classroom Slider -->
        <div class="position-relative">
            <div class="gallery-slider" id="classroomSlider">
                
                <div class="slider-container">
                    @foreach($classrooms as $index => $classroom)
                        <div class="slider-item" data-gallery="classroom" data-index="{{ $index }}">
                            <div class="slider-card">
                                <div class="slider-image-container">
                                    <img src="{{ $classroom->image_url }}" 
                                         alt="{{ $classroom->title }}" 
                                         class="slider-image">
                                    @if($classroom->level)
                                        <div class="slider-level-badge">
                                            <span class="badge bg-primary">{{ $classroom->level }}</span>
                                        </div>
                                    @endif
                                    <div class="slider-overlay">
                                        <div class="slider-content">
                                            <h6 class="text-white fw-bold mb-1">{{ $classroom->title }}</h6>
                                            <p class="text-white-50 small mb-1">{{ $classroom->description }}</p>
                                            @if($classroom->students)
                                                <span class="badge bg-light text-dark small">
                                                    <i class="fas fa-users me-1"></i>{{ $classroom->students }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="slider-click-overlay">
                                        <i class="fas fa-search-plus fa-2x text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            @if($classrooms->count() >= 4)
            <button class="slider-nav slider-prev" onclick="moveSlider('classroomSlider', -1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-nav slider-next" onclick="moveSlider('classroomSlider', 1)">
                <i class="fas fa-chevron-right"></i>
            </button>
            @endif
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
            <h2 class="fw-bold text-primary mb-3">Cơ Sở Vật Chất</h2>
            <p class="text-muted">Không gian học tập hiện đại, trang thiết bị đầy đủ cho việc học tiếng Đức hiệu quả</p>
        </div>
        
        <!-- Facilities Slider -->
        <div class="position-relative">
            <div class="gallery-slider" id="facilitiesSlider">
            
                <div class="slider-container">
            @foreach($facilities as $index => $facility)
                        <div class="slider-item" data-gallery="facility" data-index="{{ $index }}">
                            <div class="slider-card">
                                <div class="slider-image-container">
                                    <img src="{{ $facility->image_url }}" 
                                         alt="{{ $facility->title }}" 
                                         class="slider-image">
                                    <div class="slider-overlay">
                                        <div class="slider-content">
                                            <h6 class="text-white fw-bold mb-1">{{ $facility->title }}</h6>
                                            <p class="text-white-50 small mb-0">{{ $facility->description }}</p>
                                </div>
                            </div>
                                    <div class="slider-click-overlay">
                                        <i class="fas fa-search-plus fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            @if($facilities->count() >= 4)
            <button class="slider-nav slider-prev" onclick="moveSlider('facilitiesSlider', -1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-nav slider-next" onclick="moveSlider('facilitiesSlider', 1)">
                <i class="fas fa-chevron-right"></i>
            </button>
            @endif
        </div>
        

    </div>
</section>
@endif





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
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">Học Thử Miễn Phí</a>
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

/* Gallery Slider Styles */
.gallery-slider {
    overflow: hidden;
    position: relative;
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease;
    gap: 20px;
}

.slider-item {
    flex: 0 0 300px;
    height: 250px;
    cursor: pointer;
}

.slider-card {
    height: 100%;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.slider-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.slider-image-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.slider-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.slider-card:hover .slider-image {
    transform: scale(1.1);
}

.slider-level-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 3;
}

.slider-level-badge .badge {
    font-size: 0.8rem;
    padding: 6px 10px;
    border-radius: 15px;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.slider-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(1, 88, 98, 0.8), rgba(62, 184, 80, 0.8));
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: end;
    padding: 1.5rem;
    z-index: 2;
}

.slider-card:hover .slider-overlay {
    opacity: 1;
}

.slider-content {
    transform: translateY(20px);
    transition: transform 0.3s ease;
    width: 100%;
}

.slider-card:hover .slider-content {
    transform: translateY(0);
}

.slider-click-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 4;
    pointer-events: auto;
    cursor: pointer;
}

.slider-card:hover .slider-click-overlay {
    opacity: 1;
}

/* Slider Navigation */
.slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(1, 88, 98, 0.8);
    border: none;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 5;
    cursor: pointer;
}

.slider-nav:hover {
    background: var(--primary-color);
    transform: translateY(-50%) scale(1.1);
    color: white;
}

.slider-prev {
    left: -25px;
}

.slider-next {
    right: -25px;
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



/* Responsive Design */
@media (max-width: 768px) {
    .teacher-image-container {
        height: 150px;
    }
    
    .slider-item {
        flex: 0 0 250px;
        height: 200px;
    }
    
    .slider-overlay {
        padding: 1rem;
    }
    
    .slider-nav {
        width: 40px;
        height: 40px;
    }
    
    .slider-prev {
        left: -20px;
    }
    
    .slider-next {
        right: -20px;
    }
    
    .gallery-nav {
        width: 50px;
        height: 50px;
    }
    
    .teacher-card .card-body {
        padding: 1.5rem !important;
    }
}

@media (max-width: 576px) {
    .slider-item {
        flex: 0 0 200px;
        height: 180px;
    }
    
    .slider-container {
        gap: 15px;
    }
    
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
<script>
// Gallery data from database
@php
    $allClassrooms = \App\Models\Gallery::active()->classroom()->ordered()->get();
    $allFacilities = \App\Models\Gallery::active()->facility()->ordered()->get();
@endphp

const galleryData = {
    classroom: [
        @foreach($allClassrooms as $classroom)
        {
            image: '{{ $classroom->image_url }}',
            title: '{{ $classroom->title }}',
            description: '{{ $classroom->description ?? '' }}'
        }@if(!$loop->last),@endif
        @endforeach
    ],
    facility: [
        @foreach($allFacilities as $facility)
        {
            image: '{{ $facility->image_url }}',
            title: '{{ $facility->title }}',
            description: '{{ $facility->description ?? '' }}'
        }@if(!$loop->last),@endif
        @endforeach
    ]
};

// Slider positions
const sliderPositions = {
    classroomSlider: 0,
    facilitiesSlider: 0
};

// Current gallery state
let currentGallery = null;
let currentImageIndex = 0;

// Move slider function
function moveSlider(sliderId, direction) {
    const slider = document.getElementById(sliderId);
    const container = slider.querySelector('.slider-container');
    const items = container.querySelectorAll('.slider-item');
    const itemWidth = 320; // 300px + 20px gap
    const visibleItems = Math.floor(slider.offsetWidth / itemWidth);
    const maxPosition = -(items.length - visibleItems) * itemWidth;
    
    // Only move if there are more items than visible
    if (items.length <= visibleItems) {
        return;
    }
    
    sliderPositions[sliderId] += direction * itemWidth;
    
    // Boundary checks
    if (sliderPositions[sliderId] > 0) {
        sliderPositions[sliderId] = 0;
    } else if (sliderPositions[sliderId] < maxPosition) {
        sliderPositions[sliderId] = maxPosition;
    }
    
    container.style.transform = `translateX(${sliderPositions[sliderId]}px)`;
    
    // Update navigation button states
    updateNavigationButtons(sliderId);
}

// Update navigation button states
function updateNavigationButtons(sliderId) {
    const slider = document.getElementById(sliderId);
    const container = slider.querySelector('.slider-container');
    const items = container.querySelectorAll('.slider-item');
    const itemWidth = 320;
    const visibleItems = Math.floor(slider.offsetWidth / itemWidth);
    const maxPosition = -(items.length - visibleItems) * itemWidth;
    
    const prevBtn = slider.parentElement.querySelector('.slider-prev');
    const nextBtn = slider.parentElement.querySelector('.slider-next');
    
    if (prevBtn && nextBtn) {
        // Disable/enable prev button
        if (sliderPositions[sliderId] >= 0) {
            prevBtn.style.opacity = '0.5';
            prevBtn.style.pointerEvents = 'none';
        } else {
            prevBtn.style.opacity = '1';
            prevBtn.style.pointerEvents = 'auto';
        }
        
        // Disable/enable next button
        if (sliderPositions[sliderId] <= maxPosition) {
            nextBtn.style.opacity = '0.5';
            nextBtn.style.pointerEvents = 'none';
        } else {
            nextBtn.style.opacity = '1';
            nextBtn.style.pointerEvents = 'auto';
        }
    }
}

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
    if (!currentGallery || !galleryData[currentGallery]) return;
    
    const data = galleryData[currentGallery];
    currentImageIndex += direction;
    
    // Boundary checks with loop
    if (currentImageIndex >= data.length) {
        currentImageIndex = 0;
    } else if (currentImageIndex < 0) {
        currentImageIndex = data.length - 1;
    }
    
    updateGalleryModal();
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize about tabs functionality
    initializeAboutTabs();
    
    // Initialize scroll animations
    initializeScrollAnimations();
    // Add click event listeners to slider items
    document.querySelectorAll('.slider-item').forEach(item => {
        item.addEventListener('click', function() {
            const galleryType = this.getAttribute('data-gallery');
            const imageIndex = parseInt(this.getAttribute('data-index'));
            openGallery(galleryType, imageIndex);
        });
    });
    
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
    
    // Initialize navigation buttons
    ['classroomSlider', 'facilitiesSlider'].forEach(sliderId => {
        updateNavigationButtons(sliderId);
    });
    
    // Auto-resize sliders on window resize
    window.addEventListener('resize', function() {
        // Reset slider positions on resize
        Object.keys(sliderPositions).forEach(sliderId => {
            sliderPositions[sliderId] = 0;
            const slider = document.getElementById(sliderId);
            if (slider) {
                const container = slider.querySelector('.slider-container');
                container.style.transform = 'translateX(0px)';
                updateNavigationButtons(sliderId);
            }
        });
    });
    
    // Touch/swipe support for mobile
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    
    document.querySelectorAll('.gallery-slider').forEach(slider => {
        slider.addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
            isDragging = true;
        });
        
        slider.addEventListener('touchmove', function(e) {
            if (!isDragging) return;
            currentX = e.touches[0].clientX;
        });
        
        slider.addEventListener('touchend', function(e) {
            if (!isDragging) return;
            isDragging = false;
            
            const diffX = startX - currentX;
            const threshold = 50;
            
            if (Math.abs(diffX) > threshold) {
                const direction = diffX > 0 ? 1 : -1;
                moveSlider(this.id, direction);
            }
        });
    });
});
</script>
@endpush
