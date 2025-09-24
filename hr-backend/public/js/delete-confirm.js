document.addEventListener('DOMContentLoaded', function () {
    const confirmDeleteModal = document.getElementById('confirmdelete');
    if (confirmDeleteModal) {
        confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const catename = button.getAttribute('data-info');
            const action = button.getAttribute('data-action');

            const form = document.getElementById('delete-form');
            const nameHolder = document.getElementById('modal-catename');

            form.setAttribute('action', action);
            nameHolder.textContent = catename;
        });
    }
});
