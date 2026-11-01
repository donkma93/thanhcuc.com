@extends('layouts.app')

@section('title', ($settings['nursing_title'] ?? 'Du Học Nghề Điều Dưỡng Đức') . ' - Tiếng Đức Thanh Cúc')
@section('description', Str::limit($settings['nursing_subtitle'] ?? 'Chương trình du học nghề Điều dưỡng tại CHLB Đức', 160))

@section('content')
<!-- Breadcrumb -->
<div class="bg-light py-3 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted"><i class="fas fa-home me-1"></i>Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('du-hoc-duc') }}" class="text-decoration-none text-muted">Du học Đức</a></li>
                <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">{{ $settings['nursing_title'] ?? 'Du học nghề điều dưỡng Đức' }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="page-dieu-duong py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content (Left Column) -->
            <div class="col-lg-8">
                <article class="bg-white p-4 p-md-5 rounded-4 shadow-sm border">
                    <!-- Title & Lead -->
                    <div class="mb-4">
                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3">
                            <i class="fas fa-star me-1"></i> Ngành Học Hot Nhất Hiện Nay
                        </span>
                        <h1 class="h2 fw-bold text-dark lh-base">
                            {{ $settings['nursing_title'] ?? 'Du học nghề điều dưỡng Đức chất lượng cao tại Hà Nội' }}
                        </h1>
                        <div class="d-flex align-items-center text-muted small mt-2 mb-3">
                            <span class="me-3"><i class="far fa-calendar-alt me-1 text-warning"></i> Cập nhật mới nhất</span>
                            <span class="me-3"><i class="fas fa-user-graduate me-1 text-primary"></i> Chương trình Du học nghề CHLB Đức</span>
                        </div>
                        <p class="lead text-secondary fs-6">
                            {!! nl2br(e($settings['nursing_subtitle'] ?? '')) !!}
                        </p>
                    </div>

                    <!-- Main Banner Image -->
                    <div class="mb-5 text-center">
                        <img src="{{ asset($settings['nursing_banner_image'] ?? 'images/du-hoc-duc/dieu_duong_banner.png') }}" 
                             alt="{{ $settings['nursing_title'] ?? 'Du học nghề điều dưỡng Đức' }}" 
                             class="img-fluid rounded-3 shadow-sm w-100">
                    </div>

                    <!-- Section 1: Chuyên ngành & Đào tạo -->
                    <div class="detail-section mb-4 p-4 rounded-3 border-start border-4 border-warning bg-light">
                        <h2 class="h4 fw-bold text-dark d-flex align-items-center mb-3">
                            <span class="section-badge me-2" style="background:#e67e22; color:#fff;">1</span>
                            {{ $settings['nursing_sec1_title'] ?? '1. Chuyên ngành & Đào tạo' }}
                        </h2>
                        <ul class="list-unstyled mb-0 space-y-2">
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-check-circle text-warning mt-1 me-2 flex-shrink-0"></i>
                                <div>
                                    <strong>Chuyên ngành đào tạo:</strong> {{ $settings['nursing_majors'] ?? '' }}
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-check-circle text-warning mt-1 me-2 flex-shrink-0"></i>
                                <div>
                                    <strong>Thời gian đào tạo:</strong> {{ $settings['nursing_duration'] ?? '' }}
                                </div>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="fas fa-check-circle text-warning mt-1 me-2 flex-shrink-0"></i>
                                <div>
                                    <strong>Thời gian làm thêm:</strong> {{ $settings['nursing_overtime'] ?? '' }}
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Section 2: Công việc thực tế -->
                    <div class="detail-section mb-4 p-4 rounded-3 border-start border-4 border-teal bg-light" style="border-left-color: #16a085 !important;">
                        <h2 class="h4 fw-bold text-dark d-flex align-items-center mb-3">
                            <span class="section-badge me-2" style="background:#16a085; color:#fff;">2</span>
                            {{ $settings['nursing_sec2_title'] ?? '2. Công việc thực tế' }}
                        </h2>
                        <ul class="list-unstyled mb-0 space-y-2">
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-notes-medical mt-1 me-2 flex-shrink-0" style="color: #16a085;"></i>
                                <div>
                                    <strong>Chăm sóc &amp; điều trị:</strong> {{ $settings['nursing_work_care'] ?? '' }}
                                </div>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="fas fa-clipboard-list mt-1 me-2 flex-shrink-0" style="color: #16a085;"></i>
                                <div>
                                    <strong>Quản lý &amp; Phối hợp:</strong> {{ $settings['nursing_work_manage'] ?? '' }}
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Section 3: Điều kiện tham gia -->
                    <div class="detail-section mb-4 p-4 rounded-3 border-start border-4 border-warning bg-light">
                        <h2 class="h4 fw-bold text-dark d-flex align-items-center mb-3">
                            <span class="section-badge me-2" style="background:#e67e22; color:#fff;">3</span>
                            {{ $settings['nursing_sec3_title'] ?? '3. Điều kiện tham gia' }}
                        </h2>
                        <ul class="list-unstyled mb-0 space-y-2">
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-user-check text-warning mt-1 me-2 flex-shrink-0"></i>
                                <div>
                                    <strong>Độ tuổi &amp; Trình độ:</strong> {{ $settings['nursing_cond_age'] ?? '' }}
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-language text-warning mt-1 me-2 flex-shrink-0"></i>
                                <div>
                                    <strong>Trình độ ngoại ngữ:</strong> {{ $settings['nursing_cond_lang'] ?? '' }}
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-2">
                                <i class="fas fa-heartbeat text-warning mt-1 me-2 flex-shrink-0"></i>
                                <div>
                                    <strong>Yêu cầu sức khỏe:</strong> {{ $settings['nursing_cond_health'] ?? '' }}
                                </div>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="fas fa-file-contract text-warning mt-1 me-2 flex-shrink-0"></i>
                                <div>
                                    <strong>Hợp đồng đào tạo:</strong> {{ $settings['nursing_cond_contract'] ?? '' }}
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Section 4: Quyền lợi & Thu nhập -->
                    <div class="detail-section mb-4 p-4 rounded-3 border-start border-4 border-success bg-light" style="border-left-color: #27ae60 !important;">
                        <h2 class="h4 fw-bold text-dark d-flex align-items-center mb-3">
                            <span class="section-badge me-2" style="background:#27ae60; color:#fff;">4</span>
                            {{ $settings['nursing_sec4_title'] ?? '4. Quyền lợi & Thu nhập' }}
                        </h2>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <div class="p-3 bg-white rounded-3 shadow-xs border text-center">
                                    <div class="small text-muted mb-1">Học phí chuyên ngành</div>
                                    <div class="fw-bold text-success fs-5">{{ $settings['nursing_tuition'] ?? 'MIỄN 100%' }}</div>
                                    <div class="text-muted small">Trong suốt 3 năm học</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 bg-white rounded-3 shadow-xs border text-center">
                                    <div class="small text-muted mb-1">Trợ cấp học nghề</div>
                                    <div class="fw-bold text-primary fs-5">{{ $settings['nursing_allowance'] ?? '1.100 – 1.400 €/tháng' }}</div>
                                    <div class="text-muted small">Tăng dần theo từng năm</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 bg-white rounded-3 shadow-xs border text-center">
                                    <div class="small text-muted mb-1">Lương sau tốt nghiệp</div>
                                    <div class="fw-bold text-danger fs-5">{{ $settings['nursing_salary'] ?? '2.700 – 3.500 €/tháng' }}</div>
                                    <div class="text-muted small">{{ $settings['nursing_salary_vnd'] ?? '~ 62 – 78 triệu VNĐ/tháng' }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 bg-white rounded-3 shadow-xs border text-center">
                                    <div class="small text-muted mb-1">Chính sách định cư</div>
                                    <div class="fw-bold text-warning fs-5">{{ $settings['nursing_settlement'] ?? 'ĐỊNH CƯ VĨNH VIỄN' }}</div>
                                    <div class="text-muted small">{{ $settings['nursing_settlement_note'] ?? 'Sau 5 năm học tập & làm việc' }}</div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-start">
                                <i class="fas fa-gift text-success mt-1 me-2 flex-shrink-0"></i>
                                <div>
                                    <strong>Chế độ đãi ngộ:</strong> {{ $settings['nursing_benefits_other'] ?? '' }}
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Section 5: Đánh giá ưu & nhược điểm -->
                    <div class="detail-section mb-5 p-4 rounded-3 border-start border-4 border-info bg-light" style="border-left-color: #2980b9 !important;">
                        <h2 class="h4 fw-bold text-dark d-flex align-items-center mb-3">
                            <span class="section-badge me-2" style="background:#2980b9; color:#fff;">5</span>
                            {{ $settings['nursing_sec5_title'] ?? '5. Đánh giá ưu & nhược điểm' }}
                        </h2>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 bg-white rounded-3 border h-100">
                                    <h5 class="fw-bold text-success mb-2"><i class="fas fa-thumbs-up me-2"></i>Thuận lợi</h5>
                                    <ul class="small ps-3 mb-0 text-muted space-y-1">
                                        @foreach($settings['nursing_advantages'] as $adv)
                                            <li>{{ $adv }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white rounded-3 border h-100">
                                    <h5 class="fw-bold text-danger mb-2"><i class="fas fa-exclamation-circle me-2"></i>Thử thách</h5>
                                    <ul class="small ps-3 mb-0 text-muted space-y-1">
                                        @foreach($settings['nursing_challenges'] as $chal)
                                            <li>{{ $chal }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inline Quick Action CTA -->
                    <div class="p-4 rounded-4 text-white text-center" style="background: linear-gradient(135deg, #14244c 0%, #1a365d 100%);">
                        <h3 class="h4 fw-bold mb-2 text-white">Bạn Đã Sẵn Sàng Bắt Đầu Lộ Trình Du Học Nghề Điều Dưỡng Đức?</h3>
                        <p class="text-light opacity-90 small mb-3">Đăng ký ngay hôm nay để nhận thông tin học bổng, lộ trình học tiếng Đức từ A1 đến B1 và hướng dẫn xin visa tỷ lệ đậu 100%.</p>
                        <a href="#dang-ky-tu-van" class="btn btn-warning px-4 py-2 fw-bold rounded-pill text-uppercase shadow">
                            <i class="fas fa-paper-plane me-2"></i>Đăng ký nhận tư vấn miễn phí
                        </a>
                    </div>
                </article>
            </div>

            <!-- Right Sidebar / Form -->
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="sticky-top" style="top: 20px; z-index: 10;">
                    <!-- Registration Box -->
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4" id="dang-ky-tu-van">
                        <div class="card-header py-3 text-white text-center" style="background: #14244c;">
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-user-nurse me-2 text-warning"></i>ĐĂNG KÝ TƯ VẤN NGÀNH ĐIỀU DƯỠNG
                            </h5>
                            <small class="text-light opacity-75">Tư vấn 1:1 miễn phí cùng chuyên gia</small>
                        </div>
                        <div class="card-body p-4 bg-white">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show small mb-3" role="alert">
                                    <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('du-hoc-duc.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-dark">Họ và tên *</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nguyễn Văn A" required value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-dark">Số điện thoại *</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="0987xxxxxx" required value="{{ old('phone') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-dark">Địa chỉ (Tỉnh/Thành)</label>
                                    <input type="text" name="address" class="form-control" placeholder="Hà Nội,..." value="{{ old('address') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-dark">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-dark">Nội dung cần tư vấn</label>
                                    <textarea name="message" class="form-control" rows="3" placeholder="Em muốn tìm hiểu lộ trình học tiếng Đức và phỏng vấn nghề điều dưỡng...">Du học nghề Điều Dưỡng CHLB Đức</textarea>
                                </div>
                                <button type="submit" class="btn btn-warning w-100 fw-bold py-2 text-uppercase shadow-sm">
                                    <i class="fas fa-paper-plane me-1"></i>Gửi Đăng Ký Ngay
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Fast Contact Info -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-light">
                        <h6 class="fw-bold text-dark mb-3"><i class="fas fa-headset me-2 text-primary"></i>Hỗ Trợ Nhanh 24/7</h6>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-phone-alt me-3 text-warning"></i>
                            <div>
                                <div class="small text-muted">Hotline tư vấn</div>
                                <a href="tel:0975186230" class="fw-bold text-dark text-decoration-none">0975.186.230</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fab fa-facebook-messenger me-3 text-primary"></i>
                            <div>
                                <div class="small text-muted">Zalo tư vấn miễn phí</div>
                                <a href="https://zalo.me/0975186230" target="_blank" class="fw-bold text-primary text-decoration-none">Chat Zalo Ngay</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt me-3 text-danger"></i>
                            <div>
                                <div class="small text-muted">Địa chỉ trung tâm</div>
                                <span class="small text-dark">Số 12 Ngõ 1150 Đường Láng, Đống Đa, Hà Nội</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.section-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    font-size: 14px;
    font-weight: bold;
}
.page-dieu-duong {
    background-color: #f8fafc;
}
.space-y-2 > li + li {
    margin-top: 0.5rem;
}
</style>
@endsection
