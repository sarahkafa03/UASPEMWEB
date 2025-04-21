<?php
session_start();
error_reporting(0);
include 'koneksi.php';
include 'protect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">

    <title>
    Dietify : Eat Healthy
    </title>
    <style>
        /* Warna utama */
        :root {
            --primary-color: #2E7D32;
            --secondary-color: #66BB6A;
            --background-color: #F1F8E9;
            --text-color: #333;
        }

        /* Reset dasar */
        body {
            font-family: Arial, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }

        /* Header */
        .header {
            background-color: #1B5E20;
            color: white;
            padding: 10px;
            text-align: right;
        }

        .header a {
            color: white;
            text-decoration: none;
            margin-left: 10px;
        }

        /* Navbar */
        .navbar {
            background-color: #9CCE24 !important;
            border-bottom: 3px solid #2e7d32;
        }

        .navbar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navbar-nav li {
            display: inline-block;
        }

        .navbar-nav li a {
            color: white !important;
            font-weight: bold;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .navbar-nav li a:hover,
        .navbar-nav .active a {
            background-color: #1b5e20 !important;
            color: #c8e6c9 !important;
        }

        /* Tombol */
        .btn {
            display: inline-block;
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .btn-primary,
        .btn-cart {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover,
        .btn-cart:hover {
            background-color: var(--secondary-color);
        }

        .btn-cart {
            display: flex;
            align-items: center;
            font-weight: bold;
        }


        .btn-checkout:hover {
            background-color: #1B5E20;
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        /* Produk */
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .product-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            width: 270px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .product-card img {
            width: 100%;
            border-radius: 8px;
        }

        .product-title {
            font-weight: bold;
            margin-top: 12px;
            font-size: 18px;
        }

        .product-stock {
            font-size: 14px;
            color: #666;
        }

        .product-price {
            font-size: 20px;
            color: var(--primary-color);
            font-weight: bold;
            margin-top: 5px;
        }

        /* Keranjang Belanja */
        #basket-overview a {
            background-color: #2e7d32 !important;
            border-color: #1b5e20 !important;
            color: white !important;
            font-weight: bold;
            padding: 10px 15px;
            transition: 0.3s ease-in-out;
            border-radius: 5px;
        }

        #basket-overview a:hover {
            background-color: #1b5e20 !important;
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background-color: #1B5E20;
            color: white;
            margin-top: 30px;
            font-size: 14px;
        }

        /* Tambahan efek hover pada tombol */
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-checkout {
            background-color: #2E7D32 !important;
            color: white !important;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 18px;
            transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
            display: block;
            text-align: center;
            margin-top: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .btn-checkout:hover {
            background-color: #1B5E20 !important;
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
    </style>


    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="asset/css/font-awesome.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/animate.min.css" rel="stylesheet">
    <link href="asset/css/owl.carousel.css" rel="stylesheet">
    <link href="asset/css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="asset/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="asset/css/custom.css" rel="stylesheet">

    <script src="asset/js/respond.min.js"></script>

    <link rel="shortcut icon" href="logo.jpg">

    <style>
        #content {
    margin-bottom: 60px; /* harus sedikit lebih tinggi dari tinggi copyright */
}


        #copyright {
            position: fixed;
            /*padding: 10px 0;*/
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #ccc;
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 991px) {
            #content {
                margin-bottom: 54px;
            }

            #copyright p {
                margin-bottom: 0px;
            }
        }
        
/* Warna dasar dan border table */
.table {
    background-color: #ffffff;
    border-collapse: collapse;
    border: 1px solid #dee2e6;
}

/* Header tabel */
.table thead th {
    background-color: #2e7d32 ; /* Hijau tua */
    color: white;
    text-align: center;
    padding: 12px;
    font-size: 16px;
}

/* Isi tabel */
.table tbody td {
    padding: 12px;
    vertical-align: middle;
    border-top: 1px solid #dee2e6;
    background-color: #f9f9f9;
}

/* Hover row */
.table tbody tr:hover {
    background-color: #e6f4ea; /* Hijau muda lembut */
}

/* Produk list dalam td */
.table ul {
    padding-left: 15px;
}

.status-hijau {
    color: #198754; /* Bootstrap green */
    font-weight: bold;
}

.status-kuning {
    color: #ffc107; /* Bootstrap yellow */
    font-weight: bold;
}

.status-merah {
    color: #dc3545; /* Bootstrap red */
    font-weight: bold;
}

.no-col {
    color: #198754; /* Hijau Bootstrap */
    font-weight: bold;
    text-align: center;
}

    </style>

