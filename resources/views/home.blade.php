@extends('layouts.app')

@section('title', 'Trung Tâm Tiếng Đức Thanh Cúc - Học Tiếng Đức Chuyên Nghiệp')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4 animate-fade-in-up">
                    CHINH PHỤC TIẾNG ĐỨC CÙNG THANH CÚC
                </h1>
                <p class="lead mb-4 animate-fade-in-up animate-delay-1">
                    Ra đời từ năm 2020, Trung tâm Tiếng Đức Thanh Cúc đã trở thành điểm đến tin cậy của hàng ngàn học viên. 
                    Với đội ngũ giảng viên bản ngữ và phương pháp giảng dạy hiện đại, chúng tôi giúp bạn thành thạo tiếng Đức từ A1 đến C2.
                </p>
                <div class="d-flex flex-wrap gap-3 animate-fade-in-up animate-delay-2">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg btn-liquid">
                        <i class="fas fa-play me-2"></i>Học Thử Miễn Phí
                    </a>
                    <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>0975.186.230
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/hero/german-learning.svg') }}" 
                     alt="Thanh Cúc German Center" class="img-fluid rounded shadow-lg animate-float">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll">
                    <h3 class="display-4 fw-bold text-primary counter" data-target="2000">0</h3>
                    <p class="text-muted">Học Viên Đã Tốt Nghiệp</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll animate-delay-1">
                    <h3 class="display-4 fw-bold text-secondary counter" data-target="25">0</h3>
                    <p class="text-muted">Giảng Viên Bản Ngữ</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll animate-delay-2">
                    <h3 class="display-4 fw-bold text-accent-color counter" data-target="95">0</h3>
                    <p class="text-muted">% Học Viên Đạt Chứng Chỉ</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="animate-on-scroll animate-delay-3">
                    <h3 class="display-4 fw-bold text-success counter" data-target="4">0</h3>
                    <p class="text-muted">Năm Kinh Nghiệm</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">TẠI SAO CHỌN THANH CÚC?</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những ưu điểm vượt trội giúp bạn học tiếng Đức hiệu quả</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Giảng Viên Bản Ngữ</h5>
                        <p class="text-muted">Đội ngũ giảng viên người Đức với kinh nghiệm giảng dạy chuyên nghiệp</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-1">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-certificate fa-3x text-secondary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Chứng Chỉ Quốc Tế</h5>
                        <p class="text-muted">Luyện thi các chứng chỉ Goethe, TestDaF, DSH với tỷ lệ đậu cao</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-2">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-laptop fa-3x text-accent-color"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Học Online & Offline</h5>
                        <p class="text-muted">Linh hoạt hình thức học tập phù hợp với lịch trình của bạn</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-3">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-clock fa-3x text-success"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Lịch Học Linh Hoạt</h5>
                        <p class="text-muted">Nhiều khung giờ học từ sáng đến tối, phù hợp với mọi đối tượng</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-4">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-handshake fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Hỗ Trợ Du Học</h5>
                        <p class="text-muted">Tư vấn và hỗ trợ thủ tục du học Đức miễn phí cho học viên</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center magnetic animate-on-scroll animate-delay-5">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-star fa-3x text-secondary"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Chất Lượng Đảm Bảo</h5>
                        <p class="text-muted">Cam kết chất lượng với chính sách hoàn tiền nếu không hài lòng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Courses Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">KHÓA HỌC TIẾNG ĐỨC</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Lộ trình học tập toàn diện từ cơ bản đến nâng cao theo khung CEFR</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/courses/german-a1a2-icon.svg') }}" 
                                 alt="German A1-A2" class="rounded animate-on-scroll" width="80" height="80">
                        </div>
                        <h5 class="fw-bold mb-3">Cơ Bản A1-A2</h5>
                        <p class="text-muted mb-3">Khóa học dành cho người mới bắt đầu<br>Thời gian: 6-8 tháng</p>
                        <a href="{{ route('courses.foundation') }}" class="btn btn-primary btn-morph">Xem thêm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/courses/german-b1b2-icon.svg') }}" 
                                 alt="German B1-B2" class="rounded animate-on-scroll animate-delay-1" width="80" height="80">
                        </div>
                        <h5 class="fw-bold mb-3">Trung Cấp B1-B2</h5>
                        <p class="text-muted mb-3">Phát triển kỹ năng giao tiếp<br>Thời gian: 8-10 tháng</p>
                        <a href="{{ route('courses.intermediate') }}" class="btn btn-primary btn-morph">Xem thêm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/courses/german-c1c2-icon.svg') }}" 
                                 alt="German C1-C2" class="rounded animate-on-scroll animate-delay-2" width="80" height="80">
                        </div>
                        <h5 class="fw-bold mb-3">Nâng Cao C1-C2</h5>
                        <p class="text-muted mb-3">Thành thạo như người bản ngữ<br>Thời gian: 10-12 tháng</p>
                        <a href="{{ route('courses.advanced') }}" class="btn btn-primary btn-morph">Xem thêm</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card feature-card h-100 text-center card-3d">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/courses/german-business-icon.svg') }}" 
                                 alt="German Business" class="rounded animate-on-scroll animate-delay-3" width="80" height="80">
                        </div>
                        <h5 class="fw-bold mb-3">Tiếng Đức Thương Mại</h5>
                        <p class="text-muted mb-3">Chuyên ngành kinh doanh<br>Thời gian: 4-6 tháng</p>
                        <a href="{{ route('courses.business') }}" class="btn btn-primary btn-morph">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Teachers Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">ĐỘI NGŨ GIẢNG VIÊN</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Giảng viên bản ngữ Đức với kinh nghiệm giảng dạy chuyên nghiệp</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="teacher-card card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/teachers/teacher-1.svg') }}" 
                                 alt="Herr Schmidt" class="rounded-circle" width="80" height="80">
                        </div>
                        <h6 class="fw-bold text-uppercase mb-2">Herr Schmidt</h6>
                        <p class="text-muted small mb-2">Giảng viên bản ngữ</p>
                        <span class="course-badge">Goethe Institut</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="teacher-card card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <img src="{{ asset('images/teachers/teacher-2.svg') }}" 
                                 alt="Frau Müller" class="rounded-circle" width="80" height="80">
                        </div>
                        <h6 class="fw-bold text-uppercase mb-2">Frau Müller</h6>
                        <p class="text-muted small mb-2">Giảng viên bản ngữ</p>
                        <span class="course-badge">TestDaF</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="teacher-card card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                        </div>
                        <h6 class="fw-bold text-uppercase mb-2">Herr Weber</h6>
                        <p class="text-muted small mb-2">Giảng viên bản ngữ</p>
                        <span class="course-badge">DSH</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="teacher-card card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                        </div>
                        <h6 class="fw-bold text-uppercase mb-2">Frau Fischer</h6>
                        <p class="text-muted small mb-2">Giảng viên bản ngữ</p>
                        <span class="course-badge">Business German</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('teachers') }}" class="btn btn-outline-primary btn-lg">
                Xem tất cả giảng viên
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">HỌC VIÊN NÓI GÌ VỀ CHÚNG TÔI</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những chia sẻ chân thực từ học viên</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-primary"></i>
                        </div>
                        <p class="text-muted mb-4">
                            "Tôi đã học tiếng Đức tại Thanh Cúc được 1 năm và đã đạt chứng chỉ B2. 
                            Giảng viên rất tận tâm và phương pháp giảng dạy hiệu quả."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Nguyễn Văn A</h6>
                                <small class="text-muted">Học viên khóa B2</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-1">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-secondary"></i>
                        </div>
                        <p class="text-muted mb-4">
                            "Nhờ có Thanh Cúc mà tôi đã thành công trong kỳ thi Goethe C1 và hiện đang du học tại Đức. 
                            Cảm ơn các thầy cô rất nhiều!"
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Trần Thị B</h6>
                                <small class="text-muted">Du học sinh tại Đức</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm animate-on-scroll animate-delay-2">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-quote-left fa-2x text-accent-color"></i>
                        </div>
                        <p class="text-muted mb-4">
                            "Môi trường học tập tại Thanh Cúc rất chuyên nghiệp. 
                            Tôi đã từ không biết gì về tiếng Đức đến có thể giao tiếp thành thạo."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Lê Văn C</h6>
                                <small class="text-muted">Học viên khóa A2</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3 animate-fade-in-left">Sẵn sàng bắt đầu hành trình học tiếng Đức?</h3>
                <p class="mb-0 animate-fade-in-left animate-delay-1">Đăng ký tư vấn miễn phí ngay hôm nay để nhận lộ trình học phù hợp nhất!</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3 btn-liquid animate-fade-in-right">Học Thử Miễn Phí</a>
                <a href="tel:0975186230" class="btn btn-outline-light btn-lg animate-fade-in-right animate-delay-1">
                    <i class="fas fa-phone me-2"></i>Gọi Ngay
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
