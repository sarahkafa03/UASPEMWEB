<?php include 'protect.php'; ?>
<h2 class="my-4 text-center">Data Kategori</h2>
<a href="index.php?halaman=tambahkategori" class="btn btn-primary mt-3">Tambah Kategori</a>

<div class="table-responsive mt-3">
    <table id="kategoriTable" class="table table-bordered table-hover table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $ambil = $conn->query("SELECT * FROM warung"); 
            while ($data = $ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['id_warung']; ?></td>
                    <td><?php echo $data['nama_warung']; ?></td>
                    <td><?php echo $data['alamat_warung']; ?></td>
                    <td>
                        <a href="index.php?halaman=ubahkategori&id=<?php echo $data['id_warung']; ?>" class="btn btn-sm btn-warning">Ubah</a>
                        <button class="btn btn-sm btn-danger" onclick="hapusKategori(<?php echo $data['id_warung']; ?>)">Hapus</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>    
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function hapusKategori(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?halaman=hapuskategori&id=' + id;
            }
        });
    }
</script>

<!-- Tambahkan Bootstrap 5 & DataTables -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#kategoriTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "Semua"] ],
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
