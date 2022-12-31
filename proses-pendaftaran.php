<?php

include "config.php";

if(isset($_POST['daftar'])){

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $telp     = $_POST['telp'];
    $password = $_POST['password'];

    $sql   = "INSERT INTO users (id, name, email, telp, password) VALUES ('', '$name', '$email', '$telp', '$password');";
    $query = $conn->query($sql);

    if($query) {
        header('Location: admin.php?status=sukses');
    } else {
        header('Location: admin.php?status=gagal');
    }

} else {
    die("Akses dilarang...");
}

?>