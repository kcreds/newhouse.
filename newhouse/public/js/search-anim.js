
document.addEventListener('livewire:load', function () {
    Livewire.hook('element.updated', (el, component) => {
        if (el.classList.contains('item')) {
            el.classList.add('active');
        }
    });
});
