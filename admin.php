<?php
include 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin2.css?v=<?php echo time(); ?>">
    <title>Admin Page</title>
</head>
<body>
    <header>
        <h3>Admin Page Panel</h3>
        <div class="kotak1">
            <h1 class="user-account">User Settings Account</h1>
        </div>
    </header>

    <div class="line1"></div>
    <div class="line2"></div>

    <nav class="nav">
        <ul class="kanan">
            <li class="daftar"><a href="form-daftar.php">Daftar Baru</a></li>
            <li class="list"><a href="list-akun.php">Data Akun</a></li>
        </ul>

        <ul class="kiri">
            <li class="log-out-admin">
                <a href="login.php">Back To Login</a>
            </li>
        </ul>
    </nav>
</body>
</html>