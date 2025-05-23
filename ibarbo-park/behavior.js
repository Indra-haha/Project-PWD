document.querySelectorAll('.detail-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        // Ambil ID target dari atribut data-target
        const targetId = this.getAttribute('data-target');
        const targetDiv = document.getElementById(targetId);

        // Ubah visibilitas berdasarkan status checkbox
        if (this.checked) {
            targetDiv.classList.remove('d-none');
            targetDiv.classList.add('visible');
            targetDiv.classList.remove('position-absolute');
            targetDiv.classList.add('position-relative');
        } else {
            targetDiv.classList.remove('visible');
            targetDiv.classList.add('d-none');
            targetDiv.classList.remove('position-relative');
            targetDiv.classList.add('position-absolute');
        }
    });
});