@extends('layouts.app')

@section('title', 'Khóa Học TOEIC - Anh Ngữ SEC')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-3">Lộ Trình TOEIC</h1>
                <p class="lead mb-4">
                    Chinh phục TOEIC với phương pháp học độc quyền của SEC. 
                    Từ 500 đến 800+ điểm L&R và 240 đến 320+ điểm S&W
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-play me-2"></i>Học Thử Miễn Phí
                    </a>
                    <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Tư Vấn Ngay
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/courses/toeic-icon.svg') }}" 
                     alt="TOEIC Course" class="img-fluid rounded shadow-lg animate-pulse" style="max-width: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Course Features -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Tại Sao Chọn Khóa TOEIC Tại SEC?</h2>
            <p class="text-muted">Phương pháp học hiệu quả với cam kết chất lượng</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-card card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-target fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Mục Tiêu Rõ Ràng</h5>
                    <p class="text-muted">
                        Lộ trình học rõ ràng từ 500 đến 800+ điểm TOEIC L&R và 240 đến 320+ điểm S&W
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-card card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-brain fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Phương Pháp Độc Quyền</h5>
                    <p class="text-muted">
                        3 công thức đơn giản giúp hiểu sâu bản chất ngôn ngữ, tránh học vẹt
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-card card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-medal fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Cam Kết Kết Quả</h5>
                    <p class="text-muted">
                        Không đạt mục tiêu, học lại MIỄN PHÍ trong vòng 1 năm
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="feature-card card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Giảng Viên Chuyên Nghiệp</h5>
                    <p class="text-muted">
                        Đội ngũ giảng viên TOEIC 950+ với nhiều năm kinh nghiệm
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course List -->
@if($courses->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Các Khóa Học TOEIC</h2>
            <p class="text-muted">Lựa chọn khóa học phù hợp với mục tiêu của bạn</p>
        </div>
        
        <div class="row">
            @foreach($courses as $course)
            <div class="col-lg-6 mb-4">
                <div class="card feature-card h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="course-badge">{{ $course->target_score }}</span>
                            @if($course->level)
                                <span class="badge bg-secondary">{{ $course->level }}</span>
                            @endif
                        </div>
                        
                        <h4 class="fw-bold mb-3">{{ $course->name }}</h4>
                        <p class="text-muted mb-3">{{ $course->short_description }}</p>
                        
                        <div class="row mb-3">
                            @if($course->duration_hours)
                            <div class="col-6">
                                <small class="text-muted d-block">
                                    <i class="fas fa-clock me-1"></i>{{ $course->duration_hours }} giờ học
                                </small>
                            </div>
                            @endif
                            @if($course->price)
                            <div class="col-6">
                                <small class="text-muted d-block">
                                    <i class="fas fa-tag me-1"></i>{{ number_format($course->price) }}đ
                                </small>
                            </div>
                            @endif
                        </div>
                        
                        @if($course->features)
                        <div class="mb-3">
                            <h6 class="fw-bold mb-2">Nội dung khóa học:</h6>
                            <ul class="list-unstyled">
                                @foreach($course->features as $feature)
                                <li class="mb-1">
                                    <i class="fas fa-check text-success me-2"></i>{{ $feature }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div class="d-flex gap-2">
                            <a href="{{ route('contact') }}" class="btn btn-primary flex-fill">Đăng Ký Học</a>
                            <a href="tel:0975186230" class="btn btn-outline-primary">
                                <i class="fas fa-phone"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Learning Path -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Lộ Trình Học TOEIC Tại SEC</h2>
            <p class="text-muted">Từng bước chinh phục mục tiêu TOEIC của bạn</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="text-white fw-bold fs-3">1</span>
                    </div>
                    <h5 class="fw-bold mb-3">Kiểm Tra Đầu Vào</h5>
                    <p class="text-muted">Đánh giá trình độ hiện tại và xác định mục tiêu cụ thể</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="text-white fw-bold fs-3">2</span>
                    </div>
                    <h5 class="fw-bold mb-3">Học Kiến Thức Nền</h5>
                    <p class="text-muted">Nắm vững 3 công thức cốt lõi và kiến thức ngữ pháp cơ bản</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="text-white fw-bold fs-3">3</span>
                    </div>
                    <h5 class="fw-bold mb-3">Luyện Kỹ Năng</h5>
                    <p class="text-muted">Rèn luyện 4 kỹ năng Listening, Reading, Speaking, Writing</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="text-white fw-bold fs-3">4</span>
                    </div>
                    <h5 class="fw-bold mb-3">Thi Thử & Đánh Giá</h5>
                    <p class="text-muted">Mock test định kỳ và điều chỉnh lộ trình học phù hợp</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary mb-3">Thành Công Của Học Viên</h2>
            <p class="text-muted">Những câu chuyện thành công thực tế từ học viên SEC</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <img src="https://via.placeholder.com/80x80/2563eb/ffffff?text=HV1" 
                                 alt="Học viên" class="rounded-circle">
                        </div>
                        <h5 class="fw-bold mb-2">Nguyễn Văn A</h5>
                        <p class="text-muted mb-3">Sinh viên ĐH Kinh tế Quốc dân</p>
                        <div class="mb-3">
                            <span class="badge bg-success fs-6">TOEIC 785</span>
                        </div>
                        <p class="text-muted small">
                            "Sau 3 tháng học tại SEC, mình đã đạt được 785 điểm TOEIC. 
                            Phương pháp học rất dễ hiểu và thực tế."
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <img src="https://via.placeholder.com/80x80/2563eb/ffffff?text=HV2" 
                                 alt="Học viên" class="rounded-circle">
                        </div>
                        <h5 class="fw-bold mb-2">Trần Thị B</h5>
                        <p class="text-muted mb-3">Nhân viên văn phòng</p>
                        <div class="mb-3">
                            <span class="badge bg-success fs-6">TOEIC 820</span>
                        </div>
                        <p class="text-muted small">
                            "Tôi đã học nhiều nơi nhưng chỉ tại SEC mới hiểu được bản chất của tiếng Anh. 
                            Cảm ơn các thầy cô!"
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <img src="https://via.placeholder.com/80x80/2563eb/ffffff?text=HV3" 
                                 alt="Học viên" class="rounded-circle">
                        </div>
                        <h5 class="fw-bold mb-2">Lê Văn C</h5>
                        <p class="text-muted mb-3">Kỹ sư IT</p>
                        <div class="mb-3">
                            <span class="badge bg-success fs-6">TOEIC 750</span>
                        </div>
                        <p class="text-muted small">
                            "Lịch học linh hoạt, phù hợp với người đi làm. 
                            Giảng viên nhiệt tình và phương pháp dạy hiệu quả."
                        </p>
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
                <h3 class="fw-bold mb-3">Sẵn sàng chinh phục TOEIC cùng SEC?</h3>
                <p class="mb-0">
                    Đăng ký tư vấn miễn phí ngay hôm nay để nhận lộ trình học TOEIC phù hợp nhất!
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">Học Thử Miễn Phí</a>
                <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Gọi Ngay
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
