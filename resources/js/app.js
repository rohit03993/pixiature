import './bootstrap';

// Typing Animation for "Learn. Design. Grow."
function typeText(element, text, speed = 100) {
    if (!element) {
        console.error('Typing element not found!');
        return;
    }
    
    let i = 0;
    const fullText = text;
    element.innerHTML = '';
    
    function type() {
        if (i < fullText.length) {
            // Handle line breaks
            if (fullText[i] === '\n') {
                element.innerHTML += '<br>';
            } else {
                element.innerHTML += fullText[i];
            }
            i++;
            setTimeout(type, speed);
        } else {
            console.log('Typing animation complete');
        }
    }
    
    type();
}

// Start typing animation
function initTypingAnimation() {
    const typingElement = document.getElementById('typing-text');
    console.log('Looking for typing element:', typingElement);
    
    if (typingElement) {
        console.log('Found typing element, starting animation...');
        setTimeout(() => {
            typeText(typingElement, 'Learn.\nDesign.\nGrow.', 100);
        }, 500);
    } else {
        console.error('Typing element #typing-text not found in DOM');
    }
}

// Landing page interactions
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded');
    initTypingAnimation();
    
    // Before/After slider functionality
    const slider = document.querySelector('.before-after-slider');
    if (slider) {
        // Slider logic will be added here
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Also try when window loads (in case DOMContentLoaded already fired)
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTypingAnimation);
} else {
    // DOM already loaded
    initTypingAnimation();
}

