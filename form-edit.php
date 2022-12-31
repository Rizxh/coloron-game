<?php

include 'config.php';

if(!isset($_GET['id']) ){
    header('Location: list-akun.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$akun = mysqli_fetch_assoc($query);

if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Akun User</title>
    <link rel="stylesheet" href="admin3.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <h3>Formulir Edit Akun User</h3>
    </header>

    <form action="proses-edit.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $akun['id']?>" />
            <p>
            <label for="name">Nama: </label>
            <input type="text" name="name" placeholder="nama lengkap" value="<?php echo $akun['name'] ?>" />
            </p>
            <p>
            <label for="email">Email: </label>
            <input type="email" name="email" value="<?php echo $akun['email'] ?> ">
            </p>
            <p>
            <label for="telp">No. Telfon: </label>
            <input type="number" name="telp" value="<?php echo $akun['telp'] ?> ">
            <p>
            <label for="password">Password: </label>
            <input name="password" value="<?php echo $akun['password'] ?> ">
            </p>
                <button class="submit-button" type="submit" value="simpan" name="simpan">Simpan</button>
        </fieldset>
           
    </form>
    <p>
                <button class="back">
                    <a href="admin.php">Back</a>
                </button>
            </p>
    </body>
</html>