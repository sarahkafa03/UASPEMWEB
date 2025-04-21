<?php
session_start();

include 'protect.php';
include 'koneksi.php';
if (!$_SESSION['keranjang']) {
    header("location: cart.php");
}
?>
 <?php
if (isset($_POST['submit'])) {
    $tanggal_pembelian = date('Y-m-d');
    $status_pembelian = 0;
    $total_pembelian = $_POST['total_pembelian'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_pengiriman = $_POST['id_pengiriman'];
    $ongkir = $_POST['ongkir'];
    $total_bayar = $_POST['total_bayar'];

    $conn->query("INSERT INTO pembelian VALUES('', '$tanggal_pembelian', $status_pembelian, $total_pembelian, $id_pelanggan, $id_pengiriman, $ongkir, $total_bayar)");

    $id_pembelian = $conn->insert_id;
    $id_metode = (int)$_POST['id_pembayaran'];
    $transfer_ke = $_POST['transfer_ke'];

    $namafoto = $_FILES['file']['name'];
    $lokasi = $_FILES['file']['tmp_name'];
    move_uploaded_file($lokasi, "bukti_pembayaran/" . $namafoto);

    $pengiriman = $conn->query("SELECT * FROM pembayaran WHERE id_pembayaran = $id_metode");
    $data = $pengiriman->fetch_assoc();

    if ($data["metode_pembayaran"] == "QRIS") {
        $transfer_ke = "QRIS";
    }

    // Cek apakah semua data penting tersedia
    if (!empty($id_pembelian) && !empty($id_metode) && $namafoto !== null) {
        // Insert data pembayaran
        $query = "INSERT INTO konfirmasi_pembayaran VALUES('', $id_pembelian, $id_metode, '$transfer_ke', '$namafoto')";

        // Optional: tampilkan query-nya untuk debug
        // echo $query;

        if (!$conn->query($query)) {
            die("Query error: " . $conn->error); // akan menampilkan pesan error SQL spesifik
        }
    } else {
        die("Data pembayaran tidak lengkap. Gagal insert konfirmasi_pembayaran.");
    }

    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $query = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $data = $query->fetch_assoc();

        $conn->query("INSERT INTO pembelian_produk VALUES('', $jumlah, $id_pembelian, {$data['id_produk']})");
    }


    unset($_SESSION['keranjang']);

    echo "<script>alert('Pembayaran berhasil dikonfirmasi!'); window.location='index.php';</script>";
    exit;
}
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

        .btn-green {
            background-color: #2E7D32;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-green:hover {
            background-color: #1B5E20;
        }

        .nama-produk {
            color: #2E7D32;
            /* hijau tua sesuai tema */
            font-weight: bold;
        }

        .display-pembayaran {
            display: none;
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

    <link rel="shortcut icon" href="logo.png">


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
                        <i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Keranjang Belanja</span>
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
                <div class="col-md-3">
                </div>

                <div class="col-md-13" id="customer-order">
                    <div class="box">
                        <h1>Detail Pembelian : </h1>

                        <p class="lead">Berikut rincian pembelian anda </p>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                                        <?php
                                        $query = $conn->query("SELECT * FROM produk 
                                            WHERE id_produk='$id_produk'");
                                        $data = $query->fetch_assoc();
                                        $subharga = $data['harga_produk'] * $jumlah;
                                        $total = $total + $subharga;
                                        $total_jumlah = count($_SESSION['keranjang']);
                                        $ongkir = 1000 * $total_jumlah;
                                        $bayar = $total + $ongkir;
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="detail_produk.php?id=<?php echo $data['id_produk']; ?>">
                                                    <img src="foto_produk/<?php echo $data['foto_produk']; ?>" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="foto_produk/<?php echo $data['foto_produk']; ?>" class="nama-produk">
                                                    <?php echo $data['nama_produk']; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $jumlah; ?></td>
                                            <td>Rp.<?php echo number_format($data['harga_produk']); ?></td>
                                            <td>Rp.<?php echo number_format($subharga); ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">Total Pembelian</th>
                                        <th>Rp.<?php echo number_format($total); ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">Ongkos Kirim</th>
                                        <th>Rp.<?php echo $ongkir; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right"><b>Total</b></th>
                                        <th><b>Rp.<?php echo number_format($bayar); ?></b></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row">
                        </div>
                        <?php
                        $query = $conn->query("SELECT * FROM pengiriman");
                        $query2 = $conn->query("SELECT * FROM pembayaran");

                        $pengirimans = [];
                        while ($row = $query->fetch_assoc()) {
                            $pengirimans[] = $row;
                        }

                        $pembayarans = [];
                        while ($row2 = $query2->fetch_assoc()) {
                            $pembayarans[] = $row2;
                        }
                        // var_dump($pengirimans)
                        ?>
                        <form method="POST" action="" id="form_checkout" enctype="multipart/form-data">
                            <input type="hidden" name="total_pembelian" value="<?= $total ?>">
                            <input type="hidden" name="id_pelanggan" value="<?= $_SESSION['login']['id_pelanggan'] ?>">
                            <input type="hidden" name="ongkir" value="<?= $ongkir ?>">
                            <input type="hidden" name="total_bayar" value="<?= $bayar ?>">
                            <div style="width: 50%;">
                                <select class="form-control" id="metode_pembayaran" name="id_pembayaran" style="margin-bottom: 10px;" required>
                                    <option value="" selected>Pilih Metode Pembayaran</option>
                                    <?php foreach ($pembayarans as $pembayaran): ?>
                                        <option value="<?= $pembayaran['id_pembayaran'] ?>"><?= $pembayaran['metode_pembayaran'] ?></option>
                                    <?php endforeach ?>
                                </select>

                                <div class="card display-pembayaran" id="transfer_bank" style="margin-bottom: 20px; margin-top: 20px;">
                                    <div class="card-body">
                                        <h3>Bank</h3>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">BCA : 1232435465 (a.n Dietify)</li>
                                            <li class="list-group-item">BRI : 1223344567 (a.n Dietify)</li>
                                        </ul>
                                    </div>
                                </div>
                                <select class="form-control" id="transfer_ke" name="transfer_ke" style="margin-bottom: 10px; display: none;">
                                    <option value="" selected>Transfer ke Bank</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BRI">BRI</option>
                                </select>
                                <div class="card display-pembayaran" id="qris" style="margin-bottom: 20px; margin-top: 20px;">
                                    <div class="card-body">
                                        <img src="foto_profil/qris_img.jpeg" onerror="this.src='foto_profil/qris_img.jpeg';" align="center" width="250">
                                    </div>
                                </div>

                                <div class="custom-file" style="margin-top: 20px; margin-bottom: 20px;">
                                    <p>Bukti Pembayaran</p>
                                    <input type="file" name="file" id="file" class="custom-file-input" accept="image/png, image/jpg, image/jpeg">
                                </div>
                                <select class="form-control" name="id_pengiriman" required>
                                    <option value="" selected>Pilih Pengiriman</option>
                                    <?php foreach ($pengirimans as $pengiriman): ?>
                                        <option value="<?= $pengiriman['id_pengiriman'] ?>"><?= $pengiriman['jenis_pengiriman'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <!-- <button class="btn btn-default"><i class="fa fa-refresh"></i> Update Cart</button> -->

                                    <button type="submit" name="submit" class="btn btn-green">
                                        Checkout <i class="fa fa-chevron-right"></i>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

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

    <script>
        const metode_pembayaran = document.getElementById("metode_pembayaran")
        const transfer_bank = document.getElementById("transfer_bank")
        const qris = document.getElementById("qris")
        const transfer_ke = document.getElementById("transfer_ke")
        console.log(metode_pembayaran);

        metode_pembayaran.addEventListener("click", (event) => {
            var value = metode_pembayaran.value;
            var text = metode_pembayaran.options[metode_pembayaran.selectedIndex].text;

            if (text == "Transfer Bank") {
                qris.classList.add("display-pembayaran");
                transfer_bank.classList.remove("display-pembayaran");
                transfer_ke.style.display = 'block'
            } else if (text == "QRIS") {
                qris.classList.remove("display-pembayaran");
                transfer_bank.classList.add("display-pembayaran");
                transfer_ke.style.display = 'none'
            }

        });

        document.getElementById("form_checkout").addEventListener("submit", function(e) {
            const fileInput = document.getElementById("file");
            const file = fileInput.files[0];

            if (!file) {
                alert("Silakan pilih file terlebih dahulu.");
                e.preventDefault(); // menghentikan submit
                return;
            }

            const allowedTypes = ["image/png", "image/jpg", "image/jpeg"];

            if (!allowedTypes.includes(file.type)) {
                alert("File yang dimasukkan bukan gambar (PNG, JPG, JPEG)!");
                e.preventDefault(); // menghentikan submit
                return;
            }
        });
    </script>


</body>

</html>