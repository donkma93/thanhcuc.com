@extends('layouts.app')

@section('title', 'Luyện Thi Chứng Chỉ Tiếng Đức - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Luyện Thi Chứng Chỉ</h1>
                <p class="lead">
                    Chuẩn bị tốt nhất cho các kỳ thi chứng chỉ tiếng Đức quốc tế
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Exam Types -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">CÁC CHỨNG CHỈ LUYỆN THI</h2>
            <p class="lead text-muted">Đa dạng các chứng chỉ uy tín được công nhận quốc tế</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-certificate fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Goethe Certificate</h5>
                        <p class="text-muted mb-3">Chứng chỉ uy tín nhất của Viện Goethe</p>
                        <ul class="list-unstyled small">
                            <li>• Goethe A1-A2</li>
                            <li>• Goethe B1-B2</li>
                            <li>• Goethe C1-C2</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-university fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-3">TestDaF</h5>
                        <p class="text-muted mb-3">Chứng chỉ du học đại học tại Đức</p>
                        <ul class="list-unstyled small">
                            <li>• Trình độ B2-C1</li>
                            <li>• 4 kỹ năng</li>
                            <li>• Điểm 3-5</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-graduation-cap fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-3">DSH</h5>
                        <p class="text-muted mb-3">Kỳ thi đầu vào đại học Đức</p>
                        <ul class="list-unstyled small">
                            <li>• Trình độ C1</li>
                            <li>• Học thuật</li>
                            <li>• Điểm 57-82</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Features -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">PHƯƠNG PHÁP LUYỆN THI</h2>
            <p class="lead text-muted">Chiến lược hiệu quả để đạt điểm cao</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-bullseye fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Phân Tích Đề Thi</h5>
                    <p class="text-muted">Hiểu rõ cấu trúc và yêu cầu từng phần thi</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-clock fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Quản Lý Thời Gian</h5>
                    <p class="text-muted">Kỹ thuật làm bài nhanh và chính xác</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-chart-line fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Luyện Đề Thực Tế</h5>
                    <p class="text-muted">Thực hành với đề thi thật từ các năm trước</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-user-check fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold">Chấm Điểm Cá Nhân</h5>
                    <p class="text-muted">Đánh giá chi tiết và tư vấn cải thiện</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Goethe Exam Details -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">LUYỆN THI GOETHE</h2>
            <p class="lead text-muted">Chứng chỉ được công nhận rộng rãi nhất thế giới</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-star me-2"></i>Goethe B1-B2</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Cấu trúc thi:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Lesen (Đọc hiểu)</li>
                                    <li>• Hören (Nghe hiểu)</li>
                                    <li>• Schreiben (Viết)</li>
                                    <li>• Sprechen (Nói)</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Thời gian:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Lesen: 65 phút</li>
                                    <li>• Hören: 40 phút</li>
                                    <li>• Schreiben: 60 phút</li>
                                    <li>• Sprechen: 15 phút</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3">
                            <strong class="text-primary">Học phí:</strong> 4.500.000₫ (2 tháng)
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-accent-color text-white">
                        <h5 class="mb-0"><i class="fas fa-crown me-2"></i>Goethe C1-C2</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Cấu trúc thi:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Lesen (Đọc hiểu)</li>
                                    <li>• Hören (Nghe hiểu)</li>
                                    <li>• Schreiben (Viết)</li>
                                    <li>• Sprechen (Nói)</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Thời gian:</h6>
                                <ul class="list-unstyled small">
                                    <li>• Lesen: 70 phút</li>
                                    <li>• Hören: 40 phút</li>
                                    <li>• Schreiben: 80 phút</li>
                                    <li>• Sprechen: 15 phút</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3">
                            <strong class="text-primary">Học phí:</strong> 6.500.000₫ (3 tháng)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TestDaF Details -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">LUYỆN THI TESTDAF</h2>
            <p class="lead text-muted">Chứng chỉ du học đại học tại Đức</p>
        </div>
        
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0"><i class="fas fa-university me-2"></i>TestDaF Preparation</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold text-primary">Yêu cầu:</h6>
                        <ul class="list-unstyled mb-3">
                            <li>• Trình độ tối thiểu B2</li>
                            <li>• Mục tiêu du học Đức</li>
                            <li>• Cam kết học tập nghiêm túc</li>
                        </ul>
                        
                        <h6 class="fw-bold text-primary">Nội dung:</h6>
                        <ul class="list-unstyled mb-3">
                            <li>• Leseverstehen (TDN 3-5)</li>
                            <li>• Hörverstehen (TDN 3-5)</li>
                            <li>• Schriftlicher Ausdruck (TDN 3-5)</li>
                            <li>• Mündlicher Ausdruck (TDN 3-5)</li>
                        </ul>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong class="text-primary">Học phí:</strong> 7.500.000₫<br>
                                <small class="text-muted">3 tháng (90 giờ học)</small>
                            </div>
                            <a href="{{ route('contact') }}" class="btn btn-secondary">Đăng Ký</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <h3 class="fw-bold text-primary mb-4">TẠI SAO CHỌN TESTDAF?</h3>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <strong>Được công nhận:</strong> Tất cả các trường đại học Đức
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <strong>Linh hoạt:</strong> Có thể thi từng kỹ năng riêng biệt
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <strong>Thực tế:</strong> Nội dung gần gũi với môi trường đại học
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <strong>Hiệu quả:</strong> Tỷ lệ đậu cao của học viên Thanh Cúc
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">THÀNH CÔNG CỦA HỌC VIÊN</h2>
            <p class="lead text-muted">Những câu chuyện truyền cảm hứng</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <h6 class="fw-bold">Nguyễn Minh A</h6>
                        <p class="text-muted small mb-3">Goethe C1 - 95 điểm</p>
                        <p class="small">"Nhờ phương pháp luyện thi của Thanh Cúc, tôi đã đạt được điểm số mong muốn và hiện đang học thạc sĩ tại TU München."</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <h6 class="fw-bold">Trần Thị B</h6>
                        <p class="text-muted small mb-3">TestDaF - TDN 4</p>
                        <p class="small">"Các thầy cô đã giúp tôi hiểu rõ cấu trúc đề thi và cách quản lý thời gian hiệu quả. Kết quả vượt ngoài mong đợi!"</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <div class="bg-accent-color rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <h6 class="fw-bold">Lê Văn C</h6>
                        <p class="text-muted small mb-3">DSH - 78 điểm</p>
                        <p class="small">"Chương trình luyện thi DSH rất chuyên sâu. Tôi đã tự tin bước vào kỳ thi và đạt kết quả như mong muốn."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Exam Schedule -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">LỊCH THI 2024</h2>
            <p class="lead text-muted">Kế hoạch thi và đăng ký</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Goethe Certificate</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Trình độ</th>
                                        <th>Ngày thi</th>
                                        <th>Đăng ký</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>B1</td>
                                        <td>15/03, 14/06, 13/09, 14/12</td>
                                        <td>Trước 4 tuần</td>
                                    </tr>
                                    <tr>
                                        <td>B2</td>
                                        <td>22/03, 21/06, 20/09, 21/12</td>
                                        <td>Trước 4 tuần</td>
                                    </tr>
                                    <tr>
                                        <td>C1</td>
                                        <td>29/03, 28/06, 27/09, 28/12</td>
                                        <td>Trước 6 tuần</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">TestDaF & DSH</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Kỳ thi</th>
                                        <th>Ngày thi</th>
                                        <th>Đăng ký</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>TestDaF</td>
                                        <td>09/05, 11/07, 10/10, 12/12</td>
                                        <td>Trước 6 tuần</td>
                                    </tr>
                                    <tr>
                                        <td>DSH</td>
                                        <td>Theo lịch từng trường</td>
                                        <td>Liên hệ trường</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Lịch thi có thể thay đổi. Vui lòng liên hệ để cập nhật thông tin mới nhất.
                            </small>
                        </div>
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
                <h3 class="fw-bold mb-3">Sẵn sàng chinh phục chứng chỉ tiếng Đức?</h3>
                <p class="mb-0">Đăng ký tư vấn miễn phí để chọn chứng chỉ phù hợp với mục tiêu của bạn!</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">Tư Vấn Miễn Phí</a>
                <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Gọi Ngay
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
