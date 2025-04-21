<?php
include 'protect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conn->query("SELECT * FROM warung WHERE id_warung='$id'");
    $data = $query->fetch_assoc();

    $hapus = $conn->query("DELETE FROM warung WHERE id_warung='$id'");
    if ($hapus) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Kategori berhasil dihapus!',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location = 'index.php?halaman=kategori';
                });
            </script>
        ";
    } else {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat menghapus kategori.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>
        ";
    }
}
?>
