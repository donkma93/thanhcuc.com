<!-- Footer -->
<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <!-- Cột 1: Liên hệ chúng tôi -->
            <div class="col-lg-4 mb-4">
                <h5 class="text-white mb-4 fw-bold">
                    <i class="fas fa-phone-alt me-2 text-warning"></i>
                    Liên hệ chúng tôi
                </h5>

                <div class="contact-info">
                    <div class="contact-item mb-2">
                        <i class="fas fa-map-marker-alt me-3 text-warning"></i>
                        <span class="text-light">{{ $footerSettings['company_address'] ?? '123 Đường ABC, Quận XYZ, Hà Nội' }}</span>
                    </div>
                    
                    <div class="contact-item mb-2">
                        <i class="fas fa-phone me-3 text-warning"></i>
                        <a href="tel:{{ $footerSettings['company_phone'] ?? '0975186230' }}" class="text-light text-decoration-none">
                            {{ $footerSettings['company_phone_display'] ?? '0975.186.230' }}
                        </a>
                    </div>
                    
                    <div class="contact-item mb-2">
                        <i class="fas fa-envelope me-3 text-warning"></i>
                        <a href="mailto:{{ $footerSettings['company_email'] ?? 'info@thanhcuc.edu.vn' }}" class="text-light text-decoration-none">
                            {{ $footerSettings['company_email'] ?? 'info@thanhcuc.edu.vn' }}
                        </a>
                    </div>
                    
                    <div class="contact-item mb-3">
                        <i class="fas fa-clock me-3 text-warning"></i>
                        <span class="text-light">{{ $footerSettings['working_hours'] ?? 'T2-T7: 8:00 - 20:00, CN: 8:00 - 17:00' }}</span>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="social-links">
                    <h6 class="text-white mb-3">Theo dõi chúng tôi</h6>
                    <div class="d-flex">
                        @if(isset($footerSettings['facebook_url']) && $footerSettings['facebook_url'])
                            <a href="{{ $footerSettings['facebook_url'] }}" class="text-light me-3 social-link" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        
                        @if(isset($footerSettings['youtube_url']) && $footerSettings['youtube_url'])
                            <a href="{{ $footerSettings['youtube_url'] }}" class="text-light me-3 social-link" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        @endif
                        
                        @if(isset($footerSettings['instagram_url']) && $footerSettings['instagram_url'])
                            <a href="{{ $footerSettings['instagram_url'] }}" class="text-light me-3 social-link" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        
                        @if(isset($footerSettings['tiktok_url']) && $footerSettings['tiktok_url'])
                            <a href="{{ $footerSettings['tiktok_url'] }}" class="text-light social-link" target="_blank">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Cột 2: Hệ thống chi nhánh -->
            <div class="col-lg-4 mb-4">
                <h5 class="text-white mb-4 fw-bold">
                    <i class="fas fa-building me-2 text-warning"></i>
                    Hệ thống chi nhánh
                </h5>
                @if(isset($footerBranches) && $footerBranches->count() > 0)
                   
                    <div class="branches-list">
                        @foreach($footerBranches as $branch)
                            <div class="branch-item mb-3 p-3 rounded" style="background: rgba(255,255,255,0.1);">
                                <h6 class="text-warning mb-2 fw-bold">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    {{ $branch['data']['name'] ?? $branch['label'] }}
                                </h6>
                                
                                @if(isset($branch['data']['address']))
                                    <p class="text-light mb-0 small">
                                        <i class="fas fa-location-dot me-2"></i>
                                        {{ $branch['data']['address'] }}
                                    </p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    
                @endif
            </div>
            
            <!-- Cột 3: Khóa học -->
            <div class="col-lg-4 mb-4">
                <h5 class="text-white mb-4 fw-bold">
                    <i class="fas fa-graduation-cap me-2 text-warning"></i>
                    Khóa học
                </h5>
                
                @if(isset($footerCourses) && $footerCourses->count() > 0)
                    <div class="programs-list">
                        @foreach($footerCourses as $course)
                            <div class="program-item mb-2">
                                <a href="#" class="text-decoration-none d-flex align-items-center p-2 rounded program-link" 
                                   style="background: rgba(255,255,255,0.05); transition: all 0.3s ease;">
                                    <span class="me-2"><i class="fas fa-book"></i></span>
                                    <span>{{ $course->name }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Chưa có khóa học nào</p>
                @endif
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <hr class="my-4 border-light opacity-25">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-light mb-0 small">
                    &copy; {{ date('Y') }} {{ $footerSettings['company_name'] ?? 'Trung Tâm Tiếng Đức Thanh Cúc' }}. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="footer-links">
                    <a href="{{ route('home') }}" class="text-light text-decoration-none me-3 small">Trang Chủ</a>
                    <a href="{{ route('about') }}" class="text-light text-decoration-none me-3 small">Về Chúng Tôi</a>
                    <a href="{{ route('contact') }}" class="text-light text-decoration-none small">Liên Hệ</a>
                </div>
            </div>
        </div>
    </div>
</footer>

