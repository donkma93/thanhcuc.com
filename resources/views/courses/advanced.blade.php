@extends('layouts.app')

@section('title', 'Khóa Học Nâng Cao C1-C2 - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Khóa Học Nâng Cao C1-C2</h1>
                <p class="lead">
                    Thành thạo tiếng Đức như người bản ngữ - Chuẩn bị cho du học và làm việc tại Đức
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
                <h2 class="display-5 fw-bold text-primary mb-4">TIẾNG ĐỨC NÂNG CAO C1-C2</h2>
                <p class="lead mb-4">
                    Khóa học dành cho học viên có trình độ B2, muốn đạt được sự thành thạo cao nhất 
                    trong tiếng Đức để du học, làm việc hoặc định cư tại Đức.
                </p>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-clock text-accent-color me-3"></i>
                            <div>
                                <strong>Thời gian:</strong><br>
                                10-12 tháng
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-users text-accent-color me-3"></i>
                            <div>
                                <strong>Lớp học:</strong><br>
                                6-10 học viên
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-accent-color me-3"></i>
                            <div>
                                <strong>Lịch học:</strong><br>
                                3-4 buổi/tuần
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-certificate text-accent-color me-3"></i>
                            <div>
                                <strong>Chứng chỉ:</strong><br>
                                Goethe C1/C2, TestDaF
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
                <img src="{{ asset('images/courses/german-c1c2-icon.svg') }}" 
                     alt="German C1-C2 Course" class="img-fluid rounded shadow-lg animate-pulse" style="max-width: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Course Content -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">NỘI DUNG KHÓA HỌC</h2>
            <p class="lead text-muted">Chương trình học nâng cao theo khung CEFR</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-accent-color rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-star text-white"></i>
                            </div>
                            <h5 class="fw-bold mb-0">Trình độ C1</h5>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Hiểu văn bản dài và phức tạp</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Diễn đạt ý tưởng một cách tự nhiên</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Sử dụng ngôn ngữ linh hoạt và hiệu quả</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Viết văn bản có cấu trúc rõ ràng</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Thảo luận các chủ đề phức tạp</li>
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
                                <i class="fas fa-crown text-white"></i>
                            </div>
                            <h5 class="fw-bold mb-0">Trình độ C2</h5>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Hiểu mọi thứ nghe và đọc được</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tóm tắt thông tin từ nhiều nguồn</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Diễn đạt tự nhiên, chính xác</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Phân biệt các sắc thái ý nghĩa</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Thành thạo như người bản ngữ</li>
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
            <p class="lead text-muted">Những thành tựu đáng tự hào bạn đạt được</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-university fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Du Học Đức</h5>
                    <p class="text-muted">Đủ trình độ để học tại các trường đại học hàng đầu Đức</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-briefcase fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Làm Việc Tại Đức</h5>
                    <p class="text-muted">Giao tiếp chuyên nghiệp trong môi trường làm việc quốc tế</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-home fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Định Cư Đức</h5>
                    <p class="text-muted">Hòa nhập hoàn toàn vào xã hội và văn hóa Đức</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-medal fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Chứng Chỉ Quốc Tế</h5>
                    <p class="text-muted">Đạt được các chứng chỉ uy tín nhất về tiếng Đức</p>
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
            <p class="lead text-muted">Lộ trình học tập chuyên sâu và toàn diện</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-accent-color text-white">
                        <h5 class="mb-0"><i class="fas fa-star me-2"></i>Giai đoạn C1 (5-6 tháng)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Ngữ pháp nâng cao:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Komplexe Satzstrukturen</li>
                                    <li>• Stilistische Varianten</li>
                                    <li>• Textverknüpfung</li>
                                    <li>• Wissenschaftssprache</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Chủ đề chuyên sâu:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Wissenschaft & Forschung</li>
                                    <li>• Philosophie</li>
                                    <li>• Literatur</li>
                                    <li>• Gesellschaftskritik</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-crown me-2"></i>Giai đoạn C2 (5-6 tháng)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Hoàn thiện kỹ năng:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Stilistik</li>
                                    <li>• Rhetorik</li>
                                    <li>• Textanalyse</li>
                                    <li>• Kreatives Schreiben</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Chuyên môn cao:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Fachsprachen</li>
                                    <li>• Kulturwissenschaft</li>
                                    <li>• Diskursanalyse</li>
                                    <li>• Interkulturelle Kompetenz</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Special Features -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">ĐẶC BIỆT CHỈ CÓ TẠI THANH CÚC</h2>
            <p class="lead text-muted">Những dịch vụ độc quyền cho học viên C1-C2</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-user-tie text-white"></i>
                        </div>
                        <h5 class="fw-bold">Mentor 1-1</h5>
                        <p class="text-muted">Giảng viên bản ngữ hướng dẫn cá nhân hóa</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-plane text-white"></i>
                        </div>
                        <h5 class="fw-bold">Hỗ Trợ Du Học</h5>
                        <p class="text-muted">Tư vấn miễn phí thủ tục du học và visa</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <h5 class="fw-bold">Cộng Đồng Alumni</h5>
                        <p class="text-muted">Kết nối với cựu học viên đang sống tại Đức</p>
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
            <p class="lead text-muted">Đầu tư cho tương lai vượng thịnh tại Đức</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-header bg-accent-color text-white text-center py-4">
                        <h4 class="fw-bold mb-0">Trình độ C1</h4>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold text-primary mb-3">12.500.000₫</div>
                        <p class="text-muted mb-4">5-6 tháng học</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>180 giờ học</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giảng viên bản ngữ</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mentor 1-1</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Luyện thi Goethe C1</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tư vấn du học</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-warning btn-lg w-100">Đăng Ký Ngay</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 border-primary">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4 class="fw-bold mb-0">Trình độ C2</h4>
                        <small class="badge bg-white text-primary">Cao cấp nhất</small>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold text-primary mb-3">15.000.000₫</div>
                        <p class="text-muted mb-4">5-6 tháng học</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>200 giờ học</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giảng viên bản ngữ</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mentor 1-1</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Luyện thi Goethe C2</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Hỗ trợ du học VIP</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Cộng đồng Alumni</li>
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
                <h3 class="fw-bold mb-3">Sẵn sàng chinh phục đỉnh cao tiếng Đức?</h3>
                <p class="mb-0">Gia nhập cộng đồng những người thành thạo tiếng Đức như bản ngữ!</p>
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
