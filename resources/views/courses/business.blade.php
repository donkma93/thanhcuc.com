@extends('layouts.app')

@section('title', 'Khóa Học Tiếng Đức Thương Mại - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Tiếng Đức Thương Mại</h1>
                <p class="lead">
                    Chuyên ngành kinh doanh - Thành công trong môi trường doanh nghiệp quốc tế
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
                <h2 class="display-5 fw-bold text-primary mb-4">TIẾNG ĐỨC THƯƠNG MẠI</h2>
                <p class="lead mb-4">
                    Khóa học chuyên biệt dành cho các chuyên gia, doanh nhân và những ai muốn 
                    phát triển sự nghiệp trong môi trường doanh nghiệp Đức.
                </p>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-clock text-primary me-3"></i>
                            <div>
                                <strong>Thời gian:</strong><br>
                                4-6 tháng
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-users text-primary me-3"></i>
                            <div>
                                <strong>Lớp học:</strong><br>
                                6-8 học viên
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-primary me-3"></i>
                            <div>
                                <strong>Lịch học:</strong><br>
                                2-3 buổi/tuần
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-certificate text-primary me-3"></i>
                            <div>
                                <strong>Yêu cầu:</strong><br>
                                Trình độ B1 trở lên
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
                <img src="{{ asset('images/courses/german-business-icon.svg') }}" 
                     alt="German Business Course" class="img-fluid rounded shadow-lg animate-pulse" style="max-width: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Course Content -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">NỘI DUNG KHÓA HỌC</h2>
            <p class="lead text-muted">Chương trình học chuyên biệt cho môi trường doanh nghiệp</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-handshake text-white"></i>
                            </div>
                            <h5 class="fw-bold mb-0">Giao Tiếp Kinh Doanh</h5>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Đàm phán hợp đồng</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Thuyết trình sản phẩm</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Họp hội đồng quản trị</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Networking chuyên nghiệp</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-file-contract text-white"></i>
                            </div>
                            <h5 class="fw-bold mb-0">Văn Bản Thương Mại</h5>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Email chuyên nghiệp</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Báo cáo tài chính</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Hợp đồng kinh doanh</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Kế hoạch marketing</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-accent-color rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                            <h5 class="fw-bold mb-0">Thuật Ngữ Chuyên Ngành</h5>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tài chính - Ngân hàng</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Marketing - Bán hàng</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Quản lý - Nhân sự</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Logistics - Xuất nhập khẩu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Target Audience -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">DÀNH CHO AI?</h2>
            <p class="lead text-muted">Khóa học phù hợp với nhiều đối tượng khác nhau</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-user-tie fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Doanh Nhân</h5>
                    <p class="text-muted">Mở rộng kinh doanh sang thị trường Đức</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-briefcase fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Chuyên Gia</h5>
                    <p class="text-muted">Làm việc tại các công ty Đức hoặc đa quốc gia</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-graduation-cap fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Sinh Viên</h5>
                    <p class="text-muted">Chuẩn bị cho thực tập và làm việc tại Đức</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-globe fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Nhân Viên</h5>
                    <p class="text-muted">Thăng tiến trong môi trường quốc tế</p>
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
            <p class="lead text-muted">Lộ trình học tập thực tế và ứng dụng cao</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-building me-2"></i>Module 1: Cơ Bản Kinh Doanh (2 tháng)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Giao tiếp:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Giới thiệu công ty</li>
                                    <li>• Điện thoại kinh doanh</li>
                                    <li>• Lịch hẹn và cuộc họp</li>
                                    <li>• Small talk chuyên nghiệp</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Văn bản:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Email cơ bản</li>
                                    <li>• Fax và thư từ</li>
                                    <li>• Đơn đặt hàng</li>
                                    <li>• Xác nhận giao dịch</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Module 2: Nâng Cao (2-4 tháng)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Chuyên sâu:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Đàm phán hợp đồng</li>
                                    <li>• Thuyết trình bán hàng</li>
                                    <li>• Quản lý dự án</li>
                                    <li>• Giải quyết khiếu nại</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Chuyên ngành:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Tài chính - Kế toán</li>
                                    <li>• Marketing - PR</li>
                                    <li>• Nhân sự - Tuyển dụng</li>
                                    <li>• IT - Technology</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">LỢI ÍCH VƯỢT TRỘI</h2>
            <p class="lead text-muted">Những giá trị đặc biệt chỉ có tại Thanh Cúc</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-industry text-white"></i>
                        </div>
                        <h5 class="fw-bold">Thực Tế Doanh Nghiệp</h5>
                        <p class="text-muted">Case study từ các công ty Đức thực tế</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-users-cog text-white"></i>
                        </div>
                        <h5 class="fw-bold">Networking</h5>
                        <p class="text-muted">Kết nối với cộng đồng doanh nghiệp Đức-Việt</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-certificate text-white"></i>
                        </div>
                        <h5 class="fw-bold">Chứng Nhận</h5>
                        <p class="text-muted">Certificate được công nhận bởi DIHK Đức</p>
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
            <p class="lead text-muted">Đầu tư thông minh cho sự nghiệp</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4 class="fw-bold mb-0">Cơ Bản</h4>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold text-primary mb-3">6.500.000₫</div>
                        <p class="text-muted mb-4">2 tháng học</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>60 giờ học</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giảng viên bản ngữ</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tài liệu chuyên ngành</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Case study thực tế</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg w-100">Đăng Ký Ngay</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow-lg h-100 border-warning">
                    <div class="card-header bg-accent-color text-white text-center py-4">
                        <h4 class="fw-bold mb-0">Chuyên Sâu</h4>
                        <small class="badge bg-white text-warning">Được chọn nhiều nhất</small>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="display-4 fw-bold text-primary mb-3">12.000.000₫</div>
                        <p class="text-muted mb-4">4-6 tháng học</p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>120 giờ học</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Giảng viên bản ngữ</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Tài liệu chuyên ngành</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Case study thực tế</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Networking events</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Certificate DIHK</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-warning btn-lg w-100">Đăng Ký Ngay</a>
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
                <h3 class="fw-bold mb-3">Sẵn sàng thành công trong kinh doanh quốc tế?</h3>
                <p class="mb-0">Đăng ký ngay để nhận tư vấn miễn phí về lộ trình phù hợp với mục tiêu của bạn!</p>
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
