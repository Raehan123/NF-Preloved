document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');
    const uploadIcon = document.getElementById('uploadIcon');

    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;

                    // Jika sebelumnya disembunyikan
                    imagePreview.classList.remove('hidden');
                    
                    // Sembunyikan ikon upload jika ada
                    if (uploadIcon) {
                        uploadIcon.style.display = 'none';
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }
});
