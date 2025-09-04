<!-- Footer -->
<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <!-- Cột 1: Liên hệ chúng tôi -->
            <div class="col-lg-4 mb-4">
                <h5 class="text-white mb-4 fw-bold text-uppercase">
                    <i class="fas fa-phone-alt me-2 text-warning"></i>
                    {{ __('general.contact_us') }}
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
                        <span class="text-light">{{ $footerSettings['working_hours'] ?? __('general.working_hours') }}</span>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="social-links">
                    <h6 class="text-white mb-3">{{ __('general.follow_us') }}</h6>
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
                <h5 class="text-white mb-4 fw-bold text-uppercase">
                    <i class="fas fa-building me-2 text-warning"></i>
                    {{ __('general.branch_system') }}
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
                <h5 class="text-white mb-4 fw-bold text-uppercase">
                    <i class="fas fa-graduation-cap me-2 text-warning"></i>
                    Khóa học
                </h5>
                
                @if(isset($footerCourses) && $footerCourses->count() > 0)
                    <div class="programs-list">
                        @foreach($footerCourses as $course)
                            <div class="program-item mb-2">
                                <a href="javascript:void(0)" 
                                   class="text-decoration-none d-flex align-items-center p-2 rounded program-link course-modal-trigger" 
                                   data-course-id="{{ $course->id }}">
                                    <span class="me-2"><i class="fas fa-book"></i></span>
                                    <span>{{ $course->name }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">{{ __('general.no_courses') }}</p>
                @endif
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <hr class="my-4 border-light opacity-25">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-light mb-0 small">
                    &copy; {{ date('Y') }} {{ $footerSettings['company_name'] ?? __('general.company_name') }}. {{ __('general.all_rights_reserved') }}
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="footer-links">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-light text-decoration-none me-3 small">{{ __('general.home') }}</a>
                    <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="text-light text-decoration-none me-3 small">{{ __('general.about') }}</a>
                    <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="text-light text-decoration-none small">{{ __('general.contact') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>



<style>
.course-modal-trigger {
    transition: all 0.3s ease;
    background: rgba(255,255,255,0.05);
    cursor: pointer;
}

.course-modal-trigger:hover {
    background: rgba(255,255,255,0.15) !important;
    transform: translateX(5px);
}

.program-link {
    color: #f8f9fa !important;
}

.program-link:hover {
    color: #ffc107 !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Xử lý click vào khóa học trong footer
    const courseModalTriggers = document.querySelectorAll('.course-modal-trigger');
    
    courseModalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const courseId = this.getAttribute('data-course-id');
            const courseName = this.querySelector('span').textContent;
            
            // Sử dụng modal từ home.blade.php
            openCourseModal(courseId, courseName, true); // true = từ footer
        });
    });
});
</script>

