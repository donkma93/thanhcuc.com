@extends('layouts.app')

@section('title', 'Về Chúng Tôi - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ \App\Models\Setting::get('about_page_title', 'Về Chúng Tôi') }}</h1>
                <p class="lead">
                    {{ \App\Models\Setting::get('about_page_subtitle', 'Tìm hiểu về hành trình 4 năm phát triển của Thanh Cúc và sứ mệnh giúp hàng ngàn người chinh phục tiếng Đức thành công') }}
                </p>
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
                <img src="{{ asset('images/about/sec-building.svg') }}" 
                     alt="Thanh Cúc Building" class="img-fluid rounded shadow-lg animate-on-scroll">
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
                                         <p class="small mb-0">{{ Str::limit($teacher->bio, 100) }}</p>
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

<!-- Facilities -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Cơ Sở Vật Chất</h2>
            <p class="text-muted">Không gian học tập hiện đại, trang thiết bị đầy đủ cho việc học tiếng Đức hiệu quả</p>
        </div>
        
        <div class="row">
            @php
                $facilities = [
                    [
                        'image' => 'classroom-1.jpg',
                        'title' => 'Phòng học hiện đại',
                        'description' => 'Phòng học được trang bị đầy đủ thiết bị âm thanh, hình ảnh chất lượng cao'
                    ],
                    [
                        'image' => 'classroom-2.jpg', 
                        'title' => 'Thư viện tài liệu',
                        'description' => 'Kho tàng sách báo, tài liệu tiếng Đức phong phú và cập nhật'
                    ],
                    [
                        'image' => 'computer-lab.jpg',
                        'title' => 'Phòng máy tính',
                        'description' => 'Phòng máy tính với phần mềm học tiếng Đức chuyên nghiệp'
                    ],
                    [
                        'image' => 'reception.jpg',
                        'title' => 'Khu vực tiếp đón',
                        'description' => 'Không gian tiếp đón thân thiện, tư vấn nhiệt tình'
                    ],
                    [
                        'image' => 'study-area.jpg',
                        'title' => 'Khu vực tự học',
                        'description' => 'Không gian yên tĩnh cho học viên ôn tập và làm bài tập'
                    ],
                    [
                        'image' => 'meeting-room.jpg',
                        'title' => 'Phòng họp nhóm',
                        'description' => 'Phòng học nhóm nhỏ cho các hoạt động thảo luận và thực hành'
                    ]
                ];
            @endphp
            
            @foreach($facilities as $index => $facility)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="facility-card">
                        <div class="facility-image-container">
                            <img src="{{ asset('images/facilities/' . $facility['image']) }}" 
                                 alt="{{ $facility['title'] }}" 
                                 class="facility-image">
                            <div class="facility-overlay">
                                <div class="facility-content">
                                    <h5 class="text-white fw-bold mb-2">{{ $facility['title'] }}</h5>
                                    <p class="text-white-50 mb-0">{{ $facility['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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

<!-- Classroom Gallery -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Lớp Học Của Thanh Cúc</h2>
            <p class="text-muted">Không gian học tập sinh động và hiện đại, nơi học viên trải nghiệm phương pháp học tiếng Đức độc đáo</p>
        </div>
        
        <div class="row">
            @php
                $classrooms = [
                    [
                        'image' => 'class-1.jpg',
                        'title' => 'Lớp học A1 - Cơ bản',
                        'description' => 'Lớp học dành cho người mới bắt đầu với tiếng Đức',
                        'students' => '15-20 học viên',
                        'level' => 'A1'
                    ],
                    [
                        'image' => 'class-2.jpg',
                        'title' => 'Lớp học A2 - Sơ cấp',
                        'description' => 'Phát triển kỹ năng giao tiếp cơ bản',
                        'students' => '12-18 học viên',
                        'level' => 'A2'
                    ],
                    [
                        'image' => 'class-3.jpg',
                        'title' => 'Lớp học B1 - Trung cấp',
                        'description' => 'Nâng cao khả năng sử dụng tiếng Đức trong công việc',
                        'students' => '10-15 học viên',
                        'level' => 'B1'
                    ],
                    [
                        'image' => 'class-4.jpg',
                        'title' => 'Lớp học B2 - Trung cấp cao',
                        'description' => 'Chuẩn bị cho các kỳ thi chứng chỉ quốc tế',
                        'students' => '8-12 học viên',
                        'level' => 'B2'
                    ],
                    [
                        'image' => 'class-5.jpg',
                        'title' => 'Lớp học nhóm nhỏ',
                        'description' => 'Học tập cá nhân hóa với sự chú ý đặc biệt',
                        'students' => '4-6 học viên',
                        'level' => 'All'
                    ],
                    [
                        'image' => 'class-6.jpg',
                        'title' => 'Lớp học thực hành',
                        'description' => 'Rèn luyện kỹ năng nghe nói qua hoạt động thực tế',
                        'students' => '8-15 học viên',
                        'level' => 'B1+'
                    ]
                ];
            @endphp
            
            @foreach($classrooms as $index => $classroom)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="classroom-card">
                        <div class="classroom-image-container">
                            <img src="{{ asset('images/classrooms/' . $classroom['image']) }}" 
                                 alt="{{ $classroom['title'] }}" 
                                 class="classroom-image">
                            <div class="classroom-level-badge">
                                <span class="badge bg-primary">{{ $classroom['level'] }}</span>
                            </div>
                            <div class="classroom-overlay">
                                <div class="classroom-content">
                                    <h5 class="text-white fw-bold mb-2">{{ $classroom['title'] }}</h5>
                                    <p class="text-white-50 mb-2">{{ $classroom['description'] }}</p>
                                    <div class="classroom-info">
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-users me-1"></i>{{ $classroom['students'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Classroom Features -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h4 class="fw-bold text-center mb-4">Đặc Điểm Lớp Học</h4>
                        <div class="row text-center">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="classroom-feature">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-chalkboard-teacher fa-3x text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold">Giảng Dạy Tương Tác</h6>
                                    <p class="text-muted small">Phương pháp học tập chủ động với nhiều hoạt động thực hành</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="classroom-feature">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-users fa-3x text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold">Lớp Học Nhỏ</h6>
                                    <p class="text-muted small">Tối đa 20 học viên để đảm bảo chất lượng giảng dạy</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="classroom-feature">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-laptop fa-3x text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold">Công Nghệ Hiện Đại</h6>
                                    <p class="text-muted small">Trang bị máy chiếu, âm thanh và phần mềm học tập</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="classroom-feature">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-certificate fa-3x text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold">Chuẩn Châu Âu</h6>
                                    <p class="text-muted small">Chương trình học theo khung tham chiếu châu Âu CEFR</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Locations -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Hệ Thống Cơ Sở</h2>
            <p class="text-muted">4 cơ sở tại Hà Nội phục vụ học viên</p>
        </div>
        
        <div class="row">
            @php
                $locations = json_decode(\App\Models\Setting::get('about_locations', '[]'), true);
            @endphp
            
            @foreach($locations as $location)
                <div class="col-lg-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>{{ $location['name'] ?? '' }}
                            </h5>
                            <p class="mb-2"><strong>Địa chỉ:</strong> {{ $location['address'] ?? '' }}</p>
                            <p class="mb-2"><strong>Điện thoại:</strong> {{ $location['phone'] ?? '' }}</p>
                            <p class="text-muted">{{ $location['description'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

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

/* Facilities Styles */
.facility-card {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    height: 300px;
    transition: all 0.3s ease;
}

.facility-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.facility-image-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
    border-radius: 15px;
}

.facility-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.facility-card:hover .facility-image {
    transform: scale(1.1);
}

.facility-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(1, 88, 98, 0.7), rgba(62, 184, 80, 0.7));
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: end;
    padding: 2rem;
}

.facility-card:hover .facility-overlay {
    opacity: 1;
}

.facility-content {
    transform: translateY(20px);
    transition: transform 0.3s ease;
}

.facility-card:hover .facility-content {
    transform: translateY(0);
}

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

/* Responsive adjustments */
@media (max-width: 768px) {
    .teacher-image-container {
        height: 150px;
    }
    
    .facility-card {
        height: 250px;
        margin-bottom: 1rem;
    }
    
    .facility-overlay {
        padding: 1rem;
    }
    
    .teacher-card .card-body {
        padding: 1.5rem !important;
    }
}

/* Animation for scroll */
.teacher-card,
.facility-card {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.6s ease forwards;
}

.teacher-card:nth-child(1) { animation-delay: 0.1s; }
.teacher-card:nth-child(2) { animation-delay: 0.2s; }
.teacher-card:nth-child(3) { animation-delay: 0.3s; }
.teacher-card:nth-child(4) { animation-delay: 0.4s; }

.facility-card:nth-child(1) { animation-delay: 0.1s; }
.facility-card:nth-child(2) { animation-delay: 0.2s; }
.facility-card:nth-child(3) { animation-delay: 0.3s; }
.facility-card:nth-child(4) { animation-delay: 0.4s; }
.facility-card:nth-child(5) { animation-delay: 0.5s; }
.facility-card:nth-child(6) { animation-delay: 0.6s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Classroom Gallery Styles */
.classroom-card {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    height: 280px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.classroom-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.classroom-image-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
    border-radius: 15px;
}

.classroom-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.classroom-card:hover .classroom-image {
    transform: scale(1.15);
}

.classroom-level-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 2;
}

.classroom-level-badge .badge {
    font-size: 0.9rem;
    padding: 8px 12px;
    border-radius: 20px;
    font-weight: 600;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.classroom-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(1, 88, 98, 0.85), rgba(62, 184, 80, 0.85));
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: end;
    padding: 2rem;
}

.classroom-card:hover .classroom-overlay {
    opacity: 1;
}

.classroom-content {
    transform: translateY(30px);
    transition: transform 0.3s ease;
    width: 100%;
}

.classroom-card:hover .classroom-content {
    transform: translateY(0);
}

.classroom-info .badge {
    font-size: 0.8rem;
    padding: 6px 12px;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.9) !important;
    color: #333 !important;
}

/* Classroom Features */
.classroom-feature {
    padding: 1.5rem;
    transition: all 0.3s ease;
    border-radius: 10px;
}

.classroom-feature:hover {
    transform: translateY(-5px);
    background: rgba(1, 88, 98, 0.05);
}

.feature-icon {
    transition: all 0.3s ease;
}

.classroom-feature:hover .feature-icon i {
    transform: scale(1.1);
    color: var(--bs-primary) !important;
}

.classroom-feature h6 {
    color: #333;
    margin-bottom: 0.5rem;
}

/* Animation delays for classroom items */
.classroom-card {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.6s ease forwards;
}

.classroom-card:nth-child(1) { animation-delay: 0.1s; }
.classroom-card:nth-child(2) { animation-delay: 0.2s; }
.classroom-card:nth-child(3) { animation-delay: 0.3s; }
.classroom-card:nth-child(4) { animation-delay: 0.4s; }
.classroom-card:nth-child(5) { animation-delay: 0.5s; }
.classroom-card:nth-child(6) { animation-delay: 0.6s; }

/* Responsive adjustments for classrooms */
@media (max-width: 768px) {
    .classroom-card {
        height: 220px;
        margin-bottom: 1.5rem;
    }
    
    .classroom-overlay {
        padding: 1.5rem;
    }
    
    .classroom-level-badge {
        top: 10px;
        left: 10px;
    }
    
    .classroom-level-badge .badge {
        font-size: 0.8rem;
        padding: 6px 10px;
    }
    
    .classroom-feature {
        padding: 1rem;
        margin-bottom: 1rem;
    }
    
    .feature-icon i {
        font-size: 2rem !important;
    }
}

/* Hover effects for classroom features */
.classroom-feature {
    position: relative;
    overflow: hidden;
}

.classroom-feature::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(1, 88, 98, 0.1), transparent);
    transition: left 0.5s;
}

.classroom-feature:hover::before {
    left: 100%;
}
</style>
@endpush
