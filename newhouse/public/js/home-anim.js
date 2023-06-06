const animateElements = document.querySelectorAll('.animate-element');

function animateOnScroll() {
    animateElements.forEach((element) => {
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (elementPosition < windowHeight * 0.8 && !element.classList.contains('show')) {
            element.classList.add('show');
        } else if (elementPosition > windowHeight * 0.8 && element.classList.contains('show')) {
            element.classList.remove('show');
        }
    });
}

// Wywołanie animateOnScroll() po załadowaniu strony
window.addEventListener('load', animateOnScroll);

// Nasłuchiwanie zdarzenia scroll
window.addEventListener('scroll', animateOnScroll);
