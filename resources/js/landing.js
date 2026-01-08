// Modern Scroll Animations for Landing Page
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';
    
    // Intersection Observer for scroll-triggered animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                // Optional: stop observing after animation
                // observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all sections with animation classes
    const animatedElements = document.querySelectorAll('.fade-in, .slide-up, .slide-left, .slide-right, .scale-in, .student-counter-wrapper');
    animatedElements.forEach(el => {
        observer.observe(el);
    });
    
    // Parallax effect for hero background images
    const heroImages = document.querySelectorAll('.hero .parallax-img');
    if (heroImages.length > 0) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            heroImages.forEach((img, index) => {
                const speed = 0.3 + (index * 0.1);
                img.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
    }
    
    // Stagger animation for pain points section
    const painPoints = document.querySelectorAll('.pain-point-item');
    if (painPoints.length > 0) {
        const painPointsObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate-in');
                    }, index * 100);
                }
            });
        }, { threshold: 0.1 });
        
        painPoints.forEach(item => {
            painPointsObserver.observe(item);
        });
    }
    
    // Button hover effects
    const buttons = document.querySelectorAll('.cta-button, .enroll-button');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.transition = 'all 0.3s ease';
        });
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Scroll progress indicator (optional)
    const scrollProgress = document.createElement('div');
    scrollProgress.className = 'scroll-progress';
    document.body.appendChild(scrollProgress);
    
    window.addEventListener('scroll', () => {
        const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrolled = (window.scrollY / windowHeight) * 100;
        scrollProgress.style.width = `${scrolled}%`;
    });
    
    // Smooth reveal for text elements
    const textElements = document.querySelectorAll('.text-reveal');
    textElements.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add('revealed');
        }, index * 150);
    });
    
    // Navigation scroll effect - add background after hero section
    const topNav = document.querySelector('.top-nav');
    const heroSection = document.querySelector('.hero');
    
    if (topNav && heroSection) {
        const heroHeight = heroSection.offsetHeight;
        
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY;
            
            // Add scrolled class when past hero section
            if (scrolled > heroHeight - 100) {
                topNav.classList.add('scrolled');
            } else {
                topNav.classList.remove('scrolled');
            }
        });
    }
    
    // Animated Counter for Student Count
    const studentCounter = document.getElementById('studentCounter');
    const counterWrapper = document.querySelector('.student-counter-wrapper');
    let hasAnimated = false;
    
    if (studentCounter && counterWrapper) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !hasAnimated) {
                    hasAnimated = true;
                    counterWrapper.classList.add('animate-in');
                    
                    // Animate counter from 0 to 1000+
                    const targetValue = 1000;
                    const duration = 2000; // 2 seconds
                    const increment = targetValue / (duration / 16); // 60fps
                    let currentValue = 0;
                    
                    const updateCounter = () => {
                        currentValue += increment;
                        if (currentValue < targetValue) {
                            studentCounter.textContent = Math.floor(currentValue) + '+';
                            requestAnimationFrame(updateCounter);
                        } else {
                            studentCounter.textContent = targetValue + '+';
                        }
                    };
                    
                    // Start animation after a small delay
                    setTimeout(() => {
                        updateCounter();
                    }, 300);
                }
            });
        }, { threshold: 0.3 });
        
        counterObserver.observe(counterWrapper);
    }
    
    // Before/After Image Slider with Auto-Slide
    const slider = document.getElementById('beforeAfterSlider');
    const prevBtn = document.getElementById('sliderPrev');
    const nextBtn = document.getElementById('sliderNext');
    const dotsContainer = document.getElementById('sliderDots');
    
    if (slider && prevBtn && nextBtn && dotsContainer) {
        const slides = slider.querySelectorAll('.slider-slide');
        let currentSlide = 0;
        let autoSlideInterval;
        const autoSlideDelay = 4000; // 4 seconds
        
        // Create dots
        slides.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.className = 'slider-dot' + (index === 0 ? ' active' : '');
            dot.addEventListener('click', () => goToSlide(index));
            dotsContainer.appendChild(dot);
        });
        
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            
            const dots = dotsContainer.querySelectorAll('.slider-dot');
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            
            currentSlide = index;
        }
        
        function nextSlide() {
            const next = (currentSlide + 1) % slides.length;
            showSlide(next);
        }
        
        function prevSlide() {
            const prev = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(prev);
        }
        
        function goToSlide(index) {
            showSlide(index);
            resetAutoSlide();
        }
        
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, autoSlideDelay);
        }
        
        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
            }
        }
        
        function resetAutoSlide() {
            stopAutoSlide();
            startAutoSlide();
        }
        
        // Event listeners
        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoSlide();
        });
        
        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoSlide();
        });
        
        // Pause on hover
        slider.addEventListener('mouseenter', stopAutoSlide);
        slider.addEventListener('mouseleave', startAutoSlide);
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (slider.getBoundingClientRect().top < window.innerHeight && 
                slider.getBoundingClientRect().bottom > 0) {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    resetAutoSlide();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    resetAutoSlide();
                }
            }
        });
        
        // Start auto-slide
        startAutoSlide();
        
        // Pause auto-slide when tab is not visible
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                stopAutoSlide();
            } else {
                startAutoSlide();
            }
        });
    }
});

