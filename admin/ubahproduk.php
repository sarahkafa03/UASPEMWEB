<?php include 'protect.php'; ?>
<h2>Ubah Produk</h2>

<?php 
$query = $conn->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$data = $query->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $data['nama_produk']; ?>" required>
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $data['harga_produk']; ?>" required>
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok" value="<?php echo $data['stok']; ?>" required>
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="5" required><?php echo trim($data['deskripsi_produk']); ?></textarea>
	</div>
	<div class="form-group">
		<label>Foto Produk</label><br>
		<img src="../foto_produk/<?php echo $data['foto_produk']; ?>" width="100">
	</div>
	<div class="form-group">
		<label>Ubah Foto Produk</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-primary" name="submit">Ubah</button>
</form>

<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
if (isset($_POST['submit'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	$namaproduk = $_POST['nama'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$deskripsi = $_POST['deskripsi'];

	if (!empty($lokasifoto)) {
		// Hapus foto lama
		$fotolama = $data['foto_produk'];
		if (file_exists("../foto_produk/$fotolama")) {
			unlink("../foto_produk/$fotolama");
		}
		
		// Upload foto baru
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$query = $conn->query("UPDATE produk SET nama_produk='$namaproduk', harga_produk='$harga', stok='$stok', foto_produk='$namafoto', deskripsi_produk='$deskripsi' WHERE id_produk='$_GET[id]'");
	} else {
		$query = $conn->query("UPDATE produk SET nama_produk='$namaproduk', harga_produk='$harga', stok='$stok', deskripsi_produk='$deskripsi' WHERE id_produk='$_GET[id]'");
	}

	if ($query) {
		echo "
			<script>
				Swal.fire({
					title: 'Sukses!',
					text: 'Data produk berhasil diubah!',
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
			<script>
				Swal.fire({
					title: 'Gagal!',
					text: 'Terjadi kesalahan saat mengupdate produk!',
					icon: 'error',
					confirmButtonText: 'OK'
				});
			</script>
		";
	}
}
?>
