<?php
ob_start(); // Hindari output sebelum header
include '../koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login </title>
    <style>
        /* Semua CSS lengkap */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e0f7fa, #a5d6a7);
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

        .input100:focus ~ .focus-input100,
        .input100:not(:placeholder-shown) ~ .focus-input100 {
            top: 10px;
            font-size: 12px;
            color: #2e7d32;
        }

        .alert {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .alert-danger {
            background-color: #ffcdd2;
            color: #c62828;
        }

        .alert-success {
            background-color: #c8e6c9;
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-title p-b-26">
                        Login Admin
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username" required placeholder="Insert Your Username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password" required placeholder="Insert Your Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <button class="login100-form-btn" name="submit" type="submit">
                                Login
                            </button>
                        </div>
                    </div>

                                    </form>

                <?php 
                if (isset($_POST['submit'])) {
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    $password = md5($password);

                    $query = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");

                    if ($query && $query->num_rows === 1) {
                        $_SESSION['admin'] = $query->fetch_assoc();
                        echo "<div class='alert alert-success'><center>Login Succeeded</center></div>";
                        header("Refresh: 1; url=index.php");
                        exit;
                    } else {
                        echo "<div class='alert alert-danger'><center>Login Failed</center></div>";
                        header("Refresh: 1; url=login.php");
                        exit;
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script src="../asset/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../asset/login/vendor/animsition/js/animsition.min.js"></script>
    <script src="../asset/login/vendor/bootstrap/js/popper.js"></script>
    <script src="../asset/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../asset/login/vendor/select2/select2.min.js"></script>
    <script src="../asset/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="../asset/login/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="../asset/login/vendor/countdowntime/countdowntime.js"></script>
    <script src="../asset/login/js/main.js"></script>
</body>
</html>
