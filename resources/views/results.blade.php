@extends('layouts.app')

@section('title', 'Kết Quả Học Viên - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')

<!-- Student Results Section -->
<section class="py-5 student-results-section" id="student-results">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title animate-on-scroll">
                KẾT QUẢ <span class="title-highlight">HỌC VIÊN</span>
            </h2>
            <p class="section-subtitle animate-on-scroll animate-delay-1">
                Những thành tích đáng tự hào và phản hồi chân thực từ học viên Thanh Cúc
            </p>
        </div>



        <!-- Scores Section -->
        @if($scores->count() > 0)
        <div class="mb-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary mb-3">Bảng Điểm Học Viên</h2>
                <p class="text-muted">Những thành tích xuất sắc và điểm số ấn tượng của học viên Thanh Cúc</p>
                            </div>
            
            <!-- Scores Slider -->
            <div class="position-relative">
                <div class="gallery-slider" id="scoresSlider">
                    <div class="slider-container">
                        @foreach($scores as $index => $score)
                            <div class="slider-item" data-gallery="scores" data-index="{{ $index }}">
                                <div class="slider-card">
                                    <div class="slider-image-container">
                                        <img src="{{ $score->image_url }}" 
                                             alt="{{ $score->title }}" 
                                             class="slider-image">
                                        @if($score->level)
                                            <div class="slider-level-badge">
                                                <span class="badge bg-primary">{{ $score->level }}</span>
                        </div>
                                        @endif
                                        <div class="slider-overlay">
                                            <div class="slider-content">
                                                <h6 class="text-white fw-bold mb-1">{{ $score->title }}</h6>
                                                <p class="text-white-50 small mb-1">{{ Str::limit($score->description, 80) }}</p>
                            @if($score->student_name)
                                                    <span class="badge bg-light text-dark small">
                                                        <i class="fas fa-user me-1"></i>{{ $score->student_name }}
                                                    </span>
                                @endif
                                @if($score->score)
                                                    <span class="badge bg-success small ms-1">
                                                        <i class="fas fa-chart-line me-1"></i>{{ $score->score }}
                                                    </span>
                                @endif
                                            </div>
                                        </div>
                                        <div class="slider-click-overlay">
                                            <i class="fas fa-search-plus fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    </div>
                </div>
                
                <!-- Navigation Buttons -->
                @if($scores->count() >= 4)
                <button class="slider-nav slider-prev" onclick="moveSlider('scoresSlider', -1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-nav slider-next" onclick="moveSlider('scoresSlider', 1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
                @endif
            </div>
        </div>
        @endif

        <!-- Feedbacks Section -->
        @if($feedbacks->count() > 0)
        <div class="mb-5 bg-light py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-primary mb-3">Phản Hồi Học Viên</h2>
                    <p class="text-muted">Những chia sẻ chân thực và đánh giá tích cực từ học viên</p>
                            </div>
                
                <!-- Feedbacks Slider -->
                <div class="position-relative">
                    <div class="gallery-slider" id="feedbacksSlider">
                        <div class="slider-container">
                            @foreach($feedbacks as $index => $feedback)
                                <div class="slider-item" data-gallery="feedbacks" data-index="{{ $index }}">
                                    <div class="slider-card">
                                        <div class="slider-image-container">
                                            <img src="{{ $feedback->image_url }}" 
                                                 alt="{{ $feedback->title }}" 
                                                 class="slider-image">
                                            @if($feedback->level)
                                                <div class="slider-level-badge">
                                                    <span class="badge bg-info">{{ $feedback->level }}</span>
                        </div>
                                            @endif
                                            <div class="slider-overlay">
                                                <div class="slider-content">
                                                    <h6 class="text-white fw-bold mb-1">{{ $feedback->title }}</h6>
                                                    <p class="text-white-50 small mb-1">{{ Str::limit($feedback->description, 80) }}</p>
                            @if($feedback->student_name)
                                                        <span class="badge bg-light text-dark small">
                                                            <i class="fas fa-user me-1"></i>{{ $feedback->student_name }}
                                                        </span>
                            @endif
                                @if($feedback->certificate_type)
                                                        <span class="badge bg-warning small ms-1">
                                                            <i class="fas fa-certificate me-1"></i>{{ $feedback->certificate_type }}
                                                        </span>
                                @endif
                                                </div>
                                            </div>
                                            <div class="slider-click-overlay">
                                                <i class="fas fa-search-plus fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
                    
                    <!-- Navigation Buttons -->
                    @if($feedbacks->count() >= 4)
                    <button class="slider-nav slider-prev" onclick="moveSlider('feedbacksSlider', -1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-nav slider-next" onclick="moveSlider('feedbacksSlider', 1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
        @endif
    </div>
                    </div>
            </div>
        @endif

        <!-- Statistics Section -->
        <div class="row text-center mt-5">
            <div class="col-md-6 mb-4">
                <div class="stat-card">
                    <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                    <h3 class="fw-bold text-primary">{{ $totalScores }}</h3>
                    <p class="text-muted mb-0">Bảng Điểm</p>
                        </div>
                        </div>
            <div class="col-md-6 mb-4">
                <div class="stat-card">
                    <i class="fas fa-comments fa-3x text-success mb-3"></i>
                    <h3 class="fw-bold text-success">{{ $totalFeedbacks }}</h3>
                    <p class="text-muted mb-0">Phản Hồi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Gallery Modal -->
