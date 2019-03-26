<?php  

require 'functions.php';

if(isset($_POST['register'])){
	if(register($_POST) > 0){
		echo "
			<script>
				alert('user baru berhasil didaftarkan');
			</script>
		";
	}
	else{
		echo mysqli_error($conn);
		// die();
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

	<title>Halaman Registrasi</title>
	
</head>
<body>
	<div class="container">
		<h1>Registrasi</h1>
		<div class="row">
			<div class="card w-50 p-1 my-2">
				<form action="" method="post">
					<div class="form-group">
						<label for="username">username</label>
						<input type="text" name="username" id="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">password</label>
						<input type="password" name="pass" id="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="password2">konfirmasi password</label>
						<input type="password" name="pass2" id="password2" class="form-control">
					</div>
					<button class="btn btn-primary" type="submit" name="register">registrasi</button>
				</form>
			</div>
		</div>
		
	</div>

	<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>