<?php include 'protect.php'; ?>
<h2 class="my-4 text-center">Data Produk</h2>

<a href="index.php?halaman=tambahproduk" class="btn btn-primary mb-3">Tambah Produk</a>

<div class="table-responsive mt-3">
    <table id="produkTable" class="table table-bordered table-hover table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            <?php $ambil=$conn->query("SELECT * FROM produk JOIN warung ON produk.id_warung=warung.id_warung"); ?>
            <?php while ($data=$ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_warung']; ?></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td>Rp.<?php echo number_format($data['harga_produk']); ?></td>
                    <td><?php echo $data['stok']; ?></td>
                    <td><img src="../foto_produk/<?php echo $data['foto_produk']; ?>" width="60" class="rounded"></td>
                    <td>
                       
                        <a href="index.php?halaman=ubahproduk&id=<?php echo $data['id_produk']; ?>" class="btn btn-sm btn-warning">Ubah</a>
						<a href="index.php?halaman=hapusproduk&id=<?php echo $data['id_produk']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>    
    </table>
</div>

<!-- Tambahkan Bootstrap 5 & DataTables -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#produkTable').DataTable({
            "pageLength": 10,  // Default 10 data per halaman
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "Semua"] ], // Opsi jumlah tampilan
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak ada data",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "search": "Cari:",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
