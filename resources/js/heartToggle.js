document.addEventListener('DOMContentLoaded', function () {
    const hearts = document.querySelectorAll('.heart-toggle');

    hearts.forEach(heart => {
        heart.addEventListener('click', function () {
            heart.classList.toggle('fa-solid');
            heart.classList.toggle('fa-regular');
            heart.classList.toggle('text-red-500');
            heart.classList.toggle('text-[#1069A4]');
        });
    });
});