@extends('layouts.app')

@section('title', $settings['meta_title'] ?? 'Du Học Nghề CHLB Đức - Trung Tâm Tiếng Đức Thanh Cúc')
@section('description', $settings['meta_description'] ?? 'Du học nghề CHLB Đức miễn 100% học phí, nhận trợ cấp 950 - 1400€/tháng, cơ hội việc làm và định cư lâu dài tại CHLB Đức.')

@section('content')
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="page page-duhoc">
    <!-- Banner 1 -->
    <section class="duhoc_banner">
        <a href="#form-dang-ky" title="{{ $settings['page_title'] ?? 'Du học Đức' }}">
            <img src="{{ asset($settings['banner_image']) }}" alt="{{ $settings['page_title'] ?? 'Du học Đức' }}" class="img-fluid w-100">
        </a>
    </section>

    <!-- About Section -->
    <section class="duhoc_about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                    <div class="about-image-wrap">
                        <img src="{{ asset($settings['about_image']) }}" alt="{{ $settings['about_title'] ?? 'DU HỌC NGHỀ CHLB ĐỨC' }}" class="img-fluid rounded shadow-sm w-100">
                    </div>
                </div>
                <div class="col-12 col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="about_content">
                        <h2>{{ $settings['about_title'] ?? 'DU HỌC NGHỀ CHLB ĐỨC' }}</h2>
                        <p>
                            {!! nl2br(e($settings['about_content_1'])) !!}
                        </p>
                        @if(!empty($settings['about_content_2']))
                            <p>
                                {!! nl2br(e($settings['about_content_2'])) !!}
                            </p>
                        @endif
                        <a class="dub_btn" href="{{ $settings['about_btn_link'] ?? '#form-dang-ky' }}" title="{{ $settings['about_btn_text'] ?? 'Đăng ký tư vấn ngay' }}">
                            <span>{{ $settings['about_btn_text'] ?? 'Đăng ký tư vấn ngay' }}</span>
                            <img src="{{ asset('images/du-hoc-duc/ar_r.png') }}" alt="Xem thêm" width="14" height="14">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="duhoc_value py-5" data-aos="zoom-in-up" data-aos-duration="1000">
        <div class="container">
            <div class="block-title text-center">
                <h2>{{ $settings['values_title'] ?? 'GIÁ TRỊ CỦA CHƯƠNG TRÌNH DU HỌC NGHỀ TẠI CHLB ĐỨC' }}</h2>
            </div>
            <div class="block-content mt-4">
                <div class="row g-4">
                    @foreach($settings['values_items'] as $val)
                        <div class="col-12 col-lg-6">
                            <div class="item">
                                <img src="{{ asset('images/du-hoc-duc/check.png') }}" alt="check">
                                <span>{{ $val }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Conditions & Registration Section -->
    <section class="duhoc_register py-5" id="form-dang-ky">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2 fs-5 align-middle"></i>
                    <strong>Thành công!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4 shadow-sm" role="alert">
                    <i class="fas fa-exclamation-triangle me-2 fs-5 align-middle"></i>
                    <strong>Vui lòng kiểm tra lại:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row align-items-center">
                <!-- Requirements List -->
                <div class="col-12 col-lg-7 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                    <div class="block-content pe-lg-4">
                        <div class="block-title text-start mb-4">
                            <h2 class="text-start">{{ $settings['conditions_title'] ?? 'ĐIỀU KIỆN KHI ĐI DU HỌC NGHỀ ĐỨC' }}</h2>
                        </div>
                        <div class="block-list">
                            <ul>
                                @foreach($settings['conditions_items'] as $cond)
                                    <li>{{ $cond }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="col-12 col-lg-5" data-aos="fade-left" data-aos-duration="1000">
                    <div class="duhoc_register_form shadow-lg">
                        <h4 class="text-white text-center mb-3">
                            <i class="fas fa-graduation-cap me-2 text-warning"></i>ĐĂNG KÝ TƯ VẤN MIỄN PHÍ
                        </h4>
                        <p class="text-light opacity-75 text-center small mb-4">Để lại thông tin để chuyên viên du học liên hệ tư vấn chi tiết về lộ trình du học Đức</p>
                        
                        <form method="POST" action="{{ route('du-hoc-duc.submit') }}">
                            @csrf
                            <div class="group_contact">
                                <div class="mb-3">
                                    <input placeholder="Họ và tên *" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" required value="{{ old('name') }}" name="name">
                                </div>
                                <div class="mb-3">
                                    <input type="text" placeholder="Địa chỉ (Tỉnh/Thành phố)" name="address" class="form-control form-control-lg @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                </div>
                                <div class="mb-3">
                                    <input type="tel" placeholder="Số điện thoại *" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" required value="{{ old('phone') }}">
                                </div>
                                <div class="mb-3">
                                    <input placeholder="Email" type="email" name="email" id="email1" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <textarea placeholder="Ngành nghề bạn quan tâm (Điều dưỡng, Nhà hàng - Khách sạn, Cơ khí...) hoặc câu hỏi thắc mắc" name="message" id="comment" class="form-control content-area form-control-lg" rows="4">{{ old('message') }}</textarea>
                                </div>
                                <button type="submit" class="btn-lienhe w-100">
                                    <i class="fas fa-paper-plane me-2"></i>GỬI THÔNG TIN ĐĂNG KÝ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner 2: Roadmap -->
    <section class="duhoc_banner duhoc_roadmap py-5" data-aos="zoom-in-down" data-aos-duration="1000">
        <div class="container">
            <div class="block-title text-center mb-4">
                <h2>{{ $settings['roadmap_title'] ?? 'LỘ TRÌNH DU HỌC NGHỀ ĐỨC' }}</h2>
            </div>
            <div class="block-content text-center">
                <img src="{{ asset($settings['roadmap_image']) }}" alt="{{ $settings['roadmap_title'] ?? 'Lộ trình du học nghề Đức' }}" class="img-fluid rounded shadow-sm w-100">
            </div>
        </div>
    </section>

    <!-- Blog / Knowledge Section -->
    <section class="duhoc_blog py-5">
        <div class="container">
            <div class="block-title text-center" data-aos="fade-up" data-aos-duration="800">
                <h2>{{ $settings['blog_title'] ?? 'KIẾN THỨC DU HỌC' }}</h2>
            </div>
            <div class="block-content mt-4">
                @foreach($settings['blog_articles'] as $art)
                    <div class="duhoc_blog_item shadow-sm mb-4" data-aos="fade-up" data-aos-duration="800">
                        <div class="row duhoc_blog_item_row align-items-center">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <div class="blog-thumb">
                                    <img src="{{ asset($art['image']) }}" alt="{{ $art['title'] }}" class="img-fluid rounded w-100">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="blog-content">
                                    <h3>
                                        <a href="{{ $art['link'] ?? '#form-dang-ky' }}" title="{{ $art['title'] }}">{{ $art['title'] }}</a>
                                    </h3>
                                    <div class="time-post text-muted mb-2">
                                        <i class="far fa-calendar-alt me-1 text-warning"></i> {{ $art['date'] ?? date('d/m/Y') }}
                                    </div>
                                    <p class="justify text-muted">
                                        {{ $art['summary'] }}
                                    </p>
                                    <div class="duhoc_blog_item-btn mt-3">
                                        <a class="dub_btn dub_blog_btn" href="{{ $art['link'] ?? '#form-dang-ky' }}" title="Tìm hiểu thêm">
                                            <span>Tìm hiểu thêm</span>
                                            <img src="{{ asset('images/du-hoc-duc/ar_r.png') }}" alt="Xem thêm" width="14" height="14">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<style>
/* Du Học Đức - Exact Styling Matching tcedu.vn */
.page-duhoc {
    font-family: inherit;
    color: #14244c;
    background: #ffffff;
}

.page-duhoc .duhoc_banner {
    margin-bottom: 40px;
    text-align: center;
}

.page-duhoc .duhoc_banner img {
    width: 100%;
    height: auto;
    display: block;
}

.page-duhoc .duhoc_about {
    margin-bottom: 50px;
}

.page-duhoc .duhoc_about .about_content {
    padding: 15px;
}

.page-duhoc .duhoc_about .about_content h2 {
    font-size: 28px;
    font-weight: 700;
    color: #14244c;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.page-duhoc .duhoc_about .about_content p {
    font-size: 16px;
    line-height: 1.8;
    color: #333333;
    margin-bottom: 18px;
    text-align: justify;
}

.block-title {
    margin-bottom: 35px;
    position: relative;
}

.block-title h2 {
    text-transform: uppercase;
    font-size: 26px;
    text-align: center;
    color: #14244c;
    font-weight: 700;
    position: relative;
    padding-bottom: 15px;
    margin-bottom: 0;
}

.block-title h2::after {
    content: '';
    width: 160px;
    height: 3px;
    display: block;
    background: #f57e24;
    margin: 12px auto 0;
    border-radius: 3px;
}

.page-duhoc .duhoc_register .block-title h2::after {
    margin-left: 0;
}

.dub_btn {
    background: #14244c;
    border: 1px solid #14244c;
    padding: 10px 24px;
    border-radius: 50px;
    color: #fff !important;
    font-size: 15px;
    font-weight: 600;
    margin: 15px 0;
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.3s ease;
    text-decoration: none !important;
    width: fit-content;
}

.dub_btn img {
    margin-left: 12px;
    transition: transform 0.3s ease;
}

.dub_btn:hover {
    background: #f57e24;
    border-color: #f57e24;
    color: #fff !important;
    box-shadow: 0 4px 15px rgba(245, 126, 36, 0.35);
}

.dub_btn:hover img {
    transform: translateX(4px);
}

.page-duhoc .duhoc_value {
    background: #f7f9fc;
    border-radius: 16px;
    margin-bottom: 50px;
}

.page-duhoc .duhoc_value .item {
    margin-bottom: 20px;
    background: #ffffff;
    border-radius: 10px;
    padding: 18px 22px;
    display: flex;
    align-items: center;
    box-shadow: 0 4px 12px rgba(20, 36, 76, 0.05);
    border-left: 4px solid #14244c;
    transition: all 0.3s ease;
}

.page-duhoc .duhoc_value .item:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(20, 36, 76, 0.12);
    border-left-color: #f57e24;
}

.page-duhoc .duhoc_value .item img {
    height: 18px;
    width: 18px;
    margin-right: 14px;
    flex-shrink: 0;
}

.page-duhoc .duhoc_value .item span {
    color: #14244c;
    font-size: 16px;
    font-weight: 600;
    line-height: 1.5;
}

.page-duhoc .duhoc_register {
    margin-bottom: 50px;
}

.page-duhoc .duhoc_register .block-content .block-list {
    padding: 10px 0;
}

.page-duhoc .duhoc_register .block-content .block-list ul {
    padding: 0;
    margin: 0;
    list-style: none;
    counter-reset: my-awesome-counter;
}

.page-duhoc .duhoc_register .block-content .block-list ul li {
    counter-increment: my-awesome-counter;
    font-size: 16px;
    font-weight: 600;
    color: #14244c;
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    line-height: 1.5;
}

.page-duhoc .duhoc_register .block-content .block-list ul li::before {
    content: counter(my-awesome-counter) "";
    color: #ffffff;
    background-color: #14244c;
    font-weight: 700;
    width: 38px;
    height: 38px;
    line-height: 38px;
    display: inline-block;
    border-radius: 50%;
    text-align: center;
    margin-right: 16px;
    flex-shrink: 0;
    box-shadow: 0 3px 8px rgba(20, 36, 76, 0.2);
}

.page-duhoc .duhoc_register .duhoc_register_form {
    border-radius: 16px;
    padding: 35px 30px;
    background: #14244c;
    box-shadow: 0 12px 30px rgba(20, 36, 76, 0.2);
}

.page-duhoc .duhoc_register .duhoc_register_form h4 {
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.page-duhoc .duhoc_register .duhoc_register_form .group_contact input,
.page-duhoc .duhoc_register .duhoc_register_form .group_contact textarea {
    border: 1px solid rgba(255, 255, 255, 0.15);
    width: 100%;
    outline: none;
    font-size: 14px;
    border-radius: 8px;
    padding: 12px 18px;
    background: #ffffff;
    color: #212529;
    transition: all 0.3s;
}

.page-duhoc .duhoc_register .duhoc_register_form .group_contact input:focus,
.page-duhoc .duhoc_register .duhoc_register_form .group_contact textarea:focus {
    border-color: #f57e24;
    box-shadow: 0 0 0 3px rgba(245, 126, 36, 0.25);
}

.page-duhoc .duhoc_register .duhoc_register_form .group_contact .btn-lienhe {
    background: #f57e24;
    border: none;
    color: #ffffff;
    padding: 14px 20px;
    line-height: 1.2;
    font-size: 15px;
    border-radius: 8px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 15px rgba(245, 126, 36, 0.35);
}

.page-duhoc .duhoc_register .duhoc_register_form .group_contact .btn-lienhe:hover {
    background: #e06c17;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(245, 126, 36, 0.5);
}

.page-duhoc .duhoc_roadmap {
    background: #fafbfc;
    border-radius: 16px;
    margin-bottom: 50px;
}

.page-duhoc .duhoc_blog {
    margin-bottom: 50px;
}

.page-duhoc .duhoc_blog .duhoc_blog_item {
    background: #ffffff;
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 30px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
}

.page-duhoc .duhoc_blog .duhoc_blog_item:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(20, 36, 76, 0.12);
}

.page-duhoc .duhoc_blog .duhoc_blog_item .blog-thumb img {
    border-radius: 10px;
    width: 100%;
    height: 280px;
    object-fit: cover;
}

.page-duhoc .duhoc_blog .duhoc_blog_item .blog-content {
    padding: 10px 15px;
}

.page-duhoc .duhoc_blog .duhoc_blog_item .blog-content h3 {
    font-size: 20px;
    color: #14244c;
    font-weight: 700;
    margin-bottom: 10px;
    line-height: 1.4;
}

.page-duhoc .duhoc_blog .duhoc_blog_item .blog-content h3 a {
    color: #14244c;
    text-decoration: none;
    transition: color 0.3s;
}

.page-duhoc .duhoc_blog .duhoc_blog_item .blog-content h3 a:hover {
    color: #f57e24;
}

.page-duhoc .duhoc_blog .duhoc_blog_item .blog-content .time-post {
    font-size: 14px;
    color: #6c757d;
    margin-bottom: 14px;
}

.page-duhoc .duhoc_blog .duhoc_blog_item .blog-content p {
    font-size: 15px;
    color: #495057;
    line-height: 1.7;
    margin-bottom: 15px;
    text-align: justify;
}

.page-duhoc .duhoc_blog .duhoc_blog_item .duhoc_blog_item-btn {
    margin-top: 10px;
}

.dub_blog_btn {
    display: inline-flex;
    margin: 0;
}

@media (min-width: 992px) {
    .page-duhoc .duhoc_blog .duhoc_blog_item:nth-child(even) .duhoc_blog_item_row {
        flex-direction: row-reverse;
    }
}

@media (max-width: 991px) {
    .block-title h2 {
        font-size: 22px;
    }
    .page-duhoc .duhoc_about .about_content h2 {
        font-size: 22px;
    }
    .page-duhoc .duhoc_blog .duhoc_blog_item .blog-thumb img {
        height: 220px;
    }
}
</style>

<!-- Initialize AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                offset: 120,
                duration: 900,
                easing: 'ease-in-out',
                once: true
            });
        }
    });
</script>
@endsection
