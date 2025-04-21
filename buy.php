<?php 
session_start();

// Cek apakah user sudah login atau belum
if (!isset($_SESSION['login'])) {
    echo "<script>alert('Silakan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

$id_produk = $_GET['id'];

// Tambahkan produk ke dalam keranjang
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
} else {
    $_SESSION['keranjang'][$id_produk] = 1;
}

echo "<script>alert('Berhasil Memasukkan ke Cart');</script>";
echo "<script>location='cart.php';</script>";
?>
