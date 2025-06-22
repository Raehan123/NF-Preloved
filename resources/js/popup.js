setTimeout(() => {
        const toast = document.getElementById('toast-success');
        if (toast) {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 500); // smooth hide
        }
    }, 3000); // 3 detik