<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_SESSION['email'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
        
		$_SESSION['name'] = $row['name'];
        $_SESSION['login'] = true;
        
		header("Location: index.php?id=$row[id]");
	} else {
		echo "<script>alert('Oops! Email atau Password anda salah.')</script>";
	}
}

if (isset($_SESSION['email'])) {
    header("Location: index.php");
}

if (isset($_POST['register'])) {
	$username = $_POST['name'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	$password = $_POST['password'];

	if ($password) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (name, email, telp, password)
					VALUES ('$username', '$email', '$telp', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('REGISTER BERHASIL!!')</script>";
				$username = "";
				$email = "";
				$telp = "";
				$_POST['password'] = "";
			} else {
				echo "<script>alert('Woops! Ada Yang Salah.')</script>";
			}
		} else {
			echo "<script>alert('Oops! Email Sudah Ada.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>
ㅤ

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css?v=<?php echo time();?>'>
    <link rel="stylesheet" href="desain.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login.php" method="POST">
                <h1>Create Account</h1>
                <span style="margin-top: 10px;">Contact me if you have any trouble</span>
                <div class="social-container">
                    <a href="https://wa.me//6287877368452" class="social"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://github.com/Rizxh" class="social"><i class="fab fa-github"></i></a>
                    <a href="https://www.instagram.com/rzzh_1/" class="social"><i class="fab fa-instagram"></i></a>
                </div>
                <input type="text" placeholder="Name" name="name" value="<?php echo $username; ?>" required>
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                <input type="telp" placeholder="No.Telfon" name="telp" value="<?php echo $telp; ?>" required>
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                <button name="register" class="btn" style="margin-top: 15px;">Register</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
        <div class="admin" style=
        "
        display: flex;
        justify-content: center;
        background-color: #f2eee3;
        "
        >
            <a style="font-weight: 900; font-size: 18px;" href="admin-login.php" class="admin-link">Admin Page</a>
        </div>

            <form action="login.php" method="POST">
                <h1>Login</h1>
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                <span style="margin-top: 10px;">Contact me if you have any trouble</span>
                <div class="social-container">
                    <a href="https://wa.me//6287877368452" class="social"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://github.com/Rizxh" class="social"><i class="fab fa-github"></i></a>
                    <a href="https://www.instagram.com/rzzh_1/" class="social"><i class="fab fa-instagram"></i></a>
                </div>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal details</p>
                    <button type="submit" class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hi There!</h1>
                    <p>Enter your personal details to open an account with us</p>
                    <button type="submit" class="ghost" id="signUp">Register</button>
                </div>
            </div>
        </div>
    </div>

    <script src="respon.js" charset="utf-8"></script>
</body>

</html>