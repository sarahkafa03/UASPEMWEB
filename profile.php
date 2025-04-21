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

.navbar-nav li a:hover, .navbar-nav .active a {
    background-color: #1b5e20 !important;
    color: #c8e6c9 !important;
}

/* Tombol */
.btn {
    display: inline-block;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

.btn-primary, .btn-cart {
    background-color: var(--primary-color);
    color: white;
}

.btn-primary:hover, .btn-cart:hover {
    background-color: var(--secondary-color);
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

/* Footer */
footer {
    text-align: center;
    padding: 10px;
    background-color: #1B5E20;
    color: white;
    margin-top: 20px;
}
.col-md-12 {
    color: green;
}
.col-md-12 h2 {
    color: green !important;
}
a[href="warung.php"] {
    color: green;
    text-decoration: none; /* Opsional: Menghilangkan garis bawah */
}

a[href="warung.php"]:hover {
    color: darkgreen; /* Warna lebih gelap saat hover */
}

</style>
<?php
session_start();
include 'protect.php';
include 'koneksi.php';
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
                            <li><a>Welcome, <?php echo $_SESSION['login']['nama_pelanggan']; ?></a>
                            </li>
                            <li><a href="logout.php">Logout</a></li>
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
                            <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">Keranjang Belanja</span>
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
                <?php
                error_reporting(0);                     
                    if (!$_SESSION['keranjang']) {
                    ?>
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja</span></a>
                        </div>
                    <?php        
                    }
                    else{
                    $item = count($_SESSION['keranjang']);
                    ?>
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja (<?php echo $item;?>)</span></a>
                        </div>
                    <?php
                    }
                ?>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#navbar -->
        <!-- *** NAVBAR END *** -->
        <div id="all"> <!-- wrap -->
            <div id="content"><!-- main -->
                <div class="container">
                    <div class="col-md-3">
                        <div class="panel panel-default sidebar-menu">
                            <?php
                            $id_pelanggan=$_SESSION['login']['id_pelanggan'];
                            $query = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan ='$id_pelanggan'");
                            $data = $query -> fetch_assoc();
                            ?>
                            <div class="panel-heading" style="padding: 15px;">
                                <center><h3 class="panel-title"><i class="fa fa-user"></i> Profile User</h3></center>
                            </div>
                            <div class="panel-body" align="center" style="min-height: 345px; max-height: 345px;">
                                <img src="foto_profil/<?php echo $data['foto_profil'];?>" onerror="this.src='foto_profil/default.png';" align="center" class="img-circle" width="100%" style="min-height: 235px; max-height: 235px;">
                                <p style="font-size: 20px";><br><i><b><?php echo $data['nama_pelanggan']; ?></b></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="padding: 21px;">
                                <center><h3 class="panel-title">Data User</h3></center>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table tab-content">
                                        <thead>
                                            <tr>
                                                <td style="padding: 20px"><b>Nama</b></td>
                                                <td style="padding: 20px"><?php echo $data['nama_pelanggan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 20px"><b>Email</b></td>
                                                <td style="padding: 20px"><?php echo $data['email_pelanggan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 20px"><b>No Telpon</b></td>
                                                <td style="padding: 20px"><?php echo $data['telepon_pelanggan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 18px"><b>Alamat</b></td>
                                                <td style="padding: 18px"><?php echo $data['alamat_pelanggan']; ?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalLong">Edit Profile</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Your Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_pelanggan']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" value="<?php echo $data['email_pelanggan']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No Telepon</label>
                                                        <input type="tel" class="form-control" name="telepon" value="<?php echo $data['telepon_pelanggan']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat_pelanggan']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <!-- <label>Foto Profil &nbsp</label> -->
                                                        <img src="foto_profil/<?php echo $data['foto_profil'];?>" onerror="this.src='foto_profil/default.png';" width="100">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ubah Foto Profil</label>
                                                        <input type="file" name="foto" class="form-control">
                                                    </div>
                                                    <button class="btn btn-warning" name="ubah">Ubah</button>
                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                </form>   
                                                <?php 
                                                if (isset($_POST['ubah'])) {
                                                    $namafoto=$_FILES['foto']['name'];
                                                    $imgtype = explode('.', $namafoto);
                                                    $ext_foto = strtolower(end($imgtype));
                                                    $file_size = $_FILES['foto']['size']; 
                                                    $lokasifoto = $_FILES['foto']['tmp_name'];
                                                    if (!empty($lokasifoto)) {
                                                        if ($ext_foto == "jpg" || $ext_foto == "jpeg" || $ext_foto == "png") {
                                                            if($_FILES['foto']['size'] < 5000000){
                                                                $name_fix = $id_pelanggan.".".$ext_foto;
                                                                unlink("foto_profil/$name_fix");
                                                                move_uploaded_file($lokasifoto, "foto_profil/$namafoto");
                                                                $nama_folder= "foto_profil/";
                                                                $lampiran= $nama_folder . basename($namafoto);
                                                                rename($lampiran, $nama_folder.$id_pelanggan.".".$ext_foto);

                                                                $result1 = $conn->query("UPDATE pelanggan SET email_pelanggan='$_POST[email]',nama_pelanggan='$_POST[nama]',telepon_pelanggan='$_POST[telepon]',alamat_pelanggan='$_POST[alamat]',foto_profil='$name_fix' WHERE id_pelanggan='$id_pelanggan'");
                                                                if ($result1 == true) {
                                                                    echo "<script>alert('Ubah Profil Berhasil');</script>";
                                                                    echo "<script>location='profile.php';</script>";   
                                                                }else{
                                                                    echo "<script>alert('Ubah Profil Gagal');</script>";
                                                                    echo "<script>location='profile.php';</script>";
                                                                } 
                                                            }else{
                                                                echo "<script>alert('Ukuran foto terlalu besar');</script>";
                                                            }     
                                                        }else{
                                                            echo "<script>alert('Masukkan tipe file foto');</script>";
                                                        }
                                                    }else{
                                                        $result2 = $conn->query("UPDATE pelanggan SET email_pelanggan='$_POST[email]',nama_pelanggan='$_POST[nama]',telepon_pelanggan='$_POST[telepon]',alamat_pelanggan='$_POST[alamat]' WHERE id_pelanggan='$id_pelanggan'");
                                                        if ($result2 == true) {
                                                            echo "<script>alert('Ubah Profil Berhasil');</script>";
                                                            echo "<script>location='profile.php';</script>";                                
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#changepassword">Change Password</button>
                                <!-- Modal -->
                                <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Insert New Password</label>
                                                        <input type="password" class="form-control" name="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Insert New Password Again</label>
                                                        <input type="password" class="form-control" name="password1">
                                                    </div>
                                                    <button class="btn btn-danger" name="change">Change</button>
                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                </form>
                    <!-- <pre>
                        <?php print_r($data); ?>
                    </pre> -->   
                    <?php 
                    if (isset($_POST['change'])) {
                        $password = mysqli_escape_string($conn,$_POST['password']);
                        $password1 = mysqli_escape_string($conn,$_POST['password1']);
                        if ($password == $password1) {
                            $password = md5($password);
                            $result_change = $conn->query("UPDATE pelanggan SET password_pelanggan = '$password' WHERE id_pelanggan = '$id_pelanggan'");
                            if ($result_change) {
                                echo "<script>alert('Berhasil mengganti password');</script>";
                                echo "<script>location='profile.php';</script>";
                            }
                            else{
                                echo "<script>alert('Gagal mengganti password');</script>";
                                echo "<script>location='profile.php';</script>";
                            }
                        }else{
                            echo "<script>alert('Password tidak sama');</script>";
                            echo "<script>location='profile.php';</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
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
                <p class="pull-left">© E-DEL 2018</p>
            </div>
            <div class="col-md-6">
                <p class="pull-right">Alright Reserved by 11Fingers
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