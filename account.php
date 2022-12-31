<?php 
session_start();

include "config.php";

$id_user = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id_user'");
$pecah = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings Account</title>
    <link rel="stylesheet" href="account-desain.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>
<body>
    

<div class="container">
    <div class="leftbox">
        <nav>
            <a onclick="tabs(0)" class="tab active">
                <i class="fa fa-user"></i>
            </a>
            <a onclick="tabs(1)" class="tab">
                <i class="fa fa-circle-info"></i>
            </a>
            <a onclick="tabs(2)" class="tab">
                <i class="fa fa-envelope"></i>
            </a>
            <a onclick="tabs(3)" class="tab">
                <i class="fa fa-cog"></i>
            </a>
            <a href="index.php?id=<?php echo $pecah['id']; ?>"onclick="tabs(4)" class="tab">
                <i class="fa fa-left-long"></i>
            </a>
        </nav>
    </div>
    
    <div class="rightbox">
        <!-- User -->
        <div class="profile tabShow" id="profile">
            <h1>Personal Info</h1>
            <h2>Full Name</h2>
            <input type="text" class="input" name="name" value="<?php echo $pecah['name']; ?>" readonly>
            <h2>Telp</h2>
            <input type="number" class="input" value="<?php echo $pecah['telp']; ?>" readonly>
            <h2>Email</h2>
            <input type="email" class="input" value="<?php echo $pecah['email'];?>" readonly>
            <h2>Password</h2>
            <input type="password" class="input" id="inputPassword" value="<?php echo $pecah['password'];?>" readonly>
            <input type="checkbox" onclick="myFunction()" value="Tampilkan Password">
        </div>
        <!-- Payment -->
        <div class="payment tabShow">
            <h1>More Info</h1>
            <h2>Tanggal Lahir</h2>
            <input type="date" class="input" value="">
            <h2>Tempat Tinggal</h2>
            <input type="text" class="input" value="">
            <h2>Hobby</h2>
            <input type="text" class="input" value="">
            <h2>Status (Pelajar, Mahasiswa, Orang-tua, Dll)</h2>
            <input type="text" name="status" class="input" value="">
            <button class="btn">Update</button>
        </div>
        <!-- Privacy -->
        <div class="privacy tabShow">
            <h1>Message For Develop</h1>
            <textarea class="input" placeholder="Ketikan Pesanmu Disini"></textarea>
            <br>
            <button class="btn" type="submit" value="send" onclick="submitForm()">Kirim</button>
        </div>
        <!-- Settings -->
        <div class="settings tabShow">
            <form action="account-edit.php?id=<?php echo $id_user ?>" method="POST">
                <h1>Account Settings</h1>
                <h2>Full Name</h2>
                <input type="text" class="input" name="name" value="<?php echo $pecah['name']; ?>">
                <h2>Telp</h2>
                <input type="number" class="input" name="telp" value="<?php echo $pecah['telp']; ?>">
                <h2>Email</h2>
                <input type="email" class="input" name="email" value="<?php echo $pecah['email'];?>">
                <h2>Change Password</h2>
                <input type="password" class="input" name="password" id="inputPassword" value="<?php echo $pecah['password'];?>">
                <input type="checkbox" onclick="myFunction()" value="Tampilkan Password">
                <button class="btn" type="submit" name="update">Update</button>
            </form>
            
        </div>
    </div>
</div>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="script.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script>
        const tabBtn = document.querySelectorAll(".tabs");
        const tab = document.querySelectorAll(".tabShow");

        function tabs(panelIndex){
            tab.forEach(function(node) {
                node.style.display = "none";
            });
            tab[panelIndex].style.display = "block"
        }
        tabs(0);
    </script>
    <script>
        $(".tab").click(function() {
            $(this).addClass("active").siblings().removeClass("active");
        })
    </script>
</body>
</html>