</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="profile.php">Welcome, <?php echo $_SESSION['login']['nama_pelanggan']; ?></a>
                    </li>
                    <li><a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="UAS.png" class="hidden-xs">
                    <img src="UAS.png" class="visible-xs"><span class="sr-only">E-Del - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="cart.php">
                        <i class="fa fa-shopping-cart"></i> <span class="hidden-xs"> Keranjang Belanja </span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li> <a href="all-menu.php">Menu</a>
                    </li>
                    <li> <a href="kategori.php">Kategori</a>
                    </li>
                    <li> <a href="contact.php">Contact Us</a>
                    </li>
                    <li> <a href="pesanan_saya.php">Pesanan Saya</a>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">
                <?php
                error_reporting(0);
                if (!$_SESSION['keranjang']) {
                ?>
                    <div class="navbar-collapse collapse right" id="basket-overview">
                        <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja</span></a>
                    </div>
                <?php
                } else {
                    $item = count($_SESSION['keranjang']);
                ?>
                    <div class="navbar-collapse collapse right" id="basket-overview">
                        <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja (<?php echo $item; ?>)</span></a>
                    </div>
                <?php
                }
                ?>
            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-13" id="basket">
                    <div class="box">
                        <h1>Pesanan Saya</h1>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Pengiriman</th>
                                        <th>Total Pembelian</th>
                                        <th>Total Pembayaran</th>
                                        <th>Status Pembelian</th>
                                        <th>Produk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id_pelanggan = $_SESSION['login']['id_pelanggan'];
                                    $pembelians = $conn->query("SELECT * FROM pembelian 
                                        JOIN pengiriman ON pembelian.id_pengiriman = pengiriman.id_pengiriman 
                                        JOIN pembelian_produk ON pembelian.id_pembelian = pembelian_produk.id_pembelian 
                                        JOIN produk ON pembelian_produk.id_produk = produk.id_produk 
                                        WHERE pembelian.id_pelanggan = $id_pelanggan
                                        ORDER BY pembelian.id_pembelian DESC");
                                    

                                    // Kelompokkan berdasarkan id_pembelian
                                    $grouped = [];
                                    while ($row = $pembelians->fetch_assoc()) {
                                        $id = $row['id_pembelian'];
                                        if (!isset($grouped[$id])) {
                                            $grouped[$id] = [
                                                'tanggal' => $row['tanggal_pembelian'],
                                                'pengiriman' => $row['jenis_pengiriman'],
                                                'total_pembelian' => $row['total_pembelian'],
                                                'total_bayar' => $row['total_bayar'],
                                                'status' => $row['status_pembelian'],
                                                'produk' => []
                                            ];
                                        }
                                        $grouped[$id]['produk'][] = [
                                            'nama' => $row['nama_produk'],
                                            'jumlah' => $row['jumlah']
                                        ];
                                    }

                                    $i = 1;
                                    foreach ($grouped as $id_pembelian => $data):
                                    ?>
                                        <tr>
                                        <td class="no-col"><?= $i++ ?></td>

                                            <td><?= $data['tanggal'] ?></td>
                                            <td><?= $data['pengiriman'] ?></td>
                                            <td>Rp. <?= number_format($data['total_pembelian']) ?></td>
                                            <td>Rp. <?= number_format($data['total_bayar']) ?></td>
                                            
    
    <td class="
<?php
    if ($data['status'] == 0) {
        echo 'status-kuning';
    } else if ($data['status'] == 1) {
        echo 'status-hijau';
    } else if ($data['status'] == 2) {
        echo 'status-merah';
    }
?>">
    <?php
        if ($data['status'] == 0) {
            echo 'Menunggu Konfirmasi';
        } else if ($data['status'] == 1) {
            echo 'Disetujui';
        } else if ($data['status'] == 2) {
            echo 'Dibatalkan';
        }
    ?>
</td>
                                       <td>
                                                <ul style="margin-bottom: 0;">
                                                    <?php foreach ($data['produk'] as $p): ?>
                                                        <li><?= $p['nama'] ?> (<?= $p['jumlah'] ?> pcs)</li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">©DIETIFY</p>
                </div>
                <div class="col-md-6">
                    <p class="pull-right">UAS PEMWEB by PTI D
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->




    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="asset/js/jquery-1.11.0.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery.cookie.js"></script>
    <script src="asset/js/waypoints.min.js"></script>
    <script src="asset/js/modernizr.js"></script>
    <script src="asset/js/bootstrap-hover-dropdown.js"></script>
    <script src="asset/js/owl.carousel.min.js"></script>
    <script src="asset/js/front.js"></script>



</body>

</html>