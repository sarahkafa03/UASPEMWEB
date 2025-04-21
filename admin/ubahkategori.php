<?php include 'protect.php'; ?>
<h2>Ubah Kategori</h2>
<?php 
    $query = $conn->query("SELECT * FROM warung WHERE id_warung='$_GET[id]'");
    $data = $query->fetch_assoc();
?>
<form role="form" method="POST">
    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_warung']; ?>" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" value="<?php echo $data['alamat_warung']; ?>" required>
    </div>
    <button class="btn btn-primary" name="submit">Ubah</button>
</form>

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
    if (isset($_POST['submit'])) {
        $query = $conn->query("UPDATE warung SET nama_warung='$_POST[nama]', alamat_warung='$_POST[deskripsi]' WHERE id_warung='$_GET[id]'");

        if ($query) {
            echo "
                <script>
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Data Berhasil Diubah',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location = 'index.php?halaman=kategori';
                    });
                </script>
            ";
        }
    }
?>
