<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Belajar FORM</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php if(isset($_POST['submit'])): ?>
		<h1>Halo, selamat datang <?=$_POST['nama'];?></h1>
	<?php endif; ?>
	<form  method="post">
		<label for="">Masukkan Nama :</label>
		<input type="text" name="nama">
		<br>
		<button type="submit" name="submit">Kirim !</button>
	</form>
</body>
</html>