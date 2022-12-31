<?php

include 'config.php';

if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "UPDATE users SET name='$name', email='$email', telp='$telp', password='$password' WHERE id=$id");

    if($sql) {
        header('Location: list-akun.php?status=sukses');
    } else {
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>