const menuButton = document.querySelector('.menu-toggle');
const navigation = document.querySelector('.primary-nav');
const dropdown = document.querySelector('.nav-dropdown');
const dropdownButton = document.querySelector('.nav-dropdown-trigger');

menuButton.addEventListener('click', () => {
    const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
    menuButton.setAttribute('aria-expanded', String(!isOpen));
    menuButton.setAttribute('aria-label', isOpen ? 'Open navigation' : 'Close navigation');
    navigation.classList.toggle('is-open', !isOpen);
});

dropdownButton.addEventListener('click', () => {
    if (!window.matchMedia('(max-width: 640px)').matches) return;

    const isOpen = dropdown.classList.toggle('is-open');
    dropdownButton.setAttribute('aria-expanded', String(isOpen));
});

dropdown.addEventListener('mouseenter', () => {
    if (!window.matchMedia('(max-width: 640px)').matches) dropdownButton.setAttribute('aria-expanded', 'true');
});
dropdown.addEventListener('mouseleave', () => {
    if (!window.matchMedia('(max-width: 640px)').matches) {
        dropdownButton.setAttribute('aria-expanded', String(dropdown.contains(document.activeElement)));
    }
});
dropdown.addEventListener('focusin', () => dropdownButton.setAttribute('aria-expanded', 'true'));
dropdown.addEventListener('focusout', (event) => {
    if (!dropdown.contains(event.relatedTarget)) dropdownButton.setAttribute('aria-expanded', 'false');
});

navigation.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
        menuButton.setAttribute('aria-expanded', 'false');
        menuButton.setAttribute('aria-label', 'Open navigation');
        navigation.classList.remove('is-open');
        dropdown.classList.remove('is-open');
        dropdownButton.setAttribute('aria-expanded', 'false');
    });
});

const bookingForm = document.querySelector('.hajj-booking, .ziyarat-booking, .umrah-booking');

if (bookingForm) {
    bookingForm.addEventListener('submit', (event) => {
        event.preventDefault();
        document.querySelector('#hajj-packages, #ziyarat-packages, #umrah-packages').scrollIntoView({ behavior: 'smooth' });
    });
}
