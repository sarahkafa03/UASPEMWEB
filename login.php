<?php
session_start();
include 'koneksi.php';

$error = '';
$success = '';

if (isset($_POST['submit'])) {
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);
    $password = md5($password);

    $query = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
    $result = $query->num_rows;

    if ($result == 1) {
        $_SESSION['login'] = $query->fetch_assoc();
        header("Location: index.php");
        exit(); // Penting untuk menghentikan eksekusi setelah redirect
    } else {
        $error = "Login Failed. Please check your email and password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Seluruh CSS lengkap tanpa pemotongan */
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

<div class="container-login100">
    <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST">
            <span class="login100-form-title">
                User Login
            </span>

            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="email" placeholder=" " required>
                <span class="focus-input100">Insert Your Email</span>
            </div>

            <div class="wrap-input100 validate-input">
                <span class="btn-show-pass">
                    <i class="zmdi zmdi-eye"></i>
                </span>
                <input class="input100" type="password" name="password" placeholder=" " required>
                <span class="focus-input100">Insert Your Password</span>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <button class="login100-form-btn" name="submit">
                        Login
                    </button>
                </div>
            </div>

            <div class="text-center">
                <span class="txt1">
                    Don’t have an account?
                </span>
                <a class="txt2" href="register.php">
                    Sign Up
                </a>
                
            </div>
        </form>
    </div>
</div>

</body>
</html>
