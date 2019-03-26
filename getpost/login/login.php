<?php  
////////////////////////////////////////////
// cek apakah tombol submit sudah di klik //
////////////////////////////////////////////

if(isset($_POST['submit'])){
	/////////////////////////////
// cek username & password //
/////////////////////////////
	if($_POST['username'] == 'admin' && $_POST['password'] == '123456'){
		// jika benar
		header("Location: admin.php");
		exit();
	}
	else{
		// jika salah, tampilkan pesan kesalahan
		$err = true;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Admin</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php if(isset($err)): ?>
		<p style="color:red; font-style: italic; ">Username / password salah</p>
	<?php endif; ?>
	<h1>Login Admin</h1>
	<ul>
		<form action="" method="post">
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>
			<br>
			<li>
				<label for="password">password :</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="subtmi" name="submit">submit</button>
			</li>	
		</form>
	</ul>
</body>
</html>