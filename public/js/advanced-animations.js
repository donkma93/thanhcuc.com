/**
 * Advanced Animations and Interactions for Anh Ngữ SEC
 * Author: Augment Agent
 */

class AdvancedAnimations {
    constructor() {
        this.init();
    }

    init() {
        this.setupMagneticEffect();
        this.setupParticleSystem();
        this.setupTextAnimations();
        this.setupAdvancedScrollEffects();
        this.setupMorphingButtons();
        this.setupCardFlipEffects();
        this.setupGlitchEffects();
        this.setupRippleEffects();
        // this.setupCursorEffects(); // Removed per user request
        this.setupPerformanceOptimizations();
    }

    // Magnetic Effect for Interactive Elements
    setupMagneticEffect() {
        const magneticElements = document.querySelectorAll('.magnetic');
        
        magneticElements.forEach(element => {
            element.addEventListener('mousemove', (e) => {
                const rect = element.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                
                const strength = 0.3;
                element.style.setProperty('--x', `${x * strength}px`);
                element.style.setProperty('--y', `${y * strength}px`);
            });
            
            element.addEventListener('mouseleave', () => {
                element.style.setProperty('--x', '0px');
                element.style.setProperty('--y', '0px');
            });
        });
    }

    // Advanced Particle System
    setupParticleSystem() {
        const createParticle = (container) => {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            const size = Math.random() * 4 + 2;
            const startX = Math.random() * container.offsetWidth;
            const duration = Math.random() * 3 + 3;
            
            particle.style.cssText = `
                width: ${size}px;
                height: ${size}px;
                left: ${startX}px;
                animation-duration: ${duration}s;
                animation-delay: ${Math.random() * 2}s;
            `;
            
            container.appendChild(particle);
            
            setTimeout(() => {
                if (particle.parentNode) {
                    particle.parentNode.removeChild(particle);
                }
            }, duration * 1000);
        };

        const particleContainers = document.querySelectorAll('.particles-container');
        particleContainers.forEach(container => {
            setInterval(() => {
                if (container.children.length < 20) {
                    createParticle(container);
                }
            }, 500);
        });
    }

    // Advanced Text Animations
    setupTextAnimations() {
        // Split text into spans for character animation
        const animatedTexts = document.querySelectorAll('.text-animate');
        animatedTexts.forEach(text => {
            const content = text.textContent;
            text.innerHTML = '';
            
            [...content].forEach((char, index) => {
                const span = document.createElement('span');
                span.textContent = char === ' ' ? '\u00A0' : char;
                span.style.animationDelay = `${index * 0.1}s`;
                span.classList.add('char-animate');
                text.appendChild(span);
            });
        });

        // Glitch text effect
        const glitchTexts = document.querySelectorAll('.glitch');
        glitchTexts.forEach(text => {
            text.setAttribute('data-text', text.textContent);
        });
    }

    // Advanced Scroll Effects
    setupAdvancedScrollEffects() {
        let ticking = false;

        const updateScrollEffects = () => {
            const scrollY = window.pageYOffset;
            
            // Parallax layers
            document.querySelectorAll('.parallax-layer').forEach((layer, index) => {
                const speed = (index + 1) * 0.1;
                layer.style.transform = `translateY(${scrollY * speed}px)`;
            });

            // Scale elements on scroll
            document.querySelectorAll('.scale-on-scroll').forEach(element => {
                const rect = element.getBoundingClientRect();
                const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
                
                if (isVisible) {
                    const progress = 1 - (rect.top / window.innerHeight);
                    const scale = 0.8 + (progress * 0.2);
                    element.style.transform = `scale(${Math.min(scale, 1)})`;
                }
            });

            // Rotate elements on scroll
            document.querySelectorAll('.rotate-on-scroll').forEach(element => {
                const rect = element.getBoundingClientRect();
                const rotation = (scrollY * 0.1) % 360;
                element.style.transform = `rotate(${rotation}deg)`;
            });

            ticking = false;
        };

        const requestScrollUpdate = () => {
            if (!ticking) {
                requestAnimationFrame(updateScrollEffects);
                ticking = true;
            }
        };

        window.addEventListener('scroll', requestScrollUpdate, { passive: true });
    }

