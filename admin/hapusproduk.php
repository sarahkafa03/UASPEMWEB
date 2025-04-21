<?php
include 'protect.php';

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    $query = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $data = $query->fetch_assoc();

    if ($data) {
        $fotoproduk = $data['foto_produk'];

    
        if (file_exists("../foto_produk/$fotoproduk")) {
            unlink("../foto_produk/$fotoproduk");
        }

      
        $conn->query("DELETE FROM pembelian_produk WHERE id_produk='$id_produk'");

        $hapus = $conn->query("DELETE FROM produk WHERE id_produk='$id_produk'");

        if ($hapus) {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Produk berhasil dihapus!',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location = 'index.php?halaman=produk';
                    });
                </script>
            ";
        } else {
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Produk tidak dapat dihapus karena memiliki relasi di tabel lain.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                </script>
            ";
        }
    }
}
?>