<div class="modal fade" id="imageGalleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white" id="galleryModalTitle">Gallery</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="position-relative">
                    <img id="galleryModalImage" src="" alt="" class="img-fluid w-100" style="max-height: 70vh; object-fit: contain;">
                    
                    <!-- Navigation arrows -->
                    <button class="gallery-nav gallery-prev" onclick="changeGalleryImage(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="gallery-nav gallery-next" onclick="changeGalleryImage(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Image counter -->
                    <div class="gallery-counter">
                        <span id="currentImageIndex">1</span> / <span id="totalImages">1</span>
                    </div>
                </div>
                
                <!-- Image info -->
                <div class="p-4">
                    <h6 class="text-white mb-2" id="galleryImageTitle">Title</h6>
                    <p class="text-light mb-0" id="galleryImageDescription">Description</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Student Results Section Styles */
.student-results-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.title-highlight {
    color: var(--primary-color);
    position: relative;
}

.title-highlight::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--primary-color);
    border-radius: 2px;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}



/* Gallery Slider Styles */
.gallery-slider {
    overflow: hidden;
    position: relative;
}

.slider-container {
    display: flex;
    transition: transform 0.5s ease;
    gap: 20px;
}

.slider-item {
    flex: 0 0 300px;
    height: 250px;
    cursor: pointer;
}

.slider-card {
    height: 100%;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.slider-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.slider-image-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.slider-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.slider-card:hover .slider-image {
    transform: scale(1.1);
}

.slider-level-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 3;
}

.slider-level-badge .badge {
    font-size: 0.8rem;
    padding: 6px 10px;
    border-radius: 15px;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.slider-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(1, 88, 98, 0.8), rgba(62, 184, 80, 0.8));
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: end;
    padding: 1.5rem;
    z-index: 2;
}

.slider-card:hover .slider-overlay {
    opacity: 1;
}

.slider-content {
    transform: translateY(20px);
    transition: transform 0.3s ease;
    width: 100%;
}

.slider-card:hover .slider-content {
    transform: translateY(0);
}

.slider-click-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 4;
    pointer-events: auto;
    cursor: pointer;
}

.slider-card:hover .slider-click-overlay {
    opacity: 1;
}

/* Slider Navigation */
.slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(1, 88, 98, 0.8);
    border: none;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 5;
    cursor: pointer;
}

.slider-nav:hover {
    background: var(--primary-color);
    transform: translateY(-50%) scale(1.1);
    color: white;
}

.slider-prev {
    left: -25px;
}

.slider-next {
    right: -25px;
}

/* Gallery Modal Styles */
.gallery-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 10;
    cursor: pointer;
}

.gallery-nav:hover {
    background: rgba(0, 0, 0, 0.8);
    transform: translateY(-50%) scale(1.1);
    color: white;
}

.gallery-prev {
    left: 20px;
}

.gallery-next {
    right: 20px;
}

.gallery-counter {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
    z-index: 10;
}

/* Statistics Styles */
.stat-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.stat-card i {
    transition: transform 0.3s ease;
}

.stat-card:hover i {
    transform: scale(1.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }
    
    .slider-item {
        flex: 0 0 250px;
        height: 200px;
    }
    
    .slider-overlay {
        padding: 1rem;
    }
    
    .slider-nav {
        width: 40px;
        height: 40px;
    }
    
    .slider-prev {
        left: -20px;
    }
    
    .slider-next {
        right: -20px;
    }
    
    .gallery-nav {
        width: 50px;
        height: 50px;
    }
}

@media (max-width: 576px) {
    .slider-item {
        flex: 0 0 200px;
        height: 180px;
    }
    
    .slider-container {
        gap: 15px;
    }
    
    .gallery-nav {
        width: 45px;
        height: 45px;
    }
    
    .gallery-prev {
        left: 10px;
    }
    
    .gallery-next {
        right: 10px;
    }
    
    .result-content {
        padding: 1rem;
    }
}

