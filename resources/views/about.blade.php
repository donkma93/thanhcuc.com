@extends('layouts.app')

@section('title', 'Về Chúng Tôi - Trung Tâm Tiếng Đức Thanh Cúc')

@push('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
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
        <div class="fullscreen-image-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center text-white">
                        <h2 class="display-5 fw-bold mb-4">{{ $headerTitle }}</h2>
                        <p class="lead mb-4">{{ $headerSubtitle }}</p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            @if(!empty($headerStats))
                                @foreach($headerStats as $stat)
                                    <div class="stat-item">
                                        <div class="stat-number fw-bold">{{ $stat['number'] ?? '' }}</div>
                                        <div class="stat-label">{{ $stat['label'] ?? '' }}</div>
                                    </div>
                                @endforeach
                            @else
                                <div class="stat-item">
                                    <div class="stat-number fw-bold">25+</div>
                                    <div class="stat-label">Giảng viên</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number fw-bold">4+</div>
                                    <div class="stat-label">Năm kinh nghiệm</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number fw-bold">1000+</div>
                                    <div class="stat-label">Học viên thành công</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Overview -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold text-primary mb-4">{{ \App\Models\Setting::get('about_overview_title', 'TỔNG QUAN TRUNG TÂM ANH NGỮ SEC') }}</h2>
                <div class="mb-4">
                    {!! nl2br(\App\Models\Setting::get('about_overview_content', 'Nội dung tổng quan về trung tâm')) !!}
                </div>
                <div class="d-flex gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Học Thử Miễn Phí</a>
                    <a href="tel:0975186230" class="btn btn-outline-primary btn-lg">0975.186.230</a>
                </div>
            </div>
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

<!-- Mission & Vision -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="fas fa-bullseye fa-4x text-primary"></i>
                        </div>
                        <h3 class="fw-bold mb-4">Sứ Mệnh</h3>
                        <p class="text-muted">
                            {{ \App\Models\Setting::get('about_mission', 'Giúp hàng triệu người Việt Nam vượt qua tiếng Anh dễ dàng, một lần và mãi mãi thông qua phương pháp học đơn giản, hiệu quả và khoa học.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="fas fa-eye fa-4x text-primary"></i>
                        </div>
                        <h3 class="fw-bold mb-4">Tầm Nhìn</h3>
                        <p class="text-muted">
                            {{ \App\Models\Setting::get('about_vision', 'Trở thành trung tâm anh ngữ hàng đầu Việt Nam, được công nhận về chất lượng giảng dạy và phương pháp học tiếng Anh độc quyền.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Giá Trị Cốt Lõi</h2>
            <p class="text-muted">Những giá trị định hướng mọi hoạt động của SEC</p>
        </div>
        
        <div class="row">
            @php
                $coreValues = json_decode(\App\Models\Setting::get('about_core_values', '[]'), true);
            @endphp
            
            @foreach($coreValues as $value)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="text-center">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="{{ $value['icon'] ?? 'fas fa-star' }} fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ $value['title'] ?? '' }}</h5>
                        <p class="text-muted">{{ $value['description'] ?? '' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Achievements -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Thành Tựu Đạt Được</h2>
            <p class="text-muted">Những con số ấn tượng sau 7 năm hoạt động</p>
        </div>
        
        <div class="row text-center">
            @php
                $achievements = json_decode(\App\Models\Setting::get('about_achievements', '[]'), true);
            @endphp
            
            @foreach($achievements as $achievement)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4">
                            <div class="h1 fw-bold text-primary mb-2">{{ $achievement['number'] ?? '' }}</div>
                            <h5 class="fw-bold mb-2">{{ $achievement['title'] ?? '' }}</h5>
                            <p class="text-muted mb-0">{{ $achievement['description'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
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
                                         <p class="small mb-0">{!! Str::limit(strip_tags($teacher->bio), 100) !!}</p>
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
        
        <!-- Facility Features -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h4 class="fw-bold text-center mb-4">Tiện Ích Đặc Biệt</h4>
                        <div class="row text-center">
                            <div class="col-lg-3 col-md-6 mb-3">
                                <div class="facility-feature">
                                    <i class="fas fa-wifi fa-2x text-primary mb-3"></i>
                                    <h6 class="fw-bold">WiFi Miễn Phí</h6>
                                    <p class="text-muted small">Kết nối internet tốc độ cao</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <div class="facility-feature">
                                    <i class="fas fa-coffee fa-2x text-primary mb-3"></i>
                                    <h6 class="fw-bold">Khu Vực Nghỉ</h6>
                                    <p class="text-muted small">Không gian thư giãn với đồ uống miễn phí</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <div class="facility-feature">
                                    <i class="fas fa-parking fa-2x text-primary mb-3"></i>
                                    <h6 class="fw-bold">Bãi Đỗ Xe</h6>
                                    <p class="text-muted small">Chỗ đỗ xe máy và ô tô an toàn</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-3">
                                <div class="facility-feature">
                                    <i class="fas fa-shield-alt fa-2x text-primary mb-3"></i>
                                    <h6 class="fw-bold">An Ninh 24/7</h6>
                                    <p class="text-muted small">Hệ thống bảo vệ và camera giám sát</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
/* Teaching Staff Styles */
.teacher-card {
    transition: all 0.3s ease;
    overflow: hidden;
}

.teacher-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.teacher-image-container {
    position: relative;
    overflow: hidden;
    height: 200px;
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

/* Facility Features */
.facility-feature {
    padding: 1rem;
    transition: all 0.3s ease;
}

.facility-feature:hover {
    transform: translateY(-5px);
}

.facility-feature i {
    transition: all 0.3s ease;
}

.facility-feature:hover i {
    transform: scale(1.1);
    color: var(--secondary-color) !important;
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
