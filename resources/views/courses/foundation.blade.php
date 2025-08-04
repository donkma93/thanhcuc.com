@extends('layouts.app')

@section('title', 'Khóa Học Cơ Bản A1-A2 - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Khóa Học Cơ Bản A1-A2</h1>
                <p class="lead">
                    Bước đầu tiên trong hành trình chinh phục tiếng Đức
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Course Overview -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold text-primary mb-4">TIẾNG ĐỨC CƠ BẢN A1-A2</h2>
                <p class="lead mb-4">
                    Khóa học dành cho người mới bắt đầu học tiếng Đức, từ con số 0 đến có thể 
                    giao tiếp cơ bản trong cuộc sống hàng ngày.
                </p>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-clock text-success me-3"></i>
                            <div>
                                <strong>Thời gian:</strong><br>
                                6-8 tháng
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-users text-success me-3"></i>
                            <div>
                                <strong>Lớp học:</strong><br>
                                10-15 học viên
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-success me-3"></i>
                            <div>
                                <strong>Lịch học:</strong><br>
                                3 buổi/tuần
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-certificate text-success me-3"></i>
                            <div>
                                <strong>Chứng chỉ:</strong><br>
                                Goethe A1/A2
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Học Thử Miễn Phí</a>
                    <a href="tel:0975186230" class="btn btn-outline-primary btn-lg">0975.186.230</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/courses/german-a1a2-icon.svg') }}" 
                     alt="German A1-A2 Course" class="img-fluid rounded shadow-lg animate-pulse" style="max-width: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Course Content -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">NỘI DUNG KHÓA HỌC</h2>
            <p class="lead text-muted">Chương trình học từ cơ bản đến thành thạo theo khung CEFR</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-seedling text-white"></i>
                            </div>
                            <h5 class="fw-bold mb-0">Trình độ A1</h5>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Bảng chữ cái và phát âm</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giới thiệu bản thân</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Số đếm, thời gian, ngày tháng</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Gia đình, bạn bè</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mua sắm, ăn uống</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-tree text-white"></i>
                            </div>
                            <h5 class="fw-bold mb-0">Trình độ A2</h5>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mô tả quá khứ và tương lai</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Thói quen hàng ngày</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Du lịch và giao thông</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Sức khỏe và thể thao</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Công việc và học tập</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Learning Outcomes -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">SAU KHÓA HỌC BẠN SẼ</h2>
            <p class="lead text-muted">Những kỹ năng cơ bản bạn sẽ đạt được</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-comments fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Giao Tiếp Cơ Bản</h5>
                    <p class="text-muted">Trò chuyện về các chủ đề quen thuộc trong cuộc sống</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-book-reader fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Đọc Hiểu</h5>
                    <p class="text-muted">Hiểu các văn bản đơn giản, thông báo, quảng cáo</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-edit fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Viết Cơ Bản</h5>
                    <p class="text-muted">Viết email đơn giản, điền form, ghi chú ngắn</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-ear-listen fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Nghe Hiểu</h5>
                    <p class="text-muted">Hiểu các cuộc hội thoại chậm và rõ ràng</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">CHƯƠNG TRÌNH HỌC</h2>
            <p class="lead text-muted">Lộ trình học tập chi tiết từng giai đoạn</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-seedling me-2"></i>Giai đoạn A1 (3-4 tháng)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Ngữ pháp cơ bản:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Động từ sein, haben</li>
                                    <li>• Thì hiện tại</li>
                                    <li>• Danh từ và mạo từ</li>
                                    <li>• Tính từ sở hữu</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Chủ đề:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Kennenlernen</li>
                                    <li>• Familie</li>
                                    <li>• Wohnen</li>
                                    <li>• Essen & Trinken</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-tree me-2"></i>Giai đoạn A2 (3-4 tháng)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Ngữ pháp nâng cao:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Thì quá khứ</li>
                                    <li>• Động từ khuyết thiếu</li>
                                    <li>• Câu điều kiện</li>
                                    <li>• Giới từ</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Chủ đề:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Reisen</li>
                                    <li>• Gesundheit</li>
                                    <li>• Beruf</li>
                                    <li>• Freizeit</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">TẠI SAO CHỌN THANH CÚC?</h2>
            <p class="lead text-muted">Những ưu điểm vượt trội cho người mới bắt đầu</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                        <h5 class="fw-bold">Thân Thiện</h5>
                        <p class="text-muted">Môi trường học tập ấm áp, giảng viên tận tâm</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-step-forward text-white"></i>
                        </div>
                        <h5 class="fw-bold">Từng Bước</h5>
                        <p class="text-muted">Học từ cơ bản nhất, không bỏ sót kiến thức nào</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-gamepad text-white"></i>
                        </div>
                        <h5 class="fw-bold">Thú Vị</h5>
                        <p class="text-muted">Phương pháp học qua game, hoạt động tương tác</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">HỌC PHÍ</h2>
            <p class="lead text-muted">Giá cả hợp lý cho chất lượng tốt nhất</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-header bg-success text-white text-center py-4">
                        <h4 class="fw-bold mb-0">Trình độ A1</h4>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold text-primary mb-3">6.500.000₫</div>
                        <p class="text-muted mb-4">3-4 tháng học</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>90 giờ học</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giảng viên bản ngữ</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tài liệu miễn phí</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Luyện thi Goethe A1</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-success btn-lg w-100">Đăng Ký Ngay</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 border-primary">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4 class="fw-bold mb-0">Trình độ A2</h4>
                        <small class="badge bg-white text-primary">Phổ biến</small>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold text-primary mb-3">7.500.000₫</div>
                        <p class="text-muted mb-4">3-4 tháng học</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>100 giờ học</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giảng viên bản ngữ</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tài liệu miễn phí</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Luyện thi Goethe A2</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Hoạt động ngoại khóa</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg w-100">Đăng Ký Ngay</a>
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
                <h3 class="fw-bold mb-3">Bắt đầu hành trình học tiếng Đức ngay hôm nay!</h3>
                <p class="mb-0">Đăng ký học thử miễn phí để trải nghiệm phương pháp giảng dạy độc đáo của chúng tôi!</p>
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