    // Morphing Button Effects
    setupMorphingButtons() {
        const morphButtons = document.querySelectorAll('.btn-morph');
        
        morphButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const ripple = document.createElement('div');
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.6);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    left: ${x}px;
                    top: ${y}px;
                    width: 20px;
                    height: 20px;
                    margin-left: -10px;
                    margin-top: -10px;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    }

    // Card Flip Effects
    setupCardFlipEffects() {
        const flipCards = document.querySelectorAll('.card-flip');
        
        flipCards.forEach(card => {
            let isFlipped = false;
            
            card.addEventListener('click', () => {
                isFlipped = !isFlipped;
                const inner = card.querySelector('.card-flip-inner');
                inner.style.transform = isFlipped ? 'rotateY(180deg)' : 'rotateY(0deg)';
            });
        });
    }

    // Glitch Effects
    setupGlitchEffects() {
        const glitchElements = document.querySelectorAll('.glitch-trigger');
        
        glitchElements.forEach(element => {
            element.addEventListener('mouseenter', () => {
                element.classList.add('glitch');
                setTimeout(() => {
                    element.classList.remove('glitch');
                }, 500);
            });
        });
    }

    // Ripple Effects
    setupRippleEffects() {
        const rippleElements = document.querySelectorAll('.ripple');
        
        rippleElements.forEach(element => {
            element.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                const ripple = document.createElement('div');
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.6);
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    animation: rippleEffect 0.6s ease-out;
                    pointer-events: none;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    }

    // Custom Cursor Effects - Removed per user request
    setupCursorEffects() {
        // Cursor effects disabled
        return;
    }

    // Performance Optimizations
    setupPerformanceOptimizations() {
        // Reduce animations on low-end devices
        if (navigator.hardwareConcurrency && navigator.hardwareConcurrency < 4) {
            document.body.classList.add('reduced-animations');
        }

        // Pause animations when tab is not visible
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                document.body.style.animationPlayState = 'paused';
            } else {
                document.body.style.animationPlayState = 'running';
            }
        });

        // Intersection Observer for performance
        const performanceObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-viewport');
                } else {
                    entry.target.classList.remove('in-viewport');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.performance-watch').forEach(element => {
            performanceObserver.observe(element);
        });
    }

    // Utility Methods
    static addRipple(element, x, y) {
        const ripple = document.createElement('div');
        const size = Math.max(element.offsetWidth, element.offsetHeight);
        
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            width: ${size}px;
            height: ${size}px;
            left: ${x - size / 2}px;
            top: ${y - size / 2}px;
            animation: rippleEffect 0.6s ease-out;
            pointer-events: none;
        `;
        
        element.appendChild(ripple);
        setTimeout(() => ripple.remove(), 600);
    }

    static animateNumber(element, target, duration = 2000) {
        const start = parseInt(element.textContent) || 0;
        const increment = (target - start) / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }

    static createFloatingElement(container, options = {}) {
        const element = document.createElement('div');
        const defaults = {
            size: 10,
            color: 'var(--primary-color)',
            duration: 5,
            delay: 0
        };
        
        const config = { ...defaults, ...options };
        
        element.style.cssText = `
            position: absolute;
            width: ${config.size}px;
            height: ${config.size}px;
            background: ${config.color};
            border-radius: 50%;
            animation: float ${config.duration}s ease-in-out infinite;
            animation-delay: ${config.delay}s;
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            pointer-events: none;
        `;
        
        container.appendChild(element);
        return element;
    }
}

// CSS for additional animations
const additionalCSS = `
    @keyframes rippleEffect {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes char-animate {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .char-animate {
        display: inline-block;
        animation: char-animate 0.5s ease forwards;
        opacity: 0;
    }
    
    .reduced-animations * {
        animation-duration: 0.1s !important;
        transition-duration: 0.1s !important;
    }
    
    .in-viewport {
        animation-play-state: running;
    }
    
    .performance-watch:not(.in-viewport) {
        animation-play-state: paused;
    }
`;

// Inject additional CSS
const style = document.createElement('style');
style.textContent = additionalCSS;
document.head.appendChild(style);

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new AdvancedAnimations();
});

// Export for use in other scripts
window.AdvancedAnimations = AdvancedAnimations;