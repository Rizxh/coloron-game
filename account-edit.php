<?php 
session_start();

include "config.php";

$id_user = $_GET['id'];

?>

<?php

if(isset($_POST['update'])) {


	$update = $conn->query("UPDATE users SET 
    	name = '$_POST[name]', 
    	email = '$_POST[email]',
		telp = '$_POST[telp]',
    	password = '$_POST[password]' WHERE id = '$id_user'");
		
		if(!$update){
			echo "<script>alert('Maaf, Belum Berhasil :(')</script>";
		} else {
			echo "<script>alert('Berhasil Diubah')</script>";
			header("location: account.php?username=$_SESSION[name]&id=$id_user");
	}
}

?>