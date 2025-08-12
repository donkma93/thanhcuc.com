// Mobile Course Cards Optimization
// Tối ưu hóa trải nghiệm mobile cho khóa học

document.addEventListener('DOMContentLoaded', function() {
    
    // Detect mobile device
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;
    
    // Course cards optimization
    const courseCards = document.querySelectorAll('.course-card-image');
    
    if (courseCards.length > 0) {
        
        // Add touch feedback for mobile
        if (isTouchDevice) {
            courseCards.forEach(card => {
                card.addEventListener('touchstart', function() {
                    this.style.transform = 'scale(0.98)';
                    this.style.transition = 'transform 0.1s ease';
                });
                
                card.addEventListener('touchend', function() {
                    this.style.transform = 'scale(1)';
                    this.style.transition = 'transform 0.2s ease';
                });
                
                card.addEventListener('touchcancel', function() {
                    this.style.transform = 'scale(1)';
                    this.style.transition = 'transform 0.2s ease';
                });
            });
        }
        
        // Lazy loading for course images
        const courseImages = document.querySelectorAll('.course-bg-image img');
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            });
            
            courseImages.forEach(img => {
                if (img.dataset.src) {
                    imageObserver.observe(img);
                }
            });
        }
        
        // Optimize carousel for mobile
        const coursesCarousel = document.getElementById('coursesSlider');
        if (coursesCarousel && isMobile) {
            // Disable auto-play on mobile to save battery
            coursesCarousel.setAttribute('data-bs-interval', 'false');
            
            // Add swipe gestures for mobile
            let startX = 0;
            let endX = 0;
            
            coursesCarousel.addEventListener('touchstart', function(e) {
                startX = e.touches[0].clientX;
            });
            
            coursesCarousel.addEventListener('touchend', function(e) {
                endX = e.changedTouches[0].clientX;
                handleSwipe();
            });
            
            function handleSwipe() {
                const threshold = 50;
                const diff = startX - endX;
                
                if (Math.abs(diff) > threshold) {
                    if (diff > 0) {
                        // Swipe left - next slide
                        const nextButton = coursesCarousel.querySelector('.carousel-control-next');
                        if (nextButton) {
                            nextButton.click();
                        }
                    } else {
                        // Swipe right - previous slide
                        const prevButton = coursesCarousel.querySelector('.carousel-control-prev');
                        if (prevButton) {
                            prevButton.click();
                        }
                    }
                }
            }
        }
        
        // Performance optimization: Reduce repaints
        let ticking = false;
        
        function updateCardLayout() {
            if (!ticking) {
                requestAnimationFrame(() => {
                    courseCards.forEach(card => {
                        // Force reflow to optimize rendering
                        card.style.transform = 'translateZ(0)';
                    });
                    ticking = false;
                });
                ticking = true;
            }
        }
        
        // Debounced resize handler
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(updateCardLayout, 100);
        });
        
        // Add loading states
        courseCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            // Stagger animation
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, Math.random() * 300);
        });
        
        // Add accessibility improvements
        courseCards.forEach(card => {
            card.setAttribute('role', 'button');
            card.setAttribute('tabindex', '0');
            card.setAttribute('aria-label', 'Xem chi tiết khóa học');
            
            // Keyboard navigation
            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }
            });
        });
    }
    
    // Mobile-specific optimizations
    if (isMobile) {
        // Reduce motion for users who prefer it
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            document.documentElement.style.setProperty('--animation-duration', '0.1s');
        }
        
        // Optimize for mobile performance
        document.body.style.setProperty('--scroll-behavior', 'auto');
        
        // Add mobile-specific classes
        document.body.classList.add('mobile-device');
        
        // Optimize images for mobile
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            if (img.src && !img.src.includes('data:image')) {
                // Add loading="lazy" for better performance
                img.setAttribute('loading', 'lazy');
            }
        });
    }
    
    // Course modal optimization for mobile
    const courseModal = document.getElementById('courseModal');
    if (courseModal && isMobile) {
        // Make modal fullscreen on mobile
        courseModal.addEventListener('show.bs.modal', function() {
            this.querySelector('.modal-dialog').classList.add('modal-fullscreen-sm-down');
        });
        
        // Add swipe to close
        let modalStartY = 0;
        let modalCurrentY = 0;
        
        courseModal.addEventListener('touchstart', function(e) {
            modalStartY = e.touches[0].clientY;
        });
        
        courseModal.addEventListener('touchmove', function(e) {
            modalCurrentY = e.touches[0].clientY;
            const diff = modalCurrentY - modalStartY;
            
            if (diff > 50) {
                // Swipe down to close
                const modal = bootstrap.Modal.getInstance(this);
                if (modal) {
                    modal.hide();
                }
            }
        });
    }
});

// Utility functions
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Performance monitoring
if ('performance' in window) {
    window.addEventListener('load', function() {
        setTimeout(function() {
            const perfData = performance.getEntriesByType('navigation')[0];
            if (perfData && perfData.loadEventEnd - perfData.loadEventStart > 3000) {
                console.warn('Page load time is slow on mobile');
            }
        }, 0);
    });
}
