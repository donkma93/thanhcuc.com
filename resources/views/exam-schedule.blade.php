@extends('layouts.app')

@section('title', 'Lịch Thi Chứng Chỉ Tiếng Đức - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Lịch Thi Chứng Chỉ</h1>
                <p class="lead">
                    Lịch thi các chứng chỉ tiếng Đức quốc tế năm 2024
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Exam Schedule -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">LỊCH THI 2024</h2>
            <p class="lead text-muted">Kế hoạch thi và đăng ký các chứng chỉ tiếng Đức</p>
        </div>
        
        <!-- Goethe Certificate -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-certificate me-3"></i>
                            Goethe Certificate
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="py-3">Trình Độ</th>
                                        <th class="py-3">Ngày Thi</th>
                                        <th class="py-3">Hạn Đăng Ký</th>
                                        <th class="py-3">Lệ Phí</th>
                                        <th class="py-3">Địa Điểm</th>
                                        <th class="py-3">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-success fs-6">Goethe A1</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>15/03/2024</strong><br>
                                            <small class="text-muted">Thứ 6, 9:00 AM</small>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-danger">15/02/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>2.500.000₫</strong>
                                        </td>
                                        <td class="py-3">
                                            Viện Goethe Hà Nội
                                        </td>
                                        <td class="py-3">
                                            <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-sm">Đăng Ký</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-primary fs-6">Goethe A2</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>22/03/2024</strong><br>
                                            <small class="text-muted">Thứ 6, 9:00 AM</small>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-danger">22/02/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>2.800.000₫</strong>
                                        </td>
                                        <td class="py-3">
                                            Viện Goethe Hà Nội
                                        </td>
                                        <td class="py-3">
                                            <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-sm">Đăng Ký</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-secondary fs-6">Goethe B1</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>14/06/2024</strong><br>
                                            <small class="text-muted">Thứ 6, 9:00 AM</small>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-warning">14/05/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>3.200.000₫</strong>
                                        </td>
                                        <td class="py-3">
                                            Viện Goethe Hà Nội
                                        </td>
                                        <td class="py-3">
                                            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Đăng Ký</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-accent-color fs-6">Goethe B2</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>21/06/2024</strong><br>
                                            <small class="text-muted">Thứ 6, 9:00 AM</small>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-warning">21/05/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>3.800.000₫</strong>
                                        </td>
                                        <td class="py-3">
                                            Viện Goethe Hà Nội
                                        </td>
                                        <td class="py-3">
                                            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Đăng Ký</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-dark fs-6">Goethe C1</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>27/09/2024</strong><br>
                                            <small class="text-muted">Thứ 6, 9:00 AM</small>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-success">15/08/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>4.500.000₫</strong>
                                        </td>
                                        <td class="py-3">
                                            Viện Goethe Hà Nội
                                        </td>
                                        <td class="py-3">
                                            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Đăng Ký</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TestDaF -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-secondary text-white py-3">
                        <h4 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-university me-3"></i>
                            TestDaF (Test Deutsch als Fremdsprache)
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="py-3">Kỳ Thi</th>
                                        <th class="py-3">Ngày Thi</th>
                                        <th class="py-3">Hạn Đăng Ký</th>
                                        <th class="py-3">Lệ Phí</th>
                                        <th class="py-3">Địa Điểm</th>
                                        <th class="py-3">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-secondary fs-6">TestDaF 1/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>09/05/2024</strong><br>
                                            <small class="text-muted">Thứ 5, 8:30 AM</small>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-warning">28/03/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>4.200.000₫</strong>
                                        </td>
                                        <td class="py-3">
                                            Đại học Ngoại ngữ HN
                                        </td>
                                        <td class="py-3">
                                            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Đăng Ký</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-secondary fs-6">TestDaF 2/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>11/07/2024</strong><br>
                                            <small class="text-muted">Thứ 5, 8:30 AM</small>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-success">30/05/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>4.200.000₫</strong>
                                        </td>
                                        <td class="py-3">
                                            Đại học Ngoại ngữ HN
                                        </td>
                                        <td class="py-3">
                                            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Đăng Ký</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-secondary fs-6">TestDaF 3/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>10/10/2024</strong><br>
                                            <small class="text-muted">Thứ 5, 8:30 AM</small>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-success">29/08/2024</span>
                                        </td>
                                        <td class="py-3">
                                            <strong>4.200.000₫</strong>
                                        </td>
                                        <td class="py-3">
                                            Đại học Ngoại ngữ HN
                                        </td>
                                        <td class="py-3">
                                            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">Đăng Ký</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Important Notes -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm bg-light">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary mb-3">
                            <i class="fas fa-info-circle me-2"></i>Lưu Ý Quan Trọng
                        </h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Đăng ký sớm:</strong> Số lượng chỗ thi có hạn, nên đăng ký càng sớm càng tốt
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Chuẩn bị tài liệu:</strong> CMND/CCCD, ảnh 3x4, bằng cấp liên quan
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Lệ phí:</strong> Có thể thay đổi theo quy định của từng tổ chức thi
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Kết quả:</strong> Thường có sau 4-6 tuần kể từ ngày thi
                            </li>
                            <li class="mb-0">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Hỗ trợ:</strong> Thanh Cúc hỗ trợ thủ tục đăng ký và luyện thi miễn phí
                            </li>
                        </ul>
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
                <h3 class="fw-bold mb-3">Cần hỗ trợ đăng ký thi chứng chỉ?</h3>
                <p class="mb-0">Liên hệ ngay với chúng tôi để được tư vấn và hỗ trợ thủ tục đăng ký thi!</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">Liên Hệ Ngay</a>
                <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Hotline
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
