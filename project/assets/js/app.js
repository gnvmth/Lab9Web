// Konfirmasi sebelum submit form yang punya atribut data-confirm
document.querySelectorAll('form[data-confirm]').forEach(function (form) {
    form.addEventListener('submit', function (ev) {
        if (!confirm(form.dataset.confirm)) {
            ev.preventDefault();
        }
    });
});
