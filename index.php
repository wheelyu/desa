<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: create.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script src="script.js"></script>
</head>
<body>

    <section class="box">
        <div>
            <img class="logo" src="img/logo.png" alt="desa">
        </div>

        <h1>Selamat datang!</h1>
        <h6>Silahkan masukkan informasi anda</h6>
        <form class="form" action="auth.php" method="POST">

            <h2>Username</h2>
            <input type="text" name="username" id="username">
            <h2>Password</h2>
            <input type="password" name="password" id="password">
            <div class="btn">
                <button class="btn" type="submit">Login</button>
            </div>
        </form>
    </section>
    
</body>
</html>