<?php
session_start();
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

        .btn-primary,
        .btn-cart,
        .navbar-btn {
            background-color: var(--primary-color) !important;
            color: white !important;
        }

        .btn-primary:hover,
        .btn-cart:hover,
        .navbar-btn:hover {
            background-color: var(--secondary-color) !important;
        }

        .btn-cart {
            display: flex;
            align-items: center;
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
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 15px;
            width: 250px;
            text-align: center;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            width: 100%;
            border-radius: 5px;
        }

        .product-title {
            font-weight: bold;
            margin-top: 10px;
        }

        .product-stock {
            font-size: 14px;
            color: #666;
        }

        .product-price {
            font-size: 18px;
            color: var(--primary-color);
            font-weight: bold;
        }

        /* Keranjang Belanja */
        #basket-overview a {
            background-color: #2e7d32 !important;
            border-color: #1b5e20 !important;
            color: white !important;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }

        #basket-overview a:hover {
            background-color: #1b5e20 !important;
        }

        a[href^="mailto:"] {
            color: green !important;
            /* Paksa warna hijau */
            text-decoration: none;
            /* Hilangkan garis bawah jika diinginkan */
        }

        a[href^="mailto:"]:hover {
            color: darkgreen !important;
            /* Warna lebih gelap saat hover */
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
        #content{
            margin-bottom: 54px;
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
            #content{
                margin-bottom: 54px;
            }
            #copyright p {
                margin-bottom: 0px;
            }
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
                    <li>
                        <?php if (isset($_SESSION['login'])): ?>
                            <a href="profile.php">Welcome, <?php echo $_SESSION['login']['nama_pelanggan']; ?></a>
                        <?php else: ?>
                            <a href="login.php">Silakan Login</a>
                        <?php endif; ?>
                    </li>
                    <?php if (isset($_SESSION['login'])): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php endif; ?>
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
                    <li class="active"> <a href="contact.php">Contact Us</a>
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

                <div class="col-md-13">
                    <div class="box" id="contact">
                        <h1>Hubungi Kami</h1>

                        <p class="lead">Untuk keluhan dan saran silahkan hubungi kami melalui kontak berikut :</p>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> Alamat</h3>
                                <p>Universitas Negeri Surabaya
                                    <br>Ketintang
                                    <br>Wonokromo
                                    <br>Surabaya
                                    <br>
                                    <strong>Jawa Timur</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> Call center</h3>
                                <p class="text-muted">Untuk fast respon silahkan hubungi nomer berikut. </p>
                                <p><strong>+0812223334</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i> Email</h3>
                                <p class="text-muted">Gunakan email untuk memberikan saran dan keluhan.</p>
                                <ul>
                                    <li><strong><a href="mailto:">DIETIFY@gmail.com</a></strong>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->

                        <hr>



                    </div>
                    <!-- /.col-md-9 -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /#content -->

            <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
            <div id="copyright">
                <div class="container">
                    <div class="col-md-6">
                        <p class="pull-left">©DIETIFY </p>
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