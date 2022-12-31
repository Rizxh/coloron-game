<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_POST['submit'])) {
    $name     = $_POST['name'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM admin WHERE name='$name' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $row['name'];
		header("Location: admin.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">

	<title>Admin Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Admin Name" name="name" value="<?php echo $name; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button type="submit" name="submit" class="btn" style="background: #A317ED; ">Login</button>
			</div>
		</form>
	</div>
</body>
</html>