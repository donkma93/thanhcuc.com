@extends('layouts.app')

@section('title', 'Liên Hệ - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Liên Hệ</h1>
                <p class="lead">
                    Hãy liên hệ với chúng tôi để được tư vấn miễn phí về các khóa học tiếng Đức
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8 mb-5">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary text-white py-4">
                        <h4 class="mb-0">
                            <i class="fas fa-envelope me-2"></i>Gửi Tin Nhắn
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-bold">Họ và Tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label fw-bold">Số Điện Thoại <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="course" class="form-label fw-bold">Khóa Học Quan Tâm <span class="text-danger">*</span></label>
                                <select class="form-select @error('course') is-invalid @enderror" id="course" name="course" required>
                                    <option value="">-- Chọn khóa học --</option>
                                    <option value="A1-A2" {{ old('course') == 'A1-A2' ? 'selected' : '' }}>Cơ Bản A1-A2</option>
                                    <option value="B1-B2" {{ old('course') == 'B1-B2' ? 'selected' : '' }}>Trung Cấp B1-B2</option>
                                    <option value="C1-C2" {{ old('course') == 'C1-C2' ? 'selected' : '' }}>Nâng Cao C1-C2</option>
                                    <option value="Business" {{ old('course') == 'Business' ? 'selected' : '' }}>Tiếng Đức Thương Mại</option>
                                    <option value="Exam" {{ old('course') == 'Exam' ? 'selected' : '' }}>Luyện Thi Chứng Chỉ</option>
                                    <option value="Other" {{ old('course') == 'Other' ? 'selected' : '' }}>Khác</option>
                                </select>
                                @error('course')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="message" class="form-label fw-bold">Tin Nhắn</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="5" 
                                          placeholder="Chia sẻ với chúng tôi về mục tiêu học tiếng Đức của bạn...">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-paper-plane me-2"></i>Gửi Tin Nhắn
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-4">
                <!-- Contact Details -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-secondary text-white py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-map-marker-alt me-2"></i>Thông Tin Liên Hệ
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px; min-width: 40px;">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Địa Chỉ</h6>
                                    <p class="text-muted mb-0">
                                        123 Đường ABC, Quận XYZ<br>
                                        Thành phố Hà Nội
                                    </p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px; min-width: 40px;">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Điện Thoại</h6>
                                    <p class="text-muted mb-0">
                                        <a href="tel:0975186230" class="text-decoration-none">0975.186.230</a><br>
                                        <a href="tel:0243123456" class="text-decoration-none">024.3123.456</a>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-accent-color rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px; min-width: 40px;">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Email</h6>
                                    <p class="text-muted mb-0">
                                        <a href="mailto:info@thanhcuc.edu.vn" class="text-decoration-none">info@thanhcuc.edu.vn</a><br>
                                        <a href="mailto:tuvantuyensinh@thanhcuc.edu.vn" class="text-decoration-none">tuvantuyensinh@thanhcuc.edu.vn</a>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px; min-width: 40px;">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Giờ Làm Việc</h6>
                                    <p class="text-muted mb-0">
                                        Thứ 2 - Thứ 6: 8:00 - 20:00<br>
                                        Thứ 7 - CN: 8:00 - 17:00
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-dark text-white py-3">
                        <h5 class="mb-0">
                            <i class="fas fa-share-alt me-2"></i>Kết Nối Với Chúng Tôi
                        </h5>
                    </div>
                    <div class="card-body p-4 text-center">
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-outline-primary btn-lg">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-lg">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="btn btn-outline-info btn-lg">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-dark btn-lg">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            Theo dõi chúng tôi để cập nhật thông tin mới nhất về các khóa học và sự kiện!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Vị Trí Trung Tâm</h2>
            <p class="lead text-muted">Tìm đường đến trung tâm Thanh Cúc</p>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Google Maps Embed -->
                        <div class="ratio ratio-21x9">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0967470394973!2d105.84117831533216!3d21.028511986010745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1635123456789!5m2!1svi!2s" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Câu Hỏi Thường Gặp</h2>
            <p class="lead text-muted">Những thắc mắc phổ biến về việc học tiếng Đức</p>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Tôi chưa biết gì về tiếng Đức, có thể học được không?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Hoàn toàn có thể! Chúng tôi có khóa học A1 dành riêng cho người mới bắt đầu. 
                                Giảng viên sẽ hướng dẫn từ bảng chữ cái, phát âm cơ bản đến giao tiếp đơn giản.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Học phí có thể trả góp không?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Có, chúng tôi hỗ trợ trả góp 2-3 đợt trong suốt khóa học. 
                                Bạn có thể liên hệ để được tư vấn chi tiết về các phương thức thanh toán.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Có được học thử trước khi đăng ký không?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Có! Chúng tôi có buổi học thử miễn phí để bạn trải nghiệm phương pháp giảng dạy 
                                và môi trường học tập trước khi quyết định đăng ký.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Sau khi học xong có hỗ trợ tìm việc không?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Chúng tôi có mạng lưới đối tác doanh nghiệp và sẽ giới thiệu cơ hội việc làm 
                                phù hợp cho học viên đã hoàn thành khóa học với kết quả tốt.
                            </div>
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
                <h3 class="fw-bold mb-3">Sẵn sàng bắt đầu hành trình học tiếng Đức?</h3>
                <p class="mb-0">Liên hệ ngay với chúng tôi để được tư vấn miễn phí và đăng ký học thử!</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="tel:0975186230" class="btn btn-light btn-lg me-3">
                    <i class="fas fa-phone me-2"></i>Gọi Ngay
                </a>
                <a href="#" class="btn btn-outline-light btn-lg" onclick="document.getElementById('name').focus(); return false;">
                    <i class="fas fa-edit me-2"></i>Đăng Ký
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
