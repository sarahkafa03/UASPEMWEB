<?php
session_start();
include '../koneksi.php';
include 'protect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dietify : Eat Healthy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href="../logo.jpg">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100vh;
            overflow: hidden;
            /* Mencegah scroll di seluruh halaman */
            background-color: #f8f9fa;
        }

        .wrapper {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 200px;
            background: #388e3c;
            color: white;
            padding-top: 15px;
            padding-left: 10px;
            padding-right: 10px;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 8px;
            display: block;
            font-size: 14px;
        }

        .sidebar a:hover {
            background: rgba(155, 206, 36, 0.52);
            border-radius: 5px;
        }

        .content {
            flex-grow: 1;
            padding: 15px;
            display: flex;
            flex-direction: column;
            height: 100vh;
            /* Pastikan tinggi penuh */
        }

        .content .container-fluid {
            flex-grow: 1;
            overflow-y: auto;
            padding-bottom: 100px;
        }

        .navbar-custom {
            background-color: #9CCE24;
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
            color: white;
        }

        .navbar-custom .navbar-toggler {
            border: none;
        }

        .navbar-custom .btn-logout {
            background-color: #dc3545;
            /* Warna merah */
            border: none;
            transition: 0.3s;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">dietify Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex">
                <a href="index.php?halaman=logout" class="btn btn-danger btn-sm btn-logout">Logout</a>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="sidebar">
            <div class="text-center mb-3">
                <img src="logo.png" class="img-fluid rounded-circle" width="80">
            </div>
            <a href="index.php"><i class="fas fa-home me-2"></i> Home</a>
            <a href="index.php?halaman=kategori"><i class="fas fa-store me-2"></i> Kategori</a>
            <a href="index.php?halaman=produk"><i class="fas fa-box me-2"></i> Produk</a>
            <a href="index.php?halaman=pembelian"><i class="fas fa-shopping-cart me-2"></i> Pembelian</a>
            <a href="index.php?halaman=pelanggan"><i class="fas fa-users me-2"></i> Pelanggan</a>
        </div>

        <div class="content">
            <div class="container-fluid">
                <?php
                if (isset($_GET['halaman'])) {
                    $page = $_GET['halaman'] . ".php";
                    if (file_exists($page)) {
                        include $page;
                    } else {
                        echo "<div class='alert alert-danger'>Halaman tidak ditemukan</div>";
                    }
                } else {
                    include 'home.php';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</body>

</html>