<?php include 'protect.php';

// var_dump($_POST);
if (isset($_POST['konfirmasi'])) {
    $id_pembelian = $_POST['id_pembelian'];
    $conn->query("UPDATE pembelian SET status_pembelian = 1 WHERE id_pembelian='$id_pembelian'");
} else if (isset($_POST["batal"])) {
    $id_pembelian = $_POST['id_pembelian'];
    $conn->query("UPDATE pembelian SET status_pembelian = 2 WHERE id_pembelian='$id_pembelian'");
}

?>

<!-- Tambahkan Bootstrap 5 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="container mt-5">
    <h2 class="text-center mb-4">Detail Pembelian</h2>
    <a href="report_pembelian_detail.php?id=<?= $_GET['id'] ?>" target="_blank" class="btn btn-sm btn-primary mb-3"><i class="fas fa-download me-2"></i> Cetak Detail</a>
    <?php
    $query = $conn->query("SELECT * FROM pembelian JOIN pelanggan 
        ON pembelian.id_pelanggan=pelanggan.id_pelanggan
        JOIN konfirmasi_pembayaran ON pembelian.id_pembelian=konfirmasi_pembayaran.id_pembelian
        WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $query->fetch_assoc();
    // echo '<pre>';
    // var_dump($detail);
    // echo '</pre>';

    ?>

    <!-- Informasi Pelanggan -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Informasi Pelanggan</h5>
                    <p class="mb-1"><strong><?php echo $detail['nama_pelanggan']; ?></strong></p>
                    <p class="mb-1">📞 <?php echo $detail['telepon_pelanggan']; ?></p>
                    <p>📧 <?php echo $detail['email_pelanggan']; ?></p>
                </div>
            </div>
        </div>

        <!-- Informasi Pembelian -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title">Detail Pembelian</h5>
                    <p class="mb-1">🗓 Tanggal: <strong><?php echo $detail['tanggal_pembelian']; ?></strong></p>
                    <p>💰 Total: <strong>Rp. <?php echo number_format($detail['total_pembelian']); ?></strong></p>
                    <p>🗹 Status: <strong>
                            <?php if ($detail['status_pembelian'] == 0) {
                                echo 'Menunggu Konfirmasi';
                            } else if ($detail['status_pembelian'] == 1) {
                                echo 'Disetujui';
                            } else if ($detail['status_pembelian'] == 2) {
                                echo 'Dibatalkan';
                            }
                            ?>
                        </strong></p>
                    <h5 class="card-title mt-3">Bukti Pembayaran</h5>
                    <img src="../bukti_pembayaran/<?= $detail['bukti_pembayaran'] ?>" alt="" width="500">
                    <?php if ($detail['status_pembelian'] == 0) { ?>
                        <form action="" method="post" class="mt-4">
                            <input type="hidden" name="id_pembelian" value="<?= $detail['id_pembelian'] ?>">
                            <button type="submit" name="konfirmasi" class="btn btn-success">Konfirmasi</button>
                            <button type="submit" name="batal" class="btn btn-danger">Dibatalkan</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Produk yang Dibeli -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = $conn->query("SELECT * FROM pembelian_produk JOIN produk 
                    ON pembelian_produk.id_produk=produk.id_produk
                    WHERE pembelian_produk.id_pembelian='$_GET[id]'");
                while ($data = $query->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_produk']; ?></td>
                        <td>Rp. <?php echo number_format($data['harga_produk']); ?></td>
                        <td><?php echo $data['jumlah']; ?></td>
                        <td><strong>Rp. <?php echo number_format($data['harga_produk'] * $data['jumlah']); ?></strong></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-4">
        <a href="index.php?halaman=pembelian" class="btn btn-secondary">Kembali</a>
    </div>
</div>