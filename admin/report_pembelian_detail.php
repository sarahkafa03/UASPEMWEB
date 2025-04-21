<?php
// memanggil library FPDF
require __DIR__ . '/../library/fpdf.php';
include '../koneksi.php';
 
// Ambil data pelanggan (sesuai kebutuhan)
$query = $conn->query("SELECT * FROM pembelian JOIN pelanggan 
ON pembelian.id_pelanggan=pelanggan.id_pelanggan
WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $query->fetch_assoc();

// Membuat instance objek FPDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// **Bagian Detail Pelanggan**
$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(200, 10, 'DATA PEMBELIAN '.$detail['nama_pelanggan'], 0, 1, 'C'); 
$pdf->Ln(5); // Spasi

$pdf->SetFont('Times', '', 11);
$pdf->Cell(40, 6, 'Nama Pelanggan:', 0, 0);
$pdf->Cell(100, 6, $detail['nama_pelanggan'], 0, 1);
$pdf->Cell(40, 6, 'Email:', 0, 0);
$pdf->Cell(100, 6, $detail['email_pelanggan'], 0, 1);
$pdf->Cell(40, 6, 'No. Telepon:', 0, 0);
$pdf->Cell(100, 6, $detail['telepon_pelanggan'], 0, 1);
$pdf->Ln(5); // Spasi

// **Bagian Tabel**
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(50, 7, 'NAMA PRODUK', 1, 0, 'C');
$pdf->Cell(40, 7, 'HARGA PRODUK', 1, 0, 'C');
$pdf->Cell(30, 7, 'JUMLAH', 1, 0, 'C');
$pdf->Cell(40, 7, 'SUBTOTAL', 1, 1, 'C');

$pdf->SetFont('Times', '', 10);
$no = 1;
$data = $conn->query("SELECT * FROM pembelian_produk JOIN produk 
ON pembelian_produk.id_produk=produk.id_produk
WHERE pembelian_produk.id_pembelian='$_GET[id]'");
while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(50, 6, $d['nama_produk'], 1, 0);
    $pdf->Cell(40, 6, number_format($d['harga_produk']), 1, 0);
    $pdf->Cell(30, 6, $d['jumlah'], 1, 0);
    $pdf->Cell(40, 6, number_format($d['harga_produk'] * $d['jumlah']), 1, 1);
}

$pdf->Output();
