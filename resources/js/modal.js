// modal.js
document.addEventListener('DOMContentLoaded', function () {
    // Selecciona los elementos
    const modal = document.getElementById('popup-modal');
    const openModalButton = document.querySelector('[data-modal-target="popup-modal"]');
    const closeModalButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');

    // Función para abrir el modal
    function openModal() {
        modal.classList.remove('hidden');
    }

    // Función para cerrar el modal
    function closeModal() {
        modal.classList.add('hidden');
    }

    // Evento para abrir el modal cuando se hace clic en el botón
    openModalButton.addEventListener('click', openModal);

    // Evento para cerrar el modal cuando se hace clic en el botón de cerrar
    closeModalButtons.forEach(button => {
        button.addEventListener('click', closeModal);
    });

    // También puedes cerrar el modal haciendo clic fuera de él
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});
