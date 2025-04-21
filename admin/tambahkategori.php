<?php include 'protect.php'; ?>
<h2>Tambah Kategori</h2>

<form role="form" method="POST">
    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" required>
    </div>
    <button class="btn btn-primary" name="submit">Simpan</button>
</form>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
if (isset($_POST['submit'])) {
    $query = $conn->query("INSERT INTO warung (id_warung, nama_warung, alamat_warung) VALUES (NULL, '$_POST[nama]', '$_POST[deskripsi]')");

    if ($query) {
        echo "
            <script>
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data Berhasil Disimpan',
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
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi Kesalahan Saat Menyimpan Data',
                    icon: 'error'
                });
            </script>
        ";
    }
}
?>