/* Animation for scroll */
.slider-item {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.6s ease forwards;
}

.slider-item:nth-child(1) { animation-delay: 0.1s; }
.slider-item:nth-child(2) { animation-delay: 0.2s; }
.slider-item:nth-child(3) { animation-delay: 0.3s; }
.slider-item:nth-child(4) { animation-delay: 0.4s; }
.slider-item:nth-child(5) { animation-delay: 0.5s; }
.slider-item:nth-child(6) { animation-delay: 0.6s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
    }
</style>
@endpush

@push('scripts')
<script>
// Gallery data from database
@php
    $allScores = \App\Models\StudentResult::scores()->active()->ordered()->get();
    $allFeedbacks = \App\Models\StudentResult::feedbacks()->active()->ordered()->get();
@endphp

const galleryData = {
    scores: [
        @foreach($allScores as $score)
        {
            image: '{{ $score->image_url }}',
            title: '{{ $score->title }}',
            description: '{{ $score->description ?? '' }}',
            student_name: '{{ $score->student_name ?? '' }}',
            level: '{{ $score->level ?? '' }}',
            score: '{{ $score->score ?? '' }}',
            certificate_type: '{{ $score->certificate_type ?? '' }}'
        }@if(!$loop->last),@endif
        @endforeach
    ],
    feedbacks: [
        @foreach($allFeedbacks as $feedback)
        {
            image: '{{ $feedback->image_url }}',
            title: '{{ $feedback->title }}',
            description: '{{ $feedback->description ?? '' }}',
            student_name: '{{ $feedback->student_name ?? '' }}',
            level: '{{ $feedback->level ?? '' }}',
            certificate_type: '{{ $feedback->certificate_type ?? '' }}'
        }@if(!$loop->last),@endif
        @endforeach
    ]
};

// Slider positions
const sliderPositions = {
    scoresSlider: 0,
    feedbacksSlider: 0
};

// Current gallery state
let currentGallery = null;
let currentImageIndex = 0;

// Move slider function
function moveSlider(sliderId, direction) {
    const slider = document.getElementById(sliderId);
    const container = slider.querySelector('.slider-container');
    const items = container.querySelectorAll('.slider-item');
    const itemWidth = 320; // 300px + 20px gap
    const visibleItems = Math.floor(slider.offsetWidth / itemWidth);
    const maxPosition = -(items.length - visibleItems) * itemWidth;
    
    // Only move if there are more items than visible
    if (items.length <= visibleItems) {
        return;
    }
    
    sliderPositions[sliderId] += direction * itemWidth;
    
    // Boundary checks
    if (sliderPositions[sliderId] > 0) {
        sliderPositions[sliderId] = 0;
    } else if (sliderPositions[sliderId] < maxPosition) {
        sliderPositions[sliderId] = maxPosition;
    }
    
    container.style.transform = `translateX(${sliderPositions[sliderId]}px)`;
    
    // Update navigation button states
    updateNavigationButtons(sliderId);
}

