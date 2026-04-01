const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const sliderTitle = document.getElementById('slider-title');
let current = 0;
let autoSlide;

// Extract slide titles from data attributes or default content
const slideTitles = [];
slides.forEach((slide, index) => {
    const offerBadge = slide.querySelector('.offer-badge');
    slideTitles[index] = {
        title: slide.dataset.title || (index === 0 ? sliderTitle.querySelector('h1').innerHTML : ''),
        subtitle: slide.dataset.subtitle || (index === 0 ? (sliderTitle.querySelector('p') ? sliderTitle.querySelector('p').innerHTML : '') : '')
    };
});

// Check if slider elements exist on this page
if (slides.length > 0 && dots.length > 0) {
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            dots[i].classList.remove('active');
            if (i === index) {
                slide.classList.add('active');
                dots[i].classList.add('active');
            }
        });

        // Update title if available
        if (sliderTitle && slideTitles[index]) {
            const h1 = sliderTitle.querySelector('h1');
            const p = sliderTitle.querySelector('p');
            
            if (h1 && slideTitles[index].title) {
                h1.innerHTML = slideTitles[index].title;
            }
            if (p && slideTitles[index].subtitle) {
                p.innerHTML = slideTitles[index].subtitle;
            }
            
            // Animate title
            gsap.fromTo(sliderTitle, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.6, ease: "power2.out" });
        }
    }

    function autoPlay() {
        autoSlide = setInterval(() => {
            current = (current + 1) % slides.length;
            showSlide(current);
        }, 6000);
    }

    // Dots navigation click
    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            clearInterval(autoSlide);
            current = parseInt(dot.dataset.index);
            showSlide(current);
            autoPlay();
        });
    });

    // Initialize
    showSlide(current);
    autoPlay();
}
