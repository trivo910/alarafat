const packageBookingForm = document.querySelector('[data-package-booking]');

if (packageBookingForm) {
    const dateInput = packageBookingForm.querySelector('input[name="date"]');
    const today = new Date();
    const localToday = new Date(today.getTime() - today.getTimezoneOffset() * 60000)
        .toISOString()
        .slice(0, 10);

    dateInput.min = localToday;

    packageBookingForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const formData = new FormData(packageBookingForm);
        const message = [
            `Booking inquiry: ${packageBookingForm.dataset.packageTitle}`,
            `Date: ${formData.get('date')}`,
            `Adults: ${formData.get('adults')}`,
            `Children: ${formData.get('children')}`,
            `Infants: ${formData.get('infants')}`,
            `Guest: ${formData.get('guest')}`,
        ].join('\n');

        window.location.href = `https://wa.me/919867851046?text=${encodeURIComponent(message)}`;
    });
}