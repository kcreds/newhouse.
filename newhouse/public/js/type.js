const textElement = document.getElementById('typed-text');
const text = 'newhouse.';
let index = 0;

function animateTyping() {
  textElement.textContent += text[index];
  index++;

  if (index < text.length) {
    setTimeout(animateTyping, 80); // Czas opóźnienia między literami
  }
}

// Wywołanie funkcji animateTyping po załadowaniu strony
window.addEventListener('load', animateTyping);
