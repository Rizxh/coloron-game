<?php
    session_start();
    include "config.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qcek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' and password='$password'");
    if(mysqli_num_rows($qcek) == 1){
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' and password='$password'");
        $q =  mysqli_fetch_array($query);

        $email = $q['email'];

        if($email){
            $_SESSION['email'] = $email;
            echo say("Selamat Datang");
        }
    };

?>