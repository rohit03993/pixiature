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
    const animatedElements = document.querySelectorAll('.fade-in, .slide-up, .slide-left, .slide-right, .scale-in');
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
});

