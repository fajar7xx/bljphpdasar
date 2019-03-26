<?php  
require 'functions.php';

// cek dulu cookienya
if(isset($_COOKIE['id']) && $_COOKIE['key']){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id nya
	$result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$id'");
	$row = mysqli_fetch_assoc($result);

	// cek cookie
	if($key === hash('sha256', $row['username'])){
		$_SESSION['login'] = true;
	}
}

if(isset($_SESSION['login'])){
	header('Location:index.php');
	exit();
}

if(isset($_POST['login'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");

	// cek username
	if(mysqli_num_rows($result) === 1){
		
		// cek passwordnya
		$row = mysqli_fetch_assoc($result);
		if(password_verify($pass, $row['password'])){

			// set session
			$_SESSION['login'] = true; 


			// cek remember me
			if(isset($_POST['remember'])){
				// buat cookie
				// parameter ketiga itu expire timenya ntuk cookie
				setcookie('id', $row['id'], time()+120);
				setcookie('key', hash('sha256', $row['username']), time()+120);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

	<title>Login - Admin</title>
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="card w-50 p-1 m-auto">
				<div class="card-header">
					<h3 class="text-center">Login Sistem</h3>
				</div>
				<div class="card-body">
					<?php if(isset($error)): ?>
						<div class="alert alert-danger" role="alert">
							Username or Password is Wrong !
						</div>
					<?php endif; ?>
					<form action="" method="post">
						<div class="form-group">
							<label for="username">username</label>
							<input type="text" name="user" class="form-control">
						</div>
						<div class="form-group">
							<label for="pass">password</label>
							<input type="password" name="pass" class="form-control">
						</div>
						<div class="form-group form-check">
							<input type="checkbox" name="remember" id="remember" class="form-check-input">
							<label for="remember" class="form-check-label">Ingat Saya</label>
						</div>
						<button type="submit" name="login" class="btn btn-block btn-primary">Login</button>
						<a href="registrasi.php" class="small text-center">Belum punya akun, silahkan daftar</a>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>