// Update navigation button states
function updateNavigationButtons(sliderId) {
    const slider = document.getElementById(sliderId);
    const container = slider.querySelector('.slider-container');
    const items = container.querySelectorAll('.slider-item');
    const itemWidth = 320;
    const visibleItems = Math.floor(slider.offsetWidth / itemWidth);
    const maxPosition = -(items.length - visibleItems) * itemWidth;
    
    const prevBtn = slider.parentElement.querySelector('.slider-prev');
    const nextBtn = slider.parentElement.querySelector('.slider-next');
    
    if (prevBtn && nextBtn) {
        // Disable/enable prev button
        if (sliderPositions[sliderId] >= 0) {
            prevBtn.style.opacity = '0.5';
            prevBtn.style.pointerEvents = 'none';
        } else {
            prevBtn.style.opacity = '1';
            prevBtn.style.pointerEvents = 'auto';
        }
        
        // Disable/enable next button
        if (sliderPositions[sliderId] <= maxPosition) {
            nextBtn.style.opacity = '0.5';
            nextBtn.style.pointerEvents = 'none';
        } else {
            nextBtn.style.opacity = '1';
            nextBtn.style.pointerEvents = 'auto';
        }
    }
}

    // Open gallery modal
    function openGallery(galleryType, imageIndex) {
    console.log('Opening gallery:', galleryType, imageIndex);
    console.log('Gallery data:', galleryData);
        
    currentGallery = galleryType;
        currentImageIndex = imageIndex;
        
    const modal = new bootstrap.Modal(document.getElementById('imageGalleryModal'));
            updateGalleryModal();
            modal.show();
    }

    // Update gallery modal content
    function updateGalleryModal() {
    console.log('Updating modal for:', currentGallery, currentImageIndex);
        
    if (!currentGallery || !galleryData[currentGallery]) {
        console.log('No gallery data found for:', currentGallery);
            return;
        }
        
    const data = galleryData[currentGallery];
    const currentImage = data[currentImageIndex];
    
        console.log('Current image data:', currentImage);
    
    if (!currentImage) {
        console.log('No image found at index:', currentImageIndex);
        return;
    }
        
        const modalImage = document.getElementById('galleryModalImage');
    modalImage.src = currentImage.image;
    modalImage.alt = currentImage.title;
    
    // Add error handling for missing images
    modalImage.onerror = function() {
        console.log('Image failed to load:', currentImage.image);
        this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxOCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkltYWdlIG5vdCBmb3VuZDwvdGV4dD48L3N2Zz4=';
    };
    
    document.getElementById('galleryImageTitle').textContent = currentImage.title;
    
    // Build description with additional info
    let description = currentImage.description || '';
    if (currentImage.student_name) {
        description += (description ? ' | ' : '') + 'Học viên: ' + currentImage.student_name;
    }
    if (currentImage.level) {
        description += (description ? ' | ' : '') + 'Cấp độ: ' + currentImage.level;
    }
    if (currentImage.score) {
        description += (description ? ' | ' : '') + 'Điểm: ' + currentImage.score;
    }
    if (currentImage.certificate_type) {
        description += (description ? ' | ' : '') + 'Chứng chỉ: ' + currentImage.certificate_type;
    }
    
    document.getElementById('galleryImageDescription').textContent = description;
    document.getElementById('currentImageIndex').textContent = currentImageIndex + 1;
    document.getElementById('totalImages').textContent = data.length;
    
    // Update modal title
    const modalTitle = currentGallery === 'scores' ? 'Bảng Điểm Học Viên' : 'Phản Hồi Học Viên';
    document.getElementById('galleryModalTitle').textContent = modalTitle;
    }

    // Change gallery image
    function changeGalleryImage(direction) {
    if (!currentGallery || !galleryData[currentGallery]) return;
        
    const data = galleryData[currentGallery];
        currentImageIndex += direction;
        
        // Boundary checks with loop
    if (currentImageIndex >= data.length) {
            currentImageIndex = 0;
        } else if (currentImageIndex < 0) {
        currentImageIndex = data.length - 1;
        }
        
        updateGalleryModal();
    }

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Add click event listeners to slider items
    document.querySelectorAll('.slider-item').forEach(item => {
        item.addEventListener('click', function() {
            const galleryType = this.getAttribute('data-gallery');
            const imageIndex = parseInt(this.getAttribute('data-index'));
            openGallery(galleryType, imageIndex);
        });
    });
    


    // Keyboard navigation for gallery
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('imageGalleryModal');
        if (modal.classList.contains('show')) {
            if (e.key === 'ArrowLeft') {
                changeGalleryImage(-1);
            } else if (e.key === 'ArrowRight') {
                changeGalleryImage(1);
            } else if (e.key === 'Escape') {
                bootstrap.Modal.getInstance(modal).hide();
            }
        }
    });
    
    // Initialize navigation buttons
    ['scoresSlider', 'feedbacksSlider'].forEach(sliderId => {
        updateNavigationButtons(sliderId);
    });
    
    // Auto-resize sliders on window resize
    window.addEventListener('resize', function() {
        // Reset slider positions on resize
        Object.keys(sliderPositions).forEach(sliderId => {
            sliderPositions[sliderId] = 0;
            const slider = document.getElementById(sliderId);
            if (slider) {
                const container = slider.querySelector('.slider-container');
                container.style.transform = 'translateX(0px)';
                updateNavigationButtons(sliderId);
            }
        });
    });
    
    // Touch/swipe support for mobile
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    
    document.querySelectorAll('.gallery-slider').forEach(slider => {
        slider.addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
            isDragging = true;
        });
        
        slider.addEventListener('touchmove', function(e) {
            if (!isDragging) return;
            currentX = e.touches[0].clientX;
        });
        
        slider.addEventListener('touchend', function(e) {
            if (!isDragging) return;
            isDragging = false;
            
            const diffX = startX - currentX;
            const threshold = 50;
            
            if (Math.abs(diffX) > threshold) {
                const direction = diffX > 0 ? 1 : -1;
                moveSlider(this.id, direction);
            }
        });
    });
});
</script>
@endpush
