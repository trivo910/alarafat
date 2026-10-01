const slides = [...document.querySelectorAll('.hero-slide')];
const dotsContainer = document.querySelector('.hero-dots');
let activeSlide = 0;
let carouselTimer;

function showSlide(index) {
    activeSlide = (index + slides.length) % slides.length;
    slides.forEach((slide, slideIndex) => {
        slide.classList.toggle('is-active', slideIndex === activeSlide);
    });
    [...dotsContainer.children].forEach((dot, dotIndex) => {
        dot.classList.toggle('is-active', dotIndex === activeSlide);
        dot.setAttribute('aria-current', dotIndex === activeSlide ? 'true' : 'false');
    });
}

function restartCarousel() {
    window.clearInterval(carouselTimer);
    carouselTimer = window.setInterval(() => showSlide(activeSlide + 1), 6500);
}

slides.forEach((_, index) => {
    const dot = document.createElement('button');
    dot.className = 'hero-dot';
    dot.type = 'button';
    dot.setAttribute('aria-label', `Show banner ${index + 1}`);
    dot.addEventListener('click', () => {
        showSlide(index);
        restartCarousel();
    });
    dotsContainer.append(dot);
});

document.querySelector('.hero-previous').addEventListener('click', () => {
    showSlide(activeSlide - 1);
    restartCarousel();
});
document.querySelector('.hero-next').addEventListener('click', () => {
    showSlide(activeSlide + 1);
    restartCarousel();
});
showSlide(0);
restartCarousel();

document.querySelector('.menu-toggle').addEventListener('click', (event) => {
    const button = event.currentTarget;
    const navigation = document.querySelector('.primary-nav');
    const isOpen = button.getAttribute('aria-expanded') === 'true';
    button.setAttribute('aria-expanded', String(!isOpen));
    button.setAttribute('aria-label', isOpen ? 'Open navigation' : 'Close navigation');
    navigation.classList.toggle('is-open', !isOpen);
});

document.querySelectorAll('.primary-nav a').forEach((link) => {
    link.addEventListener('click', () => {
        const menuButton = document.querySelector('.menu-toggle');
        menuButton.setAttribute('aria-expanded', 'false');
        menuButton.setAttribute('aria-label', 'Open navigation');
        document.querySelector('.primary-nav').classList.remove('is-open');
        document.querySelector('.nav-dropdown').classList.remove('is-open');
        document.querySelector('.nav-dropdown-trigger').setAttribute('aria-expanded', 'false');
    });
});

const umrahDropdown = document.querySelector('.nav-dropdown');
const umrahDropdownTrigger = document.querySelector('.nav-dropdown-trigger');

umrahDropdownTrigger.addEventListener('click', () => {
    if (!window.matchMedia('(max-width: 640px)').matches) return;

    const isOpen = umrahDropdown.classList.toggle('is-open');
    umrahDropdownTrigger.setAttribute('aria-expanded', String(isOpen));
});

umrahDropdown.addEventListener('mouseenter', () => {
    if (!window.matchMedia('(max-width: 640px)').matches) umrahDropdownTrigger.setAttribute('aria-expanded', 'true');
});
umrahDropdown.addEventListener('mouseleave', () => {
    if (!window.matchMedia('(max-width: 640px)').matches) {
        umrahDropdownTrigger.setAttribute('aria-expanded', String(umrahDropdown.contains(document.activeElement)));
    }
});
umrahDropdown.addEventListener('focusin', () => umrahDropdownTrigger.setAttribute('aria-expanded', 'true'));
umrahDropdown.addEventListener('focusout', (event) => {
    if (!umrahDropdown.contains(event.relatedTarget)) umrahDropdownTrigger.setAttribute('aria-expanded', 'false');
});

document.querySelector('.booking-form').addEventListener('submit', (event) => {
    event.preventDefault();
    document.querySelector('#packages').scrollIntoView({ behavior: 'smooth' });
});

document.querySelector('.newsletter-panel').addEventListener('submit', (event) => {
    event.preventDefault();
    const message = document.querySelector('.form-message');
    message.textContent = 'Thank you for subscribing. We will be in touch.';
    event.currentTarget.reset();
});
