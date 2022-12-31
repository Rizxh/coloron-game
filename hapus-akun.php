<?php

include 'config.php';

if( isset($_GET['id']) ){

    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id='$id'";
    $query = mysqli_query($conn, $sql);

    if( $query ){
        header('Location: list-akun.php?status=sukses');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>