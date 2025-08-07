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

<!-- Locations -->
<section class="py-5">
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
