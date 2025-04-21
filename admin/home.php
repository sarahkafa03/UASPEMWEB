<?php 
	include 'protect.php';
?>
<h2>Selamat Datang, <b><?php echo $_SESSION['admin']['nama_lengkap']; ?></b></h2>

<h2 class="my-4 text-center">Dashboard Penjualan</h2>

<?php
// Ambil data total penjualan
$totalPenjualan = $conn->query("SELECT SUM(total_pembelian) AS total FROM pembelian WHERE status_pembelian=1")->fetch_assoc()['total'];

// Ambil data jumlah transaksi
$jumlahTransaksi = $conn->query("SELECT COUNT(*) AS total FROM pembelian")->fetch_assoc()['total'];

// Ambil data pelanggan yang pernah melakukan transaksi
$jumlahPelanggan = $conn->query("SELECT COUNT(DISTINCT id_pelanggan) AS total FROM pembelian")->fetch_assoc()['total'];

// Ambil data penjualan bulanan
$penjualanBulanan = $conn->query("
    SELECT DATE_FORMAT(tanggal_pembelian, '%Y-%m') AS bulan, SUM(total_pembelian) AS total 
    FROM pembelian 
    WHERE status_pembelian=1
    GROUP BY bulan
    ORDER BY bulan ASC
");

$bulanArray = [];
$penjualanArray = [];
while ($row = $penjualanBulanan->fetch_assoc()) {
    $bulanArray[] = $row['bulan'];
    $penjualanArray[] = $row['total'];
}
?>

<!-- Ringkasan Penjualan -->
<div class="row text-center">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Penjualan</div>
            <div class="card-body">
                <h4 class="card-title">Rp. <?php echo number_format($totalPenjualan); ?></h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Jumlah Transaksi</div>
            <div class="card-body">
                <h4 class="card-title"><?php echo number_format($jumlahTransaksi); ?> Transaksi</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header">Jumlah Pelanggan</div>
            <div class="card-body">
                <h4 class="card-title"><?php echo number_format($jumlahPelanggan); ?> Pelanggan</h4>
            </div>
        </div>
    </div>
</div>

<!-- Grafik Penjualan -->
<div class="card mt-4">
    <div class="card-header bg-dark text-white">
        Grafik Penjualan Bulanan
    </div>
    <div class="card-body">
        <canvas id="chartPenjualan"></canvas>
    </div>
</div>

<!-- Tambahkan Bootstrap 5 & Chart.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('chartPenjualan').getContext('2d');
    var chartPenjualan = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($bulanArray); ?>,
            datasets: [{
                label: 'Penjualan (Rp)',
                data: <?php echo json_encode($penjualanArray); ?>,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
