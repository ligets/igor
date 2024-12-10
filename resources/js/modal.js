document.addEventListener('DOMContentLoaded', () => {
    const openCartModal = document.getElementById('openCartModal');
    const closeCartModal = document.getElementById('closeCartModal');
    const cartModal = document.getElementById('cartModal');

    openCartModal.addEventListener('click', () => {
        cartModal.classList.remove('hidden');
    });

    closeCartModal.addEventListener('click', () => {
        cartModal.classList.add('hidden');
    });

    // Закрытие модального окна при клике вне его
    cartModal.addEventListener('click', (e) => {
        if (e.target === cartModal) {
            cartModal.classList.add('hidden');
        }
    });
});
