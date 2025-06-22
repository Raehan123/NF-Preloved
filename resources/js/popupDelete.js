document.querySelectorAll(".delete-btn").forEach((button) => {
    button.addEventListener("click", function () {
        const form = this.closest("form");

        Swal.fire({
            title: "<strong>NF Preloved</strong>",
            html: "Apakah Kamu Yakin Ingin Menghapus Produk?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: '<i class="fa fa-trash"></i> Hapus',
            cancelButtonText: "Batal",
            customClass: {
                popup: "rounded-xl shadow-lg",
                title: "bg-red-700 text-white rounded-full py-2 px-6 mb-4",
                htmlContainer: "text-red-700",
                actions: "gap-4", 
                confirmButton:
                    "bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800",
                cancelButton:
                    "bg-[#103f65] text-white px-4 py-2 rounded hover:bg-blue-900",
            },
            buttonsStyling: false,
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
