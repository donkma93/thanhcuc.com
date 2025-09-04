@extends('layouts.app')

@section('title', __('general.page_title_contact'))

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">{{ __('general.contact_title') }}</h1>
                <p class="lead">
                    {{ __('general.contact_subtitle') }}
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
                            <i class="fas fa-envelope me-2"></i>{{ __('general.send_message') }}
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

                        <form action="{{ route('contact.submit', ['locale' => app()->getLocale()]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-bold">{{ __('general.full_name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label fw-bold">{{ __('general.phone_number_label') }} <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">{{ __('general.email_label') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="course" class="form-label fw-bold">{{ __('general.course_interested') }} <span class="text-danger">*</span></label>
                                <select class="form-select @error('course') is-invalid @enderror" id="course" name="course" required>
                                    <option value="">{{ __('general.select_course') }}</option>
                                    <option value="A1-A2" {{ old('course') == 'A1-A2' ? 'selected' : '' }}>{{ __('general.basic_level') }}</option>
                                    <option value="B1-B2" {{ old('course') == 'B1-B2' ? 'selected' : '' }}>{{ __('general.intermediate_level') }}</option>
                                    <option value="C1-C2" {{ old('course') == 'C1-C2' ? 'selected' : '' }}>{{ __('general.advanced_level') }}</option>
                                    <option value="Business" {{ old('course') == 'Business' ? 'selected' : '' }}>{{ __('general.business_german') }}</option>
                                    <option value="Exam" {{ old('course') == 'Exam' ? 'selected' : '' }}>{{ __('general.exam_preparation') }}</option>
                                    <option value="Other" {{ old('course') == 'Other' ? 'selected' : '' }}>{{ __('general.other_course') }}</option>
                                </select>
                                @error('course')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="message" class="form-label fw-bold">{{ __('general.message') }}</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="5" 
                                          placeholder="{{ __('general.message_placeholder') }}">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-paper-plane me-2"></i>{{ __('general.send_message_button') }}
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
                            <i class="fas fa-map-marker-alt me-2"></i>{{ __('general.contact_info') }}
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
                                    <h6 class="fw-bold mb-1">{{ __('general.address_label') }}</h6>
                                    <p class="text-muted mb-0">
                                        {{ $footerSettings['company_address'] ?? __('general.updating') }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px; min-width: 40px;">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('general.phone_label') }}</h6>
                                    <p class="text-muted mb-0">
                                        <a href="tel:{{ $footerSettings['company_phone'] ?? '' }}" class="text-decoration-none">
                                            {{ $footerSettings['company_phone_display'] ?? ($footerSettings['company_phone'] ?? __('general.updating')) }}
                                        </a>
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
                                        @if(!empty($footerSettings['company_email']))
                                            <a href="mailto:{{ $footerSettings['company_email'] }}" class="text-decoration-none">{{ $footerSettings['company_email'] }}</a>
                                        @else
                                            {{ __('general.updating') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px; min-width: 40px;">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">{{ __('general.working_hours') }}</h6>
                                    <p class="text-muted mb-0">
                                        {{ $footerSettings['working_hours'] ?? __('general.updating') }}
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
                            <i class="fas fa-share-alt me-2"></i>{{ __('general.connect_with_us') }}
                        </h5>
                    </div>
                    <div class="card-body p-4 text-center">
                        <div class="d-flex justify-content-center gap-3">
                            @if(!empty($footerSettings['facebook_url']))
                                <a href="{{ $footerSettings['facebook_url'] }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-lg">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if(!empty($footerSettings['youtube_url']))
                                <a href="{{ $footerSettings['youtube_url'] }}" target="_blank" rel="noopener" class="btn btn-outline-danger btn-lg">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                            @if(!empty($footerSettings['instagram_url']))
                                <a href="{{ $footerSettings['instagram_url'] }}" target="_blank" rel="noopener" class="btn btn-outline-info btn-lg">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            @if(!empty($footerSettings['tiktok_url']))
                                <a href="{{ $footerSettings['tiktok_url'] }}" target="_blank" rel="noopener" class="btn btn-outline-dark btn-lg">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            @endif
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            {{ __('general.follow_us_for_updates') }}
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
            <h2 class="display-5 fw-bold text-primary mb-3">{{ __('general.center_location') }}</h2>
            <p class="lead text-muted">{{ __('general.find_way_to_center') }}</p>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-0">
                        @php
                            $mapEmbed = \App\Models\Setting::get('contact_map_embed')
                                ?: \App\Models\Setting::get('company_map_embed')
                                ?: \App\Models\Setting::get('map_embed_url')
                                ?: \App\Models\Setting::get('google_map_embed');
                        @endphp
                        @if(!empty($mapEmbed))
                            @if(\Illuminate\Support\Str::contains($mapEmbed, '<iframe'))
                                {!! $mapEmbed !!}
                            @else
                                <div class="ratio ratio-21x9">
                                    <iframe 
                                        src="{{ $mapEmbed }}"
                                        style="border:0;" 
                                        allowfullscreen 
                                        loading="lazy" 
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            @endif
                        @else
                            <!-- Fallback static map if no admin setting is configured -->
                            <div class="ratio ratio-21x9">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0967470394973!2d105.84117831533216!3d21.028511986010745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1635123456789!5m2!1svi!2s" 
                                    style="border:0;" 
                                    allowfullscreen 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        @endif
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
            <h2 class="display-5 fw-bold text-primary mb-3">{{ __('general.frequently_asked_questions') }}</h2>
            <p class="lead text-muted">{{ __('general.common_questions_about_german') }}</p>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                {{ __('general.faq_beginner_question') }}
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('general.faq_beginner_answer') }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                {{ __('general.faq_payment_question') }}
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('general.faq_payment_answer') }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                {{ __('general.faq_trial_question') }}
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('general.faq_trial_answer') }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                {{ __('general.faq_job_support_question') }}
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('general.faq_job_support_answer') }}
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
                <h3 class="fw-bold mb-3">{{ __('general.ready_to_start_german_journey') }}</h3>
                <p class="mb-0">{{ __('general.contact_for_free_consultation') }}</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="tel:{{ $footerSettings['company_phone'] ?? '' }}" class="btn btn-light btn-lg me-3">
                    <i class="fas fa-phone me-2"></i>{{ __('general.call_now') }}
                </a>
                <a href="#" class="btn btn-outline-light btn-lg" onclick="document.getElementById('name').focus(); return false;">
                    <i class="fas fa-edit me-2"></i>{{ __('general.register') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
