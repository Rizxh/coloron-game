<?php 
include "config.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin3.css?v=<?php echo time(); ?>">
</head>

<body class="body">
    <header>
        <h3>Akun Yang Terdaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php?status=sukses">[+] Tambah Baru</a>
    </nav>

    <br>

    <center>
    <table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No.Telfon</th>
            <th>Password</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM users";
        $query = mysqli_query($conn, $sql);

        while($akun = mysqli_fetch_array($query)){

            echo "<tr>";
            echo "<td>".$akun['id']."</td>";
            echo "<td>".$akun['name']."</td>";
            echo "<td>".$akun['email']."</td>";
            echo "<td>".$akun['telp']."</td>";
            echo "<td>".$akun['password']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?id=".$akun['id']."'>Edit</a> | ";
            echo "<a href='hapus-akun.php?id=".$akun['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>
    </center>
    <p class="total">Total: <?php echo mysqli_num_rows($query) ?></p>

    <button class="back">
        <a href="admin.php">Back</a>
    </button>

    </body>
</html>