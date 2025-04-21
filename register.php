<?php 
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Dietify </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
	.wrap-input100 {
    position: relative;
    margin-bottom: 20px;
}

.input100 {
    width: 100%;
    padding: 14px;
    border: 2px solid #388e3c;
    border-radius: 10px;
    font-size: 16px;
    background: #f1f8e9;
}

.input100::placeholder {
    color: transparent; /* Hilangkan placeholder bawaan */
}

.focus-input100 {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    color: #aaa;
    transition: 0.3s ease-in-out;
    pointer-events: none;
}

/* Efek floating label saat input diisi atau difokuskan */
.input100:focus + .focus-input100,
.input100:not(:placeholder-shown) + .focus-input100 {
    top: 10px;
    font-size: 12px;
    color: #2e7d32;
}



	/* Reset dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: linear-gradient(135deg, #e0f7fa, #a5d6a7); /* Gradasi hijau tosca */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container-login100 {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

.wrap-login100 {
    width: 400px;
    background: #ffffff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.login100-form-title {
    font-size: 26px;
    font-weight: bold;
    color: #2e7d32;
    margin-bottom: 20px;
}

.wrap-input100 {
    position: relative;
    margin-bottom: 20px;
}

.input100 {
    width: 100%;
    padding: 12px;
    border: 2px solid #66bb6a;
    border-radius: 8px;
    font-size: 16px;
    background: #f1f8e9;
    transition: 0.3s;
}

.input100:focus {
    border-color: #2e7d32;
    outline: none;
    box-shadow: 0 0 8px rgba(46, 125, 50, 0.5);
}

.btn-show-pass {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #4caf50;
    font-size: 18px;
}

.container-login100-form-btn {
    text-align: center;
}

.wrap-login100-form-btn {
    width: 100%;
}

.login100-form-btn {
    width: 100%;
    padding: 12px;
    font-size: 18px;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background: linear-gradient(to right, #1b5e20, #4caf50);
    transition: 0.3s;
}

.login100-form-btn:hover {
    background: linear-gradient(to right, #388e3c, #66bb6a);
}

.text-center {
    text-align: center;
    margin-top: 20px;
}

.txt1 {
    color: #2e7d32;
}

.txt2 {
    color: #388e3c;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.txt2:hover {
    color: #1b5e20;
    text-decoration: underline;
}
/* Placeholder warna abu-abu */
.input100::placeholder {
    color: #aaa;
    transition: opacity 0.3s;
}

/* Hilangkan placeholder saat input aktif */
.input100:focus::placeholder {
    opacity: 0;
}
.wrap-input100 {
    position: relative;
    margin-bottom: 20px;
}

.input100 {
    width: 100%;
    padding: 12px;
    border: 2px solid #66bb6a;
    border-radius: 8px;
    font-size: 16px;
    background: #f1f8e9;
    transition: 0.3s;
}

.focus-input100 {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    color: #666;
    transition: all 0.3s ease-in-out;
    pointer-events: none;
}

/* Geser placeholder ke atas jika input fokus atau sudah diisi */
.input100:focus ~ .focus-input100,
.input100:not(:placeholder-shown) ~ .focus-input100 {
    top: 10px;
    font-size: 12px;
    color: #2e7d32;
}

</style>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-26">
						Create Account
					</span>

					<div class="wrap-input100">
    <input class="input100" type="text" name="nama" id="nama" placeholder=" ">
    <label for="nama" class="focus-input100">Insert Your Name</label>
</div>

<div class="wrap-input100">
    <input class="input100" type="text" name="email" id="email" placeholder=" ">
    <label for="email" class="focus-input100">Insert Your Email</label>
</div>

<div class="wrap-input100">
    <span class="btn-show-pass">
        <i class="zmdi zmdi-eye"></i>
    </span>
    <input class="input100" type="password" name="password" id="password" placeholder=" ">
    <label for="password" class="focus-input100">Insert Your Password</label>
</div>

<div class="wrap-input100">
    <input class="input100" type="tel" name="phone" id="phone" placeholder=" ">
    <label for="phone" class="focus-input100">Insert Your Phone Number</label>
</div>

<div class="wrap-input100">
    <input class="input100" type="text" name="alamat" id="alamat" placeholder=" ">
    <label for="alamat" class="focus-input100">Insert Your Address</label>
</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Sign Up
							</button>
						</div>
					</div>
				</form>
				<?php 
				if (isset($_POST['submit'])) {
					$nama = mysqli_escape_string($conn,$_POST['nama']);
					$email = mysqli_escape_string($conn,$_POST['email']);
					$password = mysqli_escape_string($conn,$_POST['password']);
					$phone = mysqli_escape_string($conn,$_POST['phone']);
					$alamat = mysqli_escape_string($conn,$_POST['alamat']);

					$password = md5($password);
					$validasi=$conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
					$q_validasi=$validasi->fetch_assoc();
					if ($nama == '' || $email == '' || $password == '' || $phone == '' || $alamat == '') {
						echo "<script>alert('Harap isi semua data');</script>";
					}
					else if ($q_validasi==TRUE) {
						echo "<script>alert('Email telah terdaftar');</script>";
					}
					else if ($q_validasi != TRUE){
						$query=$conn->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES('$email','$password','$nama','$phone','$alamat')");
						if ($query) {
							echo "<br>";
							echo "<div class='alert alert-info'>Sign Up Succeeded</div>";
							echo "<meta http-equiv='refresh' content='1;url=index.php'>";
							// echo "<script>alert('Registrasi Sukses');</script>";
							// header("refresh: 0.1, url=login.php");
						}
						else{
							// echo "<script>alert('Registrasi Gagal');</script>";
							// header("refresh: 0.1, url=login.php");
							echo "<br>";
							echo "<div class='alert alert-danger'>Sign Up Failed</div>";
							echo "<meta http-equiv='refresh' content='1;url=login.php'>";
						}
					}
				}
				?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="asset/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/bootstrap/js/popper.js"></script>
	<script src="asset/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="asset/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/js/main.js"></script>

</body>
</html>