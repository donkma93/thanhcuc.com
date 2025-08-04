@extends('layouts.app')

@section('title', 'Về Chúng Tôi - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Về Chúng Tôi</h1>
                <p class="lead">
                    Tìm hiểu về hành trình 4 năm phát triển của Thanh Cúc và sứ mệnh 
                    giúp hàng ngàn người chinh phục tiếng Đức thành công
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
                <h2 class="fw-bold text-primary mb-4">TỔNG QUAN TRUNG TÂM ANH NGỮ SEC</h2>
                <p class="mb-4">
                    ⚡Ra đời từ năm 2017, SEC (Simple English Center) đã trở thành điểm đến tin cậy của hàng ngàn học viên. 
                    Với <strong>phương pháp học tiếng Anh đơn giản, hiệu quả,</strong> SEC giúp bạn không chỉ hiểu sâu bản chất ngôn ngữ 
                    mà còn tránh học vẹt. Đến nay, <strong>hơn 30.000 học viên đã tin tưởng và lựa chọn SEC</strong>, 
                    minh chứng cho chất lượng giảng dạy vượt trội.
                </p>
                <p class="mb-4">
                    ⚡Khát vọng của SEC là giúp hàng triệu người <strong>vượt qua Tiếng Anh dễ dàng, một lần và mãi mãi</strong>. 
                    Hãy đến với SEC để trải nghiệm <strong>phương pháp học tiếng Anh hiệu quả, giúp bạn tự tin giao tiếp ngay hôm nay!</strong>
                </p>
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
                            Giúp hàng triệu người Việt Nam vượt qua tiếng Anh dễ dàng, một lần và mãi mãi 
                            thông qua phương pháp học đơn giản, hiệu quả và khoa học.
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
                            Trở thành trung tâm anh ngữ hàng đầu Việt Nam, được công nhận về chất lượng 
                            giảng dạy và phương pháp học tiếng Anh độc quyền.
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
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-heart fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Tận Tâm</h5>
                    <p class="text-muted">Luôn đặt lợi ích của học viên lên hàng đầu, tận tâm trong từng buổi học</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-lightbulb fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Sáng Tạo</h5>
                    <p class="text-muted">Không ngừng đổi mới phương pháp giảng dạy để mang lại hiệu quả tốt nhất</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-award fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Chất Lượng</h5>
                    <p class="text-muted">Cam kết chất lượng giảng dạy cao với đội ngũ giảng viên chuyên nghiệp</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-handshake fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Uy Tín</h5>
                    <p class="text-muted">Xây dựng niềm tin với học viên thông qua kết quả học tập thực tế</p>
                </div>
            </div>
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
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 h-100">
                    <div class="card-body p-4">
                        <div class="h1 fw-bold text-primary mb-2">30,000+</div>
                        <h5 class="fw-bold mb-2">Học Viên</h5>
                        <p class="text-muted mb-0">Đã tin tưởng và lựa chọn SEC</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 h-100">
                    <div class="card-body p-4">
                        <div class="h1 fw-bold text-primary mb-2">95%</div>
                        <h5 class="fw-bold mb-2">Tỷ Lệ Đạt Mục Tiêu</h5>
                        <p class="text-muted mb-0">Học viên đạt điểm số mong muốn</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 h-100">
                    <div class="card-body p-4">
                        <div class="h1 fw-bold text-primary mb-2">4</div>
                        <h5 class="fw-bold mb-2">Cơ Sở</h5>
                        <p class="text-muted mb-0">Tại Hà Nội phục vụ học viên</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 h-100">
                    <div class="card-body p-4">
                        <div class="h1 fw-bold text-primary mb-2">50+</div>
                        <h5 class="fw-bold mb-2">Giảng Viên</h5>
                        <p class="text-muted mb-0">Chuyên nghiệp với chứng chỉ quốc tế</p>
                    </div>
                </div>
            </div>
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
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Cơ Sở 1
                        </h5>
                        <p class="mb-2"><strong>Địa chỉ:</strong> 108B Trường Chinh, Đống Đa, Hà Nội</p>
                        <p class="mb-2"><strong>Điện thoại:</strong> 0975.186.230</p>
                        <p class="text-muted">Cơ sở chính với đầy đủ tiện nghi hiện đại</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Cơ Sở 2
                        </h5>
                        <p class="mb-2"><strong>Địa chỉ:</strong> Tầng 2, sảnh thương mại tòa HH1 Chung cư Meco Complex ngõ 102 Trường Chinh, Đống Đa Hà Nội</p>
                        <p class="mb-2"><strong>Điện thoại:</strong> 0975.186.230</p>
                        <p class="text-muted">Cơ sở hiện đại trong khu đô thị</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Cơ Sở 3 (Hà Đông)
                        </h5>
                        <p class="mb-2"><strong>Địa chỉ:</strong> Số 3 Văn Quán, Hà Đông, Hà Nội</p>
                        <p class="mb-2"><strong>Điện thoại:</strong> 0975.186.230</p>
                        <p class="text-muted">Phục vụ học viên khu vực Hà Đông</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Cơ Sở 4 (Cầu Giấy)
                        </h5>
                        <p class="mb-2"><strong>Địa chỉ:</strong> 59 Trần Quốc Vượng, Dịch Vọng Hậu, Cầu Giấy, Hà Nội</p>
                        <p class="mb-2"><strong>Điện thoại:</strong> 0975.186.230</p>
                        <p class="text-muted">Thuận tiện cho học viên khu vực Cầu Giấy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Sẵn sàng trở thành một phần của cộng đồng SEC?</h3>
                <p class="mb-0">
                    Hãy đến với SEC để trải nghiệm phương pháp học tiếng Anh đột phá và đạt được thành công ngay hôm nay!
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
